<h1 class="nombre-pagina">Actualizar Servicios</h1>
<p class="descripcion-pagina">Actualización de los Servicios</p>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Servicio</title>
    <link rel="stylesheet" href="/public/build/css/app.css"> <!-- Asegúrate de que esta ruta sea correcta -->
</head>
 
<?php
include_once __DIR__ . '/../templates/barra.php';
?>
 <!-- Formulario para crear el servicio -->
<form  method="POST" class="formulario">
        <?php include_once __DIR__ . '/formulario.php'; ?>
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<input type="submit" class="boton" value="Actualizar Servicio">
    
</form>