<?php

include '../admin/config.php';
include '../admin/functions.php';

$conexion = conexion();
$busqueda = filter_var($_POST['busqueda'], FILTER_SANITIZE_STRING);

if (!$conexion || empty($busqueda)) {
    header('Location: ../error.php');
}

if (!empty($busqueda)) {

    $sentencia = $conexion->prepare("SELECT * FROM productos WHERE Nombre LIKE '%$busqueda%' ");
    $sentencia->execute();
    
    $resultados_busqueda = $sentencia->fetchAll();

    $json_sin_formato = [];

    foreach ($resultados_busqueda as $indice => $resultado) {

        $resultado_json = [
            'ID' => $resultado['ID'],
            'Nombre' => $resultado['Nombre'],
            'Precio' => $resultado['Precio'],
            'Descripcion' => $resultado['Descripcion'],
            'Imagen' => $resultado['Imagen'],
            'Marca' => $resultado['Marca']
        ];

        array_push($json_sin_formato, $resultado_json);
    }

    $json_formateado = json_encode($json_sin_formato);

    echo $json_formateado;    
}
?>