<?php

$galeria = rwmb_meta('galeria', 'size=large');
$contador = 0;
$contador2 = 0;

$precio = rwmb_meta('precio', '');

?>
<div class="col-12 col-sm-6 my-3">
	<div class="container">
		<div class="figure position-relative mb-5">
			<!-- El slider de las fotos -->
			<?php if( has_post_thumbnail() ) { ?>

			<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-indicators">

					<?php // Botón activo de la primera imagen. Sólo tiene sentido si hay más una imagen
					if($galeria) { ?>

					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $contador2; ?>" class="active" aria-current="true" aria-label="<?php echo 'Fotograma ' . $contador2; ?>"></button>

					<?php }?>

					<?php foreach($galeria as $image) {
						$contador2 = $contador2 + 1; ?>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $contador2; ?>" aria-label="<?php echo 'Fotograma ' . $contador2; ?>"></button>

					<?php }?>
				</div>

				<div class="carousel-inner">
					<?php // La imagen post thumbnail principal
					echo "<div class='carousel-item active figure-img img-thumbnail rounded'>";
					// echo "<a data-bs-toggle='modal' data-bs-target='#modal_img_full' href=''>";
					echo "<a class='swipebox' href='" . get_the_post_thumbnail_url() . "' title='".get_the_title()."'>";
					the_post_thumbnail('custom-thumb-600-400', array('class' => 'd-block w-100'));
					echo "</a></div>";


					// El bucle que recorre el resto de las imágenes
					if( $galeria ) {
						foreach ( $galeria as $image ) {

							$img_srcset = wp_get_attachment_image_srcset($image['ID'], 'large');
							$img_sizes = wp_get_attachment_image_sizes($image['ID'], 'large');
							$img_src = wp_get_attachment_image_src($image['ID'], 'custom-thumb-600-400');

							echo "
								<div class='carousel-item figure-img img-thumbnail rounded'>
									<a class='swipebox' href='{$image['url']}' title='".get_the_title()."'>
										<img class='d-block w-100' src='{$img_src[0]}' alt='".get_the_title()."' />
									</a>
								</div>";
						}
					}?>
				</div>

				<?php // Botones de navegación. Sólo tiene sentido si hay más una imagen
				if($galeria) { ?>

				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden"><?php _e('Atrás', 'inmobiliariadelassierras');?></span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden"><?php _e('Adelante', 'inmobiliariadelassierras');?></span>
				</button>

				<?php }?>
			</div>

			<?php } else {
				sin_imagen2();
			};?>

			<!-- Botón del Precio -->
			<!-- <div class="position-absolute top-100 start-50 translate-middle"> -->
			<div class="text-center">
				<button class="btn btn-dark btn-lg" disabled="disabled">
					<?php if($precio) {
						echo '<span class="text-uppercase">' . $precio . '</span>';
					} else {
						_e('Consultar', 'inmobiliariadelassierras');
					}?>
				</button>
			</div><!-- /Precio -->
		</div>
	</div>
</div>