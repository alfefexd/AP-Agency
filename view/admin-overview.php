<?php
global $wpdb, $user_level;

// Get Unit Type
$rb_agency_options_arr = get_option('rb_agency_options');
	$rb_agency_option_unittype = isset($rb_agency_options_arr['rb_agency_option_unittype'])?$rb_agency_options_arr['rb_agency_option_unittype']:1;
get_currentuserinfo(); 

?>
<div class="wrap">
	<?php 
	// Include Admin Menu
	include ("admin-include-menu.php"); ?>

	<div id="welcome-panel" class="welcome-panel">
		<div class="welcome-panel-content">

			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column">
					<h3><?php echo __("Welcome to RB Agency", rb_agency_TEXTDOMAIN ) ?>!</h3>
					<p class="about-description"><?php echo __("We have added some resources below to help you get started.", rb_agency_TEXTDOMAIN ) ?></p>
					<h4><?php echo __("Quick Links", rb_agency_TEXTDOMAIN ) ?></h4>
					<ul>
						<?php
						if ($user_level >= 7) {
							echo "<li><a href='?page=rb_agency_profiles' class=\"button-secondary\">". __("Manage Profiles", rb_agency_TEXTDOMAIN) . "</a> - ". __("Manage existing profiles", rb_agency_TEXTDOMAIN) . ".</li>";

							$queryGenderResult =$wpdb->get_results("SELECT GenderID, GenderTitle FROM ".table_agency_data_gender, ARRAY_A);
							$queryGenderCount = $wpdb->num_rows;

							foreach($queryGenderResult as $fetchGender){
								echo "<li><a class=\"button-secondary\" href=\"". admin_url("admin.php?page=rb_agency_profiles&action=add&ProfileGender=".$fetchGender["GenderID"])."\">". __("Create New ".ucfirst($fetchGender["GenderTitle"])."", rb_agency_TEXTDOMAIN) ."</a></li>\n";
							}
							if($queryGenderCount < 1){
							echo "<li>". __("No Gender Found. <a href=\"". admin_url("admin.php?page=rb_agency_settings&ampConfigID=5")."\">Create New Gender</a>", rb_agency_TEXTDOMAIN) ."</li>\n";
							} 

							echo "<li><a href='?page=rb_agency_search' class=\"button-secondary\">". __("Search Profiles", rb_agency_TEXTDOMAIN) . "</a> - ". __("Find profiles", rb_agency_TEXTDOMAIN) . ".</li>";
							
							echo "<li><a href='?page=rb_agency_interact_approvemembers' class=\"button-secondary\">". __("Approve profiles", rb_agency_TEXTDOMAIN) . "</a> - ". __("Approve profiles", rb_agency_TEXTDOMAIN) . ".</li>";
						
						}
						?>
					</ul>
				</div>

				<div class="welcome-panel-column" style="margin-left: 50px;">
					<iframe src="http://player.vimeo.com/video/27752740" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</div>

			</div>
		</div>
	</div>
</div>

<div id="dashboard-widgets-wrap">
	<div id="dashboard-widgets" class="metabox-holder columns-2">

		<div id="postbox-container-1" class="postbox-container">
			<div id="normal-sortables" class="meta-box-sortables ui-sortable">

				<div id="dashboard_right_now" class="postbox">
					<div class="handlediv" title="Click to toggle"><br></div>
					<h3 class="hndle" ><span><?php echo __("Quick Search", rb_agency_TEXTDOMAIN ) ?></span></h3>
					<div class="inside">
						<?php
						if ($user_level >= 7) {
							// Profile Class
							include(rb_agency_BASEREL ."app/profile.class.php");

							$form = RBAgency_Profile::search_form("", "", 0);
							echo $form;

						} // Editor
						?>
					</div>
				</div>

			</div>
		</div>

		<div id="postbox-container-2" class="postbox-container">
			<div id="side-sortables" class="meta-box-sortables ui-sortable">

				<div id="dashboard_recent_drafts" class="postbox" style="display: block;">
					<div class="handlediv" title="Click to toggle"><br></div>
					<h3 class="hndle"><span><?php echo __("Recently Updated Profiles", rb_agency_TEXTDOMAIN ) ?></span></h3>
					<div class="inside">
						<ul>
						<?php
						if ($user_level >= 7) {
							// Recently Updated
							$query = "SELECT ProfileID, ProfileContactNameFirst, ProfileContactNameLast, ProfileDateUpdated FROM ". table_agency_profile ." ORDER BY ProfileDateUpdated DESC LIMIT 0,10";
							$results=  $wpdb->get_results($query, ARRAY_A);
							$count = $wpdb->num_rows;
							foreach ($results as $data ) { ?>
								<li>
									<a href="?page=rb_agency_profiles&action=editRecord&ProfileID=<?php echo $data['ProfileID']; ?>"><?php echo stripslashes($data['ProfileContactNameFirst']) ." ". stripslashes($data['ProfileContactNameLast']) ?></a>
									<?php 
									if ($data['ProfileDateUpdated'] <> "0000-00-00 00:00:00" && isset($data['ProfileDateUpdated']) && !empty($data['ProfileDateUpdated'])){ ?>
									<span class="add-new-h2">Updated <?php echo rb_agency_makeago(rb_agency_convertdatetime($data['ProfileDateUpdated'])); ?></span>
									<?php } ?>
								</li><?php
							}
							if ($count < 1) {
								echo "". __("There are currently no profiles added", rb_agency_TEXTDOMAIN) . ".";
							}
						}
						?>
						</ul>
					</div>
				</div>

				<div id="dashboard_recent_drafts" class="postbox" style="display: block;">
					<div class="handlediv" title="Click to toggle"><br></div>
					<h3 class="hndle"><span><?php echo __("Recently Viewed Profiles", rb_agency_TEXTDOMAIN ) ?></span></h3>
					<div class="inside">
						<ul>
						<?php
						if ($user_level >= 7) {
							// Recently Viewed
							$query = "SELECT ProfileID, ProfileContactNameFirst, ProfileContactNameLast, ProfileDateViewLast, ProfileStatHits FROM ". table_agency_profile ." ORDER BY ProfileDateViewLast DESC LIMIT 0,10";
							$results=  $wpdb->get_results($query, ARRAY_A);
							$count = $wpdb->num_rows;
							foreach ($results as $data ) { 
								?>
								<li>
									<a href="?page=rb_agency_profiles&action=editRecord&ProfileID=<?php echo $data['ProfileID']; ?>"><?php echo stripslashes($data['ProfileContactNameFirst']) ." ". stripslashes($data['ProfileContactNameLast']); ?></a>
									<span class="add-new-h2"><?php echo $data['ProfileStatHits']; ?> <?php echo __("Views", rb_agency_TEXTDOMAIN ) ?></span>
									<?php 
									if ($data['ProfileDateViewLast'] <> "0000-00-00 00:00:00" && isset($data['ProfileDateViewLast']) && !empty($data['ProfileDateViewLast'])){ ?>
									<span class="add-new-h2">Last viewed <?php echo rb_agency_makeago(rb_agency_convertdatetime($data['ProfileDateViewLast'])); ?></span>
									<?php } ?>
								</li><?php
							}
							
							if ($count < 1) {
								echo "". __("There are currently no profiles added", rb_agency_TEXTDOMAIN) . ".";
							}
						}
						?>
						</ul>
					</div>
				</div>

			</div>
		</div>
		<div class="clear"></div>


	</div>
</div>