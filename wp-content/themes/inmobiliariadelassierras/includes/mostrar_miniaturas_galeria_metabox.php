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
    wp_enqueue_media();
    wp_enqueue_script('galeria-scripts', get_template_directory_uri() . '/js/galeria-scripts.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'mostrar_miniaturas_galeria_metabox');

function mostrar_miniaturas_galeria_callback($post) {
    // Obtenemos las imágenes adjuntas al post desde el antiguo metabox 'thumbs'
    $imagenes_adjuntas = get_post_meta($post->ID, 'thumbs', true);

    // Si hay imágenes adjuntas, las convertimos en un array
    $imagenes_adjuntas = $imagenes_adjuntas ? (array)$imagenes_adjuntas : [];

    // Obtenemos las imágenes asociadas a la entrada desde el nuevo metabox 'clave_metabox'
    $imagenes = get_post_meta($post->ID, 'clave_metabox', true);

    // Si no hay imágenes en el nuevo metabox, inicializamos un array vacío
    $imagenes = $imagenes ? (array)$imagenes : [];

    // Combinamos las imágenes del metabox actual y las imágenes adjuntas
    $todas_las_imagenes = array_merge($imagenes, $imagenes_adjuntas);

    // Campo de texto para almacenar el listado de imágenes en el formulario
    echo '<label for="galeria_imagenes">' . __('Galería de Imágenes (ID de las imágenes):', 'inmobiliariadelassierras') . '</label>';
    echo '<input type="text" id="galeria_imagenes" name="galeria_imagenes" style="width:100%;" value="' . esc_attr(implode(',', $todas_las_imagenes)) . '">';
    echo '<p><button class="button" id="upload_imagen">' . __('Subir/Seleccionar Imágenes', 'inmobiliariadelassierras') . '</button></p>';

	// Mostrar miniaturas de las imágenes con ordenamiento

	if (!empty($todas_las_imagenes)) {
		echo '<ul id="sortable">';
		foreach ($todas_las_imagenes as $imagen_id) {
			// Verificar si $imagen_id es un número antes de usarlo

			echo '<li id="' . $imagen_id . '"><img src="' . $imagen_id . '" alt=""></li>';

			var_dump($imagen_id);
		}
		echo '</ul>';
	}


    // Registra en el log
    error_log(sprintf(__('Metabox mostrado para la entrada con ID %d', 'inmobiliariadelassierras'), $post->ID));
}




function guardar_miniaturas_galeria_metabox($post_id) {
    // Verificar si es un guardado automático y si el usuario tiene permisos
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Guardar el valor del metabox de la galería de imágenes
    if (isset($_POST['galeria_imagenes'])) {
        update_post_meta($post_id, 'galeria', sanitize_text_field($_POST['galeria_imagenes']));
    }
}
add_action('save_post', 'guardar_miniaturas_galeria_metabox');
