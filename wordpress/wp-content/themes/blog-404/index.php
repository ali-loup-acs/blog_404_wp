<?php
/**
 * Main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

		<main id="main_home" class="container">
        <section class="row">
            <header class="col-md-12">
                <h2 class="col-md-8">A la Une</h2>

                <!-- <div class="bg_input col-md-4 hidden-xs hidden-sm pull-right">
                    <input type="text" name="author" value="" placeholder="Nom de l'auteur">
                    <input type="text" name="category" value="" placeholder="Nom de la catégorie">
                </div> -->

            </header>

            <div class="clearfix"></div>

            <div class="bg_article row-mas">

			<?php if ( have_posts() ) : ?>

				

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content-intro', get_post_format() ); ?>

				<?php endwhile; ?>

				

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
			<?php twentyeleven_content_nav( 'nav-below' ); ?>
		<!-- </div>#primary -->

  
<?php get_footer(); ?>
