<?php
// Vista: editar ítem
$cat_label = ['logro'=>'Logro','impedimento'=>'Impedimento','accion'=>'Acción','comentario'=>'Comentario','otro'=>'Otro'];
?>

<a href="index.php?accion=lista_items&sprint_id=<?= $sprint->getId() ?>" class="back-link">
  ← Volver a <?= htmlspecialchars($sprint->getNombre()) ?>
</a>

<div class="page-title">Editar Ítem</div>
<div class="page-sub">Sprint: <strong><?= htmlspecialchars($sprint->getNombre()) ?></strong></div>

<!-- STEPPER -->
<div class="stepper">
  <div class="step done">
    <div class="step-circle">✓</div>
    <div class="step-label">Selección</div>
  </div>
  <div class="step-line done"></div>
  <div class="step active">
    <div class="step-circle">2</div>
    <div class="step-label">Editar</div>
  </div>
  <div class="step-line"></div>
  <div class="step">
    <div class="step-circle">3</div>
    <div class="step-label">Guardar</div>
  </div>
</div>

<div class="card" style="max-width:580px;">
  <form method="POST" action="index.php?accion=modificar_item">
    <input type="hidden" name="id"        value="<?= $item->getId() ?>">
    <input type="hidden" name="sprint_id" value="<?= $sprint->getId() ?>">

    <div class="section-header">
      <div class="section-dot" style="background:var(--accent);"></div>
      <div class="section-title">Paso 2 — Editar datos del Ítem</div>
      <div class="section-line"></div>
    </div>

    <div class="form-row">
      <label for="categoria">Categoría *</label>
      <select id="categoria" name="categoria" required>
        <?php
        $cats = ['logro'=>'✅ Logro','impedimento'=>'⚠️ Impedimento',
                 'accion'=>'🎯 Acción','comentario'=>'💬 Comentario','otro'=>'🔖 Otro'];
        foreach ($cats as $val => $lbl):
        ?>
          <option value="<?= $val ?>" <?= $item->getCategoria()===$val?'selected':'' ?>>
            <?= $lbl ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-row">
      <label for="descripcion">Descripción *</label>
      <textarea id="descripcion" name="descripcion" required><?= htmlspecialchars($item->getDescripcion()) ?></textarea>
    </div>

    <div class="form-row">
      <label for="cumplida">Estado de cumplimiento</label>
      <select id="cumplida" name="cumplida">
        <option value=""  <?= $item->getCumplida()===null  ?'selected':'' ?>>Sin evaluar</option>
        <option value="1" <?= $item->getCumplida()===true  ?'selected':'' ?>>✅ Cumplida</option>
        <option value="0" <?= $item->getCumplida()===false ?'selected':'' ?>>❌ No cumplida</option>
      </select>
    </div>

    <div class="form-row">
      <label for="fecha_revision">Fecha de revisión</label>
      <input type="date" id="fecha_revision" name="fecha_revision"
             value="<?= $item->getFechaRevision() ?? '' ?>">
    </div>

    <hr class="divider">

    <div class="section-header">
      <div class="section-dot" style="background:var(--comment);"></div>
      <div class="section-title">Paso 3 — Guardar cambios</div>
      <div class="section-line"></div>
    </div>
    <div class="form-actions">
      <a href="index.php?accion=lista_items&sprint_id=<?= $sprint->getId() ?>"
         class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-primary">💾 Guardar cambios</button>
    </div>

  </form>
</div>