<?php
// Incluir el archivo wp-load.php para acceder a las funciones de WordPress
require_once('wp-load.php');

// Activar los mensajes de log
define('WP_DEBUG', true);

// Función para exportar las imágenes asociadas a un post_id
function export_images($post_id) {
    global $wpdb;

    // Obtener el nombre de la entrada
    $post_title = get_the_title($post_id);

    // Directorio de destino para exportar las imágenes
    $export_dir = __DIR__ . "/export/{$post_id}. {$post_title}";

    // Crear el directorio de destino si no existe
    if (!file_exists($export_dir)) {
        if (!mkdir($export_dir, 0777, true)) {
            error_log("No se pudo crear el directorio de exportación: $export_dir");
            return;
        }
        echo "Directorio de exportación creado: $export_dir<br>";
    }

    // Obtener las imágenes asociadas al post_id
    $images = $wpdb->get_results($wpdb->prepare(
        "SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key = '_wp_attached_file' AND meta_value != ''",
        $post_id
    ));

    // Contador de imágenes exportadas
    $exported_images = 0;

    // Total de imágenes a exportar
    $total_images = count($images);

    // Iterar sobre las imágenes y exportarlas
    foreach ($images as $image) {
        $image_path = wp_get_upload_dir()['basedir'] . '/' . $image->meta_value;
        if (file_exists($image_path) && copy($image_path, $export_dir . '/' . basename($image->meta_value))) {
            echo "Imagen exportada: $image_path<br>";
            $exported_images++;
        } else {
            error_log("No se pudo exportar la imagen: $image_path");
        }
    }

    // Mostrar el porcentaje de procesamiento
    if ($total_images > 0) {
        $percentage = ($exported_images / $total_images) * 100;
        echo "Proceso de exportación completado: $exported_images de $total_images imágenes exportadas ($percentage%)<br>";
    } else {
        echo "No se encontraron imágenes para exportar<br>";
    }
}


// Función para importar las imágenes asociadas a un post_id
function import_images($post_id, $source_dir) {
    global $wpdb;

    // Obtener el nombre de la entrada
    $post_title = get_the_title($post_id);

    // Directorio de origen de las imágenes a importar
    $source_dir = rtrim($source_dir, '/');

    // Verificar si el directorio de origen existe
    if (!file_exists($source_dir)) {
        error_log("El directorio de origen no existe: $source_dir");
        return;
    }

    // Obtener las imágenes en el directorio de origen
    $images = glob($source_dir . '/*');

    // Contador de imágenes importadas
    $imported_images = 0;

    // Total de imágenes a importar
    $total_images = count($images);

    // Iterar sobre las imágenes y asociarlas al post_id
    foreach ($images as $image) {
        // Copiar la imagen al directorio de subidas de WordPress
        $new_image_path = wp_upload_dir()['path'] . '/' . basename($image);
        if (copy($image, $new_image_path)) {
            // Obtener la ruta relativa de la imagen
            $relative_path = str_replace(wp_upload_dir()['basedir'] . '/', '', $new_image_path);

            // Insertar la ruta de la imagen en la tabla wp_postmeta
            if ($wpdb->insert($wpdb->postmeta, array(
                'post_id' => $post_id,
                'meta_key' => '_wp_attached_file',
                'meta_value' => $relative_path,
            ))) {
                echo "Imagen importada y asociada al post_id $post_id: $new_image_path<br>";
                $imported_images++;
            } else {
                error_log("No se pudo asociar la imagen al post_id $post_id en la base de datos: $new_image_path");
            }
        } else {
            error_log("No se pudo copiar la imagen al directorio de subidas de WordPress: $image");
        }
    }

    // Mostrar el porcentaje de procesamiento
    if ($total_images > 0) {
        $percentage = ($imported_images / $total_images) * 100;
        echo "Proceso de importación completado: $imported_images de $total_images imágenes importadas y asociadas ($percentage%)<br>";
    } else {
        echo "No se encontraron imágenes para importar<br>";
    }
}

// Uso de las funciones de exportación e importación
$post_id = 8239; // ID de la entrada
export_images($post_id);
// import_images($post_id, '/ruta/al/directorio/de/imagenes');
?>
