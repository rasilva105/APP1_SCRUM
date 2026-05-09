<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "registro_retro_db"
);

if($conn->connect_error){
    die("Error de conexión");
}

echo "Conexión exitosa";
?>