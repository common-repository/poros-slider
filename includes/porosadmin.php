<?php

class Poros_Admin_Plugin {
	
	/*
	 * For easier overriding we declared the keys
	 * here as well as our tabs array which is populated
	 * when registering settings
	 */
	private $jcm_poros_slide_uploads_key = 'poros_slide_uploads';
	private $jcm_poros_caption_options_key = 'poros_caption_options';
	private $jcm_poros_slide_settings_key = 'poros_slide_settings';
	private $jcm_poros_plugin_options_key = 'jcm_poros_plugin_options';
	private $plugin_settings_tabs = array();
	
	/*
	 * Fired during plugins_loaded (very very early),
	 * so don't miss-use this, only actions and filters,
	 * current ones speak for themselves.
	 */
	function __construct() {
		add_action( 'init', array( &$this, 'load_settings' ) );
		add_action( 'admin_init', array( &$this, 'register_jcm_poros_slide_uploads' ) );		
		add_action( 'admin_init', array( &$this, 'register_jcm_poros_slide_settings' ) );
		add_action( 'admin_init', array( &$this, 'register_jcm_poros_caption_options' ) );
		add_action( 'admin_init', array( &$this, 'jcm_poros_script_style_includes' ) );
		add_action( 'admin_menu', array( &$this, 'add_admin_menus' ) );
	}
	
	/*
	 * Loads both the general and advanced settings from
	 * the database into their respective arrays. Uses
	 * array_merge to merge with default values if they're
	 * missing.
	 */
	function load_settings() {
		$this->jcm_poros_slide_uploads = (array) get_option( $this->jcm_poros_slide_uploads_key );
		$this->jcm_poros_slide_settings = (array) get_option( $this->jcm_poros_slide_settings_key );
		$this->jcm_poros_caption_options = (array) get_option( $this->jcm_poros_caption_options_key );
		
		
		// Merge with defaults
		$this->jcm_poros_slide_uploads = array_merge( array(
			'poros_slide_counter' => '1',
			'poros_slide_upload_1' => 'http://examplephotos/examplephoto.jpg',
			'poros_slide_upload_2' => '',
			'poros_slide_upload_3' => '',
			'poros_slide_upload_4' => '',
			'poros_slide_upload_5' => '',
			'poros_slide_upload_6' => '',
			'poros_slide_upload_7' => '',
			'poros_slide_upload_8' => '',
			'poros_slide_upload_9' => '',
			'poros_slide_upload_10' => '',
			'poros_slide_upload_11' => '',
			'poros_slide_upload_12' => '',
			'poros_slide_link_1' => '',
			'poros_slide_link_2' => '',
			'poros_slide_link_3' => '',
			'poros_slide_link_4' => '',
			'poros_slide_link_5' => '',
			'poros_slide_link_6' => '',
			'poros_slide_link_7' => '',
			'poros_slide_link_8' => '',
			'poros_slide_link_9' => '',
			'poros_slide_link_10' => '',
			'poros_slide_link_11' => '',
			'poros_slide_link_12' => '',
			'poros_link_option_1' => 'No Link',
			'poros_link_option_2' => 'No Link',
			'poros_link_option_3' => 'No Link',
			'poros_link_option_4' => 'No Link',
			'poros_link_option_5' => 'No Link',
			'poros_link_option_6' => 'No Link',
			'poros_link_option_7' => 'No Link',
			'poros_link_option_8' => 'No Link',
			'poros_link_option_9' => 'No Link',
			'poros_link_option_10' => 'No Link',
			'poros_link_option_11' => 'No Link',
			'poros_link_option_12' => 'No Link',
			'poros_thumbnail_upload_1' => '',
			'poros_thumbnail_upload_2' => '',
			'poros_thumbnail_upload_3' => '',
			'poros_thumbnail_upload_4' => '',
			'poros_thumbnail_upload_5' => '',
			'poros_thumbnail_upload_6' => '',
			'poros_thumbnail_upload_7' => '',
			'poros_thumbnail_upload_8' => '',
			'poros_thumbnail_upload_9' => '',
			'poros_thumbnail_upload_10' => '',
			'poros_thumbnail_upload_11' => '',
			'poros_thumbnail_upload_12' => '',
			'poros_caption_header_1' => 'Your Header Here',
			'poros_caption_header_2' => '',
			'poros_caption_header_3' => '',
			'poros_caption_header_4' => '',
			'poros_caption_header_5' => '',
			'poros_caption_header_6' => '',
			'poros_caption_header_7' => '',
			'poros_caption_header_8' => '',
			'poros_caption_header_9' => '',
			'poros_caption_header_10' => '',
			'poros_caption_header_11' => '',
			'poros_caption_header_12' => '',
			'poros_caption_text_1' => 'In et orci ac tellus dignissim ultricies nec at nunc. Suspendisse potenti. Duis id nulla augue, et mattis tellus.',
			'poros_caption_text_2' => '',
			'poros_caption_text_3' => '',
			'poros_caption_text_4' => '',
			'poros_caption_text_5' => '',
			'poros_caption_text_6' => '',
			'poros_caption_text_7' => '',
			'poros_caption_text_8' => '',
			'poros_caption_text_9' => '',
			'poros_caption_text_10' => '',
			'poros_caption_text_11' => '',
			'poros_caption_text_12' => ''
		), $this->jcm_poros_slide_uploads );
		
		$this->jcm_poros_slide_settings = array_merge( array(
			'poros_v_scroller' => 'Right',
			'poros_nav_option' => 'Off',
			'poros_side_nav_option' => 'Off',
			'poros_slide_dur' => '3',
			'poros_t_time' => '1',
			'poros_drop_shadow' => 'On',
			'poros_pause_on_hover' => 'Off'
		), $this->jcm_poros_slide_settings );
		
		$this->jcm_poros_caption_options = array_merge( array(
			'poros_caption_placement' => 'Bottom',
			'poros_caption_bkground_color' => '#000',
			'poros_caption_header_option' => 'On',
			'poros_header_color_option' => 'Theme Default',
			'poros_header_color' => '#c16',
			'poros_caption_text_option' => 'On',
			'poros_text_color_option' => 'Theme Default',
			'poros_text_color' => '#fff',
			'poros_font_family_option' => 'Theme Default',
			'poros_font_family' => 'Arial'
			
		), $this->jcm_poros_caption_options );
		
		
	}
	
