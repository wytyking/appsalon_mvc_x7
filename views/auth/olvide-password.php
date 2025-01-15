<h1 class="nombre-pagina">Olvide Password</h1>
<p class="descripcion-pagina">Restablecer Contraseña</p>

<?php 

    include_once __DIR__ . "/../templates/alertas.php";

?>

<form class="formulario" action="/public/olvide" method="POST">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id=""email name="email" placeholder="Email">
    </div>

    <input type="submit" class="boton" value="Enviar">
</form>

<div class="acciones">
    <a href="/public/crear-cuenta">Crear Cuenta</a>
    <a href="/public/">Inicio</a>
</div>