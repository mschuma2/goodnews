<?php

get_header();
?>




<tr>
<td id="tdsidebar">
<div id="sidebar"></div>
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
<div><br /><br /></div>
<!-- facebook like it button -->
<div class="fb-like" data-send="true" data-width="450" data-show-faces="false" data-font="arial"></div>


<?php endwhile; endif; ?>



<div id="more"></div>
</div>
</td>
</tr>
<ul>



<?php get_footer(); ?>