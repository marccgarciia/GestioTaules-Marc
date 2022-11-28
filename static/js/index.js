//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: CAMAREROS
function ListarCrud(filtro) {

    let resultado = document.getElementById("resultado");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/controllercrud.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            resultado.innerHTML = ajax.responseText;
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}

buscar.addEventListener("keyup", () => {
    const filtro = buscar.value;
    if (filtro == "") {
        ListarCrud('');
    } else {
        ListarCrud(filtro);
    }
});

ListarCrud('');
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: MESA
function ListarCrudMesa(filtro) {

    let mesa = document.getElementById("resultadomesa");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/controllercrudmesa.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            mesa.innerHTML = ajax.responseText;
        } else {
            mesa.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}

buscar.addEventListener("keyup", () => {
    const filtro = buscar.value;
    if (filtro == "") {
        ListarCrudMesa('');
    } else {
        ListarCrudMesa(filtro);
    }
});

ListarCrudMesa('');
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: SALA
function ListarCrudSala(filtro) {

    let sala = document.getElementById("resultadosala");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/controllercrudsala.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            sala.innerHTML = ajax.responseText;
        } else {
            sala.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}

buscar.addEventListener("keyup", () => {
    const filtro = buscar.value;
    if (filtro == "") {
        ListarCrudSala('');
    } else {
        ListarCrudSala(filtro);
    }
});

ListarCrudSala('');
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: RESERVA
function ListarCrudReserva(filtro) {

    let reserva = document.getElementById("resultadoreserva");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/controllercrudreserva.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            reserva.innerHTML = ajax.responseText;
        } else {
            reserva.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}

buscar.addEventListener("keyup", () => {
    const filtro = buscar.value;
    if (filtro == "") {
        ListarCrudReserva('');
    } else {
        ListarCrudReserva(filtro);
    }
});

ListarCrudReserva('');
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: ESTADO
function Estado() {
    var seleccion = document.getElementById('estado');

    if (document.getElementById('indice').value = seleccion.selectedIndex == 1) {
        document.getElementById("estat").style.color = "#30C437";
        document.getElementById("estat").innerText = "LIBRE";

    } else if (document.getElementById('indice').value = seleccion.selectedIndex == 2) {
        document.getElementById("estat").style.color = "#C43030";
        document.getElementById("estat").innerText = "OCUPADO";

    } else if (document.getElementById('indice').value = seleccion.selectedIndex == 3) {
        document.getElementById("estat").style.color = "#E8DD36";
        document.getElementById("estat").innerText = "MANTENIMIENTO";

    }
}
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function Eliminar(id) {

    const formdata = new FormData();
    formdata.append('id', id);

    const ajax = new XMLHttpRequest();
    ajax.open("POST", "../controller/controllereliminar.php");
    ajax.onload = function() {
        if (ajax.status === 200) {
            if (ajax.responseText == "OK") {
                alert('¡Camarero eliminado!');
                ListarCrud('');
            }
        }
    };
    ajax.send(formdata);
}
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function EliminarReserva(id_reserva) {

    const formdata = new FormData();
    formdata.append('id_reserva', id_reserva);
    
    const ajax = new XMLHttpRequest();
    ajax.open("POST", "../controller/controllereliminarreserva.php");
    ajax.onload = function() {
        if (ajax.status === 200) {
            if (ajax.responseText == "OK") {
                alert('¡Reserva Eliminada!');
                ListarCrudReserva('');
            }
        }
    };
    ajax.send(formdata);
}
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// function crear() {

//     var form = document.getElementById('frm');
//     const formdata = new FormData(form);

//     const ajax = new XMLHttpRequest();
//     console.log(ajax);
//     ajax.open("POST", "crear.php");

//     ajax.onload = function() {
//         if (ajax.status === 200) {
//             // console.log(ajax.responseText);
//             if (ajax.responseText == "OK") {
//                 alert('¡Registro Exitoso!');
//                 ListarCrud('');
//             }
//         } else {
//             alert('Error');
//         }
//     };
//     ajax.send(formdata);
// }
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
