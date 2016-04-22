<?php 

	$appInfo = 'http://itunes.apple.com/lookup?id='. $app_id .'';
	$appData = json_decode(file_get_contents($appInfo), true);
	$appDataEncoded = json_encode($appData);


	// $response = wp_remote_get( $appInfo );

 //                       // Check for error
	// if ( is_wp_error( $response ) ) {
	// 	return;
	// }

 //                // Parse remote HTML file
	// $dataResponse = wp_remote_retrieve_body( $response );


	$appCurrentTitle = $appData['results'][0]['trackName'];
	$appCurrentPrice = $appData['results'][0]['price'];
	$appCurrentVersion = $appData['results'][0]['version'];

	$appCurrentDescription = $appData['results'][0]['description'];
	$appCurrentDescription = json_encode($appCurrentDescription);
	$appCurrentDescription = wp_slash($appCurrentDescription);

	$appCurrentDevices = $appData['results'][0]['supportedDevices'];
	$appCurrentScreenShots = $appData['results'][0]['screenshotUrls'];
	$appCurrentIpadScreenShots = $appData['results'][0]['ipadScreenshotUrls'];
	$appCurrentArt60 = $appData['results'][0]['artworkUrl60'];
	$appCurrentArt100 = $appData['results'][0]['artworkUrl100'];
	$appCurrentArt512 = $appData['results'][0]['artworkUrl512'];
	$appCurrentArtistURL = $appData['results'][0]['artistViewUrl'];
	$appCurrentTrackURL = $appData['results'][0]['trackViewUrl'];
	$appCurrentReleased = $appData['results'][0]['releaseDate'];
	$appCurrentVersionReleased = $appData['results'][0]['currentVersionReleaseDate'];
	$appCurrentMinOS = $appData['results'][0]['minimumOsVersion'];
	$appCurrentSellerName = $appData['results'][0]['sellerName'];
	$appCurrentFeatures = $appData['results'][0]['features'];

	$appCurrentReleaseNotes = $appData['results'][0]['releaseNotes'];
	$appCurrentReleaseNotes = json_encode($appCurrentReleaseNotes);
	$appCurrentReleaseNotes = wp_slash($appCurrentReleaseNotes);

	$appCurrentGenres = $appData['results'][0]['genres'];

?>