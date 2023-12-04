<?php
function mostrar_miniaturas_galeria_metabox() {
    add_meta_box(
        'miniaturas_galeria_metabox',
        'Miniaturas de Galería',
        'mostrar_miniaturas_galeria_callback',
        'post',
        'normal',
        'high'
    );
}

function mostrar_miniaturas_galeria_callback($post) {
    wp_nonce_field(basename(__FILE__), 'miniaturas_galeria_nonce');

    // Obtén las imágenes adjuntas al post actual
    $imagenes_adjuntas = get_attached_media('image', $post->ID);

    // Muestra las miniaturas de la galería en el metabox con capacidad de ordenar
    echo '<div id="miniaturas-galeria-metabox">';

    if ($imagenes_adjuntas) {
        echo '<ol class="miniaturas-galeria" id="ordenable-list">';
        foreach ($imagenes_adjuntas as $imagen) {
            echo '<li id="item_' . $imagen->ID . '" class="miniatura-item">';
            echo wp_get_attachment_image($imagen->ID, 'thumbnail');
            echo '<span class="dashicons dashicons-dismiss eliminar-miniatura" data-id="' . $imagen->ID . '"></span>';
            echo '</li>';
        }
        echo '</ol>';
    } else {
        echo '<p>No hay imágenes adjuntas.</p>';
    }

    // Campo oculto para almacenar el orden de las imágenes
    echo '<input type="hidden" id="orden_imagenes" name="orden_imagenes" value="' . esc_attr(implode(',', array_keys($imagenes_adjuntas))) . '">';

    // Botón para subir nuevas imágenes
    echo '<p><input type="button" class="button button-secondary" value="Subir Imágenes" id="subir_imagenes"></p>';

    echo '</div>';
}

function guardar_orden_imagenes($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (!isset($_POST['miniaturas_galeria_nonce']) || !wp_verify_nonce($_POST['miniaturas_galeria_nonce'], basename(__FILE__))) return;

    if (isset($_POST['orden_imagenes'])) {
        $orden_imagenes = explode(',', sanitize_text_field($_POST['orden_imagenes']));
        $orden = 1;

        // Actualiza el orden de las imágenes existentes
        foreach ($orden_imagenes as $attachment_id) {
            if ($attachment_id) {
                update_post_meta($attachment_id, '_orden_imagen', $orden);
                $orden++;
            }
        }

        // Adjunta las nuevas imágenes y actualiza su orden
        if (!empty($_FILES['async-upload']['name'])) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
            require_once ABSPATH . 'wp-admin/includes/media.php';
            require_once ABSPATH . 'wp-admin/includes/image.php';

            $attachment_ids = array();

            foreach ($_FILES as $file => $array) {
                $attachment_id = media_handle_upload($file, $post_id);
                if (!is_wp_error($attachment_id)) {
                    update_post_meta($attachment_id, '_orden_imagen', $orden);
                    $orden++;
                    $attachment_ids[] = $attachment_id;
                }
            }
        }

        // Actualiza el orden de las nuevas imágenes
        foreach ($attachment_ids as $attachment_id) {
            update_post_meta($attachment_id, '_orden_imagen', $orden);
            $orden++;
        }
    }
}

// Carga los scripts y estilos para dar funcionalidad.
function cargar_scripts_estilos_galeria() {
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('galeria-scripts', get_template_directory_uri() . '/js/galeria-scripts.js', array('jquery'), '1.0', true);
    wp_enqueue_media();
    wp_enqueue_style('galeria-styles', get_template_directory_uri() . '/css/galeria-styles.css');
}

add_action('admin_enqueue_scripts', 'cargar_scripts_estilos_galeria');

// Llamada a la función para agregar el metabox
add_action('add_meta_boxes', 'mostrar_miniaturas_galeria_metabox');

// Guarda el orden de las imágenes al actualizar la entrada
add_action('save_post', 'guardar_orden_imagenes');
?>
