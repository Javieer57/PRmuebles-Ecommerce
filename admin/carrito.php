<?php

include 'config.php';
include 'functions.php';

session_start();

if (isset($_POST['btnAccion'])){
    switch ($_POST['btnAccion']) {
        case 'Checkout':

            header('Location: checkout.php');
                
        break;

        case 'AgregarAhora':
            if (is_numeric( openssl_decrypt($_POST['id'], COD, KEY) ) &&
                openssl_decrypt($_POST['nombre'], COD, KEY) &&
                openssl_decrypt($_POST['imagen'], COD, KEY) && 
                is_numeric( openssl_decrypt($_POST['precio'], COD, KEY) ) &&
                is_numeric( openssl_decrypt($_POST['cantidad'], COD, KEY) ) ) {
                
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
                $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
                $IMAGEN = openssl_decrypt($_POST['imagen'], COD, KEY);
                
            } else {
                $mensaje = "Datos incorrectos";
                echo "<script>alert('" . $mensaje . "');</script>";
            }

            if (!isset($_SESSION['CARRITO'])) {
                $producto_carrito = [
                    'ID' => openssl_encrypt($ID, COD, KEY),
                    'IDenlace' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'PRECIO' => $PRECIO,
                    'CANTIDAD' => $CANTIDAD,
                    'IMAGEN' => $IMAGEN
                ];

                $_SESSION['CARRITO'][0] = $producto_carrito;
            } else {
                $producto_carrito = array(
                    'ID' => openssl_encrypt($ID, COD, KEY),
                    'IDenlace' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'PRECIO' => $PRECIO,
                    'CANTIDAD' => $CANTIDAD,
                    'IMAGEN' => $IMAGEN
                );
                array_push($_SESSION['CARRITO'], $producto_carrito);
            }
            
            if (!isset($_SESSION['CARRITO'])) {

                $producto_carrito = array(
                    'ID' => openssl_encrypt($ID, COD, KEY),
                    'IDenlace' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'PRECIO' => $PRECIO,
                    'CANTIDAD' => $CANTIDAD,
                    'IMAGEN' => $IMAGEN
                );

                $_SESSION['CARRITO'][0] = $producto_carrito;

            } else {
                
                $producto_carrito = array(
                    'ID' => openssl_encrypt($ID, COD, KEY),
                    'IDenlace' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'PRECIO' => $PRECIO,
                    'CANTIDAD' => $CANTIDAD,
                    'IMAGEN' => $IMAGEN
                );
                
                array_push($_SESSION['CARRITO'], $producto_carrito);
            }

            header('Location: checkout.php');
        break;

        case 'Agregar':
            if (is_numeric( openssl_decrypt($_POST['id'], COD, KEY) ) &&
                openssl_decrypt($_POST['nombre'], COD, KEY) &&
                openssl_decrypt($_POST['imagen'], COD, KEY) && 
                is_numeric(openssl_decrypt($_POST['precio'], COD, KEY)) &&
                is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY)) ){

                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
                $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
                $IMAGEN = openssl_decrypt($_POST['imagen'], COD, KEY);
            } else {
                $mensaje = "Datos incorrectos";
                echo "<script>alert('" . $mensaje . "');</script>";
            }

            if (!isset($_SESSION['CARRITO'])) {
                $producto_carrito = [
                    'ID' => openssl_encrypt($ID, COD, KEY),
                    'IDenlace' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'PRECIO' => $PRECIO,
                    'CANTIDAD' => $CANTIDAD,
                    'IMAGEN' => $IMAGEN
                ];

                $_SESSION['CARRITO'][0] = $producto_carrito;
            } else {
                $producto_carrito = array(
                    'ID' => openssl_encrypt($ID, COD, KEY),
                    'IDenlace' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'PRECIO' => $PRECIO,
                    'CANTIDAD' => $CANTIDAD,
                    'IMAGEN' => $IMAGEN
                );
                array_push($_SESSION['CARRITO'], $producto_carrito);
            }

            $json_previo = [];

            foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                array_push($json_previo, $producto);
            }
            
            $json = json_encode($json_previo);

            echo $json;
        break;

        case 'Eliminar':
            
            if (is_numeric( openssl_decrypt($_POST['id'], COD, KEY) )) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);

                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if ($producto['IDenlace'] == $ID) {
                        unset($_SESSION['CARRITO'][$indice]);
                    }
                }

                $json_previo = [];

                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    array_push($json_previo, $producto);
                }

                $json = json_encode($json_previo);
                
            } else {
                $mensaje = "Datos incorrectos";
                echo "<script>alert('" . $mensaje . "');</script>";
            }

            echo $json;
        break;

        case 'Pagar':
            if (isset($_POST['campo_nombre']) && 
                isset($_POST['campo_apellidos']) &&
                isset($_POST['campo_calle']) && 
                isset($_POST['campo_ciudad']) && 
                isset($_POST['campo_estado']) && 
                is_numeric($_POST['campo_postal']) && 
                isset($_POST['email']) && 
                is_numeric($_POST['campo_telefono']) && 
                isset($_POST['tarjeta_nombre']) && 
                is_numeric($_POST['tarjeta_numero']) && 
                is_numeric($_POST['tarjeta_vencimiento']) && 
                is_numeric($_POST['tarjeta_vencimientoY']) && 
                is_numeric($_POST['tarjeta_codigo'])) {

                    array_pop($_POST);
                    $SID = session_id();
        
                    $subtotal = 0;
                    $impuestos = 0;
                    $total = 0;
        
                    foreach ($_SESSION['CARRITO'] as $indice => $producto_carrito) {
                        $subtotal += $producto_carrito['PRECIO'];
                        $impuestos = $subtotal * .10;
                        $total = $subtotal + $impuestos;
                    }
        
                    $datos = array(
                        'nombre' => filter_var($_POST['campo_nombre'], FILTER_SANITIZE_STRING),
                        'apellidos' => filter_var($_POST['campo_apellidos'], FILTER_SANITIZE_STRING),
                        'calle' => filter_var($_POST['campo_calle'], FILTER_SANITIZE_STRING),
                        'ciudad' => filter_var($_POST['campo_ciudad'], FILTER_SANITIZE_STRING),
            
                        'estado' => filter_var($_POST['campo_estado'], FILTER_SANITIZE_STRING),
                        'codigo_postal' => filter_var($_POST['campo_postal'], FILTER_SANITIZE_STRING),
                        'correo' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
                        'campo_telefono' => filter_var($_POST['campo_telefono'], FILTER_SANITIZE_STRING),
        
                        'subtotal' => filter_var($subtotal, FILTER_SANITIZE_STRING),
                        'impuestos' => filter_var($impuestos, FILTER_SANITIZE_STRING),
                        'total' => filter_var($total, FILTER_SANITIZE_STRING)
                    );
                
                    $json = json_encode($datos);
        
                    session_unset();
                    
                    echo $json;
            } else {
                $datos = array(
                    'nombre' => "Prueba",
                    'apellidos' => "Prueba",
                    'calle' => "Prueba",
                    'ciudad' => "Prueba",
        
                    'estado' => "Prueba",
                    'codigo_postal' => "Prueba",
                    'correo' => "Prueba",
                    'campo_telefono' => "Prueba",
    
                    'subtotal' => 0,
                    'impuestos' => 0,
                    'total' => 0
                );

                $json = json_encode($datos);

                session_unset();

                echo $json;
            }
        break;
    }
} else {
    $json_previo = [];

    if (isset($_SESSION['CARRITO'])) {
        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
            array_push($json_previo, $producto);
        }
        $json = json_encode($json_previo);
        echo $json;
    } else {
        echo 0;
    }
}

?>