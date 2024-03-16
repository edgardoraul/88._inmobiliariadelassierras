<!-- Modal -->
<div class="modal fade" id="modal_img_full" tabindex="-1" aria-labelledby="modal_img_fullLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php the_title();?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php get_template_part('template-part/content', 'product-modal-slider');?>
			</div>
		</div>
	</div>
</div>