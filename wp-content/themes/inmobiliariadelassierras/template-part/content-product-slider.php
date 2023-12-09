<?php
if( wp_is_mobile() ) {
	$galeria = rwmb_meta('galeria', 'size=custom-thumb-1200-x');
} else {
	$galeria = rwmb_meta('galeria', 'size=custom-thumb-400-300');
}
$contador = 0;
$contador2 = 0;

$precio = rwmb_meta('precio', '');

?>
<div class="col-12 col-sm-6 my-3">
	<div class="container">
		<div class="figure position-relative mb-5">
			<!-- El slider de las fotos -->
			<?php if( $galeria ) { ?>

			<div id="carouselExampleIndicators" class="carousel slide">
				<div class="carousel-indicators">
					<?php foreach($galeria as $image) {
						if($contador2 == 0) { ?>
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $contador2; ?>" class="active" aria-current="true" aria-label="<?php echo 'Fotograma ' . $contador2; ?>"></button>

						<?php } else { ?>

							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $contador2; ?>" aria-label="<?php echo 'Fotograma ' . $contador2; ?>"></button>

						<?php }
						$contador2 = $contador2 + 1;
					}?>
				</div>

				<div class="carousel-inner">
					<?php foreach ( $galeria as $image ) {
						$img_srcset = wp_get_attachment_image_srcset($image['ID'], 'full');
						$img_sizes = wp_get_attachment_image_sizes($image['ID'], 'custom-thumb-600-400');

						if( $contador == 0 ) {
							echo "<div class='carousel-item active figure-img img-thumbnail rounded'><a data-bs-toggle='modal' data-bs-target='#modal_img_full' href=''><img class='d-block w-100' src='{$image['url']}' srcset='{$img_srcset}' sizes='{$img_sizes}' alt='" . get_the_title() . "' /></a></div>";

						} else {
							echo "<div class='carousel-item figure-img img-thumbnail rounded'><a data-bs-toggle='modal' data-bs-target='#modal_img_full' href=''><img class='d-block w-100' src='{$image['url']}' srcset='{$img_srcset}' sizes='{$img_sizes}' alt='" . get_the_title() . "' /></a></div>";
						}
						echo $contador = $contador + 1;
					}?>
				</div>

				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden"><?php _e('Atrás', 'inmobiliariadelassierras');?></span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden"><?php _e('Adelante', 'inmobiliariadelassierras');?></span>
				</button>

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