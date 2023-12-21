<?php get_header();?>

<main><!-- main -->

<!-- Slider/Modal/ -->
<?php get_template_part('template-part/content', 'product-modal');?>

<div class="container-xxl"><!-- sección del contenido y sidebar -->
	<div class="row bg-white">
		<div class="col-12 col-lg-9 mb-5"><!-- contenido de la pagina -->

			<div class="containter-fluid">
				<?php migas_de_pan();?>

				<div class="row">
					<?php if(have_posts()) {
					while(have_posts()) {
						the_post();?>
					<section class="container">
						<div class="row flex-row-reverse">

							<!-- El encabezado y los atributos del producto -->
							<div class="col-12 col-sm-6 my-3">
								<header class="mb-3">
									<h2 class="display-5"><?php the_title();?></h2>
								</header>

								<!-- Atributos -->
								<?php get_template_part('template-part/content', 'product-type');?>
							</div>

							<!-- Slider/Galería -->
							<?php get_template_part('template-part/content', 'product-slider');?>

						</div>

					<?php $inmobiliariadelassierras_descripcion = rwmb_meta('inmobiliariadelassierras_descripcion', '');
						if($inmobiliariadelassierras_descripcion) { ?>
						<div class="row">
							<div class="col-12">
								<div class="alert alert-warning" role="alert">
									<?php echo $inmobiliariadelassierras_descripcion;?>
								</div>
							</div>
						</div>
					<?php }?>

						<div class="row"><!-- contenido -->
							<div class="col-12">
								<?php the_content();?>
							</div>
							<?php $inmobiliariadelassierras_googlemaps = rwmb_meta('inmobiliariadelassierras_googlemaps', '');
							if($inmobiliariadelassierras_googlemaps) {?>
								<div class="col-12 my-3">
									<?php echo $inmobiliariadelassierras_googlemaps;
									
									;?>
								</div>
							<?php };?>
						</div><!-- /contenido -->


						<!-- El formulario de contacto -->
						<?php get_template_part('template-part/content', 'form-product');?>

						<!-- Navegacion -->
						<?php get_template_part('template-part/content', 'navigation');?>

					</section>
					<?php }
					}?>
				</div><!-- /row -->
			</div><!-- /container-fluid -->
		</div><!-- /contenido de la pagina -->


		<!-- sidebar -->
		<?php get_sidebar();?>

	</div><!-- /row -->
</div><!-- /contenido y sidebar -->
</main>
<?php get_footer();?>