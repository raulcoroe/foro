<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Nuevo registro</title>
</head>
<body>
<header>
    <h1>Inicio de sesión</h1>
</header>
<form action="" method="post">
    <p>Nombre de usuario:</p>
    <input type="text" name="user"/><br/><br/>
    <p>Contraseña:</p>
    <input type="password" name="password"/>
    <p><input type="submit" name="submit" value="Iniciar sesión"/></p>

    <?php
    require_once("sesion.php");
    require_once("usuarios.php");
    if (isset($_POST['submit'])) {
        $usuario = new usuario($_POST['user'], $_POST['password']);
        //Verificamos que el nombre de usuario y la contraseña son correctos y, en ese caso, creamos la sesión y redirigimos
        if ($usuario->verificar($_POST['user'], $_POST['password'])) {
            $sesion = new Sesion();
            $sesion->set('user', ($_POST['user']));
            header("Location:inicio.php");
        } else {
            echo "<div id='msg'>Nombre de usuario o contraseña incorrectos.</div>";
        }

    }
    ?>
</form>
<p id="link"><a href="new.php">Regístrate aquí</a></p>
<p id="link"><a href="index.php">Volver</a></p>
</body>
</html>