<?php


/**
 * Show recent posts
 */
function recent_posts_grid($atts) {

  $args = array(
    'post_type' => $atts['type'],
    'post_status' => 'publish',
    'posts_per_page' => $atts['get']
  );

  $options = array(
    'grid' => true,
    'grid_size' => $atts['size'],
    'article_classes' => ['grid-item']
  );

  return postify_it($args, $options);
}

add_shortcode( 'tsl_recent_posts' , 'recent_posts_grid' );

function create_support_button($atts) {
  $content = "<a class='btn btn-" . $atts['color'] . "'";
  $content .= "href='" . $atts['href'] . "' target='_blank'>";
  $content .= $atts['text'];
  if($atts['type']) {
    $content .= "<i class='fa fa-" . $atts['type'] . "'></i>";
  }
  $content .= "</a>";

  return $content;
}
add_shortcode( 'support_button' , 'create_support_button' );

function email_bar() {
  dynamic_sidebar('sidebar-email');
}
add_shortcode('tsl_email_capture', 'email_bar');


/**
 * Create buttons from the CMS
 *
 */

 function section_header($atts) {
   $content = '<div class="section-header">';
   $content .= '<div class="col"><h1>' . $atts["header"] . "</h1>";
   $content .= '<p>' . $atts["subtitle"] . '</p></div>';
   $content .= '<div class="col"><a class="btn btn-info" href="' . $atts["button-target"] . '">' . $atts["button-text"] . '</a>';
   $content .= '</div></div>';

   return $content;
 }
add_shortcode( 'tsl_section_header' , 'section_header' );

