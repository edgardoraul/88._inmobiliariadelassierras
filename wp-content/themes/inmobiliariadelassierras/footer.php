<?php
// Variables a mostrar
$celular_contact		=	of_get_option( 'celular_contact', '' );
$telefono_fijo			=	of_get_option( 'telefono_fijo', '');
$facebook_contact		=	of_get_option( 'facebook_contact', '' );
$google_analitycs		=	of_get_option( 'google_analitycs', '');
$direccion_web			=	of_get_option( 'direccion_web', '');
$email_web				=	of_get_option( 'email_web', '');
$instagram_contact		=	of_get_option( 'instagram_contact', '');
$twitter_contact		=	of_get_option( 'twitter_contact', '');
$linkedin_contact		=	of_get_option( 'linkedin_contact', '');
$youtube_contact		=	of_get_option( 'youtube_contact', '');
$matricula_contact		=	of_get_option( 'matricula_contact', '');
$horario_web			=	of_get_option( 'horario_web', '');
$cp_web					=	of_get_option( 'cp_web', '');
$ciudad_web				=	of_get_option( 'ciudad_web', '' );
$provincia_web			=	of_get_option( 'provincia_web', '');
?>

<?php get_sidebar();?>

<!-- Parte del contenido del footer -->
<footer class="bg-white opacity-75 py-5">
	<div class="container-xxl">
		<div class="row">
			<!-- Redes sociales -->
			<div class="col-md-4 p-3">
				<h3 class="display-5 text-uppercase mb-4"><?php _e('Contacto', 'inmobiliariadelasierras');?></h3>
				<?php if($celular_contact) {
					echo "<p><i class='bi bi-phone-fill fs-1'></i> <a class='link-success text-decoration-none text-wrap' target='_blank' href='//wa.me/$celular_contact' title='WhatsApp'>+$celular_contact</a></p>";
				}

				if($telefono_fijo) {
					echo "<p><i class='bi bi-telephone-fill fs-1'></i> <a class='link-success text-decoration-none' href='tel:$telefono_fijo'>$telefono_fijo</a></p>";

				}

				// echo "<div class='d-flex justify-content-evenly'>";

				if($email_web) {
					echo "<a class='link-warning text-decoration-none text-wrap me-3' href='mailto:$email_web' title='$email_web' target='_blank'><i class='bi bi-envelope-fill fs-1'></i></a>";

				}

				if($facebook_contact) {
					echo "<a class='link-primary text-decoration-none text-wrap me-3' href='//$facebook_contact' title='Facebook' target='_blank'><i class='bi bi-facebook fs-1'></i></a>";
				}

				if($instagram_contact) {
					echo "<a class='link-danger text-decoration-none text-wrap me-3' href='//www.instagram.com/$instagram_contact' title='Instagram' target='_blank'><i class='bi bi-instagram fs-1'></i></a>";
				}

				if($linkedin_contact) {
					echo "<a class='link-primary text-primary-emphasis text-decoration-none text-wrap me-3' href='//$linkedin_contact' title='LinkedIn' target='_blank'><i class='bi bi-linkedin fs-1'></i></a>";
				}

				if($twitter_contact) {
					echo "<a class='link-primary text-decoration-none text-wrap me-3' href='//$twitter_contact' title='Twitter - X' target='_blank'><i class='bi bi-twitter-x fs-1'></i></a>";
				}

				if($youtube_contact) {
					echo "<a class='link-danger text-decoration-none text-wrap' href='$youtube_contact' title='Youtube' target='_blank'><i class='bi bi-youtube fs-1'></i></a>";
				}

				// echo "</div>";
				?>
			</div>

			<!-- Dirección -->
			<div class="col-md-4 p-3">
				<address>
					<h3 class="display-5 text-uppercase mb-4"><?php _e('Ubicación', 'inmobiliariadelasierras');?></h3>

					<p>
						<?php _e('Calle y número: ', 'inmobiliariadelassierras');
						if( $direccion_web ) {
							echo $direccion_web;
						} else {
							texto_capilla();
						}?>
					</p>

					<p>
						<?php _e('Ciudad: ', 'inmobiliariadelassierras');
						if( $ciudad_web ) {
							echo $ciudad_web;
						} else {
							texto_capilla();
						}?>
					</p>

					<p>
						<?php _e('Código Postal: ', 'inmobiliariadelassierras');
						if($cp_web) {
							echo $cp_web;
						} else {
							texto_capilla();
						}?>
					</p>

					<p>
						<?php _e('Provincia: ', 'inmobiliariadelassierras');
						if($provincia_web) {
							echo $provincia_web;
						} else  {
							texto_capilla();
						}?>
					</p>
				</address>
			</div>

			<!-- Copyright -->
			<div class="col-md-4 p-3">
				<h3 class="display-5 text-uppercase mb-4"><?php _e('Nosotros', 'inmobiliariadelasierras');?></h3>
				<p>© <?php _e('Derechos de copia', 'inmobiliariadelasierras');?> <?php the_date("Y"); echo " - " ;?> <a class="link-success text-decoration-none" href="<?php bloginfo("url");?>" target="_self" title="<?php bloginfo("name");?>"><?php bloginfo("name");?></a></p>
				<p>
					<?php _e('Matrícula Profesional: ', 'inmobiliariadelassierras');
					if($matricula_contact) {
						echo $matricula_contact;
					} else  {
						texto_capilla();
					}?>
				</p>

				<p>
					<?php _e('Horario de atención: ', 'inmobiliariadelassierras');
					if($horario_web) {
						echo $horario_web;
					} else {
						texto_capilla();
					}?>
				</p>

				<p>
					<?php _e('Desarrollado por', 'inmobiliariadelassierras');?> <a href="//webmoderna.com.ar" target="_blank" class="link-danger link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
						www.webmoderna.com.ar
					</a>
				</p>
			</div>
		</div>

		<!-- Botones de Redes sociales -->
		<div class="row position-fixed bottom-0 end-0">
			<div class="col">
				<div class="btn-group me-3 mb-3" role="group">
					<a type="button" class="btn btn-success  opacity-75" href="//wa.me/<?php echo $celular_contact;?>" target="_blank" title="WhastApp"><i class="bi bi-whatsapp"></i></a>
				</div>
				<div class="btn-group me-3 mb-3" role="group">
					<a type="button" class="btn btn-secondary  opacity-75" href="#" title="<?php _e('Arriba', 'inmobiliariadelassierras');?>"><i class="bi bi-arrow-up"></i></a>
				</div>
			</div>
		</div>
	</div>
</footer>

	<?php wp_footer();?>
	<?php if ($google_analitycs) echo '<script type="text/javascript">' . $google_analitycs . '</script>';?>
	</body>
</html>