<?php
function mostrar_miniaturas_galeria_metabox() {
    add_meta_box(
        'miniaturas_galeria_metabox',
        __('Galería de imágenes', 'inmobiliariadelassierras'),
        'mostrar_miniaturas_galeria_callback',
        'post',
        'normal',
        'high'
    );

    // Encolar jQuery UI Sortable usando el núcleo de WordPress
    wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('mi-script', get_stylesheet_directory_uri() . '/galeria-scripts.js', array('jquery', 'jquery-ui-sortable'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'mostrar_miniaturas_galeria_metabox');

function mostrar_miniaturas_galeria_callback($post) {
    // ... Código anterior ...

    // Mostrar miniaturas de las imágenes con ordenamiento
    if (!empty($imagenes)) {
        echo '<ul id="sortable">';
        foreach ($imagenes as $imagen_id) {
            echo '<li id="' . $imagen_id . '"><img src="' . wp_get_attachment_image_src($imagen_id, 'thumbnail')[0] . '" alt="'.$post->title.' - '.$imagen_id.'"></li>';
        }
        echo '</ul>';
    }

    // Registra en el log
    error_log("Metabox mostrado para la entrada con ID {$post->ID}");
}

function guardar_miniaturas_galeria_metabox($post_id) {
    // Verificar si es un guardado automático y si el usuario tiene permisos
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Guardar el valor del metabox de la galería de imágenes
    if (isset($_POST['galeria_imagenes'])) {
        update_post_meta($post_id, 'clave_metabox', sanitize_text_field($_POST['galeria_imagenes']));
    }
}
add_action('save_post', 'guardar_miniaturas_galeria_metabox');
