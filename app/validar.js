$(document).ready(function () {
    $('#formularioPago').validate({
        rules: {
            campo_nombre: {
                required: true,
                minlength: 1,
                maxlength: 40
            },
            campo_apellidos: {
                required: true,
                minlength: 1,
                maxlength: 40
            },
            campo_calle: {
                required: true,
                minlength: 1,
                maxlength: 80
            },
            campo_ciudad: {
                required: true,
                minlength: 1,
                maxlength: 60
            },
            campo_estado: {
                required: true
            },
            campo_postal: {
                required: true,
                minlength: 5,
                maxlength: 5,
                number: true
            },
            email: {
                required: true,
                email: true
            },
            campo_telefono: {
                required: true,
                minlength: 10,
                maxlength: 10,
                number: true
            },
            tarjeta_nombre: {
                required: true,
                minlength: 1,
                maxlength: 40
            },
            tarjeta_numero: {
                required: true,
                minlength: 16,
                maxlength: 16,
                number: true
            },
            tarjeta_vencimiento: {
                required: true,
                minlength: 2,
                maxlength: 2,
                number: true
            },
            tarjeta_vencimientoY: {
                required: true,
                minlength: 2,
                maxlength: 2,
                number: true
            },
            tarjeta_codigo: {
                required: true,
                // minlength: 3,
                // maxlength: 3,
                number: true
            }
        },
        messages: {
            campo_nombre: {
                required: "Por favor captura un nombre",
                minlength: "Por favor captura un nombre",
                maxlength: ""
            },
            campo_apellidos: {
                required: "Por favor captura al menos un apellido",
                minlength: "Por favor captura al menos un apellido",
                maxlength: ""
            },
            campo_calle: {
                required: "Por favor captura una calle",
                minlength: "Por favor captura una calle",
                maxlength: ""
            },
            campo_ciudad: {
                required: "Por favor captura una ciudad",
                minlength: "Por favor captura una ciudad",
                maxlength: ""
            },
            campo_estado: {
                required: "Por favor selecciona un estado"
            },
            campo_postal: {
                required: "Por favor captura un código postal",
                minlength: "El CP debe tener 5 dígitos",
                maxlength: "",
                number: "Captura solo números"
            },
            email: {
                required: "Por favor captura un correo",
                email: "Por favor captura un correo válido"
            },
            campo_telefono: {
                required: "Por favor captura un teléfono",
                minlength: "El teléfono debe tener 10 dígitos",
                maxlength: "",
                number: "Captura sólo numeros"
            },
            tarjeta_nombre: {
                required: "Por favor captura un nombre",
                minlength: "Por favor captura un nombre",
                maxlength: ""
            },
            tarjeta_numero: {
                required: "Por favor captura un número de tarjeta",
                minlength: "El numero de tarjeta debe tener 16 dígitos",
                maxlength: "",
                number: "Captura sólo numeros"
            },
            tarjeta_vencimiento: {
                required: "*",
                minlength: "Ingresa mes",
                maxlength: "",
                number: "Captura sólo numeros"
            },
            tarjeta_vencimientoY: {
                required: "*",
                minlength: "Ingresa año",
                maxlength: "",
                number: "Captura sólo numeros"
            },
            tarjeta_codigo: {
                required: "*",
                minlength: "Ingresa CVV",
                maxlength: "",
                number: "Captura sólo numeros"
            }
        }
    });
})