<?php

function create_app_post_type_function() {

	$labels = array(
		'name'                => _x( 'Apps', 'Post Type General Name', 'colin_text_domain' ),
		'singular_name'       => _x( 'App', 'Post Type Singular Name', 'colin_text_domaincolin_text_domain' ),
		'menu_name'           => __( 'Apps', 'colin_text_domain' ),
		'name_admin_bar'      => __( 'App', 'colin_text_domain' ),
		'parent_item_colon'   => __( 'Apps', 'colin_text_domain' ),
		'all_items'           => __( 'All Apps', 'colin_text_domain' ),
		'add_new_item'        => __( 'Add New App', 'colin_text_domain' ),
		'add_new'             => __( 'New App', 'colin_text_domain' ),
		'new_item'            => __( 'New App', 'colin_text_domain' ),
		'edit_item'           => __( 'Edit App', 'colin_text_domain' ),
		'update_item'         => __( 'Update App', 'colin_text_domain' ),
		'view_item'           => __( 'View App', 'colin_text_domain' ),
		'search_items'        => __( 'Search App', 'colin_text_domain' ),
		'not_found'           => __( 'Not found', 'colin_text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'colin_text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'apps',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'app', 'colin_text_domain' ),
		'description'         => __( 'App', 'colin_text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'comments' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-smartphone',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'apps', $args );

}
add_action( 'init', 'create_app_post_type_function', 0 );



function create_status_hierarchical_taxonomy() {

  $labels = array(
    'name' => _x( 'Status', 'taxonomy general name' ),
    'singular_name' => _x( 'Status', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Statuses' ),
    'all_items' => __( 'All Statuses' ),
    'parent_item' => __( 'Parent Status' ),
    'parent_item_colon' => __( 'Parent Status:' ),
    'edit_item' => __( 'Edit Status' ), 
    'update_item' => __( 'Update Status' ),
    'add_new_item' => __( 'Add New Status' ),
    'new_item_name' => __( 'New Status Name' ),
    'menu_name' => __( 'Status' ),
  );  
  register_taxonomy('status',array('apps'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'status' ),
  ));

}
add_action( 'init', 'create_status_hierarchical_taxonomy', 0 );











function create_search_terms_hierarchical_taxonomy() {

  $labels = array(
    'name' => _x( 'Search Terms', 'taxonomy general name' ),
    'singular_name' => _x( 'Search Term', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Search Terms' ),
    'all_items' => __( 'All Search Terms' ),
    'parent_item' => __( 'Parent Search Term' ),
    'parent_item_colon' => __( 'Parent Search Term:' ),
    'edit_item' => __( 'Edit Search Term' ), 
    'update_item' => __( 'Update Search Term' ),
    'add_new_item' => __( 'Add New Search Term' ),
    'new_item_name' => __( 'New Search Term Name' ),
    'menu_name' => __( 'Search Terms' ),
  );  
  register_taxonomy('search-terms',array('apps'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'search-term' ),
  ));

}
add_action( 'init', 'create_search_terms_hierarchical_taxonomy', 0 );







function create_device_hierarchical_taxonomy() {

  $labels = array(
    'name' => _x( 'Devices', 'taxonomy general name' ),
    'singular_name' => _x( 'Device', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Devices' ),
    'all_items' => __( 'All Devices' ),
    'parent_item' => __( 'Parent Device' ),
    'parent_item_colon' => __( 'Parent Device:' ),
    'edit_item' => __( 'Edit Device' ), 
    'update_item' => __( 'Update Device' ),
    'add_new_item' => __( 'Add New Device' ),
    'new_item_name' => __( 'New Device Name' ),
    'menu_name' => __( 'Devices' ),
  );  
  register_taxonomy('devices',array('apps'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'device' ),
  ));

}
add_action( 'init', 'create_device_hierarchical_taxonomy', 0 );






function create_genres_hierarchical_taxonomy() {

  $labels = array(
    'name' => _x( 'Genres', 'taxonomy general name' ),
    'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Genres' ),
    'all_items' => __( 'All Genres' ),
    'parent_item' => __( 'Parent Genre' ),
    'parent_item_colon' => __( 'Parent Genre:' ),
    'edit_item' => __( 'Edit Genre' ), 
    'update_item' => __( 'Update Genre' ),
    'add_new_item' => __( 'Add New Genre' ),
    'new_item_name' => __( 'New Genre Name' ),
    'menu_name' => __( 'Genres' ),
  );  
  register_taxonomy('genres',array('apps'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'genre' ),
  ));

}
add_action( 'init', 'create_genres_hierarchical_taxonomy', 0 );







