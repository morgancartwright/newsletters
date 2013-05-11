<?php
/*
* Email Newsletter main template file (index.php)
* ver. 0.6 5/2/2013 - wmc
* Digital First Media
*/
$property_title = "San Mateo County Times";
$property_url = "sanmateotimes.com";
date_default_timezone_set('America/Los_Angeles');
//IMAGES_ROOT = 'http://extras.bayareanewsgroup.com/images/email';
$limit = 30; // max number of items that can be displayed
$title = "";

if($topic == 'news'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268907.xml"=>5, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268908.xml"=>2, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268909.xml"=>2);
	$title = "News";
}

else if($topic == 'business') {
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200222.xml"=>15);
	$title = "Business";
}

else if($topic == 'sports') {
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268200.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268201.xml"=>15);
$title = "Inside Sports";
}

else { // call the bang config
	include 'bang_config.php';
}


?>
