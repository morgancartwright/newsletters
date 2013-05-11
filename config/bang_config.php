<?php
/*
* Email Newsletter main template file (index.php)
* ver. 0.6 5/2/2013 - wmc
* Digital First Media
*/

if($topic == 'entertainment'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml"=>15);
	$title = "Entertainment Weekend";
}

else if($topic == 'foodwine') {  
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/213301.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/206801.xml"=>15);
	$title = "Food & Wine";
}

else if($topic == 'living') {  
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/253602.xml"=>15);
	$title = "Bay Area Living";
}

else if($topic == 'travel'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/213004.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200953.xml"=>15);
	$title = "Travel";
}

else if($topic == 'roadshow'){
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200764.xml"=>5);
	$title = "Mr. Roadshow";
}

else if ($topic == 'all'){
	$feedInfo = array("http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200884.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml"=>1,  "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/253602.xml"=>1,  "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200223.xml"=>1,  "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/213004.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200734.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200748.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/209701.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/225007.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/213301.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/206801.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268200.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268201.xml"=>1,  "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200223.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200777.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200764.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268907.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268908.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/268909.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200732.xml"=>1,  "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200222.xml"=>1,  "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200733.xml"=>1,  "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/209705.xml"=>1, 
"http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/200953.xml"=>1, 
"http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200819.xml"=>1, 
"http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200884.xml"=>1, 
"http://feeds.contracostatimes.com/mngi/rss/CustomRssServlet/571/200819.xml"=>1); 
	$title = "All Feeds";
}


?>