/**
 * Create editors section
 *
 */
 // Returns list of contributors
 function contributors() {
 	global $wpdb;
 	$args = array();
 	$args['fields'] = array( 'ID', 'display_name' );
 	$args['meta_key'] = 'contributor';
 	$args['meta_value'] = 'yes';
 	$authors= get_users( $args );

 	echo '<div id="editors-box-wrapper">';
  echo '<h1 id="editors-header">Contributing Editors</h1>';
 	echo '<div id="editors-box">';

 	foreach($authors as $author) {

 		echo "<li>";

 		echo '<div>';
 		echo "<a href=\"";
 		echo get_author_posts_url($author->ID);
 		echo "\">";
 		echo '<h4 class="contributor-name">';
 		the_author_meta('display_name', $author->ID);
 		echo '</h4>';
 		if( get_the_author_meta('university', $author->ID) != '') {
 			echo '<h5 class="editor-university">';
 			the_author_meta('university', $author->ID);
 			echo '</h5>';
 		}
 		echo "</a>";


 		echo "</div>";
 		echo "</li>";
 	}
 	echo '</div>';
 	echo '</div>';

 }

 add_shortcode('contributors', 'contributors');

 function editors() {

 	global $wpdb;
 	$args = array();
 	$args['fields'] = array( 'ID', 'display_name' );
 	$args['meta_key'] = 'editor';
 	$args['meta_value'] = 'yes';
 	$editors= get_users($args);

 	echo '<div id="editors-box-wrapper">';
  echo '<h1>Senior Editors</h1>';
 	echo '<div id="editors-box">';

 	// echo '<div id="editors-title">';
 	// echo '<h4 id="editors-header">Senior Editors</h4>';
 	// echo '</div>';
 // 	echo '<div id="editors-content">';

 	foreach($editors as $editor) {
 		echo "<li>";
 		echo '<div class="editor-img">';
 		echo "<a href=\"";
 		echo get_author_posts_url($editor->ID);
 		echo "\">";
 		if (userphoto_exists($editor->ID)) {
 			echo userphoto($editor);
 		}
 		elseif (validate_gravatar($editor->user_email)) {
 			echo get_avatar($editor->ID, 300, 'blank');
 		}
 		echo "</a>";
 		echo '</div>';
 		echo '<div>';
 		echo '<h2 class="editor-name">';
 		echo "<a href=\"";
 		echo get_author_posts_url($editor->ID);
 		echo "\">";
 		the_author_meta('display_name', $editor->ID);
 		echo '</h2>';
    echo "</a>";
 		if( get_the_author_meta('university', $editor->ID) != '') {
 			echo '<h5 class="editor-university">';
      if (get_the_author_meta('specialization', $editor->ID) != '') {
          the_author_meta('specialization', $editor->ID);
          echo ", ";
      }
 			the_author_meta('university', $editor->ID);
 			echo '</h5>';
 		}

 		echo '<div class="contact-links"><ul class="social-links">';


 		if ( get_the_author_meta( 'twitter', $editor->ID ) != '' ) {
 			echo '<li><a href="http://twitter.com/';
 			echo get_the_author_meta( 'twitter', $editor->ID );
 			echo '"><i class="fa fa-twitter"></i></a></li>';
 		}

 		if ( get_the_author_meta( 'facebook', $editor->ID ) != '' ) {
 			echo '<li><a href="http://';
 			echo get_the_author_meta( 'facebook', $editor->ID );
 			echo '"><i class="fa fa-facebook"></i></a></li>';
 		}

 		if ( get_the_author_meta( 'website', $editor->ID ) != '' ) {
 			echo '<li><a href="http://';
 			echo get_the_author_meta( 'website', $editor->ID );
 			echo '"><i class="fa fa-laptop"></i></a></li>';
 		}

 		if ( get_the_author_meta( 'public_email', $editor->ID ) != '' ) {
 			echo '<li><a href="mailto:';
 			echo get_the_author_meta( 'public_email', $editor->ID );
 			echo '"><i class="fa fa-envelope-o"></i></a></li>';
 		}

 		echo '</ul></div>';
 		echo "</div>";
 		echo "</li>";
 	}
 // 	echo '</div>';
 	echo '</div>';
 	echo '</div>';

 }
 add_shortcode('editors', 'editors');


 function special_thanks() {

 	global $wpdb;
 	$args = array();
 	$args['fields'] = array( 'ID', 'display_name' );
 	$args['meta_key'] = 'special_thanks';
 	$args['meta_value'] = 'yes';
 	$specials = get_users($args);

 	echo '<div id="specialthanks-box-wrapper">';
 	echo '<div id="specialthanks-box">';
 	echo '<div id="specialthanks-title">';
 	echo '<h4 id="specialthanks-header">Special Thanks</h4>';
 	echo '</div>';
 	echo '<div id="specialthanks-content">';

 	foreach($specials as $special) {
 		echo "<li>";
 		echo '<div class="editor-img">';
 		echo "<a href=\"";
 		echo get_author_posts_url($special->ID);
 		echo "\">";
 		if (userphoto_exists($special->ID)) {
 			echo userphoto($special);
 		}
 		elseif (validate_gravatar($special->user_email)) {
 			echo get_avatar($special->ID, 120, 'blank');
 		}
 		echo "</a>";
 		echo '</div>';
 		echo '<div>';
 		echo "<a href=\"";
 		echo get_author_posts_url($special->ID);
 		echo "\">";
 		echo '<h4 class="specialthanks-name">';
 		the_author_meta('display_name', $special->ID);
 		echo '</h4>';
 		echo '<h5>';
 		the_author_meta('university', $special->ID);
 		echo '</h5>';
 		echo "</a>";
 		echo '<div id="special-thanks-reason">';
 		echo get_the_author_meta('special_thanks_reason', $special->ID);

 		echo '</div>';

 		echo '<div class="contact-links"><ul class="social-links">';


 		if ( get_the_author_meta( 'twitter', $special->ID ) != '' ) {
 			echo '<li><a href="http://twitter.com/';
 			echo get_the_author_meta( 'twitter', $special->ID );
 			echo '"><i class="fa fa-twitter"></i></a></li>';
 		}

 		if ( get_the_author_meta( 'facebook', $special->ID ) != '' ) {
 			echo '<li><a href="http://';
 			echo get_the_author_meta( 'facebook', $special->ID );
 			echo '"><i class="fa fa-facebook"></i></a></li>';
 		}

 		if ( get_the_author_meta( 'website', $special->ID ) != '' ) {
 			echo '<li><a href="http://';
 			echo get_the_author_meta( 'website', $special->ID );
 			echo '"><i class="fa fa-laptop"></i></a></li>';
 		}

 		if ( get_the_author_meta( 'email', $special->ID ) != '' ) {
 			echo '<li><a href="mailto:';
 			echo get_the_author_meta( 'email', $special->ID );
 			echo '"><i class="fa fa-envelope-o"></i></a></li>';
 		}

 		echo '</ul></div>';

 		echo "</div>";
 		echo "</li>";
 	}
 	echo '</div>';
 	echo '</div>';
 	echo '</div>';

 }
 add_shortcode('special_thanks', 'special_thanks');


 /* Adding additional social media stuff to the Author box */


