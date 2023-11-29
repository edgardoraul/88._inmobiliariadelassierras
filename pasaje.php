<?php
/* // Asegúrate de cargar WordPress
require_once('wp-load.php');

// Obtén las publicaciones que quieres actualizar
$args = array(
	'post_type' => 'post',  // Tipo de publicación
	'posts_per_page' => -1, // -1 para obtener todas las publicaciones
);

$query = new WP_Query($args);

if ($query->have_posts()) {
	while ($query->have_posts()) {
		$query->the_post();

		// Obtén el valor del campo antiguo
		$valor_antiguo = get_post_meta(get_the_ID(), 'et_property_type', true);

		// Actualiza el valor al nuevo campo
		update_post_meta(get_the_ID(), 'propiedad_tipo', $valor_antiguo);
	}

	wp_reset_postdata(); // Restablece los datos de la consulta
}

echo '¡Proceso completado!';
 */


 // Asegúrate de cargar WordPress
 require_once('wp-load.php');

 // Verifica si se envió el formulario
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 // Obtén los valores enviados por el formulario
	 $campo_antiguo = sanitize_text_field($_POST['campo_antiguo']);
	 $campo_nuevo = sanitize_text_field($_POST['campo_nuevo']);

	 // Verifica que ambos campos estén especificados
	 if (!empty($campo_antiguo) && !empty($campo_nuevo)) {
		 // Obtén las publicaciones que quieres actualizar
		 $args = array(
			 'post_type' => 'post',  // Tipo de publicación
			 'posts_per_page' => -1, // -1 para obtener todas las publicaciones
		 );

		 $query = new WP_Query($args);

		 if ($query->have_posts()) {
			 while ($query->have_posts()) {
				 $query->the_post();

				 // Obtén los valores de los campos personalizados específicos
				 $valor_antiguo = get_post_meta(get_the_ID(), $campo_antiguo, true);

				 // Verifica si el campo antiguo tiene un valor antes de transferirlo
				 if ($valor_antiguo !== '') {
					 // Actualiza el valor al nuevo campo
					 update_post_meta(get_the_ID(), $campo_nuevo, $valor_antiguo);
				 }
			 }

			 wp_reset_postdata(); // Restablece los datos de la consulta

			 echo '¡Proceso completado!';
		 } else {
			 echo 'No se encontraron publicaciones para actualizar.';
		 }
	 } else {
		 echo 'Por favor, especifica ambos campos.';
	 }
 }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
	 <meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <title>Reemplazar Campos Personalizados</title>
 </head>
 <body>
	 <h2>Reemplazar Campos Personalizados</h2>

	 <form method="post" action="">
		 <label for="campo_antiguo">Campo Antiguo:</label>
		 <input type="text" name="campo_antiguo" required>

		 <label for="campo_nuevo">Campo Nuevo:</label>
		 <input type="text" name="campo_nuevo" required>

		 <button type="submit">Reemplazar</button>
	 </form>
 </body>
 </html>
