<div class="barra">
    <p>Usuario: <?php echo $nombre ?? ''; ?></p>
    <a class="boton" href="/public/logout">Cerrar Sesión</a>

</div>
<?php 
    if(isset($_SESSION['admin'])) { ?>
    <div class="barra-servicios">
        <a class="boton" href="/public/admin">Ver Citas</a>
        <a class="boton" href="/public/servicios">Ver Servicios</a>
        <a class="boton" href="/public/servicios/crear">Crear Servicios</a>
    </div>
        
    <?php } 
?>