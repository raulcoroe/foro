<?php
//Cierra la sesion iniciada
require_once "model/sesion.php";
$sesion = new Sesion();
$sesion->borrar_sesion();
?>
