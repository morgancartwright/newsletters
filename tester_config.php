<?php

$property_title = "Feed Tester";
$property_url = "mercurynews.com";
date_default_timezone_set('America/Los_Angeles');
//IMAGES_ROOT = 'http://extras.bayareanewsgroup.com/images/email'; // moved to global config file
$limit = 200; // max number of items that can be displayed
$title = "";


	$arrayCCTNews = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200819.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200223.xml"=>1, "http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200884.xml"=>1);
	$arrayCCTBiz = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200884.xml"=>1);
	$arrayCCTLiving = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml"=>1);
	$arrayCCTEnt = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/253602.xml"=>1);
	$arrayCCTSports = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/267908.xml"=>1, "http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/260983.xml"=>1);
	$arrayCCTTravel = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/213004.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200953.xml"=>1);
	$feedInfo = array_merge($arrayCCTNews, $arrayCCTBiz, $arrayCCTLiving, $arrayCCTEnt, $arrayCCTSports, $arrayCCTTravel);
	$title = "Tester";
	

?>