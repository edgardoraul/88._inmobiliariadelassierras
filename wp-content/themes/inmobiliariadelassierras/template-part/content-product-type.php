<?php
// Las variables a utilizar
$propiedad_tipo = rwmb_meta('propiedad_tipo', '');

// Todas las categorías
$cats = get_the_category();
// Se elige la primera
// $propiedad_tipo = $cats[0]->name;



$ambiente = rwmb_meta('ambiente', '');
$toilette = rwmb_meta('toilette', '');
$cochera = rwmb_meta('cochera', '');
$superficie = rwmb_meta('superficie', '');
$superficie_ha = rwmb_meta('superficie_ha', '');

$inmobiliariadelassierras_meta_keywords = rwmb_meta('inmobiliariadelassierras_meta_keywords', '');
$inmobiliariadelassierras_descripcion = rwmb_meta('inmobiliariadelassierras_descripcion', '');

?>


<ul class="list-group list-group-flush">
	<?php if($propiedad_tipo) { ?>
		<li class="list-group-item">
			<!-- <i class="bi bi-building-fill"></i> -->
			<?php // echo '<span class="badge bg-success">' . __('Tipo de propiedad', 'inmobiliariadelassierras') . '</span>';?>
			<!-- <h4>Tipo de propiedad</h4> -->
			<h5 class="alert alert-secondary text-center">
			<?php echo '<strong class="text-uppercase">'. $propiedad_tipo . '</strong>';?>
			</h5>
		</li>
	<?php }?>

	<?php if($ambiente) { ?>
		<li class="list-group-item">
			<i class="bi bi-house-gear"></i>
			<?php echo '<span class="badge bg-success">' . __('  Ambientes', 'inmobiliariadelassierras') . '</span>';
			echo '<strong class="float-end">'. $ambiente . '</strong>';?>
		</li>
	<?php }?>

	<?php if($toilette) { ?>
		<li class="list-group-item">
			<i class="bi bi-water"> </i>
			<?php echo '<span class="badge bg-success">' . __('  Baños', 'inmobiliariadelassierras') . '</span>';
			echo '<strong class="float-end">'. $toilette . '</strong>';?>
		</li>
	<?php }?>

	<?php if($superficie) { ?>
		<li class="list-group-item">
			<i class="bi bi-rulers"></i>
			<?php echo '<span class="badge bg-success">' . __('	Superficie', 'inmobiliariadelassierras') . '</span>';
			echo '<strong class="float-end">'. $superficie .' M<sup>2</sup></strong>';?>
		</li>
	<?php }?>

	<?php if($superficie_ha) { ?>
		<li class="list-group-item">
			<i class="bi bi-rulers"></i>
			<?php echo '<span class="badge bg-success">' . __('	Superficie', 'inmobiliariadelassierras') . '</span>';
			echo '<strong class="float-end">'. $superficie_ha . __(' Hectáreas', 'inmobiliariadelassierras') . '</strong>';?>
		</li>
	<?php }?>



	<?php if($cochera) { ?>
		<li class="list-group-item">
			<i class="bi bi-car-front-fill"> </i>
			<?php echo '<span class="badge bg-success">' . __('Cocheras', 'inmobiliariadelassierras') . '</span>';
			echo '<strong class="float-end">'. $cochera . '</strong>';?>
		</li>
	<?php }?>
</ul>