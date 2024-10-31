<?php
/*
 * A simple uninstall.  Deletion of all database values 
 * and permanent erasal of all local poros options.
 */
global $wpdb, $wp_query, $jcm_poros_slide_counter;
	
	//database value deletion for slide number.
	$wpdb->query($wpdb->prepare(
				"DELETE FROM $wpdb->options
					WHERE option_name = 'poros_caption_options'"));			
	//delete first use value
	$wpdb->query($wpdb->prepare(
				"DELETE FROM $wpdb->options
					WHERE option_name = 'poros_slide_settings'"));
	
	//delete saved message value
	$wpdb->query($wpdb->prepare(
				"DELETE FROM $wpdb->options
					WHERE option_name = 'poros_slide_uploads'"));
					
?>