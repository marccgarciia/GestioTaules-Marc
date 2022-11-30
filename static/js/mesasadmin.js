//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: CAMAREROS
function ListarCrud(filtro) {

    let resultado = document.getElementById("resultadomesa");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/controllercrudmesasadmin.php');
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
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function Eliminar(id_m) {

    const formdata = new FormData();
    formdata.append('id_m', id_m);

    const ajax = new XMLHttpRequest();
    ajax.open("POST", "../controller/controllereliminarmesa.php");
    ajax.onload = function() {
        if (ajax.status === 200) {
            if (ajax.responseText == "OK") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '¡Mesa Eliminada!',
                    showConfirmButton: false,
                    timer: 1500,
                    padding: '10px'
                    });                
                ListarCrud('');
            }
        }
    };
    ajax.send(formdata);
}
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
                ListarCrud('');
            }
        } else {
            alert('Error');
        }
    };
    ajax.send(formdata);
});