	function jcm_poros_script_style_includes() {
		
		global $pagenow;
			//import style for all admin pages
			if ( $pagenow == 'admin.php' && $_GET['page'] == 'jcm_poros_plugin_options' ) {
				wp_enqueue_style('jcm_poros_admin_css', plugin_dir_url( __FILE__ ).'../css/porosadminstyle.css', false, 0.1, 'all');
			}
			//import scripts and styles for upload boxes on slide upload admin page
			if ( $pagenow == 'admin.php' && $_GET['tab'] == 'poros_slide_uploads' || $_GET['page'] == 'jcm_poros_plugin_options' && !$_GET['tab'] == 'poros_slide_settings' &&  !$_GET['tab'] == 'poros_caption_options') {
				wp_enqueue_script('media-upload');
				wp_enqueue_script('thickbox');
				wp_register_script('my-upload', WP_PLUGIN_URL.'/my-script.js', array('jquery','media-upload','thickbox'));
				wp_enqueue_script('my-upload');
				//for resizing thumbnail previews
				wp_enqueue_script('nailthumb', plugin_dir_url( __FILE__ ).'../js/jquery.nailthumb.1.1.min.js');
		
				wp_enqueue_style('thickbox');
				//for resizing thumbnail previews
				wp_enqueue_style('nailthumbcss', plugin_dir_url( __FILE__ ).'../css/porostyle.css', false, 0.1, 'screen');

				
				wp_enqueue_script('poros-upload-js-vars', plugin_dir_url( __FILE__ ).'../js/poroslider_upload_vars.js');
				wp_enqueue_script('poros-upload-js', plugin_dir_url( __FILE__ ).'../js/poroslider_upload_page.js', array('media-upload', 'thickbox', 'my-upload', 'poros-upload-js-vars'));
			}
			//import styles and scripts for caption options page, including farbastic color script
			if ( $pagenow == 'admin.php' && $_GET['tab'] == 'poros_caption_options' ) {
				wp_enqueue_style( 'farbtastic' );
  				wp_enqueue_script( 'farbtastic' );
				wp_enqueue_script('poros-caption-page-js', plugin_dir_url( __FILE__ ).'../js/poroslider_caption_options_page.js', array('farbtastic'));
			}
			//import styles and scripts for slide settings page--mainly for validation here.
			if ( $pagenow == 'admin.php' && $_GET['tab'] == 'poros_slide_settings'){
				wp_enqueue_script('poros-settings-page-js', plugin_dir_url( __FILE__ ).'../js/poroslider_slide_settings_page.js');
			}
	}
	
	/*
	 * Registers the general settings via the Settings API,
	 * appends the setting to the tabs array of the object.
	 */
	function register_jcm_poros_slide_uploads() {
		$this->plugin_settings_tabs[$this->jcm_poros_slide_uploads_key] = 'Slide Uploads';
		
		register_setting( $this->jcm_poros_slide_uploads_key, $this->jcm_poros_slide_uploads_key, array( &$this, 'jcm_poros_slide_uploads_validate' ) );
		add_settings_section( 'section_id1', 'Slide Uploads', array( &$this, 'section_poros_slide_uploads_desc' ), $this->jcm_poros_slide_uploads_key );
		
		for($i = 0; $i < 56; $i=$i+5) {
			//image number spans from 1 to 12
			$j++;
			//Add settings fields for options page'jcm_poros_caption_header_callback'
			add_settings_field('jcm_poros_field2_id' . (string)$i, 'Slide ' . (string)$j . ':', array( &$this, 'jcm_poros_imageURL_callback' ), $this->jcm_poros_slide_uploads_key, 'section_id1');
			add_settings_field('jcm_poros_field2_id' . (string)($i + 1), 'Thumbnail:', array( &$this, 'jcm_poros_thumbnail_callback' ), $this->jcm_poros_slide_uploads_key, 'section_id1');
			add_settings_field('jcm_poros_field2_id' . (string)($i + 2), 'Link:', array( &$this, 'jcm_poros_slide_link_callback' ), $this->jcm_poros_slide_uploads_key, 'section_id1');
			add_settings_field('jcm_poros_field2_id' . (string)($i + 3), 'Caption Header:', array( &$this, 'jcm_poros_caption_header_callback' ), $this->jcm_poros_slide_uploads_key, 'section_id1');
			add_settings_field('jcm_poros_field2_id' . (string)($i + 4), 'Caption Description:', array( &$this, 'jcm_poros_caption_text_callback' ), $this->jcm_poros_slide_uploads_key, 'section_id1');
		
		}
	}
	
	/*
	 * Registers the advanced settings and appends the
	 * key to the plugin settings tabs array.
	 */
	function register_jcm_poros_slide_settings() {
		$this->plugin_settings_tabs[$this->jcm_poros_slide_settings_key] = 'Slide Settings';
		
		register_setting( $this->jcm_poros_slide_settings_key, $this->jcm_poros_slide_settings_key, array( &$this, 'jcm_poros_slide_settings_validate' ) );
		add_settings_section( 'section_id2', 'Slide Settings', array( &$this, 'section_poros_slide_settings_desc' ), $this->jcm_poros_slide_settings_key);
		add_settings_field( 'jcm_poros_v_scroller_id', 'Vertical Scroller:', array( &$this, 'jcm_poros_vScroller_callback' ), $this->jcm_poros_slide_settings_key, 'section_id2' );
		add_settings_field( 'jcm_poros_v_nav_button_id', 'Vertical Nav Button:', array( &$this, 'jcm_poros_v_nav_button_callback' ), $this->jcm_poros_slide_settings_key, 'section_id2' );
		add_settings_field( 'jcm_poros_side_nav_buttons_id', 'Side Nav Buttons:', array( &$this, 'jcm_poros_side_nav_buttons_callback' ), $this->jcm_poros_slide_settings_key, 'section_id2' );
		add_settings_field( 'jcm_poros_slide_dur_id', 'Slide Duration:', array( &$this, 'jcm_poros_slide_duration_callback' ), $this->jcm_poros_slide_settings_key, 'section_id2' );
		add_settings_field( 'jcm_poros_t_time_id', 'Transition Time:', array( &$this, 'jcm_poros_t_time_callback' ), $this->jcm_poros_slide_settings_key, 'section_id2' );
		add_settings_field( 'jcm_poros_d_s_id', 'Drop Shadow:', array( &$this, 'jcm_poros_drop_shadow_callback' ), $this->jcm_poros_slide_settings_key, 'section_id2' );
		add_settings_field( 'jcm_poros_poh_id', 'Pause on Hover:', array( &$this, 'jcm_poros_pause_on_hover_callback' ), $this->jcm_poros_slide_settings_key, 'section_id2' );
		
	}
	
