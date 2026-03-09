<?php

/**
 * Environment (Entorno / Scope)
 * Implementa la tabla de símbolos con soporte de ámbitos anidados.
 */
class Environment
{
    /** @var Environment|null */
    private ?Environment $parent;

    /** @var string Nombre del scope (global, main, func_xxx, if, for, ...) */
    private string $scopeName;

    /** @var array<string, array> Mapa de identificador → [type, value, line, col] */
    private array $symbols = [];

    /** @var array Registro global de todos los símbolos declarados (para el reporte) */
    private static array $allSymbols = [];

    public function __construct(string $scopeName = 'global', ?Environment $parent = null)
    {
        $this->scopeName = $scopeName;
        $this->parent    = $parent;
    }

    // ──────────────────────────────────────────────
    // Declarar una variable/constante en este scope
    // ──────────────────────────────────────────────
    /**
     * @throws GolampiRuntimeError si el identificador ya existe en este scope.
     */
    public function declare(string $id, string $type, mixed $value, int $line = 0, int $col = 0): void
    {
        if (array_key_exists($id, $this->symbols)) {
            throw new GolampiRuntimeError(
                "Identificador '$id' ya ha sido declarado en el ámbito actual.",
                $line,
                $col
            );
        }
        $this->symbols[$id] = [
            'type'  => $type,
            'value' => $value,
            'line'  => $line,
            'col'   => $col,
        ];
        self::$allSymbols[] = [
            'id'    => $id,
            'type'  => $type,
            'scope' => $this->scopeName,
            'value' => $value,
            'line'  => $line,
            'col'   => $col,
        ];
    }

    // ──────────────────────────────────────────────
    // Obtener el valor de una variable (busca en cadena)
    // ──────────────────────────────────────────────
    /**
     * @throws GolampiRuntimeError si el identificador no está declarado.
     */
    public function get(string $id, int $line = 0, int $col = 0): mixed
    {
        if (array_key_exists($id, $this->symbols)) {
            return $this->symbols[$id]['value'];
        }
        if ($this->parent !== null) {
            return $this->parent->get($id, $line, $col);
        }
        throw new GolampiRuntimeError("Variable '$id' no declarada en el ámbito actual.", $line, $col);
    }

    // ──────────────────────────────────────────────
    // Obtener el tipo de una variable
    // ──────────────────────────────────────────────
    public function getType(string $id, int $line = 0, int $col = 0): string
    {
        if (array_key_exists($id, $this->symbols)) {
            return $this->symbols[$id]['type'];
        }
        if ($this->parent !== null) {
            return $this->parent->getType($id, $line, $col);
        }
        throw new GolampiRuntimeError("Variable '$id' no declarada en el ámbito actual.", $line, $col);
    }

    // ──────────────────────────────────────────────
    // Asignar un nuevo valor (busca en cadena)
    // ──────────────────────────────────────────────
    /**
     * @throws GolampiRuntimeError si el identificador no está declarado.
     */
    public function assign(string $id, mixed $value, int $line = 0, int $col = 0): void
    {
        if (array_key_exists($id, $this->symbols)) {
            $this->symbols[$id]['value'] = $value;
            // Actualizar también en el registro global
            foreach (self::$allSymbols as &$sym) {
                if ($sym['id'] === $id && $sym['scope'] === $this->scopeName) {
                    $sym['value'] = $value;
                }
            }
            unset($sym);
            return;
        }
        if ($this->parent !== null) {
            $this->parent->assign($id, $value, $line, $col);
            return;
        }
        throw new GolampiRuntimeError("Variable '$id' no declarada en el ámbito actual.", $line, $col);
    }

    // ──────────────────────────────────────────────
    // Verificar si existe en el scope actual (sin subir)
    // ──────────────────────────────────────────────
    public function existsLocal(string $id): bool
    {
        return array_key_exists($id, $this->symbols);
    }

    // ──────────────────────────────────────────────
    // Crear un scope hijo
    // ──────────────────────────────────────────────
    public function createChild(string $scopeName): Environment
    {
        return new Environment($scopeName, $this);
    }

    // ──────────────────────────────────────────────
    // Reporte de tabla de símbolos
    // ──────────────────────────────────────────────
    public static function getAllSymbols(): array
    {
        return self::$allSymbols;
    }

    public static function resetSymbols(): void
    {
        self::$allSymbols = [];
    }

    public function getScopeName(): string
    {
        return $this->scopeName;
    }
}
