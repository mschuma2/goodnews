<?php	
		if($intertype!=null && $intertype!='') {
		$slider_type = $intertype;
		}
		else {
		$slider_type = get_option('slider-type');
		}
		if($interid!=null && $interid!='') {
		$slider_cat_id = $interid;
		}
		else {
		$slider_cat_id = get_option('slider-category-id');
		}
		$slider_view_number = get_option('slider-view-number');
		$slider_title_max_char = get_option('slider-title-max-char');
		$slider_title_thumb_max_char = get_option('slider-title-thumb-max-char');
		if (($slider_title_thumb_max_char==NULL) || ($slider_title_thumb_max_char=="")) { $slider_title_thumb_max_char = $slider_title_max_char; }
		$slider_desc_max_char = get_option('slider-desc-max-char');

	if(get_option('slider-fetch')!=null)
		$slider_fetch = get_option('slider-fetch');
	elseif(get_option('slider-fetch')==0)
		$slider_fetch = $slider_view_number;
	else
		$slider_fetch = 10;		
		

	
	if($slider_type==1) {
	$allinfos = slider_getinfo_by_cat($slider_cat_id,$slider_view_number,$slider_fetch,$slider_title_max_char,$slider_title_thumb_max_char,$slider_desc_max_char);
	}
	else {
	$allinfos = slider_getpages($slider_cat_id,$slider_view_number,$slider_title_max_char,$slider_title_thumb_max_char,$slider_desc_max_char);
	}
	$permalist = $allinfos[0];
	$titlelist = $allinfos[1];
	$thumbtitlelist = $allinfos[2];
	$contentlist = $allinfos[3];
	$thumb = $allinfos[4];
	$thumb_mini = $allinfos[5];
	
if(((get_option('slider-display-adv-options'))==0 || (get_option('slider-display-adv-options'))==1)&& (get_option('slider-display-thumb'))!=true) {
	?>
	<div id="featured-navi">
		<?php if(get_option('slider-display-adv-options')==0) { ?>
		<a href="#"><span id="previousslide"></span></a>
		<a href="#"><span id="nextslide"></span></a>
		<?php
		}
		if(get_option('slider-display-adv-options')==1) { ?>
		<div id="nav-featured"></div>
		<?php
		}
	}
	?>
<div id="featured" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
<?php
if((get_option('slider-display-thumb'))==true)
	{ ?>
	<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">	
	<?php
	for($i=0;$i<sizeof($permalist);$i++) {
					echo "<li class=\"ui-tabs-nav-item ui-state-default ui-corner-top";
				if ($i==0) {
					echo " ui-state-focus ui-tabs-selected ui-state-active";
				}
					echo "\" id=\"nav-fragment-$i\"><a href=\"#fragment-$i\">$thumb_mini[$i]";
				if ((get_option('slider-display-title'))==true) {
					echo "<span>$thumbtitlelist[$i]</span>";
				}
					echo "</a></li>";
		}
	?>
	</ul>
	<?php
	}
for($j=0;$j<sizeof($permalist);$j++) {
				echo "<div id=\"fragment-$j\" class=\"ui-tabs-panel\" style=\"\"><a href=\"$permalist[$j]\" >$thumb[$j]</a>";
				
				if ((get_option('slider-display-title'))==true || (get_option('slider-display-desc'))==true) {
				echo "<div class=\"info\">";
				
				if ((get_option('slider-display-title'))==true) {
				echo "<h2><a href=\"$permalist[$j]\" >$titlelist[$j]</a></h2>";
				}
				if((get_option('slider-display-desc'))==true) {
					echo "<p><a href=\"$permalist[$j]\" >$contentlist[$j]</a></p>";
				}	
				echo "</div>";
				}
				echo "</div>";
	}
?>
</div>
<?php
if(((get_option('slider-display-adv-options'))==0 || (get_option('slider-display-adv-options'))==1)&& (get_option('slider-display-thumb'))!=true) {
	?>
	</div>
	<?php
	}
	?>