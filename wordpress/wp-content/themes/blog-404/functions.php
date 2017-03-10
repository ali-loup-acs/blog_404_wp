<?php
/**
** activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

 wp_enqueue_style( 'parent-style', get_template_directory_uri() . 'style.css', 100 );

}

/**
 * Create a customized headr for homepage
 */
function home_header_custom_random($random=true){

	$users = get_users( array( 'fields' => array( 'ID' ) ) );
	if ( $random ) { shuffle($users); }

	$html = '<div id="zoneFlex404">';

	$unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
	

	for ($i = 0; $i < 10; $i++) {
		$user_url = get_author_posts_url($users[$i]->ID);

		$user = get_user_meta ($users[$i]->ID);

		$user_firstname = strtolower(strtr( $user["first_name"][0], $unwanted_array ));
		$user_lastname = strtolower(strtr( $user["last_name"][0][0], $unwanted_array ));

		$user = get_stylesheet_directory_uri()."/images/". $user_firstname . $user_lastname. ".png";
		$html.= '<div class="carte"><a href="'. $user_url .'"><img class="img-responsive" src="'. $user .'"></a></div>';
	}

	$html .= '<div class="carteFixe"><a href="'. get_home_url() .'"><img class="img-responsive" src="'.get_stylesheet_directory_uri(). '/images/logo/404.png"></a></div>';

	for ($i = 10; $i < 17; $i++) {
		if($i==10) {
			$html .= '<div class="carteFixe">';
		}
		else{
			$html .= '<div class="carte">';
		}
		$user_url = get_author_posts_url($users[$i]->ID);

		$user = get_user_meta ( $users[$i]->ID);

		$user_firstname = strtolower(strtr( $user["first_name"][0], $unwanted_array ));
		$user_lastname = strtolower(strtr( $user["last_name"][0][0], $unwanted_array ));

		$user = get_stylesheet_directory_uri()."/images/". $user_firstname . $user_lastname. ".png";
		$html.= '<a href="'. $user_url .'"><img class="img-responsive" src="'. $user .'"></a></div>';
	}
	$html .= '</div>';

	echo $html;
}

if ( ! function_exists( 'wpdocs_custom_excerpt_length' ) ) :
	/**
	 * Filter the except length to 20 words.
	 *
	 * @param int $length Excerpt length.
	 * @return int (Maybe) modified excerpt length.
	 */
	function wpdocs_custom_excerpt_length( $length ) {
	    return rand(20,50); /*rand(20,100)*/
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
endif; // wpdocs_custom_excerpt_length


if ( ! function_exists( 'wpdocs_excerpt_more' ) ) :
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
endif; // wpdocs_excerpt_more


if ( ! function_exists( 'my_excerpt' ) ) :
	function my_excerpt(){
		global $post;
		$link='<a class="readMore pull-right" href='.get_permalink($post->ID ).'>Read more</a>';
		$excerpt=get_the_excerpt($post->ID);
		echo $excerpt.$link ; 
	}
	add_filter('the_excerpt','my_excerpt');
endif; // my_excerpt


if ( ! function_exists( 'twentyeleven_continue_reading_link' ) ) :
	/**
	 * Return a blank instead of a "continue readin" link for excerpts
	 *
	 * @since Twenty Eleven 1.0
	 *
	 * @return string The "Continue Reading" HTML link.
	 */
	function twentyeleven_continue_reading_link() {
		return '';
	}
endif; // twentyeleven_continue_reading_link

if ( ! function_exists( 'twentyeleven_posted_on' ) ) :
	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 *
	 * Create your own twentyeleven_posted_on to override in a child theme
	 *
	 * @since Twenty Eleven 1.0
	 */
	function twentyeleven_posted_on() {
		
		$user = get_user_meta( get_the_author_meta( 'ID' ) ) ;
	    $name = $user["first_name"][0]." ".$user["last_name"][0][0].".";

		printf( __( '<div class="authorDate"><div><span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span></div> <div><span class="sep">Posté le </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"></span></div></div> ', 'twentyeleven' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date("d M Y") ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'Voir tous ses articles', 'twentyeleven' ), get_the_author() ) ),
		$name
		);
	}
