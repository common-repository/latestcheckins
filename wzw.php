<?php
/*
Plugin Name: LatestCheckins
Plugin URI: http://www.janyksteenbeek.nl/?ref=WP_LatestCheckins
Description: Altijd de laatste Foursquare checkins als widget!
Author: Janyk Steenbeek
Version: 1
Author URI: http://www.janyksteenbeek.nl/
*/
// ^ Plugin details voor Wordpress 
//-----------------------------------------------//


/*
   If you like this plugin, you can donate at:
http://janyksteenbeek.nl/s/latestcheckinsdonate
                 Thank you!
*/

/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    Verander niks hieronder, tenzij je weet wat je doet! 
    Don't change anything below, only if you know what you are doing!
   !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */



//hoofdfunctie
function foursquare_get_checkins($numCheckins = 10) {
	$feedURL = get_option('foursquare-feedURL');
	$numCheckins = get_option('foursquare-numCheckins');
	$feedObject = simplexml_load_file($feedURL . '?count=' . $numCheckins);
	$items = $feedObject->channel;
	//array_unique($items);
	$checkin = $items->item;
	echo '<ul>';
	$count = 0;
	//	var_dump($items);
	foreach ($checkin as $item) {
		if ($item->link != '') {
			echo '<li><a href="'. $item->link .'">' . $item->title . '</a></li>';
		$count++;
		if ($count == $numCheckins) {break;}
		}
	}
	echo '</ul>';
}
//-----------------------------------------------//
//Admin pagina
function wzw_admin() {  
	include('wzw-admin.php');  
}

function wzw_admin_actions() {
	add_options_page("LatestCheckins", "LatestCheckins", 1, "LatestCheckins", "wzw_admin");
}

add_action('admin_menu', 'wzw_admin_actions');

//-----------------------------------------------//
//widget
function wzw() {
$numCheckins = get_option('foursquare-numCheckins'); ?>
  <h2 class="widgettitle">Foursquare</h2>
  <?php foursquare_get_checkins($numCheckins); ?>
<?php
}
 
function wzw_init()
{
  register_sidebar_widget(__('LatestCheckins'), 'wzw');     
}
add_action("plugins_loaded", "wzw_init");
//-----------------------------------------------//
?>