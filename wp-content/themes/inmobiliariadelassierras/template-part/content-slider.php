<?php
// El slider
$argumentos = array(
	'post_type'			=>	'page',
	'post_per_page'		=>	10,
	'orderby'			=>	'rand'
);
$slider = new WP_Query($argumentos);
$cantidad_paginas = $slider->post_count;
$contador = 0;

?>

<div class="container-lg">
	<div class="row">
		<div id="slider_home" class="carousel slide" data-bs-ride="false">

		<?php if( $slider->have_posts() ) {

			/* Los indidacores del carrusel */
			?>
			<div class="carousel-indicators">
			<?php while( $slider->have_posts() ) {
			$slider->the_post();
			if( has_post_thumbnail() ) {
				if( $contador == 0 ) { ?>
					<button type="button" data-bs-target="#slider_home" data-bs-slide-to="<?php echo $contador;?>" class="active" aria-current="true" aria-label="<?php the_title();?>"></button>

				<?php } else { ?>
					<button type="button" data-bs-target="#slider_home" data-bs-slide-to="<?php echo $contador;?>" aria-label="<?php the_title();?>"></button>
				<?php }
				$contador = $contador + 1;
				}
			}?>
			</div>
	<?php }
	// Reseteamos la consulta, por las dudas.
	wp_reset_postdata();
	$contador = 0;
	?>
			<div class="carousel-inner">

<?php if( $slider->have_posts() ) {
	while( $slider->have_posts() ) {
		$slider->the_post();
		if( has_post_thumbnail() ) {
			if( $contador == 0 ) {
				echo '<div class="carousel-item active">';
			} else {
				echo '<div class="carousel-item">';
			}

			the_post_thumbnail(
				"custom-thumb-1200-500",
				array(
					"class" => "d-block"
					)
				);
				?>
				<div class="carousel-caption d-none d-md-block">
					<div class="bg-light p-3 text-dark bg-opacity-75">
						<h4 class="text-success h4"><?php the_title();?></h4>
						<hr class="hr" />
						<p><?php the_excerpt()?></p>
					</div>
				</div>
			</div>
		<?php }
		$contador = $contador + 1;
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