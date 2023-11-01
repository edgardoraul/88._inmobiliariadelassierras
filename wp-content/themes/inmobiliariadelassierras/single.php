<?php get_header();?>

<main><!-- main -->

<div class="container-xxl"><!-- sección del contenido y sidebar -->
	<div class="row bg-white">
		<div class="col-12 col-lg-9 mb-5"><!-- contenido de la pagina -->

			<div class="containter-fluid">
				<div class="row">
				<?php if(have_posts()) {
					while(have_posts()) {
						the_post();?>
					<section class="container">
						<div class="row flex-sm-row-reverse">
							<div class="col-12 col-sm-6 my-3">
								<header class="h2 mb-3">
									<h2><?php the_title();?></h2>
								</header>
								<ul class="list-group">
									<li class="list-group-item">
									<?php _e('Publicado el: ', 'inmobiliariadelassierras'); the_time('j/m/Y');?>
									</li>
									<li class="list-group-item">
										<?php _e('Por: ', 'inmobiliariadelassierras'); the_author_posts_link(); ?>
									</li>
									<li class="list-group-item">
										<?php _e('En: ', 'inmobiliariadelassierras'); the_category(', '); ?>
									</li>
								</ul>
							</div>
							<div class="col-12 col-sm-6 my-3">
								<figure class="figure">
									<?php if(has_post_thumbnail()) {
										the_post_thumbnail('custom-thumb-600-x', array('class' => 'figure-img img-thumbnail rounded'));
									} else {
										echo '<img src="' . get_stylesheet_directory_uri() . '/img/img.png" alt="img" class="figure-img img-thumbnail rounded" />';
									};?>
								</figure>
							</div>
						</div>
						<div class="row"><!-- contenido -->
							<div class="col-12">
								<?php the_content();?>
							</div>
						</div><!-- /contenido -->

						<div class="row list-group list-group-horizontal mx-1"><!-- navegacion -->
							<div class="col-6 list-group-item">
								<?php previous_post_link();?>
							</div>
							<div class="col-6 list-group-item">
								<?php next_post_link();?>
							</div>
						</div><!-- /navegacion -->
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