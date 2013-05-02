<?php

$property_title = "Contra Costa Times";
$property_url = "contracostatimes.com";
date_default_timezone_set('America/Los_Angeles');
//$images_root = 'http://extras.bayareanewsgroup.com/images/email'; // moved to global config file
$limit = 20; // max number of items that can be displayed
$title = "";

if($topic == 'news'){ // "Top Headlines" - News:5, Sports:5, Business:5
	$feedInfo = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200819.xml"=>5, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200223.xml"=>5, "http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200884.xml"=>5);
	$title = 'Top Headlines';
} else if($topic == 'business') {
	$feedInfo = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200884.xml"=>8);
	$title = "Biz Buzz";
} else if($topic == 'entertainment'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml"=>8);
	$title = 'Entertainment Weekend';
} else if($topic == 'living') {  
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/253602.xml"=>8);
	$title = "Bay Area Living";
} else if($topic == 'sports') {
	$feedInfo = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/267908.xml"=>3, "http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/260983.xml"=>10);
	$title = "Inside Sports";
} else if($topic == 'travel'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/213004.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200953.xml"=>7);
	$title = "Travel";
} else { // defaults to news
	$feedInfo = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200819.xml"=>5, "http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200818.xml"=>5);
	$title = "Top Headlines";
}

if ($adtag == 'livingnl') {
    $adtag = 'lifeculturenl';
}

?>