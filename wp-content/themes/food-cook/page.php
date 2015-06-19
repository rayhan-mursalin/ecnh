<?php
/**
 * The template for displaying all pages.
 *
 */
get_header(); ?>

<div id="content"><div class="inner">
<div id="cont">
    <div id="main">
		<?php while ( have_posts() ):the_post();?>
            <?php get_template_part( 'content','page'); ?>

            <?php if ( comments_open() || '0' != get_comments_number() )comments_template();?>
            
        <?php endwhile; ?>
    </div>

	<?php get_sidebar();?>

	<div class="clear"></div>
</div>
</div></div>

<?php get_footer();?>