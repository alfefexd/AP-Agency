<div class="wrap">
<!--sort option values-->
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery( "#editfield_add_more_options_1" ).sortable();
	jQuery( "#editfield_add_more_options_2" ).sortable();
});
</script>
<?php

global $wpdb;

// Include Admin Menu
	include (rb_agency_BASEREL ."view/admin-include-menu.php");

// Get Current Page
	if(!isset($_REQUEST['ConfigID']) && empty($_REQUEST['ConfigID'])){ 
		$ConfigID = 0;
	} else {
		$ConfigID = $_REQUEST['ConfigID']; 
	}

	// Get State to be deleted
	if(!isset($_REQUEST['delstate']) && empty($_REQUEST['delstate'])){ 
		$delState = 0;
	} else {
		$delState = $_REQUEST['delstate']; 
	}

/*
 * Display Appropriate Page
 */
	switch ($ConfigID) {
		// Overview
		case 0:
			echo "<h1>Settings &raquo; Overview</h1>";
			//return RBAgency_AdminSettings::Overview();
			break;

		// Settings
		case 1:
			echo "<h1>Settings &raquo; Configuration</h1>";
			//return RBAgency_AdminSettings::Configuration();
			break;

		// Style
		case 2:
			echo "<h1>Settings &raquo; Style</h1>";
			//return RBAgency_AdminSettings::Style();
			break;

		// Data: Gender
		case 3:
			echo "<h1>Settings &raquo; Data &raquo; Gender</h1>";
			//return RBAgency_AdminSettings::DataGender();
			break;

		// Data: Profile Types
		case 4:
			echo "<h1>Settings &raquo; Data &raquo; Profile Types</h1>";
			//return RBAgency_AdminSettings::DataProfileType();
			break;

		// Data: Custom Fields
		case 5:
			echo "<h1>Settings &raquo; Data &raquo; Custom Fields</h1>";
			//return RBAgency_AdminSettings::DataCustomFields();
			break;

		// Data: Media Types
		case 6:
			echo "<h1>Settings &raquo; Data &raquo; Media Types</h1>";
			//return RBAgency_AdminSettings::DataMediaType();
			break;

		// Data: Media Types
		case 12:
			echo "<h1>Settings &raquo; Subscription</h1>";
			//return RBAgency_AdminSettings::Uninstall();
			break;


		// Data: Media Types
		case 99:
			echo "<h1>Settings &raquo; Uninstall</h1>";
			//return RBAgency_AdminSettings::Uninstall();
			break;

	}



