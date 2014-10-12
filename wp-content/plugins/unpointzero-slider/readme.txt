=== UnPointZero Slider ===

Contributors: UnPointZero

Tags: slider,featured,home,jquery,picture,slideshow,thumbnail

Requires at least: 2.9

Tested up to: 3.1

Stable tag: 2.1.5

Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JMQUZKHDUR3TG

UnPointZero slider is a plugin that display a slideshow for your news or pages. And it's fully customizable !
V2.0 out ! New features ! Now with multilingual support !



== Description ==

UnPointZero slider is a plugin that display a slideshow for your news or pages !

It's fully customizable with CSS and scale automatically images to the right size.

You can set a basic slider with arrows navigation, number navigation, or advanced with thumbnails (see screenshots).


More information @ http://www.unpointzero.com/unpointzero-slider/
If you need help to install / setup, contact-us @ http://www.unpointzero.com/contact

Warning : Save your custom css file saved in the css directory before updating !
If you've bugs or suggestions, please send us report.

== Changelog ==
v2.1.5 :
- Multilingual support
- New navigation type available ! (see screenshot 3)
- Support multiple sliders on the same website (see how on installation page)
- Corrected few bugs...

v2.1.3 :
- Added new option to set a different size for thumbs title.

v1.1.2 :
- Corrected error "substr() expects parameter 3 to be long", thanks Nathan for reporting this !

v2.1.1 :
- Corrected a bug on next - previous arrows

v2.1 :
- Added shortcode support.

v2.0 :
- Configuration page is now clear.
- You can now hide thumbs/title/description
- Added mouseover support for thumbs
- Added classic slider using jquery cycle. See screenshots.

v1.7.1 :
-Added support of page/posts IDs to avoid some issues. (thx chris lusk for reporting ;))

v1.7 :
- New Option to support non latin languages (like chinese or japanese).
- New Option to prevent blank slides. don't forget to set it if you upgrade !


== Installation ==

Warning : Save your custom css file saved in the css directory before updating !

Setup thumb size BEFORE uploading ! If you set the sizes after the upload, You've to re-upload all thumbs to get the right size.


1. Upload `unpointzero-slider` folder to the `/wp-content/plugins/` directory

2. Activate the plugin through the 'Plugins' menu in WordPress

3. Configure it on your administration panel.

4. Place `<?php do_shortcode('[upzslider]'); ?>` in your templates or [upzslider] on your pages / posts

5. Now you can go on your pages/posts and set thumbnails !

6. That's all !


If you want to display multiple sliders on your website (warning do not support 2 slider on the same page...) use this on your templates or on your pages / posts:

On template files: `<?php do_shortcode('[upzslider interid='IDs or names coma separated' intertype='page OR post']'); ?>`

for example : `<?php do_shortcode('[upzslider interid='3,5,20' intertype='post']'); ?>` to display posts from category 3,5,20

On WP pages/posts: [upzslider interid='IDs or names coma separated' intertype='page OR post']

for example : `[upzslider interid='3,5,20' intertype='post']` to display posts from category 3,5,20


You can modify the CSS file into the css directory. You can modify CSS directly in your template CSS file too (better for updates ;)).



More information @ http://www.unpointzero.com/unpointzero-slider/

== Screenshots ==
1. Slider preview ( you can manage all the elements easily by editing the css file and some options on administration page.
2. Classic style without thumbnails.
3. Navigation with numbers