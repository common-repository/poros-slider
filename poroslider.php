<?php
/*
Plugin Name: poroslider
Description: A slider with an optional side scroller and caption
Version: 1.0.1
Author: jleo2255
Author URI: http://URI_Of_The_Plugin_Author
License: GPL2
*/

/*  Copyright 2012  JAMES MCBRIDE  (email : jleo2525@hotmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

/*
 * The main plugin class, holds everything our plugin does,
 * initialized right after declaration
 */
 
register_activation_hook(__FILE__, 'jcm_poros_activate');

function jcm_poros_activate(){
	
}

if(is_admin()) {
	
	require_once(dirname(__FILE__).'/includes/porosadmin.php');
	
}

if(!is_admin()) {
	
	require_once(dirname(__FILE__).'/includes/porosclient.php');
	
}

/*
 * Add shortcode so show can be displayed on home page
 */

add_shortcode('poros_show', 'jcm_poros_shortcode');

//declaring variable with broader scrope for client side
$jcm_poros_shortcode_page;
function jcm_poros_shortcode() {
	
	global $jcm_poros_shortcode_page;
	$jcm_poros_shortcode_page = get_the_ID();
	
	//shortcode adds divs that jQuery fills on the client side.
	return '<div id="jcm_poros_container"><div id="jcm_poros_slide_show"><div id="jcm_poros_slide_caption"></div></div><div id="jcm_poros_thumb_slide"></div><a href="#" id="jcm_poros_downnav_next"></a><a href="#" id="jcm_poros_forwardnav_next"></a><a href="#" id="jcm_poros_backnav_back"></a></div>';
}

if(is_single($jcm_poros_shortcode_page) || is_page($jcm_poros_shortcode_page)){
	require_once(dirname(__FILE__).'/includes/porosclient.php');
	}

?>