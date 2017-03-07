<?php
/**
** activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', 100 );

}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 10;
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



function fb_list_authors($userlevel = 'all', $show_fullname = true) {
	global $wpdb;
	
	/*
	 all = Display all user
	 1 = subscriber
	 2 = editor
	 3 = author
	 7 = publisher
	10 = administrator
	*/

	if ( $userlevel == 'all' ) {
		$author_subscriper = $wpdb->get_results("SELECT * from $wpdb->usermeta WHERE meta_key = 'wp_capabilities' AND meta_value = 'a:1:{s:10:\"subscriber\";b:1;}'");
		foreach ( (array) $author_subscriper as $author ) {
			$author    = get_userdata( $author->user_id );
			$userlevel = $author->wp2_user_level;
			$name      = $author->nickname;
			if ( $show_fullname && ($author->first_name != '' && $author->last_name != '') ) {
				$name = "$author->first_name $author->last_name";
			}
			$link = '<li>' . $name . '</li>';
			echo $link;
		}
		
		$i = 0;
		while ( $i <= 10 ) {
			$userlevel = $i;
			$authors = $wpdb->get_results("SELECT * from $wpdb->usermeta WHERE meta_key = 'wp_user_level' AND meta_value = '$userlevel'");
			foreach ( (array) $authors as $author ) {
				$author    = get_userdata( $author->user_id );
				$userlevel = $author->wp2_user_level;
				$name      = $author->nickname;
				if ( $show_fullname && ($author->first_name != '' && $author->last_name != '') ) {
					$name = "$author->first_name $author->last_name";
				}
				$link = '<li>' . $name . '</li>';
				echo $link;
			}
			$i++;
		}
	} else {
		if ($userlevel == 1) {
			$authors = $wpdb->get_results("SELECT * from $wpdb->usermeta WHERE meta_key = 'wp_capabilities' AND meta_value = 'a:1:{s:10:\"subscriber\";b:1;}'");
		} else {
			$authors = $wpdb->get_results("SELECT * from $wpdb->usermeta WHERE meta_value = '$userlevel'");
		}
		foreach ( (array) $authors as $author ) {
			$author = get_userdata( $author->user_id );
			$userlevel = $author->wp2_user_level;
			$name = $author->nickname;
			if ( $show_fullname && ($author->first_name != '' && $author->last_name != '') ) {
				$name = "$author->first_name $author->last_name";
			}
			$link  = '<li><b>' . $userlevelname[$userlevel] . '</b></li>';
			$link .= '<li>' . $name . '</li>';
			echo $link;
		}
	}
}

