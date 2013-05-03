<?php

	/*
	* Email Newsletter main template file (index.php)
	* ver. 0.5 4/23/2013 - wmc
	* Digital First Media
	*
	* Files: index.php, newsletter_func.php, prop_config.php (one for each property),
	* global_config.php, newsletter.css, li_ad_tags.php, prop_ad_tags.php, 
	* between_full_items.php, headlines_only_top.inc
	*
	* to-dos: prop_ad_tags.php; replace source=rss; target=new
	*/
	
	// grab the query string values from the URL and store in vars
	
	$topic = 'tester';
	$property = 'merc';
	$prefix = $property . "_"; 
	
	$func_file = 'tester_func.php'; // main functions file
	// Convert topic to ad tag category. 

	$itemNum = 5; // default list items if not defined per feed in 'prop_config.php' - also for global config
	
	if(is_readable('tester_config.php')) {
	    include_once 'tester_config.php';
	}
		

	if(is_readable($func_file)) {
	    require_once $func_file;
	} else {
	    include('404.php');
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
		<?php include 'newsletter.css'; ?>  
	</head>
	<body>
	<!-- following is for development feed testing only -->
	<pre><?php print_r($feedInfo); ?></pre><br />
	
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
					 <tr>
	                    <td width="100%" colspan="2" style="padding-top:20px; padding-right:30px; padding-bottom:10px; padding-left:30px;">
	                        <h2 style="margin-top:0px; margin-bottom:10px !important; padding-top:0px; padding-bottom:10px; font-family:'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:24px; line-height:22pt; color:#333333; font-weight:normal; border-bottom:1px; border-bottom-color:#eeeeee; border-bottom-style:solid;">Welcome, <?php echo $name; ?></h2>
	 Here are your top  <?php echo ucwords($topic); ?> headlines for today:                   </td>
	                </tr>
	                <tr>
	                	<td width="100%" colspan="2">
	                   	  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; text-align:5px; border-spacing:0; max-width:100%; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:100%; color:#777777;">
	                            <tr>
	                              <td valign="top" class="column" style="padding-right:5px; padding-bottom:25px; padding-left:30px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px; line-height:15pt; color:#777777;"><span style="margin-top:0px; margin-bottom:10px !important; padding-top:0px; padding-bottom:10px; font-family:'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:20px; line-height:22pt; color:#333333; font-weight:normal; border-bottom:1px; border-bottom-color:#eeeeee; border-bottom-style:solid;"><span style="margin-top:0px; margin-bottom:10px !important; padding-top:0px; padding-bottom:10px; font-family:'Segoe UI', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:20px; line-height:22pt; color:#333333; font-weight:normal; border-bottom:0; border-bottom-color:#eeeeee; border-bottom-style:solid; font-style: normal;"><a name="toc" id="toc"></a></span><!-- 49ers, Giants and More Sports --><br />
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
	<p style="color: rgb(0, 51, 102); font-size: 12px;">
		<b>ABOUT THIS E-MAIL</b><br />
		Need to change this e-mail?<br />- To <strong>update</strong> your account, go <a href="https://secure.passport.mnginteractive.com/mngi/servletDispatch/ErightsPassportServlet.dyn?url=http%3A%2F%2Fwww.mercurynews.com&amp;rEmail=[-EMAILADDR-]"><strong>here</strong></a>.<br />- To <strong>unsubscribe</strong> from this newsletter, click <a href="https://secure.www.mercurynews.com/portlet/registration/html/unsubscribe.jsp?emailId=[-EMAILADDR-]&amp;memberId=[-MNGI_REGISTRATION_USERID-]&amp;offerId=[-LIST_EXTERNALID-]&amp;DMID=[-RECIPID-]&amp;DLIST=[-LIST_ID-]&amp;DTITLE=[-LIST_CUSTOM-]"><strong>here</strong></a>.<br />- To advertise in this newsletter, click <a href="mailto:sroberts@mercurynews.com"><strong>here</strong></a>.</p>
	<p class="footer">
		MediaNews Group, 101 W. Colfax Ave., Suite 950, Denver, CO 80202</p>           
	                    </td>
	                </tr>
	            </table>
				<!-- End of footer -->            
	        </td>
	    </tr>
	</table>
	</body>
</html>
<!-- ******************** END DATRAN FOOTER *************************** -->

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
		//$first_headline = preg_replace( "/^(Biz Break|Roadshow): /i", "", $first_headline);
		$page = str_replace("</title>", ": $first_headline</title>", $page);
	}
	// Output modified buffer text
	echo $page;
	
?>
