<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/
?>

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
	<ul>
		 <?php wp_list_categories('title_li='); ?>
	</ul>

</div>
</td>
</tr>

<?php get_footer(); ?>


