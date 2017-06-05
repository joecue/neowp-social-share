<?php
/*
Plugin Name: NEOWP Social Share
Description: NorthEast Ohio WordPress Meetup - Social Share plugin.  Enables you to display links to social media accounts and allow visitors to share the post(s)/page(s) from your site.
*/
/* Start Adding Functions Below this Line */

/* Enqueue Public CSS */

function neowp_styles() {
 wp_enqueue_style('neowp_styles', plugin_dir_url( __FILE__ ) . 'css/styles.css', 20);
}
add_action( 'wp_enqueue_scripts', 'neowp_styles' );

/* Enqueue Admin CSS */

function neowp_wp_admin_scripts() {
 wp_enqueue_style('lc_webtools_styles', plugin_dir_url( __FILE__ ) . 'css/admin-styles.css', 20);

}
add_action( 'admin_enqueue_scripts', 'neowp_wp_admin_scripts' );




/* Stop Adding Functions Below this Line */
?>