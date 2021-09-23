$(document).ready(function () {
	const RUTA = "http://localhost/pr2/";

	let contenedorResultados = $('[data-search="busqueda_resultado"]'),
		inputBusqueda = $('[data-search="input_busqueda"]');

	contenedorResultados.hide();

	function buscarProductos(campoBusqueda) {
		if (campoBusqueda.val()) {
			let busqueda = campoBusqueda.val();

			$.ajax({
				url: "php/funcion_busqueda.php",
				type: "POST",
				data: { busqueda },
				success: function (result) {
					let resultadosBusqueda = JSON.parse(result),
						listaResultados = "";

					resultadosBusqueda.forEach((resultado) => {
						listaResultados += `<div class="producto_carrito">
                            <div class="producto_img">
                            <a href="${RUTA}detalles.php?id=${resultado.ID}">
                            <img src="${RUTA}imagenes/productos/${resultado.Imagen}" alt="${resultado.Nombre}" title="${resultado.Nombre}">
                            </a>
                            </div>
                        
                            <div class="producto_detalles" style="text-align:left;">
                            <a href="${RUTA}detalles.php?id=${resultado.ID}" class="detalles_titulo">${resultado.Nombre}</a>
                            </div>
                            </div>`;
					});

					contenedorResultados.html(listaResultados);

					contenedorResultados.show();
				},
			});
		} else {
			contenedorResultados.hide();
		}
	}

	inputBusqueda.keyup(function () {
		buscarProductos($(this));
	});

	function borrarBusqueda() {
		contenedorResultados.hide();

		inputBusqueda.val("");
	}

	$("main").click(function () {
		borrarBusqueda();
	});
	$("header").click(function () {
		borrarBusqueda();
	});
});
