<?php
/*
* Email Newsletter main template file (index.php)
* ver. 0.6 5/2/2013 - wmc
* Digital First Media
*/
$property_title = "West County Times";
$property_url = "mywestcountytimes.com";
date_default_timezone_set('America/Los_Angeles');

$limit = 30; // max number of items that can be displayed
$title = "";

if($topic == 'news'){
	$feedInfo = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/269009.xml"=>10, "http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/244701.xml"=>10);
	$title = "News";
}

else if($topic == 'business') {
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200222.xml"=>15);
	$title = "Business";
}

else if($topic == 'sports') {
	$feedInfo = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/244701.xml"=>15);
$title = "Inside Sports";
}

else { // call the bang config
	include 'bang_config.php';
}


?>
