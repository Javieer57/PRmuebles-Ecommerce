$(document).ready(function () {
	const RUTA = "http://localhost/pr2/";

	function cargarProductosPorMarca(marca) {
		$.ajax({
			url: "php/obtener_productos.php",
			type: "GET",
			success: function (result) {
				let todosLosProductos = JSON.parse(result),
					contenedorProductosCatalogo = $("#contenedorProductos"),
					listaProductosFiltrados = "";

				todosLosProductos.forEach((producto) => {
					if (producto.MARCA == marca || marca == "Todos") {
						listaProductosFiltrados += `<div class="producto">
                            <div class="producto_imagen">
                            <a href="${RUTA}detalles.php?id=${producto.ID}">
                            <img src="${RUTA}imagenes/productos/${producto.IMAGEN}" alt="<?php echo $producto['Nombre']; ?>" title="<?php echo $producto['Nombre']; ?>">
                            </a>
                            </div>
                            <a href="${RUTA}detalles.php?id=${producto.ID}" class="producto_nombre">${producto.NOMBRE}</a>
                            <span class="producto_precio">$${producto.PRECIO}</span>
                            </div>`;
					}
				});

				contenedorProductosCatalogo.html(listaProductosFiltrados);
			},
		});
	}

	function generarListaDeMarcas(arregloDeProductos) {
		let listadoDeMarcas = [];

		arregloDeProductos.forEach((producto) => {
			if (listadoDeMarcas.indexOf(producto.MARCA) == -1) {
				listadoDeMarcas.push(producto.MARCA);
			}
		});

		return listadoDeMarcas;
	}

	function generarFiltroPorMarca(listaDeProductos, listaDeMarcas) {
		let marcasEnHTML = "",
			contenedorSumatoriaDeProductos = $("#totalDeProductos"),
			sumaTotalDeProductos = listaDeProductos.length;

		listaDeMarcas.forEach((marca) => {
			productosPorMarca = 0;

			/* Contador de productos de cada marca */
			listaDeProductos.forEach((producto) => {
				if (producto.MARCA == marca) {
					productosPorMarca++;
				}
			});

			marcasEnHTML += `<a href="#" data-category="${marca}" class="filtro_categoria" style="width: 100%;" id="${marca}">${marca}
                <span class="categoria_cantidad" id="filtro_todos">${productosPorMarca}</span>
                </a>`;
		});

		contenedorSumatoriaDeProductos.html(sumaTotalDeProductos);
		return marcasEnHTML;
	}

	function cargarFiltrosDeMarcas() {
		$.ajax({
			url: "php/obtener_productos.php",
			type: "GET",
			success: function (result) {
				let todosLosProductos = JSON.parse(result),
					contenedorFiltros = $("#contenedor_filtros");

				let listadoDeMarcas = generarListaDeMarcas(todosLosProductos),
					filtroDeMarcasEnHTML = generarFiltroPorMarca(todosLosProductos, listadoDeMarcas);

				contenedorFiltros.append(filtroDeMarcasEnHTML);

				$("[data-category]").click(function () {
					cargarProductosPorMarca($(this).attr("data-category"));
				});
			},
		});
	}

	cargarProductosPorMarca("Todos");
	cargarFiltrosDeMarcas();
});
