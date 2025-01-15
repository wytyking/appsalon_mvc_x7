<h1 class="nombre-pagina">Recuperar Password</h1>
<p class="descripcion-pagina">Introduce tu nuevo password</p>

<?php 

    include_once __DIR__ . "/../templates/alertas.php";

?>
<?php if($error) return; ?>
<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Paswword</label>
        <input type="password" 
               id="password"
               name="password"
               placeholder="Nuevo Password">

    </div>

    <input type="submit" class="boton" value="Guardar Password">
    
</form>

<div class="acciones">
    <a href="/public/">¿Ya tienes cuenta? Iniciar Sesión</a>
    <a href="/public/crear-cuenta">Crear Cuenta</a>
</div>