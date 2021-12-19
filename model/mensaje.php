<?php
require_once("model/conexion.php");
require_once "model/sesion.php";
require_once "model/usuario.php";

class mensaje
{

    public $id_usuario;
    public $id_tema;
    public $texto;
    public $conexion;

    public function __construct($id_usuario, $id_tema, $texto)
    {
        $this->conexion = new Conexion();
        $this->id_usuario = $id_usuario;
        $this->id_tema = $id_tema;
        $this->texto = $texto;
    }

    public function mostrarMensajes($id_tema)
    {
        $this->conexion->conectar();
        $mensajes = $this->conexion->consultar("SELECT * FROM mensaje WHERE id_tema = '$id_tema'");
        return $mensajes;
        $this->conexion->desconectar();

    }

    public function crearMensaje()
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar("INSERT INTO mensaje(id_usuario, id_tema, texto) VALUES ('$this->id_usuario', '$this->id_tema', '$this->texto')");
        $this->conexion->desconectar();
    }

    public function eliminarMensaje($id_mensaje)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar("DELETE FROM mensaje WHERE id_mensaje = '$id_mensaje'");
        $this->conexion->desconectar();
    }
}