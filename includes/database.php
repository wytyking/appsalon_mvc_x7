<?php

$db = mysqli_connect('localhost', 'root', 'alberto', 'appsalon_mvc');
    // $_ENV['BD_HOST'],
    // $_ENV['BD_USER'],
    // $_ENV['BD_PASS'],
    // $_ENV['BD_NAME']
   

   $db->set_charset('utf8');

if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
