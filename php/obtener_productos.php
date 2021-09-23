<?php

include '../admin/config.php';
include '../admin/functions.php';


$conexion = conexion();

if (!$conexion) {
    header('Location: ../error.php');
}

$sentencia = $conexion->prepare("SELECT * FROM productos");
$sentencia->execute();
$productos_bd = $sentencia->fetchAll();

$json_sin_formato = [];

foreach ($productos_bd as $indice => $producto) {
    
    $resultado_json = [
        'ID' => $producto['ID'],
        'NOMBRE' => $producto['Nombre'],
        'PRECIO' => $producto['Precio'],
        'DESCRIPCION' => $producto['Descripcion'],
        'IMAGEN' => $producto['Imagen'],
        'MARCA' => $producto['Marca']
    ];

    array_push($json_sin_formato, $resultado_json);
}

$json_formateado = json_encode($json_sin_formato);

echo $json_formateado;

?>