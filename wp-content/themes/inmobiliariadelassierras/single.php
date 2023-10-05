<?php get_header();?>
	<div class="container-lg">
		<div class="row card">
			<div class="col-12 col-8-lg">
				<?php if( have_posts() ) {
					while( have_posts() ) {
						the_post();?>
						
						<div class="containter">
							<div class="row">
								<div class="col-12 col-6-md">
									<figure class="figure text-center">
										<?php if ( the_post_thumbnail('medium') ) {
											the_post_thumbnail('medium');
										} else {
											echo '<img class="figure-img img-fluid rounded" src="' . get_stylesheet_directory_uri() . '/img/logo.png" alt="'.get_bloginfo( 'name' ).'" />';
										}
										;?>
										<figcaption class="btn btn-secondary disabled">
											<?php echo get_post_meta($post->ID, 'price', true);?>
										</figcaption>
									</figure>
								</div>
								<div class="col-12 col-6-md">
									<h2 class="h2"><?php the_title();?></h2>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<article>
										<?php the_content();?>
									</article>
								</div>
							</div>
						</div>
						
					<?php }
				}
				?>
			</div>
			<div class="col-12 col-4-lg">
				<!-- la barra lateral -->
			</div>
		</div>
	</div>

<?php get_footer();?>