endif; // twentyeleven_posted_on



if ( ! function_exists( 'twentyeleven_content_nav' ) ) :
	/**
	 * Print HTML buttons for next and previous articles .
	 * overwrite the twentyeleven function
	 */
	function twentyeleven_content_nav( $html_id ) {
		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) : ?>
			<span class="">
	                      <a href="<?php next_posts();?>" class="bg_chevron glyphicon glyphicon-chevron-left"></a>
	                    </span>
	            <span class="pull-right">
	                      <a href="<?php previous_posts( );?>" class="bg_chevron glyphicon glyphicon-chevron-right"></a>
	            </span>
			
		<?php endif;
	}
endif; // twentyeleven_content_nav

 
if ( ! function_exists( 'extra_user_profile_fields' ) ) :
	/**
	 * Create customized fields for user profil
	 */
	function extra_user_profile_fields( $user ) { ?>
	 
	    <h3>Titre du bloc d'information</h3>
	    <table class="form-table">
	        <tbody>
	            <tr>
	                <th>Stack</th>
	                <td><input class="regular-text" id="stack" type="text" name="stack" value="<?php echo esc_attr( get_the_author_meta( 'stack', $user->ID ) ); ?>" /></td>
	            </tr> 
	            <tr>
	                <th>Notes</th>
	                <td><input class="regular-text" id="notes" type="text" name="notes" value="<?php echo esc_attr( get_the_author_meta( 'notes', $user->ID ) ); ?>" /></td>
	            </tr> 
	            <tr>
	                <th>Citation</th>
	                <td><input class="regular-text" id="citation" type="text" name="citation" value="<?php echo esc_attr( get_the_author_meta( 'citation', $user->ID ) ); ?>" /></td>
	            </tr>            
	            <tr>
	                <th>Twitter</th>
	                <td><input class="regular-text" id="twitter" type="text" name="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" /></td>
	            </tr>
	            <tr>
	                <th>Facebook</th>
	                <td><input class="regular-text" id="facebook" type="text" name="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" /></td>
	            </tr>
	            <tr>
	                <th>Github</th>
	                <td><input class="regular-text" id="github" type="text" name="github" value="<?php echo esc_attr( get_the_author_meta( 'github', $user->ID ) ); ?>" /></td>
	            </tr>
	            <tr>
	                <th>LinkedIn</th>
	                <td><input class="regular-text" id="linkedin" type="text" name="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" /></td>
	            </tr>            <tr>
	                <th>Autre</th>
	                <td><input class="regular-text" id="autreRS" type="text" name="autreRS" value="<?php echo esc_attr( get_the_author_meta( 'autreRS', $user->ID ) ); ?>" /></td>
	            </tr>
	        </tbody>
	    </table>
	    
	<?php }
	add_action( 'show_user_profile', 'extra_user_profile_fields' );
	add_action( 'edit_user_profile', 'extra_user_profile_fields' );
endif; // extra_user_profile_fields
 
if ( ! function_exists( 'save_extra_user_profile_fields' ) ) :
	/**
	 * Save new customized fields in user meta
	 */ 
	function save_extra_user_profile_fields( $user_id ) {
	 
	    if ( !current_user_can( 'edit_user', $user_id ) ) { 
	        return false; 
	    }
	    update_user_meta( $user_id, 'stack', $_POST['stack'] );
	    update_user_meta( $user_id, 'notes', $_POST['notes'] );
	    update_user_meta( $user_id, 'citation', $_POST['citation'] );
	    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
	    update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
	    update_user_meta( $user_id, 'github', $_POST['github'] );
	    update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
	    update_user_meta( $user_id, 'autreRS', $_POST['autreRS'] );
	    
	}
	add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
	add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
