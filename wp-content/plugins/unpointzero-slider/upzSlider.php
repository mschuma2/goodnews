<?php

/*

Plugin Name: UnPointZero content Slider

Plugin URI: http://www.unpointzero.com/unpointzero-slider/

Description: A customizable slider for your featured content by UnPointZero WebAgency

Version: 2.1.5

Author: Jordan Matejicek - UnPointZero

Author URI: http://www.UnPointZero.com

*/

// Add thumb support
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

// Installation
register_activation_hook( __FILE__, 'upzSlider_activate' );

function upzSlider_activate() {
	add_option("slider-type", '1', '', 'yes');
	add_option("slider-nameorid", '0', '', 'yes');
	add_option("slider-fetch", '10', '', 'yes');
	add_option("slider-view-number", '4', '', 'yes');
	add_option("slider-title-max-char", '50', '', 'yes');
	add_option("slider-title-thumb-max-char", '50', '', 'yes');
	add_option("slider-desc-max-char", '150', '', 'yes');
	add_option("slider-bigthumb-x", '419', '', 'yes');
	add_option("slider-bigthumb-y", '248', '', 'yes');
	add_option("slider-smallthumb-x", '85', '', 'yes');
	add_option("slider-smallthumb-y", '50', '', 'yes');
	add_option("slider-display-thumb", '1', '', 'yes');
	add_option("slider-display-title", '1', '', 'yes');
	add_option("slider-display-desc", '1', '', 'yes');
	add_option("slider-mouseover-action", '0', '', 'yes');
	add_option("slider-display-adv-options", '3', '', 'yes');
	add_option("slider-nonlatin", '0', '', 'yes');
	
	
	
}

// Add size for WP admin ( v 1.3 )
function add_upz_thumb() {
		$slider_bigthumb_x = get_option('slider-bigthumb-x');
		$slider_bigthumb_y = get_option('slider-bigthumb-y');
		$slider_smallthumb_x = get_option('slider-smallthumb-x');
		$slider_smallthumb_y = get_option('slider-smallthumb-y');
		
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'upz-big', $slider_bigthumb_x, $slider_bigthumb_y,true );
	add_image_size( 'upz-small', $slider_smallthumb_x, $slider_smallthumb_y,true );
}
}


/* Page d'options */

$options_page = get_option('siteurl') . '/wp-admin/admin.php?page=unpointzero-slider/Options.php';

/* Ajout de la page d'options dans l'administration Wordpress */

function slider_options_page() {

	add_options_page('UnPointZero Content Slider Options', 'UnPointZero Slider', 10, 'unpointzero-slider/Options.php');

}



/* Code necessaire au header du site pour bon fonctionnement du plugin */

function script_load() {
	if((get_option('slider-mouseover-action')==true) && (get_option('slider-display-thumb')==true)) {
	wp_enqueue_script('upz-slider-mouseoveraction', get_bloginfo('url') . '/wp-content/plugins/unpointzero-slider/libs/slider-mouseover.js', '1.0');
	}
	if(get_option('slider-display-thumb')==true) {
	wp_enqueue_script('upz-slider', get_bloginfo('url') . '/wp-content/plugins/unpointzero-slider/libs/slidercfg.js', array('jquery', 'jquery-ui-tabs'), '1.0');
	}
	else {
	wp_enqueue_script('jquery-cycle', get_bloginfo('url') . '/wp-content/plugins/unpointzero-slider/libs/jquery.cycle.all.min.js', array('jquery'));
		if(get_option('slider-display-adv-options')==1) {
		wp_enqueue_script('cycle-nav', get_bloginfo('url') . '/wp-content/plugins/unpointzero-slider/libs/cycle-nav.js', array('jquery'));
		}
		elseif(get_option('slider-display-adv-options')==0) {
		wp_enqueue_script('cycle', get_bloginfo('url') . '/wp-content/plugins/unpointzero-slider/libs/cycle.js', array('jquery'));
		}
	}
}

function slider_styles() {

	$slider_path =  get_bloginfo('wpurl')."/wp-content/plugins/unpointzero-slider/";

	if(get_option('slider-display-thumb')==true) {
	$sliderscript = "
    <link rel=\"stylesheet\" href=\"".$slider_path."css/slider.css\" type=\"text/css\" media=\"screen\" charset=\"utf-8\"/>
	";
	}
	else {
	$sliderscript = "
    <link rel=\"stylesheet\" href=\"".$slider_path."css/slider-cycle.css\" type=\"text/css\" media=\"screen\" charset=\"utf-8\"/>
	";	
	}
	echo($sliderscript);

}



/* Récuperation des posts souhaités 

	@param int category 				:	la catégorie du post

	@param int number 					:	le nombre de news à afficher

	@param int slider_title_max_char	:	le nb de caractères max pour les titres

	@param int slider_desc_max_char		:	le nb de caractères max pour les descriptions

*/


