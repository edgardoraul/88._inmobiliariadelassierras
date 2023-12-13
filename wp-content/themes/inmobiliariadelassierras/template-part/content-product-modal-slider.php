<div class="container">
	<div class="figure">
		<!-- El slider de las fotos -->
		<?php
		$galeria2 = rwmb_meta('galeria', 'size=custom-thumb-1360-780');
		$contador3 = 0;
		$contador4 = 0;
		if( $galeria2 ) { ?>

		<div id="slider_carrousel" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<!-- El botón activo para la thumbnail principal -->
				<button type="button" data-bs-target="#slider_carrousel" data-bs-slide-to="<?php echo $contador4; ?>" class="active" aria-current="true" aria-label="<?php echo 'Fotograma ' . $contador4; ?>"></button>

				<!-- El loop para el resto de la galería -->
				<?php foreach($galeria2 as $image) {
					$contador4 = $contador4 + 1;?>

					<button type="button" data-bs-target="#slider_carrousel" data-bs-slide-to="<?php echo $contador4; ?>" aria-label="<?php echo 'Fotograma ' . $contador4; ?>"></button>

				<?php }?>
			</div>

			<div class="carousel-inner">
				<?php
				// La imagen principal grande
				echo "<div class='carousel-item active'>";
				the_post_thumbnail('custom-thumb-1360-780', array('class' => 'd-block w-100'));;
				echo "</div>";


				foreach ( $galeria2 as $image ) {
					$img_srcset = wp_get_attachment_image_srcset($image['ID'], 'custom-thumb-1360-780');
					$img_sizes = wp_get_attachment_image_sizes($image['ID'], 'custom-thumb-1360-780');

					echo $contador3 = $contador3 + 1;
					echo "<div class='carousel-item'><img class='d-block w-100' src='{$image['url']}' srcset='{$img_srcset}' sizes='{$img_sizes}' alt='" . get_the_title() . "' /></div>";

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