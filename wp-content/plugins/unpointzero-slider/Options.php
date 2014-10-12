<?php include("form_builder_func.php");?>
<div class="wrap">
	<h2>Slider setup</h2>
	<p>Visit <a href="http://www.unpointzero.com/unpointzero-slider/">our page</a> for more informations.</p><br />
	<div style="padding-top: 5px"></div>
	<h3>Show your support</h3>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tbody>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Buy me a Beer
				</th>
				<td><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="TTV24MVLF5SEQ">
					<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
					</form>
					<p class="setting-description" style="margin:5px 10px;">Thank you !</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Write a comment
				</th>
				<td><a href="http://www.unpointzero.com/unpointzero-slider#comment" target="_blank">Write a comment on our website</a>
					<p class="setting-description" style="margin:5px 10px;">If you like this plugin, tell us !</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Add a link on your pages
				</th>
				<td>
					<p class="setting-description" style="margin:5px 10px;">Support us to give you more free content ! Add a link to <a href="http://www.UnPointZero.com">http://www.UnPointZero.com</a> somewhere on your website !</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Follow us
				</th>
				<td>
					<a href="http://twitter.com/Unpointzero">On Twitter</a> - <a href="http://www.facebook.com/pages/UnPointZero/179727552061113">On Facebook</a>
					<p class="setting-description" style="margin:5px 10px;">On your social network</p>
				</td>
			</tr>
		</tbody>
	</table>	

	<form method="post" action="options.php"><?php wp_nonce_field('update-options'); ?>
	<fieldset name="general_options" class="options">	
	<h3>Embed code and shortcode</h3>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tbody>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Shortcode code is:
				</th>
				<td><?php form_input("shortcode_code","[upzslider]",80); ?>
					<p class="setting-description" style="margin:5px 10px;">Copy/Paste this code on your pages/posts to display the slider</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Embed code:
				</th>
				<td><?php form_input("embed_code","<?php do_shortcode('[upzslider]'); ?>",80);?>
					<p class="setting-description" style="margin:5px 10px;">Copy/Paste this code on your template to display the slider</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Shortcode for multiple slider:
				</th>
				<td><?php form_input("shortcode_multiple_code","[upzslider interid='ids OR names' intertype='post OR page']",80);?>
					<p class="setting-description" style="margin:5px 10px;">Copy/Paste this code on your template to display the slider.<br />If you want to display posts from category 3,5 and 20 from posts just write [upzslider interid="3,5,20" intertype="post"]</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Embed code for multiple slider:
				</th>
				<td><?php form_input("embed_code","<?php do_shortcode('[upzslider interid='ids OR names' intertype='post OR page']'); ?>",80);?>
					<p class="setting-description" style="margin:5px 10px;">Copy/Paste this code on your template to display the slider<br />If you want to display posts from category 3,5 and 20 from posts replace with [upzslider interid="3,5,20" intertype="post"]</p>
				</td>
			</tr>
		</tbody>
	</table>
	
	<h3>General options</h3>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tbody>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Page or posts:
				</th>
				<td><?php form_radio("slider-type",array('1'=>"Posts",'2'=>"pages"),get_option('slider-type'));?>
					<p class="setting-description" style="margin:5px 10px;">Select to display pages of posts</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Names / IDs:
				</th>
				<td><?php form_input("slider-category-id",get_option('slider-category-id'));?>
					<p class="setting-description" style="margin:5px 10px;">Names / ID of the posts category (multiple allowed, coma separated) <b>OR</b> Pages names / Pages ID (multiple allowed, coma separated. Use IDs if you've issues)</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					IDs ?:
				</th>
				<td><?php form_checkbox("slider-nameorid","Using IDs","1",get_option('slider-nameorid')); ?>
					<p class="setting-description" style="margin:5px 10px;">If you're using IDs instead of names, check this case</p>
				</td>
			</tr>	
		</tbody>
	</table>
	
	<h3>Only for POSTS settings</h3>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tbody>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Number of posts:
				</th>
				<td><?php
				form_radio("slider-fetch",array(-1=>"all blog posts (Warning can overload your server [not recommanded])",10=>"10 posts (recommanded if you display 2 to 8 slides  [default])",20=>"20 posts (recommanded if you display 8 to 16 slides)",0=>"Auto (recommanded if you always set a thumb to your posts)"),get_option('slider-fetch'));?>
					<p class="setting-description" style="margin:5px 10px;">Number of posts to check - this option prevents displaying of blank thumbnail</p>
				</td>
			</tr>
		</tbody>
	</table>
	
	<h3>Display settings</h3>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tbody>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Number of slides:
				</th>
				<td><?php form_input("slider-view-number",get_option('slider-view-number')); ?>
					<p class="setting-description" style="margin:5px 10px;">Number of slides you want to display</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Max. number of characters for the title:
				</th>
				<td><?php form_input("slider-title-max-char",get_option('slider-title-max-char')); ?>
					<p class="setting-description" style="margin:5px 10px;">Number of characters you want to display for the title</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Max. number of characters for the title (thumbnail):
				</th>
				<td><?php form_input("slider-title-thumb-max-char",get_option('slider-title-thumb-max-char')); ?>
					<p class="setting-description" style="margin:5px 10px;">Number of characters you want to display for the title on the thumbnail. (Only if thumbnails activated)</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Max. number of caracters for the description:
				</th>
				<td><?php form_input("slider-desc-max-char",get_option('slider-desc-max-char')); ?>
					<p class="setting-description" style="margin:5px 10px;">Number of characters you want to display for the description</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Width size ( in PX ) of the front image:
				</th>
				<td><?php form_input("slider-bigthumb-x",get_option('slider-bigthumb-x')); ?>
					<p class="setting-description" style="margin:5px 10px;">The width size of the big image</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Height size ( in PX ) of the front image:
				</th>
				<td><?php form_input("slider-bigthumb-y",get_option('slider-bigthumb-y')); ?>
					<p class="setting-description" style="margin:5px 10px;">The height size of the big image</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Width size ( in PX ) of the small image:
				</th>
				<td><?php form_input("slider-smallthumb-x",get_option('slider-smallthumb-x')); ?>
					<p class="setting-description" style="margin:5px 10px;">The width size of the small image (only if thumbnails enabled)</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Height size ( in PX ) of the small image:
				</th>
				<td><?php form_input("slider-smallthumb-y",get_option('slider-smallthumb-y')); ?>
					<p class="setting-description" style="margin:5px 10px;">The height size of the small image (only if thumbnails enabled)</p>
				</td>
			</tr>
		</tbody>
	</table>
	
	
	<h3>Slider style</h3>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tbody>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Display thumbs:
				</th>
				<td><?php form_checkbox("slider-display-thumb","Thumbnails",true,get_option('slider-display-thumb')); ?>
					<p class="setting-description" style="margin:5px 10px;">Uncheck to disable thumbs. This will display a classic slider. Check on "Advanced CSS/JS settings" for advanced options.</p>
				</td>
			</tr>
		</tbody>
	</table>
	
	<h3>Advanced display settings</h3>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tbody>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Display:
				</th>
				<td><?php form_checkbox("slider-display-title","Title",true,get_option('slider-display-title')); ?>
					<?php form_checkbox("slider-display-desc","Description",true,get_option('slider-display-desc')); ?>
					<p class="setting-description" style="margin:5px 10px;">Uncheck to disable</p>
				</td>
			</tr>
		</tbody>
	</table>
	
	<h3>Advanced CSS/JS settings</h3>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tbody>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Actions:
				</th>
				<td><?php form_checkbox("slider-mouseover-action","Mouseover action on thumb",true,get_option('slider-mouseover-action')); ?>
					<p class="setting-description" style="margin:5px 10px;">Rotate slide on mouseover. Check to enable (works only if thumbs enabled)</p>
				</td>
			</tr>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Display advanced options:
				</th>
				<td><?php
				$defaultadw = get_option('slider-display-adv-options');
				if($defaultadw==NULL) { $defaultadw=3; }
				form_select("slider-display-adv-options",array(0=>"Arrows",1=>"Navigation",3=>"OFF"),$defaultadw); ?>
					<p class="setting-description" style="margin:5px 10px;">Display arrows for previous / next navigation OR navigation (1,2,3...).</p>
				</td>
			</tr>
		</tbody>
	</table>
	
	<h3>Other settings</h3>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tbody>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Non-latin languages:
				</th>
				<td><?php form_radio("slider-nonlatin",array(0=>"OFF[default]",1=>"ON"),get_option('slider-nonlatin')); ?>
					<p class="setting-description" style="margin:5px 10px;">Non-latin languages (set to ON only if you're displaying non-latin characters...japanese,hebrew...)</p>
				</td>
			</tr>
		</tbody>
	</table>
	
	<h3>Informations</h3>
	<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tbody>
			<tr>
				<th width="30%" valign="top" style="padding-top:10px;">
					Report a bug:
				</th>
				<td>
					<p class="setting-description" style="margin:5px 10px;"><a href="http://www.unpointzero.com/contact/" target="_blank">Report a bug</a></p>
				</td>
			</tr>
		</tbody>
	</table>	
	
	<input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="slider-category-id,slider-view-number,slider-title-max-char,slider-desc-max-char,slider-bigthumb-x,slider-bigthumb-y,slider-smallthumb-x,slider-smallthumb-y,slider-type,slider-fetch,slider-nonlatin,slider-nameorid,slider-display-title,slider-display-desc,slider-display-thumb,slider-display-adv-options,slider-mouseover-action,slider-title-thumb-max-char" />
	<p class="submit"><input class="button-primary" type="submit" name="Submit" value="<?php _e('Update Options') ?>" /></p>
	</form>
</div>