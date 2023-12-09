<?php
// Asegúrate de que las clases RWMB necesarias estén disponibles
if ( class_exists( 'RWMB_Core' ) && class_exists( 'RWMB_File_Advanced_Field' ) ) {

    // Función para registrar mensajes detallados en un archivo de log
    function custom_log( $message ) {
        $log_file = WP_CONTENT_DIR . '/migration_log.txt';
        error_log( date( 'Y-m-d H:i:s' ) . ' - ' . $message . PHP_EOL, 3, $log_file );
    }

    custom_log( 'Inicio del proceso de migración.' );

    // Obtén todas las cajas meta registradas
    $meta_boxes = RWMB_Core::get_meta_boxes();

    // Itera sobre cada caja meta
    foreach ( $meta_boxes as $meta_box ) {

        // Comprueba si es la antigua caja meta "thumbs"
        if ( isset( $meta_box['id'] ) && $meta_box['id'] === 'thumbs' ) {

            // Obtiene el ID del campo de galería antiguo
            $old_field_id = 'thumbs';

            // Obtiene el ID del nuevo campo de galería
            $new_field_id = 'galeria';

            // Obtén todas las entradas (posts) donde se ha utilizado la antigua caja meta "thumbs"
            $posts = get_posts( array(
                'post_type'   => 'any',  // Ajusta esto según tus necesidades
                'numberposts' => -1,
                'meta_key'    => $old_field_id,
            ) );

            // Itera sobre cada entrada y copia el valor del antiguo campo al nuevo
            foreach ( $posts as $post ) {
                $old_value = get_post_meta( $post->ID, $old_field_id, true );

                // Guarda el valor en el nuevo campo
                if ( ! empty( $old_value ) ) {
                    // Aquí usamos wp_get_attachment_image para obtener la etiqueta de imagen
                    $new_value = wp_get_attachment_image( $old_value, 'full' );
                    update_post_meta( $post->ID, $new_field_id, $new_value );
                    custom_log( "Migrado de post {$post->ID}: $old_field_id -> $new_field_id" );
                }
            }

            custom_log( 'Migración completa.' );

            // Opcional: elimina el antiguo campo meta "thumbs" si ya no lo necesitas
            // foreach ( $posts as $post ) {
            //     delete_post_meta( $post->ID, $old_field_id );
            // }
        }
    }
}
