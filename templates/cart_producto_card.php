<div class="producto_carrito">

    <div class="producto_img">

        <a href="<?php echo RUTA; ?>detalles.php?id=<?php echo $producto_carrito['ID']; ?>">
            <img 
            src="<?php echo RUTA . "imagenes/productos/" . $producto_carrito['IMAGEN']; ?>" 
            alt="<?php echo $producto_carrito['NOMBRE']; ?>" 
            title="<?php echo $producto_carrito['NOMBRE']; ?>">
        </a>

    </div>

    <div class="producto_detalles">

        <a href="<?php echo RUTA; ?>detalles.php?id=<?php echo $producto_carrito['ID']; ?>" class="detalles_titulo">
            <?php echo $producto_carrito['NOMBRE']; ?>
        </a>

        <span class="detalles_precio">
            $<?php echo number_format($producto_carrito['PRECIO'], 2); ?>
        </span>

        <span class="detalles_cantidad">Unidades: 1</span>

    </div>

    <form action="" method="post">
        <input 
        class="form_input" 
        type="hidden" 
        name="id" 
        value="<?php echo openssl_encrypt($producto_carrito['ID'], COD, KEY); ?>">

        <button 
        class="producto_borrar" 
        name="btnAccion" 
        value="Eliminar"
        type="button" data-name2="<?php echo $producto_carrito['NOMBRE']?>">
            <i class="borrar_icon" data-feather="trash"></i>
        </button>
    </form>
</div>