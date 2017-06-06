<?php
/*
Plugin Name: NEOWP Social Share
Description: NorthEast Ohio WordPress Meetup - Social Share plugin.  Enables you to display links to social media accounts and allow visitors to share the post(s)/page(s) from your site.
Text Domain: neowp
*/
/* Start Adding Functions Below this Line */

/* Enqueue Public CSS */

function neowp_styles() {
 wp_enqueue_style('neowp_styles', plugin_dir_url( __FILE__ ) . 'css/styles.css', 20);
}
add_action( 'wp_enqueue_scripts', 'neowp_styles' );

/* Enqueue Admin CSS */

function neowp_wp_admin_scripts() {
 wp_enqueue_style('neowp_admin_styles', plugin_dir_url( __FILE__ ) . 'css/admin-styles.css', 20);
// wp_enqueue_script('neowp_social_media_fields', plugin_dir_url( __FILE__ ) . 'js/social-media-custom-fields.js', array( 'jquery' ) );
}
add_action( 'admin_enqueue_scripts', 'neowp_wp_admin_scripts' );

// Adds social media profile fields to general settings.
require_once( plugin_dir_path( __FILE__ ).'social-media/social-media-fields.php' );
require_once( plugin_dir_path( __FILE__ ).'social-media/social-media-meta-fields.php' );

/* Stop Adding Functions Below this Line */
?>