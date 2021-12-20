<?php include "head.php"; ?>

<!--Pagina que muestra un formulario para iniciar sesion-->
<body>
<div id="contenedor">
    <header>
        <h1>Registro de usuario</h1>
    </header>
    <form action="" method="post">
        <div class="formulario">
            <form action="" method="post">
                <div class="form">
                    <input type="text" name="alias" placeholder="Alias" class="form-input"><br/>
                    <input type="password" name="password" placeholder="Contraseña" class="form-input"><br/>
                    <input type='submit' name='submit' value='Iniciar sesión' class="form-boton">
                </div>
                <?php
                require_once('model/sesion.php');
                require_once('model/usuario.php');
                //Verificacion de que el usuario existe al hacer login y se crea una nueva sesion
                if (isset($_POST['submit'])) {
                    //Verificamos alias, contraseña y creamos la sesión
                    $usuario = new Usuario($_POST['alias'], $_POST['password'], null);
                    if ($usuario->verificar($_POST['alias'], $_POST['password'])) {
                        $sesion = new Sesion();
                        $sesion->set('alias',($_POST['alias']));
                        header("Location:index.php");
                    }
                    else {
                        echo "<div class='form'>Nombre de usuario o contraseña incorrectos.</div>";
                    }
                }
                ?>
            </form>
        </div>
</div>
</body>
</html>

