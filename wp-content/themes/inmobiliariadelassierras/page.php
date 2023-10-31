<?php get_header();?>

<main><!-- main -->

<div class="container-xxl mt-3"><!-- sección del contenido y sidebar -->
	<div class="row bg-white">
		<div class="col-12 col-lg-9"><!-- contenido de la pagina -->

			<div class="containter-fluid">
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
								the_post_thumbnail('custom-thumb-1200-500', array('class' => 'figure-img img-thumbnail rounded'));
							} else {
								echo '<img src="' . get_stylesheet_directory_uri() . '/img/img.png" alt="img" class="figure-img img-thumbnail rounded" />';
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