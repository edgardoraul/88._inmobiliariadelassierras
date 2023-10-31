<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes();?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset');?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="pingback" href="<?php bloginfo("pingback_url");?>" />
	<title><?php bloginfo("title");?></title>

	<?php get_template_part( 'template-part/content', 'header' );?>

	<?php wp_head();?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<!--[if lt IE 7]>
	<p class="browsehappy"><?php _e('Estás usando un navegador ', '');?><strong><?php _e('más viejo que la mierda</strong>. Haceme el favor de ', '');?><a href="https://www.mozilla.org/es-AR/firefox/download/thanks/"><?php _e('bajarte uno nuevo</a> y ponete las pilas, boludo.', 'inmobiliariadelassierras');?></p>
	<![endif]-->

<header class="bg-white">
	<div class="container-xxl">
		<div class="row">

			<!-- logo -->
			<div class="col-12 col-lg-3 offset-lg-0">
				<h1 class="text-center"><?php the_custom_logo();?></h1>
			</div><!-- /logo -->

		</div>

		<div class="row">
			<!-- navbar-ejemplo -->
			<nav class="navbar navbar-expand-lg">
				<div class="container-xxl">
					<a class="navbar-brand" href="#">Navbar</a>
					<!-- boton del menú -->
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse text-uppercase" id="navbarTogglerDemo02">
					<?php $argumentos = array(
							'menu'			=> 'Menú Principal',
							'depth'			=>	3,
							'post_type'		=>	'page',
							'item_spacing'	=>	'discard',
							'sort_column'	=>	'menu_order',
							'menu_id'		=>	'header_nav',
							'menu_class'	=>	'navbar-nav me-auto mb-2 mb-lg-0',
							// 'container_class'	=>	'ms-auto',
							'add_li_class'	=>	'nav-item'
						);
						wp_nav_menu($argumentos);?>
					</div>
				</div>
			</nav>
			<!-- /navbar-ejemplo -->



		</div><!-- /row -->

		<div class="row">
			<nav>
				<div class="col-12">
					<h2>Categorias Menu de ejemplo</h2>
				</div>
			</nav>
		</div>
	</div>
</header>