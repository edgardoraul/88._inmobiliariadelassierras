jQuery(document).ready(function($){
    let custom_uploader;

    $('#upload_imagen').click(function(e) {
        e.preventDefault();

        // Si el uploader ya está creado, abre la caja de diálogo de medios
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        // Configuración del uploader
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Seleccionar Imágenes',
            button: {
                text: 'Seleccionar'
            },
            multiple: true
        });

        // Cuando se seleccionan archivos, actualiza el campo de texto
        custom_uploader.on('select', function() {
            let attachments = custom_uploader.state().get('selection').toJSON();
            let imageIds = attachments.map(function(attachment) {
                return attachment.id;
            });
            $('#galeria_imagenes').val(JSON.stringify(imageIds));

            // También, actualiza las miniaturas en el metabox
            let thumbnailList = $('#sortable');
            thumbnailList.empty();
            attachments.forEach(function(attachment) {
                thumbnailList.append('<li id="' + attachment.id + '"><img src="' + attachment.sizes.thumbnail.url + '" alt=""></li>');
            });
        });

        // Abre la caja de diálogo de medios
        custom_uploader.open();
    });



    $('#sortable').sortable({
        update: function (event, ui) {
            // Obtener el nuevo orden después de reordenar
            var newOrder = $('#sortable').sortable('toArray', { attribute: 'id' });
            // Actualizar el campo de texto con el nuevo orden
            $('#galeria_imagenes').val(newOrder.join(','));
        }
    });

    // Manejar clics en el ícono de borrar
    $('#sortable').on('click', '.delete-icon', function () {
        var imageId = $(this).data('image-id');
        // Eliminar la imagen del DOM
        $(this).closest('li').remove();
        // Actualizar el campo de texto sin la imagen eliminada
        var currentOrder = $('#galeria_imagenes').val().split(',');
        var newOrder = currentOrder.filter(function (id) {
            return id !== imageId;
        });
        $('#galeria_imagenes').val(newOrder.join(','));
    });
});
