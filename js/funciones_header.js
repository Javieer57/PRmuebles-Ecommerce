$(document).ready(function () {

    let contenedorMenu = $('#contenedor_menu_responsive'),
        backgroundOscuro = $('#fondo');

    function mostrarOcultarMenuResponsive() {

        if (contenedorMenu.css('display') == 'block') {
            contenedorMenu.css('display', 'none');
            backgroundOscuro.css('display', 'none');
        } else {
            contenedorMenu.css('display', 'block');
            backgroundOscuro.css('display', 'block');
        }
    }

    $('#fondo').click(function () { mostrarOcultarMenuResponsive(); });
    $('#menu_responsive').click(function () { mostrarOcultarMenuResponsive(); });


    function mostrarOcultarCarrito() {
        let carrito = $('#carrito'),
            carritoFondo = $('#carrito_fondo');

        carrito.toggleClass('abierto');
        carritoFondo.toggle();

        contenedorMenu.hide();
        backgroundOscuro.hide();
    }

    $('#mostrarCarrito').click(function () { mostrarOcultarCarrito(); });
    $('#cerrarCarrito').click(function () { mostrarOcultarCarrito(); });
    $('#carrito_fondo').click(function () { mostrarOcultarCarrito(); });
    
});