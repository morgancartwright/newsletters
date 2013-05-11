<?php
/*
* Email Newsletter main template file (index.php)
* ver. 0.6 5/2/2013 - wmc
* Digital First Media
*/
$property_title = "Contra Costa Times";
$property_url = "contracostatimes.com";
date_default_timezone_set('America/Los_Angeles');
//IMAGES_ROOT = 'http://extras.bayareanewsgroup.com/images/email'; // moved to global config file
$limit = 20; // max number of items that can be displayed
$title = "";

// set up array of feeds. see bang_config.php for common bang newsletters
if($topic == 'news') {
	$feedInfo = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200819.xml"=>10, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200223.xml"=>5, "http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200884.xml"=>5);
	$title = 'Top Headlines';
}
else if($topic == 'business') {
	$feedInfo = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200884.xml"=>15);
	$title = "Biz Buzz";
}
else if($topic == 'sports') {
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200223.xml"=>15);
	$title = "Inside Sports";
}
else { // pull in the bang config items
	include 'bang_config.php';
}

// for ad tags
if ($adtag == 'livingnl') {
    $adtag = 'lifeculturenl';
}

?>
