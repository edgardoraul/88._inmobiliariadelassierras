<?php get_header();?>
<?php get_template_part( 'template-part/content', 'slider' );?>

<main class="bg-light"><!-- main -->

<div class="container-xxl mt-3"><!-- sección del contenido y sidebar -->
	<div class="row">
		<div class="col-12 col-lg-9"><!-- contenido -->
			<div class="containter-fluid">
				<div class="row">
					<?php if(have_posts()) {
						while(have_posts()) {
							the_post();?>

					<!-- Cada Producto Publicado -->
					<div class="col-sm-6 col-lg-4 mb-3">
						<div class="card card-body">
							<figure class="card-img-top text-center mb-0">
								<a href="<?php the_permalink();?>">
									<?php if( has_post_thumbnail() ) {
										the_post_thumbnail('custom-thumb-600-400', array('class' => 'img-thumbnail w-100'));
									} else {
										echo '<img src="' . get_stylesheet_directory_uri() . '/img/no-img.png" alt="img" class="figure-img img-thumbnail rounded w-100" />';
									};?>
								</a>
								<figcaption class="btn btn-secondary disabled bg-gradient opacity-100" style="position: relative; bottom:28px;">
									<?php echo get_post_meta($post->ID, 'price', true);?>
								</figcaption>
							</figure>
							<h4 class="card-title text-center mt-0">
								<a class="link-success link-underline link-underline-opacity-0" href="<?php the_permalink();?>">
									<?php the_title();?>
								</a>
							</h4>
							<hr class="border border-secondary border-1 opacity-25">
							<div class="card-text">
								<?php the_excerpt(10);?>
							</div>
							<div class="text-center mt-4">
								<a class="btn btn-outline-secondary text-uppercase" href="<?php the_permalink()?>">
									<?php _e('Ver más', 'inmobiliariadelassierras');?>
								</a>
							</div>
						</div>
					</div><!-- /producto -->
					<?php }
					} ?>
				</div><!-- /row de productos -->

				<!-- paginacion -->
				<div class="row my-3 row justify-content-center">
					<div class="col-12"><?php pagination();?></div>
				</div>

			</div><!-- /container-fluid de los productos -->


		</div><!-- /contenido -->

		<!-- sidebar -->
		<?php get_sidebar();?>



	</div><!-- /contenido y sidebar -->
</main>
<?php get_footer();?>