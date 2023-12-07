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
});
