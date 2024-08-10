<?php

/**
 * Funciones para configurar meta tags y opengraph en el head.
 * Esta función debe primero determinar dónde está parado.
 * Tal vez un switch sea lo más adecuado.
 * Opciones: home, 404, search, category, tag, tax, page, post, archive.
 * En base a eso mostrar cierta información dinámica, estática o por defecto, opengraph u ocultarlos
 * Dinámicos completos: post, archive, page.
 * Dinámicos sólo una parte: search, category, tax, tag.
 * Estáticos o por defecto: home, 404.
 *
 * Dinámicos completos: title, meta deh1ion, meta keywords, imagen destacada particular, resumen/exerpt.
 * Dinámicos sólo una parte: search/category/tag/tax - site title, meta kewords site, imagen particular o por defecto; deh1ion del sitio o particular.
 * Estáticos: site title, site deh1ion, meta keywords site, imagen por defecto.
 *
 * Un selector que averigua dónde estoy parado: ¿dinámico, más o menos; o default?
 * Una funciones que colocan la información en variables de acuerdo a dónde están.
 * El front que mediante el valor de las variables, mostrarán la información en tanto y en cuanto la tengan, de lo contrario no mostrarán nada.
 *
**
 * Obtener el tipo de página actual.
 */
function agregar_informacion_tipo_pagina() {
	// Definir el array asociativo con las condiciones y los mensajes correspondientes.
	$tipos_paginas = [
		'is_home'		=>	'Página de inicio (home)',
		'is_front_page' =>	'Página principal (front page)',
		'is_single'		=>	'Entrada individual (single)',
		'is_page'		=>	'Página estática (page)',
		'is_category'	=>	'Página de categoría (category)',
		'is_tag'		=>	'Página de etiqueta (tag)',
		'is_author'		=>	'Página de autor (author)',
		'is_search'		=>	'Página de búsqueda (search)',
		'is_404'		=>	'Página 404 no encontrada (404)',
		'is_archive'	=>	'Página de archivo (archive)',
	];

	// Iterar sobre el array y verificar cada condición.
	foreach ($tipos_paginas as $condicion => $mensaje) {
		if (call_user_func($condicion)) {
			echo '<script>console.log("' . $mensaje . '");</script>';
			return; // Salir del bucle una vez que se ha encontrado la condición verdadera.
		}
	}

	// Si ninguna condición es verdadera, ejecutar el mensaje por defecto.
	echo '<script>console.log("Otro tipo de página o contenido");</script>';
}

add_action('wp_head', 'agregar_informacion_tipo_pagina');
