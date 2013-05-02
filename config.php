<?php

if($topic == 'news'){
	$feed1 = 'http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200819.xml';
	$feed2 = 'http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/205307.xml';
	//$itemNum = 12;
} else if($topic == 'travel'){
	$feed1 = 'http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200953.xml';
	$feed2 = 'http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/205307.xml';
	//$itemNum = 8;
} else if($topic == 'entertainment'){
	$feed1 = 'http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml';
	$feed2 = 'http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/205307.xml';
	//$itemNum = 10;
} else if($topic == 'living') {
	$feed1 = 'http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml';
	$feed2 = 'http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/205307.xml';
	//$itemNum = 10;
} else if($topic == 'sports') {
	$feed1 = 'http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml';
	$feed2 = 'http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/205307.xml';
	//$itemNum = 12;
} else if($topic == 'business') {
	$feed1 = 'http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml';
	$feed2 = 'http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/205307.xml';
	//$itemNum = 12;
} else { // defaults to news
	$feed1 = 'http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200819.xml';
	$feed2 = 'http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/205307.xml';
	//$itemNum = 8
}

?>