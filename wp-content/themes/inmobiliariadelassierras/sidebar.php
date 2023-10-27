<?php
$mensaje_1__imagen		=	of_get_option('mensaje_1__imagen', '');
$mensaje_1__titulo		=	of_get_option('mensaje_1__titulo', '');
$enlace_boton_1			=	of_get_option('enlace_boton_1', '');

$mensaje_2__imagen		=	of_get_option('mensaje_2__imagen', '');
$mensaje_2__titulo		=	of_get_option('mensaje_2__titulo', '');
$enlace_boton_2			=	of_get_option('enlace_boton_2', '');

$mensaje_3__imagen		=	of_get_option('mensaje_3__imagen', '');
$mensaje_3__titulo		=	of_get_option('mensaje_3__titulo', '');
$enlace_boton_3			=	of_get_option('enlace_boton_3', '');

;?>

<aside class="col-12 col-lg-3 bg-white">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-9 col-md-6 col-lg-12 mb-3">
				<div class="card text-bg-light">
					<h5 class="card-header text-center">
						<?php echo $mensaje_1__titulo;?>
					</h5>
					<a href="<?php echo $enlace_boton_1;?>" target="_blank" title="<?php echo $mensaje_1__titulo;?>">
						<img src="<?php echo $mensaje_1__imagen;?>" class="card-img-bottom w-100" alt="<?php echo $mensaje_1__titulo;?>" />
					</a>
				</div>
			</div>

			<div class="col-9 col-md-6 col-lg-12 mb-3">
				<div class="card text-bg-light">
					<h5 class="card-header text-center">
						<?php echo $mensaje_2__titulo;?>
					</h5>
					<a href="<?php echo $enlace_boton_2;?>" target="_blank" title="<?php echo $mensaje_2__titulo;?>">
						<img src="<?php echo $mensaje_2__imagen;?>" class="card-img-bottom w-100" alt="<?php echo $mensaje_2__titulo;?>" />
					</a>
				</div>
			</div>

			<div class="col-9 col-md-6 col-lg-12 mb-3">
				<div class="card text-bg-light">
					<h5 class="card-header text-center">
						<?php echo $mensaje_3__titulo;?>
					</h5>
					<a href="<?php echo $enlace_boton_3;?>" target="_blank" title="<?php echo $mensaje_3__titulo;?>">
						<img src="<?php echo $mensaje_3__imagen;?>" class="card-img-bottom w-100" alt="<?php echo $mensaje_3__titulo;?>" />
					</a>
				</div>
			</div>
		</div>


	</div>
</aside>