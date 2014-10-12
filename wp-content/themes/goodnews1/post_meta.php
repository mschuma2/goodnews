
<!-- post meta //-->
<?php if (!is_page()) { ?>
	<h3 class="storytitle">
	<a href="<?php the_permalink(); ?>" rel="bookmark">
	<?php the_title(); ?></a></h3>
	<?php } ?>

<div class = "meta" >
<?php
if (!is_page()) {
	the_time("d.m.Y");
?> <span class="meta_category">&laquo; <?php


	foreach ((get_the_category()) as $category) {
		if ($category->cat_name != "Aktuell") {
			echo '<a href="'.get_category_link($category->term_id).'" title="'.$category->cat_name.'">';
			echo $category->cat_name;
			echo '</a> ';
		}
	}

	//the_category(',');
?>
	&raquo;</span>
	<?php


}
edit_post_link(__('Edit This'));
?>
 </div>
