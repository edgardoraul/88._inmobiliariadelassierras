<?php
/*
 * Template Name: Formulario
 */

get_header();?>

<main><!-- main -->

<div class="container-xxl"><!-- sección del contenido y sidebar -->
	<div class="row bg-white">
		<div class="col-12 col-lg-9 mb-5"><!-- contenido de la pagina -->

			<div class="containter-fluid">
				<?php migas_de_pan();?>
				<div class="row">
				<?php if(have_posts()) {
					while(have_posts()) {
						the_post();?>
					<header class="mb-4">
						<h2 class="display-5"><?php the_title();?></h2>
					</header>
					<section class="text-uppercase">
						<?php the_content();?>
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