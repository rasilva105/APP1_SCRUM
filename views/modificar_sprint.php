<?php // Vista: editar sprint ?>

<a href="index.php?accion=lista_sprints" class="back-link">← Volver a Sprints</a>

<div class="page-title">Editar Sprint</div>
<div class="page-sub">Modifica los datos del sprint seleccionado.</div>

<!-- STEPPER -->
<div class="stepper">
  <div class="step done">
    <div class="step-circle">✓</div>
    <div class="step-label">Selección</div>
  </div>
  <div class="step-line done"></div>
  <div class="step active">
    <div class="step-circle">2</div>
    <div class="step-label">Editar datos</div>
  </div>
  <div class="step-line"></div>
  <div class="step">
    <div class="step-circle">3</div>
    <div class="step-label">Guardar</div>
  </div>
</div>

<div class="card" style="max-width:580px;">
  <form method="POST" action="index.php?accion=modificar_sprint">
    <input type="hidden" name="id" value="<?= $sprint->getId() ?>">

    <div class="section-header">
      <div class="section-dot" style="background:var(--accent);"></div>
      <div class="section-title">Paso 2 — Editar datos del Sprint</div>
      <div class="section-line"></div>
    </div>
    <div class="form-row">
      <label for="nombre">Nombre *</label>
      <input type="text" id="nombre" name="nombre"
             value="<?= htmlspecialchars($sprint->getNombre()) ?>" required>
    </div>
    <div class="grid-2">
      <div class="form-row">
        <label for="fecha_inicio">Fecha de inicio *</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio"
               value="<?= $sprint->getFechaInicio() ?>" required>
      </div>
      <div class="form-row">
        <label for="fecha_fin">Fecha de fin *</label>
        <input type="date" id="fecha_fin" name="fecha_fin"
               value="<?= $sprint->getFechaFin() ?>" required>
      </div>
    </div>

    <hr class="divider">

    <div class="section-header">
      <div class="section-dot" style="background:var(--comment);"></div>
      <div class="section-title">Paso 3 — Guardar cambios</div>
      <div class="section-line"></div>
    </div>
    <div class="form-actions">
      <a href="index.php?accion=lista_sprints" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-primary">💾 Guardar cambios</button>
    </div>

  </form>
</div>