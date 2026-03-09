<?php

use Antlr\Antlr4\Runtime\Error\Listeners\BaseErrorListener;
use Antlr\Antlr4\Runtime\Recognizer;
use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;

// ──────────────────────────────────────────────
// Excepción de runtime del intérprete
// ──────────────────────────────────────────────
class GolampiRuntimeError extends RuntimeException
{
    private int $errorLine;
    private int $errorColumn;

    public function __construct(string $message, int $line = 0, int $column = 0)
    {
        parent::__construct($message);
        $this->errorLine   = $line;
        $this->errorColumn = $column;
    }

    public function getErrorLine(): int    { return $this->errorLine; }
    public function getColumn(): int  { return $this->errorColumn; }
}

// ──────────────────────────────────────────────
// Señales de control de flujo (Break / Continue / Return)
// No son errores, se usan como excepciones de control
// ──────────────────────────────────────────────
class BreakSignal    extends RuntimeException {}
class ContinueSignal extends RuntimeException {}

class ReturnSignal extends RuntimeException
{
    public mixed $value;
    public function __construct(mixed $value) {
        parent::__construct();
        $this->value = $value;
    }
}

// ──────────────────────────────────────────────
// Colector de errores léxicos/sintácticos (ANTLR listener)
// ──────────────────────────────────────────────
class GolampiErrorCollector extends BaseErrorListener
{
    /** @var array<int, array> */
    private array $errors     = [];
    private bool  $fatalError = false;

    // Llamado por ANTLR al detectar un error léxico/sintáctico
    public function syntaxError(
        Recognizer $recognizer,
        ?object    $offendingSymbol,
        int        $line,
        int        $charPositionInLine,
        string     $msg,
        ?RecognitionException $e
    ): void {
        // Distinguir léxico vs sintáctico por el tipo de recognizer
        $type = ($recognizer instanceof \GolampiLexer) ? 'Léxico' : 'Sintáctico';

        $this->errors[] = [
            'type'    => $type,
            'desc'    => $msg,
            'line'    => $line,
            'column'  => $charPositionInLine + 1,
        ];

        if ($type === 'Sintáctico') {
            $this->fatalError = true;
        }
    }

    public function addSemanticError(string $desc, int $line = 0, int $col = 0): void
    {
        $this->errors[] = [
            'type'   => 'Semántico',
            'desc'   => $desc,
            'line'   => $line,
            'column' => $col,
        ];
    }

    public function hasFatalError(): bool  { return $this->fatalError; }
    public function getErrors(): array     { return $this->errors;     }
}
