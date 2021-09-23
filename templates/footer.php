<!-- ::::::: Footer :::::::::: -->
<footer>
    <div class="grid-container footer">


        <!-- Contacto -->
        <div class="footer_contacto">

            <h5 class="footer_titulo">Contacto</h5>

            <p class="footer_texto">+00 55 66 22 11</p>
            <p class="footer_texto">mueblesPR[at]gmail.com</p>
            <p class="footer_texto">Londres 247, Del Carmen, Coyoacán, CDMX</p>

        </div>

        <!-- Avisos -->
        <div class="footer_avisos">

            <h5 class="footer_titulo">Avisos</h5>

            <div class="footer_link_wrap footer_link"><a href="politicas.php" style="color: #939393; text-decoration:none;">Políticas de envíos y devoluciones</a></div>

        </div>

        <!-- Redes -->
        <div class="footer_redes">

            <h5 class="footer_titulo">Redes sociales</h5>

            <span class="btn_redsocial"><i data-feather="facebook"></i></span>
            <span class="btn_redsocial"><i data-feather="instagram"></i></span>
            <span class="btn_redsocial"><i data-feather="twitter"></i></span>
            <span class="btn_redsocial"><i data-feather="youtube"></i></span>

        </div>

        <!-- Logo -->
        <div class="footer_logo">

            <div class="footer_img">
                <a href="<?php echo RUTA; ?>">
                    <img src="<?php echo RUTA; ?>imagenes/PRmuebles.svg" alt="logo de PRmuebles" title="PRmuebles">
                </a>
            </div>

        </div>

    </div>
</footer>


<!-- ::::::: Javascript :::::::::: -->
<script>
    /**
     * Transforma las etiquetas i con [data-feather] en iconos SVG
     */
    feather.replace({'stroke-width': 1});
</script>
<script src="js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="js/funciones_header.js"></script>
<script src="js/funciones_busqueda.js"></script>
<script src="app/validar.js"></script>
<script src="js/funciones_catalogo.js"></script>
<script src="app/ajax_carrito.js"></script>
</body>

</html>