if ($ConfigID == 0) {
?>
	<div id="welcome-panel" class="welcome-panel">
		<div class="welcome-panel-content">
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column">
					<h3><?php echo __("Configuration", rb_agency_TEXTDOMAIN ) ?>:</h3>
					<ul>
						<li><a href="?page=<?php echo $_GET["page"]; ?>&ConfigID=1"><strong><?php _e("Settings", rb_agency_TEXTDOMAIN); ?></strong></a> - <?php _e("Access this area to manage all of the core settings including layout types, privacy settings and more", rb_agency_TEXTDOMAIN); ?></li>
						<li><a href="?page=<?php echo $_GET["page"]; ?>&ConfigID=2"><strong><?php _e("Style", rb_agency_TEXTDOMAIN); ?></strong></a> - <?php _e("Access this area to manage all of the core settings including layout types, privacy settings and more", rb_agency_TEXTDOMAIN); ?></li>
					</ul>
				</div>

				<div class="welcome-panel-column" style="margin-left: 50px;">
					<h3><?php echo __("Diagnostics", rb_agency_TEXTDOMAIN ) ?>:</h3>
						<?php
						//echo "No Diagnostic has been run.  Please run now.";
						// Diagnostic Tests
						//require_once(WP_PLUGIN_DIR . "/" . basename(dirname(__FILE__)) . "/diagnostic.php");

						// TODO: Add Diagnostic
						?>
				</div>

			</div>
		</div>
	</div>


<?php

//*************************************************************************************************** //
/*
 * Overview Page
 */

	// Core Settings
	echo "<div class=\"boxlinkgroup\">\n";
	echo "  <h2>". __("Configuration", rb_agency_TEXTDOMAIN) . "</h2>\n";
	echo "  <p>". __("The following settings modify the core RB Agency settings.", rb_agency_TEXTDOMAIN) . "</p>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Features", rb_agency_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=1\" title=\"". __("Settings", rb_agency_TEXTDOMAIN) . "\">". __("Settings", rb_agency_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Access this area to manage all of the core settings including layout types, privacy settings and more", rb_agency_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Style", rb_agency_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=2\" title=\"". __("Style", rb_agency_TEXTDOMAIN) . "\">". __("Style", rb_agency_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Manage the stylesheet (CSS) controlling the category and profile layouts", rb_agency_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";
	echo "</div>\n";
	echo "<hr />\n";
	//if (function_exists(rb_agencyinteract_settings)) {
	if (is_plugin_active('rb-agency-interact/rb-agency-interact.php')) {
	// RB Agency Interact Settings
	echo "<div class=\"boxlinkgroup\">\n";
	echo "  <h2>". __("Interactive Settings", rb_agency_TEXTDOMAIN) . "</h2>\n";
	echo "  <p>". __("These settings modify the behavior of the RB Agency Interactive plugin.", rb_agency_TEXTDOMAIN) . "</p>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Interactive Settings", rb_agency_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=11\" title=\"". __("Interactive Settings", rb_agency_TEXTDOMAIN) . "\">". __("Settings", rb_agency_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Access this area to manage all of the core settings including layout types, privacy settings and more", rb_agency_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";

	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Subscription Rates", rb_agency_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=12\" title=\"". __("Subscription Rates", rb_agency_TEXTDOMAIN) . "\">". __("Subscription Rates", rb_agency_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Manage the subscription rate tiers and descriptions", rb_agency_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";

	echo "</div>\n";
	echo "<hr />\n";
	}
	// Drop Down Fields
	echo "<div class=\"boxlinkgroup\">\n";
	echo "  <h2>". __("Customize Profile Fields", rb_agency_TEXTDOMAIN) . "</h2>\n";
	echo "  <p>". __("You have full control over all drop downs and ability to add new custom fields of your own.", rb_agency_TEXTDOMAIN) . "</p>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Profile Categories", rb_agency_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=6\" title=\"". __("Profile Categories", rb_agency_TEXTDOMAIN) . "\">". __("Profile Categories", rb_agency_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Choose custom category types to classify profiles", rb_agency_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Custom Fields", rb_agency_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=7\" title=\"". __("Custom Fields", rb_agency_TEXTDOMAIN) . "\">". __("Custom Fields", rb_agency_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Add public and private custom fields", rb_agency_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Gender", rb_agency_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=5\" title=\"". __("Gender", rb_agency_TEXTDOMAIN) . "\">". __("Gender", rb_agency_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Manage preset Gender choices", rb_agency_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";
	echo "</div>\n";
	echo "<hr />\n";

	// Uninstall
	echo "<div class=\"boxlinkgroup\">\n";
	echo "  <h2>". __("Uninstall", rb_agency_TEXTDOMAIN) . "</h2>\n";
	echo "  <p>". __("Uninstall RB Agency software and completely remove all data", rb_agency_TEXTDOMAIN) . "</p>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <a class=\"button-secondary\" href=\"?page=". $_GET["page"] ."&ConfigID=99\" title=\"". __("Uninstall", rb_agency_TEXTDOMAIN) . "\">". __("Uninstall", rb_agency_TEXTDOMAIN) . "</a><br />\n";
	echo "    </div>\n";
	echo "</div>\n";

}
elseif ($ConfigID == 1) {
//*************************************************************************************************** //
/*
 * Manage Settings
 */

	/*
	 * Declare Values
	 */
		// Get Group
		$rb_agency_options_arr = get_option('rb_agency_options');

		// Set Default Values
		$rb_agency_value_agencyname = $rb_agency_options_arr['rb_agency_option_agencyname'];
			if (empty($rb_agency_value_agencyname)) { $rb_agency_value_agencyname = get_bloginfo('name'); }
		$rb_agency_value_agencyemail = $rb_agency_options_arr['rb_agency_option_agencyemail'];
			if (empty($rb_agency_value_agencyemail)) { $rb_agency_value_agencyemail = get_bloginfo('admin_email'); }
		$rb_agency_value_maxwidth = $rb_agency_options_arr['rb_agency_option_agencyimagemaxwidth'];
			if (empty($rb_agency_value_maxwidth)) { $rb_agency_value_maxwidth = "1000"; }
		$rb_agency_value_maxheight = $rb_agency_options_arr['rb_agency_option_agencyimagemaxheight'];
			if (empty($rb_agency_value_maxheight)) { $rb_agency_value_maxheight = "800"; }
		$rb_agency_option_locationcountry = $rb_agency_options_arr['rb_agency_option_locationcountry'];
			if (empty($rb_agency_option_locationcountry)) { $rb_agency_option_locationcountry = "US"; }
		$rb_agency_option_profilelist_perpage = $rb_agency_options_arr['rb_agency_option_profilelist_perpage'];
			if (empty($rb_agency_option_profilelist_perpage)) { $rb_agency_option_profilelist_perpage = "20"; }
		$rb_agency_option_persearch = $rb_agency_options_arr['rb_agency_option_persearch'];
			if (empty($rb_agency_option_persearch)) { $rb_agency_option_persearch = "100"; }
		$rb_agency_option_showcontactpage = $rb_agency_options_arr['rb_agency_option_showcontactpage'];
			if (empty($rb_agency_option_showcontactpage)) { $rb_agency_option_showcontactpage = "0"; }
		$rb_agency_option_profilelist_favorite = $rb_agency_options_arr['rb_agency_option_profilelist_favorite'];
			if (empty($rb_agency_option_profilelist_favorite)) { $rb_agency_option_profilelist_favorite = "1"; }
		$rb_agency_option_profilelist_castingcart = $rb_agency_options_arr['rb_agency_option_profilelist_castingcart'];
			if (empty($rb_agency_option_profilelist_castingcart)) { $rb_agency_option_profilelist_castingcart = "1"; }
		$rb_agency_option_privacy = $rb_agency_options_arr['rb_agency_option_privacy'];
			if (empty($rb_agency_option_privacy)) { $rb_agency_option_privacy = "0"; }
		// Profile Search Options
		$rb_agency_option_formshow_location = $rb_agency_options_arr['rb_agency_option_formshow_location'];
			if (empty($rb_agency_option_formshow_location)) { $rb_agency_option_formshow_location = "1"; }
		$rb_agency_option_formshow_name = $rb_agency_options_arr['rb_agency_option_formshow_name'];
			if (empty($rb_agency_option_formshow_name)) { $rb_agency_option_formshow_name = "1"; }
		$rb_agency_option_formshow_type = $rb_agency_options_arr['rb_agency_option_formshow_type'];
			if (empty($rb_agency_option_formshow_type)) { $rb_agency_option_formshow_type = "1"; }
		$rb_agency_option_formshow_gender = $rb_agency_options_arr['rb_agency_option_formshow_gender'];
			if (empty($rb_agency_option_formshow_gender)) { $rb_agency_option_formshow_gender = "1"; }
		$rb_agency_option_formshow_age = $rb_agency_options_arr['rb_agency_option_formshow_age'];
			if (empty($rb_agency_option_formshow_age)) { $rb_agency_option_formshow_age = "1"; }




	/*
	 * Form
	 */
		echo "<form method=\"post\" action=\"options.php\">\n";
		settings_fields( 'rb-agency-settings-group' ); 
		echo "<table class=\"form-table\">\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Website Details', rb_agency_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Agency Name', rb_agency_TEXTDOMAIN); echo "</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_agencyname]\" value=\"". $rb_agency_value_agencyname ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Agency Email', rb_agency_TEXTDOMAIN); echo "</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_agencyemail]\" value=\"". $rb_agency_value_agencyemail ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Path to Logo', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_agencylogo]\" value=\"". $rb_agency_options_arr['rb_agency_option_agencylogo'] ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Email Header', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_agencyheader]\" value=\"". $rb_agency_options_arr['rb_agency_option_agencyheader'] ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Show Fields', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		//echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_showsocial]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_showsocial'], 1,false)."/> Extended Social Profiles<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_advertise]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_advertise'], 1,false)."/> Remove Updates on Dashboard<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";		/*
		 * Agency Internationalization
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Internationalization', rb_agency_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Default Country', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_locationcountry]\">\n";
					$country_array = RBAgency_Common::data_country();
					foreach ($country_array AS $country_code => $country_name) {
		echo "       <option value=\"". $country_code ."\" ". selected($country_code, $rb_agency_option_locationcountry,false) ."> ". $country_name ."</option>\n";
					}
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Server Timezone', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_locationtimezone]\">\n";
		echo "       <option value=\"+12\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "+12",false) ."> UTC+12</option>\n";
		echo "       <option value=\"+11\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "+11",false) ."> UTC+11</option>\n";
		echo "       <option value=\"+10\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "+10",false) ."> UTC+10</option>\n";
		echo "       <option value=\"+9\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "+9",false) ."> UTC+9</option>\n";
		echo "       <option value=\"+8\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "+8",false) ."> UTC+8</option>\n";
		echo "       <option value=\"+7\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "+7",false) ."> UTC+7</option>\n";
		echo "       <option value=\"+6\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "+6",false) ."> UTC+6</option>\n";
		echo "       <option value=\"+5\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "+5",false) ."> UTC+5</option>\n";
		echo "       <option value=\"+4\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "+4",false) ."> UTC+4</option>\n";
		echo "       <option value=\"+3\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "+3",false) ."> UTC+3</option>\n";
		echo "       <option value=\"+2\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "+2",false) ."> UTC+2</option>\n";
		echo "       <option value=\"+1\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "+1",false) ."> UTC+1</option>\n";
		echo "       <option value=\"0\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "0",false) ."> UTC 0</option>\n";
		echo "       <option value=\"-1\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "-1",false) ."> UTC-1</option>\n";
		echo "       <option value=\"-2\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "-2",false) ."> UTC-2</option>\n";
		echo "       <option value=\"-3\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "-3",false) ."> UTC-3</option>\n";
		echo "       <option value=\"-4\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "-4",false) ."> UTC-4</option>\n";
		echo "       <option value=\"-5\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "-5",false) ."> UTC-5</option>\n";
		echo "       <option value=\"-6\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "-6",false) ."> UTC-6</option>\n";
		echo "       <option value=\"-7\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "-7",false) ."> UTC-7</option>\n";
		echo "       <option value=\"-8\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "-8",false) ."> UTC-8</option>\n";
		echo "       <option value=\"-9\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "-9",false) ."> UTC-9</option>\n";
		echo "       <option value=\"-10\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "-10",false) ."> UTC-10</option>\n";
		echo "       <option value=\"-11\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "-11",false) ."> UTC-11</option>\n";
		echo "       <option value=\"-12\" ". selected($rb_agency_options_arr['rb_agency_option_locationtimezone'], "-12",false) ."> UTC-12</option>\n";
		echo "     </select> (<a href=\"http://www.worldtimezone.com/index24.php\" target=\"_blank\">Find</a>)\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Unit Type', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_unittype]\">\n";
		echo "       <option value=\"1\" ". selected($rb_agency_options_arr['rb_agency_option_unittype'], 1,false) ."> ". __("Imperial", rb_agency_TEXTDOMAIN) ." (ft/in/lb)</option>\n";
		echo "       <option value=\"0\" ". selected($rb_agency_options_arr['rb_agency_option_unittype'], 0,false) ."> ". __("Metric", rb_agency_TEXTDOMAIN) ." (cm/kg)</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		/*
		 * Profile Display
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Profile List Options', rb_agency_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Display Options', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_count]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_profilelist_count'], 1,false)."/> ". __("Show Model Count", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_sortby]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_profilelist_sortby'], 1,false)."/> ". __("Show Sort Options", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_expanddetails]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_profilelist_expanddetails'], 1,false)."/> ". __("Expanded Model Details", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_favorite]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_profilelist_favorite'], 1,false)."/> ". __("Enable Model Favorites", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_sidebar]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_profilelist_sidebar'], 1,false)."/> ". __("Show Sidebar", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_castingcart]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_profilelist_castingcart'], 1,false)."/> ". __("Show Casting Cart", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_thumbsslide]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_profilelist_thumbsslide'], 1,false)."/> ". __("Show Thumbs Slide", rb_agency_TEXTDOMAIN) ."<br />\n";	
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_bday]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_profilelist_bday'], 1,false)."/> ". __("Show Birthday With Months", rb_agency_TEXTDOMAIN) ."<br />\n";	
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_printpdf]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_profilelist_printpdf'], 1,false)."/> ". __("Show Print and Download PDF Link", rb_agency_TEXTDOMAIN) ."<br />\n";	
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_subscription]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_profilelist_subscription'], 1,false)."/> ". __("Show Manage Your Subscription", rb_agency_TEXTDOMAIN) ."<br />\n";	
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_showsocial]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_showsocial'], 1,false)."/> ". __("Show Social Buttons", rb_agency_TEXTDOMAIN) ."<br />\n";	
				echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profiles Per Page', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_profilelist_perpage]\" value=\"". $rb_agency_option_profilelist_perpage ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profile List Style', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_layoutprofilelist]\">\n";
		echo "       <option value=\"0\" ". selected($rb_agency_options_arr['rb_agency_option_layoutprofilelist'], 0,false) ."> ". __("Name Over Image", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected($rb_agency_options_arr['rb_agency_option_layoutprofilelist'], 1,false) ."> ". __("Name Under Image with Color", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"2\" ". selected($rb_agency_options_arr['rb_agency_option_layoutprofilelist'], 2,false) ."> ". __("Name Under Image", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		/*
		 * Profile Search
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Profile Search Options', rb_agency_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Maximum Records Returned', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_persearch]\" value=\"". $rb_agency_option_persearch ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Search Fields', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_name]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_formshow_name'], 1,false)."/> Show Name Search Fields<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_type]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_formshow_type'], 1,false)."/> Show Type Search Fields<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_location]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_formshow_location'], 1,false)."/> Show Location Search Fields<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_gender]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_formshow_gender'], 1,false)."/> Show Gender Search Fields<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_age]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_formshow_age'], 1,false)."/> Show Age Search Fields<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		/*
		 * Profile View
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Profile View Options', rb_agency_TEXTDOMAIN) ."</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Resize Images', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>";
				 _e('Maximum Width', rb_agency_TEXTDOMAIN); echo ": <input name=\"rb_agency_options[rb_agency_option_agencyimagemaxwidth]\" value=\"". $rb_agency_value_maxwidth ."\" style=\"width: 80px;\" />\n";
				 _e('Maximum Height', rb_agency_TEXTDOMAIN); echo ": <input name=\"rb_agency_options[rb_agency_option_agencyimagemaxheight]\" value=\"". $rb_agency_value_maxheight ."\" style=\"width: 80px;\" />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profile Name Format', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_profilenaming]\">\n";
		echo "       <option value=\"0\" ". selected($rb_agency_options_arr['rb_agency_option_profilenaming'], 0,false) ."> ". __("First Last", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected($rb_agency_options_arr['rb_agency_option_profilenaming'], 1,false) ."> ". __("First L", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"4\" ". selected($rb_agency_options_arr['rb_agency_option_profilenaming'], 4,false) ."> ". __("First", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"5\" ". selected($rb_agency_options_arr['rb_agency_option_profilenaming'], 5,false) ."> ". __("Last", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"2\" ". selected($rb_agency_options_arr['rb_agency_option_profilenaming'], 2,false) ."> ". __("Display Name", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"3\" ". selected($rb_agency_options_arr['rb_agency_option_profilenaming'], 3,false) ."> ". __("Auto Generated Record ID", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profile Layout Style', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_layoutprofile]\">\n";
		echo "       <option value=\"0\" ". selected($rb_agency_options_arr['rb_agency_option_layoutprofile'], 0,false) ."> ". __("Layout 00 - Profile View with Thumbnails", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected($rb_agency_options_arr['rb_agency_option_layoutprofile'], 1,false) ."> ". __("Layout 01 - Profile View with Thumbnails and Primary Image", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"2\" ". selected($rb_agency_options_arr['rb_agency_option_layoutprofile'], 2,false) ."> ". __("Layout 02 - Profile View with Scrolling Thumbnails and Primary Image", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"3\" ". selected($rb_agency_options_arr['rb_agency_option_layoutprofile'], 3,false) ."> ". __("Layout 03 - Extended Profile View", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"4\" ". selected($rb_agency_options_arr['rb_agency_option_layoutprofile'], 4,false) ."> ". __("Layout 04 - Direct Contact Layout (NOTE: Includes Phone Number of Model)", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"5\" ". selected($rb_agency_options_arr['rb_agency_option_layoutprofile'], 5,false) ."> ". __("Layout 05 - Fun Animated Gallery", rb_agency_TEXTDOMAIN) ."</option>\n";
			$x=6;
			while($x<=15) {
				if (file_exists(rb_agency_BASEREL .'view/layout/'. sprintf("%02s", $x) .'/include-profile.php')) {
				echo "       <option value=\"". $x ."\" ". selected($rb_agency_options_arr['rb_agency_option_layoutprofile'], $x,false) ."> ". __("Layout". $k, rb_agency_TEXTDOMAIN). $x ."</option>\n";
				}
				$x++;
			}
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Image Gallery Type', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_gallerytype]\">\n";
		echo "       <option value=\"1\" ". selected($rb_agency_options_arr['rb_agency_option_gallerytype'], 1,false) ."> ". __("Slimbox2", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"0\" ". selected($rb_agency_options_arr['rb_agency_option_gallerytype'], 0,false) ."> ". __("No Gallery", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Image Gallery Sort Order', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_galleryorder]\">\n";
		echo "       <option value=\"1\" ". selected($rb_agency_options_arr['rb_agency_option_galleryorder'], 1,false) ."> ". __("Show most recently uploaded first", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"0\" ". selected($rb_agency_options_arr['rb_agency_option_galleryorder'], 0,false) ."> ". __("Show chronological order", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Privacy Settings', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_privacy]\">\n";
		echo "       <option value=\"2\" ". selected($rb_agency_option_privacy, 2,false) ."> ". __("Must be logged to view model list and profile information", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected($rb_agency_option_privacy, 1,false) ."> ". __("Model list public. Must be logged to view profile information", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"0\" ". selected($rb_agency_option_privacy, 0,false) ."> ". __("Model list and profile information public", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"3\" ". selected($rb_agency_option_privacy, 3,false) ."> ". __('Must be logged as "Client" to view model list and profile information', rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		/*
		 * Interact Settings
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Interact Settings', rb_agency_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Delete Options', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"radio\" name=\"rb_agency_options[rb_agency_option_profiledeletion]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_profiledeletion'], 1,false)."/> ". __("No", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agency_options[rb_agency_option_profiledeletion]\" value=\"2\" ".checked($rb_agency_options_arr['rb_agency_option_profiledeletion'], 2,false)."/> ". __("Yes (Allow users to perminently delete their profile)", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agency_options[rb_agency_option_profiledeletion]\" value=\"3\" ".checked($rb_agency_options_arr['rb_agency_option_profiledeletion'], 3,false)."/> ". __("Archive Only (Allow users to hide their profile)", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";


		//Commented by @Gaurav as We will be creating this as a separate plugin
		// Member Contact form link
		/*echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h3>". __('Profile Contact Options', rb_agency_TEXTDOMAIN) ."</h3></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Contact Page Settings', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"radio\" name=\"rb_agency_options[rb_agency_option_showcontactpage]\" value=\"2\" ".checked($rb_agency_option_showcontactpage, 2,false)."/>Disable Contact<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agency_options[rb_agency_option_showcontactpage]\" value=\"1\" ".checked($rb_agency_option_showcontactpage, 1,false)."/>Email to both the model and the site owner<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agency_options[rb_agency_option_showcontactpage]\" value=\"0\" ".checked($rb_agency_option_showcontactpage, "0",false)."/>Only email to the site owner, not to the model<br/>\n";
		echo "   </td>\n";
		echo " </tr>\n";*/
		// comment by @Gaurav ends

		/*####### HIDE THIS OPTION FOR THE MEAN TIME #### 
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Override Contact Page Path', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_agency_urlcontact]\" value=\"". $rb_agency_options_arr['rb_agency_option_agency_urlcontact'] ."\" /></td>\n";
		echo " </tr>\n";
		################/*

		/*############# hide Profile Custom Fields Options - FOR THE MEAN TIME######################
		// Profile Custom Fields Options
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h3>". __('Profile Custom Fields Options', rb_agency_TEXTDOMAIN); echo "</h3></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Show Custom Fields on', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_customfield_profilepage]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_customfield_profilepage'], 1,false)."/> ". __("Profile Page", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_customfield_searchpage]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_customfield_searchpage'], 1,false)."/> ". __("Search Results Page", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_customfield_loggedin_all]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_customfield_loggedin_all'], 1,false)."/> ". __("User must be Logged In to see It", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_customfield_loggedin_admin]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_customfield_loggedin_admin'], 1,false)."/> ". __("User must be an Admin to see It", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";

		##### HIDE */

		echo "</table>\n";
		echo "<input type=\"submit\" class=\"button-primary\" value=\"". __('Save Changes') ."\" />\n";
		echo "<input type=\"hidden\" name=\"rb_agency_options[rb_agency_options_showtooltip]\" value=\"1\"/>";
		echo "</form>\n";



}
elseif ($ConfigID == 11) {
//*************************************************************************************************** //
/*
 * Manage Settings
 */

	/*
	 * Form
	 */


	echo "<h3>". __("Interactive Settings", rb_agency_TEXTDOMAIN) . "</h3>\n";
		echo "<form method=\"post\" action=\"options.php\">\n";
		settings_fields( 'rb-agencyinteract-settings-group' ); 
		$rb_agencyinteract_options_arr = get_option('rb_agencyinteract_options');
		   // Facebook Connect integration
		$rb_agencyinteract_option_fb_registerallow = $rb_agencyinteract_options_arr['rb_agencyinteract_option_fb_registerallow'];
			if (empty($rb_agencyinteract_option_fb_registerallow)) { $rb_agencyinteract_option_fb_registerallow = "1"; }

		echo "<table class=\"form-table\">\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Database Version', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"\" value=\"". rb_agencyinteract_VERSION ."\" disabled /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Display', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_profilemanage_sidebar]\" value=\"1\" ".checked((int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_profilemanage_sidebar'], 1,false)."/> ". __("Show Sidebar on Member Management/Login Pages", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";

		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">&nbsp;</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_profilemanage_toolbar]\" value=\"1\" ".checked((int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_profilemanage_toolbar'], 1,false)."/> ". __("Hide Toolbar on All Pages", rb_agency_TEXTDOMAIN) ."<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";

		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h3>". __('Registration Process', rb_agency_TEXTDOMAIN); echo "</h3></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Show User Registration when creating Profiles', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agencyinteract_options[rb_agencyinteract_option_useraccountcreation]\">\n";
		echo "       <option value=\"0\" ". selected((int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_useraccountcreation'], 0,false) ."> ". __("Yes, show username and password fields", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected((int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_useraccountcreation'], 1,false) ."> ". __("No, do not show username and password fields", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('New Profile Registration', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_registerallow]\" value=\"1\" ".checked((int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerallow'], 1,false)."/> Users may register profiles (uncheck to prevent self registration)<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Enable registration of Agent/Producer', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";

		echo "     <select name=\"rb_agencyinteract_options[rb_agencyinteract_option_registerallowAgentProducer]\">\n";
		echo "       <option value=\"1\" ". ($rb_agencyinteract_options_arr['rb_agencyinteract_option_registerallowAgentProducer'] == 1 ? 'selected="selected"':'') ."> ". __("Show", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"0\" ". ($rb_agencyinteract_options_arr['rb_agencyinteract_option_registerallowAgentProducer'] == 0 ? 'selected="selected"':'') ."> ". __("Hide", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";

		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Email Confirmation', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agencyinteract_options[rb_agencyinteract_option_registerconfirm]\">\n";
		echo "       <option value=\"0\" ". selected((int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerconfirm'], 0,false) ."> ". __("Password Auto-Generated (sent via email)", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected((int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerconfirm'], 1,false) ."> ". __("Password Self-Generated", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('New Profile Approval', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agencyinteract_options[rb_agency_option_useraccountcreation]\">\n";
		echo "       <option value=\"0\" ". selected((int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerapproval'], 0,false) ."> ". __("Manually Approved", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected((int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerapproval'], 1,false) ."> ". __("Automatically Approved", rb_agency_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h3>". __('Facebook Login/Registration Integration', rb_agency_TEXTDOMAIN); echo "</h3></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Login &amp Registration', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_fb_registerallow]\" value=\"1\" ". ($rb_agencyinteract_options_arr["rb_agencyinteract_option_fb_registerallow"] == 1 ? 'checked=\"checked\"':'') ."/> Users may login/register profiles using facebook (uncheck to disable feature)<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Application ID', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "    <input  name=\"rb_agencyinteract_options[rb_agencyinteract_option_fb_app_id]\" value=\"".$rb_agencyinteract_options_arr['rb_agencyinteract_option_fb_app_id']."\" />";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Application Secret', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "    <input  name=\"rb_agencyinteract_options[rb_agencyinteract_option_fb_app_secret]\" value=\"".$rb_agencyinteract_options_arr['rb_agencyinteract_option_fb_app_secret']."\" />";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Login Redirect URI', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "    <input  name=\"rb_agencyinteract_options[rb_agencyinteract_option_fb_app_login_uri]\" value=\"".$rb_agencyinteract_options_arr['rb_agencyinteract_option_fb_app_login_uri']."\" />(default: ".network_site_url("/")."profile-login/ )";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Registration Redirect URI', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "    <input  name=\"rb_agencyinteract_options[rb_agencyinteract_option_fb_app_register_uri]\" value=\"".$rb_agencyinteract_options_arr['rb_agencyinteract_option_fb_app_register_uri']."\" />(default: ".network_site_url("/")."profile-register/ )";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h3>". __('Membership Subscription', rb_agency_TEXTDOMAIN); echo "</h3></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Notifications', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_subscribeupsell]\" value=\"1\" "; checked((int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_subscribeupsell'], 1,false); echo "/> Display Upsell Messages for Subscription)<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Embed Overview Page ID', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agencyinteract_options[rb_agencyinteract_option_overviewpagedetails]\" value=\"". $rb_agencyinteract_options_arr['rb_agencyinteract_option_overviewpagedetails'] ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Embed Registration Page ID', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agencyinteract_options[rb_agencyinteract_option_subscribepagedetails]\" value=\"". $rb_agencyinteract_options_arr['rb_agencyinteract_option_subscribepagedetails'] ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('PayPal Email Address', rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agencyinteract_options[rb_agencyinteract_option_subscribepaypalemail]\" value=\"". $rb_agencyinteract_options_arr['rb_agencyinteract_option_subscribepaypalemail'] ."\" /></td>\n";
		echo " </tr>\n";
		echo "</table>\n";
		echo "<input type=\"submit\" class=\"button-primary\" value=\"". __('Save Changes') ."\" />\n";
		 
		 echo "</form>\n";



}
elseif ($ConfigID == 12) {
//*************************************************************************************************** //
/*
 * TODO REMOVE
 */


	/** Identify Labels **/
	define("LabelPlural", __("Subscription Tiers", rb_agency_TEXTDOMAIN));
	define("LabelSingular", __("Subscription Tier", rb_agency_TEXTDOMAIN));
  /* Initial Registration [RESPOND TO POST] ***********/ 
  if ( isset($_POST['action']) ) {
		$SubscriptionRateID 	= $_POST['SubscriptionRateID'];
		$SubscriptionRateTitle 	= $_POST['SubscriptionRateTitle'];
		$SubscriptionRateType 	= $_POST['SubscriptionRateType'];
		$SubscriptionRateText 	= $_POST['SubscriptionRateText'];
		$SubscriptionRatePrice 	= $_POST['SubscriptionRatePrice'];
		$SubscriptionRateTerm 	= $_POST['SubscriptionRateTerm'];
		// Error checking
		$error = "";
		$have_error = false;
		if(trim($SubscriptionRateTitle) == ""){
			$error .= "<b><i>". __(LabelSingular ." name is required", rb_agency_TEXTDOMAIN) . ".</i></b><br>";
			$have_error = true;
		}
		$action = $_POST['action'];
		switch($action) {
	
		// Add
		case 'addRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %1$s, please ensure you have filled out all required fields", rb_agency_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
			} else {
		
				// Create Record
				$insert = "INSERT INTO " . table_agencyinteract_subscription_rates . " (SubscriptionRateTitle,SubscriptionRateType,SubscriptionRateText,SubscriptionRatePrice,SubscriptionRateTerm) VALUES ('" . $wpdb->escape($SubscriptionRateTitle) . "','" . $wpdb->escape($SubscriptionRateType) . "','" . $wpdb->escape($SubscriptionRateText) . "','" . $wpdb->escape($SubscriptionRatePrice) . "','" . $wpdb->escape($SubscriptionRateTerm) . "')";
				$results = $wpdb->query($insert);
				$lastid = $wpdb->insert_id;
				
				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%1$s <strong>added</strong> successfully! You may now %1$s Load Information to the record", rb_agency_TEXTDOMAIN), LabelSingular, "<a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&LoginTypeID=". $lastid ."\">") .".</a></p><p>".$error."</p></div>"); 
			}
		break;
	
		// Manage
		case 'editRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %1$s, please ensure you have filled out all required fields", rb_agency_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
			} else {
				$update = "UPDATE " . table_agencyinteract_subscription_rates . " 
							SET 
								SubscriptionRateTitle='" . $wpdb->escape($SubscriptionRateTitle) . "',
								SubscriptionRateType='" . $wpdb->escape($SubscriptionRateType) . "',
								SubscriptionRateText='" . $wpdb->escape($SubscriptionRateText) . "',
								SubscriptionRatePrice='" . $wpdb->escape($SubscriptionRatePrice) . "',
								SubscriptionRateTerm='" . $wpdb->escape($SubscriptionRateTerm) . "' 
							WHERE SubscriptionRateID='$SubscriptionRateID'";
				$updated = $wpdb->query($update);
				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%1$s <strong>updated</strong> successfully", rb_agency_TEXTDOMAIN), LabelSingular) ."!</p><p>".$error."</p></div>"); 
			}
		break;
		// Delete bulk
		case 'deleteRecord':
			foreach($_POST as $SubscriptionRateID) {
			  if (is_numeric($SubscriptionRateID)) {
				// Verify Record
				$queryDelete = "SELECT SubscriptionRateID, SubscriptionRateTitle FROM ". table_agencyinteract_subscription_rates ." WHERE SubscriptionRateID =  \"". $SubscriptionRateID ."\"";
				$resultsDelete = mysql_query($queryDelete);
				while ($dataDelete = mysql_fetch_array($resultsDelete)) {
			
					// Remove Record
					$delete = "DELETE FROM " . table_agencyinteract_subscription_rates . " WHERE SubscriptionRateID = \"". $SubscriptionRateID ."\"";
					$results = $wpdb->query($delete);
					
					echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['SubscriptionRateTitle'] ."</strong> deleted successfully", rb_agency_TEXTDOMAIN) ."!</p></div>\n";
						
				} // while
			  } // it was numeric
			} // for each
		break;
		
		} // Switch
		
  } // Action Post
  elseif ($_GET['action'] == "deleteRecord") {
	
	$SubscriptionRateID = $_GET['SubscriptionRateID'];
	  if (is_numeric($SubscriptionRateID)) {
		// Verify Record
		$queryDelete = "SELECT SubscriptionRateID, SubscriptionRateTitle FROM ". table_agencyinteract_subscription_rates ." WHERE SubscriptionRateID =  \"". $SubscriptionRateID ."\"";
		$resultsDelete =  $wpdb->get_results($wpdb->prepare($queryDelete), ARRAY_A);
		foreach ($resultsDelete as $dataDelete) {
	
			// Remove Record
			$delete = "DELETE FROM " . table_agencyinteract_subscription_rates . " WHERE SubscriptionRateID = \"". $SubscriptionRateID ."\"";
			$results = $wpdb->query($delete);
			
			echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['SubscriptionRateTitle'] ."</strong> deleted successfully", rb_agency_TEXTDOMAIN) ."!</p></div>\n";
				
		} // is there record?
	  } // it was numeric
  }
  elseif ($_GET['action'] == "editRecord") {
		$action = $_GET['action'];
		$SubscriptionRateID = $_GET['SubscriptionRateID'];
		
		if ( $SubscriptionRateID > 0) {
			$query = "SELECT * FROM " . table_agencyinteract_subscription_rates . " WHERE SubscriptionRateID='$SubscriptionRateID'";
			$results =  $wpdb->get_results($wpdb->prepare($query ), ARRAY_A);
			$count =  $wpdb->num_rows;
		 	foreach($results as $data ) {
				$SubscriptionRateID		=$data['SubscriptionRateID'];
				$SubscriptionRateTitle	=stripslashes($data['SubscriptionRateTitle']);
				$SubscriptionRateType	=$data['SubscriptionRateType'];
				$SubscriptionRateText	=$data['SubscriptionRateText'];
				$SubscriptionRatePrice	=$data['SubscriptionRatePrice'];
				$SubscriptionRateTerm	=$data['SubscriptionRateTerm'];
			} 
		
			echo "<h3 class=\"title\">". sprintf(__("Edit %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."</h3>\n";
			echo "<p>". sprintf(__("Fill in the form below to add a new record %1$s", rb_agency_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN) ." *</strong></p>\n";
	
		} else {
		
			$SubscriptionRateID		= 0;
			$SubscriptionRateTitle	="";
			$SubscriptionRateType	="";
			$SubscriptionRateText	="";
			$SubscriptionRatePrice	= 0;
			$SubscriptionRateTerm	= 1;
			
			
			echo "<h3>". sprintf(__("Create New  %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>\n";
			echo "<p>". __("Make changes in the form below to edit a ", rb_agency_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN) ." *</strong></p>\n";
		} // Has Subscription rate or not
  } // Edit record
		
	echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"". admin_url("admin.php?page=". $_GET['page'] ."&ConfigID=". $ConfigID) ."\">\n";
	echo "<table class=\"form-table\">\n";
	echo "<tbody>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Title", rb_agency_TEXTDOMAIN) .":</th>\n";
	echo "        <td><input type=\"text\" id=\"SubscriptionRateTitle\" name=\"SubscriptionRateTitle\" value=\"". $SubscriptionRateTitle ."\" /></td>\n";
	echo "    </tr>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Type", rb_agency_TEXTDOMAIN) ." *:</th>\n";
	echo "        <td><select id=\"SubscriptionRateType\" name=\"SubscriptionRateType\">\n";
	echo "			  <option value=\"0\"". selected(0, $SubscriptionRateType) .">Standard</option>\n";
	echo "          </select></td>\n";
	echo "    </tr>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Text", rb_agency_TEXTDOMAIN) ." *:</th>\n";
	echo "        <td><textarea id=\"SubscriptionRateText\" name=\"SubscriptionRateText\">". $SubscriptionRateText ."</textarea></td>\n";
	echo "    </tr>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Package Rate", rb_agency_TEXTDOMAIN) ." *:</th>\n";
	echo "        <td><input type=\"text\" id=\"SubscriptionRatePrice\" name=\"SubscriptionRatePrice\" value=\"". $SubscriptionRatePrice ."\" /></td>\n";
	echo "    </tr>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Subscription Duration", rb_agency_TEXTDOMAIN) ." *:</th>\n";
	echo "        <td><select id=\"SubscriptionRateTerm\" name=\"SubscriptionRateTerm\">\n";
	echo "			  <option value=\"1\"". selected(1, $SubscriptionRateTerm) .">1 Month</option>\n";
	echo "			  <option value=\"2\"". selected(2, $SubscriptionRateTerm) .">2 Months</option>\n";
	echo "			  <option value=\"3\"". selected(3, $SubscriptionRateTerm) .">3 Months</option>\n";
	echo "			  <option value=\"6\"". selected(6, $SubscriptionRateTerm) .">6 Months</option>\n";
	echo "			  <option value=\"12\"". selected(12, $SubscriptionRateTerm) .">1 Year</option>\n";
	echo "			  <option value=\"24\"". selected(24, $SubscriptionRateTerm) .">2 Years</option>\n";
	echo "			  <option value=\"36\"". selected(36, $SubscriptionRateTerm) .">3 Years</option>\n";
	echo "          </select></td>\n";
	echo "    </tr>\n";
	echo "  </tbody>\n";
	echo "</table>\n";
	if ( $SubscriptionRateID > 0) {
	echo "<p class=\"submit\">\n";
	echo "     <input type=\"hidden\" name=\"SubscriptionRateID\" value=\"". $SubscriptionRateID ."\" />\n";
	echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "     <input type=\"hidden\" name=\"action\" value=\"editRecord\" />\n";
	echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Update Record", rb_agency_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
	echo "</p>\n";
	} else {
	echo "<p class=\"submit\">\n";
	echo "     <input type=\"hidden\" name=\"action\" value=\"addRecord\" />\n";
	echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Create Record", rb_agency_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
	echo "</p>\n";
	} 
	echo "</form>\n";
	
	echo "  <h3 class=\"title\">". __("All Records", rb_agency_TEXTDOMAIN) ."</h3>\n";
	
		/******** Sort Order ************/
		$sort = "";
		if (isset($_GET['sort']) && !empty($_GET['sort'])){
			$sort = $_GET['sort'];
		}
		else {
			$sort = "SubscriptionRatePrice, SubscriptionRateTitle";
		}

		/******** Direction ************/
		$dir = "";
		if (isset($_GET['dir']) && !empty($_GET['dir'])){
			$dir = $_GET['dir'];
			if ($dir == "desc" || !isset($dir) || empty($dir)){
			   $sortDirection = "asc";
			   } else {
			   $sortDirection = "desc";
			} 
		} else {
			   $sortDirection = "desc";
			   $dir = "asc";
		}
	
		echo "<form method=\"post\" action=\"". admin_url("admin.php?page=rb_agency_settings&ConfigID=12") ."\">\n";	
		echo "<table cellspacing=\"0\" class=\"widefat fixed\">\n";
		echo "<thead>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\"manage-column column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=SubscriptionRateTitle&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Title", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=SubscriptionRateType&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Type", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=SubscriptionRatePrice&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Rate/Term", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=SubscriptionRateText&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Text", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "    </tr>\n";
		echo "</thead>\n";
		echo "<tfoot>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\" columnmanage-column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Title", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Type", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Rate/Term", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Price", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "    </tr>\n";
		echo "</tfoot>\n";
		echo "<tbody>\n";
	
		$query = "SELECT * FROM ". table_agencyinteract_subscription_rates ." ORDER BY $sort $dir";
		$results =  $wpdb->get_results($wpdb->prepare($query), ARRAY_A);
		$count = $wpdb->num_rows;
		foreach ($results as $data) {
				$SubscriptionRateID	=$data['SubscriptionRateID'];
		echo "    <tr>\n";
		echo "        <th class=\"check-column\" scope=\"row\"><input type=\"checkbox\" class=\"administrator\" id=\"". $SubscriptionRateID ."\" name=\"". $SubscriptionRateID ."\" value=\"". $SubscriptionRateID ."\" /></th>\n";
		echo "        <td class=\"column\">". stripslashes($data['SubscriptionRateTitle']) ."\n";
		echo "          <div class=\"row-actions\">\n";
		echo "            <span class=\"edit\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=editRecord&amp;SubscriptionRateID=". $SubscriptionRateID ."&amp;ConfigID=". $ConfigID ."\" title=\"". __("Edit this Record", rb_agency_TEXTDOMAIN) . "\">". __("Edit", rb_agency_TEXTDOMAIN) . "</a> | </span>\n";
		echo "            <span class=\"delete\"><a class=\"submitdelete\" href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=deleteRecord&amp;SubscriptionRateID=". $SubscriptionRateID ."&amp;ConfigID=". $ConfigID ."\"  onclick=\"if ( confirm('". __("You are about to delete this ". LabelSingular, rb_agency_TEXTDOMAIN) . ".\'". __("Cancel", rb_agency_TEXTDOMAIN) . "\' ". __("to stop", rb_agency_TEXTDOMAIN) . ", \'". __("OK", rb_agency_TEXTDOMAIN) . "\' ". __("to delete", rb_agency_TEXTDOMAIN) . ".') ) { return true;}return false;\" title=\"". __("Delete this Record", rb_agency_TEXTDOMAIN) . "\">". __("Delete", rb_agency_TEXTDOMAIN) . "</a> </span>\n";
		echo "          </div>\n";
		echo "        </td>\n";
		echo "        <td class=\"column\">"; if ($data['SubscriptionRateType'] == 0) { echo "Standard"; } echo "</td>\n";
		echo "        <td class=\"column\">$". $data['SubscriptionRatePrice'] ." / ". $data['SubscriptionRateTerm'] ." Month Term</td>\n";
		echo "        <td class=\"column\">". $data['SubscriptionRateText'] ."</td>\n";
		echo "    </tr>\n";
		}
		if ($count < 1) {
		echo "    <tr>\n";
		echo "        <td class=\"check-column\" scope=\"row\"></th>\n";
		echo "        <td class=\"column\" colspan=\"5\"><p>". __("There aren't any records loaded yet", rb_agency_TEXTDOMAIN) . "!</p></td>\n";
		echo "    </tr>\n";
		}
		echo "</tbody>\n";
		echo "</table>\n";
		echo "<p class=\"submit\">\n";
		echo "    <input type=\"hidden\" name=\"action\" value=\"deleteRecord\" />\n";
		echo "    <input type=\"submit\" name=\"submit\" value=\"". __("Delete", rb_agency_TEXTDOMAIN) . "\" class=\"button-primary\" />\n";
		echo "</p>\n";
		
		echo "</form>\n";




}
elseif ($ConfigID == 2) {
//*************************************************************************************************** //
/*
 * Manage Style
 */

	// Get the file
	$rb_agency_stylesheet = rb_agency_BASEREL ."theme/style.css";


	/*
	 * Save File
	 */

		// Update File
		if ($_POST["action"] == "saveChanges") {
			$rb_agency_stylesheet_file = fopen($rb_agency_stylesheet,"w") or exit("<p>Unable to open file to write!  Please edit via FTP</p>");
			$rb_agency_stylesheet_string = stripslashes($_POST["rb_agency_stylesheet_string"]);
			fwrite($rb_agency_stylesheet_file,$rb_agency_stylesheet_string,strlen($rb_agency_stylesheet_string));
		}


	/*
	 * Ensure Stylesheet Exists
	 */

		if (file_exists($rb_agency_stylesheet)) {
			// File Exists, check when it was modified last.
			echo "<div id=\"message\" class=\"updated\"><p>Style last updated on " . date ("F d Y H:i:s.", filemtime($rb_agency_stylesheet)) .".</p></div>";

		} else { // File Does Not Exist
			$rb_agency_stylesheet = rb_agency_BASEREL ."style/style_base.css";
			echo "<div id=\"message\" class=\"error\"><p>Stylesheet not setup, please click <strong>Save Changes</strong> below to initialize.</p></div>";
		}


	/*
	 * Open File & Get Text
	 */

		// Open File
		$rb_agency_stylesheet_file = fopen($rb_agency_stylesheet,"r") or exit("Unable to open file to read!");

		// Initialize Stgring
		$rb_agency_stylesheet_string = "";

		// Get all lines from css file
		while(!feof($rb_agency_stylesheet_file)) {
			$rb_agency_stylesheet_string .= fgets($rb_agency_stylesheet_file);
		}

		// Close File
		fclose($rb_agency_stylesheet_file);


	/*
	 * Edit
	 */

		// Override
		if ($_GET["mode"] == "override") {
			echo "<h1>OVERRIDE</h1>";
			$rb_agency_options_arr = get_option('rb_agency_options');
			if ($rb_agency_options_arr['rb_agency_option_defaultcss']) {
				$rb_agency_stylesheet_string = $rb_agency_options_arr['rb_agency_option_defaultcss'];
			}
		}


	echo "		<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."\">\n";
	echo "		<table class=\"form-table\">\n";
	echo "		<tbody>\n";
	echo "		 <tr valign=\"top\">\n";
	echo "		   <th scope=\"row\">". __('Stylesheet', rb_agency_TEXTDOMAIN); echo "</th>\n";
	echo "		   <td><textarea name=\"rb_agency_stylesheet_string\" style=\"width: 100%; height: 300px;\" />". $rb_agency_stylesheet_string ."</textarea></td>\n";
	echo "		 </tr>\n";
	echo "		</table>\n";
	echo "		<input type=\"hidden\" name=\"action\" value=\"saveChanges\" />\n";
	echo "		<input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "		<input type=\"submit\" class=\"button-primary\" value=\"". __('Save Changes'); echo "\" />\n";
	echo "		</form>\n";

	echo "<hr />NOTE: These forms must be saved seprately.  Only make changes to one at a time.";

	/*
	 * Update Options
	 */
		// Get Group
		$rb_agency_options_arr = get_option('rb_agency_layout_options');

		// Set Default Values
		$rb_agency_value_styleheader = $rb_agency_options_arr['rb_agency_option_styleheader'];
		$rb_agency_value_stylefooter = $rb_agency_options_arr['rb_agency_option_stylefooter'];

		/*
		 * Form
		 */
		echo "<form method=\"post\" action=\"options.php\">\n";
		settings_fields( 'rb-agency-settings-layout-group' ); 
		echo "<table class=\"form-table\">\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Extra HTML', rb_agency_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Header', rb_agency_TEXTDOMAIN); echo "</th>\n";
		echo "   <td><textarea name=\"rb_agency_layout_options[rb_agency_option_styleheader]\">". $rb_agency_value_styleheader ."</textarea></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Footer', rb_agency_TEXTDOMAIN); echo "</th>\n";
		echo "   <td><textarea name=\"rb_agency_layout_options[rb_agency_option_stylefooter]\">". $rb_agency_value_stylefooter ."</textarea></td>\n";
		echo " </tr>\n";
		echo "</table>\n";
		echo "<input type=\"submit\" class=\"button-primary\" value=\"". __('Save Changes') ."\" />\n";
		echo "<input type=\"hidden\" name=\"rb_agency_layout_options[rb_agency_options_showtooltip]\" value=\"1\"/>";
		echo "</form>\n";





}
elseif ($ConfigID == 3) {
//*************************************************************************************************** //
/*
 * Manage Style
 */

	// Identify Labels
	define("LabelPlural", __("Gender Types", rb_agency_TEXTDOMAIN));
	define("LabelSingular", __("Gender Type", rb_agency_TEXTDOMAIN));

	/*
	 * Save Record
	 */
	if ( isset($_POST['action']) ) {

		$GenderID = $_POST['GenderID'];
		$GenderTitle = $_POST['GenderTitle'];

		// Error checking
		$error = "";
		$have_error = false;
		if(trim($GenderTitle) == ""){
			$error .= "<b><i>". __(LabelSingular ." name is required", rb_agency_TEXTDOMAIN) . ".</i></b><br>";
			$have_error = true;
		}

		$action = $_POST['action'];
		switch($action) {

		// Add
		case 'addRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %1$s, please ensure you have filled out all required fields", rb_agency_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
			} else {
				// Create Record
				$insert = "INSERT INTO " . table_agency_data_gender . " (GenderTitle) VALUES ('" . $wpdb->escape($GenderTitle) . "')";
				$results = $wpdb->query($insert);
				$lastid = $wpdb->insert_id;

				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%1$s <strong>added</strong> successfully! You may now %1$s Load Information to the record", rb_agency_TEXTDOMAIN), LabelSingular, "<a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&LoginTypeID=". $lastid ."\">") .".</a></p><p>".$error."</p></div>"); 
			}
		break;

		// Manage
		case 'editRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %1$s, please ensure you have filled out all required fields", rb_agency_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
			} else {
				$update = "UPDATE " . table_agency_data_gender . " 
							SET 
								GenderTitle='" . $wpdb->escape($GenderTitle) . "'
							WHERE GenderID='$GenderID'";
				$updated = $wpdb->query($update);
				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%1$s <strong>updated</strong> successfully", rb_agency_TEXTDOMAIN), LabelSingular) ."!</p><p>".$error."</p></div>"); 
			}
		break;
		// Delete bulk
		case 'deleteRecord':
			foreach($_POST as $GenderID) {
			  if (is_numeric($GenderID)) {
				// Verify Record
				$queryDelete = "SELECT GenderID, GenderTitle FROM ". table_agency_data_gender ." WHERE GenderID =  \"". $GenderID ."\"";
				$resultsDelete = $wpdb->get_results($wpdb->prepare($queryDelete), ARRAY_A);
				foreach ($resultsDelete as $dataDelete) {
					// Remove Record
					$delete = "DELETE FROM " . table_agency_data_gender . " WHERE GenderID = \"". $GenderID ."\"";
					$results = $wpdb->query($delete);
					
					echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['GenderTitle'] ."</strong> deleted successfully", rb_agency_TEXTDOMAIN) ."!</p></div>\n";
						
				} // while
			  } // it was numeric
			} // for each
		break;

		} // Switch


	} elseif ($_GET['action'] == "deleteRecord") {
	// Delete Record

		$GenderID = $_GET['GenderID'];
		if (is_numeric($GenderID)) {
			// Verify Record
			$queryDelete = "SELECT GenderID, GenderTitle FROM ". table_agency_data_gender ." WHERE GenderID =  \"". $GenderID ."\"";
			$resultsDelete = $wpdb->get_results($wpdb->prepare($queryDelete), ARRAY_A);
			foreach ($resultsDelete as $dataDelete) {
			
				// Remove Record
				$delete = "DELETE FROM " . table_agency_data_gender . " WHERE GenderID = \"". $GenderID ."\"";
				$results = $wpdb->query($delete);
				
				echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['GenderTitle'] ."</strong> deleted successfully", rb_agency_TEXTDOMAIN) ."!</p></div>\n";
					
			} // is there record?
		} // it was numeric

	/*
	 * Edit Record
	 */
	} elseif ($_GET['action'] == "editRecord") {
		$action = $_GET['action'];
		$GenderID = $_GET['GenderID'];

		if ( $GenderID > 0) {
			$query = "SELECT * FROM " . table_agency_data_gender . " WHERE GenderID='$GenderID'";
			$results = $wpdb->get_results($wpdb->prepare($query), ARRAY_A);
			$count = $wpdb->num_rows;
			foreach ($results as $data) {
				$GenderID =$data['GenderID'];
				$GenderTitle =stripslashes($data['GenderTitle']);
			}

			echo "<h3 class=\"title\">". sprintf(__("Edit %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."</h3>\n";
			echo "<p>". sprintf(__("Fill in the form below to add a new record %1$s", rb_agency_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN) ." *</strong></p>\n";
		}

	/*
	 * Create New
	 */
	} else {

			$GenderID = 0;
			$GenderTitle ="";
			$GenderTag ="";

			echo "<h3>". sprintf(__("Create New %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>\n";
			echo "<p>". __("Make changes in the form below to edit a ", rb_agency_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN) ." *</strong></p>\n";
	}


	/*
	 * Input Data
	 */

	echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."\">\n";
	echo "<table class=\"form-table\">\n";
	echo "<tbody>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Title", rb_agency_TEXTDOMAIN) .":</th>\n";
	echo "        <td><input type=\"text\" id=\"GenderTitle\" name=\"GenderTitle\" value=\"". $GenderTitle ."\" /></td>\n";
	echo "    </tr>\n";
	echo "  </tbody>\n";
	echo "</table>\n";
	if ( $GenderID > 0) {
	echo "<p class=\"submit\">\n";
	echo "     <input type=\"hidden\" name=\"GenderID\" value=\"". $GenderID ."\" />\n";
	echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "     <input type=\"hidden\" name=\"action\" value=\"editRecord\" />\n";
	echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Update Record", rb_agency_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
	echo "</p>\n";
	} else {
	echo "<p class=\"submit\">\n";
	echo "     <input type=\"hidden\" name=\"action\" value=\"addRecord\" />\n";
	echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Create Record", rb_agency_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
	echo "</p>\n";
	} 
	echo "</form>\n";
	
	echo "  <h3 class=\"title\">". __("All Records", rb_agency_TEXTDOMAIN) ."</h3>\n";

	/******** Sort Order ************/
	$sort = "";
	if (isset($_GET['sort']) && !empty($_GET['sort'])){
		$sort = $_GET['sort'];
	}
	else {
		$sort = "GenderTitle";
	}
	
	/******** Direction ************/
	$dir = "";
	if (isset($_GET['dir']) && !empty($_GET['dir'])){
		$dir = $_GET['dir'];
		if ($dir == "desc" || !isset($dir) || empty($dir)){
		   $sortDirection = "asc";
		   } else {
		   $sortDirection = "desc";
		} 
	} else {
		   $sortDirection = "desc";
		   $dir = "asc";
	}

	echo "<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."\">\n";	
	echo "<table cellspacing=\"0\" class=\"widefat fixed\">\n";
	echo "<thead>\n";
	echo "    <tr class=\"thead\">\n";
	echo "        <th class=\"manage-column column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
	echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=GenderTitle&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Title", rb_agency_TEXTDOMAIN) ."</a></th>\n";
	echo "    </tr>\n";
	echo "</thead>\n";
	echo "<tfoot>\n";
	echo "    <tr class=\"thead\">\n";
	echo "        <th class=\" columnmanage-column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
	echo "        <th class=\"column\" scope=\"col\">". __("Title", rb_agency_TEXTDOMAIN) ."</th>\n";
	echo "    </tr>\n";
	echo "</tfoot>\n";
	echo "<tbody>\n";

	$query = "SELECT * FROM ". table_agency_data_gender ." ORDER BY $sort $dir";
	$results =$wpdb->get_results($wpdb->prepare($query), ARRAY_A);
	$count = $wpdb->num_rows;
	foreach ($results as $data) {
			$GenderID	=$data['GenderID'];
		
		
	echo "    <tr>\n";
	echo "        <th class=\"check-column\" scope=\"row\"><input type=\"checkbox\" class=\"administrator\" id=\"". $GenderID ."\" name=\"". $GenderID ."\" value=\"". $GenderID ."\" /></th>\n";
	echo "        <td class=\"column\">". stripslashes($data['GenderTitle']) ."\n";
	echo "          <div class=\"row-actions\">\n";
	echo "            <span class=\"edit\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=editRecord&amp;GenderID=". $GenderID ."&amp;ConfigID=". $ConfigID ."\" title=\"". __("Edit this Record", rb_agency_TEXTDOMAIN) . "\">". __("Edit", rb_agency_TEXTDOMAIN) . "</a> | </span>\n";
	echo "            <span class=\"delete\"><a class=\"submitdelete\" href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=deleteRecord&amp;GenderID=". $GenderID ."&amp;ConfigID=". $ConfigID ."\"  onclick=\"if ( confirm('". __("You are about to delete this ". LabelSingular, rb_agency_TEXTDOMAIN) . ".\'". __("Cancel", rb_agency_TEXTDOMAIN) . "\' ". __("to stop", rb_agency_TEXTDOMAIN) . ", \'". __("OK", rb_agency_TEXTDOMAIN) . "\' ". __("to delete", rb_agency_TEXTDOMAIN) . ".') ) { return true;}return false;\" title=\"". __("Delete this Record", rb_agency_TEXTDOMAIN) . "\">". __("Delete", rb_agency_TEXTDOMAIN) . "</a> </span>\n";
	echo "          </div>\n";
	echo "        </td>\n";
	echo "    </tr>\n";
	}
	if ($count < 1) {
	echo "    <tr>\n";
	echo "        <td class=\"check-column\" scope=\"row\"></th>\n";
	echo "        <td class=\"column\" colspan=\"3\"><p>". __("There aren't any records loaded yet", rb_agency_TEXTDOMAIN) . "!</p></td>\n";
	echo "    </tr>\n";
	}
	echo "</tbody>\n";
	echo "</table>\n";
	echo "<p class=\"submit\">\n";
	echo "    <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "    <input type=\"hidden\" name=\"action\" value=\"deleteRecord\" />\n";
	echo "    <input type=\"submit\" name=\"submit\" value=\"". __("Delete", rb_agency_TEXTDOMAIN) . "\" class=\"button-primary\" />\n";
	echo "</p>\n";
	
	echo "</form>\n";



} elseif ($ConfigID == 4) {
// *************************************************************************************************** //
// Setup Profile Categories	
	/** Identify Labels **/
	define("LabelPlural", __("Profile Types", rb_agency_TEXTDOMAIN));
	define("LabelSingular", __("Profile Type", rb_agency_TEXTDOMAIN));
  /* Initial Registration [RESPOND TO POST] ***********/ 
  if ( isset($_POST['action']) ) {
	
		$DataTypeID 	= $_POST['DataTypeID'];
		$DataTypeTitle 	= $_POST['DataTypeTitle'];
		$DataTypeTag 	= $_POST['DataTypeTag'];
			if (empty($DataTypeTag)) { $DataTypeTag = RBAgency_Common::format_stripchars($DataTypeTitle); }
		// Error checking
		$error = "";
		$have_error = false;
		if(trim($DataTypeTitle) == ""){
			$error .= "<b><i>". __(LabelSingular ." name is required", rb_agency_TEXTDOMAIN) . ".</i></b><br>";
			$have_error = true;
		}
		$action = $_POST['action'];
		switch($action) {
	
		// Add
		case 'addRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %1$s, please ensure you have filled out all required fields", rb_agency_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
			} else {
		
				// Create Record
				$insert = "INSERT INTO " . table_agency_data_type . " (DataTypeTitle,DataTypeTag) VALUES ('" . $wpdb->escape($DataTypeTitle) . "','" . $wpdb->escape($DataTypeTag) . "')";
				$results = $wpdb->query($insert);
				$lastid = $wpdb->insert_id;
				
				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%1$s <strong>added</strong> successfully! You may now %1$s Load Information to the record", rb_agency_TEXTDOMAIN), LabelSingular, "<a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&LoginTypeID=". $lastid ."\">") .".</a></p><p>".$error."</p></div>"); 
			}
		break;
	
		// Manage
		case 'editRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %1$s, please ensure you have filled out all required fields", rb_agency_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
			} else {
				$update = "UPDATE " . table_agency_data_type . " 
							SET 
								DataTypeTitle='" . $wpdb->escape($DataTypeTitle) . "',
								DataTypeTag='" . $wpdb->escape($DataTypeTag) . "' 
							WHERE DataTypeID='$DataTypeID'";
				$updated = $wpdb->query($update);
				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%1$s <strong>updated</strong> successfully", rb_agency_TEXTDOMAIN), LabelSingular) ."!</p><p>".$error."</p></div>"); 
			}
		break;
		// Delete bulk
		case 'deleteRecord':
			foreach($_POST as $DataTypeID) {
			  if (is_numeric($DataTypeID)) {
				// Verify Record
				$queryDelete = "SELECT DataTypeID, DataTypeTitle FROM ". table_agency_data_type ." WHERE DataTypeID =  \"". $DataTypeID ."\"";
				$resultsDelete =$wpdb->get_results($wpdb->prepare($queryDelete), ARRAY_A);

				foreach ($resultsDelete as $dataDelete) {
					// Remove Record
					$delete = "DELETE FROM " . table_agency_data_type . " WHERE DataTypeID = \"". $DataTypeID ."\"";
					$results = $wpdb->query($delete);
					
					echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['DataTypeTitle'] ."</strong> deleted successfully", rb_agency_TEXTDOMAIN) ."!</p></div>\n";
						
				} // while
			  } // it was numeric
			} // for each
		break;
		
		} // Switch
		
  } // Action Post
  elseif ($_GET['action'] == "deleteRecord") {
	
	$DataTypeID = $_GET['DataTypeID'];
	  if (is_numeric($DataTypeID)) {
		// Verify Record
		$queryDelete = "SELECT DataTypeID, DataTypeTitle FROM ". table_agency_data_type ." WHERE DataTypeID =  \"". $DataTypeID ."\"";
		$resultsDelete = $wpdb->get_results($wpdb->prepare($queryDelete), ARRAY_A);
		foreach ($resultsDelete as $dataDelete) {
		
			// Remove Record
			$delete = "DELETE FROM " . table_agency_data_type . " WHERE DataTypeID = \"". $DataTypeID ."\"";
			$results = $wpdb->query($delete);
			
			echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['DataTypeTitle'] ."</strong> deleted successfully", rb_agency_TEXTDOMAIN) ."!</p></div>\n";
				
		} // is there record?
	  } // it was numeric
  }
  elseif ($_GET['action'] == "editRecord") {
		$action = $_GET['action'];
		$DataTypeID = $_GET['DataTypeID'];
		
		if ( $DataTypeID > 0) {
			$query = "SELECT * FROM " . table_agency_data_type . " WHERE DataTypeID='$DataTypeID'";
			$results = $wpdb->get_results($wpdb->prepare($query), ARRAY_A);
			$count = $wpdb->num_rows;
			foreach ($results as $data) {
				$DataTypeID		=$data['DataTypeID'];
				$DataTypeTitle	=stripslashes($data['DataTypeTitle']);
				$DataTypeTitle = str_replace(' ', '_', $DataTypeTitle);
				$DataTypeTag	=$data['DataTypeTag'];
			} 
		
			echo "<h3 class=\"title\">". sprintf(__("Edit %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."</h3>\n";
			echo "<p>". sprintf(__("Fill in the form below to add a new record %1$s", rb_agency_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN) ." *</strong></p>\n";
		}
  } else {
		
			$DataTypeID		= 0;
			$DataTypeTitle	="";
			$DataTypeTag	="";
			
			echo "<h3>". sprintf(__("Create New %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>\n";
			echo "<p>". __("Make changes in the form below to edit a ", rb_agency_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN) ." *</strong></p>\n";
  }
	echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."\">\n";
	echo "<table class=\"form-table\">\n";
	echo "<tbody>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Title", rb_agency_TEXTDOMAIN) .":</th>\n";
	echo "        <td><input type=\"text\" id=\"DataTypeTitle\" name=\"DataTypeTitle\" value=\"". $DataTypeTitle ."\" /></td>\n";
	echo "    </tr>\n";
	if ( $DataTypeID > 0) {
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Slug", rb_agency_TEXTDOMAIN) .":</th>\n";
	echo "        <td><input type=\"text\" id=\"DataTypeTag\" name=\"DataTypeTag\" value=\"". $DataTypeTag ."\" /></td>\n";
	echo "    </tr>\n";
	} 
	echo "  </tbody>\n";
	echo "</table>\n";
	if ( $DataTypeID > 0) {
	echo "<p class=\"submit\">\n";
	echo "     <input type=\"hidden\" name=\"DataTypeID\" value=\"". $DataTypeID ."\" />\n";
	echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "     <input type=\"hidden\" name=\"action\" value=\"editRecord\" />\n";
	echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Update Record", rb_agency_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
	echo "</p>\n";
	} else {
	echo "<p class=\"submit\">\n";
	echo "     <input type=\"hidden\" name=\"action\" value=\"addRecord\" />\n";
	echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Create Record", rb_agency_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
	echo "</p>\n";
	} 
	echo "</form>\n";
	
	echo "  <h3 class=\"title\">". __("All Records", rb_agency_TEXTDOMAIN) ."</h3>\n";
	
		/******** Sort Order ************/
		$sort = "";
		if (isset($_GET['sort']) && !empty($_GET['sort'])){
			$sort = $_GET['sort'];
		}
		else {
			$sort = "DataTypeTitle";
		}
		
		/******** Direction ************/
		$dir = "";
		if (isset($_GET['dir']) && !empty($_GET['dir'])){
			$dir = $_GET['dir'];
			if ($dir == "desc" || !isset($dir) || empty($dir)){
			   $sortDirection = "asc";
			   } else {
			   $sortDirection = "desc";
			} 
		} else {
			   $sortDirection = "desc";
			   $dir = "asc";
		}
	
		echo "<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."\">\n";	
		echo "<table cellspacing=\"0\" class=\"widefat fixed\">\n";
		echo "<thead>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\"manage-column column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=DataTypeTitle&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Title", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=DataTypeTag&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Slug", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "    </tr>\n";
		echo "</thead>\n";
		echo "<tfoot>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\" columnmanage-column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Title", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Slug", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "    </tr>\n";
		echo "</tfoot>\n";
		echo "<tbody>\n";
	
		$query = "SELECT * FROM ". table_agency_data_type ." ORDER BY $sort $dir";
		$results = $wpdb->get_results($wpdb->prepare($query), ARRAY_A);
		$count = $wpdb->num_rows;
		foreach ($results as $data) {
			$DataTypeID	=$data['DataTypeID'];
		echo "    <tr>\n";
		echo "        <th class=\"check-column\" scope=\"row\"><input type=\"checkbox\" class=\"administrator\" id=\"". $DataTypeID ."\" name=\"". $DataTypeID ."\" value=\"". $DataTypeID ."\" /></th>\n";
		echo "        <td class=\"column\">". stripslashes($data['DataTypeTitle']) ."\n";
		echo "          <div class=\"row-actions\">\n";
		echo "            <span class=\"edit\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=editRecord&amp;DataTypeID=". $DataTypeID ."&amp;ConfigID=". $ConfigID ."\" title=\"". __("Edit this Record", rb_agency_TEXTDOMAIN) . "\">". __("Edit", rb_agency_TEXTDOMAIN) . "</a> | </span>\n";
		echo "            <span class=\"delete\"><a class=\"submitdelete\" href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=deleteRecord&amp;DataTypeID=". $DataTypeID ."&amp;ConfigID=". $ConfigID ."\"  onclick=\"if ( confirm('". __("You are about to delete this ". LabelSingular, rb_agency_TEXTDOMAIN) . ".\'". __("Cancel", rb_agency_TEXTDOMAIN) . "\' ". __("to stop", rb_agency_TEXTDOMAIN) . ", \'". __("OK", rb_agency_TEXTDOMAIN) . "\' ". __("to delete", rb_agency_TEXTDOMAIN) . ".') ) { return true;}return false;\" title=\"". __("Delete this Record", rb_agency_TEXTDOMAIN) . "\">". __("Delete", rb_agency_TEXTDOMAIN) . "</a> </span>\n";
		echo "          </div>\n";
		echo "        </td>\n";
		echo "        <td class=\"column\">". $data['DataTypeTag'] ."</td>\n";
		echo "    </tr>\n";
		}
		if ($count < 1) {
		echo "    <tr>\n";
		echo "        <td class=\"check-column\" scope=\"row\"></th>\n";
		echo "        <td class=\"column\" colspan=\"3\"><p>". __("There aren't any records loaded yet", rb_agency_TEXTDOMAIN) . "!</p></td>\n";
		echo "    </tr>\n";
		}
		echo "</tbody>\n";
		echo "</table>\n";
		echo "<p class=\"submit\">\n";
		echo "    <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
		echo "    <input type=\"hidden\" name=\"action\" value=\"deleteRecord\" />\n";
		echo "    <input type=\"submit\" name=\"submit\" value=\"". __("Delete", rb_agency_TEXTDOMAIN) . "\" class=\"button-primary\" />\n";
		echo "</p>\n";
		
		echo "</form>\n";
}	 // End	

elseif ($ConfigID == 7){

global $wpdb;
echo "<div class=\"wrap\">\n";
echo "  <h3 class=\"title\">". __("Define Country", rb_agency_TEXTDOMAIN) ."</h3>\n";
if(isset($_POST['country_add'])) {
	$CountryTitle  = $_POST['CountryTitle'];
	$CountryCode  = $_POST['CountryCode'];
	// Error checking
	$error = "";
	$have_error = false;
	if(trim($CountryTitle) == ""){
		$error .= "<b><i>". __("Country title is required", rb_agency_TEXTDOMAIN) . ".</i></b><br>";
		$have_error = true;
	}
	if(trim($CountryCode) == ""){
		$error .= "<b><i>". __("Country code is required", rb_agency_TEXTDOMAIN) . ".</i></b><br>";
		$have_error = true;
	}
	
	if($have_error){
		echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating country, please ensure you have filled out all required fields", 		rb_agency_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
	} 
	else{				
		
		$wpdb->insert( 
		table_agency_data_country, 
		array( 
		'CountryTitle' => $CountryTitle,
		'CountryCode' => $CountryCode 
		) 
		);
		echo '<span class="msg">You have added new entry for country</span>';
	}
}
if(isset($_POST["editaction"])){
	if($_POST["editaction"]=="1"){
		$CountryTitle  = $_POST['title'];
		$CountryCode  = $_POST['code'];
		$CountryID  = $_POST['id'];
		$wpdb->update( 
			table_agency_data_country, 
			array( 
			'CountryTitle' => $CountryTitle,
			'CountryCode' => $CountryCode 
			),
			array( 
			'CountryID' => $CountryID,
			) 
		);
	}
	if($_POST["editaction"]=="2"){
		$StateTitle  = $_POST['title'];
		$StateCode  = $_POST['code'];
		$StateID  = $_POST['id'];
		$wpdb->update( 
			table_agency_data_state, 
			array( 
			'StateTitle' => $StateTitle,
			'StateCode' => $StateCode 
			),
			array( 
			'StateID' => $StateID,
			) 
		);
	}
		
	}
 ?>
<form method="post" name="add_country" id="add_country" action="<?php echo admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=7"; ?>">
<input type="hidden" value="addCountry" name="action">
<div class="country_added">
<div class="error"></div>
<div class="country_txt"><span>Country Title</span></div>
<div class="country_in"><input type="text" name="CountryTitle" id="CountryTitle" size="27" value="<?php echo $_POST["CountryTitle"];?>">
<div class="country_txt"><span>Country Code</span></div>
<div class="country_in"><input type="text" name="CountryCode" id="CountryCode" size="27" value="<?php echo $_POST["CountryCode"];?>">
</div>
<div class="country_ro"><input type="submit" class="button-primary" name="country_add" value="Add"></div>
</div>
</form>
<?php 
// Get Country to be deleted
	if(!isset($_REQUEST['delcountry']) && empty($_REQUEST['delcountry'])){ 
		$delCountry = 0;
	} else {
	$delCountry = $_REQUEST['delcountry']; 
	// Remove Records from country and states
	$deleteCountry = "DELETE FROM " . table_agency_data_country . " WHERE CountryID = \"". $delCountry ."\"";
	$resultsCountry = $wpdb->query($deleteCountry);
	 $deleteState= "DELETE FROM " . table_agency_data_state . " WHERE CountryID = \"". $delCountry ."\"";
	$resultsState = $wpdb->query($deleteState);
	echo '<span class="msg">Country has been deleted successfully</span>';
	}
echo '<div class="msg"></div>';
$location=admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=7";
echo '<input type="hidden" name="url" id="url" value='.$location.'/>';
echo '<table><tr>';
echo '<th>'.__("Country Title", rb_agency_TEXTDOMAIN).'</th>';
echo '<th>'.__("Country Code", rb_agency_TEXTDOMAIN).'</th>';
echo '<th>'.__("Action", rb_agency_TEXTDOMAIN).'</th>';

echo '</tr>';
$myrows = $wpdb->get_results( "SELECT * FROM ".table_agency_data_country." ORDER BY CountryTitle ASC" );

foreach($myrows as $result) {
echo '<tr>';
echo '<td class="countryTitle" >'.$result->CountryTitle.'</td>';
echo '<td class="countryCode">'.$result->CountryCode.'</td>';
echo '<td>'.__('<a id="country'.$result->CountryID.'" class='.$location.' href="javascript:void(0)" onclick="editCountry(this.id);">Edit&nbsp;</a>'.
'<a href="'.admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=7&delcountry=".$result->CountryID.'" 
onclick="javascript: return confirm(\'Are you sure?\')">|&nbsp;Delete</a>', rb_agency_TEXTDOMAIN).'</td>';
echo '</tr>';
}
echo '</table>';

echo "  <h3 class=\"title\">". __("Insert State", rb_agency_TEXTDOMAIN) ."</h3>\n";
if(isset($_POST['state_add'])) {
	$CountryID  = $_POST['CountryID'];
	$StateTitle  = $_POST['StateTitle'];
	$StateCode  = $_POST['StateCode'];
	
	// Error checking
	$error = "";
	$have_error = false;
	if(trim($CountryID) == "-1"){
		$error .= "<b><i>". __("Please select country", rb_agency_TEXTDOMAIN) . ".</i></b><br>";
		$have_error = true;
	}
	if(trim($StateTitle) == ""){
		$error .= "<b><i>". __("State title is required", rb_agency_TEXTDOMAIN) . ".</i></b><br>";
		$have_error = true;
	}
	if(trim($StateCode) == ""){
		$error .= "<b><i>". __("State code is required", rb_agency_TEXTDOMAIN) . ".</i></b><br>";
		$have_error = true;
	}
	
	if($have_error){
		echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating state, please ensure you have filled out all required fields", 		rb_agency_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
	} 
	else{				
		$wpdb->insert( 
		table_agency_data_state, 
		array( 
		'CountryID' => $CountryID,
		'StateTitle' => $StateTitle, 
		'StateCode' => $StateCode 
		) 
		);
		echo '<span class="msg">You have added new entry for states</span>';
	}
}



 ?>
<form method="post">
<div class="country_added">
<div class="country_txt"><span>Select Country</span></div>
<div class="country_in"><select name="CountryID" ><option value="-1">Select Country</option><?php 
foreach($myrows as $result) {
 ?>
<option <?php if($_POST['CountryID']==$result->CountryID){?>selected="selected"<?php }?> value="<?php echo $result->CountryID; ?>"><?php echo $result->CountryTitle; ?></option>
<?php } ?>
</select></div>
<div class="country_txt" style="width:6%;"><span>State Name</span></div>
<div class="country_in"><input type="text" name="StateTitle" value="<?php echo $_POST['StateTitle'];?>" size="27">
<div class="country_txt" style="width:6%;"><span>Code</span></div>
<div class="country_in"><input type="text" name="StateCode" value="<?php echo $_POST['StateCode'];?>" size="27">
</div>
<div class="country_ro"><input type="submit" name="state_add" class="button-primary" value="Add"></div>
</div>
</form>
<div class="clear"></div>


<?php
// Get Country to be deleted
	if(!isset($_REQUEST['delstate']) && empty($_REQUEST['delstate'])){ 
		$delState = 0;
	} else {
		$delState = $_REQUEST['delstate']; 
		// Remove Record
		$deleteState = "DELETE FROM " . table_agency_data_state . " WHERE StateID = \"". $delState ."\"";
		$results = $wpdb->query($deleteState);
		
		echo '<span class="msg">State has been deleted successfully</span>';
	}
echo '<table>';
$getCountry = $wpdb->get_results( "SELECT * FROM ".table_agency_data_country." ORDER BY CountryTitle ASC" );
foreach($getCountry as $countryRs) {
	echo '<tr><td><h3>'.$countryRs->CountryTitle.'</h3></td></tr>';
	echo '<tr>';
	echo '<th style="text-align:left;">'.__("State Title", rb_agency_TEXTDOMAIN).'</th>';
	echo '<th style="text-align:left;">'.__("State Code", rb_agency_TEXTDOMAIN).'</th>';
	echo '<th style="text-align:left;">'.__("Action", rb_agency_TEXTDOMAIN).'</th>';
	echo '</tr>';
	echo '<tr>';
	$getStates = $wpdb->get_results( "SELECT * FROM ".table_agency_data_state." WHERE CountryID='$countryRs->CountryID' ORDER BY StateTitle ASC" );
	foreach($getStates as $result) {
		echo '<td class="StateTitle">'.$result->StateTitle.'</td>';
		echo '<td class="StateCode">'.$result->StateCode.'</td>';
		echo '<td>'.__('<a id="state'.$result->StateID.'" class='.$location.' href="javascript:void(0)" onclick="editState(this.id);">Edit&nbsp;</a>'.
		'<a href="'.admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=7&delstate=".$result->StateID.'" 
		onclick="javascript: return confirm(\'Are you sure?\')">|&nbsp;Delete</a>', rb_agency_TEXTDOMAIN).'</td>';
		echo '</tr>';
	}
}
echo '</table>';
?>
</div>
<?php } 


// *************************************************************************************************** //
// Setup Custom Fields




elseif ($ConfigID == 5) {
	/** Identify Labels **/
	define("LabelPlural", __("Custom Fields", rb_agency_TEXTDOMAIN));
	define("LabelSingular", __("Custom Field", rb_agency_TEXTDOMAIN));
	$rb_agency_options_arr = get_option('rb_agency_options');
	$rb_agency_option_unittype  = $rb_agency_options_arr['rb_agency_option_unittype'];
	
	//restore preset
	if(isset($_GET['restore']) && ($_GET['restore'] == 'RestorePreset')){
				//delete initial values ProfileCustomID 1 to 18
				$presets = "'ethnicity','skin tone','hair color','eye color','height','weight','shirt','waist','hips','shoe size','suit','inseam','dress','bust','union','experience','language','booking'";	
				$delete = "DELETE FROM " . table_agency_customfields . " WHERE LOWER(ProfileCustomTitle) IN(".$presets.")";
				mysql_query($delete) or die(mysql_error());
				//repopulate
				$data_custom_exists = $wpdb->get_var( $wpdb->prepare( "SELECT ProfileCustomTitle FROM " . table_agency_customfields . " WHERE ProfileCustomTitle = %s", 'Ethnicity' ) );
				if ( !$data_custom_exists ) {
						// Assume the rest dont exist either
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (1, 'Ethnicity', 	3, '|African American|Caucasian|American Indian|East Indian|Eurasian|Filipino|Hispanic/Latino|Asian|Chinese|Japanese|Korean|Polynesian|Other|', 0, 1, 0, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (2, 'Skin Tone', 	3, '|Fair|Medium|Dark|', 0, 2, 0, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (3, 'Hair Color', 	3, '|Blonde|Black|Brown|Dark Brown|Light Brown|Red|Strawberry|Auburn|', 0, 3, 0, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (4, 'Eye Color', 	3, '|Blue|Brown|Hazel|Green|Black|', 0, 4, 0, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (5, 'Height', 		7, '3', 0, 5, 0, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (6, 'Weight', 		7, '2', 0, 6, 0, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (7, 'Shirt', 		1, '', 0, 8, 1, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (8, 'Waist', 		7, '1', 0, 9, 0, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (9, 'Hips', 		7, '1', 0, 10, 2, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(10, 'Shoe Size', 	7, '1', 0, 11, 0, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(11, 'Suit', 		3, '|36S|37S|38S|39S|40S|41S|42S|43S|44S|45S|46S|36R|38R|40R|42R|44R|46R|48R|50R|52R|54R|40L|42L|44L|46L|48L|50L|52L|54L|', 0, 7, 1, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(12, 'Inseam', 		7, '1', 0, 10, 1, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(13, 'Dress', 		3, '|2|4|6|8|10|12|14|16|18|', 0, 8, 2, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(14, 'Bust', 		7, '|32A|32B|32C|32D|32DD|34A|34B|34C|34D|34DD|36C|36D|36DD|', 0, 7, 2, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(15, 'Union', 		3, '|SAG/AFTRA|SAG ELIG|NON-UNION|', 0, 20, 0, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(16, 'Experience', 	4, '', 0, 13, 0, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(17, 'Language', 	1, '', 0, 14, 0, 1, 1,0, 0, 1, 0)");
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(18, 'Booking', 	4, '', 0, 15, 0, 1, 1,0, 0, 1, 0)");
				}

		 echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%1$s <strong>Restored.</strong> successfully restored custom fields preset values!", rb_agency_TEXTDOMAIN), LabelSingular, "<a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&LoginTypeID=". $lastid ."\">") .".</a></p><p>".$error."</p></div>"); 

	}
		
	/* Initial Registration [RESPOND TO POST] ***********/ 
	if ( isset($_POST['action']) ) {
		
		$ProfileCustomID			= $_POST['ProfileCustomID'];
		$ProfileCustomTitle			= $_POST['ProfileCustomTitle'];
		$ProfileCustomType			= $_POST['ProfileCustomType'];
		$ProfileCustomOptions 		= $_POST['ProfileCustomOptions'];
		$ProfileCustomView 			= (int)$_POST['ProfileCustomView'];
		$ProfileCustomOrder 		= (int)$_POST['ProfileCustomOrder'];
		$ProfileCustomShowGender	= (int)$_POST['ProfileCustomShowGender'];
		$ProfileCustomShowProfile  	= (int)$_POST['ProfileCustomShowProfile'];
		$ProfileCustomShowSearch  	= (int)$_POST['ProfileCustomShowSearch'];
		$ProfileCustomShowLogged  	= (int)$_POST['ProfileCustomShowLogged'];
		$ProfileCustomShowRegistration= (int)$_POST['ProfileCustomShowRegistration'];
		$ProfileCustomShowSearchSimple= (int)$_POST['ProfileCustomShowSearchSimple'];
		$ProfileCustomShowAdmin   	= (int)$_POST['ProfileCustomShowAdmin'];
		$ProfileCustomPrivacy   	= (int)$_POST['ProfileCustomPrivacy'];

		/*
		 * Set profile types here
		 */

		$get_types = "SELECT * FROM ". table_agency_data_type;
		$result = mysql_query($get_types);
		while ( $typ = mysql_fetch_array($result)){
			$t = trim($typ['DataTypeTitle']);
			$t = str_replace(' ', '_', $t);
			$name = 'ProfileType' . $t; 
			$$name = (int) $_POST['ProfileType' . $t]; 
		}

		//adjustment in making the visibility fields into a checkbox
		if($ProfileCustomPrivacy==3){
			$ProfileCustomShowLogged = "0";
			$ProfileCustomShowAdmin  = "0";
		}elseif($ProfileCustomPrivacy==2){
			$ProfileCustomShowLogged = "0";
			$ProfileCustomShowAdmin  = "1";
		}else{
			$ProfileCustomShowLogged = "1";
			$ProfileCustomShowAdmin  = "0";
		}

		$error = "";
		if($ProfileCustomType == 1){ //Text
			//...
		} elseif ($ProfileCustomType == 3){ //Dropdown
			 $label_option ="";
			 $option = "";
			 $label_option2 = "";
			 $option2 = "";
			if(!empty($_POST["option"]) && isset($_POST["option"])){
				foreach($_POST["option"] as $key => $val){
					if(!empty($val)){
						$option .= $val."|";
					}
				}
				$label_option = "".$_POST["option_label"]."|".$option;  //
			}
			if(!empty($_POST["option2"]) && isset($_POST["option2"])){
				foreach($_POST["option2"] as $key2 => $val2){
					if(!empty($val2)){
						$option2 .= $val2."|";
					}
				}
				$label_option2 = ":".$_POST["option_label2"]."|".$option2;  //
			}
			$ProfileCustomOptions = $label_option.$label_option2; 
		}elseif($ProfileCustomType == 4){ //TextArea
			$ProfileCustomOptions = $_POST["ProfileCustomOptions"];
		}elseif($ProfileCustomType == 5){ //Checkbox
			$pos = 0;
			foreach($_POST["label"] as $key => $val){
				if(!empty($_POST["label"]) && $_POST["label"] !=""  && !empty($val)){
					$pos++;		
					if($pos!= count($_POST["label"])){ 
						$ProfileCustomOptions .= $val."|";
					}else{
						$ProfileCustomOptions .= $val;
					}
				}
			}
		}elseif($ProfileCustomType == 6){ //RadioButton
			$pos = 0;
				foreach($_POST["label"] as $key => $val){
				if(!empty($_POST["label"])  && $_POST["label"] !="" && !empty($val)){
					$pos++;	
					if($pos!= count($_POST["label"])){ 
						$ProfileCustomOptions .= $val."|";
					}else{
						$ProfileCustomOptions .= $val;
					}
				}
			}
		}elseif($ProfileCustomType == 7){ //Metric & Imperial
			$ProfileCustomOptions = $_POST["ProfileUnitType"];
		}/*elseif ($ProfileCustomType == 8){ //Dropdown
			 $label_option ="";
			 $option = "";
			 $label_option2 = "";
			 $option2 = "";
			if(!empty($_POST["multiple"]) && isset($_POST["multiple"])){
				foreach($_POST["multiple"] as $key => $val){
					if(!empty($val)){
						$option .= $val."|";
					}
				}
				$label_option = "".$_POST["option_label"]."|".$option;  //
			}
			if(!empty($_POST["option2"]) && isset($_POST["option2"])){
				foreach($_POST["option2"] as $key2 => $val2){
					if(!empty($val2)){
						$option2 .= $val2."|";
					}
				}
				$label_option2 = ":".$_POST["option_label2"]."|".$option2;  //
			}
			$ProfileCustomOptions = $label_option.$label_option2; 
		}*/
		// Error checking
	
		$have_error = false;
		if(trim($ProfileCustomTitle) == ""){
			$error .= "<b><i>". __(LabelSingular ." name is required", rb_agency_TEXTDOMAIN) . ".</i></b><br>";
			$have_error = true;
		}
		$action = $_POST['action'];
		switch($action) {
	
		// Add
		case 'addRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %1$s, please ensure you have filled out all required fields", rb_agency_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
				echo "<h3 style=\"width:430px;\">". sprintf(__("Create New %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>	";
				echo " <div class=\"postbox\"  style=\"width:430px;float:left;border:0px solid black;\">";
				echo"<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >".sprintf(__("Fill in the form below to add a new record %1$s", rb_agency_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN)." *</strong></span></h3>";
				echo " <div class=\"inside\"> ";	
			} else {
		
				// Create Record
				$insert = "INSERT INTO " . table_agency_customfields . " (ProfileCustomTitle,ProfileCustomType,ProfileCustomOptions,ProfileCustomView,ProfileCustomOrder,ProfileCustomShowGender,ProfileCustomShowProfile,ProfileCustomShowSearch,ProfileCustomShowLogged,ProfileCustomShowAdmin,ProfileCustomShowRegistration, ProfileCustomShowSearchSimple) VALUES ('" . $wpdb->escape($ProfileCustomTitle) . "','" . $wpdb->escape($ProfileCustomType) . "','" . $wpdb->escape($ProfileCustomOptions) . "','" . $wpdb->escape($ProfileCustomView) . "','" . $wpdb->escape($ProfileCustomOrder ) . "','" . $wpdb->escape($ProfileCustomShowGender ) . "','" . $wpdb->escape($ProfileCustomShowProfile ) . "','" . $wpdb->escape($ProfileCustomShowSearch) . "','" . $wpdb->escape($ProfileCustomShowLogged ) . "','" . $wpdb->escape($ProfileCustomShowAdmin) . "','" . $wpdb->escape($ProfileCustomShowRegistration). "','" . $wpdb->escape($ProfileCustomShowSearchSimple) . "')";
				$results = $wpdb->query($insert);
				$lastid = $wpdb->insert_id;

				/*
				 * Add to Custom Client
				 * if the Profile Custom Client is
				 * Selected
				 */
				$Types = "";
				
				/*
				 * Set Types Here for each Custom fields.
				 */ 
				$get_types = "SELECT * FROM ". table_agency_data_type;
						
				$result = mysql_query($get_types);
						
				while ( $typ = mysql_fetch_array($result)){
					$profiletyp = 'ProfileType' . trim($typ['DataTypeTitle']);
					$profiletyp = str_replace(' ', '_', $profiletyp);
					if($_POST[$profiletyp]) { $Types .= trim($typ['DataTypeTitle']) . "," ; }
				}

				$Types = rtrim($Types, ",");

				if($Types != "" or !empty($Types)){

							$check_sql = "SELECT ProfileCustomTypesID FROM " . table_agency_customfields_types . 
							" WHERE ProfileCustomID = " . $lastid; 

							$check_results = mysql_query($check_sql);

							$count_check = mysql_num_rows($check_results);
							
							if($count_check == 0){
								//create record in Custom Clients
								$insert_client = "INSERT INTO " . table_agency_customfields_types . 
								" (ProfileCustomID,ProfileCustomTitle,ProfileCustomTypes) 
								VALUES (" . $lastid . ",'" 
										  . $wpdb->escape($ProfileCustomTitle) . "','" 
										  . $Types . "')";
								
								$results_client = mysql_query($insert_client) or die(mysql_error());
							} else {
								//update if already existing 
								$update = "UPDATE " . table_agency_customfields_types . " 
										  SET 
										  ProfileCustomTypes='" . $Types . "' 
										  WHERE ProfileCustomID = ".$lastid;
								$updated = mysql_query($update) or die(mysql_error());
							}

				}
				
				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%1$s <strong>added</strong> successfully! You may now %1$s Load Information to the record", rb_agency_TEXTDOMAIN), LabelSingular, "<a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&LoginTypeID=". $lastid ."\">") .".</a></p><p>".$error."</p></div>"); 
				echo "<h3 style=\"width:430px;\">". sprintf(__("Create New %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>	";
				echo " <div class=\"postbox\"  style=\"width:430px;float:left;border:0px solid black;\">";
				echo"<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >".sprintf(__("Fill in the form below to add a new record %1$s", rb_agency_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN)." *</strong></span></h3>";
				echo " <div class=\"inside\"> ";
			}
		break;

		// Manage
		case 'editRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %1$s, please ensure you have filled out all required fields", rb_agency_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
				 echo "<h3 style=\"width:430px;\">". sprintf(__("Edit %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."</h3>
						<div class=\"postbox\"  style=\"width:430px;float:left;border:0px solid black;\">";
				 echo"<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >". __("Make changes in the form below to edit a ", rb_agency_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN) ." *</strong></span></h3>";
				 echo" <div class=\"inside\"> ";
			} else {
				$update = "UPDATE " . table_agency_customfields . " 
							SET 
								ProfileCustomTitle='" . $wpdb->escape($ProfileCustomTitle) . "',
								ProfileCustomType='" . $wpdb->escape($ProfileCustomType) . "',
								ProfileCustomOptions='" . $wpdb->escape($ProfileCustomOptions) . "',
								ProfileCustomView=" . $wpdb->escape($ProfileCustomView) . ", 
								ProfileCustomOrder=" . $wpdb->escape($ProfileCustomOrder) . " ,
								ProfileCustomShowGender=" . $wpdb->escape($ProfileCustomShowGender) . ",
								ProfileCustomShowProfile=" . $wpdb->escape($ProfileCustomShowProfile) . " ,
								ProfileCustomShowSearch=" . $wpdb->escape($ProfileCustomShowSearch) . " ,
								ProfileCustomShowLogged=" . $wpdb->escape($ProfileCustomShowLogged) . " ,
								ProfileCustomShowRegistration=" . $wpdb->escape($ProfileCustomShowRegistration) . " ,
								ProfileCustomShowSearchSimple=" . $wpdb->escape($ProfileCustomShowSearchSimple) . " ,
								ProfileCustomShowAdmin=" . $wpdb->escape($ProfileCustomShowAdmin) . " 
							WHERE ProfileCustomID='$ProfileCustomID'";
				$updated = mysql_query($update) or die(mysql_error());

				/*
				 * Check if There is Custom client
				 * to be updated
				 */

				$Types = "";

				/*
				 * Set Types Here for each Custom fields.
				 */ 
				$get_types = "SELECT * FROM ". table_agency_data_type;

				$result = mysql_query($get_types);

				while ( $typ = mysql_fetch_array($result)){
					$t = 'ProfileType' . trim($typ['DataTypeTitle']);$t = str_replace(' ', '_', $t);
					$n = trim($typ['DataTypeTitle']);
					$n = str_replace(' ', '_', $n);
					if($$t) { 
						$$n = true;
						$Types .= $n . "," ; 
					} else { 
						$$n = false;
					}
				}

				$Types = rtrim($Types, ",");

				echo '<input type="hidden" name="apstypes" value="'.$Types.'">';

				if($Types != "" or !empty($Types)){

							$check_sql = "SELECT ProfileCustomTypesID FROM " . table_agency_customfields_types . 
							" WHERE ProfileCustomID = " . $ProfileCustomID; 
							$check_results = mysql_query($check_sql);
							$count_check = mysql_num_rows($check_results);
							if($count_check <= 0){
								//create record in Custom Clients
								$insert_client = "INSERT INTO " . table_agency_customfields_types . 
								" (ProfileCustomID,ProfileCustomTitle,ProfileCustomTypes) 
								VALUES (" . $ProfileCustomID . ",'" 
										  . $wpdb->escape($ProfileCustomTitle) . "','" 
										  . $Types . "')";
								$results_client = $wpdb->query($insert_client);
							} else {
								//update if already existing 
								$update = "UPDATE " . table_agency_customfields_types . " 
										  SET 
										  ProfileCustomTypes='" . $Types . "' 
										  WHERE ProfileCustomID = ".$ProfileCustomID;
								$updated = $wpdb->query($update);
							}

				} else {

						/*
						 * Delete if there is no selections
						 */
						$delete = "DELETE FROM " . table_agency_customfields_types . " 
								  WHERE ProfileCustomID = ".$ProfileCustomID;
						$deleted = $wpdb->query($delete);
				}


				echo "<div id=\"message\" class=\"updated\"><p>". sprintf(__("%1$s <strong>updated</strong> successfully", rb_agency_TEXTDOMAIN), LabelSingular) ."!</p><p>".$error."</p></div>"; 
						echo "<h3 style=\"width:430px;\">". sprintf(__("Edit %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5'>Add New Custom Field</a></h3>
						<div class=\"postbox\"  style=\"width:430px;float:left;border:0px solid black;\">";
				 echo"<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >". __("Make changes in the form below to edit a ", rb_agency_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN) ." *</strong></span></h3>";
				 echo" <div class=\"inside\"> ";
			}
		break;
		// Delete bulk
		case 'deleteRecord':
			foreach($_POST as $ProfileCustomID) {
				if (is_numeric($ProfileCustomID)) {
				// Verify Record
				$queryDelete = "SELECT ProfileCustomID, ProfileCustomTitle FROM ". table_agency_customfields ." WHERE ProfileCustomID =  \"". $ProfileCustomID ."\"";
				$resultsDelete = mysql_query($queryDelete);
				while ($dataDelete = mysql_fetch_array($resultsDelete)) {

					// Remove Record
					$delete = "DELETE FROM " . table_agency_customfields . " WHERE ProfileCustomID = \"". $ProfileCustomID ."\"";
					$results = $wpdb->query($delete);
					
					// Rmove from Custom Types
					$delete_sql = "DELETE FROM " . table_agency_customfields_types . 
					" WHERE ProfileCustomID='$ProfileCustomID'";
					$deleted = mysql_query($delete_sql) or die(mysql_error());

					echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['ProfileCustomTitle'] ."</strong> deleted successfully", rb_agency_TEXTDOMAIN) ."!</p></div>\n";

				} // while
			  } // it was numeric
			} // for each
					echo "<h3 style=\"width:430px;\">". sprintf(__("Create New %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>	";
					echo " <div class=\"postbox\"  style=\"width:430px;float:left;border:0px solid black;\">";
					echo"<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >".sprintf(__("Fill in the form below to add a new record %1$s", rb_agency_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN)." *</strong></span></h3>";
					echo " <div class=\"inside\"> ";
		break;

		} // Switch

} // Action Post
elseif (isset($_GET["deleteRecord"])) {

	$ProfileCustomID = $_GET['ProfileCustomID'];
	if (is_numeric($ProfileCustomID)) {
		// Verify Record
		$queryDelete = "SELECT ProfileCustomID, ProfileCustomTitle FROM ". table_agency_customfields ." WHERE ProfileCustomID =  \"". $ProfileCustomID ."\"";
		$resultsDelete = mysql_query($queryDelete);
		while ($dataDelete = mysql_fetch_array($resultsDelete)) {
	
			// Remove Record
			$delete = "DELETE FROM " . table_agency_customfields . " WHERE ProfileCustomID = \"". $ProfileCustomID ."\"";
			$results = $wpdb->query($delete);

			// Rmove from Custom Types
			$delete_sql = "DELETE FROM " . table_agency_customfields_types . 
			" WHERE ProfileCustomID='$ProfileCustomID'";
			$deleted = mysql_query($delete_sql) or die(mysql_error());
			
			echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['ProfileCustomTitle'] ."</strong> deleted successfully", rb_agency_TEXTDOMAIN) ."!</p></div>\n";
			echo "<h3 style=\"width:430px;\">". sprintf(__("Create New %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>	
			<div class=\"postbox \"  style=\"width:430px;float:left;border:0px solid black;\">
			<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >".sprintf(__("Fill in the form below to add a new record %1$s", rb_agency_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN)." *</strong></span></h3>
			<div class=\"inside\"> ";

		} // is there record?
	} // it was numeric
}
elseif ($_GET['action'] == "editRecord") {
		$action = $_GET['action'];
		$ProfileCustomID = $_GET['ProfileCustomID'];
		
		if ( $ProfileCustomID > 0) {
			$query = "SELECT * FROM " . table_agency_customfields . " WHERE ProfileCustomID='$ProfileCustomID'";
			$results = mysql_query($query) or die (__(mysql_error(), rb_agency_TEXTDOMAIN));
			$count = mysql_num_rows($results);
			while ($data = mysql_fetch_array($results)) {
				$ProfileCustomID			=	$data['ProfileCustomID'];
				$ProfileCustomTitle			=	stripslashes($data['ProfileCustomTitle']);
				$ProfileCustomType			=	$data['ProfileCustomType'];
				$ProfileCustomOptions		=	$data['ProfileCustomOptions'];
				$ProfileCustomView			=	$data['ProfileCustomView'];
				$ProfileCustomOrder			=	$data['ProfileCustomOrder'];
				$ProfileCustomShowGender	=	$data['ProfileCustomShowGender'];
				$ProfileCustomShowProfile	=	$data['ProfileCustomShowProfile'];
				$ProfileCustomShowSearch	=	$data['ProfileCustomShowSearch'];
				$ProfileCustomShowLogged	=	$data['ProfileCustomShowLogged'];
				$ProfileCustomShowRegistration=	$data['ProfileCustomShowRegistration'];
				$ProfileCustomShowSearchSimple=	$data['ProfileCustomShowSearchSimple'];
				$ProfileCustomShowAdmin		=	$data['ProfileCustomShowAdmin'];
			}
		
		echo "<h3 style=\"width:430px;\">". sprintf(__("Edit %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5'>Add New Custom Field</a></h3>	
				<div class=\"postbox\"  style=\"width:430px;float:left;border:0px solid black;\">";
		echo "<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >". __("Make changes in the form below to edit a ", rb_agency_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN) ." *</strong></span></h3>";
		echo "<div class=\"inside\"> ";

		}

  } else {
		
			$ProfileCustomID			=	0;
			$ProfileCustomTitle			=	"";
			$ProfileCustomType			=	"";
			$ProfileCustomOptions		=	"";
			$ProfileCustomView			=	0;
			$ProfileCustomOrder			=	0;
			$ProfileCustomShowGender	=	0;
			$ProfileCustomShowProfile	=	0;
			$ProfileCustomShowSearch	=	0;
			$ProfileCustomShowSearchSimple	=	0;
			$ProfileCustomShowLogged	=	0;
			$ProfileCustomShowRegistration=	0;
			$ProfileCustomShowAdmin		=	0;
			
			echo "\n";
		echo " 
		<h3 style=\"width:430px;\">". sprintf(__("Create New %1$s", rb_agency_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>
		<div class=\"postbox \"  style=\"width:430px;float:left;border:0px solid black;\">
			 <h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >". __("Make changes in the form below to edit a ", rb_agency_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", rb_agency_TEXTDOMAIN) ." *</strong></span></h3>
		<div class=\"inside\"> ";
	}
	if(isset($_GET["action"]) == "editRecord"){
		echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&ProfileCustomID=".$_GET["ProfileCustomID"]."&ConfigID=".$_GET["ConfigID"]."\">\n";
	}else{
		echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."\">\n";
	}
	echo "<table class=\"form-table\">\n";
		if(!isset($_GET["action"])){  // Create new Field		
			echo "
						<tr>
							<td>Type*:</td>
							<td>";
								if($rb_agency_options_arr['rb_agency_option_unittype']==1){
										echo"	<select class=\"objtype\" name=\"ProfileCustomType\" id=\"1\">";
								}else{
									echo"	<select class=\"objtype\" name=\"ProfileCustomType\" id=\"0\">";
								}
								echo"<option value=\"\">---</option>
									<option value=\"1\">Single Line Text</option>
									<!--<option value=\"2\">Min/Max textfield</option>-->
									<option value=\"3\">Dropdown</option>
									<option value=\"4\">Textbox</option>
									<option value=\"5\">Checkbox</option>
									<option value=\"6\">Radiobutton</option>";
									if($rb_agency_options_arr['rb_agency_option_unittype']==1){
										echo"     <option value=\"7\" id=\"1\">Imperial(ft/in/lb)</option>";
									}else{
										echo"     <option value=\"7\" id=\"0\">Metric(cm/kg)</option>";
									}
			echo"				</select>";
			echo "			</td>
						</tr>
						<tr>
							<td valign=\"top\">Visibility*:</td>
							<td style=\"font-size:13px;\">
								<div><input type=\"radio\" name=\"ProfileCustomView\" value=\"0\" checked=\"checked\" /> <strong>". __("Public", rb_agency_TEXTDOMAIN) ."</strong><br/>". __("Visible on Profile & Search, Profile Management, Admin CRM", rb_agency_TEXTDOMAIN) ."</div>
								<div><input type=\"radio\" name=\"ProfileCustomView\" value=\"1\" /> <strong>". __("Private", rb_agency_TEXTDOMAIN) ."</strong><br/>". __("Visible in Profile Management & Admin CRM", rb_agency_TEXTDOMAIN) ."</div>
								<div><input type=\"radio\" name=\"ProfileCustomView\" value=\"2\" /> <strong>". __("Restricted", rb_agency_TEXTDOMAIN) ."</strong><br/>". __("Only visible in Admin CRM", rb_agency_TEXTDOMAIN) ."</div>
							</td>
						</tr>
						<tr>
							<td valign=\"top\">Custom Views:</td>
							<td style=\"font-size:13px;\">
							IF PUBLIC:<br />
							<input type=\"checkbox\" name=\"ProfileCustomShowRegistration\" value=\"1\" /> Show on Registration Form<br/>
							<input type=\"checkbox\" name=\"ProfileCustomShowSearch\" value=\"1\"  checked=\"checked\" /> Show on Search Form (Advanced)<br/>  
							<input type=\"checkbox\" name=\"ProfileCustomShowSearchSimple\" value=\"1\" /> Show on Search Form (Simple)<br/>
							<input type=\"checkbox\" name=\"ProfileCustomShowProfile\" value=\"1\" checked=\"checked\" /> Show on Profile<br/>
							</td>
						</tr>

						<tr>
							<td valign=\"top\">Gender*:</td>
							<td valign=\"top\" style=\"font-size:13px;\">";
							$query = "SELECT GenderID, GenderTitle FROM " .  table_agency_data_gender . " GROUP BY GenderTitle ";
							echo "<select name=\"ProfileCustomShowGender\">";
							echo "<option value=\"\">All Gender</option>";
							$queryShowGender = mysql_query($query);
								 while($dataShowGender = mysql_fetch_assoc($queryShowGender)){
									 if(isset($data1["ProfileCustomShowGender"])){
										echo "<option value=\"".$dataShowGender["GenderID"]."\" selected=\"selected\">".$dataShowGender["GenderTitle"]."</option>";
									 }else{
										echo "<option value=\"".$dataShowGender["GenderID"]."\">".$dataShowGender["GenderTitle"]."</option>";
									 }
								 }
							echo "</select>";
							
							echo " </td>
						</tr>
						<tr>
						<td valign=\"top\">Profile Type:</td>
						<td style=\"font-size:13px;\">";
						
						/*
						 * get the proper fields on
						 * profile types here
						 */
						
						$get_types = "SELECT * FROM ". table_agency_data_type;
						
						$result = mysql_query($get_types);
						
						while ( $typ = mysql_fetch_assoc($result)){
                                        $t = trim(str_replace(' ','_',$typ['DataTypeTitle']));    
										$checked = 'checked="checked"';                    
										echo '<input type="checkbox" name="ProfileType'.$t.'" value="1" ' . 
											 $checked . '  />&nbsp;'.
											 trim($typ['DataTypeTitle'])
											 .'&nbsp;<br/>';
						} 
						echo	   "</td>
									<td style=\"font-size:13px;\">
								   
									</td>
									<td style=\"font-size:13px;\">
								   
									</td>
								</tr>
						<tr>
							<td valign=\"top\">Custom Order:</td>
							<td style=\"font-size:13px;\">
							<input type=\"text\" name=\"ProfileCustomOrder\" value=\"0\" />
							</td>
							<td style=\"font-size:13px;\">
						   
							</td>
							<td style=\"font-size:13px;\">
						   
							</td>
						</tr>
					</td>
				</tr>
			</td>
		</tr>
	</table>";
		
		echo " <table>\n";
			 echo "<tr id=\"objtype_customize\">\n";
				 echo "<td>\n";
				 echo "</td>\n";
			echo "</tr>\n";
		echo "</table>\n";
		
		
		}else{ //Edit/Update Field
					$query1 = "SELECT * FROM ". table_agency_customfields ." WHERE ProfileCustomID = ".$_GET["ProfileCustomID"];
					$results1 = mysql_query($query1);
					$count1 = mysql_num_rows($results1);
					$pos = 0;
					while ($data1 = mysql_fetch_array($results1)) {
						
					
						//get record from Clients to edit
						$select_sql = "Select  * FROM " . table_agency_customfields_types . 
						" WHERE ProfileCustomID= " . $data1["ProfileCustomID"];
						
						$select_sql = mysql_query($select_sql) or die(mysql_error());
						
						$fetch_type = mysql_fetch_assoc($select_sql);
						
						$array_type = explode(",",$fetch_type['ProfileCustomTypes']);
						
						$a = array();
						
						foreach($array_type as $t_arr){
							 $$t_arr = true;
							
						}
						
						$pos ++;			
							$query2 = "SELECT * FROM ". table_agency_customfields_mux ." WHERE ProfileCustomID=".$data1["ProfileCustomID"]." AND ProfileID=".$ProfileID."";
							$results2 = mysql_query($query2);
									
									  echo "<tr>
											<td>Type*:</td>
											<td>
											<select class=\"objtype\" name=\"ProfileCustomType\">
											<option value=\"\">---</option>
											<option value=\"1\" ". ($data1["ProfileCustomType"] == 1 ? 'selected=\"selected\"':'').">Single Line Text</option>
											
											<option value=\"3\" ". ($data1["ProfileCustomType"] == 3 ? 'selected=\"selected\"':'').">Dropdown</option>
											<option value=\"4\" ". ($data1["ProfileCustomType"] == 4 ? 'selected=\"selected\"':'').">Textbox</option>
											<option value=\"5\" ". ($data1["ProfileCustomType"] == 5 ? 'selected=\"selected\"':'').">Checkbox</option>
											<option value=\"6\" ". ($data1["ProfileCustomType"] == 6 ? 'selected=\"selected\"':'').">Radiobutton</option>";
											if($rb_agency_options_arr['rb_agency_option_unittype']==1){
												echo"     <option value=\"7\" ". ($data1["ProfileCustomType"] == 7 ? 'selected=\"selected\"':'').">Imperial (ft/in/lb)</option>";
											}else{
												echo"     <option value=\"7\" ". ($data1["ProfileCustomType"] == 7 ? 'selected=\"selected\"':'').">Metric (cm/kg)</option>";
											}
										  echo"  </select>
										   
											</td>
										 </tr>";
										 //	 <a href=\"javascript:;\"  style=\"font-size:12px;color:#069;". ($data1["ProfileCustomType"] == 3 ? '':'display:none;')."\" class=\"add_more_object\" id=\"add_more_object_show\">add another dropdown list to compare(min/max)</a>
									
										echo "  <tr>
												<td> 
												<tr>
												<td valign=\"top\">Visibility*:</td>
												<td style=\"font-size:13px;\">
								<div><input type=\"radio\" name=\"ProfileCustomView\" value=\"0\" ". ($data1["ProfileCustomView"] == 0 ? 'checked=\"checked\"':'')." /> <strong>". __("Public", rb_agency_TEXTDOMAIN) ."</strong><br/>". __("Visible on Profile & Search, Profile Management, Admin CRM", rb_agency_TEXTDOMAIN) ."</div>
								<div><input type=\"radio\" name=\"ProfileCustomView\" value=\"1\" ". ($data1["ProfileCustomView"] == 1 ? 'checked=\"checked\"':'')." /> <strong>". __("Private", rb_agency_TEXTDOMAIN) ."</strong><br/>". __("Visible in Profile Management & Admin CRM", rb_agency_TEXTDOMAIN) ."</div>
								<div><input type=\"radio\" name=\"ProfileCustomView\" value=\"2\" ". ($data1["ProfileCustomView"] == 2 ? 'checked=\"checked\"':'')." /> <strong>". __("Restricted", rb_agency_TEXTDOMAIN) ."</strong><br/>". __("Only visible in Admin CRM", rb_agency_TEXTDOMAIN) ."</div>
												</td>
											
												<td style=\"font-size:13px;\">
											   
												</td>
												<td style=\"font-size:13px;\">
											   
												</td>
												</tr>
												
												<tr>
													<td valign=\"top\">Custom View*:</td>
													<td style=\"font-size:13px;\">
							IF PUBLIC:<br />
							<input type=\"checkbox\" name=\"ProfileCustomShowRegistration\" value=\"1\" ". ($data1['ProfileCustomShowRegistration'] == 1 ? 'checked=\"checked\"':'')." /> Show on Registration Form<br/>
							<input type=\"checkbox\" name=\"ProfileCustomShowSearch\" value=\"1\" ". ($data1["ProfileCustomShowSearch"] == 1 ? 'checked=\"checked\"':'')." /> Show on Search Form (Advanced)<br/>  
							<input type=\"checkbox\" name=\"ProfileCustomShowSearchSimple\" value=\"1\" ". ($data1["ProfileCustomShowSearchSimple"] == 1 ? 'checked=\"checked\"':'')." /> Show on Search Form (Simple)<br/>
							<input type=\"checkbox\" name=\"ProfileCustomShowProfile\" value=\"1\" ". ($data1["ProfileCustomShowProfile"] == 1 ? 'checked=\"checked\"':'')." /> Show on Profile<br/>
												</tr>

												<tr>
													<td valign=\"top\">Gender*:</td>
													<td valign=\"top\" style=\"font-size:13px;\">";
													
													$query= "SELECT GenderID, GenderTitle FROM " .  table_agency_data_gender . " GROUP BY GenderTitle ";
													echo "<select name=\"ProfileCustomShowGender\">";
													echo "<option value=\"\">All Gender</option>";
													$queryShowGender = mysql_query($query);
														 while($dataShowGender = mysql_fetch_assoc($queryShowGender)){
															
																echo "<option value=\"".$dataShowGender["GenderID"]."\" ". selected($data1["ProfileCustomShowGender"],$dataShowGender["GenderID"],false).">".$dataShowGender["GenderTitle"]."</option>";
															
														 }
													echo "</select>";
													
												echo "						
													</td>
													<td style=\"font-size:13px;\">
												   
													</td>
													<td style=\"font-size:13px;\">
												   
													</td>
												</tr>

											<tr>
													<td valign=\"top\">Profile Type:</td>
													<td style=\"font-size:13px;\"> ";
											
                                                                                        /*
                                                                                        * get the proper fields on
                                                                                        * profile types here
                                                                                        */
																						$ProfileCustomID = $_GET['ProfileCustomID'];
																						
																						//get custom types
																						$_sql = "SELECT ProfileCustomTypes FROM " . table_agency_customfields_types . 
																							" WHERE ProfileCustomID = $ProfileCustomID";
																						$x = $wpdb->get_row($_sql) or die(mysql_error());

                                                                                        if(strpos($x->ProfileCustomTypes,",") > -1){
                                                                                                $rTypes = explode(",",$x->ProfileCustomTypes);
                                                                                        } else {
                                                                                                $rTypes = $r->ProfileCustomTypes;
                                                                                        }	

                                                                                        $get_types = "SELECT * FROM ". table_agency_data_type;

                                                                                        $result = mysql_query($get_types);

                                                                                        while ( $typ = mysql_fetch_assoc($result)){
                                                                                          $t = trim(str_replace(' ','_',$typ['DataTypeTitle']));                        
                                                                                                                        $checked = '';
                                                                                                                        if(is_array($rTypes)){
                                                                                                                                if(in_array($typ['DataTypeTitle'],$rTypes)){
                                                                                                                                        $checked = 'checked="checked"';
                                                                                                                                }
                                                                                                                        } else {
                                                                                                                                if($typ['DataTypeTitle'] == $rTypes){
                                                                                                                                        $checked = 'checked="checked"';
                                                                                                                                }
                                                                                                                        }

                                                                                                                        echo '<input type="checkbox" name="ProfileType'.$t.'" value="1" ' . 
                                                                                                                                $checked . '  />&nbsp;'.
                                                                                                                                trim($typ['DataTypeTitle'])
                                                                                                                                .'&nbsp;<br/>';
                                                                                        } 
													
											echo "	</td>
													<td style=\"font-size:13px;\">
												   
													</td>
													<td style=\"font-size:13px;\">
												   
													</td>
											</tr>
	
												
												<tr>
													<td valign=\"top\">Custom Order*:</td>
													<td style=\"font-size:13px;\" align=\"left\">
													<input type=\"text\" name=\"ProfileCustomOrder\"  value=\"".$data1["ProfileCustomOrder"]."\"/>
													</td>
													<td style=\"font-size:13px;\">
												   
													</td>
													<td style=\"font-size:13px;\">
												   
													</td>
												</tr>
												
												</td>
											 </tr>";
									echo "</table>\n";
									echo " <table>\n";		
									 echo "<tr id=\"objtype_customize\">\n";
										 echo "<td>\n";	
										 echo "</td>\n";	
									echo "</tr>\n";
									echo "</table>\n";	
					echo "<div id=\"obj_edit\" class=\"".$data1["ProfileCustomType"]."\">";
				
					
								 if($data1["ProfileCustomType"] == 1){ // text
									  echo "<tr>
											<td style=\"width:50px;\">Title:</td>
											<td><input type=\"text\" name=\"ProfileCustomTitle\" value=\"".$data1["ProfileCustomTitle"]."\"/></td>
										</tr>";
										echo "
											  <tr>
												 <td align=\"right\" style=\"width:50px;\">Value*:</td>
												 <td><input type=\"text\" name=\"ProfileCustomOptions\" value=\"". $data1["ProfileCustomOptions"] ."\" /></td>
											  
											  </tr>
										
										";
								 }
							
								 elseif($data1["ProfileCustomType"] == 3){	  // Dropdown
									 echo "<tr>
											<td style=\"width:40px;\">Title:</td>
											<td><input type=\"text\" name=\"ProfileCustomTitle\" value=\"".$data1["ProfileCustomTitle"]."\" style=\"width:190px;\"/></td>
										</tr>";
											list($option1,$option2) = explode(":",$data1['ProfileCustomOptions']);	
											
											$data1 = explode("|",$option1);
											$data2 = explode("|",$option2);
											
									echo "<tr>";
											echo "<td>";
											echo "&nbsp;";
											echo "</td>";
											echo "<td>";
											 echo "<br/>";
											 
											 echo '<ul id="editfield_add_more_options_1">';
												$pos = 0;
												foreach($data1 as $val1){
													
													if($val1 != end($data1) && $val1 != $data1[0]){
													 $pos++;
													 echo "<li>Option:<input type=\"text\"  value=\"".$val1."\" name=\"option[]\"/><a href='javascript:;' class='del_opt' title='Delete Option' style='color:red; text-decoration:none'>&nbsp;[ - ]</a><br></li>";
													}
												}
											echo '</ul>'; 
											//echo "<div  id=\"editfield_add_more_options_1\"></div>";
											echo "<br/><a href=\"javascript:;\"  id=\"addmoreoption_1\">add more option[+]</a>";
											echo "<br/>";	
											echo "<br/>";	
											
											if(!empty($data2) && !empty($option2)){
												echo "Labe:<input type=\"text\" name=\"option_label2\" value=\"".current($data2)."\" /><br/>";
											
												$pos2 = 0;
											foreach($data2 as $val2){
												  
													if($val2 != end($data2) && $val2 !=  $data2[0]){
														 $pos2++;
													 echo "Option:<input type=\"text\" value=\"".$val2."\"  name=\"option2[]\"/>";
													  if($pos2==1){
														 echo "<input type=\"checkbox\" ".(end($data2)=="yes" ? "checked=\"checked\"":"")." name=\"option_default_2\"/><span style=\"font-size:11px;\">(set as selected)</span>";	
														
														
														echo "<a href=\"javascript:;\" id=\"addmoreoption_2\">add more option[+]</a>";	
														
													   }	
													   echo "<br/>";
													}
												}
												
											}
											echo "<div  id=\"editfield_add_more_options_2\"></div><br/>";
											echo "</td>";
									echo "</tr>";		
									
								 }
								  elseif($data1["ProfileCustomType"] == 4){	 //textbox
								   
									  $array_customOptions_values = explode("|",$data1['ProfileCustomOptions']);
										echo "<tr>
											<td>Title:</td>
											<td><input type=\"text\" name=\"ProfileCustomTitle\" value=\"".$data1["ProfileCustomTitle"]."\"/></td>
										</tr>";
									  echo "<tr><td><br/></td></tr>";	
										echo "<tr>
											 <td align=\"right\"  valign=\"top\">Value*:</td>
											 <td><textarea name=\"ProfileCustomOptions\" style=\"width:400px;\"> ". $data1["ProfileCustomOptions"] ."</textarea></td>
										</tr>";    
								
								 }
								  elseif($data1["ProfileCustomType"] == 5){	 //checkbox
								  
								  $array_customOptions_values = explode("|",$data1['ProfileCustomOptions']);
									   $pos =0;
									 
										 echo "<tr>
											 <td>Title:</td>
											 <td><input type=\"text\" name=\"ProfileCustomTitle\" value=\"".$data1["ProfileCustomTitle"]."\"/></td>
											 </tr>";  
											  echo "
													  <tr>
														  <td>&nbsp;</td>
														   <td valign=\"top\">
														 ";
										 foreach($array_customOptions_values as  $val){
											  echo "<br/>";	
											  echo" &nbsp;Value:<input type=\"text\" name=\"label[]\" value=\"". $val."\" />";
											 
										 }
										echo "<div id=\"addcheckbox_field_1\"></div>";
										echo"<a href=\"javascript:void(0);\" style=\"font-size:12px;color:#069;text-decoration:underline;cursor:pointer;text-align:right;\" onclick=\"add_more_checkbox_field(1);\" >add more[+]</a>";	
										echo " </td>";
										echo" </tr>";
										
								 }
								  elseif($data1["ProfileCustomType"] == 6){	 //radio button
									$array_customOptions_values = explode("|",$data1['ProfileCustomOptions']);
									   $pos =0;
									   echo "<tr>
											<td>Title:</td>
											<td><input type=\"text\" name=\"ProfileCustomTitle\" value=\"".$data1["ProfileCustomTitle"]."\"/></td>
										</tr>";
											  
											  echo "
												   <tr>
														  <td>&nbsp;</td>
														<td valign=\"top\">
														 <br/>";
										 foreach($array_customOptions_values as  $val){
											 if(!empty($val)){
											  $pos++;	
											  echo"&nbsp;Value:<input type=\"text\" name=\"label[]\" value=\"". $val."\" />";
											
														 if($pos ==1){
																	echo"<a href=\"javascript:void(0);\" style=\"font-size:12px;color:#069;text-decoration:underline;cursor:pointer;text-align:right;\" onclick=\"add_more_checkbox_field(1);\" >add more[+]</a>";	
														 }
											  echo "<br/>";	
											   }
												 
											
										 }
													 echo "</td>";
												 echo "</tr>";
										   echo "<div id=\"addcheckbox_field_1\"></div>";
										  
											 
								
								
								 }
								 elseif ($data1["ProfileCustomType"] == 7) {	 ///metric/imperials
										echo "<tr><td>Title*:<input type='text' name='ProfileCustomTitle' value=\"".$data1["ProfileCustomTitle"]."\"/></td></tr>";
										echo "<tr><td>&nbsp;</td></tr>";
										 
										 if ($rb_agency_options_arr['rb_agency_option_unittype']==0) { //  Metric (cm/kg)
												echo "<tr><td><input type='radio' name='ProfileUnitType' value='1'  ".checked($data1["ProfileCustomOptions"],1,false)."/>cm</td></tr>";
												echo "<tr><td><input type='radio' name='ProfileUnitType' value='2'  ".checked($data1["ProfileCustomOptions"],2,false)." />kg</td></tr>";  
										 } elseif ($rb_agency_options_arr['rb_agency_option_unittype']==1) { //  Imperial (in/lb)
											
												echo "<tr><td><input type='radio' name='ProfileUnitType' value='1' ".checked($data1["ProfileCustomOptions"],1,false)." />Inches</td></tr>";
												echo "<tr><td><input type='radio' name='ProfileUnitType' value='2' ".checked($data1["ProfileCustomOptions"],2,false)."/>Pounds</td></tr>";
												echo "<tr><td><input type='radio' name='ProfileUnitType' value='3' ".checked($data1["ProfileCustomOptions"],3,false)."/>Feet/Inches</td></tr>";
										 } 
										
										
								 }
							 
						  
					echo "</div>";				
					}  //endwhile
			
			   
		}	
						
		
	
			
			if ( $ProfileCustomID > 0) {
			echo "<p class=\"submit\">\n";
			echo "     <input type=\"hidden\" name=\"ProfileCustomID\" value=\"". $ProfileCustomID ."\" />\n";
			echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
			echo "     <input type=\"hidden\" name=\"action\" value=\"editRecord\" />\n";
			echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Update Record", rb_agency_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
			echo "</p>\n";
			} else {
			echo "<p class=\"submit\">\n";
			echo "     <input type=\"hidden\" name=\"action\" value=\"addRecord\" />\n";
			echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
			echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Create Record", rb_agency_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
			echo "</p>\n";
			} 
			echo "</form>\n";
	?>
		  
			</div>
</div>
<div class="all-custom_fields" style="width:700px;float:left;border:0px solid black;margin-left:15px;">
	<?php
	
	echo "  <h3 class=\"title\">". __("All Records", rb_agency_TEXTDOMAIN) ."</h3>\n";
	
		/******** Sort Order ************/
		$sort = "";
		if (isset($_GET['sort']) && !empty($_GET['sort'])){
			$sort = $_GET['sort'];
		}
		else {
			$sort = "ProfileCustomOrder";
		}
		
		/******** Direction ************/
		$dir = "";
		if (isset($_GET['dir']) && !empty($_GET['dir'])){
			$dir = $_GET['dir'];
			if ($dir == "desc" || !isset($dir) || empty($dir)){
			   $sortDirection = "asc";
			   } else {
			   $sortDirection = "desc";
			} 
		} else {
			   $sortDirection = "desc";
			   $dir = "asc";
		}
	
		echo "<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=7\">\n";	
		echo "<table cellspacing=\"0\" class=\"widefat fixed\">\n";
		echo "<thead>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\"manage-column column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomTitle&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Title", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomType&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Type", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomOptions&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Options", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomView&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Visibility", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomView&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Custom Order", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomView&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Gender", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomView&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Custom View", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomView&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Profile Type", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "    </tr>\n";
		echo "</thead>\n";
		echo "<tfoot>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\" columnmanage-column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Title", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Type", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Options", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Visibility", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Custom Order", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Gender", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Custom View", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Profile Type", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "    </tr>\n";
		echo "</tfoot>\n";
		echo "<tbody>\n";
	
		$query = "SELECT main.*, 
				  (SELECT ProfileCustomTypes FROM ". table_agency_customfields_types ." a WHERE a.ProfileCustomID = main.ProfileCustomID) as ProfileCustomTypes 
				  FROM ". table_agency_customfields ." main
				 ORDER BY $sort $dir";
				 
		$results = mysql_query($query) or die ( __(mysql_error(), rb_agency_TEXTDOMAIN ));
		$count = mysql_num_rows($results);
		   
		 $rb_agency_options_arr = get_option('rb_agency_options');
		$rb_agency_option_unittype  = $rb_agency_options_arr['rb_agency_option_unittype'];
		
		while ($data = mysql_fetch_array($results)) {
			$ProfileCustomID	=$data['ProfileCustomID'];
		echo "    <tr>\n";
		echo "        <th class=\"check-column\" scope=\"row\"><input type=\"checkbox\" class=\"administrator\" id=\"". $ProfileCustomID ."\" name=\"". $ProfileCustomID ."\" value=\"". $ProfileCustomID ."\" /></th>\n";
		echo "        <td class=\"column\">". stripslashes($data['ProfileCustomTitle']) ."\n";
		echo "          <div class=\"row-actions\">\n";
		echo "            <span class=\"edit\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=editRecord&amp;ProfileCustomID=". $ProfileCustomID ."&amp;ConfigID=". $ConfigID ."\" title=\"". __("Edit this Record", rb_agency_TEXTDOMAIN) . "\">". __("Edit", rb_agency_TEXTDOMAIN) . "</a> | </span>\n";
		echo "            <span class=\"delete\"><a class=\"submitdelete\" href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;deleteRecord&amp;ProfileCustomID=". $ProfileCustomID ."&amp;ConfigID=". $ConfigID ."\"  onclick=\"if ( confirm('". __("You are about to delete this ". LabelSingular, rb_agency_TEXTDOMAIN) . ".\'". __("Cancel", rb_agency_TEXTDOMAIN) . "\' ". __("to stop", rb_agency_TEXTDOMAIN) . ", \'". __("OK", rb_agency_TEXTDOMAIN) . "\' ". __("to delete", rb_agency_TEXTDOMAIN) . ".') ) { return true;}return false;\" title=\"". __("Delete this Record", rb_agency_TEXTDOMAIN) . "\">". __("Delete", rb_agency_TEXTDOMAIN) . "</a> </span>\n";
		echo "          </div>\n";
		echo "        </td>\n";
		echo "        <td class=\"column\">"; if ($data['ProfileCustomType'] == 1 ){ echo "Text"; } elseif ($data['ProfileCustomType'] == 2 ){ echo "Search Layout"; } elseif ($data['ProfileCustomType'] == 5) { echo "Checkbox"; } elseif ($data['ProfileCustomType'] == 6) { echo "Radio"; } elseif ($data['ProfileCustomType'] == 3) { echo "Dropdown"; } elseif ($data['ProfileCustomType'] == 4) { echo "Textarea"; }  elseif ($data['ProfileCustomType'] == 7) { if($rb_agency_options_arr['rb_agency_option_unittype']==1){ if($data['ProfileCustomOptions']==1){echo "Imperial(in)";}elseif($data['ProfileCustomOptions']==2){echo "Imperial(lb)";}elseif($data['ProfileCustomOptions']==3){echo "Imperial(in/ft)";} } else{ if($data['ProfileCustomOptions']==2){echo "Metric(cm)";}elseif($data['ProfileCustomOptions']==2){echo "Metric(kg)";}elseif($data['ProfileCustomOptions']==3){echo "Imperial(in/ft)";} } } echo "</td>\n";
				
			
			  $measurements_label = "";
			  
			if ($data['ProfileCustomType'] == 7) { //measurements field type
					   if($rb_agency_option_unittype ==0){ // 0 = Metrics(ft/kg)
						if($data['ProfileCustomOptions'] == 1){
							
							   $measurements_label  ="cm";
						}elseif($data['ProfileCustomOptions'] == 2){
							
							 $measurements_label  ="Kg";
						}elseif($data['ProfileCustomOptions'] == 3){
						  $measurements_label  ="Feet/Inches";
						}
					}elseif($rb_agency_option_unittype ==1){ //1 = Imperial(in/lb)
						if($data['ProfileCustomOptions'] == 1){
							$measurements_label  ="Inches";
						   
						}elseif($data['ProfileCustomOptions'] == 2){
							
						  $measurements_label  ="Pounds";
						}elseif($data['ProfileCustomOptions'] == 3){
						  $measurements_label  ="(Feet/Inches)";
						}
					}
					
			 }
		if($data['ProfileCustomType'] == 7 ) {echo " <td class=\"column\">".$measurements_label."</td>\n"; } else{ echo "        <td class=\"column\">".str_replace("|",",",$data['ProfileCustomOptions'])."</td>\n"; }
		echo "        <td class=\"column\">"; if ($data['ProfileCustomView'] == 0) { echo "Public"; } elseif ($data['ProfileCustomView'] == 1) { echo "Private"; } elseif ($data['ProfileCustomView'] == 2) { echo "Custom"; } echo "</td>\n";
		 echo "        <th class=\"column\">".$data['ProfileCustomOrder']."</th>\n";
		 $queryGender = mysql_query("SELECT GenderID, GenderTitle FROM ".table_agency_data_gender." WHERE GenderID=".$data['ProfileCustomShowGender'].""); 
		 $fetchGender = mysql_fetch_assoc($queryGender);
		 $countGender = mysql_num_rows($queryGender);
		 if($countGender > 0){
			echo "        <th class=\"column\">".$fetchGender["GenderTitle"]."</th>\n";
		 }else{
			echo "        <th class=\"column\">All Gender</th>\n";
		 }

		 $custom_views="";
		 if($data["ProfileCustomShowRegistration"]==1){
			$custom_views ="Registration<br/>";
		 }
		 if($data["ProfileCustomShowSearch"]==1){
			$custom_views .="Advanced<br/>";
		 }
		 if($data["ProfileCustomShowSearchSimple"]==1){
			$custom_views .="Simple<br/>";
		 }
		 if($data["ProfileCustomShowProfile"]==1){
			$custom_views .="Profile";
		 }
		 
		 echo "        <td class=\"column\">".$custom_views."</td>\n";
		 echo "        <td class=\"column\">".str_replace(",","<br/>",$data["ProfileCustomTypes"])."</td>\n";
		 
		echo "    </tr>\n";
		}
		mysql_free_result($results);
		if ($count < 1) {
		echo "    <tr>\n";
		echo "        <td class=\"check-column\" scope=\"row\"></th>\n";
		echo "        <td class=\"column\" colspan=\"5\"><p>". __("There aren't any records loaded yet", rb_agency_TEXTDOMAIN) . "!</p></td>\n";
		echo "    </tr>\n";
		}
		echo "</tbody>\n";
		echo "</table>\n";
		echo "<p class=\"submit\">\n";
		echo "    <input type=\"hidden\" name=\"action\" value=\"deleteRecord\" />\n";
		echo "    <input type=\"submit\" name=\"submit\" value=\"". __("Delete", rb_agency_TEXTDOMAIN) . "\" class=\"button-primary\" />\n";
		echo "</p>\n";
		
		echo "</form>\n";
echo "</div>";




} elseif ($ConfigID == 6){
	
	
	
	// Edit Record
	switch($_POST["action"]){
	case "editRecord":
		$wpdb->query("UPDATE ".table_agency_data_media." SET MediaCategoryTitle = '".$_POST["MediaCategoryTitle"]."',MediaCategoryGender = '".$_POST["MediaCategoryGender"]."',MediaCategoryOrder = '".$_POST["MediaCategoryOrder"]."' WHERE  MediaCategoryID ='".$_GET["MediaCategoryID"]."' ") or die("1".mysql_error());
	  break;
	// Add Record
	case "addRecord":
		 $wpdb->query("INSERT INTO ".table_agency_data_media." (MediaCategoryID,MediaCategoryTitle,MediaCategoryGender,MediaCategoryOrder) VALUES('','".$_POST["MediaCategoryTitle"]."','".$_POST["MediaCategoryGender"]."','".$_POST["MediaCategoryOrder"]."') ") or die("Error: ".mysql_error());
	  break;
	
	}
	// Delete Record
	if(isset($_POST["action"])=="deleteRecord"  || isset($_GET["deleteRecord"])){
		
		 if(isset($_GET["deleteRecord"])){
				 $wpdb->query("DELETE FROM ". table_agency_data_media ." WHERE MediaCategoryID = '".$_GET["MediaCategoryID"]."'");
		 }
		 if(isset($_POST["MediaCategoryID"])){
			 foreach($_POST["MediaCategoryID"] as $id){
				$wpdb->query("DELETE FROM ". table_agency_data_media ." WHERE MediaCategoryID = '".$id."'");
			 }
		 }
		
	}
 echo "<div>\n";
			// Add new Record
		if(isset($_GET["action"]) =="editRecord"){
		 
		 echo "  <h3 class=\"title\">". __("Edit Record", rb_agency_TEXTDOMAIN) ."</h3>\n";
		 
		 $query = "SELECT * FROM ". table_agency_data_media ." WHERE MediaCategoryID='".$_GET["MediaCategoryID"]."'";
		 $data = $wpdb->get_row($wpdb->prepare($query),ARRAY_A,0 );
		 $count =$wpdb->num_rows;
		
		 echo "<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&ConfigID=6&MediaCategoryID=".$_GET["MediaCategoryID"]."\">\n";
		}else{
			 echo "  <h3 class=\"title\">". __("Add New Record", rb_agency_TEXTDOMAIN) ."</h3>\n";
		  echo "<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=6\">\n";
		}
		
		 echo "<table>";
		 echo "<tr>";
		 echo "<td>Title:</td><td><input type=\"text\" name=\"MediaCategoryTitle\" value=\"".$data["MediaCategoryTitle"]."\" style=\"width:500px;\" /></td>\n";
		 echo "</tr>";
		 echo "<tr>";
		 echo "<td>Gender:</td><td>\n";
		 $query= "SELECT GenderID, GenderTitle FROM " .  table_agency_data_gender . " GROUP BY GenderTitle ";
					echo "<select name=\"MediaCategoryGender\">";
					echo "<option value=\"\">All Gender</option>";
					$queryShowGender = $wpdb->get_results($wpdb->prepare($query), ARRAY_A);
					foreach( $queryShowGender as $dataShowGender ){
						echo "<option value=\"".$dataShowGender["GenderID"]."\" ". selected($data["MediaCategoryGender"] ,$dataShowGender["GenderID"],false).">".$dataShowGender["GenderTitle"]."</option>";
					}
					echo "</select>";
					echo "<br/>";
		 echo "</td>";
		 echo "</tr>";
		 echo "<td>Order:</td><td><input type=\"text\" name=\"MediaCategoryOrder\" value=\"".(0+(int)$data["MediaCategoryOrder"])."\" /></td>\n";
		 echo "<tr>";
		 echo "<td>";
		 echo "<p class=\"submit\">\n";
		 if(isset($_GET["action"]) =="editRecord"){
			echo "    <input type=\"hidden\" name=\"action\" value=\"editRecord\" />\n";
		  
		 }else{
			echo "    <input type=\"hidden\" name=\"action\" value=\"addRecord\" />\n";
			 
		 }
		 echo "    <input type=\"submit\" name=\"submit\" value=\"". __("Submit", rb_agency_TEXTDOMAIN) . "\" class=\"button-primary\" />\n";
		 echo "</p>\n";
		 echo "</td>";
		 echo "<tr>";
		 echo "<table>";
		 echo "</form>\n";
		 // All Records
		 echo "  <h3 class=\"title\">". __("All Records", rb_agency_TEXTDOMAIN) ."</h3>\n";
			
				/******** Sort Order ************/
				$sort = "";
				if (isset($_GET['sort']) && !empty($_GET['sort'])){
					$sort = $_GET['sort'];
				}
				else {
					$sort = "MediaCategoryOrder";
				}
				
				/******** Direction ************/
				$dir = "";
				if (isset($_GET['dir']) && !empty($_GET['dir'])){
					$dir = $_GET['dir'];
					if ($dir == "desc" || !isset($dir) || empty($dir)){
					   $sortDirection = "asc";
					   } else {
					   $sortDirection = "desc";
					} 
				} else {
					   $sortDirection = "desc";
					   $dir = "asc";
				}
	
		echo "<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=6\">\n";	
		echo "<table cellspacing=\"0\" class=\"widefat fixed\">\n";
		echo "<thead>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\"manage-column column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomTitle&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Title", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomType&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Gender", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomOptions&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Order", rb_agency_TEXTDOMAIN) ."</a></th>\n";
		echo "    </tr>\n";
		echo "</thead>\n";
		
		echo "<tfoot>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\" columnmanage-column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Title", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Gender", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Order", rb_agency_TEXTDOMAIN) ."</th>\n";
		echo "    </tr>\n";
		echo "</tfoot>\n";
		
		echo "<tbody>\n";
	
		$query = "SELECT * FROM ". table_agency_data_media ." ORDER BY $sort $dir";
		$results = $wpdb->get_results($wpdb->prepare($query), ARRAY_A);
		$count = $wpdb->num_rows;
		foreach ($results as $data) {
			$MediaCategoryID	=$data['MediaCategoryID'];
		echo "    <tr>\n";
		echo "        <th class=\"check-column\" scope=\"row\"><input type=\"checkbox\" class=\"administrator\" id=\"". $MediaCategoryID ."\" name=\"MediaCategoryID[]\" value=\"". $MediaCategoryID ."\" /></th>\n";
		echo "        <th class=\"column\">". stripslashes($data['MediaCategoryTitle']) ."\n";
		echo "          <div class=\"row-actions\">\n";
		echo "            <span class=\"edit\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=editRecord&amp;MediaCategoryID=". $MediaCategoryID."&amp;ConfigID=6\" title=\"". __("Edit this Record", rb_agency_TEXTDOMAIN) . "\">". __("Edit", rb_agency_TEXTDOMAIN) . "</a> | </span>\n";
		echo "            <span class=\"delete\"><a class=\"submitdelete\" href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;deleteRecord&amp;MediaCategoryID=". $MediaCategoryID ."&amp;ConfigID=6\"  onclick=\"if ( confirm('". __("You are about to delete this ". LabelSingular, rb_agency_TEXTDOMAIN) . ".\'". __("Cancel", rb_agency_TEXTDOMAIN) . "\' ". __("to stop", rb_agency_TEXTDOMAIN) . ", \'". __("OK", rb_agency_TEXTDOMAIN) . "\' ". __("to delete", rb_agency_TEXTDOMAIN) . ".') ) { return true;}return false;\" title=\"". __("Delete this Record", rb_agency_TEXTDOMAIN) . "\">". __("Delete", rb_agency_TEXTDOMAIN) . "</a> </span>\n";
		echo "          </div>\n";
		echo "        </th>\n";
		 $queryGender = "SELECT GenderID, GenderTitle FROM ".table_agency_data_gender." WHERE GenderID='".$data['MediaCategoryGender']."'"; 
		 $fetchGender = $wpdb->get_row($wpdb->prepare( $queryGender),ARRAY_A,0 	 );
		 $countGender = $wpdb->num_rows;
		 if($countGender > 0){
			echo "        <th class=\"column\">".$fetchGender["GenderTitle"]."</th>\n";
		 }else{
			echo "        <th class=\"column\">All Gender</th>\n";
		 }
		echo "        <th class=\"column\">"; echo $data["MediaCategoryOrder"]; echo "</th>\n";
		echo "    </tr>\n";
		}

		if ($count < 1) {
		echo "    <tr>\n";
		echo "        <td class=\"check-column\" scope=\"row\"></th>\n";
		echo "        <td class=\"column\" colspan=\"5\"><p>". __("There aren't any records loaded yet", rb_agency_TEXTDOMAIN) . "!</p></td>\n";
		echo "    </tr>\n";
		}
		echo "</tbody>\n";
		echo "</table>\n";
		echo "<p class=\"submit\">\n";
		echo "    <input type=\"hidden\" name=\"action\" value=\"deleteRecord\" />\n";
		echo "    <input type=\"submit\" name=\"submit\" value=\"". __("Delete", rb_agency_TEXTDOMAIN) . "\" class=\"button-primary\" />\n";
		echo "</p>\n";
		
		echo "</form>\n";
 
 echo "</div>\n";






} 

//manage counrty and states
elseif ($ConfigID == 99) {

	if ($_REQUEST['action'] == "uninstall") {
		echo "	<h3>Uninstalling...</h3>\n";
		return RBAgency::uninstall();
	} else {
		// Show Confirmation
		echo "	<h3>Uninstall</h3>\n";
		echo "	<div>Are you sure you want to uninstall?</div>\n";
		echo "	<div><a href=\"?page=". $_GET["page"] ."&ConfigID=99&action=uninstall\">Yes! Uninstall</a></div>\n";

	}
}	 // End	
echo "</div>\n";
?>