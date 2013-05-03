<?php
/*
* Email Newsletter main template file (index.php)
* ver. 0.6 5/2/2013 - wmc
* Digital First Media
*/
// Remove email links from dc:creator element in RSS feeds, because doApp will not display byline if they're there.

$rss = file_get_contents($_GET['feed']);


$feed_string=$_GET['feed'];
$ngps_feed="://feeds.";

//function to add space before stripping HTML
function add_space_if_html($string) {
  // put spaces between tags
  $string = preg_replace('/(<\/[^>]+?>)(<[^>\/][^>]*?>)/', '$1 $2', $string);
  // put space after br tag
  $breaks = array("<br>", "<br />", "<br/>");
  $string = str_replace($breaks, " ", $string);
  return trim($string);

}


//check if feed is from NGPS -- beginning with feeds.
if (strpos($feed_string,$ngps_feed)) { 
  //if it includes  $ngps_feed, then convert converted HTML characters back to HTML
    //echo "it's NGPS";
    
    //$bylineAndCreditLineLinkPattern=html_entity_decode($bylineAndCreditLineLinkPattern);
   // stripslashes(strip_tags(html_entity_decode(("$2"))))
    $byline_replacement='"$1 ".trim((stripslashes(strip_tags(add_space_if_html(html_entity_decode("$2"))))))."$3"';
    $bylineAndCreditLineLinkPattern = '(<dc:creator>)(.+?)(<\/dc:creator>)';
  
   }
 else {
  //echo "it's not NGPS";
  $byline_replacement='"$1 ".trim(stripslashes(strip_tags(add_space_if_html("$2"))))."$3"';
  $bylineAndCreditLineLinkPattern = '(<dc:creator>)<!\[CDATA\[(.+?)\]\]>(<\/dc:creator>)';
 }    

//strip HTML tags from the byline
//$byline_replacement='"$1 ".stripslashes(strip_tags("$2"))."$3"';

$rss = preg_replace("/$bylineAndCreditLineLinkPattern/e", $byline_replacement, $rss);

echo $rss;
?>