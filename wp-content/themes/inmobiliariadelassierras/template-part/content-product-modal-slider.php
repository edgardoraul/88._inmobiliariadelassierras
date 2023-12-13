<div class="container">
	<div class="figure">
		<!-- El slider de las fotos -->
		<?php
		$galeria2 = rwmb_meta('galeria', 'size=full');
		$contador3 = 0;
		$contador4 = 0;
		if( $galeria2 ) { ?>

		<div id="slider_carrousel" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<?php foreach($galeria2 as $image) {
					if($contador4 == 0) { ?>
						<button type="button" data-bs-target="#slider_carrousel" data-bs-slide-to="<?php echo $contador4; ?>" class="active" aria-current="true" aria-label="<?php echo 'Fotograma ' . $contador4; ?>"></button>

					<?php } else { ?>

						<button type="button" data-bs-target="#slider_carrousel" data-bs-slide-to="<?php echo $contador4; ?>" aria-label="<?php echo 'Fotograma ' . $contador4; ?>"></button>

					<?php }
					$contador4 = $contador4 + 1;
				}?>
			</div>

			<div class="carousel-inner">
				<?php foreach ( $galeria2 as $image ) {
					$img_srcset = wp_get_attachment_image_srcset($image['ID'], 'full');
					$img_sizes = wp_get_attachment_image_sizes($image['ID'], 'full');

					if( $contador3 == 0 ) {
						echo "<div class='carousel-item active'><img class='d-block w-100' src='{$image['url']}' srcset='{$img_srcset}' sizes='{$img_sizes}' alt='" . get_the_title() . "' /></div>";
					} else {
						echo "<div class='carousel-item'><img class='d-block w-100' src='{$image['url']}' srcset='{$img_srcset}' sizes='{$img_sizes}' alt='" . get_the_title() . "' /></div>";
					}
					echo $contador3 = $contador3 + 1;
				}?>
			</div>

			<button class="carousel-control-prev" type="button" data-bs-target="#slider_carrousel" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden"><?php _e('Atrás', 'inmobiliariadelassierras');?></span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#slider_carrousel" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden"><?php _e('Adelante', 'inmobiliariadelassierras');?></span>
			</button>

		</div>

		<?php } else {
			sin_imagen2();
		};?>

	</div>
</div>