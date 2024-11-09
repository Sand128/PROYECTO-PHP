<?php
include('conexcion.php');
if (isset($_GET['matricula'])) {
    $matricula=$_GET['matricula'];

    echo "
    <script>
    var confirmacion = confirm ('¿Estas sdeguro de eliminar el reguistro?');
    if (confirmacion) {
        window.location.href = 'eliminaralumno2.php?matricula=' + encodeURIComponent('$matricula');
    } else {
        window.location.href = 'busquedaalumno.php';
    }
    </script>
    ";
}
?>