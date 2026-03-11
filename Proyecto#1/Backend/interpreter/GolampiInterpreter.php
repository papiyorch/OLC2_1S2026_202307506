<?php

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

class GolampiInterpreter extends GolampiBaseVisitor
{
    // Estado del intérprete
    private string      $output      = '';
    private Environment $globalEnv;
    private Environment $currentEnv;

    // Array de funciones
    private array $functions = [];

    // Errores semánticos acumulados durante la interpretación
    private array $semanticErrors = [];

    public function __construct()
    {
        $this->globalEnv  = new Environment('global');
        $this->currentEnv = $this->globalEnv;
        Environment::resetSymbols();
    }

    // Getters de resultado
    // ──────────────────────────────────────────────
    public function getOutput(): string  { return $this->output; }
    public function getSymbolTable(): array { return Environment::getAllSymbols(); }
    public function getSemanticErrors(): array { return $this->semanticErrors; }

    // Helpers
    // ──────────────────────────────────────────────
    private function addError(string $msg, int $line = 0, int $col = 0): void
    {
        // Evitar duplicados del mismo error en la misma línea/columna
        foreach ($this->semanticErrors as $existing) {
            if ($existing['desc'] === $msg && $existing['line'] === $line && $existing['column'] === $col) {
                return;
            }
        }
        $this->semanticErrors[] = ['type' => 'Semántico', 'desc' => $msg, 'line' => $line, 'column' => $col];
    }

    private function defaultValue(string $type): mixed
    {
        return match(true) {
            $type === 'int32'   => 0,
            $type === 'float32' => 0.0,
            $type === 'bool'    => false,
            $type === 'rune'    => "\u{0000}",
            $type === 'string'  => '',
            default             => null,
        };
    }

    private function defaultForTypeCtx($typeCtx): mixed
    {
        // Tipo de array
        if ($typeCtx->expression()) {
            $size     = (int) $this->visit($typeCtx->expression());
            $innerCtx = $typeCtx->type();
            $arr = [];
            for ($j = 0; $j < $size; $j++) {
                $arr[] = $this->defaultForTypeCtx($innerCtx);
            }
            return $arr;
        }
        if ($typeCtx->LBRACK() && !$typeCtx->expression()) {
            return [];
        }
        return $this->defaultValue($typeCtx->getText());
    }

    private function inferType(mixed $value): string
    {
        if (is_int($value))    return 'int32';
        if (is_float($value))  return 'float32';
        if (is_bool($value))   return 'bool';
        if (is_string($value)) return 'string';
        if (is_array($value))  return 'array';
        return 'nil';
    }

    private function typeOfString(mixed $value): string
    {
        if ($value === null)   return 'nil';
        if (is_int($value))    return 'int32';
        if (is_float($value))  return 'float32';
        if (is_bool($value))   return 'bool';
        if (is_string($value)) return 'string';
        if (is_array($value))  return 'array';
        return 'unknown';
    }

    private function formatValue(mixed $v): string
    {
        if ($v === null)        return 'nil';
        if (is_bool($v))        return $v ? 'true' : 'false';
        if (is_float($v))       return rtrim(rtrim(sprintf('%f', $v), '0'), '.');
        if (is_array($v))       return '[' . implode(', ', array_map([$this, 'formatValue'], $v)) . ']';
        return (string) $v;
    }

    // Visita raíz
    // ──────────────────────────────────────────────
    public function visitStart($ctx): mixed
    {
        // Hoisting
        foreach ($ctx->topDecl() as $decl) {
            if ($decl instanceof Context\DeclFunctionContext) {
                $funcDecl = $decl->functionDecl();
                $name     = $funcDecl->ID()->getText();
                $line     = $funcDecl->ID()->getSymbol()->getLine();
                $col      = $funcDecl->ID()->getSymbol()->getCharPositionInLine();
                $this->functions[$name] = $funcDecl;
                try {
                    $this->globalEnv->declare($name, 'función', null, $line, $col);
                } catch (GolampiRuntimeError $e) {
                    $this->addError($e->getMessage(), $line, $col);
                }
            }
        }

        // Declaraciones globales
        foreach ($ctx->topDecl() as $decl) {
            $this->visit($decl);
        }

        // Ejecutar main
        if (!isset($this->functions['main'])) {
            throw new GolampiRuntimeError("No se encontró la función 'main'.");
        }
        $this->callFunction('main', []);
        return null;
    }

