<?php get_header();?>

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
					<header>
						<h2 class="h2"><?php the_title();?></h2>
					</header>
					<section>
						<figure class="figure">
							<?php if(has_post_thumbnail()) {
								if(wp_is_mobile()) {
									the_post_thumbnail('custom-thumb-600-x', array('class' => 'figure-img img-thumbnail rounded'));
								} else {
									the_post_thumbnail('custom-thumb-1200-500', array('class' => 'figure-img img-thumbnail rounded'));
								}
							} else {
								sin_imagen();
							};?>
						</figure>
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