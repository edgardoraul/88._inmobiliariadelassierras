<?php get_header();?>


	<div class="container-xl">
		<div class="row mb-3">
			<div class="col-12 col-lg-9 bg-secondary">
<?php
	if( have_posts() ) {
		while( have_posts() ) {
			the_post();
		}
	}
?>
				<div class="containter">

					<div class="row">
						<!-- Imagen y slider -->
						<div class="col-12 col-m-6 mt-3">
							<?php the_post_thumbnail('thumbnail');?>
						</div>

						<!-- Características -->
						<div class="col-12 col-m-6">
							<h2 class="h2"><?php the_title();?></h2>
						</div>
					</div>

					<div class="row">

					</div>

					<!-- Contenido -->
					<div class="row">
						<div class="col-12">
							<?php the_content();?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();?>