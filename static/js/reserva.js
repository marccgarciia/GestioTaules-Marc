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
