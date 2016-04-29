<?php
/*
Plugin Name: thesoundtestroom App Tracker
Plugin URI: http://colinswinney.com/
Description: Tracker for iTunes App Store
Author: Colin Swinney
Version:1.0
Author URI:http://colinswinney.com
*/

global $post;
$plugin_url = WP_PLUGIN_URL . '/tstr-app-tracker';


// activate the cron event
register_activation_hook( __FILE__, 'app_tracker_activation');
function app_tracker_activation() {
	wp_schedule_event(time(), 'hourly', 'app_tracker_hourly_event');
}

add_action('app_tracker_hourly_event', 'tracker_task_to_do');



// deactivate the cron event
register_deactivation_hook( __FILE__, 'app_tracker_deactivation');
function app_tracker_deactivation() {
	wp_clear_scheduled_hook('app_tracker_hourly_event');
}


// hourly scan for changes in app store
function tracker_task_to_do() {

	// WP_Query arguments
	$args = array (
		'post_type' => 'apps',
		'posts_per_page' => '-1',
	);

	// The Query
	$tstr_cron_query = new WP_Query( $args );

	// The Loop
	if ( $tstr_cron_query->have_posts() ) {
		while ( $tstr_cron_query->have_posts() ) {
			$tstr_cron_query->the_post();

			global $post;
			$post_id = $post->ID;

			// app_id must be declared early for app_store_vars to work
			$app_id = get_field('app_id');
			
			$thrity_days_ago = strtotime('-30 days');
			$fifteen_days_ago = strtotime('-15 days');
			$five_minutes_ago = strtotime('-5 minutes');

			include('vars/app_store_vars.php');
			include('vars/field_keys.php');

			if ( $appData['results'] == NULL ) {
				return;
			}
			else {
		  	
				// remove sales after thirty days
			  	if ($field_price_last_cron_update) {
					if ($field_price_last_cron_update < $thrity_days_ago) {
						wp_remove_object_terms( $post_id, 'Price Drop', 'status' );
						wp_remove_object_terms( $post_id, 'Price Bump', 'status' );
						update_post_meta( $post_id, $key_price_last_cron_update, $value_price_last_cron_update );
					}
			    }

			    // remove versions after fifteen days
			    if ($field_version_last_cron_update) {
					if ($field_version_last_cron_update < $fifteen_days_ago) {
						wp_remove_object_terms( $post_id, 'Version Update', 'status' );
						update_post_meta( $post_id, $key_version_last_cron_update, $value_version_last_cron_update );
					}
			    }

			    // add bump if price changes
			  	if ( $field_price < $appCurrentPrice || $appCurrentPrice > $field_price ) {
			  		wp_remove_object_terms( $post_id, 'Price Drop', 'status' );
			        wp_set_object_terms( $post_id, 'Price Bump', 'status', true );
			        
					update_post_meta( $post_id, $key_price_last_cron_update, $value_price_last_cron_update );
			    }

			    // add drop if price changes
			    if ( $field_price > $appCurrentPrice || $appCurrentPrice < $field_price ) {
			    	wp_remove_object_terms( $post_id, 'Price Bump', 'status' );
			        wp_set_object_terms( $post_id, 'Price Drop', 'status', true );
			        
					update_post_meta( $post_id, $key_price_last_cron_update, $value_price_last_cron_update );
			    }

			    // add updated if version changes
			    if ( $field_version != $appCurrentVersion || $appCurrentVersion != $field_version ) {
			        wp_set_object_terms( $post_id, 'Version Update', 'status', true );
			        update_post_meta( $post_id, $key_version_last_cron_update, $value_version_last_cron_update );
			    }

			    // update all meta if price changes
			    if ($field_price != $appCurrentPrice || $appCurrentPrice != $field_price) {

			  		$field_price_repeater[] = array("price_json_object" => $value_json_object, "price_timestamp" => time(), "repeater_price" => $value_price);
					update_field( $key_price_repeater, $field_price_repeater, $post_id );

					update_post_meta( $post_id, $key_price_last_cron_update, $value_price_last_cron_update );

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

					$my_args = array(
					      'ID'           => $post_id,
					      'post_title'   => $appCurrentTitle,
					      'post_name' => $appCurrentTitle // slug
					);
					wp_update_post( $my_args );



					
			  	}

			  	// update all meta if version changes
			  	if ($field_version != $appCurrentVersion || $appCurrentVersion != $field_version) {
			  		
			  		$field_version_repeater[] = array("version_json_object" => $value_json_object, "version_timestamp" => time(), "repeater_version" => $value_version);
					update_field( $key_version_repeater, $field_version_repeater, $post_id );

					update_post_meta( $post_id, $key_version_last_cron_update, $value_version_last_cron_update );

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

					$my_args = array(
					      'ID'           => $post_id,
					      'post_title'   => $appCurrentTitle,
					      'post_name' => $appCurrentTitle // slug
					);
					wp_update_post( $my_args );


					if (strpos($appCurrentDescription, 'Audiobus') !== false || strpos($appCurrentDescription, 'audiobus') !== false || strpos($appCurrentDescription, 'audio bus') !== false || strpos($appCurrentDescription, 'Audio Bus') !== false || strpos($appCurrentDescription, 'AudioBus') !== false) {
				        wp_set_object_terms( $post_id, 'Audiobus', 'search-terms', true );
				    }

				    if (strpos($appCurrentDescription, 'Inter App Audio') !== false || strpos($appCurrentDescription, 'IAA') !== false || strpos($appCurrentDescription, 'Inter-App-Audio') !== false || strpos($appCurrentDescription, 'iaa') !== false || strpos($appCurrentDescription, 'inter app audio') !== false || strpos($appCurrentDescription, 'Inter-App Audio') !== false || strpos($appCurrentDescription, 'inter-app-audio') !== false || strpos($appCurrentDescription, 'inter-app audio') !== false) {
				        wp_set_object_terms( $post_id, 'Inter-App Audio', 'search-terms', true );
				    }

				    if (strpos($appCurrentDescription, 'MIDI') !== false || strpos($appCurrentDescription, 'midi') !== false || strpos($appCurrentDescription, 'Midi') !== false ) {
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

				    if (strpos($appCurrentReleaseNotes, 'MIDI') !== false || strpos($appCurrentReleaseNotes, 'midi') !== false || strpos($appCurrentReleaseNotes, 'Midi') !== false ) {
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

				    
					
			   	}
		    }

		}

	} else {
		// no posts found
	}

	// Restore original Post Data
	wp_reset_postdata();

}

?>