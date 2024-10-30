<?php 
if($_POST['foursquare-hidden'] == 'Y') {
	//Form data sent
	$feedURL = $_POST['foursquare-feedURL'];
	update_option('foursquare-feedURL', $feedURL);
	
	$enableMap = $_POST['foursquare-enableMap'];
	update_option('foursquare-enableMap', $enableMap);
	
	$numCheckins = $_POST['foursquare-numCheckins'];
	update_option('foursquare-numCheckins', $numCheckins);
	
	echo '<div class="updated"><p><strong>Opgeslagen!</strong></p></div>';
} else {
	$feedURL = get_option('foursquare-feedURL');
	$enableMap = get_option('foursquare-enableMap');
	$numCheckins = get_option('foursquare-numCheckins');
}
?>
<script src="https://www.targetpay.com/send/include.js"> </script>
<div class="wrap">
	<?php    echo "<h2>" . __( 'Foursquare instellingen', 'fs-trdom' ) . "</h2>"; ?>
	
	<form name="foursquare-form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="foursquare-hidden" value="Y">  

		<p>Ga naar <a href="http://www.foursquare.com/feeds">foursquare.com/feeds</a> en kopieer je RSS link.</p>
		<p><a href=""http://www.foursquare.com/feeds"><img src="http://i.imgur.com/vSMEa.png" /></a></p>

		<p><?php _e("RSS URL: " ); ?><input type="text" name="foursquare-feedURL" value="<?php echo $feedURL; ?>" size="30" /><?php _e(" bijv.: https://feeds.foursquare.com/history/33333XXXXAAAAMMMPPP111133333.rss" ); ?></p>
	
	
		<h4>Andere opties</h4>
		
		<p><?php _e("Hoeveel checkins moeten er worden laten zien " ); ?><input type="text" name="foursquare-numCheckins" value="<?php echo $numCheckins; ?>" size="4" /> Standaard = 10.</p>

		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Opslaan', 'fs-trdom' ) ?>" />
		</p>
	</form>		
	<h4>Doneren</h4>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="janyk-steenbeek@home.nl">
<input type="hidden" name="lc" value="NL">
<input type="hidden" name="item_name" value="JanykSteenbeek Development">
<input type="hidden" name="item_number" value="WP_LatestCheckins">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="currency_code" value="EUR">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
<input type="image" src="https://www.paypalobjects.com/nl_NL/NL/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, de veilige en complete manier van online betalen.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form> <br/>
<a href="javascript: targetpay(36054, 68303, 'auto', 'auto', '');">Doneer via telefoon of PaySafeCard</a>
</div>
