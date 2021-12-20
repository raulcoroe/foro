<?php
include "head.php";
require_once "model/sesion.php";
require_once "model/usuario.php";
require_once "model/mensaje.php";
$sesion = new Sesion();
?>

<!--Formulario para anadir los mensajes-->
<form class="formulario" action="", method="post">
    <div class="form">
        <textarea name="texto" class="form-input-area" placeholder="Introduce el comentario"></textarea>
        <input type="submit" name="submit" value="Añadir mensaje" class="form-boton">
    </div>
    <?php
    $id_tema = $_GET["id_tema"];
    if (isset($_SESSION['alias'])) {                                //Comprueba que la sesion este iniciada
        if (isset($_POST['submit']) && isset($_POST['texto'])) {    //Comprueba que el hay texto en el txtarea y que se ha pulsado el boton de submit
            $usuario = new usuario(null, null, null);
            $id_usuario = $usuario->getId($_SESSION['alias']);
            $mensaje = new mensaje($id_usuario, $_GET["id_tema"] , $_POST['texto']);
            $mensaje->crearMensaje();
            header("Location:index_mensaje.php?id_tema=$id_tema");
        } else {
            echo "<p>Debes introducir texto</p>";
        }
    } else {
        echo "<p>Debes iniciar sesión para poder continuar</p>";
    }
    ?>
</form>
</body>
</html>