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
