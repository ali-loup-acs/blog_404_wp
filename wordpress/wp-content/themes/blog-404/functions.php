<?php
/**
** activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

 wp_enqueue_style( 'parent-style', get_template_directory_uri() . 'style.css', 100 );

}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return rand(20,200);
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return 'READ MORE';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );



function twentyeleven_content_nav( $html_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<span class="">
                      <a href="<?php next_posts();?>" class="bg_chevron"><i class="fa fa-chevron-circle-left fa-3x">Back</i></a>
                    </span>
            <span class="pull-right">
                      <a href="<?php previous_posts( );?>" class="bg_chevron"><i class="fa fa-chevron-circle-right fa-3x">Next</i></a>
            </span>
		
	<?php endif;
}




/*
  -- add twitter -- 
*/

function twitter_add_custom_user_profile_fields( $user ) {
?>
  <h3><?php _e('Extra Profile Information', 'twitter'); ?></h3>

  <table class="form-table">
    <tr>
      <th>
        <label for="twitter"><?php _e('Twitter', 'twitter'); ?>
      </label></th>
      <td>
        <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e('Please enter your address twitter.', 'twitter'); ?></span>
      </td>
    </tr>
  </table>
<?php }

function twitter_save_custom_user_profile_fields( $user_id ) {

  if ( !current_user_can( 'edit_user', $user_id ) )
    return FALSE;

  update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
}

add_action( 'show_user_profile', 'twitter_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'twitter_add_custom_user_profile_fields' );

add_action( 'personal_options_update', 'twitter_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'twitter_save_custom_user_profile_fields' );

/*
  -- add facebook --
*/

function fb_add_custom_user_profile_fields( $user ) {
?>
  <table class="form-table">
    <tr>
      <th>
        <label for="facebook"><?php _e('Facebook', 'facebook'); ?>
      </label></th>
      <td>
        <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e('Please enter your facebook.', 'facebook'); ?></span>
      </td>
    </tr>
  </table>
<?php }

function fb_save_custom_user_profile_fields( $user_id ) {

  if ( !current_user_can( 'edit_user', $user_id ) )
    return FALSE;

  update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
}

add_action( 'show_user_profile', 'fb_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'fb_add_custom_user_profile_fields' );

add_action( 'personal_options_update', 'fb_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'fb_save_custom_user_profile_fields' );

