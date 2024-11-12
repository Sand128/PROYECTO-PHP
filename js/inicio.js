document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('search-button').addEventListener('click', function() {
        var query = document.getElementById('search-input').value;
        if (query) {
            alert('Buscando: ' + query);

            // Crear una solicitud AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'search.php?query=' + encodeURIComponent(query), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Procesar la respuesta
                    var resultados = JSON.parse(xhr.responseText);
                    mostrarResultados(resultados);
                }
            };
            xhr.send();
        } else {
            alert('Por favor, ingresa un término de búsqueda.');
        }
    });

    function mostrarResultados(resultados) {
        var resultadosDiv = document.getElementById('resultados');
        resultadosDiv.innerHTML = ''; // Limpiar resultados anteriores

        if (resultados.length > 0) {
            resultados.forEach(function(resultado) {
                var item = document.createElement('div');
                item.innerHTML = '<strong>Tipo: ' + resultado.tipo + '</strong><br>' +
                                 'Nombre: ' + resultado.nombre + '<br>' +
                                 (resultado.descripcion ? 'Descripción: ' + resultado.descripcion + '<br>' : '') +
                                 (resultado.estado ? 'Estado: ' + resultado.estado + '<br>' : '') +
                                 (resultado.categoria ? 'Categoría: ' + resultado.categoria + '<br>' : '') +
                                 (resultado.marca ? 'Marca: ' + resultado.marca + '<br>' : '') +
                                 (resultado.modelo ? 'Modelo: ' + resultado.modelo + '<br>' : '') +
                                 (resultado.n_placas ? 'Placas: ' + resultado.n_placas + '<br>' : '') +
                                 (resultado.id ? 'ID: ' + resultado.id + '<br>' : '');
                resultadosDiv.appendChild(item);
            });
        } else {
            resultadosDiv.innerHTML = '<p>No se encontraron resultados.</p>';
        }
    }
});
