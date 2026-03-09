<?php

/*
 * Generated from Golampi.g4 by ANTLR 4.13.1
 */

namespace {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class GolampiParser extends Parser
	{
		public const FUNC = 1, VAR = 2, CONST = 3, IF = 4, ELSE = 5, SWITCH = 6, 
               CASE = 7, DEFAULT = 8, FOR = 9, BREAK = 10, CONTIN = 11, 
               RETURN = 12, NIL = 13, PRINT = 14, PRINTLN = 15, STRUCT = 16, 
               TYPE = 17, INT32 = 18, FLOAT32 = 19, BOOL = 20, RUNE = 21, 
               STRING = 22, BOOL_LIT = 23, FMT_PRINTLN = 24, LEN = 25, NOW = 26, 
               SUBSTR = 27, TYPEOF = 28, ASSIGN = 29, DECL_ASSIGN = 30, 
               PLUS_ASSIGN = 31, MINUS_ASSIGN = 32, MUL_ASSIGN = 33, DIV_ASSIGN = 34, 
               MOD_ASSIGN = 35, INC = 36, DEC = 37, PLUS = 38, MINUS = 39, 
               MUL = 40, DIV = 41, MOD = 42, EQ = 43, NEQ = 44, LT = 45, 
               LE = 46, GT = 47, GE = 48, AND = 49, OR = 50, NOT = 51, AMP = 52, 
               LPAREN = 53, RPAREN = 54, LBRACE = 55, RBRACE = 56, LBRACK = 57, 
               RBRACK = 58, SEMI = 59, COLON = 60, COMMA = 61, DOT = 62, 
               ID = 63, ENTERO = 64, DECIMAL = 65, STRING_LITERAL = 66, 
               RUNE_LITERAL = 67, COMMENT_SINGLE = 68, COMMENT_MULTI = 69, 
               WS = 70, ERR_CHAR = 71;

		public const RULE_start = 0, RULE_topDecl = 1, RULE_functionDecl = 2, 
               RULE_returnTypes = 3, RULE_structureDecl = 4, RULE_paramList = 5, 
               RULE_parametro = 6, RULE_block = 7, RULE_statement = 8, RULE_varDecl = 9, 
               RULE_constantDecl = 10, RULE_shortDecl = 11, RULE_assignment = 12, 
               RULE_increment = 13, RULE_printStmt = 14, RULE_ifStmt = 15, 
               RULE_switchStmt = 16, RULE_switchBlock = 17, RULE_caseStmt = 18, 
               RULE_defaultStmt = 19, RULE_forStmt = 20, RULE_breakStmt = 21, 
               RULE_continueStmt = 22, RULE_returnStmt = 23, RULE_arrayAssignment = 24, 
               RULE_expression = 25, RULE_valores = 26, RULE_type = 27, 
               RULE_literal = 28, RULE_arrayLiteral = 29, RULE_structAssignment = 30;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'start', 'topDecl', 'functionDecl', 'returnTypes', 'structureDecl', 'paramList', 
			'parametro', 'block', 'statement', 'varDecl', 'constantDecl', 'shortDecl', 
			'assignment', 'increment', 'printStmt', 'ifStmt', 'switchStmt', 'switchBlock', 
			'caseStmt', 'defaultStmt', 'forStmt', 'breakStmt', 'continueStmt', 'returnStmt', 
			'arrayAssignment', 'expression', 'valores', 'type', 'literal', 'arrayLiteral', 
			'structAssignment'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'func'", "'var'", "'const'", "'if'", "'else'", "'switch'", 
		    "'case'", "'default'", "'for'", "'break'", "'continue'", "'return'", 
		    "'nil'", "'print'", "'println'", "'struct'", "'type'", "'int32'", 
		    "'float32'", "'bool'", "'rune'", "'string'", null, "'fmt.Println'", 
		    "'len'", "'now'", "'substr'", "'typeOf'", "'='", "':='", "'+='", "'-='", 
		    "'*='", "'/='", "'%='", "'++'", "'--'", "'+'", "'-'", "'*'", "'/'", 
		    "'%'", "'=='", "'!='", "'<'", "'<='", "'>'", "'>='", "'&&'", "'||'", 
		    "'!'", "'&'", "'('", "')'", "'{'", "'}'", "'['", "']'", "';'", "':'", 
		    "','", "'.'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, "FUNC", "VAR", "CONST", "IF", "ELSE", "SWITCH", "CASE", "DEFAULT", 
		    "FOR", "BREAK", "CONTIN", "RETURN", "NIL", "PRINT", "PRINTLN", "STRUCT", 
		    "TYPE", "INT32", "FLOAT32", "BOOL", "RUNE", "STRING", "BOOL_LIT", 
		    "FMT_PRINTLN", "LEN", "NOW", "SUBSTR", "TYPEOF", "ASSIGN", "DECL_ASSIGN", 
		    "PLUS_ASSIGN", "MINUS_ASSIGN", "MUL_ASSIGN", "DIV_ASSIGN", "MOD_ASSIGN", 
		    "INC", "DEC", "PLUS", "MINUS", "MUL", "DIV", "MOD", "EQ", "NEQ", "LT", 
		    "LE", "GT", "GE", "AND", "OR", "NOT", "AMP", "LPAREN", "RPAREN", "LBRACE", 
		    "RBRACE", "LBRACK", "RBRACK", "SEMI", "COLON", "COMMA", "DOT", "ID", 
		    "ENTERO", "DECIMAL", "STRING_LITERAL", "RUNE_LITERAL", "COMMENT_SINGLE", 
		    "COMMENT_MULTI", "WS", "ERR_CHAR"
		];

