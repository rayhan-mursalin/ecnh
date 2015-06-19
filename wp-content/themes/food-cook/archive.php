<?php
/**
 * The template for displaying Archive pages.
 *
 */
get_header(); ?>

<div id="content"><div class="inner">
<div id="cont">
    <div id="main">
<?php 
if(have_posts()):
?>
        <div class="page-header">
<?php
// If this is a category archive
if (is_category()) {
	printf( __('Archive for the &#8216;<span>%1$s</span>&#8217; Category', 'dino'), single_cat_title('', false) );
// If this is a tag archive
} elseif (is_tag()) {
	printf( __('Posts Tagged &#8216;<span>%1$s</span>&#8217;', 'dino'), single_tag_title('', false) );
// If this is a daily archive
} elseif (is_day()) {
	printf( __('Archive for <span>%1$s</span>', 'dino'), get_the_time(__('F jS, Y', 'dino')) );
// If this is a monthly archive
} elseif (is_month()) {
	printf( __('Archive for <span>%1$s</span>', 'dino'), get_the_time(__('F, Y', 'dino')) );
// If this is a yearly archive
} elseif (is_year()) {
	printf( __('Archive for <span>%1$s</span>', 'dino'), get_the_time(__('Y', 'dino')) );
// If this is an author archive
} elseif (is_author()) {
	_e('Author Archive', 'dino');
// If this is a paged archive
} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
	_e('Blog Archives', 'dino');
}
?>
        </div>
	<?php while(have_posts()):the_post(); ?>
    
		<?php get_template_part('content',get_post_format());?>
        
	<?php endwhile;?>
	
			<?php
				the_posts_pagination( array(
					'prev_text'          => '<i class="fa fa-arrow-left"></i>',
					'next_text'          => '<i class="fa fa-arrow-right"></i>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'dino' ) . ' </span>',
				) );
			?>
    
<?php else:?>
	<?php get_template_part('content','none');?>
<?php endif;?>
    </div>
    
	<?php get_sidebar();?>

	<div class="clear"></div>
</div>
</div></div>

<?php get_footer();?>