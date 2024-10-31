<?php

add_action('template_redirect', 'jcm_poros_add_css_js');

function jcm_poros_add_css_js() {
	global $jcm_poros_shortcode_page;
	//first 4 variables for slide array values	
	//only insert css into client side page if shortcode is on that page.
	if(is_page($jcm_poros_shortcode_page) || is_single($jcm_poros_shortcode_page)){
		wp_enqueue_style('frontendcss', plugin_dir_url( __FILE__ ).'../css/porostyle.css', false, 0.1, 'screen');
		wp_enqueue_script('jquery');
		wp_enqueue_script('poros-client-vars', plugin_dir_url( __FILE__ ).'../js/poroslider_vars.js');
		wp_enqueue_script('poros-client-js', plugin_dir_url( __FILE__ ).'../js/poros_client.js', array('poros-client-vars'));
	}	
}

?>