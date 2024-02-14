<?php
// Función para exportar enlaces de imágenes de entradas con metabox a un archivo CSV
function exportar_enlaces_imagenes($nombre_archivo_csv) {
    global $wpdb;

    // Obtener todas las entradas que tienen el metabox 'thumbs' con imágenes
    $query = "SELECT p.ID, p.post_title, m.meta_value
              FROM {$wpdb->prefix}posts p
              INNER JOIN {$wpdb->prefix}postmeta m ON p.ID = m.post_id
              WHERE p.post_type = 'post'
              AND p.post_status = 'publish'
              AND m.meta_key = 'thumbs'";

    $resultados = $wpdb->get_results($query);

    if (!empty($resultados)) {
        // Crear el archivo CSV
        $archivo_csv = fopen($nombre_archivo_csv, 'w');

        // Escribir encabezados de columna
        fputcsv($archivo_csv, array('ID de la entrada', 'Nombre de la entrada', 'Enlace de la imagen'));

        // Iterar sobre los resultados y escribir en el archivo CSV
        foreach ($resultados as $resultado) {
            // Obtener la información de la entrada y del enlace de la imagen
            $id_entrada = $resultado->ID;
            $nombre_entrada = $resultado->post_title;
            $enlace_imagen = $resultado->meta_value;

            // Escribir en el archivo CSV
            fputcsv($archivo_csv, array($id_entrada, $nombre_entrada, $enlace_imagen));
        }

        // Cerrar el archivo CSV
        fclose($archivo_csv);

        return true; // Éxito
    } else {
        return false; // No se encontraron resultados
    }
}

// Función para crear una carpeta con el nombre de la entrada y guardar las imágenes
function descargar_imagenes($nombre_carpeta, $datos_imagenes) {
    // Ruta completa de la carpeta de destino
    $ruta_carpeta = $nombre_carpeta . '/';

    // Crear la carpeta si no existe
    if (!file_exists($ruta_carpeta)) {
        mkdir($ruta_carpeta, 0777, true); // Se asignan todos los permisos
    }

    // Iterar sobre los datos de las imágenes y descargarlas
    foreach ($datos_imagenes as $imagen) {
        // Obtener los datos de la imagen
        $id_entrada = $imagen[0];
        $nombre_entrada = $imagen[1];
        $enlace_imagen = $imagen[2];

        // Obtener el nombre del archivo de la imagen
        $nombre_archivo = basename($enlace_imagen);

        // Descargar la imagen y guardarla en la carpeta de destino
        file_put_contents($ruta_carpeta . $nombre_archivo, file_get_contents($enlace_imagen));
    }
}

// Solicitar la carpeta de destino al usuario
echo "Por favor, ingresa la ruta completa de la carpeta donde deseas guardar el archivo CSV y las imágenes: ";
$nombre_carpeta_destino = trim(fgets(STDIN));

// Nombre del archivo CSV
$nombre_archivo_csv = $nombre_carpeta_destino . '/listado_imagenes.csv';

// Exportar enlaces de imágenes a un archivo CSV
if (exportar_enlaces_imagenes($nombre_archivo_csv)) {
    echo "El archivo CSV se ha creado con éxito en la carpeta especificada.\n";

    // Crear la carpeta y guardar las imágenes
    descargar_imagenes($nombre_carpeta_destino, file($nombre_archivo_csv, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
} else {
    echo "No se encontraron entradas con imágenes en el metabox 'thumbs'.\n";
}
?>
