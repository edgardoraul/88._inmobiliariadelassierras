<?php
$galeria;
$video;
?>
<div class="col-12 col-sm-6 my-3">
	<figure class="figure">
		<?php if(has_post_thumbnail()) {
			the_post_thumbnail('custom-thumb-600-x', array('class' => 'figure-img img-thumbnail rounded'));
		} else {
			echo '<img src="' . get_stylesheet_directory_uri() . '/img/img.png" alt="img" class="figure-img img-thumbnail rounded" />';
		};?>
	</figure>
</div>