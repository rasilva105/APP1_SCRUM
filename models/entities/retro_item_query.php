<?php
class RetroItem {
    private int $id;
    private int $sprint_id;
    private string $categoria;
    private string $descripcion;
    private ?bool $cumplida;
    private ?string $fecha_revision;

    public function __construct(
        int $id = 0,
        int $sprint_id = 0,
        string $categoria = 'logro',
        string $descripcion = '',
        ?bool $cumplida = null,
        ?string $fecha_revision = null
    ) {
        $this->id             = $id;
        $this->sprint_id      = $sprint_id;
        $this->categoria      = $categoria;
        $this->descripcion    = $descripcion;
        $this->cumplida       = $cumplida;
        $this->fecha_revision = $fecha_revision;
    }

    public function getId(): int                { return $this->id; }
    public function getSprintId(): int          { return $this->sprint_id; }
    public function getCategoria(): string      { return $this->categoria; }
    public function getDescripcion(): string    { return $this->descripcion; }
    public function getCumplida(): ?bool        { return $this->cumplida; }
    public function getFechaRevision(): ?string { return $this->fecha_revision; }

    public function setId(int $id): void                 { $this->id = $id; }
    public function setSprintId(int $sid): void          { $this->sprint_id = $sid; }
    public function setCategoria(string $c): void        { $this->categoria = $c; }
    public function setDescripcion(string $d): void      { $this->descripcion = $d; }
    public function setCumplida(?bool $c): void          { $this->cumplida = $c; }
    public function setFechaRevision(?string $f): void   { $this->fecha_revision = $f; }
}