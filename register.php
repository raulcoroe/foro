
<?php include "head.php"; ?>
<body>
<div id="contenedor">
    <header>
        <h1>Registro de usuario</h1>
    </header>
    <form action="" method="post">
        <div id="formulario">
            <form action="" method="post">
                <input type="text" name="user" placeholder="Alias"/><br/>
                <input type="password" name="password" placeholder="Contraseña"/><br/>
                <input type="text" name="email" placeholder="Email"/><br/>
                <input type='submit' name='submit' value='Registrarse'>

                <?php
                require_once ('usuario.php');
                if (isset($_POST['submit'])) {
                    //Creamos un objeto de la clase Password y almacenamos el valor de la contraseña encriptada en la variable $pw
                    /*Creamos un nuevo usuario que, en el caso de cumplir con las comprobaciones, ejecutará el método nuevo()
                    para escribir sus datos en la base de datos y redirigirá a la página principal*/
                    $usuario = new Usuario($_POST['user'],$_POST['email']);
                    $pw = $usuario -> encriptar($_POST['password']);
                    if ($usuario->comprobaciones() !== false) {
                        $usuario->nuevo();
                        header("Location:index.php");
                    }
                }
                ?>

            </form>
            <p id="link"><a href="index.php">Inicio</a></p>
        </div>
</div>
</body>
</html>