	/*
	 * Registers the advanced settings and appends the
	 * key to the plugin settings tabs array.
	 */
	function register_jcm_poros_caption_options() {
		$this->plugin_settings_tabs[$this->jcm_poros_caption_options_key] = 'Caption Options';
		
		register_setting( $this->jcm_poros_caption_options_key, $this->jcm_poros_caption_options_key, array( &$this, 'jcm_poros_caption_options_validate' ) );
		add_settings_section( 'section_id3', 'Caption Options', array( &$this, 'section_poros_caption_options_desc' ), $this->jcm_poros_caption_options_key );
		add_settings_field( 'jcm_poros_cap_placement_id', 'Caption Placement:', array( &$this, 'jcm_poros_caption_pos_callback' ), $this->jcm_poros_caption_options_key, 'section_id3' );
		add_settings_field( 'jcm_poros_bkground_color_id', 'Caption Background:', array( &$this, 'jcm_poros_background_color_callback' ),  $this->jcm_poros_caption_options_key, 'section_id3' );
		add_settings_field( 'jcm_poros_header_option_id', 'Caption Header:', array( &$this, 'jcm_poros_header_option_callback' ),  $this->jcm_poros_caption_options_key, 'section_id3' );
		add_settings_field( 'jcm_poros_header_color_id', 'Header Color:', array( &$this, 'jcm_poros_header_color_callback' ),  $this->jcm_poros_caption_options_key, 'section_id3' );
		add_settings_field( 'jcm_poros_text_option_id', 'Caption Description:', array( &$this, 'jcm_poros_text_option_callback' ),  $this->jcm_poros_caption_options_key, 'section_id3' );
		add_settings_field( 'jcm_poros_text_color_id', 'Text Color:', array( &$this, 'jcm_poros_text_color_callback' ),  $this->jcm_poros_caption_options_key, 'section_id3' );
		add_settings_field( 'jcm_poros_ff_id', 'Font Family:', array( &$this, 'jcm_poros_font_family_callback' ),  $this->jcm_poros_caption_options_key, 'section_id3' );
	}
	/*
	 * The following methods provide descriptions
	 * for their respective sections, used as callbacks
	 * with add_settings_section
	 */
	function section_poros_slide_uploads_desc() { 
		echo '<span style="margin-left:6px;">Upload your slides and caption here.  Thumbnails are optional (only if you want the vertical scroller).</span><br />';
	}
	function section_poros_slide_settings_desc() { 
		echo '<span style="margin-left:6px;">Make adjustments to the settings of your slide show here.</span>'; 
	}
	function section_poros_caption_options_desc() { 
		echo '<span style="margin-left:6px;">Specify the color, background and font for your caption text.</span><br />'; 
	}
	/*
	 * Slide and caption upload options..
	 * text input, note the name and value.
	 */
	private $jcm_poros_image_counter = 0;
	private $jcm_poros_slide_array = array();
	
	function jcm_poros_imageURL_callback() {
		$options = get_option($this->jcm_poros_slide_uploads_key);
		global $jcm_poros_image_counter;
		$jcm_poros_image_counter++;
	
		//add each slide upload URL to the array
		array_push($this->jcm_poros_slide_array, $this->jcm_poros_slide_uploads['poros_slide_upload_'.$jcm_poros_image_counter]);
	
	
		//will whitelist the array value in NAME so it is a useable array value.  
		//the actual value is created in the databe in the register_setting function
		//and is set by the user in the custom function below "jcm_poros_option_validate()"
		echo "<label for='jcm_poros_slide_upload_id_" . (string)$jcm_poros_image_counter . "'>
		<input id='jcm_poros_slide_upload_id_" . (string)$jcm_poros_image_counter . "' type='text' size='100' 
		name='poros_slide_uploads[poros_slide_upload_" . (string)$jcm_poros_image_counter ."]' 
		value='" . $this->jcm_poros_slide_array[$jcm_poros_image_counter - 1] . "' />
		<input id='jcm_poros_image_click" . (string)$jcm_poros_image_counter . "' class='jcm_poros_image_button' type='button' value='Upload Slide' /></label><br />";
		if(!empty($this->jcm_poros_slide_array[$jcm_poros_image_counter-1])){
    		//previews for images uploaded
			echo '<div style="margin-top:5px;" id="jcm_poros_upload_preview" class="nailthumb-container">  
        	<img src="'.$this->jcm_poros_slide_array[$jcm_poros_image_counter-1].'" /></div>  ';
			//note concerning images uploaded
			echo '<p style="float:left; color:#999 !important;">Preview only: does not reflect actual size or quality of image used in slideshow.</p>';
		}
	}
	/*
	 * Slide and caption upload options..
	 * text input, note the name and value.
	 */
	private $jcm_poros_thumb_counter = 0;
	private $jcm_poros_thumb_array = array();
	
	function jcm_poros_thumbnail_callback() {
		$options = get_option($this->jcm_poros_slide_uploads_key);
		global $jcm_poros_thumb_counter;
		$jcm_poros_thumb_counter++;
	
		//add each slide upload URL to the array
		array_push($this->jcm_poros_thumb_array, $this->jcm_poros_slide_uploads['poros_thumbnail_upload_'.$jcm_poros_thumb_counter]);
	
	
		//will whitelist the array value in NAME so it is a useable array value.  
		//the actual value is created in the databe in the register_setting function
		//and is set by the user in the custom function below "jcm_poros_option_validate()"
		echo "<label for='jcm_poros_thumbnail_upload_id_" . (string)$jcm_poros_thumb_counter . "'>
		<input id='jcm_poros_thumbnail_upload_id_" . (string)$jcm_poros_thumb_counter . "' type='text' size='100' 
		name='poros_slide_uploads[poros_thumbnail_upload_" . (string)$jcm_poros_thumb_counter ."]' 
		value='" . $this->jcm_poros_thumb_array[$jcm_poros_thumb_counter - 1] . "' />
		<input id='jcm_poros_thumbnail_click" . (string)$jcm_poros_thumb_counter . "' class='jcm_poros_thumbnail_button' type='button' value='Upload Thumbnail' /></label><br />";
    	
		echo "<p style='color:#999;'>Thumbnail Height and Width should be approximately 1/3 that of Slide (I will resize the remainder for you).</p>";
	}
	private $jcm_poros_link_counter = 0;
	private $jcm_poros_link_array = array();
	