function sb_modify_user_contact_methods( $user_contact ){
 /* Add user contact methods */
 $user_contact['twitter'] = __( 'Twitter Handle (no @)' );
 $user_contact['facebook'] = __( 'Facebook URL' );
 $user_contact['public_email'] = __( 'Public Email' );

 /* Remove user contact methods */
 unset($user_contact['aim']);
 unset($user_contact['jabber']);
 unset($user_contact['yim']);
 return $user_contact;

}
add_filter( 'user_contactmethods', 'sb_modify_user_contact_methods' );


add_action( 'show_user_profile', 'sb_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'sb_show_extra_profile_fields' );

function sb_show_extra_profile_fields( $user ) { ?>

	<h3>Associations & Short Details</h3>

	<table class="form-table">

		<tr>
			<th><label for="university">Univeristy or Employer</label></th>

			<td>
				<input type="text" name="university" id="university" value="<?php echo esc_attr( get_the_author_meta( 'university', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your University or Employer.</span>
			</td>
		</tr>
		<tr>
			<th><label for="specialization">Specialization, Major or Job Title</label></th>

			<td>
				<input type="text" name="specialization" id="specialization" value="<?php echo esc_attr( get_the_author_meta( 'specialization', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Specialization or Major.</span>
			</td>


		</tr>

	</table>

	<h3>Special Thanks & Assorted Meta Settings</h3>

	<table class="form-table">

		<tr>
			<th><label for="special-thanks">Include in Special Thanks?</label></th>

			<td>
				<input type="checkbox" name="special_thanks" id=" special_thanks " value="yes" <?php if (esc_attr( get_the_author_meta( "special_thanks", $user->ID )) == "yes") echo "checked"; ?> /><span class="description"><?php _e("Check box if user should be included in Special Thanks section of Contributors page."); ?></span><br />

			</td>
			<td>
				<input type="text" name="special_thanks_reason" id="special-thanks-reason" value="<?php echo esc_attr( get_the_author_meta( 'special_thanks_reason', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">What for?</span>
			</td>
		</tr>
		<tr>
			<th><label for="contributor">Editor?</label></th>

			<td>
				<input type="checkbox" name="editor" id=" editor " value="yes" <?php if (esc_attr( get_the_author_meta( "editor", $user->ID )) == "yes") echo "checked"; ?> /><span class="description"><?php _e("Check box if user should be included under Senior Editors."); ?></span><br />

			</td>
		</tr>
		<tr>
			<th><label for="contributor">Contributor?</label></th>

			<td>
				<input type="checkbox" name="contributor" id=" contributor " value="yes" <?php if (esc_attr( get_the_author_meta( "contributor", $user->ID )) == "yes") echo "checked"; ?> /><span class="description"><?php _e("Check box if user should be included under Contributors."); ?></span><br />

			</td>
		</tr>
	</table>
	<?php
}

add_action( 'personal_options_update', 'sb_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'sb_save_extra_profile_fields' );

function sb_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'university', $_POST['university'] );
	update_usermeta( $user_id, 'specialization', $_POST['specialization'] );
	update_usermeta( $user_id, 'special_thanks', $_POST['special_thanks'] );
	update_usermeta( $user_id, 'special_thanks_reason', $_POST['special_thanks_reason'] );
	update_usermeta( $user_id, 'contributor', $_POST['contributor'] );
	update_usermeta( $user_id, 'editor', $_POST['editor'] );
}


function validate_gravatar($email) {
	// Craft a potential url and test its headers
	$hash = md5(strtolower(trim($email)));
	$uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
	$headers = @get_headers($uri);
	if (!preg_match("|200|", $headers[0])) {
		$has_valid_avatar = FALSE;
	} else {
		$has_valid_avatar = TRUE;
	}
	return $has_valid_avatar;
}


function validate_gravatar_alt($email) {
	if (get_avatar($email, 96, 404) != null) {
		return TRUE;
	}
	else {
		return FALSE;
	}

}
