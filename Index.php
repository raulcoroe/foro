<?php include "head.php";?>
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
    <div class="contenedor-temas">
        <table class="default">
            <tr>
                <th>Temas</th>
                <th>Numero de mensajes</th>
                <th>Borrar</th>
            </tr>
            <tr>
                <td>Soleado</td>
                <td>Mayormente soleado</td>
                <td>Parcialmente nublado</td>
            </tr>
            <tr>
                <td>19°C</td>
                <td>17°C</td>
                <td>12°C</td>
            </tr>
            <tr>
                <td>E 13 km/h</td>
                <td>E 11 km/h</td>
                <td>S 16 km/h</td>
            </tr>
        </table>
    </div>
</div>
<div class="call-to-action">
    <div class="tabla-call">
        <h2>PIDE TU CITA PRESENCIAL</h2>
        <i class="fas fa-clipboard-list"></i>
        <p>No te quedes sin la oportunidad de conocer nuestros servicios</p>
        <a href="" class="boton">PEDIR</a>
    </div>
    <div class="tabla-call">
        <h2>VISITA NUESTRA TIENDA ONLINE</h2>
        <i class="fas fa-shopping-cart"></i>
        <p>Elige entre la gran variedad de nuestros productos sin salir de casa</p>
        <a href="" class="boton">VISITAR</a>
    </div>
</div>
<div class="zonas-centrales">
    <div class="texto">
        <h2>Conoce nuestros productos</h2>
    </div>
    <div class="contenedor-temas">
        <div class="fotos">
            <img src="/img/optica4.PNG">
            <p>LENTES OFTÁLMICAS</p>
        </div>
        <div class="fotos">
            <img src="/img/optica5.PNG">
            <p>MONTURAS</p>
        </div>
        <div class="fotos">
            <img src="/img/optica8.PNG">
            <p>LENTES DE CONTACTO</p>
        </div>
        <div class="fotos">
            <img src="/img/optica6.PNG">
            <p>SERVICIOS ÓPTICOS</p>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/aa66df94b8.js" crossorigin="anonymous"></script>
<div class="contactar">
    <div class="texto">
        <h2>Contacta con nosotros</h2>
    </div>
    <form class="formulario">
        <div class="form">

            <input type="text" name="nombre" placeholder="Nombre" class="form-input">
            <input type="text" name="apellidos" placeholder="Apellidos" class="form-input">
            <input type="text" name="email" placeholder="Email" class="form-input">
            <input type="text" name="telefono" placeholder="Telefono" class="form-input">
        </div>
        <div class="form">
            <input type="text" name="edad" placeholder="Edad" class="form-input">
            <select name="genero" placeholder="Género" class="form-seleccion">
                <option value="">Genero</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
            <select name="provincia" class="form-seleccion">
                <option value="">Elige Provincia</option>
                <option value="Álava/Araba">Álava/Araba</option>
                <option value="Albacete">Albacete</option>
                <option value="Alicante">Alicante</option>
                <option value="Almería">Almería</option>
                <option value="Asturias">Asturias</option>
                <option value="Ávila">Ávila</option>
                <option value="Badajoz">Badajoz</option>
                <option value="Baleares">Baleares</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Burgos">Burgos</option>
                <option value="Cáceres">Cáceres</option>
                <option value="Cádiz">Cádiz</option>
                <option value="Cantabria">Cantabria</option>
                <option value="Castellón">Castellón</option>
                <option value="Ceuta">Ceuta</option>
                <option value="Ciudad Real">Ciudad Real</option>
                <option value="Córdoba">Córdoba</option>
                <option value="Cuenca">Cuenca</option>
                <option value="Gerona/Girona">Gerona/Girona</option>
                <option value="Granada">Granada</option>
                <option value="Guadalajara">Guadalajara</option>
                <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                <option value="Huelva">Huelva</option>
                <option value="Huesca">Huesca</option>
                <option value="Jaén">Jaén</option>
                <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Las Palmas">Las Palmas</option>
                <option value="León">León</option>
                <option value="Lérida/Lleida">Lérida/Lleida</option>
                <option value="Lugo">Lugo</option>
                <option value="Madrid">Madrid</option>
                <option value="Málaga">Málaga</option>
                <option value="Melilla">Melilla</option>
                <option value="Murcia">Murcia</option>
                <option value="Navarra">Navarra</option>
                <option value="Orense/Ourense">Orense/Ourense</option>
                <option value="Palencia">Palencia</option>
                <option value="Pontevedra">Pontevedra</option>
                <option value="Salamanca">Salamanca</option>
                <option value="Segovia">Segovia</option>
                <option value="Sevilla">Sevilla</option>
                <option value="Soria">Soria</option>
                <option value="Tarragona">Tarragona</option>
                <option value="Tenerife">Tenerife</option>
                <option value="Teruel">Teruel</option>
                <option value="Toledo">Toledo</option>
                <option value="Valencia">Valencia</option>
                <option value="Valladolid">Valladolid</option>
                <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                <option value="Zamora">Zamora</option>
                <option value="Zaragoza">Zaragoza</option>
            </select>
            <input type="text" name="codigopostal" placeholder="Código postal" class="form-input">

        </div>
        <textarea name="Comentario" rows="10" cols="40" placeholder="Escribe un comentario..."
                  class="form-comentario"></textarea>
        <div class="checkbox">
            <input type="checkbox" name="LOPD" value="Si-LOPD">Acepto la ley orgánica de
            protección de datos
        </div>
        <div class="botones">
            <input type="submit" name="enviar" value="Enviar formulario" class="form-boton">
            <input type="reset" name="borrar" value="Borrar todo" class="form-boton">
        </div>
    </form>
</div>
<div class="pie-pagina">
    <div class="texto-pie">
        <h3>Siguenos</h3>
    </div>
    <div class="redes-sociales">
        <i class="fab fa-instagram"></i>
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-whatsapp"></i>
        <i class="fab fa-youtube"></i>
    </div>
    <div class="datos-contacto">
        <p>976000000</p>
        <p>nuevavision@gmail.com</p>
        <p>C/Inventada, Nº1. C.P: 50000</p>
    </div>

</div>
</body>
</html>