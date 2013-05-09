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

if($topic == 'business') {
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200222.xml"=>15);
	$title = "Biz Break";
}
else if($topic == 'entertainment'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml"=>15);
	$title = "Entertainment Weekend";
}
else if($topic == 'living') {  
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/213301.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/206801.xml"=>15);
	$title = "Bay Area Living";
}
else if($topic == 'sports') {
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268200.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268201.xml"=>15);
$title = "Inside Sports";
}
else if($topic == 'travel'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200777.xml"=>15);
	$title = "Travel";
}
else if($topic == 'roadshow'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200764.xml"=>5);
	$title = "Mr. Roadshow";
} else if($topic == 'sanmateo'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268907.xml"=>5, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268908.xml"=>2, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268909.xml"=>2);
	$title = "San Mateo Times";
} else if ($topic == 'all') {
	$feedInfo = array(
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200734.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200748.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/209701.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/225007.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/213301.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/206801.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268200.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268201.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200223.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200777.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200764.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268907.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268908.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268909.xml"=>1,
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200732.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200222.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/209705.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200953.xml"=>1);
	$title = "All Feeds";
} else { // defaults to news
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200734.xml"=>3,"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200748.xml"=>3, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/209701.xml"=>3);
$title = "5-Minute Merc";
}

if ($adtag == 'livingnl') {
    $adtag = 'lifeculturenl';
}

?>