    // Declaraciones de nivel superior
    // ──────────────────────────────────────────────
    public function visitDeclFunction($ctx): mixed
    {
        // Ya registrado durante el hoisting en visitStart
        return null;
    }

    public function visitDeclGlobalVar($ctx): mixed
    {
        return $this->visitVarDecl($ctx->varDecl());
    }

    public function visitDeclGlobalConst($ctx): mixed
    {
        return $this->visitConstantDecl($ctx->constantDecl());
    }

    // Llamada a función
    // ──────────────────────────────────────────────
    private function callFunction(string $name, array $args): mixed
    {
        if (!isset($this->functions[$name])) {
            throw new GolampiRuntimeError("Función '$name' no declarada.");
        }
        $funcCtx = $this->functions[$name];

        // Crear entorno nuevo para la función
        $prevEnv          = $this->currentEnv;
        $this->currentEnv = $this->globalEnv->createChild("func_$name");

        // Bindear parámetros
        $params = $funcCtx->paramList() ? $funcCtx->paramList()->parametro() : [];
        foreach ($params as $i => $param) {
            $paramName = $param->ID()->getText();
            $paramType = $param->type()->getText();
            $val       = $args[$i] ?? $this->defaultValue($paramType);
            $this->currentEnv->declare($paramName, $paramType, $val,
                $param->ID()->getSymbol()->getLine(),
                $param->ID()->getSymbol()->getCharPositionInLine());
        }

        $returnValue = null;
        try {
            $this->visitBlock($funcCtx->block());
        } catch (ReturnSignal $ret) {
            $returnValue = $ret->value;
        }

        $this->currentEnv = $prevEnv;
        return $returnValue;
    }

    // Block
    // ──────────────────────────────────────────────
    public function visitBlock($ctx): mixed
    {
        foreach ($ctx->statement() as $stmt) {
            $this->visit($stmt);
        }
        return null;
    }

    // Statements
    // ──────────────────────────────────────────────
    public function visitStmtVar($ctx): mixed
    {
        return $this->visitVarDecl($ctx->varDecl());
    }

    public function visitStmtConst($ctx): mixed
    {
        return $this->visitConstantDecl($ctx->constantDecl());
    }

    public function visitStmtShortDecl($ctx): mixed
    {
        return $this->visitShortDecl($ctx->shortDecl());
    }

    public function visitStmtAssign($ctx): mixed
    {
        return $this->visit($ctx->assignment());
    }

    public function visitStmIncrement($ctx): mixed
    {
        return $this->visit($ctx->increment());
    }

    public function visitStmtPrint($ctx): mixed
    {
        return $this->visitPrintStmt($ctx->printStmt());
    }

    public function visitStmtIf($ctx): mixed
    {
        return $this->visitIfStmt($ctx->ifStmt());
    }

    public function visitStmtSwitch($ctx): mixed
    {
        return $this->visitSwitchStmt($ctx->switchStmt());
    }

    public function visitStmtFor($ctx): mixed
    {
        return $this->visitForStmt($ctx->forStmt());
    }

    public function visitStmtBreak($ctx): mixed
    {
        throw new BreakSignal();
    }

    public function visitStmtContinue($ctx): mixed
    {
        throw new ContinueSignal();
    }

    public function visitStmtBlock($ctx): mixed
    {
        $prev = $this->currentEnv;
        $this->currentEnv = $this->currentEnv->createChild('block');
        $this->visitBlock($ctx->block());
        $this->currentEnv = $prev;
        return null;
    }

    public function visitStmtReturn($ctx): mixed
    {
        return $this->visitReturnStmt($ctx->returnStmt());
    }

    public function visitStmtArrayAssign($ctx): mixed
    {
        return $this->visitArrayAssignment($ctx->arrayAssignment());
    }

