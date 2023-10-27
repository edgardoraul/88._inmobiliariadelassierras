<?php
// Variables a mostrar
$celular_contact		=	of_get_option( 'celular_contact', '' );
$telefono_fijo			=	of_get_option( 'telefono_fijo', '');
$facebook_contact		=	of_get_option( 'facebook_contact', '' );
$google_analitycs		=	of_get_option( 'google_analitycs', '');
$direccion_web			=	of_get_option( 'direccion_web', '');
$email_web				=	of_get_option( 'email_web', '');
$instagram_contact		=	of_get_option( 'instagram_contact', '');
$linkedin_contact		=	of_get_option( 'linkedin_contact', '');
$matricula_contact		=	of_get_option( 'matricula_contact', '');
$horario_web			=	of_get_option( 'horario_web', '');
$cp_web					=	of_get_option( 'cp_web', '');
$ciudad_web				=	of_get_option( 'ciudad_web', '' );
$provincia_web			=	of_get_option( 'provincia_web', '');
?>

<!-- Parte del contenido del footer -->
<footer class="bg-dark py-5">
	<div class="container-xxl">
		<div class="row text-secondary">
			<!-- Redes sociales -->
			<div class="col-md-4 p-3">
				<p><?php _e('Celular: ', 'inmobiliariadelassierras');?><a class="link-success text-decoration-none" href="//wa.me/<?php echo $celular_contact;?>" title="WhatsApp"><?php echo "+" . $celular_contact;?></a></p>
				<p><?php _e('Teléfono: ', 'inmobiliariadelassierras'); echo $telefono_fijo;?></p>
				<p><?php _e('E-Mail: ', 'inmobiliariadelassierras');?><a class="link-success text-decoration-none" href="mailto:<?php echo $email_web;?>" title="<?php echo $email_web;?>"><?php echo $email_web;?></a></p>
				<p><?php _e('Instagram: ', 'inmobiliariadelassierras');?><a class="link-success text-decoration-none" href="//<?php echo $instagram_contact;?>" title="Instagram" target="_blank"><?php echo $instagram_contact;?></a></p>
				<p><?php _e('LinkedIn: ', 'inmobiliariadelassierras');?><a class="link-success text-decoration-none" href="//<?php echo $linkedin_contact;?>" title="LinkedIn" target="_blank"><?php echo $linkedin_contact;?></a></p>
			</div>

			<!-- Dirección -->
			<div class="col-md-4 p-3">
				<p><?php _e('Calle y número: ', 'inmobiliariadelassierras'); echo $direccion_web;?></p>
				<p><?php _e('Ciudad: ', 'inmobiliariadelassierras'); echo $ciudad_web;?></p>
				<p><?php _e('Código Postal: ', 'inmobiliariadelassierras'); echo $cp_web;?></p>
				<p><?php _e('Provincia: ', 'inmobiliariadelassierras'); echo $provincia_web;?></p>
			</div>

			<!-- Copyright -->
			<div class="col-md-4 p-3">
				<p>© Copyright <?php the_date("Y"); echo " - " ;?> <a class="link-success text-decoration-none" href="<?php bloginfo("url");?>" target="_self" title="<?php bloginfo("name");?>"><?php bloginfo("name");?></a></p>
				<p><?php _e('Matrícula Profesional: ', 'inmobiliariadelassierras'); echo $matricula_contact;?></p>
				<p><?php _e('Horario de atención: ', 'inmobiliariadelassierras'); echo $horario_web;?></p>
			</div>
		</div>

		<!-- Botones de Redes sociales -->
		<div class="row position-fixed bottom-0 end-0">
			<div class="col">
				<div class="btn-group me-2 mb-3" role="group">
					<a type="button" class="btn btn-success  opacity-75" href="//wa.me/<?php echo $celular_contact;?>" target="_blank" title="WhastApp">WhastApp</a>
				</div>
				<div class="btn-group me-2 mb-3" role="group">
					<a type="button" class="btn btn-secondary  opacity-75" href="#" title="<?php _e('Arriba', 'inmobiliariadelassierras');?>">&uparrow;</a>
				</div>
			</div>
		</div>
	</div>
</footer>

	<?php wp_footer();?>
	<?php echo "<script>" . $google_analitycs . "</script>";?>
	</body>
</html>