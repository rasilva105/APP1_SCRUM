<?php // Vista: registrar nuevo sprint ?>

<a href="index.php?accion=lista_sprints" class="back-link">← Volver a Sprints</a>

<div class="page-title">Nuevo Sprint</div>
<div class="page-sub">Completa los datos para registrar un nuevo sprint.</div>

<!-- STEPPER -->
<div class="stepper">
  <div class="step active">
    <div class="step-circle">1</div>
    <div class="step-label">Nombre</div>
  </div>
  <div class="step-line"></div>
  <div class="step">
    <div class="step-circle">2</div>
    <div class="step-label">Fechas</div>
  </div>
  <div class="step-line"></div>
  <div class="step">
    <div class="step-circle">3</div>
    <div class="step-label">Guardar</div>
  </div>
</div>

<div class="card" style="max-width:580px;">
  <form method="POST" action="index.php?accion=guardar_sprint">

    <div class="section-header">
      <div class="section-dot" style="background:var(--accent);"></div>
      <div class="section-title">Paso 1 — Nombre del Sprint</div>
      <div class="section-line"></div>
    </div>
    <div class="form-row">
      <label for="nombre">Nombre *</label>
      <input type="text" id="nombre" name="nombre"
             placeholder="Ej. Sprint 3 — Módulo de pagos" required>
    </div>

    <hr class="divider">

    <div class="section-header">
      <div class="section-dot" style="background:var(--action);"></div>
      <div class="section-title">Paso 2 — Fechas del Sprint</div>
      <div class="section-line"></div>
    </div>
    <div class="grid-2">
      <div class="form-row">
        <label for="fecha_inicio">Fecha de inicio *</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required>
      </div>
      <div class="form-row">
        <label for="fecha_fin">Fecha de fin *</label>
        <input type="date" id="fecha_fin" name="fecha_fin" required>
      </div>
    </div>

    <hr class="divider">

    <div class="section-header">
      <div class="section-dot" style="background:var(--comment);"></div>
      <div class="section-title">Paso 3 — Confirmar y guardar</div>
      <div class="section-line"></div>
    </div>
    <div class="form-actions">
      <a href="index.php?accion=lista_sprints" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-primary">💾 Guardar Sprint</button>
    </div>

  </form>
</div>