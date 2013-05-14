<?php
/*
* Email Newsletter main template file (index.php)
* ver. 0.6 5/2/2013 - wmc
* Digital First Media
*/
$property_title = "San Jose Mercury News";
$property_url = "mercurynews.com";
date_default_timezone_set('America/Los_Angeles');
//IMAGES_ROOT = 'http://extras.bayareanewsgroup.com/images/email';
$limit = 30; // max number of items that can be displayed
$title = "";



if ($topic == 'news') {
	$feedInfo = array('five-min-merc' => array( "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200734.xml"=>3,"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200748.xml"=>3, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/209701.xml"=>3), 'inside_sports' => array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268200.xml"=>3, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268201.xml"=>3);
}

else if($topic == 'business') {
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200222.xml"=>15);
	$title = "Biz Break";
}

else if($topic == 'sports') {
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268200.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268201.xml"=>15);
$title = "Inside Sports";
}

else if($topic == 'sanmateonews'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268907.xml"=>5, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268908.xml"=>2, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268909.xml"=>2);
	$title = "San Mateo Times";
}

else { // call the bang config
	include 'bang_config.php';
}


if ($adtag == 'livingnl') {
    $adtag = 'lifeculturenl';
}


?>
