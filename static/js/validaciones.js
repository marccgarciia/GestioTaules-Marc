//VALIDACIONES MAIL NOMBRE Y CONTRASEÑA ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

function mail(elemento) {

    var texto = document.getElementById(elemento.id).value;
    var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    if (!regex.test(texto)) {
        document.getElementById("resultadom").innerText = "correo inválido";
    } else {
        document.getElementById("resultadom").innerText = "";
    }

}
//////////////////////////////////////////////////////////////////////////////////////////////////
function password(elemento) {

    var texto = document.getElementById(elemento.id).value;

    if (!texto) {
        document.getElementById("resultadop").innerText = "rellene la contraseña";
    } else {
        document.getElementById("resultadop").innerText = "";
    }

}

// RESERVA :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

//////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////

// CAMAREROS :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

//////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////

