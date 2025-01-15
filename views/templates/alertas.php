<?php
// Ojo el foreach termina con dos : y no punto y coma ;
foreach($alertas as $key => $mensajes):
    foreach($mensajes as $mensaje):
?>

<div class="alerta <?php echo $key; ?>">
    <?php echo $mensaje; ?>

</div>

<?php
endforeach;
endforeach;

?>