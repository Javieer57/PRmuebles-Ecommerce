<?php

include 'templates/header.php';

?>

<main>
    <section class="grid-container catalogo">
        <div class="catalogo_filtros">

            <div class="filtro" id="contenedor_filtros">
                <h3 class="filtro_titulo">marca</h3>

                <a href="#" data-category="Todos" class="filtro_categoria" style="width: 100%;" id="filtroTodos">Todos

                    <span class="categoria_cantidad" id="totalDeProductos"></span>
                </a>
            </div>
        </div>
        
        <div class="catalogo_productos" id="contenedorProductos">
        </div>
    </section>
</main>

<?php

include 'templates/footer.php';

?>