    public function visitStmtExpr($ctx): mixed
    {
        return $this->visit($ctx->expression());
    }

    public function visitStmtEmpty($ctx): mixed
    {
        return null;
    }

    public function visitStmtPtrAssign($ctx): mixed
    {
        // *id = expr
        $id  = $ctx->ID()->getText();
        $val = $this->visit($ctx->expression());
        try {
            $ptrVal = $this->currentEnv->get($id);
            if (is_array($ptrVal) && isset($ptrVal['__ptr'])) {
                $ptrVal['env']->assign($ptrVal['id'], $val);
            } else {
                $this->currentEnv->assign($id, $val);
            }
        } catch (GolampiRuntimeError $e) {
            $this->addError($e->getMessage(), $ctx->ID()->getSymbol()->getLine(),
                $ctx->ID()->getSymbol()->getCharPositionInLine());
        }
        return null;
    }

    // varDecl / constDecl / shortDecl
    // ──────────────────────────────────────────────
    public function visitVarDecl($ctx): mixed
    {
        $ids   = $ctx->ID();
        $type  = $ctx->type()->getText();
        $values = $ctx->valores() ? $this->visitValores($ctx->valores()) : [];

        foreach ($ids as $i => $idNode) {
            $name = $idNode->getText();
            $val  = $values[$i] ?? $this->defaultForTypeCtx($ctx->type());
            try {
                $this->currentEnv->declare($name, $type, $val,
                    $idNode->getSymbol()->getLine(),
                    $idNode->getSymbol()->getCharPositionInLine());
            } catch (GolampiRuntimeError $e) {
                $this->addError($e->getMessage(),
                    $idNode->getSymbol()->getLine(),
                    $idNode->getSymbol()->getCharPositionInLine());
            }
        }
        return null;
    }

    public function visitConstantDecl($ctx): mixed
    {
        $name = $ctx->ID()->getText();
        $type = $ctx->type()->getText();
        $val  = $this->visit($ctx->expression());
        try {
            $this->currentEnv->declare($name, "const_$type", $val,
                $ctx->ID()->getSymbol()->getLine(),
                $ctx->ID()->getSymbol()->getCharPositionInLine());
        } catch (GolampiRuntimeError $e) {
            $this->addError($e->getMessage(),
                $ctx->ID()->getSymbol()->getLine(),
                $ctx->ID()->getSymbol()->getCharPositionInLine());
        }
        return null;
    }

    public function visitShortDecl($ctx): mixed
    {
        $ids    = $ctx->ID();
        $values = $this->resolveMultiValues($ctx->valores(), count($ids));

        // En Go/Golampi, := requiere que al menos una variable sea nueva en el scope actual
        $allExist = true;
        foreach ($ids as $idNode) {
            if (!$this->currentEnv->existsLocal($idNode->getText())) {
                $allExist = false;
                break;
            }
        }
        if ($allExist) {
            $first = $ids[0];
            $names = implode(', ', array_map(fn($id) => "'" . $id->getText() . "'", $ids));
            $this->addError(
                "Declaración corta ':=' inválida: $names ya están declarados en el ámbito actual.",
                $first->getSymbol()->getLine(),
                $first->getSymbol()->getCharPositionInLine()
            );
            return null;
        }

        foreach ($ids as $i => $idNode) {
            $name = $idNode->getText();
            $val  = $values[$i] ?? null;
            $type = $this->inferType($val);
            try {
                if ($this->currentEnv->existsLocal($name)) {
                    $this->currentEnv->assign($name, $val,
                        $idNode->getSymbol()->getLine(),
                        $idNode->getSymbol()->getCharPositionInLine());
                } else {
                    $this->currentEnv->declare($name, $type, $val,
                        $idNode->getSymbol()->getLine(),
                        $idNode->getSymbol()->getCharPositionInLine());
                }
            } catch (GolampiRuntimeError $e) {
                $this->addError($e->getMessage(),
                    $idNode->getSymbol()->getLine(),
                    $idNode->getSymbol()->getCharPositionInLine());
            }
        }
        return null;
    }

