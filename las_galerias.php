<?php
// Asegúrate de cargar WordPress
require_once('wp-load.php');

// Carga el archivo media.php para que se pueda usar media_sideload_image()
require_once ABSPATH . 'wp-admin/includes/media.php';

// Ruta al archivo de registro
$log_file = __DIR__ . '/metabox_migration_log.log';

// Inicia el archivo de registro con un mensaje de inicio de ejecución
log_message("Inicio del script");

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

        // Procesa cada imagen en 'thumbs' y adjúntala al post
        foreach ($thumbs as $image_url) {
            // Usa la función wp_insert_attachment para adjuntar la imagen al post
            $attachment_id = upload_image_from_url($image_url, get_the_ID());

            // Agrega el attachment ID al nuevo metabox 'galeria'
            if ($attachment_id) {
                $galeria = get_post_meta(get_the_ID(), 'galeria', true);
                $galeria[] = $attachment_id;
                update_post_meta(get_the_ID(), 'galeria', $galeria);
            } else {
                // Registra un mensaje de error si la imagen no se pudo adjuntar
                log_message("Error al adjuntar la imagen ($image_url) a la publicación ID: " . get_the_ID());
            }
        }
    }

    wp_reset_postdata(); // Restablece los datos de la consulta

    // Registra un mensaje de éxito al finalizar el script
    log_message("¡Proceso completado!");
} else {
    // Registra un mensaje si no se encuentran publicaciones para actualizar
    log_message("No se encontraron publicaciones para actualizar.");
}

/**
 * Función para adjuntar una imagen al post desde una URL
 */
function upload_image_from_url($image_url, $post_id) {
    // Guarda la imagen en la biblioteca de medios y obtén el ID del archivo adjunto
    $image_id = media_sideload_image($image_url, $post_id, '', 'id');

    return $image_id;
}

/**
 * Función para registrar mensajes en el archivo de registro
 */
function log_message($message) {
    global $log_file;

    // Formatea el mensaje con la fecha y hora
    $formatted_message = "[" . date("Y-m-d H:i:s") . "] " . $message . "\n";

    // Agrega el mensaje al archivo de registro
    file_put_contents($log_file, $formatted_message, FILE_APPEND);
}
?>