endif; // save_extra_user_profile_fields



//
/**** VICTOR FUNCTION*/
//
function comments_form( $args = array(), $post_id = null ) {
	if ( null === $post_id )
		$post_id = get_the_ID();

	// Exit the function when comments for the post are closed.
	if ( ! comments_open( $post_id ) ) {
		/**
		 * Fires after the comment form if comments are closed.
		 *
		 * @since 3.0.0
		 */
		do_action( 'comment_form_comments_closed' );

		return;
	}

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html_req = ( $req ? " required='required'" : '' );
	$html5    = 'html5' === $args['format'];
	$fields   =  array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><br />' .
		            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><br /> ' .
		            '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label><br /> ' .
		            '<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></p>',
	);

	$required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );

	/**
	 * Filters the default comment form fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $fields The default comment fields.
	 */
	$fields = apply_filters( 'comment_form_default_fields', $fields );
	$defaults = array(
		'fields'               => $fields,
		'comment_field'        => '<p class="text-center"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label></p><p class="comment-form-comment text-center"> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" required="required" class="form-control"></textarea></p>',
		/** This filter is documented in wp-includes/link-template.php */
		'must_log_in'          => '<p class="must-log-in">' . sprintf(
		                              /* translators: %s: login URL */
		                              __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
		                              wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )
		                          ) . '</p>',
		/** This filter is documented in wp-includes/link-template.php */
		
		'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after'  => '',
		'action'               => site_url( '/wp-comments-post.php' ),
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_form'           => 'comment-form',
		'class_submit'         => 'submit',
		'name_submit'          => 'submit',
		'title_reply'          => __( 'Leave a Reply' ),
		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title text-center">',
		'title_reply_after'    => ':</h4>',
		'cancel_reply_before'  => ' <small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Post Comment' ),
		'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-default" value="%4$s" />',
		'submit_field'         => '<p class="form-submit text-center">%1$s %2$s</p>',
		'format'               => 'xhtml',
	);

	/**
	 * Filters the comment form default arguments.
	 *
	 * Use {@see 'comment_form_default_fields'} to filter the comment fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $defaults The default comment form arguments.
	 */
	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	// Ensure that the filtered args contain all required default values.
	$args = array_merge( $defaults, $args );

	/**
	 * Fires before the comment form.
	 *
	 * @since 3.0.0
	 */
	do_action( 'comment_form_before' );
	?>
	<div id="respond" class="comment-respond">
		<?php
		echo $args['title_reply_before'];

		comment_form_title( $args['title_reply'], $args['title_reply_to'] );

		echo $args['cancel_reply_before'];

		cancel_comment_reply_link( $args['cancel_reply_link'] );

		echo $args['cancel_reply_after'];

		echo $args['title_reply_after'];

		if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) :
			echo $args['must_log_in'];
			/**
			 * Fires after the HTML-formatted 'must log in after' message in the comment form.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_must_log_in_after' );
		else : ?>
			<form action="<?php echo esc_url( $args['action'] ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="<?php echo esc_attr( $args['class_form'] ); ?>"<?php echo $html5 ? ' novalidate' : ''; ?>>
				<?php
				/**
				 * Fires at the top of the comment form, inside the form tag.
				 *
				 * @since 3.0.0
				 */
				do_action( 'comment_form_top' );

				if ( is_user_logged_in() ) :
					/**
					 * Filters the 'logged in' message for the comment form for display.
					 *
					 * @since 3.0.0
					 *
					 * @param string $args_logged_in The logged-in-as HTML-formatted message.
					 * @param array  $commenter      An array containing the comment author's
					 *                               username, email, and URL.
					 * @param string $user_identity  If the commenter is a registered user,
					 *                               the display name, blank otherwise.
					 */
					echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );

					/**
					 * Fires after the is_user_logged_in() check in the comment form.
					 *
					 * @since 3.0.0
					 *
					 * @param array  $commenter     An array containing the comment author's
					 *                              username, email, and URL.
					 * @param string $user_identity If the commenter is a registered user,
					 *                              the display name, blank otherwise.
					 */
					do_action( 'comment_form_logged_in_after', $commenter, $user_identity );

				else :

					echo $args['comment_notes_before'];

				endif;

				// Prepare an array of all fields, including the textarea
				$comment_fields = array( 'comment' => $args['comment_field'] ) + (array) $args['fields'];

				/**
				 * Filters the comment form fields, including the textarea.
				 *
				 * @since 4.4.0
				 *
				 * @param array $comment_fields The comment fields.
				 */
				$comment_fields = apply_filters( 'comment_form_fields', $comment_fields );

				// Get an array of field names, excluding the textarea
				$comment_field_keys = array_diff( array_keys( $comment_fields ), array( 'comment' ) );

				// Get the first and the last field name, excluding the textarea
				$first_field = reset( $comment_field_keys );
				$last_field  = end( $comment_field_keys );

				foreach ( $comment_fields as $name => $field ) {

					if ( 'comment' === $name ) {

						/**
						 * Filters the content of the comment textarea field for display.
						 *
						 * @since 3.0.0
						 *
						 * @param string $args_comment_field The content of the comment textarea field.
						 */
						echo apply_filters( 'comment_form_field_comment', $field );

						echo $args['comment_notes_after'];

					} elseif ( ! is_user_logged_in() ) {

						if ( $first_field === $name ) {
							/**
							 * Fires before the comment fields in the comment form, excluding the textarea.
							 *
							 * @since 3.0.0
							 */
							do_action( 'comment_form_before_fields' );
						}

						/**
						 * Filters a comment form field for display.
						 *
						 * The dynamic portion of the filter hook, `$name`, refers to the name
						 * of the comment form field. Such as 'author', 'email', or 'url'.
						 *
						 * @since 3.0.0
						 *
						 * @param string $field The HTML-formatted output of the comment form field.
						 */
						echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";

						if ( $last_field === $name ) {
							/**
							 * Fires after the comment fields in the comment form, excluding the textarea.
							 *
							 * @since 3.0.0
							 */
							do_action( 'comment_form_after_fields' );
						}
					}
				}

				$submit_button = sprintf(
					$args['submit_button'],
					esc_attr( $args['name_submit'] ),
					esc_attr( $args['id_submit'] ),
					esc_attr( $args['class_submit'] ),
					esc_attr( $args['label_submit'] )
				);

				/**
				 * Filters the submit button for the comment form to display.
				 *
				 * @since 4.2.0
				 *
				 * @param string $submit_button HTML markup for the submit button.
				 * @param array  $args          Arguments passed to `comment_form()`.
				 */
				$submit_button = apply_filters( 'comment_form_submit_button', $submit_button, $args );

				$submit_field = sprintf(
					$args['submit_field'],
					$submit_button,
					get_comment_id_fields( $post_id )
				);

				/**
				 * Filters the submit field for the comment form to display.
				 *
				 * The submit field includes the submit button, hidden fields for the
				 * comment form, and any wrapper markup.
				 *
				 * @since 4.2.0
				 *
				 * @param string $submit_field HTML markup for the submit field.
				 * @param array  $args         Arguments passed to comment_form().
				 */
				echo apply_filters( 'comment_form_submit_field', $submit_field, $args );

				/**
				 * Fires at the bottom of the comment form, inside the closing </form> tag.
				 *
				 * @since 1.5.0
				 *
				 * @param int $post_id The post ID.
				 */
				do_action( 'comment_form', $post_id );
				?>
			</form>
		<?php endif; ?>
	</div><!-- #respond -->
	<?php

	/**
	 * Fires after the comment form.
	 *
	 * @since 3.0.0
	 */
	do_action( 'comment_form_after' );
}
function twentyeleven_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( ' <p> %1$s on %2$s <span class="says">said:</span>', 'twentyeleven' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span></p>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
//END VICTOR FUNCTION