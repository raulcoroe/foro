<?php
require_once("conexion.php");
require_once("sesion.php");
class tema
{

    public $id_usuario;
    public $titulo;
    public $fecha_creacion;


    public function __construct($id_usuario, $titulo, $fecha_creacion)
    {
        $this->id_usuario = $id_usuario;
        $this->titulo = $titulo;
        $this->fecha_creacion = $fecha_creacion;
    }

}