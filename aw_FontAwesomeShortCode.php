<?php
/*
 * Plugin Name: FontAwesome.io ShortCodes
 * Plugin URI: https://AWeleczka.de/
 * Description: This plugin allows the easy use of the entire Font Awesome Icon-Set through ShortCodes anywhere on your site.
 * Credits: The Font Awesome Icon-Set is available at http://fontawesome.io/ License-Information for FA can be found under http://fontawesome.io/license/
 * Version: 1.0
 * Author: Alexander Weleczka
 * Author URI: https://AWeleczka.de/
 */
 
class aw_FontAwesomeShortCode {
	public function __construct() {
		add_action('init', array($this, 'aw_FASC_init'));
	}
	
	public function aw_FASC_init() {
		add_action('wp_enqueue_scripts', array($this, "aw_FASC_register"));
		add_shortcode('fa', array($this, "aw_FASC_shortcode"));
		add_filter('widget_text', 'do_shortcode');
	}
	
	public function aw_FASC_register() {
		wp_enqueue_style('font-awesome-cdn', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	}
	
	public function aw_FASC_shortcode($params) {
		extract(shortcode_atts(array('icon' => 'exclamation'), $params));
		
		if(substr($icon, 0, 3) != "fa-") {
			$icon = "fa-".$icon;
		}
		
        return '<i class="fa '.$icon.'"></i>';
	}
}
new aw_FontAwesomeShortCode();