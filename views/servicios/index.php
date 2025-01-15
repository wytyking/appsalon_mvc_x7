<h1 class="nombre-pagina">Servicios</h1>
<p class="descripcion-pagina">Administración de Servicios</p>

<?php
include_once __DIR__ . '/../templates/barra.php';
?>

<ul class="servicios">
    <?php foreach($servicios as $servicio): ?>
        <li>
            <p>Nombre: <span><?php echo $servicio->nombre; ?></span></p>
            <p>Precio: <span><?php echo $servicio->precio; ?>€</span></p>
            
            <div class="acciones">
            <a href="/public/servicios/actualizar?id=<?php echo $servicio->id; ?>" class="boton">Actualizar</a>
           
            <form  action="/public/servicios/eliminar" method="POST">
                <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
                <input type="submit" value="Eliminar" class="boton-borrar">
            </form>
            </div>   
    
        </li>
    <?php endforeach; ?>  

</ul>
  <!-- Botón para volver al panel de administración -->
<div class="barra">
    <a class="boton" href="/public/admin">Volver al Panel de Administración</a>
</div>