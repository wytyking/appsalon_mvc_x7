<h1 class="nombre-pagina">Nuevo Servicio</h1>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Servicio</title>
    <link rel="stylesheet" href="/public/build/css/app.css"> <!-- Asegúrate de que esta ruta sea correcta -->
</head>
<body>
    
    <p class="descripcion-pagina">Llena todos los campos para añadir un nuevo servicio</p>

    <div class="barra">
        <p>Usuario: <?php echo $nombre ?? ''; ?></p>
        <a class="boton" href="/public/logout">Cerrar Sesión</a>
    </div>

    <!-- Formulario para crear el servicio -->
    <form action="/public/servicios/crear" method="POST" class="formulario">
        <?php include_once __DIR__ . '/formulario.php'; ?>
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <input type="submit" class="boton" value="Guardar Servicio">
    
<!-- </form>
    <div id="app">
        <nav class="tabs">
            <button class="actual" type="button" data-paso="1">Información Servicio</button>
            <button type="button" data-paso="2">Confirmación</button>
        </nav> -->

        <!-- <div id="paso-1" class="seccion">
            <h2>Información Servicio</h2>
            <p class="text-center">Llena la información del servicio</p> -->
           
                <!-- Campos del formulario -->
                <!-- <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre del Servicio">
                </div>
                <div class="campo">
                    <label for="precio">Precio</label>
                    <input type="number" id="precio" name="precio" placeholder="Precio del Servicio">
                </div>
                <input type="submit" class="boton" value="Guardar Servicio">
            
        </div> -->

        <!-- <div id="paso-2" class="seccion">
            <h2>Confirmación</h2>
            <p class="text-center">Revisa y confirma la información del servicio</p>
         
        </div> -->
        <!-- Botón para volver al panel de administración -->
        <div class="barra">
            <a class="boton" href="/public/admin">Volver al Panel de Administración</a>
        </div>
    </div>
</body>
</html>
