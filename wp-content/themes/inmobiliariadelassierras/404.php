<?php get_header();?>

<main><!-- main -->


<div class="container-xxl"><!-- sección del contenido y sidebar -->
	<div class="row bg-white">
		<div class="col-12 col-lg-9 mb-5"><!-- contenido de la pagina -->

			<div class="containter-fluid">
				

				<div class="row">
					<section class="container">
						<div class="row">

							<!-- El encabezado y los atributos del producto -->
							<div class="col-12 my-3">
								<header class="h2 mb-3">
									<h2><?php _e('Error 404 - ¿Qué te pasa?', 'inmobiliariadelassierras');?></h2>
								</header>
							</div>
						</div>

					

						<div class="row"><!-- contenido -->
							<div class="col-12">
								<?php _e('No existe lo que estás buscando.', 'inmobiliariadelassierras');?>
                                <br />
                                
                                <i class="bi bi-emoji-frown fs-1"></i>
							</div>
						</div><!-- /contenido -->

					</section>
				</div><!-- /row -->
			</div><!-- /container-fluid -->
		</div><!-- /contenido de la pagina -->


		<!-- sidebar -->
		<?php get_sidebar();?>

	</div><!-- /row -->
</div><!-- /contenido y sidebar -->
</main>
<?php get_footer();?>