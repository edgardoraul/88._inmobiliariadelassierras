<?php
// Asegúrate de cargar WordPress
require_once('wp-load.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

// Función de depuración
function my_debug_function($message) {
    error_log($message);
}

// Verifica si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los valores enviados por el formulario
    $campo_personalizado = sanitize_text_field($_POST['campo_personalizado']);

    // Verifica que el campo personalizado esté especificado
    if (!empty($campo_personalizado)) {
        // Obtén las publicaciones que quieres actualizar
        $args = array(
            'post_type' => 'post',  // Tipo de publicación
            'posts_per_page' => -1, // -1 para obtener todas las publicaciones
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                my_debug_function("Procesando entrada: " . get_the_title());

                // Obtén el valor del campo personalizado
                $valor_campo = get_post_meta(get_the_ID(), $campo_personalizado, true);

                // Verifica si el campo personalizado tiene un valor antes de transferirlo
                if (!empty($valor_campo)) {
                    my_debug_function("Campo personalizado encontrado: " . $valor_campo);

                    // Intenta cargar la imagen desde la URL
                    $image_url = $valor_campo;
                    $upload_dir = wp_upload_dir();
                    $image_data = file_get_contents($image_url);

                    if ($image_data !== false) {
                        $filename = pathinfo($image_url, PATHINFO_BASENAME);
						$solonombre = pathinfo($image_url, PATHINFO_FILENAME);
                        $filetype = wp_check_filetype($filename, null);


                        // Guarda la imagen en el directorio de subidas
                        $new_file_path = $upload_dir['path'] . '/' .  $filename;
                    	file_put_contents($new_file_path, $image_data);

                        // Adjunta la imagen como miniatura
                        $attachment_id = wp_insert_attachment(array(
                            'guid'           => $new_file_path,
                            'post_mime_type' => $filetype['type'],
                            'post_title'     => $solonombre,
                            'post_content'   => '',
                            'post_status'    => 'inherit'
                        ), $new_file_path);

                        if (!is_wp_error($attachment_id)) {
                            my_debug_function("Imagen destacada establecida con ID: " . $attachment_id);

                            // Establece la imagen como miniatura
                            set_post_thumbnail(get_the_ID(), $attachment_id);

                            // Genera todas las miniaturas correspondientes
                            $metadata = wp_generate_attachment_metadata($attachment_id, $new_file_path);
                            wp_update_attachment_metadata($attachment_id, $metadata);

                            my_debug_function("Miniaturas generadas con éxito.");
                        } else {
                            my_debug_function("Error al establecer la imagen destacada: " . $attachment_id->get_error_message());
                        }
                    } else {
                        my_debug_function("Error al cargar la imagen desde la URL.");
                    }
                } else {
                    my_debug_function("Campo personalizado vacío para esta entrada.");
                }
            }

            wp_reset_postdata(); // Restablece los datos de la consulta

            echo '¡Proceso completado!';
        } else {
            echo 'No se encontraron publicaciones para actualizar.';
        }
    } else {
        echo 'Por favor, especifica el campo personalizado.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferir a Miniatura y Generar Miniaturas</title>
</head>
<body>
    <h2>Transferir a Miniatura y Generar Miniaturas</h2>

    <form method="post" action="">
        <label for="campo_personalizado">Campo Personalizado (URL de la Imagen):</label>
        <input type="text" name="campo_personalizado" required>

        <button type="submit">Transferir y Generar Miniaturas</button>
    </form>
</body>
</html>
