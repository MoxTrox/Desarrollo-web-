<?php

session_start();

if(!isset($_POST["correo"]) || !isset($_POST["nombre"])) exit();

include_once "conexion.php";

$email = $_POST["correo"];
$nombre = $_POST["nombre"];


$id  = $_SESSION['id'];

$sentencia = $base_de_datos->prepare("UPDATE usuario SET email = ?, nombre = ? WHERE id = ?);");
$resultado = $sentencia->execute([$email, $nombre, $id]);


if($resultado === TRUE) echo "cambios guardados";
else echo "Algo salió mal. Por favor verifica que la tabla exista, asi como el ID del usuario";


?>
