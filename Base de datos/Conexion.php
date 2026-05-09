<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "registro_retro_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>