<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicio Sesión</p>

<?php 

    include_once __DIR__ . "/../templates/alertas.php";

?>

<form class="formulario" method="POST" action="/public/">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Tu Email" name="email" >
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Tu Password" name="password">
    </div>

    <input type="submit" class="boton" value="Iniciar Sesión">

</form>

<div class="acciones">
    <a href="/public/crear-cuenta">Crear Cuenta</a>
    <a href="/public/olvide">¿Olvidaste tu password?</a>
</div>