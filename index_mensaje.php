<?php include "head.php";
require_once "model/sesion.php";
require_once "model/mensaje.php";
$sesion = new Sesion();
?>
<!--Pagina que muestra los mensajes del tema correspondiente al que se ha pulsado-->
<body>
<div class="wave">
    <div style="height: 150px; overflow: hidden;">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none"
             style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C149.99,150.00 271.49,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
                  style="stroke: none; fill: rgb(255, 255, 255);"></path>
        </svg>
    </div>
</div>
<div class="zonas-centrales">
    <div class="texto">
        <h2>Mensajes</h2>
    </div>
    <div class="tabla">
        <?php
        require_once "model/tema.php";
        $mensaje1 = new mensaje(null, null, null);
        if (isset($_GET["id_tema"])) {
            $id_getTema = $_GET["id_tema"];
        }
        $mensajes = $mensaje1->mostrarMensajes($_GET["id_tema"]);
        $usuario = new usuario(null, null, null);
        //Recorre mediante foreach todos los mensajes del foro y los pinta por pantalla
        if (count($mensajes)) {
            foreach ($mensajes as $mensaje) {
                $id_getTema = $mensaje['id_tema'];
                echo '<form action="" method="post">
                        <div class="tabla-elemento">
                            <div class="elemento-texto">
                                <p name="texto">', $mensaje['texto'], '</p>
                            </div>
                            <div class="elemento"> 
                                <p name="usuario">Creado por: ', $usuario->getAliasById($mensaje['id_usuario']), '</p>
                                <p name="fecha">Fecha:  ', $mensaje['fecha_creacion'], '</p>
                            </div>
                            <div class="elemento"> 
                                <input type="submit" class="boton" name="', $mensaje['id_mensaje'], '" value="Borrar">
                            </div> 
                        </div>
                     </form>';
                //Comprueba que boton de borrar se ha pulsado y elimina el mensaje correspondiente
                if (isset($_POST[$mensaje['id_mensaje']])) {
                    if  (isset($_SESSION['alias'])) {
                        if ($_SESSION['alias'] == $usuario->getAliasById($mensaje['id_usuario'])) {
                            $id_mensaje = $mensaje['id_mensaje'];
                            $mensaje1->eliminarMensaje($id_mensaje);
                            header("Location:index_mensaje.php?id_tema=$id_getTema");
                        } else {
                            echo '<div> No se puede borrar porque ha sido creado por otro usuario </div>';
                        }
                    } else {
                        echo '<div> Debes iniciar sesion para modificar los mensajes </div>';
                    }
                }
            }
        }

        echo '</div>
    <div class="boton-anadir">
        <a class="boton" href="anadir_mensaje.php?id_tema=',$id_getTema,'">Añadir mensaje</a>
    </div>
</div>';
        ?>
</body>
</html>