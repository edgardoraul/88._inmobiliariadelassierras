<?php
$galeria = rwmb_meta('galeria', 'size=custom-thumb-400-300');
$galeria_cant = count($galeria);
echo $galeria_cant;
$contador = 0;

$video = rwmb_meta('video', '');

$precio = rwmb_meta('precio', '');
// $precio_ar = rwmb_meta('precio_ar', '');
// echo var_dump($galeria);
?>
<div class="col-12 col-sm-6 my-3">
	<div class="">
		<div class="figure position-relative">
			<!-- El slider de las fotos -->
			<?php if( has_post_thumbnail() ) {
				// the_post_thumbnail('custom-thumb-600-x', array('class' => 'figure-img img-thumbnail rounded'));
				?>

			<div id="carouselExampleIndicators" class="carousel slide">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
				</div>
				
				<div class="carousel-inner">
					<?php foreach ( $galeria as $image ) {
						if($contador == 0) {
							echo "<div class='carousel-item active figure-img img-thumbnail rounded'><img class='d-block w-100' src='{$image['url']}' alt='" . get_the_title() . "' /></div>";
						} else {
							echo "<div class='carousel-item figure-img img-thumbnail rounded'><img class='d-block w-100' src='{$image['url']}' alt='" . get_the_title() . "' /></div>";
						}
						$contador = $contador + 1;
					}?>


				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
				</div>
			</div>

			<?php } else {
				echo '<img src="' . get_stylesheet_directory_uri() . '/img/img.png" alt="img" class="figure-img img-thumbnail rounded" />';
			};?>

			<!-- Botón del Precio -->
			<div class="position-absolute top-100 start-50 translate-middle">
				<?php if($precio) { ?>
					<button class="btn btn-warning btn-lg" id="modal-product">
						<?php echo '<span class="text-uppercase">' . $precio . '</span>';?>
					</button>
				<?php }?>
			</div><!-- /Precio -->
		</div>
	</div>
</div>