<?php
require_once("model/conexion.php");
require_once "model/usuario.php";

class tema
{

    public $id_usuario;
    public $titulo;
    public $conexion;

    public function __construct($id_usuario, $titulo)
    {
        $this->conexion = new Conexion();
        $this->id_usuario = $id_usuario;
        $this->titulo = $titulo;
    }

    public function mostrarTemas()
    {
        $this->conexion->conectar();
        $temas = $this->conexion->consultar("SELECT * FROM tema");
        return $temas;
        $this->conexion->desconectar();

    }

    public function crearTema()
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar("INSERT INTO tema(id_usuario, titulo) VALUES ('$this->id_usuario', '$this->titulo')");
        $this->conexion->desconectar();
    }

    public function eliminarTema($tema)
    {
        $this->conexion->conectar();
        $this->conexion->ejecutar("DELETE FROM tema WHERE id_tema = '$tema'");
        $this->conexion->desconectar();
    }
}