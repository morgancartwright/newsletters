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

if($topic == 'living') {  
	$feedInfo = array("http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/213301.xml"=>1, "http://feeds.mercurynews.com/mngi/rss/CustomRssServlet/568/206801.xml"=>15);
	$title = "Bay Area Living";
}

?>
