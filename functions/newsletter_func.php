<?php
/*
* Email Newsletter main template file (index.php)
* ver. 0.6 5/2/2013 - wmc
* Digital First Media
*/	
	require_once 'config/constants.php';
	require_once 'config/global_config.php';
	
	function getFeed($dt, $fi, $ir, $lt){
		// wire it up
		$displayType = intval($dt); // photo only, headlines only, or headlines/blurb/photo
		$allFeeds = $fi; // array of rss feeds
		// run the rss through this script to delete extra markup
		//$default_cleanup_script = 'http://qa.cal-one.net/newsletters/clean_markup.php?feed=';
		//IMAGES_ROOT = $ir; //'http://extras.bayareanewsgroup.com/images/email'; // stub: will have a global config for this
		// begin processing feeds
		$rss = new DOMDocument(); // create a new doc to hold the output
		$feed = array(); // create array to hold the feed items

		//loop through all the feeds
		foreach($allFeeds as $key=>$value){ // key = rss feed url; value = number of items to display
			//$thisFeed = $default_cleanup_script.$key;
			//$thisFeed = CLEANUP_SCRIPT . '?feed='.$key;
			$thisFeed = $key;
			$feedItems = $value;
			$rss->load($thisFeed);
			
			//loop though all the items in each feed
			$itemCount = 0;
	    	foreach ($rss->getElementsByTagName('item') as $node) {
				if($node->getElementsByTagName('enclosure')->item(0) == !null) {
					$item = array (
	        			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
	        			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
	        			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
						'byl' => $node->getElementsByTagNameNS('*','creator')->item(0)->nodeValue,
	        			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
						'enclosure' => $node->getElementsByTagName('enclosure')->item(0)->getAttribute('url'),
	        		);
				}//if
				else {
					$item = array (
	            		'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
	            		'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
	            		'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
						'byl' => $node->getElementsByTagNameNS('*','creator')->item(0)->nodeValue,
	            		'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
					);
				}//else
				array_push($feed, $item);
				$itemCount++;
				if($itemCount == $feedItems) {
					break;
				}//if
			}//foreach
		}//foreach
		
		// begin output routines
		$limit = intval($lt); // max number of items that can be displayed
		$displayCount = 1; // number used with headline and anchor link
		$displayPhotos = $photo; // true or false--currently a stub
		
		// if #items in feed is less than limit, we swap them
		$arrayLength = count($feed); 
		if($arrayLength < $limit) $limit = $arrayLength;
		
		//loop through each item in the array and store in vars
		for($x=0;$x<$limit;$x++) {
			$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
	    	$link = $feed[$x]['link'];
	    	$description = $feed[$x]['desc'];
			$byline = $feed[$x]['byl'];
			if($feed[$x]['enclosure'] == !null) {
				$enclosure = $feed[$x]['enclosure'];
			}
	    	$date = date('l F d, Y', strtotime($feed[$x]['date']));
			
			// begin displaying the output
			// if this is a photo-only item ...
			if($displayType == 1 && $feed[$x]['enclosure'] == !null) {
				echo  $enclosure;
				break;
			}// if 1
			
			// if this is a headline-only item ...
			else if($displayType == 2) {
				include 'includes/headlines_only_top.inc';
				echo $displayCount.' - <a href="#'.$displayCount.'" title="'.$displayCount.'">'.$title.'</a>';
			}// elseif 2
			
			// if this is a full head/photo/blurb item ...
			else if($displayType == 3) {
	        	echo '<a name="'.$displayCount.'" id="'.$displayCount.'"></a></span>'.$displayCount.' - '.$title.'</a><br>';
				echo '</td></tr><tr>
	              <td width="100%" colspan="2" bgcolor="#f4f4f4" style="padding-right:20px; padding-bottom:18px; padding-left:20px; 				font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px; line-height:15pt; color:#777777;"><table class="imgContainer" width="96" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border-spacing:0;">
	              <tr>';
				if($feed[$x]['enclosure'] == !null){ // add photo if you got it
	            	echo '<td class="authorPicture" style="padding-top:5px; padding-right:20px;"><span class="icon" style="padding-top:10px; padding-right:15px; padding-bottom:10px;"><img alt="image" src="'.$enclosure.'" width="110" border="0" vspace="0" hspace="0" style="display:block;" /></span></td>
	              </tr></table>';
				}
				else {
					echo  '</tr></table>';
				}
				echo $description; // blurb
				echo '<br />';
				include 'includes/between_full_items.php'; // markup between each item
				
			}//elseif 3
			$displayCount++; // count it and move to next item
			
		} //for
		
	}//end getFeed()

?>