<?php

/* Sirve para mostrar en categorías los productos ordenados y sus taxonomías */

get_header();?>

<main class="bg-white"><!-- main -->

<div class="container-xxl mt-3"><!-- sección del contenido y sidebar -->
	<div class="row">
		<div class="col-12 col-lg-9"><!-- contenido -->
			<div class="containter-fluid">
				<!-- El titular que muestra la categoría actual -->
				<div class="row">
					<div class="col-12">
						<h2 class="display-5 text-uppercase">
							<?php
							 // Obtenemos la categoría actual
							 $current_category = single_cat_title('', false);

							 // Obtenemos el ID de la categoría actual
							 $current_category_id = get_cat_ID($current_category);

							 // Contamos el número de propiedades en la categoría actual
							 $property_count = new WP_Query(array(
								 'post_type' => 'post', // Reemplaza 'tu_tipo_de_post' con el nombre real de tu tipo de post
								 'cat' => $current_category_id,
								 'post_status' => 'publish',
								 'posts_per_page' => -1,
							 ));

							 // Mostramos el título de la categoría con el número de propiedades
							echo esc_html($current_category); ?> (<?php
							if($property_count->post_count == 1) {
								echo esc_html($property_count->post_count); _e(' propiedad', 'inmobiliariadelassierras');
							} else {
								echo esc_html($property_count->post_count); _e(' propiedades', 'inmobiliariadelassierras');
							}
							?>)
						</h2>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<?php migas_de_pan();?>
					</div>
				</div>


				<div class="row">
					<?php if(have_posts()) {
						while(have_posts()) {
							the_post();

							// Variables necesarias
							$precio = rwmb_meta('precio', '');
							$propiedad_tipo = rwmb_meta('propiedad_tipo', '');
							$ambiente = rwmb_meta('ambiente', '');
							$toilette = rwmb_meta('toilette', '');
							$cochera = rwmb_meta('cochera', '');
							$superficie = rwmb_meta('superficie', '');
							?>

					<!-- Cada Producto Publicado -->
					<div class="col-sm-6 col-lg-4 mb-4 d-flex align-items-stretch">
					<div class="card-group">

						<div class="card card-body align-self-stretch">
							<figure class="card-img-top text-center mb-0">
								<a href="<?php the_permalink();?>">
									<?php if( has_post_thumbnail() ) {
										the_post_thumbnail('custom-thumb-600-400', array('class' => 'img-thumbnail w-100'));
									} else {
										sin_imagen();
									};?>
								</a>
								<figcaption class="btn btn-secondary disabled bg-gradient opacity-100" style="position: relative; bottom:28px;">
									<?php if($precio) {
										echo $precio;
									} else {
										echo _e('Consultar', 'inmobiliariadelassierras');
									}?>
								</figcaption>
							</figure>
							<h4 class="card-title text-center mt-0 h5">
								<a class="link-success link-underline text-uppercase link-underline-opacity-0" href="<?php the_permalink();?>">
									<?php the_title();?>
								</a>
							</h4>
							<!-- <hr class="border border-secondary border-1 opacity-25"> -->
							<div class="card-text">
								<?php //the_excerpt(10);?>
								<?php get_template_part('template-part/content', 'product-type');?>
							</div>
							<div class="text-center mt-4">
								<a class="btn btn-outline-secondary text-uppercase" href="<?php the_permalink();?>">
									<?php _e('Ver más', 'inmobiliariadelassierras');?>
								</a>
							</div>
						</div>
					</div><!-- /producto -->
					</div>
					<?php }
					} ?>
				</div><!-- /row de productos -->

				<!-- paginacion -->
				<?php get_template_part( 'template-part/content', 'pagination' );?>

			</div><!-- /container-fluid de los productos -->


		</div><!-- /contenido -->

		<!-- sidebar -->
		<?php get_sidebar();?>



	</div><!-- /contenido y sidebar -->
</main>
<?php get_footer();?>