jQuery(document).ready(function($) {
    $('.miniaturas-galeria').sortable({
        update: function(event, ui) {
            var orden = [];
            $(this).find('li').each(function() {
                orden.push($(this).attr('id').replace('item_', ''));
            });
            $('#orden_imagenes').val(orden.join(','));
        }
    });

    // Funcionalidad para eliminar miniaturas
    $('.eliminar-miniatura').on('click', function() {
        var id = $(this).data('id');
        $('#item_' + id).remove();
        actualizarOrden();
    });

    // Funcionalidad para subir nuevas imágenes
    $('#subir_imagenes').on('click', function() {
        var frame = wp.media({
            title: 'Subir Imágenes',
            multiple: true
        });

        frame.on('select', function() {
            var attachments = frame.state().get('selection').toJSON();
            attachments.forEach(function(attachment) {
                var html = '<li id="item_' + attachment.id + '" class="miniatura-item">';
                html += '<img src="' + attachment.sizes.thumbnail.url + '" alt="">';
                html += '<span class="dashicons dashicons-dismiss eliminar-miniatura" data-id="' + attachment.id + '"></span>';
                html += '</li>';
                $('.miniaturas-galeria').append(html);
            });

            actualizarOrden();
        });

        frame.open();
    });

    function actualizarOrden() {
        var orden = [];
        $('.miniaturas-galeria li').each(function() {
            orden.push($(this).attr('id').replace('item_', ''));
        });
        $('#orden_imagenes').val(orden.join(','));
    }
});
