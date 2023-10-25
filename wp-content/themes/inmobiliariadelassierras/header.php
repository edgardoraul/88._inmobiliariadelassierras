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
				<div class="col-3">
					<?php if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					};?>
				</div>
			</div>

			<div class="row">
				<nav>
					<div class="col-12 align-items-center">
						<h2>Paginas Menu</h2>
					</div>
				</nav>
			</div>

			<div class="row">
				<nav>
					<div class="col-12">
						<h2>Categorias Menu</h2>

					</div>
				</nav>
			</div>
		</div>
	</header>
