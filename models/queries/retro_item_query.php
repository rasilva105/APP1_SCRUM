<?php
require_once __DIR__ . '/../config/model_base.php';
require_once __DIR__ . '/../entities/retro_item.php';

class RetroItemQuery extends ModelBase {

    public function listarPorSprint(int $sprint_id): array {
        $items = [];
        $stmt  = $this->conexion->prepare(
            "SELECT * FROM retro_items WHERE sprint_id = ? ORDER BY categoria, id"
        );
        $stmt->bind_param("i", $sprint_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        while ($fila = $resultado->fetch_assoc()) {
            $cumplida  = ($fila['cumplida'] === null) ? null : (bool)$fila['cumplida'];
            $items[]   = new RetroItem(
                $fila['id'], $fila['sprint_id'], $fila['categoria'],
                $fila['descripcion'], $cumplida, $fila['fecha_revision']
            );
        }
        return $items;
    }

    public function obtenerPorId(int $id): ?RetroItem {
        $stmt = $this->conexion->prepare("SELECT * FROM retro_items WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($fila = $resultado->fetch_assoc()) {
            $cumplida = ($fila['cumplida'] === null) ? null : (bool)$fila['cumplida'];
            return new RetroItem(
                $fila['id'], $fila['sprint_id'], $fila['categoria'],
                $fila['descripcion'], $cumplida, $fila['fecha_revision']
            );
        }
        return null;
    }

    public function guardar(RetroItem $item): bool {
        $cumplida = ($item->getCumplida() === null) ? null : (int)$item->getCumplida();
        $stmt = $this->conexion->prepare(
            "INSERT INTO retro_items (sprint_id, categoria, descripcion, cumplida, fecha_revision)
             VALUES (?, ?, ?, ?, ?)"
        );
        $sid  = $item->getSprintId();
        $cat  = $item->getCategoria();
        $desc = $item->getDescripcion();
        $frev = $item->getFechaRevision();
        $stmt->bind_param("issis", $sid, $cat, $desc, $cumplida, $frev);
        return $stmt->execute();
    }

    public function modificar(RetroItem $item): bool {
        $cumplida = ($item->getCumplida() === null) ? null : (int)$item->getCumplida();
        $stmt = $this->conexion->prepare(
            "UPDATE retro_items SET categoria = ?, descripcion = ?, cumplida = ?, fecha_revision = ?
             WHERE id = ?"
        );
        $cat  = $item->getCategoria();
        $desc = $item->getDescripcion();
        $frev = $item->getFechaRevision();
        $id   = $item->getId();
        $stmt->bind_param("ssisi", $cat, $desc, $cumplida, $frev, $id);
        return $stmt->execute();
    }

    public function borrar(int $id): bool {
        $stmt = $this->conexion->prepare("DELETE FROM retro_items WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function contarPorCategoria(int $sprint_id): array {
        $stmt = $this->conexion->prepare(
            "SELECT categoria, COUNT(*) as total FROM retro_items
             WHERE sprint_id = ? GROUP BY categoria"
        );
        $stmt->bind_param("i", $sprint_id);
        $stmt->execute();
        $res    = $stmt->get_result();
        $counts = [];
        while ($fila = $res->fetch_assoc()) {
            $counts[$fila['categoria']] = $fila['total'];
        }
        return $counts;
    }
}