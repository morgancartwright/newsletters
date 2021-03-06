<?php
/*
* Email Newsletter main template file (index.php)
* ver. 0.6 5/2/2013 - wmc
* Digital First Media
*/

	if(is_readable('config/constants.php')) {
	    require_once 'config/constants.php';
	} else {
	    include('includes/404_constants.php');
	}	
	if(is_readable('config/global_config.php')) {
	    require_once 'config/global_config.php';
	} else {
	    include('includes/404_global_config.php');
	}
	
	// grab the query string values from the URL and store in vars
	// see constants.php for valid props array and default prop
	$property = strtolower(htmlspecialchars($_GET["prop"]));
	if (!array_key_exists($property, $valid_props)) {
    	$property = DEFAULT_PROP;
	}
	unset($valid_props);
	
	$topic = "";
	$topic  = strtolower(htmlspecialchars($_GET["nl"]));
	if($topic == "") $topic = DEFAULT_TOPIC;
	
	//$name = ucwords(htmlspecialchars($_GET["name"])); // stub for customer name
	$prefix = $property . "_"; 
	$config_file = 'config/'.$property . "_config.php"; // includes $feedInfo feed array
	
	$func_file = 'functions/newsletter_func.php'; // main functions file
	// Convert topic to ad tag category. 
	$adtag = $topic . 'nl'; // ad tags include URLs with e.g 'sportsnl' for category
	
	$caption = "";
	
	$limit = 20; // default list items if not defined per feed in 'prop_config.php' - also for global config
	
	if(is_readable($config_file)) {
	    require_once $config_file;
	} else {
	    include('includes/404_prop_config.php');
	}
	if(is_readable($func_file)) {
	    require_once $func_file;
	} else {
	    include('includes/404.php');
	}

	$short_title = ucwords( str_replace('-', ' ', $topic) );
	
	// Buffer the output so we can get the first headline and use it
	 //in the window title, which becomes the email subject.
	ob_start();
	
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<head>
		<title><?php echo $title ?></title>
		<?php include 'stylesheets/newsletter.css'; ?>  
	</head>
	<body>
	<!-- following is for development feed testing only -->
	<!-- <pre></pre><?php print_r($feedInfo); ?></pre><br /> -->
	<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; background-color:#dddddd;">
	    <tr>
	        <td class="container" style="padding-left:15px; padding-right:15px; font-family: Arial, Helvetica, sans-serif;">
				<!-- Start of logo and phone number -->
	            <table class="row" width="610" bgcolor="#ffffff" align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; text-align:left; border-spacing:0; max-width:100%;">
	                <!-- <tr>
	                  <td colspan="2" bgcolor="#dddddd" style="padding-top:10px; padding-bottom:5px; font-family:Arial, Helvetica, sans-serif; font-size:11px; line-height:100%; color:#777777; text-align:center; -webkit-text-size-adjust:none;">Problem viewing email? <a style="text-decoration:underline; color:#0c87c7;" href="#">Click here to view it online</a>. </td>
	                </tr> -->
	                <tr>
	                  <td colspan="2" bgcolor="#dddddd" style="padding-top:10px; padding-bottom:5px; font-family:Arial, Helvetica, sans-serif; font-size:11px; line-height:100%; color:#777777; text-align:center; -webkit-text-size-adjust:none;">&nbsp;</td>
	              </tr>
	                <tr>
	                    <td width="50%" height="5" valign="top" style="font-size:2px; line-height:0px;"><img alt="" src="<?php echo IMAGES_ROOT ?>/borderTopLeft.png" width="5" height="5" align="left" vspace="0" hspace="0" border="0" style="display:block; margin:0;" /></td>
	                    <td width="50%" height="5" valign="top" style="font-size:2px; line-height:0px;"><img alt="" src="<?php echo IMAGES_ROOT ?>/borderTopRight.png" width="5" height="5" align="right" vspace="0" hspace="0" border="0" style="display:block; margin:0;" /></td>
	                </tr>
	                <tr>
	                	<td colspan="2">
	                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; text-align:left; border-spacing:0; max-width:100%; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:100%; color:#777777;">
	                            <tr>
	                                <td class="logo" width="50%" style="padding-top:10px; padding-right:15px; padding-bottom:10px; padding-left:30px; font-family:'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:24px; line-height:25pt; color:#0c87c7; font-weight:300;">
	                                    <div style="margin-top:0px; margin-bottom:0px !important; padding:0px; line-height:100%;"> <a href="http://<?php echo $property_url; ?>"><img src="<?php echo IMAGES_ROOT . "/" . $prefix; ?>logo.png" width="232" alt="Logo" hspace="0" vspace="0" border="0" style="display:block; max-width:100%; height:auto !important; color: #2E5C89;" /></a>
	                                    </div>
	                                </td>
	                                <td class="phone2" width="50%" style="padding-top:17px; padding-right:30px; padding-bottom:20px; padding-left:15px; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:100%; color:#777777; text-align:right;"><!-- <a style="text-decoration:underline; color:#0c87c7;" href="#">previous issue<br />
	                                </a> <br /> -->
	                                  <?php $today=date('l, F j, Y'); echo $today; ?>
	                                  <div class="phoneNumber" style="margin-top:0px; margin-bottom:0px; padding:0px; font-size:24px; line-height:24px; font-weight:300; color:#777777; font-family:'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif;"><?php echo $title ?></div>
	                              </td>
	                            </tr>
	                        </table>
	                    </td>
	                </tr>
	                <tr>
	                    <td width="50%" height="5" valign="bottom" style="font-size:2px; line-height:0px;"><img alt="" src="<?php echo IMAGES_ROOT ?>/borderBottomLeft.png" width="5" height="5" align="left" vspace="0" hspace="0" border="0" style="display:block; margin:0;" /></td>
	                    <td width="50%" height="5" valign="bottom" style="font-size:2px; line-height:0px;"><img alt="" src="<?php echo IMAGES_ROOT ?>/borderBottomRight.png" width="5" height="5" align="right" vspace="0" hspace="0" border="0" style="display:block; margin:0;" /></td>
	                </tr>
	                <tr>
	                    <td colspan="2" bgcolor="#dddddd" valign="top" style="padding-bottom:20px; font-size:2px; line-height:0px; text-align:center;"><img alt="" src="<?php echo IMAGES_ROOT ?>/shadow_610.png" height="10" width="610" border="0" vspace="0" hspace="0" style="width:100% !important; height:10px !important;" /></td>
	                </tr>
	            </table>
				<!-- End of logo and phone number -->
				<!-- Start of layout with sidebar -->            
	      <table class="row" width="610" bgcolor="#ffffff" align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; text-align:left; border-spacing:0; max-width:100%;">
	                <tr>
	                    <td width="100%" colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:12px; line-height:15pt; color:#777777;">
	<!-- BEGIN TOP PHOTO FEED: ITEMNUM IS OVERRIDEN IN FUNCTION TO BE 1 -->
	<img alt="image" src="<?php getFeed(1, $feedInfo, IMAGES_ROOT, $limit); ?>" width="610" border="0" vspace="0" hspace="0" style="display:block; width:100% !important; height:auto !important;" />
	<!-- END TOP PHOTO FEED -->
	                    </td>
	                </tr>
					<tr><td style="padding-top:2px; padding-right:0px; padding-bottom:10px; padding-left:2px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:13px; line-height:15pt; color:#777777;">
