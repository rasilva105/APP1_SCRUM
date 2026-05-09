<?php

require_once 'models/queries/sprint_query.php';
require_once 'models/queries/retro_item_query.php';

$sprintQuery = new SprintQuery();
$itemQuery = new RetroItemQuery();

if (isset($_POST['guardar_sprint'])) {

    $sprintQuery->guardarSprint(
        $_POST['nombre'],
        $_POST['fecha_inicio'],
        $_POST['fecha_fin']
    );
}

if (isset($_POST['guardar_item'])) {

    $itemQuery->guardarItem(
        $_POST['sprint_id'],
        $_POST['categoria'],
        $_POST['descripcion'],
        $_POST['cumplida'],
        $_POST['fecha_revision']
    );
}

$sprints = $sprintQuery->listarSprints();
$items = $itemQuery->listarItems();

include 'views/registro_sprint.php';
include 'views/lista_sprints.php';
include 'views/registro_item.php';
include 'views/lista_items.php';

?>