function crear() {

    var form = document.getElementById('frm');
    const formdata = new FormData(form);

    const ajax = new XMLHttpRequest();
    console.log(ajax);
    ajax.open("POST", "../controller/controllerinsertar.php");

    ajax.onload = function() {
        if (ajax.status === 200) {
            // console.log(ajax.responseText);
            if (ajax.responseText == "OK") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Camarero/a insertado/a!',
                    showConfirmButton: false,
                    timer: 1500,
                    padding: '10px'
                });
            }
        } else {
            alert('Error');
        }
    };
    ajax.send(formdata);
}