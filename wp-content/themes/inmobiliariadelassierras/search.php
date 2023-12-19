<?php get_header();?>
<main><!-- main -->

	<div class="container-xxl"><!-- sección del contenido y sidebar -->
		<div class="row bg-white">
			<div class="col-12 col-lg-9 mb-5"><!-- contenido de la pagina -->
				<div class="containter-fluid">
					<div class="row">
						<div class="col-12 mb-5">
							<h2 class="">Resultados de la búsqueda</h2>
						</div>
					</div>
				<?php if(have_posts()) {
					while(have_posts()) {
						the_post();?>

					<!-- Listado de las búsquedas -->
					<div class="row mb-5 clearfix">
						<div class="d-flex">

							<?php if(has_post_thumbnail()) {
								the_post_thumbnail('custom-thumb-200-200', array('class' => 'flex-shrink-0 me-3 rounded'));
							} else {
								echo '<img src="' . get_stylesheet_directory_uri() . '/img/no-img.png" alt="img" class="flex-shrink-0 me-3 rounded" width="200" height="200" />';
							}
							?>
							<div class="">
								<h3 class="h5 mt-0 text-uppercase">
									<a class="link-offset-2 link-underline link-underline-opacity-0" href="<?php the_permalink();?>"><?php the_title();?></a>
								</h3>

								 <!-- Listado de categorías con formato de lista horizontal de Bootstrap -->
								 <?php
									$categories = get_the_category();
									if (!empty($categories)) {
										echo '<div class="col-12">';
										foreach ($categories as $category) {
											echo '<a class="badge text-bg-primary fs-6 link-offset-2 link-underline link-underline-opacity-0 me-2 mb-2" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
										}
										echo '</div>';
									}
									?>

								<?php the_excerpt();?>
								<a href="<?php the_permalink();?>" class="btn btn-outline-primary btn-sm mt-4"><?php _e('Leer más', 'inmobiliariadelassierras');?></a>
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