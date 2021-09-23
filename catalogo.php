<?php

include 'templates/include_header.php';

$marcas = obtenerMarcas($conexion);

$productos_BD = totalProductosFiltrados($marcas, $conexion);

$productos = obtenerProductos($productos_BD, $conexion);

if (!$productos) {
    header('Location: error.php');
}



include 'views/catalogo.view.php';

?>