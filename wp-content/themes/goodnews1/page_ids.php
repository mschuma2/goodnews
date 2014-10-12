<?php


/*
 * ID of pages and posts to control which of them are displayed in the menus.
 */

$page_kontakt = get_page_by_path("kontakt");
$page_kontakt = $page_kontakt->ID;
$page_start = get_page_by_path("");
$page_start = $page_start->ID;

$page_start = 29;

$page_impressum = get_page_by_path("impressum");
$page_impressum = $page_impressum->ID;
$page_archiv = get_page_by_path("archiv");
$page_archiv = $page_archiv->ID;
$page_haftungsausschluss = get_page_by_path("haftungsausschluss");
$page_haftungsausschluss = $page_haftungsausschluss->ID;
$page_datenschutz = get_page_by_path("datenschutz");
$page_datenschutz = $page_datenschutz->ID;

$page_aktuell = get_category_by_slug("aktuell");
$page_aktuell = $page_aktuell->term_id;
?>
