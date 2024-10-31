jQuery(document).ready(function() {

//if jetpack has hi-jacked wp admin area, hide and remove
	jQuery('.jp-connect').hide();
	jQuery('.jp-connect').remove();
//hide then show/toggle the farbastic color picker for the background color
			jQuery('#jcm_poros_bkground_color_farb_id').hide();
    		jQuery('#jcm_poros_bkground_color_farb_id').farbtastic("#jcm_poros_bkground_color_id");
    		jQuery("#jcm_poros_bkground_color_id").click(function(){jQuery('#jcm_poros_bkground_color_farb_id').slideToggle()});
			//hide then show/toggle the farbastic color picker for the header caption
			jQuery('#jcm_poros_header_color_farb_id').hide();
    		jQuery('#jcm_poros_header_color_farb_id').farbtastic("#jcm_poros_header_color_id");
    		jQuery("#jcm_poros_header_color_id").click(function(){jQuery('#jcm_poros_header_color_farb_id').slideToggle()});
			//hide then show/toggle the farbastic color picker for the text caption
			jQuery('#jcm_poros_text_color_farb_id').hide();
    		jQuery('#jcm_poros_text_color_farb_id').farbtastic("#jcm_poros_text_color_id");
    		jQuery("#jcm_poros_text_color_id").click(function(){jQuery('#jcm_poros_text_color_farb_id').slideToggle()});
			
			//hide the color picker when the default theme option is checked for the header and text.  Also hide/show the option for the font family.
			if(jQuery('#jcm_poros_header_color_radio_id').attr("checked") != "undefined" && jQuery('#jcm_poros_header_color_radio_id').val() == "Theme Default"){
				jQuery("#jcm_poros_header_color_id").hide();
			}	
			if(jQuery('#jcm_poros_text_color_radio_id').attr("checked") != "undefined" && jQuery('#jcm_poros_text_color_radio_id').val() == "Theme Default"){
				jQuery("#jcm_poros_text_color_id").hide();
			}	
			if(jQuery('#jcm_poros_font_family_radio_id').attr("checked") != "undefined" && jQuery('#jcm_poros_font_family_radio_id').val() == "Theme Default"){
				jQuery("#jcm_poros_font_family_id").hide();
			}	
			jQuery('#jcm_poros_header_color_radio_id, #jcm_poros_header_color_radio_id2').change(function(){jQuery("#jcm_poros_header_color_id").slideToggle()});
			jQuery('#jcm_poros_text_color_radio_id, #jcm_poros_text_color_radio_id2').change(function(){jQuery("#jcm_poros_text_color_id").slideToggle()});
			//jcm_poros_font_family_radio_id
			jQuery('#jcm_poros_font_family_radio_id, #jcm_poros_font_family_radio_id2').change(function(){jQuery("#jcm_poros_font_family_id").slideToggle()});
			
});