<?php include "head.php";
require_once "model/sesion.php";
$sesion = new Sesion();
?>
<!--Pagina de inicio en la que se muestra el listado de temas el foto-->
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
        <h2>Temas</h2>
    </div>
    <div class="tabla">
        <?php
        require_once "model/tema.php";
        $tema1 = new tema(null, null);
        $mensajes = $tema1->mostrarTemas();
        $usuario = new usuario(null, null, null);
        //Recorre mediante foreach todos los temas del foro y los pinta por pantalla
        if (count($mensajes)) {
            foreach ($mensajes as $tema) {
                $id_tema = $tema['id_tema'];
                echo '<form action="" method="post">
                        <div class="tabla-elemento">
                            <div class="elemento"> 
                                <a class="titulo-tema" href="index_mensaje.php?id_tema=',$id_tema,'" >', $tema['titulo'], '</a>
                                <p name="usuario">Creado por: ', $usuario->getAliasById($tema['id_usuario']), '</p>
                                <p name="fecha">Fecha:  ', $tema['fecha_creacion'], '</p>
                            </div>
                            <div class="elemento"> 
                                <input type="submit" class="boton" name="',$tema['id_tema'],'" value="Borrar">
                            </div> 
                        </div>
                     </form>';
                //Comprueba que boton de borrar se ha pulsado y elimina el tema correspondiente
                if (isset($_POST[$tema['id_tema']])) {
                    if  (isset($_SESSION['alias'])) {
                        if ($_SESSION['alias'] == $usuario->getAliasById($tema['id_usuario'])) {
                            $id_tema = $tema['id_tema'];
                            $tema1->eliminarTema($id_tema);
                            header("Location:index.php");
                        } else {
                            echo '<div> No se puede borrar porque ha sido creado por otro usuario </div>';
                        }
                    }else{
                        echo '<div> Debes iniciar sesion para modificar los temas </div>';
                    }
                }
            }
        }
        ?>
    </div>
    <div class="boton-anadir">
        <a class="boton" href="anadir_tema.php">Añadir tema</a>
    </div>

</div>
</body>
</html>