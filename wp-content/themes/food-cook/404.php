<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */
get_header(); ?>

<div id="content"><div class="inner">
<div id="cont">
	<div id="main">
        <div id="post-0" class="post not-found">
            <div class="entry-title"><span><?php echo esc_attr(dino_theme_option('vs-website-error-head'));?></span></div>
            <div class="entry-meta"></div>
            <div class="entry-content"><div class="mscont">
                <p><?php echo esc_attr(dino_theme_option('vs-website-error-msg'));?></p>
                
                <div class="not-found-options">
                    <a href="<?php echo esc_url(home_url('/'));?>" class="alba-button">[<?php echo __('Return Home','dino');?>]</a>
                </div>
                
            </div></div>
        </div>	
	</div>
    
	<?php get_sidebar();?>

	<div class="clear"></div>
</div>		
</div></div>

<?php get_footer(); ?>