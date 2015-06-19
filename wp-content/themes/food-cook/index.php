<?php
/**
 * The main template file.
 *
 */
get_header(); ?>

<div id="content"><div class="inner">
<div id="cont">
    <div id="main">
		<?php if(have_posts()):?>
			<?php while(have_posts()):the_post(); ?>
            
                <?php get_template_part('content'); ?>
                
            <?php endwhile; ?>
            
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