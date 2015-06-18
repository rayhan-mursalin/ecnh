<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package CodePeople
 * @subpackage Food_Diet
 * @since Food & Diet 1.0.1
 *
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header top-frame">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'foot_diet' ), 'after' => '</div>' ) ); ?>
            <div style="clear:both;"></div>
		</div><!-- .entry-content -->
		<footer class="entry-meta"><?php edit_post_link( __( 'Edit', 'foot_diet' ), '<span class="edit-link">', '</span>' ); ?></footer><!-- .entry-meta -->
	</article><!-- #post -->
