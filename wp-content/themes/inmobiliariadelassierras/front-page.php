<?php get_header();?>

<div class="container-lg">
	<div class="row">
		<?php if(have_posts()) {
			while(have_posts()) {
				the_post();?>

			<div class="col-sm-6 col-lg-4 mb-3 mx-0">
				<div class="card card-body">
					<figure class="card-img-top text-center">
						<a href="<?php the_permalink();?>">
							<?php the_post_thumbnail('medium');;?>
						</a>
						<figcaption class="btn btn-secondary disabled">
							<?php echo get_post_meta($post->ID, 'price', true);?>
						</figcaption>
					</figure>
					<h4 class="card-title text-center">
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
			</div>

			<?php }
		};?>
	</div>
	<div class="row my-3 row justify-content-center">
		<div class="col-12">
			<?php
			if ( function_exists( "pagination" ) )
			{
				if ( pagination() )
				{
					pagination();
				}
			};?>
		</div>
	</div>
<?php get_footer();?>