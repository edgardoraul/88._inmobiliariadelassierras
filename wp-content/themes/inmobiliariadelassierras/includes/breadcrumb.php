<?php
//* NO incluyas la etiqueta de apertura

add_filter('the_category', 'category_add_class', 10, 3 );

function category_add_class( $thelist, $separator, $parents) {
	$class_to_add = "link-success link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover";
	return str_replace('<a href="', '<a class="' . $class_to_add . '" href="', $thelist);
}

//* Integra migas de pan a WordPress sin plugin
function migas_de_pan() { ?>
	<div class="row my-3 row justify-content-center">
		<div class="col-12">
			<nav style="--bs-breadcrumb-divider: '›';" aria-label="breadcrumb" class="border-bottom border-body-tertiary text-body-tertiary text-capitalize">
				<ol class="breadcrumb fw-lighter">

<?php if (!is_home()) {
		echo '<li class="breadcrumb-item"><a class="link-success link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="';
		echo get_option('home');
		echo '">';
		echo 'Inicio';
		echo "</a></li>";
		if ( is_category() || is_single() ) {
			echo '<li class="breadcrumb-item">';
			the_category(' </li><li class="breadcrumb-item"> ');

			if ( is_single() ) {
				echo '</li><li class="breadcrumb-item">';
				the_title();
				echo '</li>';
			}

		} elseif (is_page()) {
			echo '<li class="breadcrumb-item">';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) { single_tag_title(); }
	elseif (is_day()) {
		echo '<li class="breadcrumb-item">Archive for ';
		the_time('F jS, Y');
		echo '</li>';
	}

	elseif (is_month()) {
		echo '<li class="breadcrumb-item">Archive for ';
		the_time('F, Y');
		echo '</li>';
	}
	elseif (is_year()) {
		echo '<li class="breadcrumb-item">Archive for ';
		the_time('Y');
		echo '</li>';
	}
	elseif (is_author()) {
		echo '<li class="breadcrumb-item">Author Archive';
		echo '</li>';
	}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
		echo '<li class="breadcrumb-item">Blog Archives';
		echo '</li>';
	}
	elseif (is_search()) {
		echo '<li class="breadcrumb-item">Search Results';
		echo '</li>';
	}?>

				</ol>
			</nav>
		</div>
	</div>
<?php };?>