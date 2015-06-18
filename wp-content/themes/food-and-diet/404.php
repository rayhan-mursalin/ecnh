<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package CodePeople
 * @subpackage Food_Diet
 * @since Food & Diet 1.0.1
 *
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'food_diet' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'food_diet' ); ?></p>
					<?php get_search_form(); ?>
                    <div style="clear:both;"></div>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>