<div id="nav">
<div class="nav_title">goodnews f&uuml;r sie</div>

<ul class="category_menu">
<?php

include "page_ids.php";
$cat = array('include' =>''.$page_aktuell, 'title_li' => '');
wp_list_categories($cat);
?>
</ul>
<?php
include "page_ids.php";
$excluded=$page_kontakt.','.$page_impressum.','.$page_haftungsausschluss.','.$page_datenschutz.','.$page_start.','.$page_archiv;
// echo $excluded;
$pages = array('exclude' =>$excluded, 'title_li' => '');
?>
<ul class="page_menu">
<?php
wp_list_pages($pages);
?>
</ul>

</div>