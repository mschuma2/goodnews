<?php
get_header();
?>


<tr>
<td id="tdsidebar">
<div id="sidebar">

</div>
</td>
<td id="tdnav">
<?php include "menu.php"; ?>
</td>
<td id="tdcontent">
<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class() ?> id="post-<?php the_ID(); ?>"> 

<?php include "post_meta.php"; ?>

	<div class="storycontent">
		<?php the_content(__('(weiter...)')); ?>
	</div>
</div>


<?php endwhile; else: ?>
<p><?php _e('Es wurde keine entsprechende Seite gefunden.'); ?></p>
<?php endif; ?>

<div id="more">
<?php posts_nav_link(' &#8212; ', __('&laquo; neuere goodnews'), __('&auml;ltere goodnews &raquo;')); ?>
</div>
</div>
</td>
</tr>

<?php get_footer(); ?>