//////////// SAVE APP INFO INTO ACF FIELDS ///////////
add_action( 'save_post', 'tstr_plugin_save_acf_field_data', 10, 3 );
 
/* When the post is saved, saves our custom data */
function tstr_plugin_save_acf_field_data() {

	if (isset($post->post_status) && 'auto-draft' == $post->post_status) {
	    return;
	  }

	$post_id = get_the_id();
	$app_id = get_field('app_id');

	if ($app_id) {

		include('app_store_vars.php');
		include('field_keys.php');

		if ($field_json_object == '') {

			update_post_meta( $post_id, $key_price, $value_price );
			update_post_meta( $post_id, $key_seller_name, $value_seller_name );
			update_post_meta( $post_id, $key_artist_view_url, $value_artist_view_url );
			update_post_meta( $post_id, $key_description, $value_description );
			update_post_meta( $post_id, $key_track_url, $value_track_url );
			update_post_meta( $post_id, $key_artwork_512, $value_artwork_512 );
			update_post_meta( $post_id, $key_artwork_100, $value_artwork_100 );
			update_post_meta( $post_id, $key_artwork_60, $value_artwork_60 );

			update_post_meta( $post_id, $key_ipad_screenshot_0, $value_ipad_screenshot_0 );
			update_post_meta( $post_id, $key_ipad_screenshot_1, $value_ipad_screenshot_1 );
			update_post_meta( $post_id, $key_ipad_screenshot_2, $value_ipad_screenshot_2 );
			update_post_meta( $post_id, $key_ipad_screenshot_3, $value_ipad_screenshot_3 );
			update_post_meta( $post_id, $key_ipad_screenshot_4, $value_ipad_screenshot_4 );

			update_post_meta( $post_id, $key_iphone_screenshot_0, $value_iphone_screenshot_0 );
			update_post_meta( $post_id, $key_iphone_screenshot_1, $value_iphone_screenshot_1 );
			update_post_meta( $post_id, $key_iphone_screenshot_2, $value_iphone_screenshot_2 );
			update_post_meta( $post_id, $key_iphone_screenshot_3, $value_iphone_screenshot_3 );
			update_post_meta( $post_id, $key_iphone_screenshot_4, $value_iphone_screenshot_4 );

			update_post_meta( $post_id, $key_version, $value_version );
			update_post_meta( $post_id, $key_min_os, $value_min_os );
			update_post_meta( $post_id, $key_release_date, $value_release_date );
			update_post_meta( $post_id, $key_current_version_release_date, $value_current_version_release_date );
			update_post_meta( $post_id, $key_release_notes, $value_release_notes );
			update_post_meta( $post_id, $key_json_object, $value_json_object );

			$field_price_repeater[] = array("price_json_object" => $value_json_object, "price_timestamp" => time(), "repeater_price" => $value_price);
			update_field( $key_price_repeater, $field_price_repeater, $post_id );


			$field_version_repeater[] = array("version_json_object" => $value_json_object, "version_timestamp" => time(), "repeater_version" => $value_version);
			update_field( $key_version_repeater, $field_version_repeater, $post_id );
			

			if ($field_initial_timestamp == '') {
				update_post_meta( $post_id, $key_initial_timestamp, $value_initial_timestamp );
			}

			foreach ($appCurrentDevices as $device) {
	  			wp_set_object_terms( $post_id, $device, 'devices', true );
		  	}
		  	foreach ($appCurrentGenres as $genre) {
	  			wp_set_object_terms( $post_id, $genre, 'genres', true );
		  	}

		}

		$my_args = array(
		      'ID'           => $post_id,
		      'post_title'   => $appCurrentTitle,
		      'post_name' => $appCurrentTitle // slug
		);
		

		if ( ! wp_is_post_revision($post_id) ) {
			// unhook this function so it doesn't loop infinitely
	        remove_action('save_post', 'tstr_plugin_save_acf_field_data', 10, 3);

	    	wp_update_post( $my_args );
	     
	        // re-hook this function
	        add_action('save_post', 'tstr_plugin_save_acf_field_data', 10, 3);
	    }


	    if (strpos($appCurrentDescription, 'Audiobus') !== false || strpos($appCurrentDescription, 'audiobus') !== false || strpos($appCurrentDescription, 'audio bus') !== false || strpos($appCurrentDescription, 'Audio Bus') !== false || strpos($appCurrentDescription, 'AudioBus') !== false) {
	        wp_set_object_terms( $post_id, 'Audiobus', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'Inter App Audio') !== false || strpos($appCurrentDescription, 'IAA') !== false || strpos($appCurrentDescription, 'Inter-App-Audio') !== false || strpos($appCurrentDescription, 'iaa') !== false || strpos($appCurrentDescription, 'inter app audio') !== false || strpos($appCurrentDescription, 'Inter-App Audio') !== false || strpos($appCurrentDescription, 'inter-app-audio') !== false || strpos($appCurrentDescription, 'inter-app audio') !== false) {
	        wp_set_object_terms( $post_id, 'Inter-App Audio', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'MIDI') !== false || strpos($appCurrentDescription, 'midi') !== false  || strpos($appCurrentDescription, 'Midi') !== false ) {
	        wp_set_object_terms( $post_id, 'MIDI', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'Guitar') !== false || strpos($appCurrentDescription, 'guitar') !== false || strpos($appCurrentDescription, 'guitars') !== false || strpos($appCurrentDescription, 'Guitars') !== false ) {
	        wp_set_object_terms( $post_id, 'Guitar', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'Drums') !== false || strpos($appCurrentDescription, 'drums') !== false || strpos($appCurrentDescription, 'drum') !== false || strpos($appCurrentDescription, 'Drum') !== false ) {
	        wp_set_object_terms( $post_id, 'Drums', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'DAW') !== false || strpos($appCurrentDescription, 'daw') !== false || strpos($appCurrentDescription, 'Daw') !== false ) {
	        wp_set_object_terms( $post_id, 'DAW', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'AudioShare') !== false || strpos($appCurrentDescription, 'Audioshare') !== false || strpos($appCurrentDescription, 'audioshare') !== false || strpos($appCurrentDescription, 'Audio Share') !== false || strpos($appCurrentDescription, 'Audio share') !== false || strpos($appCurrentDescription, 'audio share') !== false ) {
	        wp_set_object_terms( $post_id, 'AudioShare', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'DropBox') !== false || strpos($appCurrentDescription, 'Dropbox') !== false || strpos($appCurrentDescription, 'dropbox') !== false || strpos($appCurrentDescription, 'Drop Box') !== false || strpos($appCurrentDescription, 'Drop box') !== false || strpos($appCurrentDescription, 'drop box') !== false ) {
	        wp_set_object_terms( $post_id, 'Dropbox', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'Soundcloud') !== false || strpos($appCurrentDescription, 'SoundCloud') !== false || strpos($appCurrentDescription, 'Sound Cloud') !== false || strpos($appCurrentDescription, 'soundcloud') !== false || strpos($appCurrentDescription, 'sound cloud') !== false ) {
	        wp_set_object_terms( $post_id, 'SoundCloud', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'Ableton Link') !== false || strpos($appCurrentDescription, 'ableton link') !== false || strpos($appCurrentDescription, 'Ableton link') !== false ) {
	        wp_set_object_terms( $post_id, 'Ableton Link', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'synthesizer') !== false || strpos($appCurrentDescription, 'Synthesizer') !== false || strpos($appCurrentDescription, 'synth') !== false || strpos($appCurrentDescription, 'Synth') !== false ) {
	        wp_set_object_terms( $post_id, 'Synthesizer', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'VoiceOver') !== false || strpos($appCurrentDescription, 'Voice over') !== false || strpos($appCurrentDescription, 'Voice Over') !== false || strpos($appCurrentDescription, 'voiceover') !== false || strpos($appCurrentDescription, 'voice over') !== false ) {
	        wp_set_object_terms( $post_id, 'VoiceOver', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'Sequencer') !== false || strpos($appCurrentDescription, 'sequencer') !== false ) {
	        wp_set_object_terms( $post_id, 'Sequencer', 'search-terms', true );
	    }

	    if (strpos($appCurrentDescription, 'Audio Unit') !== false || strpos($appCurrentDescription, 'audio unit') !== false || strpos($appCurrentDescription, 'audiounit') !== false  || strpos($appCurrentDescription, 'Audiounit') !== false || strpos($appCurrentDescription, 'AudioUnit') !== false) {
	        wp_set_object_terms( $post_id, 'Audio Units', 'search-terms', true );
	    }

	    // if ( strpos($appCurrentFeatures, 'iosUniversal') !== false ) {
	    //     wp_set_object_terms( $post_id, 'iOS Universal', 'devices', true );
	    // }
	    foreach ($appCurrentFeatures as $feature) {
	    	if ($feature == 'iosUniversal') {
	    		wp_set_object_terms( $post_id, 'iOS Universal', 'devices', true );
	    	}
	  	}


	  	if (strpos($appCurrentReleaseNotes, 'Audiobus') !== false || strpos($appCurrentReleaseNotes, 'audiobus') !== false || strpos($appCurrentReleaseNotes, 'audio bus') !== false || strpos($appCurrentReleaseNotes, 'Audio Bus') !== false || strpos($appCurrentReleaseNotes, 'AudioBus') !== false) {
	        wp_set_object_terms( $post_id, 'Audiobus', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'Inter App Audio') !== false || strpos($appCurrentReleaseNotes, 'IAA') !== false || strpos($appCurrentReleaseNotes, 'Inter-App-Audio') !== false || strpos($appCurrentReleaseNotes, 'iaa') !== false || strpos($appCurrentReleaseNotes, 'inter app audio') !== false || strpos($appCurrentReleaseNotes, 'Inter-App Audio') !== false || strpos($appCurrentReleaseNotes, 'inter-app-audio') !== false || strpos($appCurrentReleaseNotes, 'inter-app audio') !== false) {
	        wp_set_object_terms( $post_id, 'Inter-App Audio', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'MIDI') !== false || strpos($appCurrentReleaseNotes, 'midi') !== false || strpos($appCurrentDescription, 'Midi') !== false) {
	        wp_set_object_terms( $post_id, 'MIDI', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'Guitar') !== false || strpos($appCurrentReleaseNotes, 'guitar') !== false || strpos($appCurrentReleaseNotes, 'guitars') !== false || strpos($appCurrentReleaseNotes, 'Guitars') !== false ) {
	        wp_set_object_terms( $post_id, 'Guitar', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'Drums') !== false || strpos($appCurrentReleaseNotes, 'drums') !== false || strpos($appCurrentReleaseNotes, 'drum') !== false || strpos($appCurrentReleaseNotes, 'Drum') !== false ) {
	        wp_set_object_terms( $post_id, 'Drums', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'DAW') !== false || strpos($appCurrentReleaseNotes, 'daw') !== false || strpos($appCurrentReleaseNotes, 'Daw') !== false ) {
	        wp_set_object_terms( $post_id, 'DAW', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'AudioShare') !== false || strpos($appCurrentReleaseNotes, 'Audioshare') !== false || strpos($appCurrentReleaseNotes, 'audioshare') !== false || strpos($appCurrentReleaseNotes, 'Audio Share') !== false || strpos($appCurrentReleaseNotes, 'Audio share') !== false || strpos($appCurrentReleaseNotes, 'audio share') !== false ) {
	        wp_set_object_terms( $post_id, 'AudioShare', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'DropBox') !== false || strpos($appCurrentReleaseNotes, 'Dropbox') !== false || strpos($appCurrentReleaseNotes, 'dropbox') !== false || strpos($appCurrentReleaseNotes, 'Drop Box') !== false || strpos($appCurrentReleaseNotes, 'Drop box') !== false || strpos($appCurrentReleaseNotes, 'drop box') !== false ) {
	        wp_set_object_terms( $post_id, 'Dropbox', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'Soundcloud') !== false || strpos($appCurrentReleaseNotes, 'SoundCloud') !== false || strpos($appCurrentReleaseNotes, 'Sound Cloud') !== false || strpos($appCurrentReleaseNotes, 'soundcloud') !== false || strpos($appCurrentReleaseNotes, 'sound cloud') !== false ) {
	        wp_set_object_terms( $post_id, 'SoundCloud', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'Ableton Link') !== false || strpos($appCurrentReleaseNotes, 'ableton link') !== false || strpos($appCurrentReleaseNotes, 'Ableton link') !== false ) {
	        wp_set_object_terms( $post_id, 'Ableton Link', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'synthesizer') !== false || strpos($appCurrentReleaseNotes, 'Synthesizer') !== false || strpos($appCurrentReleaseNotes, 'synth') !== false || strpos($appCurrentReleaseNotes, 'Synth') !== false ) {
	        wp_set_object_terms( $post_id, 'Synthesizer', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'VoiceOver') !== false || strpos($appCurrentReleaseNotes, 'Voice over') !== false || strpos($appCurrentReleaseNotes, 'Voice Over') !== false || strpos($appCurrentReleaseNotes, 'voiceover') !== false || strpos($appCurrentReleaseNotes, 'voice over') !== false ) {
	        wp_set_object_terms( $post_id, 'VoiceOver', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'Sequencer') !== false || strpos($appCurrentReleaseNotes, 'sequencer') !== false ) {
	        wp_set_object_terms( $post_id, 'Sequencer', 'search-terms', true );
	    }

	    if (strpos($appCurrentReleaseNotes, 'Audio Unit') !== false || strpos($appCurrentReleaseNotes, 'audio unit') !== false || strpos($appCurrentReleaseNotes, 'audiounit') !== false  || strpos($appCurrentReleaseNotes, 'Audiounit') !== false || strpos($appCurrentReleaseNotes, 'AudioUnit') !== false) {
	        wp_set_object_terms( $post_id, 'Audio Units', 'search-terms', true );
	    }

				    

	    // Add Featured Image to Post
		$image_url  = $appCurrentArt512; // Define the image URL here
		$upload_dir = wp_upload_dir(); // Set upload folder
		$image_data = file_get_contents($image_url); // Get image data
		$filename   = basename($image_url); // Create image file name

		// IMAGE FILE TITLE
	    //Lower case everything
	    $imageTitle = strtolower($appCurrentTitle);
	    //Make alphanumeric (removes all other characters)
	    $imageTitle = preg_replace("/[^a-z0-9_\s-]/", "", $imageTitle);
	    //Clean up multiple dashes or whitespaces
	    $imageTitle = preg_replace("/[\s-]+/", " ", $imageTitle);
	    //Convert whitespaces and underscore to dash
	    $imageTitle = preg_replace("/[\s_]/", "-", $imageTitle);
		    

		// Check folder permission and define file location
		if( wp_mkdir_p( $upload_dir['path'] ) ) {
		    $file = $upload_dir['path'] . '/' . $imageTitle . $filename;
		} else {
		    $file = $upload_dir['basedir'] . '/' . $imageTitle . $filename;
		}

		// Create the image  file on the server
		file_put_contents( $file, $image_data );

		// Check image file type
		$wp_filetype = wp_check_filetype( $filename, null );

		// Set attachment data
		$attachment = array(
		    'post_mime_type' => $wp_filetype['type'],
		    'post_title'     => sanitize_file_name( $imageTitle ),
		    'post_content'   => '',
		    'post_status'    => 'inherit'
		);

		// Create the attachment
		$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

		// Include image.php
		require_once(ABSPATH . 'wp-admin/includes/image.php');

		// Define attachment metadata
		$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

		// Assign metadata to attachment
		wp_update_attachment_metadata( $attach_id, $attach_data );

		// And finally assign featured image to post
		set_post_thumbnail( $post_id, $attach_id );

		//
		// end featured image stuff
		//

	}
	

}


?>