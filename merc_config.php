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
$limit = 20; // max number of items that can be displayed
$title = "";

if($topic == 'business') {
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200222.xml"=>8);
	$title = "Biz Break";
}
else if($topic == 'entertainment'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml"=>8);
	$title = "Entertainment Weekend";
}
else if($topic == 'living') {  
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200732.xml"=>8);
	$title = "Bay Area Living";
}
else if($topic == 'sports') {
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/209705.xml"=>3, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200223.xml"=>13);
$title = "Inside Sports";
}
else if($topic == 'travel'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200953.xml"=>8);
	$title = "Travel";
}
else if($topic == 'roadshow'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200764.xml"=>7);
	$title = "Mr. Roadshow";
} else if ($topic == 'all') {
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/225007.xml"=>2, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200223.xml"=>2,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200732.xml"=>2, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200222.xml"=>2, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml"=>2, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/209705.xml"=>2, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200953.xml"=>2);
	$title = "All Feeds";
} else { // defaults to news
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/225007.xml"=>4, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200223.xml"=>4,"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200222.xml"=>4, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200732.xml"=>4);
$title = "5-Minute Merc";
}

if ($adtag == 'livingnl') {
    $adtag = 'lifeculturenl';
}

?>
