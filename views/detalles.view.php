<?php

include 'templates/header.php';

?>

<main>
    <section class="grid-container detalles">

        <div class="detalles_img">
            <img src="<?php echo RUTA . "imagenes/productos/" . $producto['Imagen']; ?>" alt="<?php echo $producto['Nombre']; ?>" title="<?php echo $producto['Nombre']; ?>">
        </div>

        <div class="detalles_info">

            <div class="info_header">
                <h2 class="header_titulo"><?php echo $producto["Nombre"]; ?></h2>
                <p class="header_marca">Marca <span class="marca"><?php echo $producto["Marca"]; ?></span></p>
                <span class="header_precio">$<?php echo $producto["Precio"]; ?></span>
            </div>

            <p class="info_texto">
                <?php echo $producto["Descripcion"]; ?>
            </p>

            <form class="grid-container info_botones" action="" method="post">
                <input class="form_input" type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">

                <input class="form_input" type="hidden" name="nombre" value="<?php echo openssl_encrypt($producto['Nombre'], COD, KEY); ?>">

                <input class="form_input" type="hidden" name="precio" value="<?php echo openssl_encrypt($producto['Precio'], COD, KEY); ?>">

                <input class="form_input" type="hidden" name="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">

                <input class="form_input" type="hidden" name="imagen" value="<?php echo openssl_encrypt($producto['Imagen'], COD, KEY); ?>">


                <button id="checkoutQuitarAgregar" data-cart-id="<?php echo $producto['ID']; ?>" class="btn botones_agregar" name="btnAccion" type="button" data-name3="<?php echo $producto['Nombre']; ?>" style="width:100%;"></button>                

            </form>
        </div>

    </section>


    <section class="grid-container productos">

        <h2 class="seccion_titulo">Recomendados para ti</h2>

        <?php foreach ($productos as $producto) { ?>

            <?php include 'templates/producto_card.php' ?>

        <?php } ?>
    </section>
</main>

<?php

include 'templates/footer.php';

?>