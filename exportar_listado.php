<?php
define('ABSPATH', dirname(__FILE__) . '/');
// Función para obtener los datos y generar el archivo CSV
function exportar_enlaces_imagenes() {
    // Incluir WordPress
    require_once(ABSPATH . 'wp-load.php');

    // Consulta para obtener las entradas que tienen el campo 'thumbs'
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1, // Obtener todas las entradas
        'meta_query' => array(
            array(
                'key' => 'thumbs', // Nombre del campo personalizado
                'compare' => 'EXISTS' // Verificar si el campo existe
            )
        )
    );
    $query = new WP_Query($args);

    // Crear archivo CSV
    $archivo_csv = fopen('enlaces_imagenes.csv', 'w');

    // Escribir encabezados en el archivo CSV
    fputcsv($archivo_csv, array('ID de la Entrada', 'Nombre del Campo', 'Enlace de la Imagen'));

    // Loop a través de las entradas y escribir los datos en el archivo CSV
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $id_entrada = get_the_ID();
            $enlaces_imagenes = get_post_meta($id_entrada, 'thumbs', true);

            if (!empty($enlaces_imagenes) && is_array($enlaces_imagenes)) {
                foreach ($enlaces_imagenes as $indice => $enlace) {
                    fputcsv($archivo_csv, array($id_entrada, 'thumbs['.$indice.']', $enlace));
                }
            }
        }
        wp_reset_postdata();
    }

    // Cerrar el archivo CSV
    fclose($archivo_csv);

    // Descargar el archivo CSV
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename=enlaces_imagenes.csv');
    readfile('enlaces_imagenes.csv');
    exit();
}

// Llamar a la función para exportar los enlaces a imágenes
exportar_enlaces_imagenes();