<?php echo '&nbsp;'.$caption; ?></td></tr>
					
					
		
<!-- begin 1st ad  -->
<tr><td colspan="2" valign="top" class="column" style="padding-right:0px; padding-bottom:25px; padding-left:5px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px; line-height:15pt; color:#777777;"><span style="padding-right:0px; padding-bottom:30px; padding-left:0px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px; line-height:15pt; text-align:center; color:#777777;">
<!-- BEGIN AD CODE 1 -->
<table border="0" cellpadding="0" cellspacing="0" align="center"><tr><td colspan="2" style="text-align:center;">
<br />
<a style="display: block; width: 300px; height: 250px;" href="http://MY.HEZIE.COM/click?s=56430&t=newsletter&sz=300x250&li={LIST_ID}&e={EMAIL}&p={PLACEMENT_ID}" rel="nofollow"><img src="http://MY.HEZIE.COM/imp?s=56430&t=newsletter&sz=300x250&li={LIST_ID}&e={EMAIL}&p={PLACEMENT_ID}" border="0" width="300" height="250"/></a></td></tr><tr style="display:block; height:1px; line-height:1px;"><td><img src="http://MY.HEZIE.COM/imp?s=56431&t=newsletter&sz=1x1&li={LIST_ID}&e={EMAIL}&p={PLACEMENT_ID}" height="1" width="10" /></td><td><img src="http://MY.HEZIE.COM/imp?s=56432&t=newsletter&sz=1x1&li={LIST_ID}&e={EMAIL}&p={PLACEMENT_ID}" height="1" width="10" /></td></tr><tr><td align="left"><a href="http://MY.HEZIE.COM/click?s=4677&t=newsletter&sz=116x15&li={LIST_ID}&e={EMAIL}&p={PLACEMENT_ID}" rel="nofollow"><img src="http://MY.HEZIE.COM/imp?s=4677&t=newsletter&sz=116x15&li={LIST_ID}&e={EMAIL}&p={PLACEMENT_ID}" border="0"/></a></td><td align="right"><a href="http://MY.HEZIE.COM/click?s=4678&t=newsletter&sz=69x15&li={LIST_ID}&e={EMAIL}&p={PLACEMENT_ID}" rel="nofollow"><img src="http://MY.HEZIE.COM/imp?s=4678&t=newsletter&sz=69x15&li={LIST_ID}&e={EMAIL}&p={PLACEMENT_ID}" border="0"/></a></td></tr></table>
<!-- END AD CODE 1 -->
</span><br /></td></tr>
		
					
				
	  <tr>
	     <td width="100%" colspan="2">
		 
	                   	  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; text-align:5px; border-spacing:0; max-width:100%; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:100%; color:#777777;">
	                            <tr>
	                              <td valign="top" class="column" style="padding-right:5px; padding-bottom:25px; padding-left:30px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px; line-height:15pt; color:#777777;"><span style="margin-top:0px; margin-bottom:10px !important; padding-top:0px; padding-bottom:10px; font-family:'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:20px; line-height:22pt; color:#333333; font-weight:normal; border-bottom:1px; border-bottom-color:#eeeeee; border-bottom-style:solid;"><span style="margin-top:0px; margin-bottom:10px !important; padding-top:0px; padding-bottom:1px; font-family:'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:20px; line-height:1pt; color:#333333; font-weight:normal; border-bottom:0; border-bottom-color:#eeeeee; border-bottom-style:solid; font-style: normal;"><a name="toc" id="toc"></a></span>Today's headlines:<!-- optional secondary title position -->
	                                </span>						
	<!-- BEGIN HEADLINES ONLY FEED -->
	<?php getFeed(2, $feedInfo, IMAGES_ROOT, $limit); ?>
	<!-- END HEADLINES ONLY FEED -->
									<hr size="1">
	                              </td>
	                          </tr>
	                      </table>
	                   	  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; text-align:left; border-spacing:0; max-width:100%; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:100%; color:#777777;">
	                   	    <tr bgcolor="#ffffff" class="row">
	                   	      <td colspan="2" valign="top" class="column" style="padding-right:30px; padding-bottom:25px; padding-left:30px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px; line-height:15pt; color:#777777;"><table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse; text-align:left; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:12px; line-height:15pt; color:#777777;">
	                   	        <tr>
	                   	          <td width="50%" height="5" bgcolor="#f4f4f4" valign="top" style="font-size:2px; line-height:0px;"><img alt="" src="<?php echo IMAGES_ROOT ?>/borderTopLeft2.png" width="5" height="5" align="left" vspace="0" hspace="0" border="0" style="display:block; margin:0;" /></td>
	                  	          <td width="50%" height="5" bgcolor="#f4f4f4" valign="bottom" style="font-size:2px; line-height:0px;"><img alt="" src="<?php echo IMAGES_ROOT ?>/borderBottomRight2.png" width="5" height="5" align="right" vspace="0" hspace="0" border="0" style="display:block; margin:0;" /></td>
	                   	          <tr>
	                   	        <tr>
	                   	          <td width="100%" colspan="2" bgcolor="#f4f4f4" style="font-family:'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; padding-top:15px; padding-right:20px; padding-bottom:12px; padding-left:20px; font-size:17px; line-height:18pt; color:#333333; font-weight:normal;"><span style="margin-top:0px; margin-bottom:10px !important; padding-top:0px; padding-bottom:10px; font-family:'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:20px; line-height:22pt; color:#333333; font-weight:normal; border-bottom:0; border-bottom-color:#eeeeee; border-bottom-style:solid; font-style: normal;">
	<!-- BEGIN HEADLINE-BLURB-PHOTO LOOP -->
	<?php getFeed(3, $feedInfo, IMAGES_ROOT, $limit); ?>
	<!-- END HEADLINE-BLURB-PHOTO LOOP -->
	<!-- between_full_items.php inserted here after each iteration -->
	                  	      </table>
							  </td>
	                   	    </tr>
	                    	  <tr>
	                    	    <td width="207" class="column" valign="top" style="padding-right:15px; padding-bottom:25px; padding-left:30px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px; line-height:15pt; color:#777777;"><br /></td>
	                    	    <td width="403" class="column" valign="top" style="padding-right:30px; padding-bottom:25px; padding-left:0px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px; line-height:15pt; color:#777777;">
	                   	        <table class="imgContainer" width="109" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border-spacing:0;">
	                   	          <tr>
	                   	            <td width="77" class="authorPicture" style="padding-top:5px; padding-right:20px;"><a href="#toc"><img alt="Logo" src="<?php echo IMAGES_ROOT."/".$prefix."logo.png"; ?>" width="232" border="0" vspace="0" hspace="0" /><br />
	                   	            </a></td>
	               	              </tr>
	               	            </table></td>
	                   	    </tr>
	               	  </table></td>
	                </tr>
	                <tr>
	                    <td width="100%" height="5" valign="bottom" style="font-size:2px; line-height:0px;"><img alt="" src="<?php echo IMAGES_ROOT ?>/borderBottomLeft.png" width="5" height="5" align="left" vspace="0" hspace="0" border="0" style="display:block; margin:0;" /></td>
	                    <td width="100%" height="5" valign="bottom" style="font-size:2px; line-height:0px;"><img alt="" src="<?php echo IMAGES_ROOT ?>/borderBottomRight.png" width="5" height="5" align="right" vspace="0" hspace="0" border="0" style="display:block; margin:0;" /></td>
	                </tr>
	                <tr>
	                    <td width="100%" colspan="2" bgcolor="#dddddd" valign="top" style="padding-bottom:20px; font-size:2px; line-height:0px; text-align:center;"><img alt="" src="<?php echo IMAGES_ROOT ?>/shadow_610.png" height="10" width="610" border="0" vspace="0" hspace="0" style="width:100% !important; height:10px !important;" /></td>
	                </tr>
	          </table>
				<!-- End of layout with sidebar -->            
				
				<!-- Start of footer -->            
	      <table class="row" width="610" bgcolor="#ffffff" align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; text-align:left; border-spacing:0; max-width:100%;">
	                <tr>
	                    <td width="100%" height="5" valign="top" style="font-size:2px; line-height:0px;"><img alt="" src="<?php echo IMAGES_ROOT ?>/borderTopLeft.png" width="5" height="5" align="left" vspace="0" hspace="0" border="0" style="display:block; margin:0;" /></td>
	                    <td width="100%" height="5" valign="top" style="font-size:2px; line-height:0px;"><img alt="" src="<?php echo IMAGES_ROOT ?>/borderTopRight.png" width="5" height="5" align="right" vspace="0" hspace="0" border="0" style="display:block; margin:0;" /></td>
	                </tr>
	                <tr>
	                	<td width="100%" colspan="2">
	                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; text-align:left; border-spacing:0; max-width:100%; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:100%; color:#777777;">
	                            <tr>
	                                <td class="website" width="50%" valign="top" style="padding-top:23px; padding-right:15px; padding-bottom:20px; padding-left:30px; font-family:'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:18px; line-height:100%; color:#0c87c7; font-weight:300;">
	                                    <a style="text-decoration:none; color:#0c87c7;" href="http://www.<?php echo $property_url; ?>/newsletters"><?php echo $property_url; ?>/newsletters</a>
	                            </td>
	                                <td class="socialIcons" width="50%" style="padding-top:20px; padding-right:30px; padding-bottom:18px; padding-left:15px; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:100%; color:#777777; text-align:right;">
										<a href="#"><img alt="Facebook" src="<?php echo IMAGES_ROOT ?>/facebookIcon.png" border="0" vspace="0" hspace="0" /></a>&nbsp;&nbsp;
	                                    <a href="#"><img alt="Twitter" src="<?php echo IMAGES_ROOT ?>/twitterIcon.png" border="0" vspace="0" hspace="0" /></a>&nbsp;&nbsp;
	                                    <a href="#"><img alt="Google Plus" src="<?php echo IMAGES_ROOT ?>/googlePlusIcon.png" border="0" vspace="0" hspace="0" /></a>&nbsp;&nbsp;
	                                    <a href="#"><img alt="Linkedin" src="<?php echo IMAGES_ROOT ?>/linkedinIcon.png" border="0" vspace="0" hspace="0" /></a>
	                                </td>
	                            </tr>
	                        </table>
	                    </td>
	                </tr>
	                <tr>
	                    <td width="100%" height="5" valign="bottom" style="font-size:2px; line-height:0px;"><img alt="" src="<?php echo IMAGES_ROOT ?>/borderBottomLeft.png" width="5" height="5" align="left" vspace="0" hspace="0" border="0" style="display:block; margin:0;" /></td>
	                    <td width="100%" height="5" valign="bottom" style="font-size:2px; line-height:0px;"><img alt="" src="<?php echo IMAGES_ROOT ?>/borderBottomRight.png" width="5" height="5" align="right" vspace="0" hspace="0" border="0" style="display:block; margin:0;" /></td>
	                </tr>
	                <tr>
	                    <td width="100%" colspan="2" bgcolor="#dddddd" valign="top" style="padding-bottom:20px; font-size:2px; line-height:0px; text-align:center;"><img alt="" src="<?php echo IMAGES_ROOT ?>/shadow_610.png" height="10" width="610" border="0" vspace="0" hspace="0" style="width:100% !important; height:10px !important;" /></td>
	                </tr>
	                <tr>
	                    <td class="footer" width="100%" colspan="2" bgcolor="#dddddd" style="padding:0px 30px 25px 30px; font-family:Arial, Helvetica, sans-serif; font-size:11px; line-height:13pt; color:#777777; text-align:center; -webkit-text-size-adjust:none;">
	                        <p>Copyright <img alt="" src="<?php echo IMAGES_ROOT ?>/copyright.png" border="0" height="10" width="10" /> 2013 <a style="text-decoration:underline; color:#0c87c7;" href="http://www.<?php echo $property_url; ?>"><?php echo $property_title; ?></a>, All rights reserved.</p>

<!-- ******************** BEGIN DATRAN FOOTER: REMOVE FOR PRODUCTION ********************* -->

<?php

	// </body> and </html> are in footer added by email system.
	// Retrieve buffered text
	$page = ob_get_contents();
	ob_end_clean();
	// Find first headline.
	$headline_pattern = '<a href="#1" title="1">(.+?)<\/a>';
	// Add headline to title, which becomes subject of email.
	if ( preg_match("/$headline_pattern/", $page, $matches) ) {
		$first_headline = htmlspecialchars_decode($matches[1]);
		$first_headline = preg_replace( "/^(Biz Break|Roadshow): /i", "", $first_headline);
		$page = str_replace("</title>", ": $first_headline</title>", $page);
	}
	// Output modified buffer text
	echo $page;
	
?>
