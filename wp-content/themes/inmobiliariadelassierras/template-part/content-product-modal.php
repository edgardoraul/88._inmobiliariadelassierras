<div class="container d-none" id="modal_img_full">
	<div class="figure">
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
					$img_sizes = wp_get_attachment_image_sizes($image['ID'], 'full');

					if( $contador == 0 ) {
						echo "<div class='carousel-item active figure-img img-thumbnail rounded'><img class='d-block w-100' src='{$image['url']}' srcset='{$img_srcset}' sizes='{$img_sizes}' alt='" . get_the_title() . "' /></div>";
					} else {
						echo "<div class='carousel-item figure-img img-thumbnail rounded'><img class='d-block w-100' src='{$image['url']}' srcset='{$img_srcset}' sizes='{$img_sizes}' alt='" . get_the_title() . "' /></div>";
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

	</div>
</div>