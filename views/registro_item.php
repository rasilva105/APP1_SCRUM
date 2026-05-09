<?php // Vista: registrar nuevo ítem con stepper ?>

<a href="index.php?accion=lista_items&sprint_id=<?= $sprint->getId() ?>" class="back-link">
  ← Volver a <?= htmlspecialchars($sprint->getNombre()) ?>
</a>

<div class="page-title">Nuevo Ítem de Retrospectiva</div>
<div class="page-sub">Sprint: <strong><?= htmlspecialchars($sprint->getNombre()) ?></strong></div>

<!-- STEPPER -->
<div class="stepper">
  <div class="step active">
    <div class="step-circle">1</div>
    <div class="step-label">Categoría</div>
  </div>
  <div class="step-line"></div>
  <div class="step">
    <div class="step-circle">2</div>
    <div class="step-label">Descripción</div>
  </div>
  <div class="step-line"></div>
  <div class="step">
    <div class="step-circle">3</div>
    <div class="step-label">Detalles</div>
  </div>
  <div class="step-line"></div>
  <div class="step">
    <div class="step-circle">4</div>
    <div class="step-label">Guardar</div>
  </div>
</div>

<div class="card" style="max-width:580px;">
  <form method="POST" action="index.php?accion=guardar_item">
    <input type="hidden" name="sprint_id" value="<?= $sprint->getId() ?>">

    <!-- Paso 1 -->
    <div class="section-header">
      <div class="section-dot" style="background:var(--accent);"></div>
      <div class="section-title">Paso 1 — Categoría del ítem</div>
      <div class="section-line"></div>
    </div>
    <div class="form-row">
      <label for="categoria">Categoría *</label>
      <select id="categoria" name="categoria" required>
        <option value="logro">✅ Logro — lo que salió bien</option>
        <option value="impedimento">⚠️ Impedimento — lo que se debe mejorar</option>
        <option value="accion">🎯 Acción — compromiso para el próximo sprint</option>
        <option value="comentario">💬 Comentario general</option>
        <option value="otro">🔖 Otro</option>
      </select>
    </div>

    <hr class="divider">

    <!-- Paso 2 -->
    <div class="section-header">
      <div class="section-dot" style="background:var(--action);"></div>
      <div class="section-title">Paso 2 — Descripción</div>
      <div class="section-line"></div>
    </div>
    <div class="form-row">
      <label for="descripcion">Descripción *</label>
      <textarea id="descripcion" name="descripcion"
                placeholder="Describe el ítem con el mayor detalle posible..." required></textarea>
    </div>

    <hr class="divider">

    <!-- Paso 3 -->
    <div class="section-header">
      <div class="section-dot" style="background:var(--comment);"></div>
      <div class="section-title">Paso 3 — Detalles adicionales (solo acciones)</div>
      <div class="section-line"></div>
    </div>
    <div class="form-row">
      <label for="cumplida">Estado de cumplimiento</label>
      <select id="cumplida" name="cumplida">
        <option value="">Sin evaluar</option>
        <option value="1">✅ Cumplida</option>
        <option value="0">❌ No cumplida</option>
      </select>
    </div>
    <div class="form-row">
      <label for="fecha_revision">Fecha de revisión</label>
      <input type="date" id="fecha_revision" name="fecha_revision">
    </div>

    <hr class="divider">

    <!-- Paso 4 -->
    <div class="section-header">
      <div class="section-dot" style="background:var(--other);"></div>
      <div class="section-title">Paso 4 — Confirmar y guardar</div>
      <div class="section-line"></div>
    </div>
    <div class="form-actions">
      <a href="index.php?accion=lista_items&sprint_id=<?= $sprint->getId() ?>"
         class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-primary">💾 Guardar Ítem</button>
    </div>

  </form>
</div>