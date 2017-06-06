<?php 

/*
		*	Code adapted from https://www.smashingmagazine.com/2011/10/create-custom-post-meta-boxes-wordpress
		*	Created June 2017.
		*
		*/

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'neowp_social_share_meta_boxes_setup' );
add_action( 'load-post-new.php', 'neowp_social_share_meta_boxes_setup' );

/* Meta box setup function */
function neowp_social_share_meta_boxes_setup() {
 /* Add meta boxes on the 'add_meta_boxes' hook. */
 add_action( 'add_meta_boxes', 'neowp_social_share_meta_box' );

 /* Save post meta on the 'save_post' hook. */
 add_action( 'save_post', 'neowp_social_share_save_info', 10, 2 );
}

/* Create one or meta boxes to be displayed on the post editor screen */
function neowp_social_share_meta_box() {
 add_meta_box(
  'neowp_social_share_meta_box',                            						// Unique ID (ID of Div Tag ** Note: DO NOT NAME same as field(s) below **)
  esc_html__( 'Social Media', 'neowp' ),                 // Title & Text Domain
  'neowp_show_social_share_meta_box',                           // Callback function
  'post',                                             												// Admin Page or Post Type
  'normal',                                                       // Context (Position)
  'default'                                                       // Priority
 );
	
	 add_meta_box(
  'neowp_social_share_meta_box',                                 	// Unique ID (ID of Div Tag ** Note: DO NOT NAME same as field(s) below **)
  esc_html__( 'Social Media', 'neowp' ),                 // Title & Text Domain
  'neowp_show_social_share_meta_box',                           // Callback function
  'page',                                             												// Admin Page or Post Type
  'normal',                                                       // Context (Position)
  'default'                                                       // Priority
 );
}

/* Display the post meta box */
function neowp_show_social_share_meta_box( $object, $box ) { ?>

 <?php wp_nonce_field( basename( __FILE__ ), 'neowp_social_share_post_nonce' ); ?>

  <div style="width:150px;">
   <label for="neowp_social_share_og_title_field">
    <?php _e( "Facebook Title: ", "neowp" ); ?>
   </label>
		</div>
  <div style="width:650px;">
   <input type="text" name="neowp_social_share_og_title_field" id="neowp_social_share_og_title_field" value="<?php echo esc_attr( get_post_meta ( $object->ID, 'neowp_social_share_og_title_field', true ) ); ?>" size="30" />
  </div>

  <div style="width:150px;">
   <label for="neowp_social_share_og_description_field">
    <?php _e( "Facebook Description: ", "neowp" ); ?>
   </label>
		</div>
  <div style="width:650px;">
			<textarea name="neowp_social_share_og_description_field" id="neowp_social_share_og_description_field" value="<?php echo esc_attr( get_post_meta ( $object->ID, 'neowp_social_share_og_description_field', true ) ); ?>" rows="5" cols="50"></textarea>
		</div>

 <?php
}

/* Save the meta box's post metadata */
function neowp_social_share_save_info( $post_id, $post ) {

 /* Verify the nonce before proceeding */
 if ( !isset( $_POST['neowp_social_share_post_nonce'] ) || !wp_verify_nonce( $_POST['neowp_social_share_post_nonce'], basename( __FILE__ ) ) )
  return $post_id;

 /* Get the post type object */
 $post_type = get_post_type_object ( $post->post_type );

 /* Check if the current user has permission to edit the post. */
 if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
  return $post_id;

 /* Facebook Title Field */
 /* Get the posted data and sanitize it for use as a date value. */
 $new_meta_value = ( isset( $_POST['neowp_social_share_og_title_field'] ) ? sanitize_text_field($_POST['neowp_social_share_og_title_field'] ) : '' );

 /* Get the meta key. */
 $meta_key = 'neowp_social_share_og_title_field';

  /* Get the meta value of the custom field key. */
 $meta_value = get_post_meta ($post_id, $meta_key, true );

 update_post_meta( $post_id, $meta_key, $new_meta_value, $meta_value );
	
	/* Facebook Description Field */
 /* Get the posted data and sanitize it for use as a date value. */
 $new_meta_value = ( isset( $_POST['neowp_social_share_og_description_field'] ) ? sanitize_text_field($_POST['neowp_social_share_og_description_field'] ) : '' );

 /* Get the meta key. */
 $meta_key = 'neowp_social_share_og_description_field';

  /* Get the meta value of the custom field key. */
 $meta_value = get_post_meta ($post_id, $meta_key, true );

 update_post_meta( $post_id, $meta_key, $new_meta_value, $meta_value );
	
}

?>