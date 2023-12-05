jQuery(document).ready(function($) {
    $('#sortable').sortable({
        update: function(event, ui) {
            // Actualiza el campo oculto con el nuevo orden
            var order = $('#sortable').sortable('toArray');
            $('#galeria_imagenes').val(JSON.stringify(order));
        }
    });
    $('#sortable').disableSelection();
});
