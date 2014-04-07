<?php
/*
Title:  Scrolling
Author: RB Plugin
Text:   Profile View with Scrolling Thumbnails and Primary Image
*/

/*
 * Insert Javascript into Head
 */
	wp_register_style( 'rblayout-style', plugins_url('/css/style.css', __FILE__) );
	wp_enqueue_style( 'rblayout-style' );


/*
 * Layout 
 */
# rb_agency_option_galleryorder
$rb_agency_options_arr = get_option('rb_agency_options');
$order = $rb_agency_options_arr['rb_agency_option_galleryorder'];

echo "	<div id=\"rbprofile\">\n";
echo " 		<div id=\"rblayout-four\" class=\"rblayout\">\n";

echo "			<div class=\"rbcol-12 rbcolumn\">";
echo "				<header class=\"entry-header\">";
echo "	  				<h1 class=\"entry-title\">". $ProfileContactDisplay ." <a href=\"/contact/\">Book Now!</a></h1>\n";
echo "				</header>";
echo "			</div>";

echo "			<div class=\"rbcol-4 rbcolumn\">\n";
echo "				<div id=\"profile-info\">\n";

echo "	  			<h3>Statistics</h3>\n";
echo "	  				<div class=\"stats\">\n";
echo "	  					<ul>\n";
								if (!empty($ProfileGender)) {
									$fetchGenderData = $wpdb->get_row($wpdb->prepare("SELECT GenderID, GenderTitle FROM ".table_agency_data_gender." WHERE GenderID='%s' ",$ProfileGender),ARRAY_A,0 	 );
									echo "<li class=\"rb_gender\" id=\"rb_gender\"><strong>". __("Gender", rb_agency_TEXTDOMAIN). "<span class=\"divider\">:</span></strong> ". __($fetchGenderData["GenderTitle"], rb_agency_TEXTDOMAIN). "</li>\n";
								}

								// Insert Custom Fields
								rb_agency_getProfileCustomFields($ProfileID, $ProfileGender);

echo "	  					</ul>\n"; // Close ul
echo "	    				<div id=\"book-now\"><a href=\"contact/\" title=\"Book Now!\" class=\"rb_button\">Book Now!</a></div>\n"; // Close Stats
echo "	  				</div>\n"; // Close Stats	
echo "				</div><!-- #profile-info -->\n";
echo "			</div><!-- .rbcol-4 -->\n";

echo "			<div class=\"rbcol-8 rbcolumn\">\n";	
echo "	  			<h3>". __("Call", rb_agency_TEXTDOMAIN). ": <span>". $ProfileContactPhoneWork ."</span></h3>\n";
echo "	  			<div id=\"photos\">\n";
	
						// images
						
						$queryImg = rb_agency_option_galleryorder_query($order ,$ProfileID,"Image");
						$resultsImg=  $wpdb->get_results($queryImg,ARRAY_A);
						$countImg  = $wpdb->num_rows;
						foreach($resultsImg as $dataImg ){
						  	if ($countImg > 1) { 
								echo "<div class=\"photo\"><a href=\"". rb_agency_UPLOADDIR . $ProfileGallery ."/". $dataImg['ProfileMediaURL'] ."\" rel=\"lightbox-profile". $ProfileID ."\" title=\"". __("Call Now", rb_agency_TEXTDOMAIN). ": ". $ProfileContactPhoneWork ."\" style=\"background-image: url(". rb_agency_UPLOADDIR . $ProfileGallery ."/". $dataImg['ProfileMediaURL'] .")\"></a></div>\n";
						  	} else {
								echo "<div class=\"photo\"><a href=\"". rb_agency_UPLOADDIR . $ProfileGallery ."/". $dataImg['ProfileMediaURL'] ."\" rel=\"lightbox-profile". $ProfileID ."\" title=\"". __("Call Now", rb_agency_TEXTDOMAIN). ": ". $ProfileContactPhoneWork ."\" style=\"background-image: url(". rb_agency_UPLOADDIR . $ProfileGallery ."/". $dataImg['ProfileMediaURL'] .")\"></a></div>\n";
						  	}
						}
echo "	  			</div><!-- #photos -->\n";
echo "			</div><!-- .rbcol-8 -->\n";	

echo "  		<div class=\"rbclear\"></div>\n"; // Clear All

echo " 		</div>\n";  // Close Profile Layout
echo "	</div>\n";  // Close Profile
echo "	<div class=\"rbclear\"></div>\n"; // Clear All
?>