    // Assignment
    // ──────────────────────────────────────────────
    public function visitAssignSimple($ctx): mixed
    {
        $ids    = $ctx->ID();
        $values = $this->resolveMultiValues($ctx->valores(), count($ids));

        foreach ($ids as $i => $idNode) {
            $name = $idNode->getText();
            $val  = $values[$i] ?? null;
            try {
                $this->currentEnv->assign($name, $val,
                    $idNode->getSymbol()->getLine(),
                    $idNode->getSymbol()->getCharPositionInLine());
            } catch (GolampiRuntimeError $e) {
                $this->addError($e->getMessage(),
                    $idNode->getSymbol()->getLine(),
                    $idNode->getSymbol()->getCharPositionInLine());
            }
        }
        return null;
    }

    public function visitAssignCompound($ctx): mixed
    {
        $name = $ctx->ID()->getText();
        $op   = $ctx->op->getText();
        $rhs  = $this->visit($ctx->expression());

        try {
            $lhs = $this->currentEnv->get($name,
                $ctx->ID()->getSymbol()->getLine(),
                $ctx->ID()->getSymbol()->getCharPositionInLine());
            $result = match($op) {
                '+='  => $lhs + $rhs,
                '-='  => $lhs - $rhs,
                '*='  => $lhs * $rhs,
                '/='  => $rhs != 0 ? $lhs / $rhs : null,
                '%='  => $rhs != 0 ? $lhs % $rhs : null,
                default => null,
            };
            $this->currentEnv->assign($name, $result);
        } catch (GolampiRuntimeError $e) {
            $this->addError($e->getMessage());
        }
        return null;
    }

    // Increment / Decrement
    // ──────────────────────────────────────────────
    public function visitIncDec($ctx): mixed
    {
        $name = $ctx->ID()->getText();
        $op   = $ctx->getChild(1)->getText();
        try {
            $val = $this->currentEnv->get($name);
            $this->currentEnv->assign($name, $op === '++' ? $val + 1 : $val - 1);
        } catch (GolampiRuntimeError $e) {
            $this->addError($e->getMessage());
        }
        return null;
    }

    // Print
    // ──────────────────────────────────────────────
    public function visitPrintStmt($ctx): mixed
    {
        $keyword  = $ctx->getStart()->getText();
        $values   = $ctx->valores() ? $this->visitValores($ctx->valores()) : [];
        $parts    = array_map(fn($v) => $this->formatValue($v), $values);

        $line = implode(' ', $parts);

        if ($keyword === 'fmt.Println' || $keyword === 'println') {
            $this->output .= $line . "\n";
        } else {
            $this->output .= $line;
        }
        return null;
    }

    // If
    // ──────────────────────────────────────────────
    public function visitIfStmt($ctx): mixed
    {
        $cond = $this->visit($ctx->expression());

        $prev = $this->currentEnv;
        $this->currentEnv = $this->currentEnv->createChild('if');

        if ($cond) {
            // bloque then
            $this->visitBlock($ctx->block(0));
        } else {
            $elseIf = $ctx->ifStmt();  // else if anidado
            if ($elseIf !== null) {
                $this->visitIfStmt($elseIf);
            } else {
                // bloque else (si existe)
                $elseBlock = $ctx->block(1);
                if ($elseBlock !== null) {
                    $this->visitBlock($elseBlock);
                }
            }
        }

        $this->currentEnv = $prev;
        return null;
    }

    // Switch
    // ──────────────────────────────────────────────
    public function visitSwitchStmt($ctx): mixed
    {
        $switchVal = $this->visit($ctx->expression());
        $block     = $ctx->switchBlock();

        $matched = false;
        try {
            foreach ($block->caseStmt() as $caseCtx) {
                $caseVals = $this->visitValores($caseCtx->valores());
                if (in_array($switchVal, $caseVals, strict: true)) {
                    $matched = true;
                    $prev = $this->currentEnv;
                    $this->currentEnv = $this->currentEnv->createChild('switch_case');
                    foreach ($caseCtx->statement() as $stmt) {
                        $this->visit($stmt);
                    }
                    $this->currentEnv = $prev;
                    break;
                }
            }
            if (!$matched && $block->defaultStmt()) {
                $prev = $this->currentEnv;
                $this->currentEnv = $this->currentEnv->createChild('switch_default');
                foreach ($block->defaultStmt()->statement() as $stmt) {
                    $this->visit($stmt);
                }
                $this->currentEnv = $prev;
            }
        } catch (BreakSignal) {}

        return null;
    }

