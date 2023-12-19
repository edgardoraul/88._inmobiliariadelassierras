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
	<title><?php bloginfo("title");?> - <?php bloginfo("description");?></title>

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
		<div class="row d-flex justify-content-between">

			<!-- logo -->
			<div class="col-12 col-md-4 col-lg-3">
				<h1 class="text-center">
					<?php the_custom_logo();?>
				</h1>
			</div><!-- /logo -->

			<!-- Logotipo 2 -->
			<div class="col-12 col-lg-5">

				<div class="navbar navbar-expand-lg bg-body-tertiary">

					<!-- boton del menú -->
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header_nav" aria-controls="header_nav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="navbar-expand-md navbar-collapse collapse text-uppercase" id="header_nav">
						<?php /* El menú principal */
						$argumentos = array(
							'menu'			=> 'Menú Principal',
							'depth'			=>	3,
							'item_spacing'	=>	'discard',
							'menu_id'		=>	'header_nav',
							'container_class' => 'navbar navbar-expand-lg bg-body-light navbar-light bg-light',
							'menu_class'	=>	'navbar-nav me-auto mb-2 mb-lg-0',
							'fallback_cb'     => false,
							'walker'          => new Bootstrap_Walker_Nav_Menu(),
						);
						wp_nav_menu($argumentos);?>
					</div>
				</div>
			</div><!-- /Menú principal -->

		</div>

		<div class="row">
		</div>

		<div class="row my-3">
			<!-- navbar-ejemplo -->
			<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-body mb-2" data-bs-theme="dark">
				<div class="container-xxl">
					<!-- Search -->
					<form class="d-flex" role="search"  method="get" id="searchform" action="<?php bloginfo('url');?>">
						<input class="form-control me-2" type="search" placeholder="<?php _e('Buscar...', 'inmobiliariadelassierras');?>" aria-label="Search" value="<?php the_search_query();?>" name="s" id="s">
						<button class="btn btn-outline-success" type="submit">
							<i class="bi bi-search"></i>
						</button>
					</form><!-- /search -->

					<!-- boton del menú -->
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse text-uppercase justify-content-end" id="navbarTogglerDemo02">

					<?php // El Menú secundario
						$argumentos = array(
							'menu'			=> 'Secciones',
							'depth'			=>	4,
							'menu_class'      => 'navbar-nav me-auto mb-2 mb-lg-0',
							'fallback_cb'     => false,
							'walker'          => new Bootstrap_Walker_Nav_Menu(),
						);
						wp_nav_menu($argumentos);
						?>

					</div>
				</div>
			</nav>
			<!-- /navbar-ejemplo -->



		</div><!-- /row -->

		<div class="row">
			<nav>
				<div class="col-12">
					<?php

					?>
				</div>
			</nav>
		</div>
	</div>
</header>