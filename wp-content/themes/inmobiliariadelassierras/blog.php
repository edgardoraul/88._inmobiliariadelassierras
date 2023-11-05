<?php
/*
 * Template Name: Blog
 */

get_header();?>

<main><!-- main -->

	<div class="container-xxl"><!-- sección del contenido y sidebar -->
		<div class="row bg-white">
			<div class="col-12 col-lg-9 mb-5"><!-- contenido de la pagina -->
				<div class="containter-fluid">

					<?php migas_de_pan();?>

					<div class="row">
						<div class="col-12 mb-5">
							<h2 class="h2"><?php _e('Novedades', 'inmobiliariadelassierras');?></h2>
						</div>
					</div>
				<?php $blog = new WP_Query( array( 'category_name' => 'blog' ) );
				if( $blog->have_posts() ) {
					while($blog->have_posts()) {
						$blog->the_post();?>

					<!-- Listado de las búsquedas -->
					<div class="row mb-5">
						<div class="d-flex position-relative">

							<?php if (has_post_thumbnail() ) {
								the_post_thumbnail('custom-thumb-200-200', array('class' => 'flex-shrink-0 me-3 rounded'));
							} else {
								echo '<img src="' . get_stylesheet_directory_uri() . '/img/no-img.png" alt="img" class="flex-shrink-0 me-3 rounded" width="200" height="200" />';
							}
							?>
							<div>
								<h3 class="h5 mt-0 text-uppercase">
									<a href="<?php the_permalink();?>"><?php the_title();?></a>
								</h3>

								<?php the_excerpt();?>
								<button class="btn btn-primary btn-sm" disabled>
									<i class="bi bi-calendar-check pr-5"></i>
									<?php the_date();?></button>
								<a href="<?php the_permalink();?>" class="btn btn-outline-primary btn-sm"><?php _e('Leer más', 'inmobiliariadelassierras');?></a>
							</div>
						</div>
					</div><!-- /row -->
				<?php }
				};?>

				<!-- paginacion -->
				<?php get_template_part( 'template-part/content', 'pagination' );?>

			</div><!-- /container-fluid -->
		</div><!-- /contenido de la pagina -->

		<!-- sidebar -->
		<?php get_sidebar();?>

		</div><!-- /row -->
	</div><!-- /contenido y sidebar -->
</main>
<?php get_footer();?>