    // For
    // ──────────────────────────────────────────────
    public function visitForStmt($ctx): mixed
    {
        $prev = $this->currentEnv;
        $this->currentEnv = $this->currentEnv->createChild('for');

        // Detectar forma del for con count de SEMIs
        $semicolons = count($ctx->SEMI());

        $condCtx = null;
        $postCtx = null;

        if ($semicolons >= 2) {
            // for init; cond; post { }
            $initNode = $ctx->varDecl() ?? $ctx->shortDecl() ?? null;
            if ($initNode !== null) $this->visit($initNode);
            $condCtx = $ctx->expression();
            $postCtx = $ctx->assignment() ?? $ctx->increment() ?? null;
        } elseif ($ctx->expression() !== null) {
            // for expr { }  (while)
            $condCtx = $ctx->expression();
        }
        // else: for { } — bucle infinito

        try {
            while (true) {
                if ($condCtx !== null) {
                    $cond = $this->visit($condCtx);
                    if (!$cond) break;
                }

                try {
                    $this->visitBlock($ctx->block());
                } catch (ContinueSignal) {
                    // Salta al post en continue
                }

                if ($postCtx !== null) $this->visit($postCtx);
            }
        } catch (BreakSignal) {}

        $this->currentEnv = $prev;
        return null;
    }

    // Return
    // ──────────────────────────────────────────────
    public function visitReturnStmt($ctx): mixed
    {
        $values = $ctx->valores() ? $this->visitValores($ctx->valores()) : [];
        $retVal = count($values) === 1 ? $values[0] : (count($values) > 1 ? $values : null);
        throw new ReturnSignal($retVal);
    }

    // Array assignment
    // ──────────────────────────────────────────────
    public function visitArrayAssignment($ctx): mixed
    {
        $name    = $ctx->ID()->getText();
        $indices = array_map(fn($e) => $this->visit($e), $ctx->expression());
        $rhs     = array_pop($indices); // el último es el valor

        try {
            $arr = $this->currentEnv->get($name);
            $ref = &$arr;
            foreach ($indices as $idx) {
                $ref = &$ref[$idx];
            }
            $ref = $rhs;
            $this->currentEnv->assign($name, $arr);
        } catch (GolampiRuntimeError $e) {
            $this->addError($e->getMessage());
        }
        return null;
    }

    // Valores (lista de expresiones)
    // ──────────────────────────────────────────────
    public function visitValores($ctx): array
    {
        if ($ctx === null) return [];
        return array_map(fn($e) => $this->visit($e), $ctx->expression());
    }


    private function resolveMultiValues($valoresCtx, int $idCount): array
    {
        if ($valoresCtx === null) return array_fill(0, $idCount, null);
        $exprs = $valoresCtx->expression();

        // Caso normal: igual número de expresiones que de ids
        if (count($exprs) === $idCount || count($exprs) !== 1) {
            return $this->visitValores($valoresCtx);
        }

        // Una sola expresión: puede ser retorno múltiple de función
        $result = $this->visit($exprs[0]);
        if (is_array($result) && !isset($result['__ptr'])) {
            return array_values($result);
        }
        return [$result];
    }

    // Expresiones
    // ──────────────────────────────────────────────
    public function visitExprParenthesis($ctx): mixed
    {
        return $this->visit($ctx->expression());
    }

    public function visitExprNot($ctx): mixed
    {
        return !$this->visit($ctx->expression());
    }

    public function visitExprNegate($ctx): mixed
    {
        return -$this->visit($ctx->expression());
    }

