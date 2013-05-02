<?php

$property_title = "Feed Tester";
$property_url = "mercurynews.com";
date_default_timezone_set('America/Los_Angeles');
//$images_root = 'http://extras.bayareanewsgroup.com/images/email'; // moved to global config file
$limit = 200; // max number of items that can be displayed
$title = "";


	$arrayCCTNews = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200819.xml"=>3, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200223.xml"=>3, "http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200884.xml"=>3);
	$arrayCCTBiz = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200884.xml"=>3);
	$arrayCCTLiving = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml"=>3);
	$arrayCCTEnt = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/253602.xml"=>3);
	$arrayCCTSports = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/267908.xml"=>3, "http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/260983.xml"=>3);
	$arrayCCTTravel = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/213004.xml"=>3, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200953.xml"=>3);
	$feedInfo = array_merge($arrayCCTNews, $arrayCCTBiz, $arrayCCTLiving, $arrayCCTEnt, $arrayCCTSports, $arrayCCTTravel);
	$title = "Tester";
	

?>