<?php

function conexion(){
    try {
        $conexion = new PDO('mysql:host='. SERVIDOR .';dbname='. BASEDATOS, USUARIO, PASSWORD);	
        return $conexion; 
    } catch (PDOException $e) {
        echo "<script>alert('error de conexión');</script>";
        return false;		
    }
}

function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function obtenerProductos($producto_a_mostrar, $conexion){
    $sentencia = $conexion->prepare("SELECT * FROM productos LIMIT $producto_a_mostrar");
    $sentencia->execute();

    return $sentencia->fetchAll();
}


function productosPorCategoria($marca, $conexion){
    
    $sentencia = $conexion->query("SELECT * FROM productos WHERE Marca = '" . $marca. "'");
    $sentencia->execute();

    return count($sentencia->fetchAll());
}

function totalProductosFiltrados($marcas, $conexion){
    $total_productos = 0;

    foreach ($marcas as $indice => $marca) {
        $total_productos += productosPorCategoria($marca[0], $conexion);
    }

    return $total_productos;
}

function obtenerMarcas($conexion){

    $sentencia = $conexion->prepare("SELECT DISTINCT Marca FROM productos");
    $sentencia->execute();

    return $sentencia->fetchAll();
}

function idProductos($id){
    return (int)limpiarDatos($id);
}

function marcaProductos($marca){
    return limpiarDatos($marca);
}

function obtenerProductosPorID($conexion, $id){
    $resultado = $conexion->query("SELECT * FROM productos WHERE ID = $id LIMIT 1");
    $resultado = $resultado->fetchAll();
    return ($resultado) ? $resultado : false;
}

function obtenerProductosPorMARCA($conexion, $marca){
    $resultado = $conexion->query("SELECT * FROM productos WHERE Marca = '" . $marca . "'");
    $resultado = $resultado->fetchAll();
    return ($resultado) ? $resultado : false;
}


function buscarProductoEnCarrito($id, $carrito){
    $existencia = false;

    foreach ($carrito as $indice => $producto) {
        if ($producto['IDenlace'] == $id) {
            $existencia = true;
        }
    }
    
    return $existencia;
}



?>