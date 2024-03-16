<?php
// El slider
$argumentos = array(
	'post_type'			=>	'pt_carrusel',
	'post_per_page'		=>	-1,
	'orderby'			=>	'date'
);
$slider = new WP_Query($argumentos);

$contador = 0;

?>

<div class="container-xxl">
	<div class="row">
		<div id="slider_home" class="carousel slide" data-bs-ride="false">


	<?php
	// Reseteamos la consulta, por las dudas.
	wp_reset_postdata();
	$contador2 = 0;
	?>
			<div class="carousel-inner">

<?php if( $slider->have_posts() ) {
	while( $slider->have_posts() ) {
		$slider->the_post();
		if( has_post_thumbnail() ) {
			if( $contador2 == 0 ) {
				echo '<div class="carousel-item active">';
			} else {
				echo '<div class="carousel-item">';
			}
			if ( has_post_thumbnail() ) {
				if(wp_is_mobile()) {
					the_post_thumbnail(
						"custom-thumb-900-333",
						array( "class" => "d-block img-thumbnail" )
					);
				} else {
					the_post_thumbnail(
						"custom-thumb-2400-450",
						array( "class" => "d-block img-thumbnail" )
					);
				}
			} else {
				// Nada, carajo!
				sin_imagen2();
			}
			?>
				<div class="carousel-caption d-none d-md-block">
					<h4 class="text-white fs-1 fw-bold"><?php the_title();?></h4>
				</div>
			</div>
		<?php }
		$contador2 = $contador2 + 1;
	}
}?>
				</div>

				<button class="carousel-control-prev" type="button" data-bs-target="#slider_home" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden"><?php _e('Previo', 'inmobiliariadelassierras')?></span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#slider_home" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden"><?php _e('Siguiente', 'inmobiliariadelassierras')?></span>
				</button>

			</div>
<?php // Reseteamos la consulta, por las dudas.
wp_reset_postdata();
?>
	</div>
</div>