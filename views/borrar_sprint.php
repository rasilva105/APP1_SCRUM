<?php // Vista: confirmar borrado de sprint ?>

<a href="index.php?accion=lista_sprints" class="back-link">← Volver a Sprints</a>

<div class="page-title">Eliminar Sprint</div>
<div class="page-sub">Esta acción es irreversible y eliminará todos los ítems del sprint.</div>

<div class="confirm-box">
  <p>¿Estás seguro de que deseas eliminar el sprint:</p>
  <p class="confirm-name"><?= htmlspecialchars($sprint->getNombre()) ?></p>
  <p style="color:var(--muted);font-size:.83rem;margin-top:6px;">
    📅 <?= date('d/m/Y', strtotime($sprint->getFechaInicio())) ?>
    → <?= date('d/m/Y', strtotime($sprint->getFechaFin())) ?>
  </p>
  <div class="form-actions" style="margin-top:24px;">
    <a href="index.php?accion=lista_sprints" class="btn btn-secondary">Cancelar</a>
    <a href="index.php?accion=borrar_sprint&id=<?= $sprint->getId() ?>&confirmar=1"
       class="btn btn-danger">🗑️ Sí, eliminar</a>
  </div>
</div>