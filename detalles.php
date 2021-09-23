<?php

include 'templates/include_header.php';

$id_producto = idProductos($_GET['id']);

if (empty($id_producto)) {
    header('Location: index.php');
}

$producto = obtenerProductosPorID($conexion, $id_producto);

if (!$producto) {
    header('Location: index.php');
}

$producto = $producto[0];

$productos = obtenerProductos($producto_config['producto_a_mostrar'], $conexion);

include 'views/detalles.view.php';

?>