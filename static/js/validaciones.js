//VALIDACIONES MAIL NOMBRE Y CONTRASEÑA ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

function validarEmail(elemento) {

    var texto = document.getElementById(elemento.id).value;
    var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    if (!regex.test(texto)) {
        document.getElementById("resultadomail").innerText = "correo inválido";
    } else {
        document.getElementById("resultadomail").innerText = "";
    }

}
//////////////////////////////////////////////////////////////////////////////////////////////////
function validarNombre(elemento) {

    var nombre = document.getElementById(elemento.id).value;

    if (!nombre) {
        document.getElementById("resultadonombre").innerText = "rellene nombre";
    } else {
        document.getElementById("resultadonombre").innerText = "";
    }

}
//////////////////////////////////////////////////////////////////////////////////////////////////
function validarContrasenya(elemento) {

    var pass = document.getElementById(elemento.id).value;

    if (!pass) {
        document.getElementById("resultadopass").innerText = "rellene nombre";
    } else {
        document.getElementById("resultadopass").innerText = "";
    }

}
// RESERVA :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


//////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////////////////////////


// CAMAREROS :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

//////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////