    public function visitExprId($ctx): mixed
    {
        $name = $ctx->ID()->getText();
        try {
            return $this->currentEnv->get($name,
                $ctx->ID()->getSymbol()->getLine(),
                $ctx->ID()->getSymbol()->getCharPositionInLine());
        } catch (GolampiRuntimeError $e) {
            $this->addError($e->getMessage(),
                $ctx->ID()->getSymbol()->getLine(),
                $ctx->ID()->getSymbol()->getCharPositionInLine());
            return null;
        }
    }

    public function visitExprLiteral($ctx): mixed
    {
        return $this->visitLiteral($ctx->literal());
    }

    public function visitExprAddSub($ctx): mixed
    {
        $l  = $this->visit($ctx->expression(0));
        $r  = $this->visit($ctx->expression(1));
        $op = $ctx->getChild(1)->getText();

        if ($l === null || $r === null) return null;

        $li = is_int($l);   $lf = is_float($l);
        $ri = is_int($r);   $rf = is_float($r);
        $ls = is_string($l); $rs = is_string($r);
        $lb = is_bool($l);  $rb = is_bool($r);

        if ($op === '+') {
            // string + string = string (concatenación)
            if ($ls && $rs) return $l . $r;
            // bool en cualquier operando → nil
            if ($lb || $rb || $ls || $rs) return null;
            // int/rune + float o float + int/rune → float
            if (($li && $rf) || ($lf && $ri)) return (float)($l + $r);
            // float + float → float
            if ($lf && $rf) return (float)($l + $r);
            // int + int (cubre int32 y rune) → int
            if ($li && $ri) return (int)($l + $r);
            return null;
        }

        // Resta: mismas reglas que suma pero sin string
        if ($lb || $rb || $ls || $rs) return null;
        if (($li && $rf) || ($lf && $ri)) return (float)($l - $r);
        if ($lf && $rf) return (float)($l - $r);
        if ($li && $ri) return (int)($l - $r);
        return null;
    }

    public function visitExprMulDiv($ctx): mixed
    {
        $l  = $this->visit($ctx->expression(0));
        $r  = $this->visit($ctx->expression(1));
        $op = $ctx->getChild(1)->getText();

        if ($l === null || $r === null) return null;

        $li = is_int($l);   $lf = is_float($l);
        $ri = is_int($r);   $rf = is_float($r);
        $ls = is_string($l); $rs = is_string($r);
        $lb = is_bool($l);  $rb = is_bool($r);

        if ($op === '*') {
            // string * int32 = string (repetición)
            if ($ls && $ri) return str_repeat($l, max(0, $r));
            if ($li && $rs) return str_repeat($r, max(0, $l));
            // bool o string inválidos en otros casos
            if ($lb || $rb || $ls || $rs) return null;
            if (($li && $rf) || ($lf && $ri)) return (float)($l * $r);
            if ($lf && $rf) return (float)($l * $r);
            if ($li && $ri) return (int)($l * $r);
            return null;
        }

        if ($op === '/') {
            if ($lb || $rb || $ls || $rs) return null;
            if ($r == 0) return null;
            if (($li && $rf) || ($lf && $ri)) return (float)($l / $r);
            if ($lf && $rf) return (float)($l / $r);
            if ($li && $ri) return intdiv((int)$l, (int)$r);
            return null;
        }

        if ($op === '%') {
            // Solo int32/rune con int32/rune
            if (!$li || !$ri) return null;
            if ($r == 0) return null;
            return (int)($l % $r);
        }

        return null;
    }

    public function visitExprRelational($ctx): mixed
    {
        $l  = $this->visit($ctx->expression(0));
        $r  = $this->visit($ctx->expression(1));
        $op = $ctx->getChild(1)->getText();

        // bool no soporta comparaciones de orden
        if (is_bool($l) || is_bool($r)) return null;
        // string solo con string
        if (is_string($l) !== is_string($r)) return null;

        return match($op) {
            '<'  => $l < $r,
            '<=' => $l <= $r,
            '>'  => $l > $r,
            '>=' => $l >= $r,
            default => null,
        };
    }

