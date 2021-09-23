<?php

include 'templates/header.php';

?>

<main>

    <section class="grid-container anuncios">
        <div class="slider">
            <a href="<?php echo RUTA; ?>catalogo.php">
                <picture>
                    <source media="(min-width: 900px)" srcset="<?php echo RUTA; ?>imagenes/banner1.png" alt="descuento en sillas" title="descuento en sillas">
                    <source media="(min-width: 600px)" srcset="<?php echo RUTA; ?>imagenes/banner2.png" alt="descuento en sillas" title="descuento en sillas">
                    <img src="<?php echo RUTA; ?>imagenes/banner3.png" alt="descuento en sillas" title="descuento en sillas">
                </picture>
            </a>
        </div>

        <div class="promocion">
            <a href="<?php echo RUTA; ?>catalogo.php">
                <img src="<?php echo RUTA; ?>imagenes/minibanner1.png" alt="cafeteras" title="cafeteras">
            </a>
        </div>

        <div class="promocion">
            <a href="<?php echo RUTA; ?>catalogo.php">
                <img src="<?php echo RUTA; ?>imagenes/minibanner2.png" alt="sillones" title="sillones">
            </a>
        </div>

        <div class="promocion">
            <a href="<?php echo RUTA; ?>catalogo.php">
                <img src="<?php echo RUTA; ?>imagenes/minibanner3.png" alt="muebles" title="muebles">
            </a>
        </div>
    </section>


    <section class="grid-container productos">

        <h2 class="seccion_titulo">Los más nuevos</h2>

        <?php foreach ($productos as $producto) { ?>

            <?php include 'templates/producto_card.php' ?>

        <?php } ?>

    </section>


    <section class="grid-container servicios">

        <div class="servicio">

            <i class="servicio_icon" data-feather="truck"></i>

            <h3 class="servicio_titulo">Entrega en 48 horas</h3>
        </div>

        <div class="servicio">

            <i class="servicio_icon" data-feather="check-circle"></i>

            <h3 class="servicio_titulo">Garantía de 2 años</h3>
        </div>

        <div class="servicio">

            <i class="servicio_icon" data-feather="lock"></i>

            <h3 class="servicio_titulo">Compras protegidas</h3>
        </div>
    </section>


    <section class="grid-container galeria">
        <div class="imagen_cuadro"><img src="<?php echo RUTA; ?>imagenes/galeria1.png" alt="silla café de cuero con patas de madera" title="silla de cuero café"></div>
        <div class="imagen_rectangulo"><img src="<?php echo RUTA; ?>imagenes/galeria2.png" alt="mesa de madera con sillas blancas a los lados" title="mesa de madera"></div>
        <div class="imagen_rectangulo"><img src="<?php echo RUTA; ?>imagenes/galeria3.png" alt="silla blanca con patas de madera reforzadas" title="silla blanca"></div>
    </section>

    <?php

        $productos = obtenerProductos(8, $conexion);

    ?>

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