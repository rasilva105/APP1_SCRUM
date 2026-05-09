<?php
// Vista: lista de ítems de un sprint
$cat_label = ['logro'=>'Logro','impedimento'=>'Impedimento','accion'=>'Acción','comentario'=>'Comentario','otro'=>'Otro'];
$cat_emoji = ['logro'=>'✅','impedimento'=>'⚠️','accion'=>'🎯','comentario'=>'💬','otro'=>'🔖'];
$cat_color = ['logro'=>'var(--positive)','impedimento'=>'var(--negative)','accion'=>'var(--action)','comentario'=>'var(--comment)','otro'=>'var(--other)'];
?>

<a href="index.php?accion=lista_sprints" class="back-link">← Volver a Sprints</a>

<div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:12px;margin-bottom:24px;">
  <div>
    <div class="page-title"><?= htmlspecialchars($sprint->getNombre()) ?></div>
    <div class="page-sub">
      📅 <?= date('d/m/Y', strtotime($sprint->getFechaInicio())) ?>
      → <?= date('d/m/Y', strtotime($sprint->getFechaFin())) ?>
    </div>
  </div>
  <a href="index.php?accion=registro_item&sprint_id=<?= $sprint->getId() ?>"
     class="btn btn-primary">＋ Añadir Ítem</a>
</div>

<!-- Stats por categoría -->
<div class="grid-3" style="margin-bottom:28px;">
  <?php foreach (['logro','impedimento','accion'] as $cat): ?>
    <div class="stat-card">
      <div class="stat-num" style="color:<?= $cat_color[$cat] ?>;">
        <?= $counts[$cat] ?? 0 ?>
      </div>
      <div class="stat-label"><?= $cat_emoji[$cat] ?> <?= $cat_label[$cat] ?>s</div>
    </div>
  <?php endforeach; ?>
</div>

<?php if (empty($items)): ?>
  <div class="empty">
    <div class="empty-icon">📝</div>
    <div class="empty-text">No hay ítems registrados en este sprint.</div>
  </div>
<?php else: ?>
  <?php
  // Agrupar por categoría
  $grupos = [];
  foreach ($items as $it) {
      $grupos[$it->getCategoria()][] = $it;
  }
  foreach ($grupos as $cat => $lista):
  ?>
    <div class="section-header">
      <div class="section-dot" style="background:<?= $cat_color[$cat] ?>;
           box-shadow:0 0 6px <?= $cat_color[$cat] ?>;"></div>
      <div class="section-title">
        <?= $cat_emoji[$cat] ?> <?= $cat_label[$cat] ?>s (<?= count($lista) ?>)
      </div>
      <div class="section-line"></div>
    </div>

    <?php foreach ($lista as $it): ?>
      <div class="retro-item">
        <div class="retro-dot dot-<?= $it->getCategoria() ?>"></div>
        <div class="retro-body">
          <div class="retro-desc"><?= htmlspecialchars($it->getDescripcion()) ?></div>
          <div class="retro-meta">
            <span class="badge badge-<?= $it->getCategoria() ?>">
              <?= $cat_emoji[$it->getCategoria()] ?> <?= $cat_label[$it->getCategoria()] ?>
            </span>
            <?php if ($it->getCategoria() === 'accion'): ?>
              <?php if ($it->getCumplida() === true): ?>
                <span class="badge badge-cumplida">✅ Cumplida</span>
              <?php elseif ($it->getCumplida() === false): ?>
                <span class="badge badge-incumplida">❌ No cumplida</span>
              <?php else: ?>
                <span class="badge badge-pendiente">🕐 Sin evaluar</span>
              <?php endif; ?>
            <?php endif; ?>
            <?php if ($it->getFechaRevision()): ?>
              <span style="font-size:.75rem;color:var(--muted);">
                📅 <?= date('d/m/Y', strtotime($it->getFechaRevision())) ?>
              </span>
            <?php endif; ?>
          </div>
        </div>
        <div class="retro-btns">
          <a href="index.php?accion=modificar_item&id=<?= $it->getId() ?>"
             class="btn btn-secondary btn-sm">✏️</a>
          <a href="index.php?accion=borrar_item&id=<?= $it->getId() ?>"
             class="btn btn-danger btn-sm">🗑️</a>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endforeach; ?>
<?php endif; ?>