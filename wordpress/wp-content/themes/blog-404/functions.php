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

