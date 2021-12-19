<?php

class Conexion
{
    private $servidor;
    private $user;
    private $password;
    private $dbh;

    public function __construct()
    {
        $dbname = 'foro';
        $this->servidor = "mysql:host=localhost;dbname=$dbname";
        $this->user = 'root';
        $this->password = '';
    }

    public function conectar()
    {
        try {
            $this->dbh = new PDO($this->servidor, $this->user, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex) {
            echo "Problemas al conectar con la base de datos";
        }
    }

    public function desconectar()
    {
        $this->dbh = null;
    }

    public function ejecutar($strComando)
    {
        try {
            $stmt = $this->dbh->prepare($strComando);
            $stmt->execute();
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function consultar($strComando)
    {
        try {
            $stmt = $this->dbh->prepare($strComando);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        } catch (PDOException $ex) {
            throw $ex;
        }
    }
}

