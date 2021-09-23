$(document).ready(function () {
	const RUTA = "http://localhost/pr2/";

	let productosEnCarrito = $("#productosEnCarrito"),
		contadorDeProductos = parseInt(productosEnCarrito.html()),
		infoDelProducto = "",
		contenedorProductosCarrito = $("#contenedorProductosCarrito");
	nombre = "";

	function modificarContadorDeProductos(operacion) {
		switch (operacion) {
			case "sumar":
				contadorDeProductos++;
				productosEnCarrito.html(contadorDeProductos);
				break;

			case "restar":
				contadorDeProductos--;
				productosEnCarrito.html(contadorDeProductos);
				break;
		}
	}

	function limpiarEventosDeBotones() {
		$("button[data-name]").off("click");
		$("button[data-name2]").off("click");
		$("button[data-name3]").off("click");
		$("button[data-name4]").off("click");
	}

	function generarProductosDelCarrito(objetoDeProductos) {
		let listaDeProductos = "";

		objetoDeProductos.forEach((producto) => {
			listaDeProductos += `<div class="producto_carrito">
            
                <div class="producto_img">
                <a href="${RUTA}detalles.php?id=${producto.IDenlace}">
                <img src="${RUTA}imagenes/productos/${producto.IMAGEN}" alt="${producto.NOMBRE}" title="${producto.NOMBRE}">
                </a>
                </div>
            
                <div class="producto_detalles">
                <a href="${RUTA}detalles.php?id=${producto.IDenlace}" class="detalles_titulo">${producto.NOMBRE}</a>
                <span class="detalles_precio">$${producto.PRECIO}</span>
                <span class="detalles_cantidad">Unidades: 1</span>
                </div>
            
                <form action="" method="post" class="intento">
                <input class="intento form_input" type="hidden" name="id" value="${producto.ID}">
                <button class="producto_borrar" name="btnAccion" value="Eliminar" data-name2="${producto.NOMBRE}" type="button">
                <i class="borrar_icon" data-feather="trash"></i>
                </button>
                </form>
                
                </div>`;
		});

		/* Agrega el desglose de costos al final de la lista de productos */
		listaDeProductos += generarDesgloseDeCostos(objetoDeProductos);

		return listaDeProductos;
	}

	function generarDesgloseDeCostos(objetoDeProductos) {
		let subtotal = 0,
			impuestos = 0,
			total = 0,
			desgloseDeCostos = "";

		objetoDeProductos.forEach((producto) => {
			subtotal += parseInt(producto.PRECIO);
			// impuestos = parseInt(subtotal * .10);
			// total = subtotal + impuestos;
			total = subtotal;
		});

		desgloseDeCostos += `<div class="desglose_costos">
            <span class="costo">
            <span class="costo_concepto">Subtotal</span>
            <span class="costo_cantidad">$${subtotal}</span>
            </span>

            <span class="costo">
            <span class="costo_concepto">Envío</span>
            <span class="costo_cantidad">GRATIS</span>
            </span>
            
            <span class="costo">
            <span class="concepto_total">Total</span>
            <span class="cantidad_total">$${total}</span>
            </span>
            </div>`;

		/*<span class="costo">
            <span class="costo_concepto">Impuestos</span>
            <span class="costo_cantidad">$${impuestos}</span>
        </span>*/

		return desgloseDeCostos;
	}

	function validarEmail(email) {
		let formatoValido = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return formatoValido.test(email) ? true : false;
	}

	$.ajax({
		url: "admin/carrito.php",
		type: "GET",
		success: function (resultado) {
			if (resultado == 0 || resultado == "[]") {
				contadorDeProductos = 0;
				productosEnCarrito.html(contadorDeProductos);

				contenedorProductosCarrito.html("<p style='color:#939393;'>No has agregado productos</p>");
				$("#contenedorProductosCarritoCheckout").html("<p style='color:#939393;'>No has agregado productos</p>");

				$("#btnConfirmarCompra").empty();

				productosDelCarrito = [];
				limpiarEventosDeBotones();

				$("button").click(function () {
					ejecutarAccionEnCarrito($(this));
				});

				if (buscarProductoEnCarrito($("#checkoutQuitarAgregar").attr("data-cart-id"), productosDelCarrito)) {
					$("#checkoutQuitarAgregar").html("Quitar del carrito");
					$("#checkoutQuitarAgregar").attr("value", "Eliminar");

					$("#comprarAhora").html("Comprar ahora");
					$("#comprarAhora").attr("value", "Checkout");
				} else {
					$("#checkoutQuitarAgregar").html("Agregar al carrito");
					$("#checkoutQuitarAgregar").attr("value", "Agregar");

					$("#comprarAhora").html("Comprar ahora");
					$("#comprarAhora").attr("value", "AgregarAhora");
				}
			} else {
				let productosDelCarrito = JSON.parse(resultado);
				limpiarEventosDeBotones();

				$("button").click(function () {
					ejecutarAccionEnCarrito($(this));
				});

				console.log();

				if (buscarProductoEnCarrito($("#checkoutQuitarAgregar").attr("data-cart-id"), productosDelCarrito)) {
					$("#checkoutQuitarAgregar").html("Quitar del carrito");
					$("#checkoutQuitarAgregar").attr("value", "Eliminar");

					$("#comprarAhora").html("Comprar Ahora");
					$("#comprarAhora").attr("value", "Checkout");
				} else {
					$("#checkoutQuitarAgregar").html("Agregar al carrito");
					$("#checkoutQuitarAgregar").attr("value", "Agregar");

					$("#comprarAhora").html("Comprar ahora");
					$("#comprarAhora").attr("value", "AgregarAhora");
				}

				contadorDeProductos = productosDelCarrito.length;
				productosEnCarrito.html(contadorDeProductos);

				productosDelCarrito.forEach((producto) => {
					$(`[data-name='${producto.NOMBRE}']`).attr("value", "Eliminar");
					$(`[data-name='${producto.NOMBRE}']`).empty();
					$(`[data-name='${producto.NOMBRE}']`).html('<i class="boton_icon agregado" data-feather="check"></i>');
					feather.replace({ "stroke-width": 1 });
				});

				listaDeProductos = generarProductosDelCarrito(productosDelCarrito);

				contenedorProductosCarrito.html(listaDeProductos);
				$("#contenedorProductosCarritoCheckout").html(listaDeProductos);

				$("#btnConfirmarCompra").html(
					`<div class="carrito_checkout">
                    <button class="boton_checkout" name="btnAccion" value="Pagar" type="submit" form="formularioPago" style="width:100%;" data-name="otro">Confirmar compra</button>
                    </div>`
				);

				contenedorProductosCarrito.empty();
				listaDeProductos += `<div class="carrito_checkout">
                    <a href="${RUTA}checkout.php" class="boton_checkout">Ir a Pagar</a>
                    </div>`;

				contenedorProductosCarrito.html(listaDeProductos);

				limpiarEventosDeBotones();

				$("button").click(function () {
					ejecutarAccionEnCarrito($(this));
				});

				feather.replace({ "stroke-width": 1 });
			}
		},
	});

	function buscarProductoEnCarrito(idProducto, listadoDeProductos) {
		existencia = false;

		listadoDeProductos.forEach((producto) => {
			if (producto.IDenlace == idProducto) {
				existencia = true;
			}
		});

		return existencia;
	}

	function agregarProductoACarrito(botonClickeado) {
		infoDelProducto = $(botonClickeado).parent().serializeArray();

		accion = { name: "btnAccion", value: "Agregar" };

		infoDelProducto.push(accion);

		$.ajax({
			url: "admin/carrito.php",
			type: "POST",
			data: infoDelProducto,
			success: function (result) {
				let productosDelCarrito = JSON.parse(result),
					listaDeProductos = generarProductosDelCarrito(productosDelCarrito);

				listaDeProductos += `<div class="carrito_checkout">
                    <a href="${RUTA}checkout.php" class="boton_checkout">Ir a Pagar</a>
                    </div>`;

				contenedorProductosCarrito.empty();
				contenedorProductosCarrito.html(listaDeProductos);

				modificarContadorDeProductos("sumar");

				if ($(botonClickeado).attr("data-name")) {
					nombre = $(botonClickeado).attr("data-name");
					$(`[data-name='${nombre}']`).attr("value", "Eliminar");
					$(`[data-name='${nombre}']`).empty();
					$(`[data-name='${nombre}']`).html('<i class="boton_icon agregado" data-feather="check"></i>');

					$(`[data-name3='${nombre}']`).attr("value", "Eliminar");
					$(`[data-name3='${nombre}']`).empty();
					$(`[data-name3='${nombre}']`).html("Quitar del carrito");

					$(`[data-name4='${nombre}']`).attr("value", "Checkout");
				} else {
					nombre = $(botonClickeado).attr("data-name3");
					$(`[data-name3='${nombre}']`).attr("value", "Eliminar");
					$(`[data-name3='${nombre}']`).empty();
					$(`[data-name3='${nombre}']`).html("Quitar del carrito");

					$(`[data-name='${nombre}']`).attr("value", "Eliminar");
					$(`[data-name='${nombre}']`).empty();
					$(`[data-name='${nombre}']`).html('<i class="boton_icon agregado" data-feather="check"></i>');

					$(`[data-name4='${nombre}']`).attr("value", "Checkout");
				}

				feather.replace({ "stroke-width": 1 });

				limpiarEventosDeBotones();

				$("button").click(function () {
					ejecutarAccionEnCarrito($(this));
				});
			},
		});
	}

	function eliminarProductoDelCarrito(botonClickeado) {
		infoDelProducto = $(botonClickeado).parent().serializeArray();

		accion = { name: "btnAccion", value: "Eliminar" };

		infoDelProducto.push(accion);

		$.ajax({
			url: "admin/carrito.php",
			type: "POST",
			data: infoDelProducto,
			success: function (result) {
				let productosDelCarrito = JSON.parse(result),
					listaDeProductos = generarProductosDelCarrito(productosDelCarrito);

				if (productosDelCarrito.length == 0) {
					listaDeProductos = '<p style="color:#939393;">No has agregado productos</p>';
					$("#btnConfirmarCompra").empty();
					$(".a_pagar").empty();
					$(".carrito_productos").html(listaDeProductos);
				} else {
					$(".carrito_productos").html(listaDeProductos);

					$("#btnConfirmarCompra").html(
						`<div class="carrito_checkout">
                        <button class="boton_checkout" name="btnAccion" value="Pagar" type="submit" form="formularioPago" style="width:100%;" data-name="otro">Confirmar compra</button>
                        </div>`
					);

					$(".a_pagar").html(
						`<div class="carrito_checkout">
                        <a href="${RUTA}checkout.php" class="boton_checkout">Ir a Pagar</a>
                        </div>`
					);
				}

				modificarContadorDeProductos("restar");

				if ($(botonClickeado).attr("data-name")) {
					nombre = $(botonClickeado).attr("data-name");
					$(`[data-name='${nombre}']`).attr("value", "Agregar");
					$(`[data-name='${nombre}']`).empty();
					$(`[data-name='${nombre}']`).html('<i class="boton_icon agregado" data-feather="shopping-bag"></i>');

					$(`[data-name3='${nombre}']`).attr("value", "Agregar");
					$(`[data-name3='${nombre}']`).empty();
					$(`[data-name3='${nombre}']`).html("Agregar al carrito");

					$(`[data-name4='${nombre}']`).attr("value", "AgregarAhora");
				} else if ($(botonClickeado).attr("data-name2")) {
					nombre = $(botonClickeado).attr("data-name2");

					$(`[data-name='${nombre}']`).attr("value", "Agregar");
					$(`[data-name='${nombre}']`).empty();
					$(`[data-name='${nombre}']`).html('<i class="boton_icon agregado" data-feather="shopping-bag"></i>');

					$(`[data-name3='${nombre}']`).attr("value", "Agregar");
					$(`[data-name3='${nombre}']`).empty();
					$(`[data-name3='${nombre}']`).html("Agregar al carrito");

					$(`[data-name4='${nombre}']`).attr("value", "AgregarAhora");
				} else {
					nombre = $(botonClickeado).attr("data-name3");

					$(`[data-name='${nombre}']`).attr("value", "Agregar");
					$(`[data-name='${nombre}']`).empty();
					$(`[data-name='${nombre}']`).html('<i class="boton_icon agregado" data-feather="shopping-bag"></i>');

					$(botonClickeado).attr("value", "Agregar");
					$(botonClickeado).empty();
					$(botonClickeado).html("Agregar al carrito");

					$(`[data-name4='${nombre}']`).attr("value", "AgregarAhora");
				}

				limpiarEventosDeBotones();

				$("button").click(function () {
					ejecutarAccionEnCarrito($(this));
				});

				feather.replace({ "stroke-width": 1 });
			},
		});
	}

	function ejecutarAccionEnCarrito(botonClickeado) {
		switch ($(botonClickeado).attr("value")) {
			case "Agregar":
				agregarProductoACarrito(botonClickeado);
				break;

			case "Eliminar":
				eliminarProductoDelCarrito(botonClickeado);
				break;

			case "Checkout":
				window.location.href = `${RUTA}checkout.php`;
				break;
		}
	}

	$("#formularioPago").on("submit", function (e) {
		e.preventDefault();
		infoDelProducto = $("#formularioPago").serializeArray();

		let vacio = false;

		infoDelProducto.forEach((dato) => {
			if (dato.value == "") {
				console.log(dato.value);
				vacio = true;
				return;
			}
		});

		if (!validarEmail($("#email").val())) {
			console.log("correo no");
			return;
		}

		let tarjeta_numero = $("#tarjeta_numero").val();
		let tarjeta_vencimiento = $("#tarjeta_vencimiento").val();
		let tarjeta_vencimientoY = $("#tarjeta_vencimientoY").val();
		let tarjeta_codigo = $("#tarjeta_codigo").val();
		let campo_telefono = $("#campo_telefono").val();

		if (
			tarjeta_numero.length < 16 ||
			tarjeta_numero.length > 16 ||
			tarjeta_vencimiento.length < 2 ||
			tarjeta_vencimiento.length > 2 ||
			tarjeta_vencimientoY.length < 2 ||
			tarjeta_vencimientoY.length > 2 ||
			tarjeta_codigo.length < 3 ||
			tarjeta_codigo.length > 3 ||
			campo_telefono.length < 10 ||
			campo_telefono.length > 10
		) {
			return;
		}

		if (vacio == false) {
			accion = { name: "btnAccion", value: "Pagar" };

			infoDelProducto.push(accion);

			$.ajax({
				url: "admin/carrito.php",
				type: "POST",
				data: infoDelProducto,
				success: function (result) {
					let respuesta = JSON.parse(result);

					desgloseDeCostos_final = `<section class='grid-container'>
                        <h2>¡Muchas gracias ${respuesta.nombre}!</h2>

                        <p>Tu compra ha sido procesada con los siguientes datos:</p>

                        <ul>
                        <li>Nombre: ${respuesta.nombre} ${respuesta.apellidos}</li>
                        <li>Domicilio: ${respuesta.calle}, ${respuesta.ciudad}, ${respuesta.codigo_postal}, ${respuesta.estado}</li>
                        <li>Correo electrónico: ${respuesta.correo}</li>
                        <li>Teléfono: ${respuesta.campo_telefono}</li>
                        </ul>

                        <p>El total de tu compra es: ${respuesta.total}</p>

                        <h4>¡Gracias por comprar en PRmuebles!</h4>
                        </section>`;

					contenedorProductosCarrito.empty();
					$("main").html(desgloseDeCostos_final);
				},
			});
		} else {
		}

		limpiarEventosDeBotones();
	});

	$("button").click(function () {
		ejecutarAccionEnCarrito($(this));
	});
});
