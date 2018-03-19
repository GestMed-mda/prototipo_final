function myAlert(value) {
    switch (value) {
        case 1:
            alert("Usuario añadido correctamente.");
            break;
        case 2:
            alert("Usuario modificado correctamente.");
            break;
        case 3:
            alert("Usuario eliminado correctamente.");

    }

    window.location.replace("index.php");
}

$(document).ready(function() {
    $("#editConfirm").click(function (event) {
        if (!confirm('¿Desea guardar los cambios?')) {
            event.preventDefault();
        }
    });
});

function deleteConfirm() {
    if( !confirm('¿Está seguro de que quiere eliminar ese usuario?') ) {
        event.preventDefault();
    }
}

