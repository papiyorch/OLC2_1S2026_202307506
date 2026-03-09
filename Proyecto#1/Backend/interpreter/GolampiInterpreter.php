<?php

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

/**
 * GolampiInterpreter
 * Visitor principal que recorre el AST y ejecuta el programa.
 */
class GolampiInterpreter extends GolampiBaseVisitor
{
    // ──────────────────────────────────────────────
    // Estado del intérprete
    // ──────────────────────────────────────────────
    private string      $output      = '';
    private Environment $globalEnv;
    private Environment $currentEnv;

    /** @var array<string, array> Tabla de funciones [nombre => contexto del parser] */
    private array $functions = [];

    /** @var array Errores semánticos detectados en tiempo de ejecución */
    private array $semanticErrors = [];

    public function __construct()
    {
        $this->globalEnv  = new Environment('global');
        $this->currentEnv = $this->globalEnv;
        Environment::resetSymbols();
    }

    // ──────────────────────────────────────────────
    // Getters de resultado
    // ──────────────────────────────────────────────
    public function getOutput(): string  { return $this->output; }
    public function getSymbolTable(): array { return Environment::getAllSymbols(); }
    public function getSemanticErrors(): array { return $this->semanticErrors; }

    // ──────────────────────────────────────────────
    // Helpers
    // ──────────────────────────────────────────────
    private function addError(string $msg, int $line = 0, int $col = 0): void
    {
        $this->semanticErrors[] = ['type' => 'Semántico', 'desc' => $msg, 'line' => $line, 'col' => $col];
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
        return (string) $v;
    }

