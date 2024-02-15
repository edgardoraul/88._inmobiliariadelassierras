<?php
// Incluir el archivo wp-load.php para acceder a las funciones de WordPress
require_once('wp-load.php');

// Función para exportar imágenes desde la galería
function export_images_from_gallery($post_id, $post_title) {
    // Crear el nombre de la carpeta
    $folder_name = $post_id . '. ' . $post_title;
    
    // Crear la carpeta en el directorio local
    $folder_path = ABSPATH . '/imagenes_a_exportar_prueba/' . $folder_name;
    mkdir($folder_path);
    
    // Obtener las imágenes asociadas al campo de la galería
    $images = get_post_meta($post_id, 'galeria', true);
    // Debug: Imprimir el resultado de get_post_meta()
    var_dump($images);
    
    // Descargar las imágenes a la carpeta local
    foreach ($images as $image_id) {
        $image_url = wp_get_attachment_url($image_id);
        $image_path = $folder_path . '/' . basename($image_url);
        file_put_contents($image_path, file_get_contents($image_url));
    }
}

// Función para importar imágenes a la galería
function import_images_to_gallery($folder_path) {
    // Obtener el ID de la entrada desde el nombre de la carpeta
    $folder_name = basename($folder_path);
    $parts = explode(' ', $folder_name);
    $post_id = $parts[0];
    
    // Obtener las imágenes en la carpeta local
    $image_files = glob($folder_path . '/*');
    
    // Importar las imágenes a la galería
    foreach ($image_files as $image_file) {
        $image_id = wp_insert_attachment(array(
            'post_title' => basename($image_file),
            'post_content' => '',
            'post_status' => 'inherit',
            'post_mime_type' => mime_content_type($image_file),
            'guid' => $image_file
        ), $image_file, $post_id);
        
        // Agregar la imagen al campo de la galería
        $gallery_images = get_post_meta($post_id, 'galeria', true);
        $gallery_images[] = $image_id;
        update_post_meta($post_id, 'galeria', $gallery_images);
    }
}

// Ejemplo de uso: Exportar imágenes desde la galería de una entrada con ID 123
export_images_from_gallery(8239, 'C07 - 119 HAS de CAMPO GANADERO EN SAN CARLOS MINA');

// Ejemplo de uso: Importar imágenes a la galería de una entrada desde una carpeta local
//import_images_to_gallery('/ruta/a/tu/carpeta/123 Nombre de la entrada');
?>
