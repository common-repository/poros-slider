=== Poros Slider ===
Contributors: jleo2255
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ATSCV4PJ6Q28S
Tags: image, slide, slider, slideshow, presentation, show, shortcode, widget, poros
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 1.0.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create a beautiful slideshow with an optional vertical scroller and fully customizable caption.  

== Description ==

Create a beautiful slideshow with an optional vertical scroller and fully customizable caption.  After you've specified what images and caption you want in your slideshow and how you want it displayed, just add [poros_show] to any page/post and it will be displayed there.

I've recently made many updates to this plugin to enhance usability and make it even more consistent with whatever theme you're using.  I'm working on updates that will be ready in the near future (multiple transition types, unlimited slides and multiple shows per site to start) but have not yet received any donations or feedback.  If you like this plugin, please comment, rate or donate.  I would hate to have to move this to a pay only site.  

== Installation ==

This section describes how to install the plugin and get it working.

1. a. Upload Poroslider folder to the `/wp-content/plugins/` directory  OR

   b. Activate the plugin through the 'Plugins' menu in WordPress


2. Upload your images, caption and other slideshow elements using the 'Poros Slider' menu on the left.

3. If you use the vertical scroller, you must resize the thumbnails to 1/3 the size of the slide they correspond to before uploading them, or show may not display correctly.
TIP: for optimal performance, make sure your slide height is divisible by three (300px, 399px, etc.).  Vertical Scroller is optional.

4. Add [poros_show] to any page/post you wish for it to be displayed on.

== Frequently Asked Questions ==

= What is the best way to resize my images? =

Using whatever software you are comfortable with.  If you don't have a preferred method yet, chances are uploading the image to wordpress, clicking edit, and choosing 'scale' to resize is the best/most convenient method for you.

= The scroller on the right has images that don't fit the show!  What do I do? =

Make sure your thumbnails are EXACTLY 1/3 the size of the slides if you use the vertical scroller.  The only way to do this is to ensure the slide has a height divisible by three.  This functionality ensures you can resize your images to whatever quality you desire without me doing it straight in the html, which renders very poorly in some cases.  The vertical scroller is optional.

== Screenshots ==

1. Use the Poros Slider uploads page to upload all your slides, thumbnails, links and caption.
2. Use the Slide Settings page to enhance the usability of your slide to whatever suits your site best.
3. Use the Caption Options page to specify captions that will be compatible with your theme.
4. Display the slider by typing [poros_show] in any page/post you want.

== Changelog ==

= 1.0.1 =
* Entire admin interface has changed for greater organization of features.
* Slides can now contain links.
* Slideshow now has pause on hover.
* New, high quality navigation buttons are very theme neutral and are easily seen.
* Preview of slides now available in admin area to keep track of uploaded slides.
* Added a feature to change the background color of the caption, but GD library must be enabled on server.  Contact me for ?s
* Fixed bug with some themes only allowing caption header to be all caps

= 1.0 =
* Initial issue with script handling not allowing elements to display correctly: resolved.

== Upgrade Notice ==

= 1.0 =
No upgrades available at this time.