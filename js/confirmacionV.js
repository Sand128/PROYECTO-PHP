// Función para confirmar la eliminación de un registro
function confirmacionEliminacion(id) {
    var confirmacion = confirm('¿Estás seguro de eliminar este registro?');
    if (confirmacion) {
        // Redirige a PHP para realizar la eliminación
        window.location.href = 'confirmacionV.php?accion=eliminar&id=' + encodeURIComponent(id);
    } else {
        // Si el usuario no confirma, redirige a la página anterior
        window.location.href = 'tablaVehiculo.php'; // O la página que desees
    }
}

// Función para confirmar la actualización de un registro
function confirmarActualizacion(id) {
    var confirmacion = confirm('¿Estás seguro de actualizar este registro?');
    if (confirmacion) {
        // Redirige a PHP para realizar la actualización (aquí deberías definir la lógica)
        window.location.href = 'confirmacionV.php?accion=modificar&id=' + encodeURIComponent(id);
    } else {
        // Si el usuario no confirma, redirige a la página de Vehiculos
        window.location.href = 'tablaVehiculo.php'; // O la página que desees
    }
}
