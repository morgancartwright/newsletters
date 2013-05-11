<?php
/*
* Email Newsletter main template file (index.php)
* ver. 0.6 5/2/2013 - wmc
* Digital First Media
*/
	
	define("DEFAULT_PROP", "merc");
	define("DEFAULT_TOPIC", "news");
	define("IMAGES_ROOT", 'images');
	define("CLEANUP_SCRIPT","http://qa.cal-one.net/email/clean_markup.php");
	define("IMAGE_FACTOR", 1.3);
	
	$valid_props = array('merc'=>1,'cct'=>2,'sv'=>3,'scs'=>4,'mch'=>5,'mij'=>6,'smct'=>7, 'ect'=>8, 'wct'=>9, 'trivalley'=>10, 'srvt'=>11);
	
	/*
	// where to stash the static images
	IMAGES_ROOT = 'http://extras.bayareanewsgroup.com/images/email';
	*/

	

?>