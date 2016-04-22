<?php

	// ACF VARIABLES
	$app_id = get_field('app_id');

	// main tab
	$field_price = get_field('price');
	$field_seller_name = get_field('seller_name');
	$field_artist_view_url = get_field('artist_view_url');
	$field_description = get_field('description');
	$field_track_view_url = get_field('track_view_url');

	// images tab
	$field_artwork_512 = get_field('artwork_512');
	$field_artwork_100 = get_field('artwork_100');
	$field_artwork_60 = get_field('artwork_60');
	$field_ipad_screenshot_0 = get_field('ipad_screenshot_0');
	$field_ipad_screenshot_1 = get_field('ipad_screenshot_1');
	$field_ipad_screenshot_2 = get_field('ipad_screenshot_2');
	$field_ipad_screenshot_3 = get_field('ipad_screenshot_3');
	$field_ipad_screenshot_4 = get_field('ipad_screenshot_4');
	$field_iphone_screenshot_0 = get_field('iphone_screenshot_0');
	$field_iphone_screenshot_1 = get_field('iphone_screenshot_1');
	$field_iphone_screenshot_2 = get_field('iphone_screenshot_2');
	$field_iphone_screenshot_3 = get_field('iphone_screenshot_3');
	$field_iphone_screenshot_4 = get_field('iphone_screenshot_4');

	// notes tab
	$field_version = get_field('version');
	$field_minimum_os_version = get_field('minimum_os_version');
	$field_release_date = get_field('release_date');
	$field_current_version_release_date = get_field('current_version_release_date');
	$field_release_notes = get_field('release_notes');

	// Logs tab
	$field_json_object = get_field('json_object');
	$field_initial_timestamp = get_field('initial_timestamp');

	// price repeater
	$field_price_repeater = get_field('price_repeater');
	$sub_field_repeater_price = get_sub_field('repeater_price');
	$sub_field_price_timestamp = get_sub_field('price_timestamp');
	$sub_field_price_json_object = get_sub_field('price_json_object');
	$field_price_last_cron_update = get_field('price_last_cron_update');

	// version repeater
	$field_version_repeater = get_field('version_repeater');
	$sub_field_repeater_version = get_sub_field('repeater_version');
	$sub_field_version_timestamp = get_sub_field('version_timestamp');
	$sub_field_version_json_object = get_sub_field('version_json_object');
	$field_version_last_cron_update = get_field('version_last_cron_update');

	// app id
	// $field_app_id = "app_id";
	// $field_app_id_value = "";

	// price
	$key_price = "price";
	$value_price = $appCurrentPrice;

	// seller name
	$key_seller_name = "seller_name";
	$value_seller_name = $appCurrentSellerName;

	// artist view url
	$key_artist_view_url = "artist_view_url";
	$value_artist_view_url = $appCurrentArtistURL;

	// description
	$key_description = "description";
	$value_description = $appCurrentDescription;

	// track view url
	$key_track_url = "track_view_url";
	$value_track_url = $appCurrentTrackURL;

	// artwork 512
	$key_artwork_512 = "artwork_512";
	$value_artwork_512 = $appCurrentArt512;

	// artwork 100
	$key_artwork_100 = "artwork_100";
	$value_artwork_100 = $appCurrentArt100;

	// artwork 60
	$key_artwork_60 = "artwork_60";
	$value_artwork_60 = $appCurrentArt60;

	// ipad SS 
	$key_ipad_screenshot_0 = "ipad_screenshot_0";
	$value_ipad_screenshot_0 = $appCurrentIpadScreenShots[0];

	$key_ipad_screenshot_1 = "ipad_screenshot_1";
	$value_ipad_screenshot_1 = $appCurrentIpadScreenShots[1];

	$key_ipad_screenshot_2 = "ipad_screenshot_2";
	$value_ipad_screenshot_2 = $appCurrentIpadScreenShots[2];

	$key_ipad_screenshot_3 = "ipad_screenshot_3";
	$value_ipad_screenshot_3 = $appCurrentIpadScreenShots[3];

	$key_ipad_screenshot_4 = "ipad_screenshot_4";
	$value_ipad_screenshot_4 = $appCurrentIpadScreenShots[4];

	// iphone SS 
	$key_iphone_screenshot_0 = "iphone_screenshot_0";
	$value_iphone_screenshot_0 = $appCurrentScreenShots[0];

	$key_iphone_screenshot_1 = "iphone_screenshot_1";
	$value_iphone_screenshot_1 = $appCurrentScreenShots[1];

	$key_iphone_screenshot_2 = "iphone_screenshot_2";
	$value_iphone_screenshot_2 = $appCurrentScreenShots[2];

	$key_iphone_screenshot_3 = "iphone_screenshot_3";
	$value_iphone_screenshot_3 = $appCurrentScreenShots[3];

	$key_iphone_screenshot_4 = "iphone_screenshot_4";
	$value_iphone_screenshot_4 = $appCurrentScreenShots[4];

	// version
	$key_version = "version";
	$value_version = $appCurrentVersion;

	// min os
	$key_min_os = "minimum_os_version";
	$value_min_os = $appCurrentMinOS;

	// release date
	$key_release_date = "release_date";
	$value_release_date = $appCurrentReleased;

	// current version release date
	$key_current_version_release_date = "current_version_release_date";
	$value_current_version_release_date = $appCurrentVersionReleased;

	// release notes
	$key_release_notes = "release_notes";
	$value_release_notes = $appCurrentReleaseNotes;

	// json_object
	$key_json_object = "json_object";
	$value_json_object = $appData;

	// initial timestamp
	$key_initial_timestamp = "initial_timestamp";
	$value_initial_timestamp = time();

	// field_key is for Price repeater
	$key_price_repeater = "field_56d77c14d2896";
	$value_price_repeater_rows = get_field( $key_price_repeater );

	// last price cron
	$key_price_last_cron_update = "price_last_cron_update";
	$value_price_last_cron_update = time();

	// field_key is for Version repeater
	$key_version_repeater = "field_56dd20144a472";
	$value_version_repeater_rows = get_field( $key_version_repeater ); // get all the rows

	// last version cron
	$key_version_last_cron_update = "version_last_cron_update";
	$value_version_last_cron_update = time();
	
?>