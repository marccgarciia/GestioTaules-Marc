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