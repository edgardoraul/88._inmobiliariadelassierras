<?php
/* SOLO SIRVE PARA MOSTRAR LOS POST QUE CORRESPONDEN A NOVEDADES, NADA MÁS. */

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
						$taxonomy = get_the_terms(get_the_ID(), 'novedades');
						the_post($taxonomy);
				?>
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