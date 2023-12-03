<?php
// Asegúrate de cargar WordPress
require_once('wp-load.php');

// Ruta al archivo de registro
$log_file = __DIR__ . '/metabox_migration_log.log';

// Inicia el archivo de registro con un mensaje de inicio de ejecución
log_message("Inicio del script");

// Carga el archivo media.php para que se pueda usar media_sideload_image()
require_once ABSPATH . 'wp-admin/includes/media.php';

// Obtén todas las publicaciones de tipo 'post'
$args = array(
    'post_type'      => 'post',
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

        // Verifica si hay imágenes para procesar
        if (!empty($thumbs)) {
            // Inicializa un array para almacenar las nuevas ID de medios
            $gallery_images = array();

            // Procesa cada imagen
            foreach ($thumbs as $thumb) {
                $image_id = upload_image_from_url($thumb, get_the_ID());

                // Verifica si la carga de la imagen fue exitosa
                if ($image_id) {
                    $gallery_images[] = $image_id;
                }
            }

            // Actualiza el campo personalizado 'galeria'
            update_post_meta(get_the_ID(), 'galeria', $gallery_images);
        }
    }

    wp_reset_postdata(); // Restablece los datos de la consulta

    log_message('Proceso completado');
} else {
    log_message('No se encontraron publicaciones para actualizar.');
}

// Función para cargar una imagen desde una URL y devolver la ID de la imagen
function upload_image_from_url($image_url, $post_id) {
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_url);
    $filename   = basename($image_url);

    if (wp_mkdir_p($upload_dir['path'])) {
        $file = $upload_dir['path'] . '/' . $filename;
    } else {
        $file = $upload_dir['basedir'] . '/' . $filename;
    }

    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null);
    $attachment  = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title'     => sanitize_file_name($filename),
        'post_content'   => '',
        'post_status'    => 'inherit',
    );

    $attach_id = wp_insert_attachment($attachment, $file, $post_id);
    require_once ABSPATH . 'wp-admin/includes/image.php';
    $attach_data = wp_generate_attachment_metadata($attach_id, $file);
    wp_update_attachment_metadata($attach_id, $attach_data);

    return $attach_id;
}

// Función para registrar mensajes en un archivo de registro
function log_message($message) {
    global $log_file;
    $timestamp = current_time('mysql');
    $log_entry = "[$timestamp] $message" . PHP_EOL;
    error_log($log_entry, 3, $log_file);
}
?>
