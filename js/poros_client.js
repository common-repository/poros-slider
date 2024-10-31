jQuery(document).ready(function() {
	/*
	 *set variables for css attributes, including width and height of slides and thumbnails, radio options in admin area relating to client     *options and more.
	*/
	var jcm_poros_thumbWidth = jcm_poros_slideWidth/3;
	var jcm_poros_thumbHeight = jcm_poros_slideHeight/3;
	if(jcm_poros_scrollOrient=="None"){
	jcm_poros_thumbWidth = 0;
	jcm_poros_thumbHeight=0;
	}
	//set the width for the entire show container by adding widths of image elements
	var jcm_poros_showWidth = jcm_poros_slideWidth + jcm_poros_thumbWidth;
	//set css properties using above values
	//for container
	jQuery('#jcm_poros_container').css("width", jcm_poros_showWidth);
	//caption width same as slides
	//caption height differs according to selected conditions
	jQuery('#jcm_poros_slide_caption').css("width", jcm_poros_slideWidth);
	//set size for caption background based on selected conditions
	if(jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'On'){
		jQuery('#jcm_poros_slide_caption p').css("margin-top", "33px");
		jQuery('#jcm_poros_slide_caption').css("height", "70px");
	}else if (jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'Off'){
		jQuery('#jcm_poros_slide_caption').css("height", "45px");
	}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'On'){
		jQuery('#jcm_poros_slide_caption').css("padding-top", "5px");
		jQuery('#jcm_poros_slide_caption').css("height", "43px");
	}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'Off'){
		jQuery('#jcm_poros_slide_caption').css("height", "70px");
	}
	//for slides
	jQuery('#jcm_poros_slide_show').css({"width" : jcm_poros_slideWidth, "height" : jcm_poros_slideHeight});
	//for thumbs
	jQuery('#jcm_poros_thumb_slide').css({"width" : jcm_poros_thumbWidth-1, "height" : (jcm_poros_thumbHeight*3)});
	//
	jQuery("#jcm_poros_forwardnav_next").hide();
	jQuery("#jcm_poros_backnav_back").hide();
	//position for scroll button and css positioning properties.. conditional based on right or left placement
	//set orientation of vertical scroller
	if(jcm_poros_scrollOrient == "Right") {
		jQuery('#jcm_poros_slide_show, #jcm_poros_thumb_slide').css("float", "left");
		
			jQuery('#jcm_poros_downnav_next').hide();
			
			jQuery('#jcm_poros_container').hover(function()
			{
				jQuery('#jcm_poros_downnav_next').fadeIn(600);
				jQuery('#jcm_poros_downnav_next').css({"left" : jcm_poros_slideWidth+jcm_poros_thumbWidth-(jcm_poros_thumbWidth/2 + 25), "top" : jcm_poros_slideHeight-40});	
			},function()
			{
				jQuery('#jcm_poros_downnav_next').fadeOut(600);
			});
			if(jcm_poros_side_navOption == "On") {
		jQuery('#jcm_poros_container').hover(function()
			{
				
				jQuery('#jcm_poros_forwardnav_next').fadeIn(600);
				jQuery('#jcm_poros_forwardnav_next').css({"left" : jcm_poros_slideWidth-48, "top" : jcm_poros_slideHeight/2-40});	
			},function()
			{
				jQuery('#jcm_poros_forwardnav_next').fadeOut(600);
			});
	jQuery('#jcm_poros_container').hover(function()
			{
				
				jQuery('#jcm_poros_backnav_back').fadeIn(600);
				jQuery('#jcm_poros_backnav_back').css({"left" : 0, "top" : jcm_poros_slideHeight/2-40});	
			},function()
			{
				jQuery('#jcm_poros_backnav_back').fadeOut(600);
			});
	}
	//ir the vertical navigation is on the left, add some css and properties for the optional nav button(s)
	} else if (jcm_poros_scrollOrient == "Left") {
		jQuery('#jcm_poros_slide_show, #jcm_poros_thumb_slide').css("float", "right");
		
		jQuery('#jcm_poros_downnav_next').hide();
		
		jQuery('#jcm_poros_container').hover(function()
		{
			jQuery('#jcm_poros_downnav_next').fadeIn(600);
			jQuery('#jcm_poros_downnav_next').css({"left" : jcm_poros_thumbWidth-(jcm_poros_thumbWidth/2 + 25), "top" : jcm_poros_slideHeight-40});
		},function()
		{
			jQuery('#jcm_poros_downnav_next').fadeOut(600);
		});
		//set the css position and fade properties of the forward and back nav buttons--if the properties exist.
			if(jcm_poros_side_navOption == "On") {
		jQuery('#jcm_poros_container').hover(function()
			{
				
				jQuery('#jcm_poros_forwardnav_next').fadeIn(600);
				jQuery('#jcm_poros_forwardnav_next').css({"left" : (jcm_poros_slideWidth+jcm_poros_thumbWidth)-48, "top" : jcm_poros_slideHeight/2-40});	
			},function()
			{
				jQuery('#jcm_poros_forwardnav_next').fadeOut(600);
			});
	jQuery('#jcm_poros_container').hover(function()
			{
				
				jQuery('#jcm_poros_backnav_back').fadeIn(600);
				jQuery('#jcm_poros_backnav_back').css({"left" : jcm_poros_thumbWidth, "top" : jcm_poros_slideHeight/2-40});	
			},function()
			{
				jQuery('#jcm_poros_backnav_back').fadeOut(600);
			});
	}
	} else if (jcm_poros_scrollOrient == "None") {
		jQuery('#jcm_poros_thumb_slide, #jcm_poros_downnav_next').hide();
		
		if(jcm_poros_side_navOption == "On") {
		
		jQuery('#jcm_poros_container').hover(function()
			{
				
				jQuery('#jcm_poros_forwardnav_next').fadeIn(600);
				jQuery('#jcm_poros_forwardnav_next').css({"left" : jcm_poros_slideWidth-40, "top" : jcm_poros_slideHeight/2-40});	
			},function()
			{
				jQuery('#jcm_poros_forwardnav_next').fadeOut(600);
			});
	jQuery('#jcm_poros_container').hover(function()
			{
				
				jQuery('#jcm_poros_backnav_back').fadeIn(600);
				jQuery('#jcm_poros_backnav_back').css({"left" : 0, "top" : jcm_poros_slideHeight/2-40});	
			},function()
			{
				jQuery('#jcm_poros_backnav_back').fadeOut(600);
			});
		}
	}
	
	//for navigation button
	if(jcm_poros_navOption == "Off"){
		jQuery('#jcm_poros_downnav_next').remove();
	}
	if(jcm_poros_side_navOption == "Off"){
		jQuery('#jcm_poros_forwardnav_next').remove();
		jQuery('#jcm_poros_backnav_back').remove();
	}
	//for drop shadow
	if(jcm_poros_dropShadow == "On"){
		jQuery('#jcm_poros_slide_show, #jcm_poros_thumb_slide').css({"-moz-box-shadow" : "10px 10px 5px #888", "-webkit-box-shadow" : "10px 10px 5px #888"});
		jQuery('#jcm_poros_slide_show, #jcm_poros_thumb_slide').css("box-shadow", "10px 10px 5px #888");
		jQuery('#jcm_poros_slide_show, #jcm_poros_thumb_slide').css("-ms-filter", "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#000000')");
		jQuery('#jcm_poros_slide_show, #jcm_poros_thumb_slide').css("progid", "DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#000000')");
	}
	//determine what happens if caption is set to top, bottom or none
	if(jcm_poros_capPos == "Bottom"){
		if(jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'On'){
		jQuery('#jcm_poros_slide_caption').css("top", (jcm_poros_slideHeight-70));
	}else if (jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'Off'){
		jQuery('#jcm_poros_slide_caption').css("top", (jcm_poros_slideHeight-45));
	}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'On'){
		jQuery('#jcm_poros_slide_caption').css("top", (jcm_poros_slideHeight-43));
	}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'Off'){
		jQuery('#jcm_poros_slide_caption').css("top", (jcm_poros_slideHeight-70));
	}
	}
	if(jcm_poros_capPos == "None"){
		jQuery('#jcm_poros_slide_caption').hide();
	}	
	//set variables for slide functionality, including thumbnail slides
	var counter = 0;
	var thumbCount = 0;
	var thumbDiv = 0;
	var hMult = 1;		
	var backClick=false;
	
	//do not append caption to shortcode div if jcm_poros_scrollOrient is set to "None"
	if (jcm_poros_scrollOrient != "None") {
		for (var i=0; i < jcm_poros_slideArray.length; i++) {		
			jQuery('#jcm_poros_thumb_slide').append('<img src="' + jcm_poros_thumbArray[i] +  '" height="'+jcm_poros_thumbHeight+'" />');
		}
	}	
	if(jcm_poros_headerColorOption == "Custom"){
		jQuery('#jcm_poros_slide_caption h3').css("color", jcm_poros_headerColor);
	}
	if(jcm_poros_textColorOption=="Custom"){
		jQuery('#jcm_poros_slide_caption p').css("color", jcm_poros_textColor);
	}
	if(jcm_poros_fontFamilyOption=="Custom"){
		jQuery('#jcm_poros_slide_caption h3, #jcm_poros_slide_caption p').css("font-family", jcm_poros_fontFamilyVal);
	}
	if (jcm_poros_capPos!="None"){
		if(jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'On'){
		jQuery('#jcm_poros_slide_caption').prepend('<h3>' + jcm_poros_headerArray[0] + '</h3>' + '<p style="margin-top:33px">' + jcm_poros_textArray[0] + '</p>');
		}else if (jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'Off'){
		jQuery('#jcm_poros_slide_caption').prepend('<h3>' + jcm_poros_headerArray[0] + '</h3>');
		}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'On'){
		jQuery('#jcm_poros_slide_caption').prepend('<p>' + jcm_poros_textArray[0] + '</p>');
		}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'Off'){
		jQuery('#jcm_poros_slide_caption').prepend('<h3></h3><p></p>');
		}
		
		if(jcm_poros_headerColorOption == "Custom"){
			jQuery('#jcm_poros_slide_caption h3').css("color", jcm_poros_headerColor);
		}
		if(jcm_poros_textColorOption=="Custom"){
			jQuery('#jcm_poros_slide_caption p').css("color", jcm_poros_textColor);
		}
		if(jcm_poros_fontFamilyOption=="Custom"){
			jQuery('#jcm_poros_slide_caption h3, #jcm_poros_slide_caption p').css("font-family", jcm_poros_fontFamilyVal);
		}
	}
	//check which link opening option is selected and open the link in that manner.
	if(jcm_poros_linkOptionArray[0] == "Open Link in Same Window"){
	jQuery('#jcm_poros_slide_show').prepend('<a target="_self" class="jcm_poros_slide_link_class" target="_self" href="'+jcm_poros_linkArray[0]+'"><img src="' + jcm_poros_slideArray[0] +  '" height="'+jcm_poros_slideHeight+'" width="'+jcm_poros_slideWidth+'"/></a>');	
	} else if(jcm_poros_linkOptionArray[0] == "Open Link in New Tab or Window"){
	jQuery('#jcm_poros_slide_show').prepend('<a target="_blank" class="jcm_poros_slide_link_class" href="'+jcm_poros_linkArray[0]+'"><img src="' + jcm_poros_slideArray[0] +  '" height="'+jcm_poros_slideHeight+'" width="'+jcm_poros_slideWidth+'"/></a>');		
	} else if(jcm_poros_linkOptionArray[0] == "No Link"){
	jQuery('#jcm_poros_slide_show').prepend('<a class="jcm_poros_slide_link_class" href="#"><img src="' + jcm_poros_slideArray[0] +  '" height="'+jcm_poros_slideHeight+'" width="'+jcm_poros_slideWidth+'"/></a>');	
	jQuery('.jcm_poros_slide_link_class').css('cursor', 'auto');
	jQuery('.jcm_poros_slide_link_class').click(function(event) {
		event.preventDefault();
	});
	}
	//set interval for swap function to automatically cycle on
	var jcm_poros_interval = setInterval(jcm_poros_swapIt, jcm_poros_slideDuration);
	//Pause on Hover
	if(jcm_poros_pauseOnHover == 'On'){
		jQuery('#jcm_poros_container').hover(function()
				{
					clearInterval(jcm_poros_interval);
				},function()
				{
					jcm_poros_interval = setInterval(jcm_poros_swapIt, jcm_poros_slideDuration);
				});
	}
	//set the height of the image for scrolling	
	if (jcm_poros_scrollOrient != "None") {
		var imgHeight = jQuery('#jcm_poros_thumb_slide img').attr("height");
		var scrollPos = 0;
	}	
	//function for downnav button
	jQuery("#jcm_poros_downnav_next").click(jcm_poros_sift);
	function jcm_poros_sift(event) {
		event.preventDefault();
		jcm_poros_swapIt();	
		if(jcm_poros_pauseOnHover == "Off"){
		clearInterval(jcm_poros_interval);
		jcm_poros_interval = setInterval(jcm_poros_swapIt, jcm_poros_slideDuration);
		}
	}	
	//function for forwardnav button
	jQuery("#jcm_poros_forwardnav_next").click(jcm_poros_sift2);
	function jcm_poros_sift2(event) {
		event.preventDefault();
		jcm_poros_swapIt();	
		if(jcm_poros_pauseOnHover == "Off"){
		clearInterval(jcm_poros_interval);
		jcm_poros_interval = setInterval(jcm_poros_swapIt, jcm_poros_slideDuration);
		}	
	}
	jQuery("#jcm_poros_backnav_back").click(jcm_poros_sift3);
	function jcm_poros_sift3(event) {
		event.preventDefault();
		if(counter>1){
			counter=counter-2;
		}else if(counter==0) {
			counter=jcm_poros_slideArray.length-2;
		}else if(counter==1) counter=jcm_poros_slideArray.length-1;
		jcm_poros_swapIt();		
		if(jcm_poros_pauseOnHover == "Off"){
		clearInterval(jcm_poros_interval);
		jcm_poros_interval = setInterval(jcm_poros_swapIt, jcm_poros_slideDuration);
		}
	}
	//beginning of function to swap images in slide, caption text and thumbnails
	function jcm_poros_swapIt() {	
	//slide display	'
	jQuery('#jcm_poros_slide_show a:nth-child(2)').remove();
		jQuery('#jcm_poros_thumb_slide').append('<img src="' + jcm_poros_thumbArray[counter] +  '" height="'+jcm_poros_thumbHeight+'" />');
		if (jcm_poros_capPos != "None"){
			if(jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'On'){
				jQuery('#jcm_poros_slide_caption h3:nth-child(3)').remove();
				jQuery('#jcm_poros_slide_caption p:nth-child(4)').remove();
			}else if (jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'Off'){
				jQuery('#jcm_poros_slide_caption h3:nth-child(2)').remove();
			}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'On'){
				jQuery('#jcm_poros_slide_caption p:nth-child(2)').remove();
			}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'Off'){
				jQuery('#jcm_poros_slide_caption h3:nth-child(3)').remove();
				jQuery('#jcm_poros_slide_caption p:nth-child(4)').remove();
			}
		}
	counter++;
	if (counter < jcm_poros_slideArray.length){
		if (jcm_poros_capPos!="None"){
			if(jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'On'){
				jQuery('#jcm_poros_slide_caption').prepend('<h3>' + jcm_poros_headerArray[counter] + '</h3>' + '<p style="margin-top:33px">' + jcm_poros_textArray[counter] + '</p>');
			}else if (jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'Off'){
				jQuery('#jcm_poros_slide_caption').prepend('<h3>' + jcm_poros_headerArray[counter] + '</h3>');
			}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'On'){
				jQuery('#jcm_poros_slide_caption').prepend('<p>' + jcm_poros_textArray[counter] + '</p>');
			}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'Off'){
				jQuery('#jcm_poros_slide_caption').prepend('<h3></h3><p></p>');
			}
			if(jcm_poros_headerColorOption == "Custom"){
				jQuery('#jcm_poros_slide_caption h3').css("color", jcm_poros_headerColor);
				
			}
			if(jcm_poros_textColorOption == "Custom"){
				jQuery('#jcm_poros_slide_caption p').css("color", jcm_poros_textColor);
				
			}
			if(jcm_poros_fontFamilyOption=="Custom"){
				jQuery('#jcm_poros_slide_caption h3, #jcm_poros_slide_caption p').css("font-family", jcm_poros_fontFamilyVal);
			}
		}
	}
	//see if link is set then prepend image to slideshow
	if(counter < jcm_poros_slideArray.length){
		if(jcm_poros_linkOptionArray[counter] == "Open Link in Same Window"){
			jQuery('#jcm_poros_slide_show').prepend('<a class="jcm_poros_slide_link_class" target="_self" href="'+jcm_poros_linkArray[counter]+'"><img src="' + jcm_poros_slideArray[counter] +  '" height="'+jcm_poros_slideHeight+'"/></a>');
		} else if(jcm_poros_linkOptionArray[counter] == "Open Link in New Tab or Window"){
			jQuery('#jcm_poros_slide_show').prepend('<a target="_blank" class="jcm_poros_slide_link_class" href="'+jcm_poros_linkArray[counter]+'"><img src="' + jcm_poros_slideArray[counter] +  '" height="'+jcm_poros_slideHeight+'"/></a>');	
		} else if(jcm_poros_linkOptionArray[counter] == "No Link"){
			jQuery('#jcm_poros_slide_show').prepend('<a class="jcm_poros_slide_link_class" href="#"><img src="' + jcm_poros_slideArray[counter] +  '" height="'+jcm_poros_slideHeight+'"/></a>');	
		jQuery('.jcm_poros_slide_link_class').css('cursor', 'auto');
		jQuery('.jcm_poros_slide_link_class').click(function(event) {
		event.preventDefault();
		});
		}
	}
	if (counter ==  jcm_poros_slideArray.length) {
		counter = 0;
		if (jcm_poros_capPos!="None"){
			if(jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'On'){
				jQuery('#jcm_poros_slide_caption').prepend('<h3>' + jcm_poros_headerArray[counter] + '</h3>' + '<p style="margin-top:33px">' + jcm_poros_textArray[counter] + '</p>');
			}else if (jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'Off'){
				jQuery('#jcm_poros_slide_caption').prepend('<h3>' + jcm_poros_headerArray[counter] + '</h3>');
			}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'On'){
				jQuery('#jcm_poros_slide_caption').prepend('<p>' + jcm_poros_textArray[counter] + '</p>');
			}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'Off'){
				jQuery('#jcm_poros_slide_caption').prepend('<h3></h3><p></p>');
			}
			if(jcm_poros_headerColorOption == "Custom"){
				jQuery('#jcm_poros_slide_caption h3').css("color", jcm_poros_headerColor);
				
			}
			if(jcm_poros_textColorOption == "Custom"){
				jQuery('#jcm_poros_slide_caption p').css("color", jcm_poros_textColor);			
			}
			if(jcm_poros_fontFamilyOption=="Custom"){
			jQuery('#jcm_poros_slide_caption h3, #jcm_poros_slide_caption p').css("font-family", jcm_poros_fontFamilyVal);
			}
		}
		
		if(jcm_poros_linkOptionArray[counter] == "Open Link in Same Window"){
			jQuery('#jcm_poros_slide_show').prepend('<a class="jcm_poros_slide_link_class" target="_self" href="'+jcm_poros_linkArray[counter]+'"><img src="' + jcm_poros_slideArray[counter] +  '" height="'+jcm_poros_slideHeight+'"/></a>');
		} else if(jcm_poros_linkOptionArray[counter] == "Open Link in New Tab or Window"){
			jQuery('#jcm_poros_slide_show').prepend('<a target="_blank" class="jcm_poros_slide_link_class" href="'+jcm_poros_linkArray[counter]+'"><img src="' + jcm_poros_slideArray[counter] +  '" height="'+jcm_poros_slideHeight+'"/></a>');	
		} else if(jcm_poros_linkOptionArray[counter] == "No Link"){
			jQuery('#jcm_poros_slide_show').prepend('<a class="jcm_poros_slide_link_class" href="#"><img src="' + jcm_poros_slideArray[counter] +  '" height="'+jcm_poros_slideHeight+'"/></a>');	
		jQuery('.jcm_poros_slide_link_class').css('cursor', 'auto');
		jQuery('.jcm_poros_slide_link_class').click(function(event) {
		event.preventDefault();
		});
		}	
	}	
	//fade out images
	jQuery('#jcm_poros_slide_show a img:nth-child(2)').animate({opacity: 0}, jcm_poros_transitionTime);
	jQuery('#jcm_poros_slide_show a:nth-child(2) img').fadeOut(jcm_poros_transitionTime);
	//fade caption out if caption is turned on
	if (jcm_poros_capPos != "None"){
		if(jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'On'){
			jQuery('#jcm_poros_slide_caption h3:nth-child(3)').fadeOut(jcm_poros_transitionTime);
			jQuery('#jcm_poros_slide_caption p:nth-child(4)').fadeOut(jcm_poros_transitionTime);
		}else if (jcm_poros_caption_headerOption == 'On' && jcm_poros_caption_textOption == 'Off'){
			jQuery('#jcm_poros_slide_caption h3:nth-child(2)').fadeOut(jcm_poros_transitionTime);
		}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'On'){
			jQuery('#jcm_poros_slide_caption p:nth-child(2)').fadeOut(jcm_poros_transitionTime);
		}else if (jcm_poros_caption_headerOption == 'Off' && jcm_poros_caption_textOption == 'Off'){
			jQuery('#jcm_poros_slide_caption h3:nth-child(3)').fadeOut(jcm_poros_transitionTime);
			jQuery('#jcm_poros_slide_caption p:nth-child(4)').fadeOut(jcm_poros_transitionTime);
		}
		
	}
	//simple thumb animation algorithm.  get the scroll position based on how many images are counted multiplied by the individual image height, then scroll
	if (jcm_poros_scrollOrient != "None") {				
			scrollPos = hMult * imgHeight;
			jQuery('#jcm_poros_thumb_slide').stop().animate({scrollTop: scrollPos}, jcm_poros_transitionTime);
			hMult++;
		}
		
	}

});