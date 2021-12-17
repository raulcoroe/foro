<?php include "head.php"; ?>
<body>
<div id="contenedor">
    <header>
        <h1>Registro de usuario</h1>
    </header>
    <form action="" method="post">
        <div class="formulario">
            <form action="" method="post">
                <div class="form">
                    <input type="text" name="user" placeholder="Alias" class="form-input"><br/>
                    <input type="password" name="password" placeholder="Contraseña" class="form-input"><br/>
                    <input type='submit' name='submit' value='Iniciar sesión' class="form-boton">
                </div>
                <?php
                require('sesion.php');
                require('usuario.php');
                if (isset($_POST['submit'])) {
                    //Verificamos alias, contraseña y creamos la sesión
                    $usuario = new Usuario($_POST['user'], $_POST['password']);
                    if ($usuario->verificar($_POST['user'],$_POST['password'])) {
                        $sesion = new Sesion();
                        $sesion->set('user',($_POST['user']));
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

