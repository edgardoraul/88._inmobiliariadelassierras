<div class="row"><!-- Formulario -->
	<div class="col-12 col-9-lg">
		<div class="alert alert-dark" role="alert">
			<div class="accordion accordion-flush" id="accordionFlushExample">
				<div class="accordion-item">
					<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
						<?php _e('CONSULTENOS POR ESTA PROPIEDAD', 'inmobiliariadelassierras');?>
						</button>
					</h2>
					<div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
						<div class="accordion-body">
							<?php
							/*
								Se coloca esta variable "$existe_formulario" en "true" para que renderize el formulario.
								De lo contrario jamás lo hará.
							*/
							$existe_formulario = true;
							echo do_shortcode('[contact-form-7 id="aa2ed63" title="Consúltenos por esta Propiedad"]');?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div><!-- /Formulario -->