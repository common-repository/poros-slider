jQuery(document).ready(function() {
	
			//if jetpack has hi-jacked wp admin area, hide and remove
			jQuery('.jp-connect').hide();
			jQuery('.jp-connect').remove();
			//for resizing thumbnails
			jQuery('.nailthumb-container').nailthumb();
			//declare variables to get the ids and names of the formfields to be used
			
			var imageFormfield;
			var imageFormID;
			// Start displaying and using the media upload boxes for images	/slides	
			jQuery('.jcm_poros_image_button').click(function() {
				imageFormID = jQuery(this).prev().attr('id');
 				imageFormfield = jQuery(imageFormID).attr('name');
 				tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 				return false;
				});		
			// Start displaying and using the media upload boxes for thumbnails			
			jQuery('.jcm_poros_thumbnail_button').click(function() {
				imageFormID = jQuery(this).prev().attr('id');
 				imageFormfield = jQuery(imageFormID).attr('name');
 				tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 				return false;				
				});				
				window.send_to_editor = function(html) {					
 					imgurl = jQuery('img',html).attr('src');
 					jQuery("#" + imageFormID).val(imgurl);
					tb_remove();
					jQuery('#jcm_poros_submit_button_id').trigger('click'); 	
				}
			//enumerate tr fields to get an idea of how many to hide/show later
			var trCount = 0;
			jQuery('tbody').children('tr').each(function() {
				trCount++;
			});				
			//set slideCounter variable for first time use and nearly impossible negative
			if(jcm_poros_slideCounter <= 0){
				jcm_poros_slideCounter = 1;
			}
			//some people thrive on superficiality and bank on the attitude that they could be more if there were more.  they don't know they just can't appreciate more.
			for(i=trCount; i > (5 * jcm_poros_slideCounter + 4); i=i-1){
				jQuery('tbody tr:nth-child(' + i + ')').hide();
				jQuery('tbody tr:nth-child(' + (i -1) + ')').hide();
				jQuery('tbody tr:nth-child(' + (i -2) + ')').hide();
				jQuery('tbody tr:nth-child(' + (i -3) + ')').hide();
				jQuery('tbody tr:nth-child(' + (i -4) + ')').hide();
							
			}
			//put in the button to add/show more slides (they are all loaded each time but hidden from view before the window.load event completes.
			jQuery('.submit').append("<a href='#' id='poros_admin_add_imageURL_text' >Add Another Slide</a>" +
			"<a href='#' class='poros_admin_add_imageURL' />");
			//loop through and add/show another section of options to/on the page.
			jQuery("#poros_admin_add_imageURL_text").click(jcmPorosAddOptions);
			jQuery(".poros_admin_add_imageURL").click(jcmPorosAddOptions);
			
			function jcmPorosAddOptions() {
				//scroll to bottom of page
				jQuery("html, body").animate({ scrollTop: jQuery(document).height() }, 500);
				//show the elements previously hidden
				for (i=1;i<6;i++){
					jQuery('tbody tr:nth-child(' + ((jcm_poros_slideCounter*5 + i)  ) + ')').show();
				}
				//increment the slide counter
				jcm_poros_slideCounter++;
			}						
							
			for(i=5;i<trCount;i=i+5){			
				jQuery('tbody tr:nth-child(' + i + ')').css('border-bottom', '1px solid #c9c9c9');
				}			
				
});