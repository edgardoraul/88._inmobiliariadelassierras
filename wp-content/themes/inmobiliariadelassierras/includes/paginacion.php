<?php // Paginación avanzada
function pagination( $pages = '', $range = 3 )
{
	$pagina_palabra			= __('Página', 'inmobiliariadelassierras');
	$de_palabra				= __('de', 'inmobiliariadelassierras');
	$primero				= __('Primero', 'inmobiliariadelassierras');
	$atras					= __('Atrás', 'inmobiliariadelassierras');
	$siguiente				= __('Siguiente', 'inmobiliariadelassierras');
	$ultimo					= __('Último', 'inmobiliariadelassierras');
	$showitems				= ( $range * 2 ) + 1;
	global $paged;
	if( empty( $paged ) ) $paged = 1;
	if( $pages == '' )
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if( !$pages )
		{
			$pages = 1;
		}
	}
	if( 1 != $pages )
	{
		echo '<nav><ul class="pagination justify-content-center">';
		echo '<li class="page-item"><span class="page-link link-success">' . $pagina_palabra . ' ' . $paged . ' ' . $de_palabra . ' ' . $pages . '</span></li>';

		if( $paged > 2 && $paged > $range+1 && $showitems < $pages )
		{
			echo '<li class="page-item">';
			echo '<a class="page-link link-success" href="' . get_pagenum_link(1) . '" title="' . $primero . '">'.$primero.'</a>';
			echo '</li>';
		}

		if( $paged > 1 && $showitems < $pages )
		{
			echo '<li class="page-item">';
			echo '<a class="page-link link-success" rel="previous" title="' . $atras . '" href="' . get_pagenum_link( $paged - 1 ) . '">'.$atras.'</a>';
			echo '</li>';
		}

		for ( $i = 1; $i <= $pages; $i++ )
		{
			if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) )
			{
				echo ( $paged == $i )? '<li class="page-item active disabled" aria-current="page"><a href="' . get_pagenum_link($i) . '" class="page-link link-success " title="' . $i . '">' . $i . '</a></li>':'<li class="page-item"><a href="' . get_pagenum_link($i) . '" class="page-link link-success " title="' . $i . '">'. $i . '</a></li>';
			}
		}
		if ( $paged < $pages && $showitems < $pages )
		{
			echo '<li class="page-item">';
			echo '<a class="page-link link-success" rel="next" title="' . $siguiente . '" href="' . get_pagenum_link( $paged + 1 ) . '">'.$siguiente.'</a>';
			echo '</li>';
		}

		if ( $paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages )
		{
			echo '<li class="page-item">';
			echo '<a class="page-link link-success" title="' . $ultimo . '" href="' . get_pagenum_link( $pages ) . '">'.$ultimo.'</a>';
			echo '</li>';
		}
		echo "</ul></nav>";
	};
};
?>