		private const SERIALIZED_ATN =
			[4, 1, 71, 455, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 1, 0, 5, 0, 64, 8, 0, 10, 0, 12, 0, 67, 
		    9, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 3, 1, 75, 8, 1, 1, 2, 1, 
		    2, 1, 2, 1, 2, 3, 2, 81, 8, 2, 1, 2, 1, 2, 3, 2, 85, 8, 2, 1, 2, 1, 
		    2, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 5, 3, 94, 8, 3, 10, 3, 12, 3, 97, 
		    9, 3, 1, 3, 1, 3, 3, 3, 101, 8, 3, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 
		    4, 1, 4, 1, 4, 5, 4, 111, 8, 4, 10, 4, 12, 4, 114, 9, 4, 1, 4, 1, 
		    4, 1, 5, 1, 5, 1, 5, 5, 5, 121, 8, 5, 10, 5, 12, 5, 124, 9, 5, 1, 
		    6, 1, 6, 1, 6, 1, 7, 1, 7, 5, 7, 131, 8, 7, 10, 7, 12, 7, 134, 9, 
		    7, 1, 7, 1, 7, 1, 8, 1, 8, 3, 8, 140, 8, 8, 1, 8, 1, 8, 3, 8, 144, 
		    8, 8, 1, 8, 1, 8, 3, 8, 148, 8, 8, 1, 8, 1, 8, 3, 8, 152, 8, 8, 1, 
		    8, 1, 8, 3, 8, 156, 8, 8, 1, 8, 1, 8, 3, 8, 160, 8, 8, 1, 8, 1, 8, 
		    3, 8, 164, 8, 8, 1, 8, 1, 8, 3, 8, 168, 8, 8, 1, 8, 1, 8, 3, 8, 172, 
		    8, 8, 1, 8, 1, 8, 3, 8, 176, 8, 8, 1, 8, 1, 8, 3, 8, 180, 8, 8, 1, 
		    8, 1, 8, 3, 8, 184, 8, 8, 1, 8, 1, 8, 3, 8, 188, 8, 8, 1, 8, 1, 8, 
		    3, 8, 192, 8, 8, 1, 8, 1, 8, 3, 8, 196, 8, 8, 1, 8, 1, 8, 3, 8, 200, 
		    8, 8, 1, 8, 1, 8, 4, 8, 204, 8, 8, 11, 8, 12, 8, 205, 1, 8, 1, 8, 
		    1, 8, 1, 8, 1, 8, 3, 8, 213, 8, 8, 1, 9, 1, 9, 1, 9, 1, 9, 5, 9, 219, 
		    8, 9, 10, 9, 12, 9, 222, 9, 9, 1, 9, 1, 9, 1, 9, 3, 9, 227, 8, 9, 
		    1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 11, 1, 11, 1, 11, 5, 
		    11, 238, 8, 11, 10, 11, 12, 11, 241, 9, 11, 1, 11, 1, 11, 1, 11, 1, 
		    12, 1, 12, 1, 12, 5, 12, 249, 8, 12, 10, 12, 12, 12, 252, 9, 12, 1, 
		    12, 1, 12, 1, 12, 1, 12, 1, 12, 3, 12, 259, 8, 12, 1, 13, 1, 13, 1, 
		    13, 1, 14, 1, 14, 1, 14, 3, 14, 267, 8, 14, 1, 14, 1, 14, 1, 15, 1, 
		    15, 1, 15, 1, 15, 1, 15, 1, 15, 3, 15, 277, 8, 15, 3, 15, 279, 8, 
		    15, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 17, 5, 17, 288, 8, 
		    17, 10, 17, 12, 17, 291, 9, 17, 1, 17, 3, 17, 294, 8, 17, 1, 18, 1, 
		    18, 1, 18, 1, 18, 5, 18, 300, 8, 18, 10, 18, 12, 18, 303, 9, 18, 1, 
		    19, 1, 19, 1, 19, 5, 19, 308, 8, 19, 10, 19, 12, 19, 311, 9, 19, 1, 
		    20, 1, 20, 1, 20, 1, 20, 3, 20, 317, 8, 20, 1, 20, 1, 20, 1, 20, 1, 
		    20, 1, 20, 3, 20, 324, 8, 20, 3, 20, 326, 8, 20, 1, 20, 1, 20, 1, 
		    21, 1, 21, 1, 22, 1, 22, 1, 23, 1, 23, 3, 23, 336, 8, 23, 1, 24, 1, 
		    24, 1, 24, 1, 24, 1, 24, 4, 24, 343, 8, 24, 11, 24, 12, 24, 344, 1, 
		    24, 1, 24, 1, 24, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 
		    1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 3, 25, 362, 8, 25, 1, 25, 1, 25, 
		    1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 3, 25, 373, 8, 25, 
		    1, 25, 1, 25, 1, 25, 3, 25, 378, 8, 25, 1, 25, 1, 25, 1, 25, 1, 25, 
		    1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 
		    25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 
		    1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 1, 25, 3, 25, 409, 8, 25, 1, 25, 
		    5, 25, 412, 8, 25, 10, 25, 12, 25, 415, 9, 25, 1, 26, 1, 26, 1, 26, 
		    5, 26, 420, 8, 26, 10, 26, 12, 26, 423, 9, 26, 1, 27, 1, 27, 1, 27, 
		    1, 27, 1, 27, 1, 27, 1, 27, 1, 27, 1, 27, 1, 27, 1, 27, 1, 27, 1, 
		    27, 3, 27, 438, 8, 27, 1, 28, 1, 28, 1, 29, 1, 29, 1, 29, 3, 29, 445, 
		    8, 29, 1, 29, 1, 29, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 
		    30, 0, 1, 50, 31, 0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 
		    28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48, 50, 52, 54, 56, 58, 60, 
		    0, 9, 1, 0, 31, 35, 1, 0, 36, 37, 2, 0, 14, 15, 24, 24, 1, 0, 25, 
		    28, 1, 0, 40, 42, 1, 0, 38, 39, 1, 0, 45, 48, 1, 0, 43, 44, 3, 0, 
		    13, 13, 23, 23, 64, 67, 516, 0, 65, 1, 0, 0, 0, 2, 74, 1, 0, 0, 0, 
		    4, 76, 1, 0, 0, 0, 6, 100, 1, 0, 0, 0, 8, 102, 1, 0, 0, 0, 10, 117, 
		    1, 0, 0, 0, 12, 125, 1, 0, 0, 0, 14, 128, 1, 0, 0, 0, 16, 212, 1, 
		    0, 0, 0, 18, 214, 1, 0, 0, 0, 20, 228, 1, 0, 0, 0, 22, 234, 1, 0, 
		    0, 0, 24, 258, 1, 0, 0, 0, 26, 260, 1, 0, 0, 0, 28, 263, 1, 0, 0, 
		    0, 30, 270, 1, 0, 0, 0, 32, 280, 1, 0, 0, 0, 34, 289, 1, 0, 0, 0, 
		    36, 295, 1, 0, 0, 0, 38, 304, 1, 0, 0, 0, 40, 312, 1, 0, 0, 0, 42, 
		    329, 1, 0, 0, 0, 44, 331, 1, 0, 0, 0, 46, 333, 1, 0, 0, 0, 48, 337, 
		    1, 0, 0, 0, 50, 377, 1, 0, 0, 0, 52, 416, 1, 0, 0, 0, 54, 437, 1, 
		    0, 0, 0, 56, 439, 1, 0, 0, 0, 58, 441, 1, 0, 0, 0, 60, 448, 1, 0, 
		    0, 0, 62, 64, 3, 2, 1, 0, 63, 62, 1, 0, 0, 0, 64, 67, 1, 0, 0, 0, 
		    65, 63, 1, 0, 0, 0, 65, 66, 1, 0, 0, 0, 66, 68, 1, 0, 0, 0, 67, 65, 
		    1, 0, 0, 0, 68, 69, 5, 0, 0, 1, 69, 1, 1, 0, 0, 0, 70, 75, 3, 4, 2, 
		    0, 71, 75, 3, 18, 9, 0, 72, 75, 3, 20, 10, 0, 73, 75, 3, 8, 4, 0, 
		    74, 70, 1, 0, 0, 0, 74, 71, 1, 0, 0, 0, 74, 72, 1, 0, 0, 0, 74, 73, 
		    1, 0, 0, 0, 75, 3, 1, 0, 0, 0, 76, 77, 5, 1, 0, 0, 77, 78, 5, 63, 
		    0, 0, 78, 80, 5, 53, 0, 0, 79, 81, 3, 10, 5, 0, 80, 79, 1, 0, 0, 0, 
		    80, 81, 1, 0, 0, 0, 81, 82, 1, 0, 0, 0, 82, 84, 5, 54, 0, 0, 83, 85, 
		    3, 6, 3, 0, 84, 83, 1, 0, 0, 0, 84, 85, 1, 0, 0, 0, 85, 86, 1, 0, 
		    0, 0, 86, 87, 3, 14, 7, 0, 87, 5, 1, 0, 0, 0, 88, 101, 3, 54, 27, 
		    0, 89, 90, 5, 53, 0, 0, 90, 95, 3, 54, 27, 0, 91, 92, 5, 61, 0, 0, 
		    92, 94, 3, 54, 27, 0, 93, 91, 1, 0, 0, 0, 94, 97, 1, 0, 0, 0, 95, 
		    93, 1, 0, 0, 0, 95, 96, 1, 0, 0, 0, 96, 98, 1, 0, 0, 0, 97, 95, 1, 
		    0, 0, 0, 98, 99, 5, 54, 0, 0, 99, 101, 1, 0, 0, 0, 100, 88, 1, 0, 
		    0, 0, 100, 89, 1, 0, 0, 0, 101, 7, 1, 0, 0, 0, 102, 103, 5, 17, 0, 
		    0, 103, 104, 5, 63, 0, 0, 104, 105, 5, 16, 0, 0, 105, 112, 5, 55, 
		    0, 0, 106, 107, 5, 63, 0, 0, 107, 108, 3, 54, 27, 0, 108, 109, 5, 
		    59, 0, 0, 109, 111, 1, 0, 0, 0, 110, 106, 1, 0, 0, 0, 111, 114, 1, 
		    0, 0, 0, 112, 110, 1, 0, 0, 0, 112, 113, 1, 0, 0, 0, 113, 115, 1, 
		    0, 0, 0, 114, 112, 1, 0, 0, 0, 115, 116, 5, 56, 0, 0, 116, 9, 1, 0, 
		    0, 0, 117, 122, 3, 12, 6, 0, 118, 119, 5, 61, 0, 0, 119, 121, 3, 12, 
		    6, 0, 120, 118, 1, 0, 0, 0, 121, 124, 1, 0, 0, 0, 122, 120, 1, 0, 
		    0, 0, 122, 123, 1, 0, 0, 0, 123, 11, 1, 0, 0, 0, 124, 122, 1, 0, 0, 
		    0, 125, 126, 5, 63, 0, 0, 126, 127, 3, 54, 27, 0, 127, 13, 1, 0, 0, 
		    0, 128, 132, 5, 55, 0, 0, 129, 131, 3, 16, 8, 0, 130, 129, 1, 0, 0, 
		    0, 131, 134, 1, 0, 0, 0, 132, 130, 1, 0, 0, 0, 132, 133, 1, 0, 0, 
		    0, 133, 135, 1, 0, 0, 0, 134, 132, 1, 0, 0, 0, 135, 136, 5, 56, 0, 
		    0, 136, 15, 1, 0, 0, 0, 137, 139, 3, 18, 9, 0, 138, 140, 5, 59, 0, 
		    0, 139, 138, 1, 0, 0, 0, 139, 140, 1, 0, 0, 0, 140, 213, 1, 0, 0, 
		    0, 141, 143, 3, 20, 10, 0, 142, 144, 5, 59, 0, 0, 143, 142, 1, 0, 
		    0, 0, 143, 144, 1, 0, 0, 0, 144, 213, 1, 0, 0, 0, 145, 147, 3, 22, 
		    11, 0, 146, 148, 5, 59, 0, 0, 147, 146, 1, 0, 0, 0, 147, 148, 1, 0, 
		    0, 0, 148, 213, 1, 0, 0, 0, 149, 151, 3, 24, 12, 0, 150, 152, 5, 59, 
		    0, 0, 151, 150, 1, 0, 0, 0, 151, 152, 1, 0, 0, 0, 152, 213, 1, 0, 
		    0, 0, 153, 155, 3, 26, 13, 0, 154, 156, 5, 59, 0, 0, 155, 154, 1, 
		    0, 0, 0, 155, 156, 1, 0, 0, 0, 156, 213, 1, 0, 0, 0, 157, 159, 3, 
		    28, 14, 0, 158, 160, 5, 59, 0, 0, 159, 158, 1, 0, 0, 0, 159, 160, 
		    1, 0, 0, 0, 160, 213, 1, 0, 0, 0, 161, 163, 3, 30, 15, 0, 162, 164, 
		    5, 59, 0, 0, 163, 162, 1, 0, 0, 0, 163, 164, 1, 0, 0, 0, 164, 213, 
		    1, 0, 0, 0, 165, 167, 3, 32, 16, 0, 166, 168, 5, 59, 0, 0, 167, 166, 
		    1, 0, 0, 0, 167, 168, 1, 0, 0, 0, 168, 213, 1, 0, 0, 0, 169, 171, 
		    3, 40, 20, 0, 170, 172, 5, 59, 0, 0, 171, 170, 1, 0, 0, 0, 171, 172, 
		    1, 0, 0, 0, 172, 213, 1, 0, 0, 0, 173, 175, 3, 42, 21, 0, 174, 176, 
		    5, 59, 0, 0, 175, 174, 1, 0, 0, 0, 175, 176, 1, 0, 0, 0, 176, 213, 
		    1, 0, 0, 0, 177, 179, 3, 44, 22, 0, 178, 180, 5, 59, 0, 0, 179, 178, 
		    1, 0, 0, 0, 179, 180, 1, 0, 0, 0, 180, 213, 1, 0, 0, 0, 181, 183, 
		    3, 14, 7, 0, 182, 184, 5, 59, 0, 0, 183, 182, 1, 0, 0, 0, 183, 184, 
		    1, 0, 0, 0, 184, 213, 1, 0, 0, 0, 185, 187, 3, 46, 23, 0, 186, 188, 
		    5, 59, 0, 0, 187, 186, 1, 0, 0, 0, 187, 188, 1, 0, 0, 0, 188, 213, 
		    1, 0, 0, 0, 189, 191, 3, 48, 24, 0, 190, 192, 5, 59, 0, 0, 191, 190, 
		    1, 0, 0, 0, 191, 192, 1, 0, 0, 0, 192, 213, 1, 0, 0, 0, 193, 195, 
		    3, 50, 25, 0, 194, 196, 5, 59, 0, 0, 195, 194, 1, 0, 0, 0, 195, 196, 
		    1, 0, 0, 0, 196, 213, 1, 0, 0, 0, 197, 199, 3, 60, 30, 0, 198, 200, 
		    5, 59, 0, 0, 199, 198, 1, 0, 0, 0, 199, 200, 1, 0, 0, 0, 200, 213, 
		    1, 0, 0, 0, 201, 213, 5, 59, 0, 0, 202, 204, 5, 40, 0, 0, 203, 202, 
		    1, 0, 0, 0, 204, 205, 1, 0, 0, 0, 205, 203, 1, 0, 0, 0, 205, 206, 
		    1, 0, 0, 0, 206, 207, 1, 0, 0, 0, 207, 208, 5, 63, 0, 0, 208, 209, 
		    5, 29, 0, 0, 209, 210, 3, 50, 25, 0, 210, 211, 5, 59, 0, 0, 211, 213, 
		    1, 0, 0, 0, 212, 137, 1, 0, 0, 0, 212, 141, 1, 0, 0, 0, 212, 145, 
		    1, 0, 0, 0, 212, 149, 1, 0, 0, 0, 212, 153, 1, 0, 0, 0, 212, 157, 
		    1, 0, 0, 0, 212, 161, 1, 0, 0, 0, 212, 165, 1, 0, 0, 0, 212, 169, 
		    1, 0, 0, 0, 212, 173, 1, 0, 0, 0, 212, 177, 1, 0, 0, 0, 212, 181, 
		    1, 0, 0, 0, 212, 185, 1, 0, 0, 0, 212, 189, 1, 0, 0, 0, 212, 193, 
		    1, 0, 0, 0, 212, 197, 1, 0, 0, 0, 212, 201, 1, 0, 0, 0, 212, 203, 
		    1, 0, 0, 0, 213, 17, 1, 0, 0, 0, 214, 215, 5, 2, 0, 0, 215, 220, 5, 
		    63, 0, 0, 216, 217, 5, 61, 0, 0, 217, 219, 5, 63, 0, 0, 218, 216, 
		    1, 0, 0, 0, 219, 222, 1, 0, 0, 0, 220, 218, 1, 0, 0, 0, 220, 221, 
		    1, 0, 0, 0, 221, 223, 1, 0, 0, 0, 222, 220, 1, 0, 0, 0, 223, 226, 
		    3, 54, 27, 0, 224, 225, 5, 29, 0, 0, 225, 227, 3, 52, 26, 0, 226, 
		    224, 1, 0, 0, 0, 226, 227, 1, 0, 0, 0, 227, 19, 1, 0, 0, 0, 228, 229, 
		    5, 3, 0, 0, 229, 230, 5, 63, 0, 0, 230, 231, 3, 54, 27, 0, 231, 232, 
		    5, 29, 0, 0, 232, 233, 3, 50, 25, 0, 233, 21, 1, 0, 0, 0, 234, 239, 
		    5, 63, 0, 0, 235, 236, 5, 61, 0, 0, 236, 238, 5, 63, 0, 0, 237, 235, 
		    1, 0, 0, 0, 238, 241, 1, 0, 0, 0, 239, 237, 1, 0, 0, 0, 239, 240, 
		    1, 0, 0, 0, 240, 242, 1, 0, 0, 0, 241, 239, 1, 0, 0, 0, 242, 243, 
		    5, 30, 0, 0, 243, 244, 3, 52, 26, 0, 244, 23, 1, 0, 0, 0, 245, 250, 
		    5, 63, 0, 0, 246, 247, 5, 61, 0, 0, 247, 249, 5, 63, 0, 0, 248, 246, 
		    1, 0, 0, 0, 249, 252, 1, 0, 0, 0, 250, 248, 1, 0, 0, 0, 250, 251, 
		    1, 0, 0, 0, 251, 253, 1, 0, 0, 0, 252, 250, 1, 0, 0, 0, 253, 254, 
		    5, 29, 0, 0, 254, 259, 3, 52, 26, 0, 255, 256, 5, 63, 0, 0, 256, 257, 
		    7, 0, 0, 0, 257, 259, 3, 50, 25, 0, 258, 245, 1, 0, 0, 0, 258, 255, 
		    1, 0, 0, 0, 259, 25, 1, 0, 0, 0, 260, 261, 5, 63, 0, 0, 261, 262, 
		    7, 1, 0, 0, 262, 27, 1, 0, 0, 0, 263, 264, 7, 2, 0, 0, 264, 266, 5, 
		    53, 0, 0, 265, 267, 3, 52, 26, 0, 266, 265, 1, 0, 0, 0, 266, 267, 
		    1, 0, 0, 0, 267, 268, 1, 0, 0, 0, 268, 269, 5, 54, 0, 0, 269, 29, 
		    1, 0, 0, 0, 270, 271, 5, 4, 0, 0, 271, 272, 3, 50, 25, 0, 272, 278, 
		    3, 14, 7, 0, 273, 276, 5, 5, 0, 0, 274, 277, 3, 30, 15, 0, 275, 277, 
		    3, 14, 7, 0, 276, 274, 1, 0, 0, 0, 276, 275, 1, 0, 0, 0, 277, 279, 
		    1, 0, 0, 0, 278, 273, 1, 0, 0, 0, 278, 279, 1, 0, 0, 0, 279, 31, 1, 
		    0, 0, 0, 280, 281, 5, 6, 0, 0, 281, 282, 3, 50, 25, 0, 282, 283, 5, 
		    55, 0, 0, 283, 284, 3, 34, 17, 0, 284, 285, 5, 56, 0, 0, 285, 33, 
		    1, 0, 0, 0, 286, 288, 3, 36, 18, 0, 287, 286, 1, 0, 0, 0, 288, 291, 
		    1, 0, 0, 0, 289, 287, 1, 0, 0, 0, 289, 290, 1, 0, 0, 0, 290, 293, 
		    1, 0, 0, 0, 291, 289, 1, 0, 0, 0, 292, 294, 3, 38, 19, 0, 293, 292, 
		    1, 0, 0, 0, 293, 294, 1, 0, 0, 0, 294, 35, 1, 0, 0, 0, 295, 296, 5, 
		    7, 0, 0, 296, 297, 3, 52, 26, 0, 297, 301, 5, 60, 0, 0, 298, 300, 
		    3, 16, 8, 0, 299, 298, 1, 0, 0, 0, 300, 303, 1, 0, 0, 0, 301, 299, 
		    1, 0, 0, 0, 301, 302, 1, 0, 0, 0, 302, 37, 1, 0, 0, 0, 303, 301, 1, 
		    0, 0, 0, 304, 305, 5, 8, 0, 0, 305, 309, 5, 60, 0, 0, 306, 308, 3, 
		    16, 8, 0, 307, 306, 1, 0, 0, 0, 308, 311, 1, 0, 0, 0, 309, 307, 1, 
		    0, 0, 0, 309, 310, 1, 0, 0, 0, 310, 39, 1, 0, 0, 0, 311, 309, 1, 0, 
		    0, 0, 312, 325, 5, 9, 0, 0, 313, 326, 3, 50, 25, 0, 314, 317, 3, 18, 
		    9, 0, 315, 317, 3, 22, 11, 0, 316, 314, 1, 0, 0, 0, 316, 315, 1, 0, 
		    0, 0, 317, 318, 1, 0, 0, 0, 318, 319, 5, 59, 0, 0, 319, 320, 3, 50, 
		    25, 0, 320, 323, 5, 59, 0, 0, 321, 324, 3, 24, 12, 0, 322, 324, 3, 
		    26, 13, 0, 323, 321, 1, 0, 0, 0, 323, 322, 1, 0, 0, 0, 324, 326, 1, 
		    0, 0, 0, 325, 313, 1, 0, 0, 0, 325, 316, 1, 0, 0, 0, 325, 326, 1, 
		    0, 0, 0, 326, 327, 1, 0, 0, 0, 327, 328, 3, 14, 7, 0, 328, 41, 1, 
		    0, 0, 0, 329, 330, 5, 10, 0, 0, 330, 43, 1, 0, 0, 0, 331, 332, 5, 
		    11, 0, 0, 332, 45, 1, 0, 0, 0, 333, 335, 5, 12, 0, 0, 334, 336, 3, 
		    52, 26, 0, 335, 334, 1, 0, 0, 0, 335, 336, 1, 0, 0, 0, 336, 47, 1, 
		    0, 0, 0, 337, 342, 5, 63, 0, 0, 338, 339, 5, 57, 0, 0, 339, 340, 3, 
		    50, 25, 0, 340, 341, 5, 58, 0, 0, 341, 343, 1, 0, 0, 0, 342, 338, 
		    1, 0, 0, 0, 343, 344, 1, 0, 0, 0, 344, 342, 1, 0, 0, 0, 344, 345, 
		    1, 0, 0, 0, 345, 346, 1, 0, 0, 0, 346, 347, 5, 29, 0, 0, 347, 348, 
		    3, 50, 25, 0, 348, 49, 1, 0, 0, 0, 349, 350, 6, 25, -1, 0, 350, 351, 
		    5, 53, 0, 0, 351, 352, 3, 50, 25, 0, 352, 353, 5, 54, 0, 0, 353, 378, 
		    1, 0, 0, 0, 354, 355, 5, 51, 0, 0, 355, 378, 3, 50, 25, 18, 356, 357, 
		    5, 39, 0, 0, 357, 378, 3, 50, 25, 17, 358, 359, 5, 63, 0, 0, 359, 
		    361, 5, 55, 0, 0, 360, 362, 3, 52, 26, 0, 361, 360, 1, 0, 0, 0, 361, 
		    362, 1, 0, 0, 0, 362, 363, 1, 0, 0, 0, 363, 378, 5, 56, 0, 0, 364, 
		    378, 3, 58, 29, 0, 365, 366, 5, 52, 0, 0, 366, 378, 5, 63, 0, 0, 367, 
		    368, 5, 40, 0, 0, 368, 378, 3, 50, 25, 13, 369, 370, 7, 3, 0, 0, 370, 
		    372, 5, 53, 0, 0, 371, 373, 3, 52, 26, 0, 372, 371, 1, 0, 0, 0, 372, 
		    373, 1, 0, 0, 0, 373, 374, 1, 0, 0, 0, 374, 378, 5, 54, 0, 0, 375, 
		    378, 5, 63, 0, 0, 376, 378, 3, 56, 28, 0, 377, 349, 1, 0, 0, 0, 377, 
		    354, 1, 0, 0, 0, 377, 356, 1, 0, 0, 0, 377, 358, 1, 0, 0, 0, 377, 
		    364, 1, 0, 0, 0, 377, 365, 1, 0, 0, 0, 377, 367, 1, 0, 0, 0, 377, 
		    369, 1, 0, 0, 0, 377, 375, 1, 0, 0, 0, 377, 376, 1, 0, 0, 0, 378, 
		    413, 1, 0, 0, 0, 379, 380, 10, 9, 0, 0, 380, 381, 7, 4, 0, 0, 381, 
		    412, 3, 50, 25, 10, 382, 383, 10, 8, 0, 0, 383, 384, 7, 5, 0, 0, 384, 
		    412, 3, 50, 25, 9, 385, 386, 10, 7, 0, 0, 386, 387, 7, 6, 0, 0, 387, 
		    412, 3, 50, 25, 8, 388, 389, 10, 6, 0, 0, 389, 390, 7, 7, 0, 0, 390, 
		    412, 3, 50, 25, 7, 391, 392, 10, 5, 0, 0, 392, 393, 5, 49, 0, 0, 393, 
		    412, 3, 50, 25, 6, 394, 395, 10, 4, 0, 0, 395, 396, 5, 50, 0, 0, 396, 
		    412, 3, 50, 25, 5, 397, 398, 10, 12, 0, 0, 398, 399, 5, 62, 0, 0, 
		    399, 412, 5, 63, 0, 0, 400, 401, 10, 11, 0, 0, 401, 402, 5, 57, 0, 
		    0, 402, 403, 3, 50, 25, 0, 403, 404, 5, 58, 0, 0, 404, 412, 1, 0, 
		    0, 0, 405, 406, 10, 10, 0, 0, 406, 408, 5, 53, 0, 0, 407, 409, 3, 
		    52, 26, 0, 408, 407, 1, 0, 0, 0, 408, 409, 1, 0, 0, 0, 409, 410, 1, 
		    0, 0, 0, 410, 412, 5, 54, 0, 0, 411, 379, 1, 0, 0, 0, 411, 382, 1, 
		    0, 0, 0, 411, 385, 1, 0, 0, 0, 411, 388, 1, 0, 0, 0, 411, 391, 1, 
		    0, 0, 0, 411, 394, 1, 0, 0, 0, 411, 397, 1, 0, 0, 0, 411, 400, 1, 
		    0, 0, 0, 411, 405, 1, 0, 0, 0, 412, 415, 1, 0, 0, 0, 413, 411, 1, 
		    0, 0, 0, 413, 414, 1, 0, 0, 0, 414, 51, 1, 0, 0, 0, 415, 413, 1, 0, 
		    0, 0, 416, 421, 3, 50, 25, 0, 417, 418, 5, 61, 0, 0, 418, 420, 3, 
		    50, 25, 0, 419, 417, 1, 0, 0, 0, 420, 423, 1, 0, 0, 0, 421, 419, 1, 
		    0, 0, 0, 421, 422, 1, 0, 0, 0, 422, 53, 1, 0, 0, 0, 423, 421, 1, 0, 
		    0, 0, 424, 438, 5, 18, 0, 0, 425, 438, 5, 19, 0, 0, 426, 438, 5, 20, 
		    0, 0, 427, 438, 5, 21, 0, 0, 428, 438, 5, 22, 0, 0, 429, 430, 5, 40, 
		    0, 0, 430, 438, 3, 54, 27, 0, 431, 432, 5, 57, 0, 0, 432, 433, 3, 
		    50, 25, 0, 433, 434, 5, 58, 0, 0, 434, 435, 3, 54, 27, 0, 435, 438, 
		    1, 0, 0, 0, 436, 438, 5, 63, 0, 0, 437, 424, 1, 0, 0, 0, 437, 425, 
		    1, 0, 0, 0, 437, 426, 1, 0, 0, 0, 437, 427, 1, 0, 0, 0, 437, 428, 
		    1, 0, 0, 0, 437, 429, 1, 0, 0, 0, 437, 431, 1, 0, 0, 0, 437, 436, 
		    1, 0, 0, 0, 438, 55, 1, 0, 0, 0, 439, 440, 7, 8, 0, 0, 440, 57, 1, 
		    0, 0, 0, 441, 442, 3, 54, 27, 0, 442, 444, 5, 55, 0, 0, 443, 445, 
		    3, 52, 26, 0, 444, 443, 1, 0, 0, 0, 444, 445, 1, 0, 0, 0, 445, 446, 
		    1, 0, 0, 0, 446, 447, 5, 56, 0, 0, 447, 59, 1, 0, 0, 0, 448, 449, 
		    3, 50, 25, 0, 449, 450, 5, 62, 0, 0, 450, 451, 5, 63, 0, 0, 451, 452, 
		    5, 29, 0, 0, 452, 453, 3, 50, 25, 0, 453, 61, 1, 0, 0, 0, 53, 65, 
		    74, 80, 84, 95, 100, 112, 122, 132, 139, 143, 147, 151, 155, 159, 
		    163, 167, 171, 175, 179, 183, 187, 191, 195, 199, 205, 212, 220, 226, 
		    239, 250, 258, 266, 276, 278, 289, 293, 301, 309, 316, 323, 325, 335, 
		    344, 361, 372, 377, 408, 411, 413, 421, 437, 444];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.13.1', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName(): string
		{
			return "Golampi.g4";
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function start(): Context\StartContext
		{
		    $localContext = new Context\StartContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_start);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(65);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 131086) !== 0)) {
		        	$this->setState(62);
		        	$this->topDecl();
		        	$this->setState(67);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(68);
		        $this->match(self::EOF);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function topDecl(): Context\TopDeclContext
		{
		    $localContext = new Context\TopDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_topDecl);

		    try {
		        $this->setState(74);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::FUNC:
		            	$localContext = new Context\DeclFunctionContext($localContext);
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(70);
		            	$this->functionDecl();
		            	break;

		            case self::VAR:
		            	$localContext = new Context\DeclGlobalVarContext($localContext);
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(71);
		            	$this->varDecl();
		            	break;

		            case self::CONST:
		            	$localContext = new Context\DeclGlobalConstContext($localContext);
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(72);
		            	$this->constantDecl();
		            	break;

		            case self::TYPE:
		            	$localContext = new Context\DeclStructContext($localContext);
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(73);
		            	$this->structureDecl();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function functionDecl(): Context\FunctionDeclContext
		{
		    $localContext = new Context\FunctionDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_functionDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(76);
		        $this->match(self::FUNC);
		        $this->setState(77);
		        $this->match(self::ID);
		        $this->setState(78);
		        $this->match(self::LPAREN);
		        $this->setState(80);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ID) {
		        	$this->setState(79);
		        	$this->paramList();
		        }
		        $this->setState(82);
		        $this->match(self::RPAREN);
		        $this->setState(84);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & -9070248550004424704) !== 0)) {
		        	$this->setState(83);
		        	$this->returnTypes();
		        }
		        $this->setState(86);
		        $this->block();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function returnTypes(): Context\ReturnTypesContext
		{
		    $localContext = new Context\ReturnTypesContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_returnTypes);

		    try {
		        $this->setState(100);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::INT32:
		            case self::FLOAT32:
		            case self::BOOL:
		            case self::RUNE:
		            case self::STRING:
		            case self::MUL:
		            case self::LBRACK:
		            case self::ID:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(88);
		            	$this->type();
		            	break;

		            case self::LPAREN:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(89);
		            	$this->match(self::LPAREN);
		            	$this->setState(90);
		            	$this->type();
		            	$this->setState(95);
		            	$this->errorHandler->sync($this);

		            	$_la = $this->input->LA(1);
		            	while ($_la === self::COMMA) {
		            		$this->setState(91);
		            		$this->match(self::COMMA);
		            		$this->setState(92);
		            		$this->type();
		            		$this->setState(97);
		            		$this->errorHandler->sync($this);
		            		$_la = $this->input->LA(1);
		            	}
		            	$this->setState(98);
		            	$this->match(self::RPAREN);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function structureDecl(): Context\StructureDeclContext
		{
		    $localContext = new Context\StructureDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_structureDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(102);
		        $this->match(self::TYPE);
		        $this->setState(103);
		        $this->match(self::ID);
		        $this->setState(104);
		        $this->match(self::STRUCT);
		        $this->setState(105);
		        $this->match(self::LBRACE);
		        $this->setState(112);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::ID) {
		        	$this->setState(106);
		        	$this->match(self::ID);
		        	$this->setState(107);
		        	$this->type();
		        	$this->setState(108);
		        	$this->match(self::SEMI);
		        	$this->setState(114);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(115);
		        $this->match(self::RBRACE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function paramList(): Context\ParamListContext
		{
		    $localContext = new Context\ParamListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_paramList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(117);
		        $this->parametro();
		        $this->setState(122);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(118);
		        	$this->match(self::COMMA);
		        	$this->setState(119);
		        	$this->parametro();
		        	$this->setState(124);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function parametro(): Context\ParametroContext
		{
		    $localContext = new Context\ParametroContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_parametro);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(125);
		        $this->match(self::ID);
		        $this->setState(126);
		        $this->type();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function block(): Context\BlockContext
		{
		    $localContext = new Context\BlockContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_block);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(128);
		        $this->match(self::LBRACE);
		        $this->setState(132);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & -8451003050956620196) !== 0) || (((($_la - 64)) & ~0x3f) === 0 && ((1 << ($_la - 64)) & 15) !== 0)) {
		        	$this->setState(129);
		        	$this->statement();
		        	$this->setState(134);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(135);
		        $this->match(self::RBRACE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function statement(): Context\StatementContext
		{
		    $localContext = new Context\StatementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_statement);

		    try {
		        $this->setState(212);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 26, $this->ctx)) {
		        	case 1:
		        	    $localContext = new Context\StmtVarContext($localContext);
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(137);
		        	    $this->varDecl();
		        	    $this->setState(139);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 9, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(138);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 2:
		        	    $localContext = new Context\StmtConstContext($localContext);
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(141);
		        	    $this->constantDecl();
		        	    $this->setState(143);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 10, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(142);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 3:
		        	    $localContext = new Context\StmtShortDeclContext($localContext);
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(145);
		        	    $this->shortDecl();
		        	    $this->setState(147);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 11, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(146);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 4:
		        	    $localContext = new Context\StmtAssignContext($localContext);
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(149);
		        	    $this->assignment();
		        	    $this->setState(151);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 12, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(150);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 5:
		        	    $localContext = new Context\StmIncrementContext($localContext);
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(153);
		        	    $this->increment();
		        	    $this->setState(155);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 13, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(154);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 6:
		        	    $localContext = new Context\StmtPrintContext($localContext);
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(157);
		        	    $this->printStmt();
		        	    $this->setState(159);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 14, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(158);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 7:
		        	    $localContext = new Context\StmtIfContext($localContext);
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(161);
		        	    $this->ifStmt();
		        	    $this->setState(163);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 15, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(162);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 8:
		        	    $localContext = new Context\StmtSwitchContext($localContext);
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(165);
		        	    $this->switchStmt();
		        	    $this->setState(167);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 16, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(166);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 9:
		        	    $localContext = new Context\StmtForContext($localContext);
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(169);
		        	    $this->forStmt();
		        	    $this->setState(171);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 17, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(170);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 10:
		        	    $localContext = new Context\StmtBreakContext($localContext);
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(173);
		        	    $this->breakStmt();
		        	    $this->setState(175);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 18, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(174);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 11:
		        	    $localContext = new Context\StmtContinueContext($localContext);
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(177);
		        	    $this->continueStmt();
		        	    $this->setState(179);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 19, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(178);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 12:
		        	    $localContext = new Context\StmtBlockContext($localContext);
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(181);
		        	    $this->block();
		        	    $this->setState(183);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 20, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(182);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 13:
		        	    $localContext = new Context\StmtReturnContext($localContext);
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(185);
		        	    $this->returnStmt();
		        	    $this->setState(187);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 21, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(186);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 14:
		        	    $localContext = new Context\StmtArrayAssignContext($localContext);
		        	    $this->enterOuterAlt($localContext, 14);
		        	    $this->setState(189);
		        	    $this->arrayAssignment();
		        	    $this->setState(191);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 22, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(190);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 15:
		        	    $localContext = new Context\StmtExprContext($localContext);
		        	    $this->enterOuterAlt($localContext, 15);
		        	    $this->setState(193);
		        	    $this->recursiveExpression(0);
		        	    $this->setState(195);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 23, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(194);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 16:
		        	    $localContext = new Context\StmtStructAssignContext($localContext);
		        	    $this->enterOuterAlt($localContext, 16);
		        	    $this->setState(197);
		        	    $this->structAssignment();
		        	    $this->setState(199);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 24, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(198);
		        	    	    $this->match(self::SEMI);
		        	    	break;
		        	    }
		        	break;

		        	case 17:
		        	    $localContext = new Context\StmtEmptyContext($localContext);
		        	    $this->enterOuterAlt($localContext, 17);
		        	    $this->setState(201);
		        	    $this->match(self::SEMI);
		        	break;

		        	case 18:
		        	    $localContext = new Context\StmtPtrAssignContext($localContext);
		        	    $this->enterOuterAlt($localContext, 18);
		        	    $this->setState(203); 
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    do {
		        	    	$this->setState(202);
		        	    	$this->match(self::MUL);
		        	    	$this->setState(205); 
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    } while ($_la === self::MUL);
		        	    $this->setState(207);
		        	    $this->match(self::ID);
		        	    $this->setState(208);
		        	    $this->match(self::ASSIGN);
		        	    $this->setState(209);
		        	    $this->recursiveExpression(0);
		        	    $this->setState(210);
		        	    $this->match(self::SEMI);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function varDecl(): Context\VarDeclContext
		{
		    $localContext = new Context\VarDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 18, self::RULE_varDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(214);
		        $this->match(self::VAR);
		        $this->setState(215);
		        $this->match(self::ID);
		        $this->setState(220);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(216);
		        	$this->match(self::COMMA);
		        	$this->setState(217);
		        	$this->match(self::ID);
		        	$this->setState(222);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(223);
		        $this->type();
		        $this->setState(226);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ASSIGN) {
		        	$this->setState(224);
		        	$this->match(self::ASSIGN);
		        	$this->setState(225);
		        	$this->valores();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function constantDecl(): Context\ConstantDeclContext
		{
		    $localContext = new Context\ConstantDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 20, self::RULE_constantDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(228);
		        $this->match(self::CONST);
		        $this->setState(229);
		        $this->match(self::ID);
		        $this->setState(230);
		        $this->type();
		        $this->setState(231);
		        $this->match(self::ASSIGN);
		        $this->setState(232);
		        $this->recursiveExpression(0);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function shortDecl(): Context\ShortDeclContext
		{
		    $localContext = new Context\ShortDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_shortDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(234);
		        $this->match(self::ID);
		        $this->setState(239);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(235);
		        	$this->match(self::COMMA);
		        	$this->setState(236);
		        	$this->match(self::ID);
		        	$this->setState(241);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(242);
		        $this->match(self::DECL_ASSIGN);
		        $this->setState(243);
		        $this->valores();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function assignment(): Context\AssignmentContext
		{
		    $localContext = new Context\AssignmentContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 24, self::RULE_assignment);

		    try {
		        $this->setState(258);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 31, $this->ctx)) {
		        	case 1:
		        	    $localContext = new Context\AssignSimpleContext($localContext);
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(245);
		        	    $this->match(self::ID);
		        	    $this->setState(250);
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    while ($_la === self::COMMA) {
		        	    	$this->setState(246);
		        	    	$this->match(self::COMMA);
		        	    	$this->setState(247);
		        	    	$this->match(self::ID);
		        	    	$this->setState(252);
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    }
		        	    $this->setState(253);
		        	    $this->match(self::ASSIGN);
		        	    $this->setState(254);
		        	    $this->valores();
		        	break;

		        	case 2:
		        	    $localContext = new Context\AssignCompoundContext($localContext);
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(255);
		        	    $this->match(self::ID);
		        	    $this->setState(256);

		        	    $localContext->op = $this->input->LT(1);
		        	    $_la = $this->input->LA(1);

		        	    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 66571993088) !== 0))) {
		        	    	    $localContext->op = $this->errorHandler->recoverInline($this);
		        	    } else {
		        	    	if ($this->input->LA(1) === Token::EOF) {
		        	    	    $this->matchedEOF = true;
		        	        }

		        	    	$this->errorHandler->reportMatch($this);
		        	    	$this->consume();
		        	    }
		        	    $this->setState(257);
		        	    $this->recursiveExpression(0);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function increment(): Context\IncrementContext
		{
		    $localContext = new Context\IncrementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 26, self::RULE_increment);

		    try {
		        $localContext = new Context\IncDecContext($localContext);
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(260);
		        $this->match(self::ID);
		        $this->setState(261);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::INC || $_la === self::DEC)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function printStmt(): Context\PrintStmtContext
		{
		    $localContext = new Context\PrintStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 28, self::RULE_printStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(263);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 16826368) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		        $this->setState(264);
		        $this->match(self::LPAREN);
		        $this->setState(266);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 13)) & ~0x3f) === 0 && ((1 << ($_la - 13)) & 34922413644904417) !== 0)) {
		        	$this->setState(265);
		        	$this->valores();
		        }
		        $this->setState(268);
		        $this->match(self::RPAREN);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function ifStmt(): Context\IfStmtContext
		{
		    $localContext = new Context\IfStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 30, self::RULE_ifStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(270);
		        $this->match(self::IF);
		        $this->setState(271);
		        $this->recursiveExpression(0);
		        $this->setState(272);
		        $this->block();
		        $this->setState(278);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ELSE) {
		        	$this->setState(273);
		        	$this->match(self::ELSE);
		        	$this->setState(276);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::IF:
		        	    	$this->setState(274);
		        	    	$this->ifStmt();
		        	    	break;

		        	    case self::LBRACE:
		        	    	$this->setState(275);
		        	    	$this->block();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function switchStmt(): Context\SwitchStmtContext
		{
		    $localContext = new Context\SwitchStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 32, self::RULE_switchStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(280);
		        $this->match(self::SWITCH);
		        $this->setState(281);
		        $this->recursiveExpression(0);
		        $this->setState(282);
		        $this->match(self::LBRACE);
		        $this->setState(283);
		        $this->switchBlock();
		        $this->setState(284);
		        $this->match(self::RBRACE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function switchBlock(): Context\SwitchBlockContext
		{
		    $localContext = new Context\SwitchBlockContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 34, self::RULE_switchBlock);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(289);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::CASE) {
		        	$this->setState(286);
		        	$this->caseStmt();
		        	$this->setState(291);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(293);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::DEFAULT) {
		        	$this->setState(292);
		        	$this->defaultStmt();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function caseStmt(): Context\CaseStmtContext
		{
		    $localContext = new Context\CaseStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 36, self::RULE_caseStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(295);
		        $this->match(self::CASE);
		        $this->setState(296);
		        $this->valores();
		        $this->setState(297);
		        $this->match(self::COLON);
		        $this->setState(301);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & -8451003050956620196) !== 0) || (((($_la - 64)) & ~0x3f) === 0 && ((1 << ($_la - 64)) & 15) !== 0)) {
		        	$this->setState(298);
		        	$this->statement();
		        	$this->setState(303);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function defaultStmt(): Context\DefaultStmtContext
		{
		    $localContext = new Context\DefaultStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 38, self::RULE_defaultStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(304);
		        $this->match(self::DEFAULT);
		        $this->setState(305);
		        $this->match(self::COLON);
		        $this->setState(309);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & -8451003050956620196) !== 0) || (((($_la - 64)) & ~0x3f) === 0 && ((1 << ($_la - 64)) & 15) !== 0)) {
		        	$this->setState(306);
		        	$this->statement();
		        	$this->setState(311);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forStmt(): Context\ForStmtContext
		{
		    $localContext = new Context\ForStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 40, self::RULE_forStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(312);
		        $this->match(self::FOR);
		        $this->setState(325);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 41, $this->ctx)) {
		            case 1:
		        	    $this->setState(313);
		        	    $this->recursiveExpression(0);
		        	break;

		            case 2:
		        	    $this->setState(316);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->input->LA(1)) {
		        	        case self::VAR:
		        	        	$this->setState(314);
		        	        	$this->varDecl();
		        	        	break;

		        	        case self::ID:
		        	        	$this->setState(315);
		        	        	$this->shortDecl();
		        	        	break;

		        	    default:
		        	    	throw new NoViableAltException($this);
		        	    }
		        	    $this->setState(318);
		        	    $this->match(self::SEMI);
		        	    $this->setState(319);
		        	    $this->recursiveExpression(0);
		        	    $this->setState(320);
		        	    $this->match(self::SEMI);
		        	    $this->setState(323);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 40, $this->ctx)) {
		        	    	case 1:
		        	    	    $this->setState(321);
		        	    	    $this->assignment();
		        	    	break;

		        	    	case 2:
		        	    	    $this->setState(322);
		        	    	    $this->increment();
		        	    	break;
		        	    }
		        	break;
		        }
		        $this->setState(327);
		        $this->block();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function breakStmt(): Context\BreakStmtContext
		{
		    $localContext = new Context\BreakStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 42, self::RULE_breakStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(329);
		        $this->match(self::BREAK);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function continueStmt(): Context\ContinueStmtContext
		{
		    $localContext = new Context\ContinueStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 44, self::RULE_continueStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(331);
		        $this->match(self::CONTIN);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function returnStmt(): Context\ReturnStmtContext
		{
		    $localContext = new Context\ReturnStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 46, self::RULE_returnStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(333);
		        $this->match(self::RETURN);
		        $this->setState(335);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 42, $this->ctx)) {
		            case 1:
		        	    $this->setState(334);
		        	    $this->valores();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayAssignment(): Context\ArrayAssignmentContext
		{
		    $localContext = new Context\ArrayAssignmentContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 48, self::RULE_arrayAssignment);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(337);
		        $this->match(self::ID);
		        $this->setState(342); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(338);
		        	$this->match(self::LBRACK);
		        	$this->setState(339);
		        	$this->recursiveExpression(0);
		        	$this->setState(340);
		        	$this->match(self::RBRACK);
		        	$this->setState(344); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::LBRACK);
		        $this->setState(346);
		        $this->match(self::ASSIGN);
		        $this->setState(347);
		        $this->recursiveExpression(0);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expression(): Context\ExpressionContext
		{
			return $this->recursiveExpression(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveExpression(int $precedence): Context\ExpressionContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\ExpressionContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 50;
			$this->enterRecursionRule($localContext, 50, self::RULE_expression, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(377);
				$this->errorHandler->sync($this);

				switch ($this->getInterpreter()->adaptivePredict($this->input, 46, $this->ctx)) {
					case 1:
					    $localContext = new Context\ExprParenthesisContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;

					    $this->setState(350);
					    $this->match(self::LPAREN);
					    $this->setState(351);
					    $this->recursiveExpression(0);
					    $this->setState(352);
					    $this->match(self::RPAREN);
					break;

					case 2:
					    $localContext = new Context\ExprNotContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(354);
					    $this->match(self::NOT);
					    $this->setState(355);
					    $this->recursiveExpression(18);
					break;

					case 3:
					    $localContext = new Context\ExprNegateContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(356);
					    $this->match(self::MINUS);
					    $this->setState(357);
					    $this->recursiveExpression(17);
					break;

					case 4:
					    $localContext = new Context\ExprStructLitContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(358);
					    $this->match(self::ID);
					    $this->setState(359);
					    $this->match(self::LBRACE);
					    $this->setState(361);
					    $this->errorHandler->sync($this);
					    $_la = $this->input->LA(1);

					    if ((((($_la - 13)) & ~0x3f) === 0 && ((1 << ($_la - 13)) & 34922413644904417) !== 0)) {
					    	$this->setState(360);
					    	$this->valores();
					    }
					    $this->setState(363);
					    $this->match(self::RBRACE);
					break;

					case 5:
					    $localContext = new Context\ExprArrayLitContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(364);
					    $this->arrayLiteral();
					break;

					case 6:
					    $localContext = new Context\ExprAddrContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(365);
					    $this->match(self::AMP);
					    $this->setState(366);
					    $this->match(self::ID);
					break;

					case 7:
					    $localContext = new Context\ExprDerefContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(367);
					    $this->match(self::MUL);
					    $this->setState(368);
					    $this->recursiveExpression(13);
					break;

					case 8:
					    $localContext = new Context\ExprBuiltInContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(369);

					    $_la = $this->input->LA(1);

					    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 503316480) !== 0))) {
					    $this->errorHandler->recoverInline($this);
					    } else {
					    	if ($this->input->LA(1) === Token::EOF) {
					    	    $this->matchedEOF = true;
					        }

					    	$this->errorHandler->reportMatch($this);
					    	$this->consume();
					    }
					    $this->setState(370);
					    $this->match(self::LPAREN);
					    $this->setState(372);
					    $this->errorHandler->sync($this);
					    $_la = $this->input->LA(1);

					    if ((((($_la - 13)) & ~0x3f) === 0 && ((1 << ($_la - 13)) & 34922413644904417) !== 0)) {
					    	$this->setState(371);
					    	$this->valores();
					    }
					    $this->setState(374);
					    $this->match(self::RPAREN);
					break;

					case 9:
					    $localContext = new Context\ExprIdContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(375);
					    $this->match(self::ID);
					break;

					case 10:
					    $localContext = new Context\ExprLiteralContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(376);
					    $this->literal();
					break;
				}
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(413);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 49, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(411);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 48, $this->ctx)) {
							case 1:
							    $localContext = new Context\ExprMulDivContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(379);

							    if (!($this->precpred($this->ctx, 9))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 9)");
							    }
							    $this->setState(380);

							    $_la = $this->input->LA(1);

							    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 7696581394432) !== 0))) {
							    $this->errorHandler->recoverInline($this);
							    } else {
							    	if ($this->input->LA(1) === Token::EOF) {
							    	    $this->matchedEOF = true;
							        }

							    	$this->errorHandler->reportMatch($this);
							    	$this->consume();
							    }
							    $this->setState(381);
							    $this->recursiveExpression(10);
							break;

							case 2:
							    $localContext = new Context\ExprAddSubContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(382);

							    if (!($this->precpred($this->ctx, 8))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 8)");
							    }
							    $this->setState(383);

							    $_la = $this->input->LA(1);

							    if (!($_la === self::PLUS || $_la === self::MINUS)) {
							    $this->errorHandler->recoverInline($this);
							    } else {
							    	if ($this->input->LA(1) === Token::EOF) {
							    	    $this->matchedEOF = true;
							        }

							    	$this->errorHandler->reportMatch($this);
							    	$this->consume();
							    }
							    $this->setState(384);
							    $this->recursiveExpression(9);
							break;

							case 3:
							    $localContext = new Context\ExprRelationalContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(385);

							    if (!($this->precpred($this->ctx, 7))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 7)");
							    }
							    $this->setState(386);

							    $_la = $this->input->LA(1);

							    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 527765581332480) !== 0))) {
							    $this->errorHandler->recoverInline($this);
							    } else {
							    	if ($this->input->LA(1) === Token::EOF) {
							    	    $this->matchedEOF = true;
							        }

							    	$this->errorHandler->reportMatch($this);
							    	$this->consume();
							    }
							    $this->setState(387);
							    $this->recursiveExpression(8);
							break;

							case 4:
							    $localContext = new Context\ExprEqualityContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(388);

							    if (!($this->precpred($this->ctx, 6))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 6)");
							    }
							    $this->setState(389);

							    $_la = $this->input->LA(1);

							    if (!($_la === self::EQ || $_la === self::NEQ)) {
							    $this->errorHandler->recoverInline($this);
							    } else {
							    	if ($this->input->LA(1) === Token::EOF) {
							    	    $this->matchedEOF = true;
							        }

							    	$this->errorHandler->reportMatch($this);
							    	$this->consume();
							    }
							    $this->setState(390);
							    $this->recursiveExpression(7);
							break;

							case 5:
							    $localContext = new Context\ExprAndContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(391);

							    if (!($this->precpred($this->ctx, 5))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 5)");
							    }
							    $this->setState(392);
							    $this->match(self::AND);
							    $this->setState(393);
							    $this->recursiveExpression(6);
							break;

							case 6:
							    $localContext = new Context\ExprOrContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(394);

							    if (!($this->precpred($this->ctx, 4))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 4)");
							    }
							    $this->setState(395);
							    $this->match(self::OR);
							    $this->setState(396);
							    $this->recursiveExpression(5);
							break;

							case 7:
							    $localContext = new Context\ExprStructAccessContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(397);

							    if (!($this->precpred($this->ctx, 12))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 12)");
							    }
							    $this->setState(398);
							    $this->match(self::DOT);
							    $this->setState(399);
							    $this->match(self::ID);
							break;

							case 8:
							    $localContext = new Context\ExprArrayAccessContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(400);

							    if (!($this->precpred($this->ctx, 11))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 11)");
							    }
							    $this->setState(401);
							    $this->match(self::LBRACK);
							    $this->setState(402);
							    $this->recursiveExpression(0);
							    $this->setState(403);
							    $this->match(self::RBRACK);
							break;

							case 9:
							    $localContext = new Context\ExprCallContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(405);

							    if (!($this->precpred($this->ctx, 10))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 10)");
							    }
							    $this->setState(406);
							    $this->match(self::LPAREN);
							    $this->setState(408);
							    $this->errorHandler->sync($this);
							    $_la = $this->input->LA(1);

							    if ((((($_la - 13)) & ~0x3f) === 0 && ((1 << ($_la - 13)) & 34922413644904417) !== 0)) {
							    	$this->setState(407);
							    	$this->valores();
							    }
							    $this->setState(410);
							    $this->match(self::RPAREN);
							break;
						} 
					}

					$this->setState(415);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 49, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function valores(): Context\ValoresContext
		{
		    $localContext = new Context\ValoresContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 52, self::RULE_valores);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(416);
		        $this->recursiveExpression(0);
		        $this->setState(421);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(417);
		        	$this->match(self::COMMA);
		        	$this->setState(418);
		        	$this->recursiveExpression(0);
		        	$this->setState(423);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function type(): Context\TypeContext
		{
		    $localContext = new Context\TypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 54, self::RULE_type);

		    try {
		        $this->setState(437);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::INT32:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(424);
		            	$this->match(self::INT32);
		            	break;

		            case self::FLOAT32:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(425);
		            	$this->match(self::FLOAT32);
		            	break;

		            case self::BOOL:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(426);
		            	$this->match(self::BOOL);
		            	break;

		            case self::RUNE:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(427);
		            	$this->match(self::RUNE);
		            	break;

		            case self::STRING:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(428);
		            	$this->match(self::STRING);
		            	break;

		            case self::MUL:
		            	$this->enterOuterAlt($localContext, 6);
		            	$this->setState(429);
		            	$this->match(self::MUL);
		            	$this->setState(430);
		            	$this->type();
		            	break;

		            case self::LBRACK:
		            	$this->enterOuterAlt($localContext, 7);
		            	$this->setState(431);
		            	$this->match(self::LBRACK);
		            	$this->setState(432);
		            	$this->recursiveExpression(0);
		            	$this->setState(433);
		            	$this->match(self::RBRACK);
		            	$this->setState(434);
		            	$this->type();
		            	break;

		            case self::ID:
		            	$this->enterOuterAlt($localContext, 8);
		            	$this->setState(436);
		            	$this->match(self::ID);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function literal(): Context\LiteralContext
		{
		    $localContext = new Context\LiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 56, self::RULE_literal);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(439);

		        $_la = $this->input->LA(1);

		        if (!((((($_la - 13)) & ~0x3f) === 0 && ((1 << ($_la - 13)) & 33776997205279745) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayLiteral(): Context\ArrayLiteralContext
		{
		    $localContext = new Context\ArrayLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 58, self::RULE_arrayLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(441);
		        $this->type();
		        $this->setState(442);
		        $this->match(self::LBRACE);
		        $this->setState(444);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 13)) & ~0x3f) === 0 && ((1 << ($_la - 13)) & 34922413644904417) !== 0)) {
		        	$this->setState(443);
		        	$this->valores();
		        }
		        $this->setState(446);
		        $this->match(self::RBRACE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function structAssignment(): Context\StructAssignmentContext
		{
		    $localContext = new Context\StructAssignmentContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 60, self::RULE_structAssignment);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(448);
		        $this->recursiveExpression(0);
		        $this->setState(449);
		        $this->match(self::DOT);
		        $this->setState(450);
		        $this->match(self::ID);
		        $this->setState(451);
		        $this->match(self::ASSIGN);
		        $this->setState(452);
		        $this->recursiveExpression(0);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex): bool
		{
			switch ($ruleIndex) {
					case 25:
						return $this->sempredExpression($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredExpression(?Context\ExpressionContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 0:
			        return $this->precpred($this->ctx, 9);

			    case 1:
			        return $this->precpred($this->ctx, 8);

			    case 2:
			        return $this->precpred($this->ctx, 7);

			    case 3:
			        return $this->precpred($this->ctx, 6);

			    case 4:
			        return $this->precpred($this->ctx, 5);

			    case 5:
			        return $this->precpred($this->ctx, 4);

			    case 6:
			        return $this->precpred($this->ctx, 12);

			    case 7:
			        return $this->precpred($this->ctx, 11);

			    case 8:
			        return $this->precpred($this->ctx, 10);
			}

			return true;
		}
	}
}

