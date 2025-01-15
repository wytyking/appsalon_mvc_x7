<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Rellena el formulario</p>

<?php 

    include_once __DIR__ . "/../templates/alertas.php";

?>

<form class="formulario" method="POST" action="/public/crear-cuenta">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo s($usuario->nombre); ?>" >
        
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo s($usuario->apellido); ?>">
    </div>

    <div class="campo">
        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo s($usuario->telefono); ?>">
    </div>

    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo s($usuario->email); ?>" >
    </div>

    <div class="campo">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Password" >
    </div>

    <input type="submit" value="Crear Cuenta" class="boton" >


    <div class="acciones">
            <a href="/public/">Página Inicio</a>
            <a href="/public/olvide">¿Olvidaste tu password?</a>
    </div>
   
</form>