function tronc_str($str,$limit) {
$pattern = '(?<=^|>)[^><]+?(?=<|$)';
if (((strlen($str) > $limit) || ($limit==NULL)) && (is_numeric($limit))) { 
				$content = preg_replace("#\[.*?\]#", "", $str);
				$content = strip_tags($content,'<p>');

				if(get_option('slider-nonlatin')==0 || get_option('slider-nonlatin')==NULL) {
				$content = substr($content, 0, $limit);
				$position_espace = strrpos($content, " "); 
				$content = substr($content, 0, $position_espace); 
				}
				else
				{
				$content = mb_substr($content, 0, $limit); 		
				}
				$content = $content."...";
				}
				
				else {
				$content = $str;
				}
				
return $content;
}


function slider_getinfo_by_cat($category,$number,$fetch,$slider_title_max_char,$slider_title_thumb_max_char,$slider_desc_max_char) {
	global $post;
	
	if(get_option('slider-nameorid')=="1") {
		$c_name = $category;
	}
	else {
		$c_name_array = preg_split('/,/', $category);
		for($i=0;$i<sizeof($c_name_array);$i++) {
		$c_name.= get_cat_ID($c_name_array[$i]).",";
		}
	}
	
	if($category!="" || $category!=0) {	
	$category = "&category=".$c_name;
	}

	else {
	$category = "";
	}

	$myposts = get_posts("post_status=\"publish\"&numberposts=$fetch$category");

	$postok_number = 0;
	
	foreach($myposts as $post) :
		if(has_post_thumbnail($post->ID)) {
		$post_perma[] = get_permalink($post->ID);
		// Récuperation des options
		$title = "";
		$title = tronc_str(__($post->post_title),$slider_title_max_char);
		$post_title[] = $title;
		
		$thumb_title = "";
		$thumb_title = tronc_str(__($post->post_title),$slider_title_thumb_max_char);
		$post_thumb_title[] = $thumb_title;

		$content = "";
		$content = tronc_str(__($post->post_content),$slider_desc_max_char);
		$post_content[] = $content;

		$thumb[] =  get_the_post_thumbnail( $post->ID,'upz-big');

		$thumb_mini[] =  get_the_post_thumbnail( $post->ID,'upz-small');
		
			if(sizeof($post_title)==$number) {
			wp_reset_query();
			return array($post_perma,$post_title,$post_thumb_title,$post_content,$thumb,$thumb_mini);
			}		
			
		}
	endforeach;
	wp_reset_query();
	return array($post_perma,$post_title,$post_thumb_title,$post_content,$thumb,$thumb_mini);
}



/* Récuperation des pages */
function slider_getpages($pages_id,$number,$slider_title_max_char,$slider_title_thumb_max_char,$slider_desc_max_char) {
	$p_name = preg_split('/,/', $pages_id);
	for($i=0;$i<$number;$i++) {
		if(get_option('slider-nameorid')=="1" && is_numeric($p_name[$i])) {
		$page = get_page($p_name[$i]);
		}
		else {
		$page = get_page_by_title($p_name[$i]);	
		}
		
			if(has_post_thumbnail($page->ID) && $page->post_status=="publish") {
			$page_perma[] = get_permalink($page->ID);
			
			$title = "";
			$title = tronc_str(__($page->post_title),$slider_title_max_char);
			$page_title[] = $title;
			
			$thumb_title = "";
			$thumb_title = tronc_str(__($page->post_title),$slider_title_thumb_max_char);
			$post_thumb_title[] = $thumb_title;
			
			$content = "";
			$content = tronc_str(__($page->post_content),$slider_desc_max_char);
			$page_content[] = $content;
			
			$thumb[] =  get_the_post_thumbnail( $page->ID,'upz-big');

			$thumb_mini[] =  get_the_post_thumbnail( $page->ID,'upz-small');
			}
	}
	wp_reset_query();
	return array($page_perma,$page_title,$post_thumb_title,$page_content,$thumb,$thumb_mini);
}

function upzslidershortcode_func($atts) {
	extract( shortcode_atts( array(
		'interid' => '',
		'intertype' => ''
	), $atts ) );
	
	if(strtolower($intertype)=="post") {
		$intertype = 1;
	}
	elseif(strtolower($intertype)=="page") {
		$intertype = 2;
	}
	
	include('wp-content/plugins/unpointzero-slider/Slider.php');
}


/* On ajoute les actions ... */

add_action('template_redirect', 'script_load');
add_action('wp_head', 'slider_styles');
add_action('admin_init', 'add_upz_thumb');
add_action('admin_menu', 'slider_options_page');
add_shortcode( 'upzslider', 'upzslidershortcode_func');


?>