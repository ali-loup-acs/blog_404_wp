<?php
/**
 * Template for displaying page content in the showcase.php page template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */




?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'item' ); ?>>

	<header class="entry-header">
		<h3 class="entry-title"><?php the_title(); ?></h3>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
		<div class="entry-meta">
			<!-- info about the current post -->
			<?php twentyeleven_posted_on(); ?>
		</div>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
