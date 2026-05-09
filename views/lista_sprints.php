<?php // Vista: lista de sprints ?>

<div class="page-title">Sprints Registrados</div>
<div class="page-sub">Historial completo de todos los sprints y sus retrospectivas.</div>

<?php if (empty($sprints)): ?>
  <div class="empty">
    <div class="empty-icon">🏃</div>
    <div class="empty-text">No hay sprints registrados aún.</div>
    <a href="index.php?accion=registro_sprint" class="btn btn-primary" style="margin-top:16px;">＋ Crear primer Sprint</a>
  </div>
<?php else: ?>
  <?php foreach ($sprints as $s): ?>
    <div class="sprint-item">
      <div style="flex:1;">
        <div class="sprint-name"><?= htmlspecialchars($s->getNombre()) ?></div>
        <div class="sprint-dates">
          📅 <?= date('d/m/Y', strtotime($s->getFechaInicio())) ?>
          → <?= date('d/m/Y', strtotime($s->getFechaFin())) ?>
        </div>
      </div>
      <div class="sprint-actions">
        <a href="index.php?accion=lista_items&sprint_id=<?= $s->getId() ?>"
           class="btn btn-secondary btn-sm">📋 Ver ítems</a>
        <a href="index.php?accion=registro_item&sprint_id=<?= $s->getId() ?>"
           class="btn btn-primary btn-sm">＋ Ítem</a>
        <a href="index.php?accion=modificar_sprint&id=<?= $s->getId() ?>"
           class="btn btn-secondary btn-sm">✏️ Editar</a>
        <a href="index.php?accion=borrar_sprint&id=<?= $s->getId() ?>"
           class="btn btn-danger btn-sm">🗑️ Borrar</a>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>