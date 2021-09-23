<div class="producto">

    <div class="producto_imagen">


        <form method="post" id="">

            <input class="form_input" type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">

            <input class="form_input" type="hidden" name="nombre" value="<?php echo openssl_encrypt($producto['Nombre'], COD, KEY); ?>">

            <input class="form_input" type="hidden" name="precio" value="<?php echo openssl_encrypt($producto['Precio'], COD, KEY); ?>">

            <input class="form_input" type="hidden" name="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">

            <input class="form_input" type="hidden" name="imagen" value="<?php echo openssl_encrypt($producto['Imagen'], COD, KEY); ?>">

            <button class="boton_agregar" name="btnAccion" value="Agregar" type="button" data-name="<?php echo $producto['Nombre']; ?>">
                <i class="boton_icon agregar" data-feather="shopping-bag"></i>
            </button>

        </form>

        <a href="<?php echo RUTA; ?>detalles.php?id=<?php echo $producto['ID']; ?>">
            <img src="<?php echo RUTA . "imagenes/productos/" . $producto['Imagen']; ?>" alt="<?php echo $producto['Nombre']; ?>" title="<?php echo $producto['Nombre']; ?>">
        </a>
    </div>

    <a href="<?php echo RUTA; ?>detalles.php?id=<?php echo $producto['ID']; ?>" class="producto_nombre">
        <?php echo $producto['Nombre']; ?>
    </a>

    <span class="producto_precio">
        $<?php echo $producto['Precio']; ?>
    </span>

</div>