<?php
require_once __DIR__ . '/../models/queries/sprint_query.php';
require_once __DIR__ . '/../models/queries/retro_item_query.php';

class Retrospectiva_Controller {

    private SprintQuery    $sprintQuery;
    private RetroItemQuery $itemQuery;

    public function __construct() {
        $this->sprintQuery = new SprintQuery();
        $this->itemQuery   = new RetroItemQuery();
    }

    // ── SPRINTS ──
    public function listar_sprints(): array         { return $this->sprintQuery->listar(); }
    public function obtener_sprint(int $id): ?Sprint { return $this->sprintQuery->obtenerPorId($id); }

    public function guardar_sprint(array $datos): bool {
        $sprint = new Sprint(0, trim($datos['nombre']), $datos['fecha_inicio'], $datos['fecha_fin']);
        return $this->sprintQuery->guardar($sprint);
    }

    public function modificar_sprint(array $datos): bool {
        $sprint = new Sprint((int)$datos['id'], trim($datos['nombre']), $datos['fecha_inicio'], $datos['fecha_fin']);
        return $this->sprintQuery->modificar($sprint);
    }

    public function borrar_sprint(int $id): bool { return $this->sprintQuery->borrar($id); }

    // ── ITEMS ──
    public function listar_items(int $sprint_id): array          { return $this->itemQuery->listarPorSprint($sprint_id); }
    public function obtener_item(int $id): ?RetroItem            { return $this->itemQuery->obtenerPorId($id); }
    public function contar_items(int $sprint_id): array          { return $this->itemQuery->contarPorCategoria($sprint_id); }
    public function borrar_item(int $id): bool                   { return $this->itemQuery->borrar($id); }

    public function guardar_item(array $datos): bool {
        $cumplida = null;
        if ($datos['categoria'] === 'accion' && $datos['cumplida'] !== '')
            $cumplida = $datos['cumplida'] === '1';
        $item = new RetroItem(0, (int)$datos['sprint_id'], $datos['categoria'],
            trim($datos['descripcion']), $cumplida, $datos['fecha_revision'] ?: null);
        return $this->itemQuery->guardar($item);
    }

    public function modificar_item(array $datos): bool {
        $cumplida = null;
        if ($datos['categoria'] === 'accion' && $datos['cumplida'] !== '')
            $cumplida = $datos['cumplida'] === '1';
        $item = new RetroItem((int)$datos['id'], (int)$datos['sprint_id'], $datos['categoria'],
            trim($datos['descripcion']), $cumplida, $datos['fecha_revision'] ?: null);
        return $this->itemQuery->modificar($item);
    }
}