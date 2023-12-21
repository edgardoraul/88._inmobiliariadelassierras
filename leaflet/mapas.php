<?php

function enqueue_leaflet_script() {
    global $post;
    if (is_admin() && current_user_can('edit_post', $post->ID)) {
        // Utilizamos la versión 1.9.4 de Leaflet
        wp_enqueue_script('leaflet', get_template_directory_uri() . '/leaflet/dist/leaflet.js', array(), '1.9.4', true);
        wp_enqueue_style('leaflet-css', get_template_directory_uri() . '/leaflet/dist/leaflet.css', array(), '1.9.4');
    }
}



// Agrega el mapa al editor de entradas
function add_map_to_post_editor() {
    // Verifica si se está editando una entrada
    global $post;
    if (is_admin()) {
        ?>
        <div id="map" style="width: 100%; height: 350px;"></div>
        <span id="locateButton" class="button button-primary button-large"><?php _e('Centrar en mi ubicación actual', 'inmobiliariadelassierras'); ?></span>
        <input type="hidden" id="map_location" name="map_location" value="<?php echo esc_attr(get_post_meta($post->ID, '_map_location', true)); ?>">

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var map = L.map('map').setView([0, 0], 13);
                var marker;

                // Obtiene la ubicación guardada en la base de datos o la ubicación actual del usuario
                var savedLocation = [<?php echo get_post_meta($post->ID, '_map_location', true) ?: '0,0'; ?>];
                map.setView(savedLocation, 13);

                // Agrega un marcador en la ubicación guardada
                marker = L.marker(savedLocation).addTo(map);

                // Agrega un evento de clic al mapa para actualizar las coordenadas
                map.on('click', function (e) {
                    if (marker) {
                        map.removeLayer(marker);
                    }

                    marker = L.marker(e.latlng).addTo(map);
                    // Actualiza las coordenadas en un campo oculto
                    jQuery('#map_location').val(e.latlng.lat + ',' + e.latlng.lng);
                    console.log(e);
                });

                // Botón para centrar el mapa en la ubicación actual
                document.getElementById('locateButton').addEventListener('click', function (e) {
                    map.locate({ setView: true, maxZoom: 13 });
                });

                // Actualiza la posición del marcador cuando el usuario se mueve
                map.on('locationfound', function (e) {
                    if (marker) {
                        map.removeLayer(marker);
                    }

                    marker = L.marker(e.latlng).addTo(map);
                    // Actualiza las coordenadas en un campo oculto
                    jQuery('#map_location').val(e.latlng.lat + ',' + e.latlng.lng);
                    console.log(e.latlng.lat + ',' + e.latlng.lng);
                });
            });
        </script>

        <?php
    }
}

add_action('edit_form_after_title', 'add_map_to_post_editor');

// Guarda la ubicación del mapa al guardar una entrada
function save_map_location($post_id) {
    // Verifica si es una entrada y no una guardado automático
    if (get_post_type($post_id) === 'post' && !defined('DOING_AUTOSAVE')) {
        // Guarda la ubicación del mapa
        if (isset($_POST['map_location'])) {
            update_post_meta($post_id, '_map_location', sanitize_text_field($_POST['map_location']));
        }
    }
}
add_action('save_post', 'save_map_location');


function display_map_on_frontend() {
    if (is_single() && get_post_type() === 'post') {
        $map_location = get_post_meta(get_the_ID(), '_map_location', true);

        if (empty($map_location)) {
            $default_location = '[-34.603722, -58.381592]';
            $map_location = get_post_meta(get_the_ID(), '_map_location', true) ?: $default_location;
        }
        ?>
        <div id="map" style="width: 100%; height: 450px;"></div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Asegúrate de que Leaflet esté cargado antes de intentar usarlo
                if (typeof L !== 'undefined') {
                    var map = L.map('map').setView(<?php echo $map_location; ?>, 13);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(map);

                    L.marker(<?php echo $map_location; ?>).addTo(map).bindPopup("<?php _e('Estás aquí', 'inmobiliariadelassierras');?>").openPopup();
                }
            });
        </script>
        <?php
    }
}

add_action('wp_footer', 'display_map_on_frontend');
