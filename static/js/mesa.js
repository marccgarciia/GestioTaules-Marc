//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
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

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
enviar.addEventListener("click", () => {

    var actualizar = document.getElementById('actualizar');

    const formdata = new FormData(actualizar);
    formdata.append('estado', estado.value);

    const ajax = new XMLHttpRequest();
    ajax.open("POST", "../controller/controlleractulizarestado.php");
    ajax.onload = function() {
        if (ajax.status === 200) {
            // console.log(ajax.responseText);
            if (ajax.responseText == "OK") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '¡Estado cambiado!',
                    showConfirmButton: false,
                    timer: 1500,
                    padding: '10px'
                    });               
                ListarCrudMesa('');
            }
        } else {
            alert('Error');
        }
    };
    ajax.send(formdata);
});
