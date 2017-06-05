<?php

 /*
   *
   *  Adds custom fields to the general settings tab.
   *
   */

 $neowp_social_media = new new_neowp_social_media_setting();

class new_newowp_social_media_setting {
 function new_newowp_social_media_setting() {
  add_filter( 'admin_init', array( &$this, 'neowp_register_fields' ) );
 }
 
 /**
  *
  * Each field needs to be registered using register_setting and then added via add_settings_field
  *
  */
  
 function neowp_register_fields() {
  
  add_settings_section( 'neowp-settings', 'NEO WP Social Media Accounts', '__return_false', 'general' );
  
  // Repeat from line 27 to line 29 for each social media account.  
  // Register Facebook Profile Field  
  register_setting( 'general', 'newowp_fb_display_field', 'esc_attr' );
  add_settings_field( 'neowp_fb_account', '<label for="newowp_fb_account">'.__('Facebook Profile: ', 'neowp_social_fb_account').'</label>', array(&$this, 'newowp_fb_display_field') , 'general', 'neowp-settings' );
  
  // Result of copying lines 27-29 to add twitter.
  // Register Twitter Profile Field  
  register_setting( 'general', 'neowp_social_tw_account', 'esc_attr' );
  add_settings_field( 'neowp_tw_account', '<label for="newowp_tw_account">'.__('Twitter Profile: ', 'neowp_social_tw_account').'</label>', array(&$this, 'newowp_tw_display_field') , 'general', 'neowp-settings' );
  
 }
 
 function newowp_fb_display_field() {
  $value = get_option( 'neowp_social_fb_account', '');
  echo '<input type="text" id="neowp_social_fb_account" value="' . $value .'" size="50" />';
  echo '<p class="description" id="fb-profile-description">Enter your Facebook Profile Name</p>';
 }
 
 function newowp_tw_display_field() {
  $value = get_option( 'neowp_social_tw_account', '');
  echo '<input type="text" id="neowp_social_tw_account" value="' . $value .'" size="50" />';
  echo '<p class="description" id="fb-profile-description">Enter your Twitter Profile Name</p>';
 }
 
}


?>