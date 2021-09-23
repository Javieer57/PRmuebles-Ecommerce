<?php

include 'templates/header.php';

?>

<main>
    <section class="grid-container checkout">

        <form action="#" method="post" class="contenedor_formularios" name="formularioPago" id="formularioPago">
            <div>

                <div class="formulario entrega">
                    <h3 class="formulario_titulo">Datos de entrega</h3>

                    <div class="formulario_campo nombre">
                        <label class="campo_titulo" for="campo_nombre">Nombre</label>
                        <input class="campo_input" type="text" id="campo_nombre" minlength="1" maxlength="40" name="campo_nombre" required>
                    </div>

                    <div class="formulario_campo apellidos">
                        <label class="campo_titulo" for="campo_apellidos">Apellidos</label>
                        <input class="campo_input" type="text" id="campo_apellidos" minlength="1" maxlength="40" name="campo_apellidos" required>
                    </div>

                    <div class="formulario_campo calle">
                        <label class="campo_titulo" for="campo_calle">Calle</label>
                        <input class="campo_input" type="text" id="campo_calle" minlength="1" maxlength="80" name="campo_calle" required>
                    </div>

                    <div class="formulario_campo ciudad">
                        <label class="campo_titulo" for="campo_ciudad">Ciudad o Municipio</label>
                        <input class="campo_input" type="text" id="campo_ciudad" minlength="1" maxlength="60" name="campo_ciudad" required>
                    </div>

                    <div class="formulario_campo estado">
                        <label class="campo_titulo" for="campo_estado">Estado</label>

                        <select class="campo_input" name="campo_estado" id="campo_estado" required>
                            <option value="CDMX">Ciudad de México</option>
                            <option value="AGS">Aguascalientes</option>
                            <option value="BCN">Baja California</option>
                            <option value="BCS">Baja California Sur</option>
                            <option value="CAM">Campeche</option>
                            <option value="CHP">Chiapas</option>
                            <option value="CHI">Chihuahua</option>
                            <option value="COA">Coahuila</option>
                            <option value="COL">Colima</option>
                            <option value="DUR">Durango</option>
                            <option value="GTO">Guanajuato</option>
                            <option value="GRO">Guerrero</option>
                            <option value="HGO">Hidalgo</option>
                            <option value="JAL">Jalisco</option>
                            <option value="MEX">M&eacute;xico</option>
                            <option value="MIC">Michoac&aacute;n</option>
                            <option value="MOR">Morelos</option>
                            <option value="NAY">Nayarit</option>
                            <option value="NLE">Nuevo Le&oacute;n</option>
                            <option value="OAX">Oaxaca</option>
                            <option value="PUE">Puebla</option>
                            <option value="QRO">Quer&eacute;taro</option>
                            <option value="ROO">Quintana Roo</option>
                            <option value="SLP">San Luis Potos&iacute;</option>
                            <option value="SIN">Sinaloa</option>
                            <option value="SON">Sonora</option>
                            <option value="TAB">Tabasco</option>
                            <option value="TAM">Tamaulipas</option>
                            <option value="TLX">Tlaxcala</option>
                            <option value="VER">Veracruz</option>
                            <option value="YUC">Yucat&aacute;n</option>
                            <option value="ZAC">Zacatecas</option>
                        </select>
                    </div>

                    <div class="formulario_campo cp">
                        <label class="campo_titulo" for="campo_postal">Código Postal</label>
                        <input pattern="[0-9]{5}" minlength="5" maxlength="5" class="campo_input" type="text" id="campo_postal" name="campo_postal" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
                    </div>

                    <div class="formulario_campo mail">
                        <label class="campo_titulo" for="email">Email</label>
                        <input class="campo_input" id="email" type="email" name="email" required>
                    </div>

                    <div class="formulario_campo tel">
                        <label class="campo_titulo" for="campo_telefono">Teléfono (10 dígitos)</label>
                        <input pattern="[0-9]{10}" minlength="10" maxlength="10" class="campo_input" type="tel" id="campo_telefono" name="campo_telefono" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
                    </div>
                </div>

                <div class="formulario pago">

                    <h3 class="formulario_titulo">Forma de pago</h3>

                    <div class="formulario_campo nombre_tarjeta">
                        <label class="campo_titulo" for="tarjeta_nombre">Nombre en la tarjeta</label>
                        <input class="campo_input" type="text" id="tarjeta_nombre" minlength="1" maxlength="40" name="tarjeta_nombre" required>
                    </div>

                    <div class="formulario_campo numero_tarjeta">
                        <label class="campo_titulo" for="tarjeta_numero">Número de tarjeta</label>
                        <input class="campo_input" type="tel" id="tarjeta_numero" minlength="16" maxlength="16" name="tarjeta_numero" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
                    </div>

                    <div class="formulario_campo fecha_tarjeta" style="display: flex; align-items:flex-start; flex-wrap:wrap; justify-content:space-between;">
                        <label class="campo_titulo" for="tarjeta_vencimiento">Fecha de vencimiento</label>

                        <div style="width:45%; display:inline-block;">
                            <input class="campo_input" type="text" id="tarjeta_vencimiento" name="tarjeta_vencimiento" minlength="2" maxlength="2" style="width: 100%;" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required placeholder="Mes">
                        </div>

                        <span style="align-self: center;">/</span>
                        <div style="width:45%; display:inline-block;">
                            <input class="campo_input" type="text" id="tarjeta_vencimientoY" name="tarjeta_vencimientoY" minlength="2" maxlength="2" style="width: 100%;" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required placeholder="Año">
                        </div>

                    </div>

                    <div class="formulario_campo cvv_tarjeta">
                        <label class="campo_titulo" for="tarjeta_codigo">CVV</label>
                        <input class="campo_input" type="password" id="tarjeta_codigo" name="tarjeta_codigo" style="width:100%;" minlength="3" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
                    </div>
                </div>
            </div>
        </form>

        <div class="contenedor_compra">

            <h3 class="compra_titulo">Detalle de compra</h3>


            <div class="carrito_productos" id="contenedorProductosCarritoCheckout">
            </div>

            <div id="btnConfirmarCompra" class="checkout_pagar"></div>

        </div>

    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('input[type]').forEach(node => node.addEventListener('keypress', e => {
            if (e.keyCode == 13) {
                e.preventDefault();
            }
        }))
    });
</script>

<?php

include 'templates/footer.php'

?>