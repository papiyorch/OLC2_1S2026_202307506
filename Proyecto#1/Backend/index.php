<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Autoload: Composer + clases propias
// ──────────────────────────────────────────────
require_once __DIR__ . '/vendor/autoload.php';

// Cargar archivos generados por ANTLR4
require_once __DIR__ . '/antlr/GolampiLexer.php';
require_once __DIR__ . '/antlr/GolampiParser.php';
require_once __DIR__ . '/antlr/GolampiVisitor.php';
require_once __DIR__ . '/antlr/GolampiBaseVisitor.php';

// Cargar intérprete
require_once __DIR__ . '/interpreter/Environment.php';
require_once __DIR__ . '/interpreter/GolampiError.php';
require_once __DIR__ . '/interpreter/GolampiInterpreter.php';

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Listeners\DiagnosticErrorListener;
use Antlr\Antlr4\Runtime\InputStream;

// Leer input
// ──────────────────────────────────────────────
$body = json_decode(file_get_contents('php://input'), true);
$sourceCode = $body['code'] ?? '';

if (trim($sourceCode) === '') {
    echo json_encode([
        'output'  => '',
        'errors'  => [],
        'symbols' => [],
    ]);
    exit();
}

// Análisis léxico y sintáctico
// ──────────────────────────────────────────────
$errorCollector = new GolampiErrorCollector();

$input  = InputStream::fromString($sourceCode);
$lexer  = new GolampiLexer($input);
$lexer->removeErrorListeners();
$lexer->addErrorListener($errorCollector);

$tokens = new CommonTokenStream($lexer);
$parser = new GolampiParser($tokens);
$parser->removeErrorListeners();
$parser->addErrorListener($errorCollector);

$tree = $parser->start();

// Interpretación 
// ──────────────────────────────────────────────
$output      = '';
$symbolTable = [];
$interpreter = null;

$interpreter = new GolampiInterpreter();
try {
    $interpreter->visitStart($tree);
} catch (GolampiRuntimeError $e) {
    $errorCollector->addSemanticError($e->getMessage(), $e->getErrorLine(), $e->getColumn());
} catch (\Throwable $e) {
    // Silently catch other throwables
}
$output      = $interpreter->getOutput();
$symbolTable = $interpreter->getSymbolTable();

// Respuesta JSON
// ──────────────────────────────────────────────
$allErrors = array_merge($errorCollector->getErrors(), $interpreter->getSemanticErrors());

echo json_encode([
    'output'  => $output,
    'errors'  => $allErrors,
    'symbols' => $symbolTable,
]);