    public function visitExprEquality($ctx): mixed
    {
        $l  = $this->visit($ctx->expression(0));
        $r  = $this->visit($ctx->expression(1));
        $op = $ctx->getChild(1)->getText();

        // bool solo con bool; string solo con string; números entre sí
        $lb = is_bool($l); $rb = is_bool($r);
        $ls = is_string($l); $rs = is_string($r);
        if ($lb !== $rb) return null;
        if ($ls !== $rs) return null;

        return $op === '==' ? $l === $r : $l !== $r;
    }

    public function visitExprAnd($ctx): mixed
    {
        $l = $this->visit($ctx->expression(0));
        if (!$l) return false; // cortocircuito
        return (bool) $this->visit($ctx->expression(1));
    }

    public function visitExprOr($ctx): mixed
    {
        $l = $this->visit($ctx->expression(0));
        if ($l) return true; // cortocircuito
        return (bool) $this->visit($ctx->expression(1));
    }

    public function visitExprCall($ctx): mixed
    {
        // expr(args) — puede ser func call
        $calleeCtx = $ctx->expression(0);
        $name      = $calleeCtx->getText();
        $args      = $ctx->valores() ? $this->visitValores($ctx->valores()) : [];

        if (isset($this->functions[$name])) {
            return $this->callFunction($name, $args);
        }

        $this->addError("Función '$name' no declarada.");
        return null;
    }

    public function visitExprArrayAccess($ctx): mixed
    {
        $arr = $this->visit($ctx->expression(0));
        $idx = $this->visit($ctx->expression(1));

        if (!is_array($arr)) {
            $this->addError("Se intentó indexar un valor que no es un arreglo.");
            return null;
        }
        return $arr[$idx] ?? null;
    }

    public function visitExprArrayLit($ctx): mixed
    {
        return $this->visitArrayLiteral($ctx->arrayLiteral());
    }

    public function visitExprInlineArray($ctx): mixed
    {
        //fila interna en matrices multidimensionales
        return $ctx->valores() ? $this->visitValores($ctx->valores()) : [];
    }

    public function visitExprAddr($ctx): mixed
    {
        $name = $ctx->ID()->getText();
        return ['__ptr' => true, 'env' => $this->currentEnv, 'id' => $name];
    }

    public function visitExprDeref($ctx): mixed
    {
        $val = $this->visit($ctx->expression());
        if (is_array($val) && isset($val['__ptr'])) {
            return $val['env']->get($val['id']);
        }
        return $val;
    }

    // Built-in functions
    // ──────────────────────────────────────────────
    public function visitExprBuiltIn($ctx): mixed
    {
        $func = $ctx->getStart()->getText();
        $args = $ctx->valores() ? $this->visitValores($ctx->valores()) : [];

        return match($func) {
            'len'    => isset($args[0]) ? (is_array($args[0]) ? count($args[0]) : strlen((string)$args[0])) : 0,
            'now'    => date('Y-m-d H:i:s'),
            'substr' => isset($args[0], $args[1], $args[2])
                        ? substr((string)$args[0], (int)$args[1], (int)$args[2])
                        : null,
            'typeOf' => $this->typeOfString($args[0] ?? null),
            default  => null,
        };
    }

    // Literales
    // ──────────────────────────────────────────────
    public function visitLiteral($ctx): mixed
    {
        $text = $ctx->getText();

        if ($ctx->ENTERO())        return (int) $text;
        if ($ctx->DECIMAL())       return (float) $text;
        if ($ctx->BOOL_LIT())      return $text === 'true';
        if ($ctx->NIL())           return null;
        if ($ctx->STRING_LITERAL()) {
            // Quitar comillas dobles y procesar escapes
            $inner = substr($text, 1, -1);
            return stripcslashes($inner);
        }
        if ($ctx->RUNE_LITERAL()) {
            // Rune es alias de int32: almacenar como código Unicode (int)
            $inner = substr($text, 1, -1);
            $char  = stripcslashes($inner);
            return mb_ord($char, 'UTF-8');
        }
        return null;
    }

    // Array literal
    // ──────────────────────────────────────────────
    public function visitArrayLiteral($ctx): mixed
    {
        $values = $ctx->valores() ? $this->visitValores($ctx->valores()) : [];
        return $values;
    }
}
