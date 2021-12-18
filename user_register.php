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
                    <input type="text" name="email" placeholder="Email" class="form-input"><br/>
                    <input type='submit' name='submit' value='Registrarse' class="form-boton">
                </div>
                <?php
                require_once('usuario.php');
                if (isset($_POST['submit'])) {
                    //Creamos un objeto de la clase Password y almacenamos el valor de la contraseña encriptada en la variable $pw
                    /*Creamos un nuevo usuario que, en el caso de cumplir con las comprobaciones, ejecutará el método nuevo()
                    para escribir sus datos en la base de datos y redirigirá a la página principal*/
                    $usuario = new Usuario($_POST['user'], $_POST['password'], $_POST['email']);
                    if ($usuario->comprobaciones() !== false) {
                        $usuario->nuevo();
                        header("Location:index.php");
                    }
                }
                ?>

            </form>
        </div>
</div>
</body>
</html>

