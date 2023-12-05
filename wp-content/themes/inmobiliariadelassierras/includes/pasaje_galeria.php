<?php
// Asegúrate de que las clases RWMB necesarias estén disponibles
if ( class_exists( 'RWMB_Core' ) && class_exists( 'RWMB_File_Advanced_Field' ) ) {

    // Obtén todas las cajas meta registradas
    $meta_boxes = RWMB_Core::get_meta_boxes();

    // Itera sobre cada caja meta
    foreach ( $meta_boxes as $meta_box ) {

        // Comprueba si es la antigua caja meta "thumbs"
        if ( isset( $meta_box['id'] ) && $meta_box['id'] === 'thumbs' ) {

            // Obtiene el ID del campo de archivo antiguo
            $old_field_id = 'thumbs_field';

            // Obtiene el ID del nuevo campo de archivo
            $new_field_id = 'new_thumbs_field';

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
                    update_post_meta( $post->ID, $new_field_id, $old_value );
                }
            }

            // Opcional: elimina el antiguo campo meta "thumbs" si ya no lo necesitas
            // foreach ( $posts as $post ) {
            //     delete_post_meta( $post->ID, $old_field_id );
            // }
        }
    }
}
