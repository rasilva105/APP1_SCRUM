<?php
class Sprint {
    private int $id;
    private string $nombre;
    private string $fecha_inicio;
    private string $fecha_fin;

    public function __construct(int $id = 0, string $nombre = '', string $fecha_inicio = '', string $fecha_fin = '') {
        $this->id           = $id;
        $this->nombre       = $nombre;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin    = $fecha_fin;
    }

    public function getId(): int             { return $this->id; }
    public function getNombre(): string      { return $this->nombre; }
    public function getFechaInicio(): string { return $this->fecha_inicio; }
    public function getFechaFin(): string    { return $this->fecha_fin; }

    public function setId(int $id): void            { $this->id = $id; }
    public function setNombre(string $n): void      { $this->nombre = $n; }
    public function setFechaInicio(string $f): void { $this->fecha_inicio = $f; }
    public function setFechaFin(string $f): void    { $this->fecha_fin = $f; }
}