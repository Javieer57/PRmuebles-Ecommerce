<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="<?php echo RUTA; ?>css/0-herramientas/normalize.css">
    <link rel="stylesheet" href="<?php echo RUTA; ?>css/main.css">

    <title>PR muebles</title>
</head>

<body>

    <header>
        <div class="grid-container header">

            <div class="header_logo">
                <a href="<?php echo RUTA; ?>">
                    <img src="<?php echo RUTA; ?>imagenes/PRmuebles.svg" alt="PRmuebles logo" title="PRmuebles">
                </a>
            </div>

            <div class="header_menu">
                <a class="menu_link" href="<?php echo RUTA; ?>">Inicio</a>

                <a class="menu_link" href="<?php echo RUTA; ?>catalogo.php">Catálogo</a>

                <a class="menu_link" href="<?php echo RUTA; ?>contacto.php">Contacto</a>
            </div>

            <div class="header_botones" style="display: flex; justify-content:right; align-items:center;">
                <form class="menu_desplegable busqueda_desktop" action="">
                    <input type="text" name="" id="busqueda" placeholder="Buscar..." data-search="input_busqueda" style="border:none; padding: 10px 15px;">

                    <div class="desplegable_contenido" id="resultadosBusqueda" data-search="busqueda_resultado" style="max-height: 500px; overflow:auto;">
                    </div>
                    <button class="botones_accion" style="vertical-align: center;"><i data-feather="search"></i></button>
                </form>

                <button id="mostrarCarrito" class="botones_accion" style="cursor: pointer; padding:0;">
                    <i data-feather="shopping-bag"></i>

                    <span class="carrito_contador" id="productosEnCarrito">0</span>
                </button>

                <button id="menu_responsive" class="botones_accion boton_menu">
                    <i data-feather="menu"></i>
                </button>
            </div>
        </div>
        <div class="grid-container busqueda_responsive">
            <form class="menu_desplegable" style="width:100%;" action="">
                <input type="text" name="" id="busqueda" placeholder="Buscar..." data-search="input_busqueda" style="width:100%; border:none; padding: 10px 15px;box-sizing: border-box; margin-bottom:20px;">

                <div class="desplegable_contenido" data-search="busqueda_resultado" id="resultadosBusqueda" style="max-height: 500px; overflow:auto;">
                </div>
            </form>
        </div>
    </header>


    <div class="menu_responsive">

        <div id="contenedor_menu_responsive">

            <a class="contenido_sublink" href="index.php">Inicio</a> 

            <a class="contenido_sublink" href="<?php echo RUTA; ?>catalogo.php">Catálogo</a>

            <a class="contenido_sublink" href="<?php echo RUTA; ?>contacto.php">Contacto</a>

        </div>

        <div class="fondo_oscuro" id="fondo"></div>

    </div>

    <div id="carrito" class="carrito">

        <div class="carrito_cabecera">
            <span class="cabecera_titulo">
                <i class="titulo_icon" data-feather="shopping-bag"></i> Productos
            </span>

            <button class="cabecera_cierre" id="cerrarCarrito">
                <i class="cierre_icon" data-feather="x"></i>
            </button>
        </div>

        <div id="contenedorProductosCarrito" class="carrito_productos" data-name="carrito">
        </div>

        <div class="a_pagar">
        </div>

    </div>

    <div class="fondo_oscuro_carrito" id="carrito_fondo"></div>