<?php
// Las variables a utilizar
$propiedad_tipo = rwmb_meta('propiedad_tipo', '');
$ambiente = rwmb_meta('ambiente', '');
$toilette = rwmb_meta('toilette', '');
$cochera = rwmb_meta('cochera', '');
$superficie = rwmb_meta('superficie', '');
$precio_us = rwmb_meta('precio_us', '');
$precio_ar = rwmb_meta('precio_ar', '');
$inmobiliariadelassierras_meta_keywords = rwmb_meta('inmobiliariadelassierras_meta_keywords', '');
$inmobiliariadelassierras_descripcion = rwmb_meta('inmobiliariadelassierras_descripcion', '');
$inmobiliariadelassierras_googlemaps = rwmb_meta('inmobiliariadelassierras_googlemaps', '');
?>
<?php if($precio_us) { ?>
	<button class="btn btn-secondary btn-lg" disabled>
		<?php _e('u$s ', 'inmobiliariadelassierras'); echo $precio_us;?>
	</button>
<?php }?>

<?php if($precio_ar) { ?>
	<button class="btn btn-secondary btn-lg" disabled>
		<?php _e('$ ', 'inmobiliariadelassierras'); echo $precio_ar;?>
	</button>
<?php }?>

<ul class="list-group list-group-flush">
	<?php if($propiedad_tipo) { ?>
		<li class="list-group-item">
			<i class="bi bi-building-fill"> </i>
			<?php _e('  Tipo de propiedad: ', 'inmobiliariadelassierras'); echo $propiedad_tipo;?>
		</li>
	<?php }?>

	<?php if($ambiente) { ?>
		<li class="list-group-item">
			<i class="bi bi-house-gear"> </i>
			<?php _e('  Ambientes: ', 'inmobiliariadelassierras'); echo $ambiente;?>
		</li>
	<?php }?>

	<?php if($toilette) { ?>
		<li class="list-group-item">
			<i class="bi bi-water"> </i>
			<?php _e('  Baños: ', 'inmobiliariadelassierras'); echo $toilette;?>
		</li>
	<?php }?>

	<?php if($superficie) { ?>
		<li class="list-group-item">
			<i class="bi bi-rulers"></i>
			<?php echo ' '; _e('	Superficie: ', 'inmobiliariadelassierras'); echo  $superficie .' M<sup>2</sup>';?>
		</li>
	<?php }?>



	<?php if($cochera) { ?>
		<li class="list-group-item">
			<i class="bi bi-car-front-fill"> </i>
			<?php _e('	Cocheras: ', 'inmobiliariadelassierras'); echo $cochera; ?>
		</li>
	<?php }?>
</ul>