<?php // Vista: confirmar borrado de ítem
$cat_emoji = ['logro'=>'✅','impedimento'=>'⚠️','accion'=>'🎯','comentario'=>'💬','otro'=>'🔖'];
?>

<a href="index.php?accion=lista_items&sprint_id=<?= $sprint->getId() ?>" class="back-link">
  ← Volver a <?= htmlspecialchars($sprint->getNombre()) ?>
</a>

<div class="page-title">Eliminar Ítem</div>
<div class="page-sub">Esta acción es irreversible.</div>

<div class="confirm-box">
  <p>¿Estás seguro de que deseas eliminar este ítem?</p>
  <p class="confirm-name">
    <?= $cat_emoji[$item->getCategoria()] ?>
    <?= htmlspecialchars($item->getDescripcion()) ?>
  </p>
  <p style="color:var(--muted);font-size:.83rem;margin-top:6px;">
    Sprint: <?= htmlspecialchars($sprint->getNombre()) ?>
  </p>
  <div class="form-actions" style="margin-top:24px;">
    <a href="index.php?accion=lista_items&sprint_id=<?= $sprint->getId() ?>"
       class="btn btn-secondary">Cancelar</a>
    <a href="index.php?accion=borrar_item&id=<?= $item->getId() ?>&confirmar=1"
       class="btn btn-danger">🗑️ Sí, eliminar</a>
  </div>
</div>