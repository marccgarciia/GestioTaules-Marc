//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: CAMAREROS
function ListarCrud(filtro) {

    let resultado = document.getElementById("resultado");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/controllercrudadmin.php');
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
function Eliminar(id) {

    const formdata = new FormData();
    formdata.append('id', id);

    const ajax = new XMLHttpRequest();
    ajax.open("POST", "../controller/controllereliminar.php");
    ajax.onload = function() {
        if (ajax.status === 200) {
            if (ajax.responseText == "OK") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '¡Camarero/a eliminado!',
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