    // ──────────────────────────────────────────────
    // Visita raíz
    // ──────────────────────────────────────────────
    public function visitStart($ctx): mixed
    {
        // Hoisting: registrar todas las funciones primero
        foreach ($ctx->topDecl() as $decl) {
            if ($decl instanceof \Context\DeclFunctionContext) {
                $this->visitDeclFunction($decl, hoistOnly: true);
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

    // ──────────────────────────────────────────────
    // Declaraciones de nivel superior
    // ──────────────────────────────────────────────
    public function visitDeclFunction($ctx, bool $hoistOnly = false): mixed
    {
        $name = $ctx->ID()->getText();

        if ($hoistOnly) {
            $this->functions[$name] = $ctx;
            return null;
        }
        // Si ya fue registrado en hoisting, no hay nada más que hacer aquí
        if (!isset($this->functions[$name])) {
            $this->functions[$name] = $ctx;
        }
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

    public function visitDeclStruct($ctx): mixed
    {
        // Structs: se registran como tipo (implementación básica)
        return null;
    }

    // ──────────────────────────────────────────────
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

    // ──────────────────────────────────────────────
    // Block
    // ──────────────────────────────────────────────
    public function visitBlock($ctx): mixed
    {
        foreach ($ctx->statement() as $stmt) {
            $this->visit($stmt);
        }
        return null;
    }

    // ──────────────────────────────────────────────
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

    public function visitStmtStructAssign($ctx): mixed
    {
        return $this->visitStructAssignment($ctx->structAssignment());
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
            // ptrVal es un array ['ref' => &env, 'id' => name]
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

    // ──────────────────────────────────────────────
    // varDecl / constDecl / shortDecl
    // ──────────────────────────────────────────────
    public function visitVarDecl($ctx): mixed
    {
        $ids   = $ctx->ID();
        $type  = $ctx->type()->getText();
        $values = $ctx->valores() ? $this->visitValores($ctx->valores()) : [];

        foreach ($ids as $i => $idNode) {
            $name = $idNode->getText();
            $val  = $values[$i] ?? $this->defaultValue($type);
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
        $values = $this->visitValores($ctx->valores());

        foreach ($ids as $i => $idNode) {
            $name = $idNode->getText();
            $val  = $values[$i] ?? null;
            $type = $this->inferType($val);
            try {
                if ($this->currentEnv->existsLocal($name)) {
                    // Al menos uno debe ser nuevo: si todos existen solo asignamos
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

    // ──────────────────────────────────────────────
    // Assignment
    // ──────────────────────────────────────────────
    public function visitAssignSimple($ctx): mixed
    {
        $ids    = $ctx->ID();
        $values = $this->visitValores($ctx->valores());

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

    // ──────────────────────────────────────────────
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

    // ──────────────────────────────────────────────
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

    // ──────────────────────────────────────────────
    // If
    // ──────────────────────────────────────────────
    public function visitIfStmt($ctx): mixed
    {
        $cond = $this->visit($ctx->expression());

        $prev = $this->currentEnv;
        $this->currentEnv = $this->currentEnv->createChild('if');

        if ($cond) {
            $this->visitBlock($ctx->block());
        } else {
            $alts = $ctx->ifStmt();
            $blocks = $ctx->block();
            if ($alts && count($alts) > 0) {
                $this->visitIfStmt($alts[0]);
            } elseif (count($blocks) > 1) {
                $this->visitBlock($blocks[1]);
            }
        }

        $this->currentEnv = $prev;
        return null;
    }

    // ──────────────────────────────────────────────
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

    // ──────────────────────────────────────────────
    // For
    // ──────────────────────────────────────────────
    public function visitForStmt($ctx): mixed
    {
        $prev = $this->currentEnv;
        $this->currentEnv = $this->currentEnv->createChild('for');

        $children = $ctx->children ?? [];

        // for { } — bucle infinito
        // for expr { } — while
        // for init; cond; post { } — for clásico

        $initCtx  = null;
        $condCtx  = null;
        $postCtx  = null;
        $hasClassic = false;

        // Detectar forma: contamos tokens ';'
        $semicolons = 0;
        foreach ($ctx->children as $child) {
            if (method_exists($child, 'getText') && $child->getText() === ';') {
                $semicolons++;
            }
        }

        if ($semicolons >= 2) {
            // for init; cond; post
            $hasClassic = true;
            $initNode = $ctx->varDecl() ?? $ctx->shortDecl() ?? null;
            if ($initNode) $this->visit($initNode);
            $condCtx = $ctx->expression();
            $postCtx = $ctx->assignment() ?? $ctx->increment() ?? null;
        } elseif ($ctx->expression()) {
            $condCtx = $ctx->expression();
        }
        // else: bucle infinito

        try {
            while (true) {
                if ($condCtx) {
                    $cond = $this->visit($condCtx);
                    if (!$cond) break;
                }

                try {
                    $this->visitBlock($ctx->block());
                } catch (ContinueSignal) {
                    // continuar con el post
                }

                if ($postCtx) $this->visit($postCtx);
            }
        } catch (BreakSignal) {}

        $this->currentEnv = $prev;
        return null;
    }

    // ──────────────────────────────────────────────
    // Return
    // ──────────────────────────────────────────────
    public function visitReturnStmt($ctx): mixed
    {
        $values = $ctx->valores() ? $this->visitValores($ctx->valores()) : [];
        $retVal = count($values) === 1 ? $values[0] : (count($values) > 1 ? $values : null);
        throw new ReturnSignal($retVal);
    }

    // ──────────────────────────────────────────────
    // Array assignment:  id[i][j]... = expr
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

    // ──────────────────────────────────────────────
    // Struct assignment:  expr.id = expr
    // ──────────────────────────────────────────────
    public function visitStructAssignment($ctx): mixed
    {
        // Implementación básica: solo soporta id.field = expr
        $exprs = $ctx->expression();
        $field = $ctx->ID()->getText();
        $obj   = $this->visit($exprs[0]);
        $val   = $this->visit($exprs[1]);

        if (is_array($obj)) {
            $obj[$field] = $val;
            // Intentar asignar de vuelta si el objeto era un id
            if ($ctx->expression(0) instanceof \Context\ExprIdContext) {
                $idName = $ctx->expression(0)->ID()->getText();
                try { $this->currentEnv->assign($idName, $obj); } catch (\Throwable) {}
            }
        }
        return null;
    }

    // ──────────────────────────────────────────────
    // Valores (lista de expresiones)
    // ──────────────────────────────────────────────
    private function visitValores($ctx): array
    {
        if ($ctx === null) return [];
        return array_map(fn($e) => $this->visit($e), $ctx->expression());
    }

    // ──────────────────────────────────────────────
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

        return match($op) {
            '+' => is_string($l) && is_string($r) ? $l . $r : $l + $r,
            '-' => $l - $r,
            default => null,
        };
    }

    public function visitExprMulDiv($ctx): mixed
    {
        $l  = $this->visit($ctx->expression(0));
        $r  = $this->visit($ctx->expression(1));
        $op = $ctx->getChild(1)->getText();

        if ($l === null || $r === null) return null;

        return match($op) {
            '*'   => is_string($l) && is_int($r) ? str_repeat($l, $r)
                   : (is_int($r) && is_string($r) ? str_repeat($r, $l) : $l * $r),
            '/'   => $r != 0 ? (is_int($l) && is_int($r) ? intdiv($l, $r) : $l / $r) : null,
            '%'   => $r != 0 ? $l % $r : null,
            default => null,
        };
    }

    public function visitExprRelational($ctx): mixed
    {
        $l  = $this->visit($ctx->expression(0));
        $r  = $this->visit($ctx->expression(1));
        $op = $ctx->getChild(1)->getText();

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

    public function visitExprStructAccess($ctx): mixed
    {
        $obj   = $this->visit($ctx->expression());
        $field = $ctx->ID()->getText();

        if (is_array($obj)) {
            return $obj[$field] ?? null;
        }
        return null;
    }

    public function visitExprArrayLit($ctx): mixed
    {
        return $this->visitArrayLiteral($ctx->arrayLiteral());
    }

    public function visitExprStructLit($ctx): mixed
    {
        // id{val, val, ...}  — struct literal básico
        $values = $ctx->valores() ? $this->visitValores($ctx->valores()) : [];
        // Retornar como array asociativo (los campos del struct no se validan aquí)
        return $values;
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

    // ──────────────────────────────────────────────
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

    // ──────────────────────────────────────────────
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
            // Quitar comillas simples
            $inner = substr($text, 1, -1);
            return stripcslashes($inner);
        }
        return null;
    }

    // ──────────────────────────────────────────────
    // Array literal
    // ──────────────────────────────────────────────
    public function visitArrayLiteral($ctx): mixed
    {
        $values = $ctx->valores() ? $this->visitValores($ctx->valores()) : [];
        return $values;
    }
}
