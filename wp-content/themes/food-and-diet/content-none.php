<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package CodePeople
 * @subpackage Food_Diet
 * @since Food & Diet 1.0.1
 *
 */
?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'Nothing Found', 'food_diet' ); ?></h1>
		</header>

		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'food_diet' ); ?></p>
			<?php get_search_form(); ?>
            <div style="clear:both;"></div>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