namespace Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use GolampiParser;
	use GolampiVisitor;
	use GolampiListener;

	class StartContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_start;
	    }

	    public function EOF(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::EOF, 0);
	    }

	    /**
	     * @return array<TopDeclContext>|TopDeclContext|null
	     */
	    public function topDecl(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TopDeclContext::class);
	    	}

	        return $this->getTypedRuleContext(TopDeclContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStart($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStart($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStart($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TopDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_topDecl;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class DeclGlobalVarContext extends TopDeclContext
	{
		public function __construct(TopDeclContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function varDecl(): ?VarDeclContext
	    {
	    	return $this->getTypedRuleContext(VarDeclContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterDeclGlobalVar($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitDeclGlobalVar($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitDeclGlobalVar($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class DeclFunctionContext extends TopDeclContext
	{
		public function __construct(TopDeclContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function functionDecl(): ?FunctionDeclContext
	    {
	    	return $this->getTypedRuleContext(FunctionDeclContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterDeclFunction($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitDeclFunction($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitDeclFunction($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class DeclGlobalConstContext extends TopDeclContext
	{
		public function __construct(TopDeclContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function constantDecl(): ?ConstantDeclContext
	    {
	    	return $this->getTypedRuleContext(ConstantDeclContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterDeclGlobalConst($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitDeclGlobalConst($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitDeclGlobalConst($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class DeclStructContext extends TopDeclContext
	{
		public function __construct(TopDeclContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function structureDecl(): ?StructureDeclContext
	    {
	    	return $this->getTypedRuleContext(StructureDeclContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterDeclStruct($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitDeclStruct($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitDeclStruct($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FunctionDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_functionDecl;
	    }

	    public function FUNC(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FUNC, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LPAREN, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RPAREN, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    public function paramList(): ?ParamListContext
	    {
	    	return $this->getTypedRuleContext(ParamListContext::class, 0);
	    }

	    public function returnTypes(): ?ReturnTypesContext
	    {
	    	return $this->getTypedRuleContext(ReturnTypesContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterFunctionDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitFunctionDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitFunctionDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ReturnTypesContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_returnTypes;
	    }

	    /**
	     * @return array<TypeContext>|TypeContext|null
	     */
	    public function type(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TypeContext::class);
	    	}

	        return $this->getTypedRuleContext(TypeContext::class, $index);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LPAREN, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RPAREN, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::COMMA);
	    	}

	        return $this->getToken(GolampiParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterReturnTypes($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitReturnTypes($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitReturnTypes($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class StructureDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_structureDecl;
	    }

	    public function TYPE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::TYPE, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::ID);
	    	}

	        return $this->getToken(GolampiParser::ID, $index);
	    }

	    public function STRUCT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STRUCT, 0);
	    }

	    public function LBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LBRACE, 0);
	    }

	    public function RBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RBRACE, 0);
	    }

	    /**
	     * @return array<TypeContext>|TypeContext|null
	     */
	    public function type(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TypeContext::class);
	    	}

	        return $this->getTypedRuleContext(TypeContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function SEMI(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::SEMI);
	    	}

	        return $this->getToken(GolampiParser::SEMI, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStructureDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStructureDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStructureDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParamListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_paramList;
	    }

	    /**
	     * @return array<ParametroContext>|ParametroContext|null
	     */
	    public function parametro(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ParametroContext::class);
	    	}

	        return $this->getTypedRuleContext(ParametroContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::COMMA);
	    	}

	        return $this->getToken(GolampiParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterParamList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitParamList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitParamList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParametroContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_parametro;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterParametro($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitParametro($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitParametro($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BlockContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_block;
	    }

	    public function LBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LBRACE, 0);
	    }

	    public function RBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RBRACE, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterBlock($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitBlock($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitBlock($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class StatementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_statement;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class StmtReturnContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function returnStmt(): ?ReturnStmtContext
	    {
	    	return $this->getTypedRuleContext(ReturnStmtContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtReturn($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtReturn($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtReturn($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtContinueContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function continueStmt(): ?ContinueStmtContext
	    {
	    	return $this->getTypedRuleContext(ContinueStmtContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtContinue($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtContinue($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtContinue($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtBlockContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtBlock($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtBlock($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtBlock($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtArrayAssignContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function arrayAssignment(): ?ArrayAssignmentContext
	    {
	    	return $this->getTypedRuleContext(ArrayAssignmentContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtArrayAssign($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtArrayAssign($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtArrayAssign($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtExprContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtPrintContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function printStmt(): ?PrintStmtContext
	    {
	    	return $this->getTypedRuleContext(PrintStmtContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtPrint($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtPrint($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtPrint($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtForContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function forStmt(): ?ForStmtContext
	    {
	    	return $this->getTypedRuleContext(ForStmtContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtFor($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtFor($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtFor($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtAssignContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function assignment(): ?AssignmentContext
	    {
	    	return $this->getTypedRuleContext(AssignmentContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtAssign($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtAssign($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtAssign($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtConstContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function constantDecl(): ?ConstantDeclContext
	    {
	    	return $this->getTypedRuleContext(ConstantDeclContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtConst($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtConst($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtConst($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtVarContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function varDecl(): ?VarDeclContext
	    {
	    	return $this->getTypedRuleContext(VarDeclContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtVar($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtVar($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtVar($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtShortDeclContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function shortDecl(): ?ShortDeclContext
	    {
	    	return $this->getTypedRuleContext(ShortDeclContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtShortDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtShortDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtShortDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmIncrementContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function increment(): ?IncrementContext
	    {
	    	return $this->getTypedRuleContext(IncrementContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmIncrement($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmIncrement($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmIncrement($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtEmptyContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtEmpty($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtEmpty($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtEmpty($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtSwitchContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function switchStmt(): ?SwitchStmtContext
	    {
	    	return $this->getTypedRuleContext(SwitchStmtContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtSwitch($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtSwitch($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtSwitch($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtStructAssignContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function structAssignment(): ?StructAssignmentContext
	    {
	    	return $this->getTypedRuleContext(StructAssignmentContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtStructAssign($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtStructAssign($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtStructAssign($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtIfContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ifStmt(): ?IfStmtContext
	    {
	    	return $this->getTypedRuleContext(IfStmtContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtIf($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtIf($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtIf($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtPtrAssignContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ASSIGN, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function MUL(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::MUL);
	    	}

	        return $this->getToken(GolampiParser::MUL, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtPtrAssign($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtPtrAssign($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtPtrAssign($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StmtBreakContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function breakStmt(): ?BreakStmtContext
	    {
	    	return $this->getTypedRuleContext(BreakStmtContext::class, 0);
	    }

	    public function SEMI(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SEMI, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStmtBreak($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStmtBreak($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStmtBreak($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class VarDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_varDecl;
	    }

	    public function VAR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::VAR, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::ID);
	    	}

	        return $this->getToken(GolampiParser::ID, $index);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::COMMA);
	    	}

	        return $this->getToken(GolampiParser::COMMA, $index);
	    }

	    public function ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ASSIGN, 0);
	    }

	    public function valores(): ?ValoresContext
	    {
	    	return $this->getTypedRuleContext(ValoresContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterVarDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitVarDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitVarDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ConstantDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_constantDecl;
	    }

	    public function CONST(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::CONST, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ASSIGN, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterConstantDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitConstantDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitConstantDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ShortDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_shortDecl;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::ID);
	    	}

	        return $this->getToken(GolampiParser::ID, $index);
	    }

	    public function DECL_ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::DECL_ASSIGN, 0);
	    }

	    public function valores(): ?ValoresContext
	    {
	    	return $this->getTypedRuleContext(ValoresContext::class, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::COMMA);
	    	}

	        return $this->getToken(GolampiParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterShortDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitShortDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitShortDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AssignmentContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_assignment;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class AssignCompoundContext extends AssignmentContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(AssignmentContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function PLUS_ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::PLUS_ASSIGN, 0);
	    }

	    public function MINUS_ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MINUS_ASSIGN, 0);
	    }

	    public function MUL_ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MUL_ASSIGN, 0);
	    }

	    public function DIV_ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::DIV_ASSIGN, 0);
	    }

	    public function MOD_ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MOD_ASSIGN, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterAssignCompound($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitAssignCompound($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitAssignCompound($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class AssignSimpleContext extends AssignmentContext
	{
		public function __construct(AssignmentContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::ID);
	    	}

	        return $this->getToken(GolampiParser::ID, $index);
	    }

	    public function ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ASSIGN, 0);
	    }

	    public function valores(): ?ValoresContext
	    {
	    	return $this->getTypedRuleContext(ValoresContext::class, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::COMMA);
	    	}

	        return $this->getToken(GolampiParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterAssignSimple($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitAssignSimple($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitAssignSimple($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IncrementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_increment;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class IncDecContext extends IncrementContext
	{
		public function __construct(IncrementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function INC(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::INC, 0);
	    }

	    public function DEC(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::DEC, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterIncDec($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitIncDec($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitIncDec($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PrintStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_printStmt;
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LPAREN, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RPAREN, 0);
	    }

	    public function PRINT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::PRINT, 0);
	    }

	    public function PRINTLN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::PRINTLN, 0);
	    }

	    public function FMT_PRINTLN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FMT_PRINTLN, 0);
	    }

	    public function valores(): ?ValoresContext
	    {
	    	return $this->getTypedRuleContext(ValoresContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterPrintStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitPrintStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitPrintStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IfStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_ifStmt;
	    }

	    public function IF(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::IF, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    /**
	     * @return array<BlockContext>|BlockContext|null
	     */
	    public function block(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(BlockContext::class);
	    	}

	        return $this->getTypedRuleContext(BlockContext::class, $index);
	    }

	    public function ELSE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ELSE, 0);
	    }

	    public function ifStmt(): ?IfStmtContext
	    {
	    	return $this->getTypedRuleContext(IfStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterIfStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitIfStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitIfStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SwitchStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_switchStmt;
	    }

	    public function SWITCH(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SWITCH, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function LBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LBRACE, 0);
	    }

	    public function switchBlock(): ?SwitchBlockContext
	    {
	    	return $this->getTypedRuleContext(SwitchBlockContext::class, 0);
	    }

	    public function RBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RBRACE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterSwitchStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitSwitchStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitSwitchStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SwitchBlockContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_switchBlock;
	    }

	    /**
	     * @return array<CaseStmtContext>|CaseStmtContext|null
	     */
	    public function caseStmt(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(CaseStmtContext::class);
	    	}

	        return $this->getTypedRuleContext(CaseStmtContext::class, $index);
	    }

	    public function defaultStmt(): ?DefaultStmtContext
	    {
	    	return $this->getTypedRuleContext(DefaultStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterSwitchBlock($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitSwitchBlock($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitSwitchBlock($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CaseStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_caseStmt;
	    }

	    public function CASE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::CASE, 0);
	    }

	    public function valores(): ?ValoresContext
	    {
	    	return $this->getTypedRuleContext(ValoresContext::class, 0);
	    }

	    public function COLON(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::COLON, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterCaseStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitCaseStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitCaseStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DefaultStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_defaultStmt;
	    }

	    public function DEFAULT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::DEFAULT, 0);
	    }

	    public function COLON(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::COLON, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterDefaultStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitDefaultStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitDefaultStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_forStmt;
	    }

	    public function FOR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FOR, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function SEMI(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::SEMI);
	    	}

	        return $this->getToken(GolampiParser::SEMI, $index);
	    }

	    public function varDecl(): ?VarDeclContext
	    {
	    	return $this->getTypedRuleContext(VarDeclContext::class, 0);
	    }

	    public function shortDecl(): ?ShortDeclContext
	    {
	    	return $this->getTypedRuleContext(ShortDeclContext::class, 0);
	    }

	    public function assignment(): ?AssignmentContext
	    {
	    	return $this->getTypedRuleContext(AssignmentContext::class, 0);
	    }

	    public function increment(): ?IncrementContext
	    {
	    	return $this->getTypedRuleContext(IncrementContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterForStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitForStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitForStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BreakStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_breakStmt;
	    }

	    public function BREAK(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::BREAK, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterBreakStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitBreakStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitBreakStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ContinueStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_continueStmt;
	    }

	    public function CONTIN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::CONTIN, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterContinueStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitContinueStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitContinueStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ReturnStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_returnStmt;
	    }

	    public function RETURN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RETURN, 0);
	    }

	    public function valores(): ?ValoresContext
	    {
	    	return $this->getTypedRuleContext(ValoresContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterReturnStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitReturnStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitReturnStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayAssignmentContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayAssignment;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ASSIGN, 0);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function LBRACK(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::LBRACK);
	    	}

	        return $this->getToken(GolampiParser::LBRACK, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function RBRACK(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::RBRACK);
	    	}

	        return $this->getToken(GolampiParser::RBRACK, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayAssignment($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayAssignment($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayAssignment($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpressionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_expression;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class ExprAddrContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function AMP(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::AMP, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprAddr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprAddr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprAddr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprArrayLitContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprArrayLit($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprArrayLit($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprArrayLit($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprStructLitContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function LBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LBRACE, 0);
	    }

	    public function RBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RBRACE, 0);
	    }

	    public function valores(): ?ValoresContext
	    {
	    	return $this->getTypedRuleContext(ValoresContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprStructLit($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprStructLit($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprStructLit($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprBuiltInContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LPAREN, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RPAREN, 0);
	    }

	    public function LEN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LEN, 0);
	    }

	    public function NOW(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::NOW, 0);
	    }

	    public function SUBSTR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SUBSTR, 0);
	    }

	    public function TYPEOF(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::TYPEOF, 0);
	    }

	    public function valores(): ?ValoresContext
	    {
	    	return $this->getTypedRuleContext(ValoresContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprBuiltIn($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprBuiltIn($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprBuiltIn($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprParenthesisContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LPAREN, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RPAREN, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprParenthesis($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprParenthesis($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprParenthesis($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprNotContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function NOT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::NOT, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprNot($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprNot($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprNot($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprRelationalContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function LT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LT, 0);
	    }

	    public function GT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::GT, 0);
	    }

	    public function LE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LE, 0);
	    }

	    public function GE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::GE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprRelational($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprRelational($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprRelational($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprAddSubContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function PLUS(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::PLUS, 0);
	    }

	    public function MINUS(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MINUS, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprAddSub($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprAddSub($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprAddSub($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprAndContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function AND(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::AND, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprAnd($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprAnd($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprAnd($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprArrayAccessContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function LBRACK(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LBRACK, 0);
	    }

	    public function RBRACK(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RBRACK, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprArrayAccess($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprArrayAccess($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprArrayAccess($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprCallContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function LPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LPAREN, 0);
	    }

	    public function RPAREN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RPAREN, 0);
	    }

	    public function valores(): ?ValoresContext
	    {
	    	return $this->getTypedRuleContext(ValoresContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprCall($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprCall($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprCall($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprDerefContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function MUL(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MUL, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprDeref($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprDeref($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprDeref($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprMulDivContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function MUL(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MUL, 0);
	    }

	    public function DIV(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::DIV, 0);
	    }

	    public function MOD(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MOD, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprMulDiv($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprMulDiv($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprMulDiv($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprNegateContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function MINUS(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MINUS, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprNegate($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprNegate($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprNegate($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprOrContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function OR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::OR, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprOr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprOr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprOr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprLiteralContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function literal(): ?LiteralContext
	    {
	    	return $this->getTypedRuleContext(LiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprStructAccessContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function DOT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::DOT, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprStructAccess($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprStructAccess($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprStructAccess($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprEqualityContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function EQ(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::EQ, 0);
	    }

	    public function NEQ(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::NEQ, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprEquality($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprEquality($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprEquality($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExprIdContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprId($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprId($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprId($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ValoresContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_valores;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::COMMA);
	    	}

	        return $this->getToken(GolampiParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterValores($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitValores($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitValores($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_type;
	    }

	    public function INT32(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::INT32, 0);
	    }

	    public function FLOAT32(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FLOAT32, 0);
	    }

	    public function BOOL(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::BOOL, 0);
	    }

	    public function RUNE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RUNE, 0);
	    }

	    public function STRING(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STRING, 0);
	    }

	    public function MUL(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MUL, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function LBRACK(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LBRACK, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function RBRACK(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RBRACK, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_literal;
	    }

	    public function ENTERO(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ENTERO, 0);
	    }

	    public function DECIMAL(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::DECIMAL, 0);
	    }

	    public function RUNE_LITERAL(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RUNE_LITERAL, 0);
	    }

	    public function STRING_LITERAL(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STRING_LITERAL, 0);
	    }

	    public function BOOL_LIT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::BOOL_LIT, 0);
	    }

	    public function NIL(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::NIL, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayLiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayLiteral;
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function LBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LBRACE, 0);
	    }

	    public function RBRACE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RBRACE, 0);
	    }

	    public function valores(): ?ValoresContext
	    {
	    	return $this->getTypedRuleContext(ValoresContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class StructAssignmentContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_structAssignment;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function DOT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::DOT, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ASSIGN, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStructAssignment($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStructAssignment($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStructAssignment($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}