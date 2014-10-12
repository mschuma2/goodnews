<?php
get_header();
?>
<tr>
<td id="tdsidebar">
<div id="sidebar"/>
</td>
<td id="tdnav">
<?php include "menu.php"; ?>
</td>
<td id="tdcontent">
<div id="content">

<?php if (have_posts()) : ?>
           <?php

$post = $posts[0];
?>

                <?php while (have_posts()) : the_post(); ?>
                <div <?php post_class() ?>>

<?php include "post_meta.php"; ?>

                                <div class="entry">
                                        <?php the_content() ?>
                                </div>

                        </div>

                <?php endwhile; ?>

                <div class="navigation">
                        <div class="alignleft"><?php next_posts_link('&laquo; &auml;ltere goodnews') ?></div>
                        <div class="alignright"><?php previous_posts_link('neuere goodnews &raquo;') ?></div>
                </div>
        <?php


else
        : if (is_category()) { // If this is a category archive
                printf("<p>Es wurden keine Eintr&auml;ge f&uuml; %s gefunden.</p>", single_cat_title('', false));
        } else
                if (is_date()) { // If this is a date archive
                        echo ("<p>Es wurden keine Eintr&auml;ge gefunden.</p>");
                } else {
                        echo ("<p>Es wurden keine Eintr&auml;ge gefunden.</p>");
                }
get_search_form();

endif;
?>


</div>
</td>
</tr>

<?php get_footer(); ?>