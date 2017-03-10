<?php
/**
 * Template for displaying Author Archive pages
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">
		

			<?php if ( have_posts() ) : ?>

				<?php
					/*
					 * Queue the first post, that way we know what author
					 * we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop properly
					 * with a call to rewind_posts().
					 */
					the_post();
				?>

				<header class="page-header">
					<h1 class="page-title author"><?php printf( '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
				</header>

				<?php
					/*
					 * Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php
				// If a user has filled out their description, show a bio on their entries.
				if ( get_the_author_meta( 'description' ) ) : ?>
				<div id="author-info">
					<div id="author-avatar">
						<?php
						/**
						 * Filter the Twenty Eleven author bio avatar size.
						 *
						 * @since Twenty Eleven 1.0
						 *
						 * @param int The height and width avatar dimension in pixels. Default 60.
						 */
						echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 60 ) );
						?>
					</div><!-- #author-avatar -->
					<div id="author-description">
						<h2><?php printf( __( 'About %s', 'twentyeleven' ), get_the_author() ); ?></h2>
						<?php


						echo "<p>" . the_author_meta( 'description' ) . "</p>";

						 ?>
					</div><!-- #author-description	-->
					<div id="author-stack">
						<?php


						echo "<p>" . ( get_the_author_meta( 'stack' ) ) . "</p>";


						?>
					</div>
					<div id="notes">
						<?php

						echo '<ul class="col-md-6 col-xs-6" >';

						echo "<li>" . ( get_the_author_meta( 'notes') ) . "</p>";

						echo "</ul>";

						?>
					</div>
					<div class="citation">
						<?php

							echo "<h3>". "Citation Favorite" . "</h3>";

							echo "<blockquote>" . ( get_the_author_meta( 'citation' ) ) . "</blockquote>"


						 ?>
					</div>
					<div class="twitter">
					

							<ul class="col-md-6 col-xs-6">

							<li><a href="<?php echo get_the_author_meta('twitter') ?>"><img src=" <?php echo get_stylesheet_directory_uri(); ?>/svg/twitter.svg"></a></li> ;
							<!-- echo "<li>" . ( get_the_author_meta( 'facebook' ) ) . "</li>";
							echo "<li>" . ( get_the_author_meta( 'github' ) ) . "</li>";
 -->
					<!-- 		echo "</ul>";

							 echo '<li><a href="'.esc_url( get_author_posts_url($user_id->ID ) ).'">'; -->
						
					</div>
					<div class="autreRS">
						<?php

						echo '<ul>';
						echo "<li>";

						echo '<a href=' . ( get_the_author_meta( 'autreRS') ) . ">" . "</a>";

						echo "</li>";
						echo "</ul>";

						 ?>
					</div>
				</div><!-- #author-info -->
				<?php endif; ?>
				<!-- <?php twentyeleven_content_nav( 'nav-below' ); ?> -->

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->
				</article><!-- #post-0 -->

				<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
