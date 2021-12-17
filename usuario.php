<?php
require_once("clase_conexion.php");
class usuario
{
    public $alias;
    public $email;
    public $contrasena;
    public $conexion;

    function __construct($alias, $email)
    {
        $this->alias = $alias;
        $this->email = $email;
        $this->conexion = new Conexion();
    }

    public function encriptar($enc)
    {
        $this->conexion->conectar();
        $pass = password_hash($enc, PASSWORD_DEFAULT);
        $this->contrasena = $pass;
        return $this->contrasena;
        $this->conexion->desconectar();
    }

    public function comprobaciones()
    {
        $this->conexion->conectar();
        //Comprobamos que los campos no estén vacíos
        if ($this->alias == '' || $this->contrasena == '' || $this->email == '') {
            echo "<div class='form'>Por favor, introduce todos los campos requeridos</div>";
            return false;
        }
        //Comprobamos que la dirección de correo sea válida
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='form'> La dirección de correo electrónico " . $this->email . " es inválida. Por favor, introduzca una correcta.</div>";
            return false;
        } //Comprobamos que el alias no esté ya registrado
        else {
            //Consultamos los registros y su valor en la columna user y los almacenamos en el array $usuarios
            $usuarios = $this->conexion->consultar("SELECT alias from usuario");
            if (count($usuarios)) {
                //Recorremos el array y en el caso de que el nombre introducido corresponda con alguno ya registrado impedirá el registro
                foreach ($usuarios as $alias) {
                    if ($alias['alias'] == $this->alias) {
                        echo "<div class='form'> Alias ya registrado. Por favor elija otro.</div>";
                        return false;
                        break;
                    }
                }
            }
        }
    }

    public function nuevo()
    {
        try {
            $this->conexion->conectar();
            $this->conexion->ejecutar("INSERT usuario SET alias='$this->alias', password='$this->contrasena', email='$this->email'");
            //Crea un objeto correo cuyos parámetros son el nombre de usuario y el email introducido para posteriormente llamar al método enviar() y mandarle el correo
            $this->enviar();
            $this->conexion->desconectar();
        } catch (PDOException $ex) {
            //Devuelve la excepción en caso de no poder insertar el usuario
            throw $ex;
        }
        $this->conexion->desconectar();
    }

    //Método que envía el correo y devuelve un error si no es posible
    public function enviar()
    {
        $email_origen = "admin@localhost.com";
        $formato = "html";
        $asunto = "Usuario creado";
        $mensaje = "Su cuenta con nombre de usuario:" . $this->alias . "se ha creado correctamente.";
        $headers = "";

        $headers = "To: " . $this->alias . "<" . $this->email . "> \r \n";
        $headers .= "From: Administrador" . "<" . $email_origen . "> \r \n";
        $headers .= "Return-path: <" . $email_origen . "> \r \n";
        $headers .= "Reply-to: " . $email_origen . "\r \n";
        $headers .= "MIME-Version: 1.0 \r \n";
        if ($formato == "html") {
            $headers .= "Content-Type: text/html; charset = utf-8 \r \n";
        } else {
            $headers .= "Content-Type: text/plain; charset = utf-8 \r \n";
        }
        if (mail($this->email, $asunto, $mensaje, $headers)) {
            echo "Su correo se envió";
        } else {
            echo "Error al enviar correo";
        }
    }


    public function verificar($user, $pass)
    {
        try {
            $this->conexion->conectar();
            //Recogemos todas las filas con las columnas user y password y las almacenamos en el array $usuarios
            $usuarios = $this->conexion->consultar("SELECT alias, password FROM usuario");
            if (count($usuarios)) {
                //Recorremos todas las filas del array
                for ($i = 0; $i < count($usuarios); $i++) {
                    /*Si el usuario introducido coincide con uno almacenado en la base de datos y la función password_verify confirma
                    que la contraseña introducida coincide con el hash de la almacenada, la función devuelve true para que el usuario pueda loguear*/
                    if ($usuarios[$i]['user'] == $user && password_verify($pass, $usuarios[$i]['password'])) {
                        echo "Contraseña correcta";
                        return true;
                        break;
                    }
                }
            }
            $this->conexion->desconectar();
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
}