	function jcm_poros_slide_link_callback() {
		global $jcm_poros_link_counter;
		$jcm_poros_link_counter++;
		
		array_push($this->jcm_poros_link_array, $this->jcm_poros_slide_uploads['poros_slide_link_'.$jcm_poros_link_counter]);
	
		echo "<input id='jcm_poros_slide_link_id" . (string)$jcm_poros_link_counter . "' 
		name='poros_slide_uploads[poros_slide_link_" . (string)$jcm_poros_link_counter ."]' size='100' type='text' 
		value='" . $this->jcm_poros_link_array[$jcm_poros_link_counter - 1] . "' /><br />";
		
		$jcm_poros_link_option = $this->jcm_poros_slide_uploads['poros_link_option_'.$jcm_poros_link_counter];
		
		$jcm_poros_radio_array = array();
		$jcm_poros_radio_array[0] = "No Link";
		$jcm_poros_radio_array[1] = "Open Link in Same Window";
		$jcm_poros_radio_array[2] = "Open Link in New Tab or Window";
		
		echo "<div id='jcm_poros_radio_link'>";
		for($i=0;$i<3;$i++){
			if($jcm_poros_radio_array[$i] == $jcm_poros_link_option){
				echo "<input class='jcm_poros_link_class' id='jcm_poros_link_id".$jcm_poros_link_counter."' type='radio' checked='checked' name='poros_slide_uploads[poros_link_option_".$jcm_poros_link_counter."]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			} else {
				echo "<input class='jcm_poros_link_class' id='jcm_poros_link_id".$jcm_poros_link_counter."' type='radio' name='poros_slide_uploads[poros_link_option_".$jcm_poros_link_counter."]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}
		}
		echo "</div>";
	}
	
	private $jcm_poros_header_counter = 0;
	private $jcm_poros_header_array = array();
	
	function jcm_poros_caption_header_callback() {
		global $jcm_poros_header_counter;
		$jcm_poros_header_counter++;
		
		array_push($this->jcm_poros_header_array, $this->jcm_poros_slide_uploads['poros_caption_header_'.$jcm_poros_header_counter]);
	
		echo "<input id='jcm_poros_caption_upload_id" . (string)$jcm_poros_header_counter . "' 
		name='poros_slide_uploads[poros_caption_header_" . (string)$jcm_poros_header_counter ."]' size='100' type='text' 
		value='" . $this->jcm_poros_header_array[$jcm_poros_header_counter - 1] . "' /><br />";
	}
	
	private $jcm_poros_text_counter = 0;
	private $jcm_poros_text_array = array();
	
	function jcm_poros_caption_text_callback() {
		global $jcm_poros_text_counter;
		$jcm_poros_text_counter++;
		
		array_push($this->jcm_poros_text_array, $this->jcm_poros_slide_uploads['poros_caption_text_'.$jcm_poros_text_counter]);
		
		echo "<textarea id='jcm_poros_text_upload_id" . (string)$jcm_poros_text_counter . "' 
		name='poros_slide_uploads[poros_caption_text_" . (string)$jcm_poros_text_counter ."]' 
		rows='5' cols='80'>" . $this->jcm_poros_text_array[$jcm_poros_text_counter - 1] . "</textarea>";	
	}
		
	/*
	 * vertical scroller callback function
	 * gets placement of vertical scroller if selected.
	 */
	function jcm_poros_vScroller_callback() {
		
		$jcm_poros_v_scroller = $this->jcm_poros_slide_settings['poros_v_scroller'];
		
		$jcm_poros_v_scroller_options = array();
		$jcm_poros_v_scroller_options[0] = "Right";
		$jcm_poros_v_scroller_options[1] = "Left";
		$jcm_poros_v_scroller_options[2] = "None";
		
		echo "<select id='jcm_poros_v_scroller_id' name='poros_slide_settings[poros_v_scroller]' style='width:65px;'>";
			for($i = 0; $i < 3; $i++){
				if($jcm_poros_v_scroller == $jcm_poros_v_scroller_options[$i]){
					echo "<option id='jcm_poros_v_scroller_selected_id' selected='selected' value='".$jcm_poros_v_scroller_options[$i]."'>".$jcm_poros_v_scroller_options[$i]."</option>";
				} else {
					echo "<option value='".$jcm_poros_v_scroller_options[$i]."'>".$jcm_poros_v_scroller_options[$i]."</option>";
			}
		}
		echo "</select><span style='margin-left:5px; font-style:italic;font-weight:bold;'>Side Navigation Buttons only work without Vertical Scroller.</span>";
		
	}
	
	/*
	 * nav button callback function gets whether
	 * button is turned on or off.
	 */
	 
	function jcm_poros_v_nav_button_callback() {
	
		$jcm_poros_nav_button_option = $this->jcm_poros_slide_settings['poros_nav_option'];
		
		$jcm_poros_radio_array = array();
		$jcm_poros_radio_array[0] = "On";
		$jcm_poros_radio_array[1] = "Off";
	
		for($i=0;$i<2;$i++){
			if($jcm_poros_radio_array[$i] == $jcm_poros_nav_button_option){
				echo "<input id='jcm_poros_nav_button_radio_id' type='radio' checked='checked' name='poros_slide_settings[poros_nav_option]' value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			} else {
				echo "<input id='jcm_poros_nav_button_radio_id2' type='radio' name='poros_slide_settings[poros_nav_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}
		}
	}
	
	/*
	 * side nav button callback function gets 
	 * whether button is turned on or off.
	 */
	 
	function jcm_poros_side_nav_buttons_callback() {
	
		$jcm_poros_side_nav_buttons_option = $this->jcm_poros_slide_settings['poros_side_nav_option'];
		
		$jcm_poros_radio_array = array();
		$jcm_poros_radio_array[0] = "On";
		$jcm_poros_radio_array[1] = "Off";
	
		for($i=0;$i<2;$i++){
			if($jcm_poros_radio_array[$i] == $jcm_poros_side_nav_buttons_option){
				echo "<input id='jcm_poros_side_nav_buttons_radio_id_1' type='radio' checked='checked' name='poros_slide_settings[poros_side_nav_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			} else {
				echo "<input id='jcm_poros_side_nav_buttons_radio_id_2' type='radio' name='poros_slide_settings[poros_side_nav_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}
		}
	}
	
	/*
	 * slide duration callback function gets the
	 * amount of time each slide lasts.
	 */
	
	function jcm_poros_slide_duration_callback() {
		
		$jcm_poros_slide_duration_val = $this->jcm_poros_slide_settings['poros_slide_dur'];
		
		echo "<input id='jcm_poros_slide_dur_id' name='poros_slide_settings[poros_slide_dur]' size='1' type='text' 				
	value='".$jcm_poros_slide_duration_val."' />   seconds<br />";
	}
	
	/*
	 * transitions time callback function gets the
	 * amount of time each transition lasts.
	 */
	 
	function jcm_poros_t_time_callback() {
		
		$jcm_poros_t_time_val = $this->jcm_poros_slide_settings['poros_t_time'];
		
		echo "<input id='jcm_poros_t_time_id' name='poros_slide_settings[poros_t_time]' size='1' type='text' 				
	value='".$jcm_poros_t_time_val."' />   seconds<br />";
	}
	
	/*
	 * drop shadow callback function gets whether
	 * drop shadow is turned on or off.
	 */
	 
	function jcm_poros_drop_shadow_callback() {
		
		$jcm_poros_drop_shadow_option = $this->jcm_poros_slide_settings['poros_drop_shadow'];
		
		$jcm_poros_radio_array = array();
		$jcm_poros_radio_array[0] = "On";
		$jcm_poros_radio_array[1] = "Off";
	
		for($i=0;$i<2;$i++){
			if($jcm_poros_radio_array[$i] == $jcm_poros_drop_shadow_option){
				echo "<input id='jcm_poros_drop_shadow_radio_id' type='radio' checked='checked' name='poros_slide_settings[poros_drop_shadow]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			} else {
				echo "<input id='jcm_poros_drop_shadow_radio_id2' type='radio' name='poros_slide_settings[poros_drop_shadow]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}
		}
	}
	
	/*
	 * pause on hover call back gets whether
	 * pause on hover is turned on or off.
	 */
	 
	function jcm_poros_pause_on_hover_callback() {
		
		$jcm_poros_poh_option = $this->jcm_poros_slide_settings['poros_pause_on_hover'];
		
		$jcm_poros_radio_array = array();
		$jcm_poros_radio_array[0] = "On";
		$jcm_poros_radio_array[1] = "Off";
	
		for($i=0;$i<2;$i++){
			if($jcm_poros_radio_array[$i] == $jcm_poros_poh_option){
				echo "<input id='jcm_poros_poh_radio_id' type='radio' checked='checked' name='poros_slide_settings[poros_pause_on_hover]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			} else {
				echo "<input id='jcm_poros_poh_radio_id2' type='radio' name='poros_slide_settings[poros_pause_on_hover]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}
		}
	}
	
	
	/*
	 * Caption Options field callback functions.
	 */
	function jcm_poros_caption_pos_callback() {
		$jcm_poros_caption_pos = $this->jcm_poros_caption_options['poros_caption_placement'];
		
		$jcm_poros_caption_pos_options = array();
		$jcm_poros_caption_pos_options[0] = "Top";
		$jcm_poros_caption_pos_options[1] = "Bottom";
		$jcm_poros_caption_pos_options[2] = "None";
		
		echo "<select id='jcm_poros_caption_placement_id' name='poros_caption_options[poros_caption_placement]' style='width:70px;'>";
			for($i = 0; $i < 3; $i++){
				if($jcm_poros_caption_pos == $jcm_poros_caption_pos_options[$i]){
					echo "<option selected='selected' value='".$jcm_poros_caption_pos_options[$i]."'>".$jcm_poros_caption_pos_options[$i]."</option>";
				} else {
					echo "<option value='".$jcm_poros_caption_pos_options[$i]."'>".$jcm_poros_caption_pos_options[$i]."</option>";
			}
		}
		echo "</select>";
	}
	
	function jcm_poros_background_color_callback() {
		$jcm_poros_bkground_color = $this->jcm_poros_caption_options['poros_caption_bkground_color'];		
	
		echo "<label for='jcm_poros_bkground_color_id'><input type='text' id='jcm_poros_bkground_color_id' name='poros_caption_options[poros_caption_bkground_color]' 
		value='".$jcm_poros_bkground_color."' /></label>";
    	echo "<div id='jcm_poros_bkground_color_farb_id'></div>";
	}
	
	function jcm_poros_header_option_callback() {
		$jcm_poros_caption_header_option = $this->jcm_poros_caption_options['poros_caption_header_option'];
		
		$jcm_poros_radio_array = array();
		$jcm_poros_radio_array[0] = "On";
		$jcm_poros_radio_array[1] = "Off";
	
		for($i=0;$i<2;$i++){
			if($jcm_poros_radio_array[$i] == $jcm_poros_caption_header_option){
				echo "<input id='jcm_poros_caption_header_radio_id' type='radio' checked='checked' name='poros_caption_options[poros_caption_header_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			} else {
				echo "<input id='jcm_poros_caption_header_radio_id2' type='radio' name='poros_caption_options[poros_caption_header_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}
		}
	}
	
	function jcm_poros_header_color_callback() {
		$jcm_poros_header_color_option = $this->jcm_poros_caption_options['poros_header_color_option'];
		$jcm_poros_header_color = $this->jcm_poros_caption_options['poros_header_color'];
		
		$jcm_poros_radio_array = array();
		$jcm_poros_radio_array[0] = "Theme Default";
		$jcm_poros_radio_array[1] = "Custom";
	
		for($i=0;$i<2;$i++){
			if($jcm_poros_radio_array[$i] == $jcm_poros_header_color_option){
				echo "<input id='jcm_poros_header_color_radio_id' type='radio' checked='checked' name='poros_caption_options[poros_header_color_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}else{
				echo "<input id='jcm_poros_header_color_radio_id2' type='radio' name='poros_caption_options[poros_header_color_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}
		}
		echo "<label for='jcm_poros_header_color_id'><input type='text' id='jcm_poros_header_color_id' name='poros_caption_options[poros_header_color]' 
		value='".$jcm_poros_header_color."' /></label>";
    	echo "<div id='jcm_poros_header_color_farb_id'></div>";
	}
	
	function jcm_poros_text_option_callback() {
		$jcm_poros_caption_text_option = $this->jcm_poros_caption_options['poros_caption_text_option'];
		
		$jcm_poros_radio_array = array();
		$jcm_poros_radio_array[0] = "On";
		$jcm_poros_radio_array[1] = "Off";
	
		for($i=0;$i<2;$i++){
			if($jcm_poros_radio_array[$i] == $jcm_poros_caption_text_option){
				echo "<input id='jcm_poros_caption_text_radio_id' type='radio' checked='checked' name='poros_caption_options[poros_caption_text_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			} else {
				echo "<input id='jcm_poros_caption_text_radio_id2' type='radio' name='poros_caption_options[poros_caption_text_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}
		}
	}
	
	function jcm_poros_text_color_callback() {
		$jcm_poros_text_color_option = $this->jcm_poros_caption_options['poros_text_color_option'];
		$jcm_poros_text_color = $this->jcm_poros_caption_options['poros_text_color'];
		
		$jcm_poros_radio_array = array();
		$jcm_poros_radio_array[0] = "Theme Default";
		$jcm_poros_radio_array[1] = "Custom";
	
		for($i=0;$i<2;$i++){
			if($jcm_poros_radio_array[$i] == $jcm_poros_text_color_option){
				echo "<input id='jcm_poros_text_color_radio_id' type='radio' checked='checked' name='poros_caption_options[poros_text_color_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}else{
				echo "<input id='jcm_poros_text_color_radio_id2' type='radio' name='poros_caption_options[poros_text_color_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}
		}
		echo "<label for='jcm_poros_text_color_id'><input type='text' id='jcm_poros_text_color_id' name='poros_caption_options[poros_text_color]' 
		value='".$jcm_poros_text_color."' /></label>";
    	echo "<div id='jcm_poros_text_color_farb_id'></div>";
	}
	
	function jcm_poros_font_family_callback() {
		$jcm_poros_font_family_option = $this->jcm_poros_caption_options['poros_font_family_option'];
		$jcm_poros_font_family = $this->jcm_poros_caption_options['poros_font_family'];
		
		$jcm_poros_radio_array = array();
		$jcm_poros_radio_array[0] = "Theme Default";
		$jcm_poros_radio_array[1] = "Custom";
	
		for($i=0;$i<2;$i++){
			if($jcm_poros_radio_array[$i] == $jcm_poros_font_family_option){
				echo "<input id='jcm_poros_font_family_radio_id' type='radio' checked='checked' name='poros_caption_options[poros_font_family_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}else{
				echo "<input id='jcm_poros_font_family_radio_id2' type='radio' name='poros_caption_options[poros_font_family_option]' 
				value='".$jcm_poros_radio_array[$i]."'> ".$jcm_poros_radio_array[$i]."<br>";
			}
		}
		echo "<input type='text' id='jcm_poros_font_family_id' name='poros_caption_options[poros_font_family]' 
		value='".$jcm_poros_font_family."' /></label>";
	}
	
	/*
	 * Called during admin_menu, adds an options
	 * page under Settings called My Settings, rendered
	 * using the plugin_options_page method.
	 */
	function add_admin_menus() {
		add_menu_page( 'Poros Slider', 'Poros Slider', 'manage_options', $this->jcm_poros_plugin_options_key, array( &$this, 'plugin_options_page' ), plugin_dir_url( __FILE__ ).'../assets/images/poros_logo.png', 100.51 );
	}
	
	/*
	 * Plugin Options page rendering goes here, checks
	 * for active tab and replaces key with the related
	 * settings key. Uses the plugin_options_tabs method
	 * to render the tabs.
	 */
	function plugin_options_page() {
		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->jcm_poros_slide_uploads_key;
		?>
		<div class="wrap">
			<?php $this->plugin_options_tabs(); ?>
			<form method="post" action="options.php" id="jcm_poros_form">
				<?php wp_nonce_field( 'update-options' ); ?>
				<?php settings_fields( $tab ); ?>
				<?php do_settings_sections( $tab ); ?>
				<?php submit_button('Save Changes', 'primary', 'jcm_poros_submit_button_id'); ?>
			</form>
		</div>
		<?php
	}
	
	/*
	 * Renders our tabs in the plugin options page,
	 * walks through the object's tabs array and prints
	 * them one by one. Provides the heading for the
	 * plugin_options_page method.
	 */
	function plugin_options_tabs() {
		$current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->jcm_poros_slide_uploads_key;

		screen_icon();
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $this->plugin_settings_tabs as $tab_key => $tab_caption ) {
			$active = $current_tab == $tab_key ? 'nav-tab-active' : '';
			echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->jcm_poros_plugin_options_key . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';	
		}
		echo '</h2>';
	}
	
	
	
	/*
	 *Validation functions to execute when forms are submitted.
	 *Okay to create database values and other permanent values
	 *here if needed.
	 */
	 //create a thumbnail array to store urls created in this function
	 private $jcm_poros_thumbnail_array = array();
	
	function jcm_poros_slide_uploads_validate($input) {
		$new_jcm_poros_slide_counter = 0;
		$options = get_option($this->jcm_poros_slide_uploads_key);
		//set values for slide uploads, caption uploads and slide counter
		for ($i=1;$i<13;$i++){
			$options['poros_slide_upload_'.(string)$i] = trim($input['poros_slide_upload_'.(string)$i]);
			$options['poros_thumbnail_upload_'.(string)$i] = trim($input['poros_thumbnail_upload_'.(string)$i]);
			$options['poros_slide_link_'.(string)$i] = trim($input['poros_slide_link_'.(string)$i]);
			$options['poros_link_option_'.(string)$i] = trim($input['poros_link_option_'.(string)$i]);
			$options['poros_caption_header_'.(string)$i] = trim($input['poros_caption_header_'.(string)$i]);
			$options['poros_caption_text_'.(string)$i] = trim($input['poros_caption_text_'.(string)$i]);
				
			if(!empty($options['poros_slide_upload_'.(string)$i])) {	
				$new_jcm_poros_slide_counter++;				
			} else break;
			
		}
		//get width and height of first slide.  this is for sizing of slide and later thumbnail as well.
		if(!empty($options['poros_slide_upload_1'])){
			list($width, $height) = getimagesize($options['poros_slide_upload_1']);

			$jcm_poros_image_width = $width;
			$jcm_poros_image_height = $height;
		} else {
			$jcm_poros_image_width = false;
			$jcm_poros_image_height = false;
		}
		//begin writing to a master list of javascript variables for the client
		if(!$new_jcm_poros_slide_counter == 0){
			$options['poros_slide_counter'] = $new_jcm_poros_slide_counter;
		}
		//write slide and caption upload paths and text to a file for client side use later
		$jcm_poros_upload_vars = dirname(__FILE__).'../../js/poroslider_upload_vars.js';
		$fh = fopen($jcm_poros_upload_vars, 'w') or die("can't open file");
		fwrite($fh, "var jcm_poros_slideCounter = ".$new_jcm_poros_slide_counter.";\n");
		if(!$jcm_poros_image_width == false && !$jcm_poros_image_height == false){
			fwrite($fh, "var jcm_poros_slideWidth = ".$jcm_poros_image_width.";\n");
			fwrite($fh, "var jcm_poros_slideHeight = ".$jcm_poros_image_height.";\n");
		} 
		fwrite($fh, "var jcm_poros_slideArray = new Array();\n");
		fwrite($fh, "var jcm_poros_thumbArray = new Array();\n");
		fwrite($fh, "var jcm_poros_headerArray = new Array();\n");
		fwrite($fh, "var jcm_poros_textArray = new Array();\n");
		fwrite($fh, "var jcm_poros_linkArray = new Array();\n");
		fwrite($fh, "var jcm_poros_linkOptionArray = new Array();\n");
		for($i=0;$i<$new_jcm_poros_slide_counter;$i++){
			$jcm_poros_string_data = "jcm_poros_slideArray.push('".$options['poros_slide_upload_'.($i+1)]."');\n";
			fwrite($fh, $jcm_poros_string_data);	
			$jcm_poros_string_data = "jcm_poros_linkArray.push('".$options['poros_slide_link_'.($i+1)]."');\n";
			fwrite($fh, $jcm_poros_string_data);	
			$jcm_poros_string_data = "jcm_poros_linkOptionArray.push('".$options['poros_link_option_'.($i+1)]."');\n";
			fwrite($fh, $jcm_poros_string_data);
			$jcm_poros_string_data = "jcm_poros_thumbArray.push('".$options['poros_thumbnail_upload_'.($i+1)]."');\n";
			fwrite($fh, $jcm_poros_string_data);	
			$jcm_poros_string_data = "jcm_poros_headerArray.push('".$options['poros_caption_header_'.($i+1)]."');\n";
			fwrite($fh, $jcm_poros_string_data);	
			$jcm_poros_string_data = "jcm_poros_textArray.push('".$options['poros_caption_text_'.($i+1)]."');\n";
			fwrite($fh, $jcm_poros_string_data);
		}
				
		fclose($fh);
		
		$jcm_poros_vars = dirname(__FILE__).'../../js/poroslider_vars.js';
		$jcm_poros_caption_vars = dirname(__FILE__).'../../js/poroslider_caption_options_vars.js';
		$jcm_poros_ss_vars = dirname(__FILE__).'../../js/poroslider_slide_settings_vars.js';
		$jcm_poros_upload_content = file_get_contents($jcm_poros_upload_vars);
		//slide settings content
		$jcm_poros_ss_content = file_get_contents($jcm_poros_ss_vars);
		$jcm_poros_caption_content = file_get_contents($jcm_poros_caption_vars);
		$fh = fopen($jcm_poros_vars, 'w') or die("can't open file");
		file_put_contents($jcm_poros_vars, $jcm_poros_upload_content, FILE_APPEND);
		file_put_contents($jcm_poros_vars, $jcm_poros_ss_content, FILE_APPEND);
		file_put_contents($jcm_poros_vars, $jcm_poros_caption_content, FILE_APPEND);
		
		fclose($fh);
		
		
		return $options;
	}
	
	function jcm_poros_slide_settings_validate($input) {
		
		$options = get_option($this->jcm_poros_slide_settings_key);
		//set options for slide settings
		$options['poros_v_scroller'] = trim($input['poros_v_scroller']);	
		$options['poros_nav_option'] = trim($input['poros_nav_option']);	
		$options['poros_side_nav_option'] = trim($input['poros_side_nav_option']);	
		$options['poros_slide_dur'] = trim($input['poros_slide_dur']);
		$options['poros_t_time'] = trim($input['poros_t_time']);
		$options['poros_drop_shadow'] = trim($input['poros_drop_shadow']);
		$options['poros_pause_on_hover'] = trim($input['poros_pause_on_hover']);
		//write slide settings options to .js file so vars can be accessed by client
		$jcm_poros_ss_vars = dirname(__FILE__).'../../js/poroslider_slide_settings_vars.js';
		$fh = fopen($jcm_poros_ss_vars, 'w') or die("can't open file");
		fwrite($fh, "var jcm_poros_scrollOrient = '".$options['poros_v_scroller']."';\n");
		fwrite($fh, "var jcm_poros_navOption = '".$options['poros_nav_option']."';\n");
		fwrite($fh, "var jcm_poros_side_navOption = '".$options['poros_side_nav_option']."';\n");
		fwrite($fh, "var jcm_poros_slideDuration = ".$options['poros_slide_dur']." * 1000;\n");
		fwrite($fh, "var jcm_poros_transitionTime = ".$options['poros_t_time']." * 1000;\n");
		fwrite($fh, "var jcm_poros_dropShadow = '".$options['poros_drop_shadow']."';\n");
		fwrite($fh, "var jcm_poros_pauseOnHover = '".$options['poros_pause_on_hover']."';\n");
		
		fclose($fh);
		
		//on submit, open main .js file anew (wiped clean) and append all three settings and upload files to it.
		$jcm_poros_vars = dirname(__FILE__).'../../js/poroslider_vars.js';
		$jcm_poros_caption_vars = dirname(__FILE__).'../../js/poroslider_caption_options_vars.js';
		$jcm_poros_upload_vars = dirname(__FILE__).'../../js/poroslider_upload_vars.js';
		$jcm_poros_upload_content = file_get_contents($jcm_poros_upload_vars);
		//slide settings content
		$jcm_poros_ss_content = file_get_contents($jcm_poros_ss_vars);
		$jcm_poros_caption_content = file_get_contents($jcm_poros_caption_vars);
		$fh = fopen($jcm_poros_vars, 'w') or die("can't open file");
		file_put_contents($jcm_poros_vars, $jcm_poros_upload_content, FILE_APPEND);
		file_put_contents($jcm_poros_vars, $jcm_poros_ss_content, FILE_APPEND);
		file_put_contents($jcm_poros_vars, $jcm_poros_caption_content, FILE_APPEND);
		
		fclose($fh);
		
		
		return $options;
	}
	
	function jcm_poros_caption_options_validate($input) {
		$options = get_option($this->jcm_poros_caption_options_key);
		//set options for caption
		$options['poros_caption_placement'] = trim($input['poros_caption_placement']);	
		$options['poros_caption_bkground_color'] = trim($input['poros_caption_bkground_color']);
		$options['poros_caption_header_option'] = trim($input['poros_caption_header_option']);
		$options['poros_header_color_option'] = trim($input['poros_header_color_option']);
		$options['poros_header_color'] = trim($input['poros_header_color']);
		$options['poros_caption_text_option'] = trim($input['poros_caption_text_option']);
		$options['poros_text_color_option'] = trim($input['poros_text_color_option']);
		$options['poros_text_color'] = trim($input['poros_text_color']);
		$options['poros_font_family_option'] = trim($input['poros_font_family_option']);
		$options['poros_font_family'] = trim($input['poros_font_family']);
		
		/*
	 	* Creates RGB values based on hex input for 
	 	* creating the color for our caption bkground
	 	* png. 
	 	* Output: hex2RGB("#FF0") -> array( poros_red =>255, poros_green => 255, poros_blue => 0)
		* Also avoid redclaring function in function by using !function_exists
	 	*/
		if (!function_exists(hex2RGB)){
			function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    			$hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    			$rgbArray = array();
    			if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        			$colorVal = hexdec($hexStr);
       				$rgbArray['poros_red'] = 0xFF & ($colorVal >> 0x10);
        			$rgbArray['poros_green'] = 0xFF & ($colorVal >> 0x8);
        			$rgbArray['poros_blue'] = 0xFF & $colorVal;
    			} elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        			$rgbArray['poros_red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        			$rgbArray['poros_green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        			$rgbArray['poros_blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    			} else {
        			return false; //Invalid hex color code
    			}
    			return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
			} 
		}
		//get var for bkground caption color and set it as array values
		$jcm_poros_bkground_array = hex2RGB($options['poros_caption_bkground_color']);
		//create image based on png file for caption_background
		$im = imagecreatefrompng(dirname(__FILE__).'../../assets/images/caption_background.fw.png');
		imagealphablending($im, false);
		imagesavealpha($im, true);

		//apply an alpha layer overlay and specify the color, then fill with the overlay value
		$trans_layer_overlay = imagecolorallocatealpha($im, $jcm_poros_bkground_array['poros_red'], $jcm_poros_bkground_array['poros_green'], $jcm_poros_bkground_array['poros_blue'], 25);
		imagefill($im, 0, 0, $trans_layer_overlay);

		//save to the specified file
		imagepng($im, dirname(__FILE__).'../../assets/images/caption_background.fw.png');
		imagedestroy($im);
		
		//write caption options to .js file so vars can be accessed by client
		$jcm_poros_caption_vars = dirname(__FILE__).'../../js/poroslider_caption_options_vars.js';
		$fh = fopen($jcm_poros_caption_vars, 'w') or die("can't open file");
		fwrite($fh, "var jcm_poros_capPos = '".$options['poros_caption_placement']."';\n");
		fwrite($fh, "var jcm_poros_headerColorOption = '".$options['poros_header_color_option']."';\n");
		fwrite($fh, "var jcm_poros_textColorOption = '".$options['poros_text_color_option']."';\n");
		fwrite($fh, "var jcm_poros_fontFamilyOption = '".$options['poros_font_family_option']."';\n");
		fwrite($fh, "var jcm_poros_headerColor = '".$options['poros_header_color']."';\n");
		fwrite($fh, "var jcm_poros_textColor = '".$options['poros_text_color']."';\n");
		fwrite($fh, "var jcm_poros_fontFamilyVal = '".$options['poros_font_family']."';\n");
		fwrite($fh, "var jcm_poros_caption_headerOption = '".$options['poros_caption_header_option']."';\n");
		fwrite($fh, "var jcm_poros_caption_textOption = '".$options['poros_caption_text_option']."';\n");
		//$options['poros_caption_header_option']
		fclose($fh);
		
		//on submit, open main .js file anew (wiped clean) and append all three settings and upload files to it.
		$jcm_poros_vars = dirname(__FILE__).'../../js/poroslider_vars.js';
		
		$jcm_poros_ss_vars = dirname(__FILE__).'../../js/poroslider_slide_settings_vars.js';
		$jcm_poros_upload_vars = dirname(__FILE__).'../../js/poroslider_upload_vars.js';
		$jcm_poros_upload_content = file_get_contents($jcm_poros_upload_vars);
		//slide settings content
		$jcm_poros_ss_content = file_get_contents($jcm_poros_ss_vars);
		$jcm_poros_caption_content = file_get_contents($jcm_poros_caption_vars);
		$fh = fopen($jcm_poros_vars, 'w') or die("can't open file");
		file_put_contents($jcm_poros_vars, $jcm_poros_upload_content, FILE_APPEND);
		file_put_contents($jcm_poros_vars, $jcm_poros_ss_content, FILE_APPEND);
		file_put_contents($jcm_poros_vars, $jcm_poros_caption_content, FILE_APPEND);
		
		fclose($fh);
		
		return $options;
	}
	
};

// Initialize the plugin
add_action( 'plugins_loaded', create_function( '', '$poros_admin_plugin = new Poros_Admin_Plugin;' ) );