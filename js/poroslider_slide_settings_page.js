jQuery(document).ready(function() {
	
	//if jetpack has hi-jacked wp admin area, hide and remove
	jQuery('.jp-connect').hide();
	jQuery('.jp-connect').remove();
	//set variable for scroller/side navigation form validation
	var jcm_poros_side_nav = true;
	//determine variable value when dom is ready
	if(jQuery('#jcm_poros_side_nav_buttons_radio_id_1').val() == "Off"){
		jcm_poros_side_nav = false;
	}
	//change variable when radio buttons change (happens later than above, so values above will be overwritten)
	jQuery('#jcm_poros_side_nav_buttons_radio_id_1, #jcm_poros_side_nav_buttons_radio_id_2').change(function() {
		if(jcm_poros_side_nav == true){
			jcm_poros_side_nav = false;
		}else if(jcm_poros_side_nav == false) jcm_poros_side_nav = true;
	});
	jQuery('#jcm_poros_form').submit(function(event) {
		if(jcm_poros_side_nav == true && jQuery('#jcm_poros_v_scroller_id').val() != "None"){
				event.preventDefault();
				alert('Side Button Navigation with the Vertical Scroller is not supported for performance, implementation and stylistic reasons.  Please choose one or the other and submit again.');
				location.reload(true);
			}	
	});
});