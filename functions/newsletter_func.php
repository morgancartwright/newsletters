<?php
/*
* Email Newsletter main template file (index.php)
* ver. 0.6 5/2/2013 - wmc
* Digital First Media
*/	

	ini_set('display_errors', '0');
	require_once 'config/constants.php';
	require_once 'config/global_config.php';
	
	function getFeed($dt, $fi, $ir, $lt){
		// wire it up
		$displayType = intval($dt); // photo only, headlines only, or headlines/blurb/photo
		$allFeeds = $fi; // array of rss feeds
		global $caption; // we reset this for use in index.php
		
		// option: if markup is dirty, run the rss through this script (see constants file)
		//$default_cleanup_script = CLEANUP_SCRIPT;

		// begin processing feeds
		$rss = new DOMDocument(); // create a new doc to hold the output
		$feed = array(); // create array to hold the feed items

		//loop through all the feeds
		foreach($allFeeds as $key=>$value){ // key = rss feed url; value = number of items to display
			//$thisFeed = CLEANUP_SCRIPT . '?feed='.$key;
			$thisFeed = $key;
			$feedItems = $value;
			$rss->load($thisFeed);
			
			//loop though all the items in each feed
			$itemCount = 0;
			$cid_array = array(); // separate array to track dupes
			
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
				
				$url = ($item[link]);
				$path = parse_url($url, PHP_URL_PATH);
				$pathComponents = explode("/", trim($path,"/"));
			
				$cid = $pathComponents[1];
				
				if(!in_array($cid, $cid_array)){
					array_push($feed, $item);
					if ($feed == null){
						echo "does not compute";
					}
					$itemCount++;
					echo "<br /><strong>FEED COUNT IS: </strong>" . count($feed) . "<br /><br /><br /><br />";
					$cid_array[] = $cid; // add this item's cid to the de-dupe array
				}
				
				if($itemCount == $feedItems) {
					break;
				}//if
			}//foreach
		}//foreach
		
		// begin output routines
		$limit = intval($lt); // max number of items that can be displayed
		$displayCount = 1; // number used with head and anchor link - not the same as $limit
		$displayPhotos = $photo; // true or false -- currently a stub
		
		// if #items in feed is less than limit, we swap them
		$arrayLength = count($feed); 
		if($arrayLength < $limit) $limit = $arrayLength;
		
		//loop through each item in the array and store in vars
		for($x=0;$x<$limit;$x++) {
			$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
	    	$link = $feed[$x]['link'];
			$link = str_replace("source=rss", "source=email", $link);
			
	    	$description = $feed[$x]['desc'];
			$byline = $feed[$x]['byl'];
			
			$enclosure_good = TRUE; // this is a stub
			
			if($feed[$x]['enclosure'] == !null) {
				$enclosure = $feed[$x]['enclosure'];
				$enclosure_size = getimagesize($enclosure);
       			$enclosure_width = $enclosure_size[0].'<br>';
       			$enclosure_height = $enclosure_size[1] . '<br>';
				if($enclosure_height > ($enclosure_width * IMAGE_FACTOR)) $enclosure_good = FALSE;
			}
						
	    	$date = date('l F d, Y', strtotime($feed[$x]['date']));
	
			// begin displaying the output
			// dtype 1 is a photo-only item
			if($displayType == 1 && $feed[$x]['enclosure'] == !null) {
				echo  $enclosure;
				$caption = $title;
				break;
			}// if 1
			
			// dtype 2 is a headline-only item
			else if($displayType == 2) {
				include 'includes/headlines_only_top.inc';
				echo $displayCount.' - <a href="#'.$displayCount.'" title="'.$displayCount.'">'.$title.'</a>';
			}// elseif 2
			
			// dtype 3 is a full head/photo/blurb item; last item gets different markup include
			else if($displayType == 3) {
	        	echo '<a name="'.$displayCount.'" id="'.$displayCount.'"></a></span>'.$displayCount.' - '.$title.'</a><br>';
				echo '</td></tr><tr>
	              <td width="100%" colspan="2" bgcolor="#f4f4f4" style="padding-right:20px; padding-bottom:18px; padding-left:20px; 				font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px; line-height:15pt; color:#777777;"><table class="imgContainer" width="96" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border-spacing:0;">
	              <tr>';
				if($feed[$x]['enclosure'] == !null && $enclosure_good == TRUE){ // add photo if you got it
	            	echo '<td class="authorPicture" style="padding-top:5px; padding-right:20px;"><span class="icon" style="padding-top:10px; padding-right:15px; padding-bottom:10px;"><img alt="image" src="'.$enclosure.'" width="110" border="0" vspace="0" hspace="0" style="display:block;" /></span></td>
	              </tr></table>';
				}
				else {
					echo  '</tr></table>';
				}
				echo $description; // blurb
				echo '<br />';
				if($x != ($limit - 1)){ // last item gets different include
					include 'includes/between_full_items.php'; // markup between each item
				} else {
					include 'includes/after_full_items.php'; // markup after final item
				}
				
			}//elseif 3
			
			$displayCount++; // count it and move to next item
			
		} //for
		
	}//end getFeed()

?>