<?php
// Asegúrate de cargar WordPress
require_once('wp-load.php');

// Obtén todas las publicaciones de tipo 'post'
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
);

$posts_query = new WP_Query($args);

// Loop a través de todas las publicaciones
if ($posts_query->have_posts()) {
    while ($posts_query->have_posts()) {
        $posts_query->the_post();

        // Obtén los valores de los campos personalizados 'thumbs'
        $thumbs = get_post_meta(get_the_ID(), 'thumbs', true);

        // Filtra elementos vacíos
        $thumbs = array_filter($thumbs);
		var_dump($thumbs);

        // Actualiza el campo personalizado 'galeria'
        if (!empty($thumbs)) {
            update_post_meta(get_the_ID(), 'galeria', $thumbs);
			var_dump(galeria);
            echo 'Actualizado galeria para la publicación ' . get_the_ID() . '<br>';
        } else {
            echo 'No hay datos para la publicación ' . get_the_ID() . '<br>';
        }
    }

    wp_reset_postdata(); // Restablece los datos de la consulta

    echo '¡Proceso completado!';
} else {
    echo 'No se encontraron publicaciones para actualizar.';
}
?>
