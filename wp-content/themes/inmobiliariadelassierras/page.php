<?php get_header();?>
<h2>Página</h2>
<?php
if(have_posts()) {
	while(have_posts())
	{
		the_post(); ?>
	<h2><?php the_title();?></h2>
	<?php the_content();?>
	<?php the_post_thumbnail('medium');
	}
}
?>
<?php get_footer();?>