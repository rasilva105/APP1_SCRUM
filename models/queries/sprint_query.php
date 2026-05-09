<?php
require_once __DIR__ . '/../config/model_base.php';
require_once __DIR__ . '/../entities/sprint.php';

class SprintQuery extends ModelBase {

    public function listar(): array {
        $sprints   = [];
        $resultado = $this->conexion->query("SELECT * FROM sprints ORDER BY id DESC");
        while ($fila = $resultado->fetch_assoc()) {
            $sprints[] = new Sprint(
                $fila['id'],
                $fila['nombre'],
                $fila['fecha_inicio'],
                $fila['fecha_fin']
            );
        }
        return $sprints;
    }

    public function obtenerPorId(int $id): ?Sprint {
        $stmt = $this->conexion->prepare("SELECT * FROM sprints WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($fila = $resultado->fetch_assoc()) {
            return new Sprint($fila['id'], $fila['nombre'], $fila['fecha_inicio'], $fila['fecha_fin']);
        }
        return null;
    }

    public function guardar(Sprint $sprint): bool {
        $stmt = $this->conexion->prepare(
            "INSERT INTO sprints (nombre, fecha_inicio, fecha_fin) VALUES (?, ?, ?)"
        );
        $n = $sprint->getNombre();
        $i = $sprint->getFechaInicio();
        $f = $sprint->getFechaFin();
        $stmt->bind_param("sss", $n, $i, $f);
        return $stmt->execute();
    }

    public function modificar(Sprint $sprint): bool {
        $stmt = $this->conexion->prepare(
            "UPDATE sprints SET nombre = ?, fecha_inicio = ?, fecha_fin = ? WHERE id = ?"
        );
        $n  = $sprint->getNombre();
        $i  = $sprint->getFechaInicio();
        $f  = $sprint->getFechaFin();
        $id = $sprint->getId();
        $stmt->bind_param("sssi", $n, $i, $f, $id);
        return $stmt->execute();
    }

    public function borrar(int $id): bool {
        $stmt = $this->conexion->prepare("DELETE FROM sprints WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}