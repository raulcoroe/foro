<?php
include "head.php";
require_once "model/sesion.php";
require_once "model/usuario.php";
require_once "model/tema.php";
$sesion = new Sesion();
?>
<form class="formulario" action="", method="post">
    <div class="form">
    <input type="text" name="titulo" placeholder="Titulo" class="form-input">
    <input type="submit" name="submit" value="Añadir tema" class="form-boton">
    </div>
    <?php

    if (isset($_SESSION['alias'])) {                                //Comprueba que la sesion este iniciada
        if (isset($_POST['submit']) && isset($_POST['titulo'])) {   ////Comprueba que el hay texto en el titulo y que se ha pulsado el boton de submit
            $usuario = new usuario(null, null, null);
            $id_usuario = $usuario->getId($_SESSION['alias']);
            $tema = new tema($id_usuario, $_POST['titulo']);
            $tema->crearTema();
            header("Location:index.php");
        } else {
            echo "<div>Debes ponerle un titulo al tema</div>";
        }
    } else {
        echo "<div>Debes iniciar sesión para poder continuar</div>";
    }
    ?>
</form>

</body>
</html>
