<?php

include 'templates/include_header.php';

$productos = obtenerProductos($producto_config['producto_a_mostrar'], $conexion);

if (!$productos) {
    header('Location: error.php');
}

include 'views/checkout.view.php';

?>