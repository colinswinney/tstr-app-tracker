<?php

	// add custom Every Minute interval
	function thesoundtestroom_scehdule( $schedules ) {
		// Adds once every minute to the existing schedules.
	    $schedules['tstr_time'] = array(
		    'interval' => 300,
		    'display' => __( 'Once Every Five Minutes' )
	    );
	    return $schedules;
	}
	add_filter( 'cron_schedules', 'thesoundtestroom_scehdule' );



	// activate the cron event
	register_activation_hook( __FILE__, 'app_tracker_activation');
	function app_tracker_activation() {
		wp_schedule_event(time(), 'tstr-time', 'app_tracker_event');
	}

	add_action('app_tracker_event', 'app_tracker_event_task_to_do');



	// deactivate the cron event
	register_deactivation_hook( __FILE__, 'app_tracker_deactivation');
	function app_tracker_deactivation() {
		wp_clear_scheduled_hook('app_tracker_event');
	}

?>