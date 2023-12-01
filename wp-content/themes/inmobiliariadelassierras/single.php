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
						<div class="row flex-sm">
							<div class="col-12 col-sm-6 my-3">
								<header class="h2 mb-3">
									<h2><?php the_title();?></h2>
								</header>

								<!-- Listado de atributos del producto -->
								<?php get_template_part('template-part/content', 'product-type');?>
							</div>

							<!-- Slider/Galería -->
							<?php get_template_part('template-part/content', 'product-slider');?>


						</div>



						<div class="row"><!-- contenido -->
							<div class="col-12">
								<?php the_content();?>
							</div>
							<?php $inmobiliariadelassierras_googlemaps = rwmb_meta('inmobiliariadelassierras_googlemaps', '');
							if($inmobiliariadelassierras_googlemaps) {?>
								<div class="col-12 my-3">
									<?php echo $inmobiliariadelassierras_googlemaps;?>
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