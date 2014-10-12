<?php


/**
 * @package WordPress
 * @subpackage goodnews1
 */

include "page_ids.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=8" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php

?>


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="rap">

<table class="content_table" ccellpadding="0" cellspacing="0" border="0" align="center">

<tr>
<td><div id="topl"/></td>
<td><div id="topc"/></td>
<td><div id="topr"/></td>
</tr>

<tr id="header_row">
<td colspan="2">
<div id="midl"><h1><?php bloginfo('name'); ?></h1></div>
</td>
<td><div id="midr">
<h2>
<?php


if (is_category()) {
	echo '<!-- cat -->';
	single_cat_title();
} else
	if (is_page()) {
		echo '<!-- page  -->';
		if (wp_title('', false)) {
			wp_title('', true);
		} else {
			bloginfo('description');
		}
	} else if (is_single()) {
			echo '<!-- post -->';
			echo "Aktuell";
			// wp_title('', true);

		} else {
			echo '<!--  other -->';
		}
?>
</h2>
</div></td>
</tr>

<tr>
<td colspan="3"><div id="common">
<?php include "menu_header.php"; ?>

</div></td>
</tr>


<!-- <div id="content"> -->
<!-- end header -->
