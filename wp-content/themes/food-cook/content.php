<?php
/**
 * @package dino
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
	<?php if ( has_post_thumbnail() ):?> 
	<div class="post-entry-media">
    	<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_post_thumbnail();?></a>
    </div>
    <?php endif;?>


	<div class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title();?>"><?php if(get_the_title() == ""){echo __('(no title)','dino');}else{the_title();}?></a></div>

	<div class="entry-meta">
    	<span><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></span>
        <span><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" title="<?php echo get_the_author(); ?>"><?php echo get_the_author(); ?></a></span>
        <?php edit_post_link( __( 'Edit', 'dino' ), '<span class="edit-link"><i class="fa fa-edit"></i> ', '</span>' );?>
        <div class="div2">
        <?php if(!post_password_required() && (comments_open()||get_comments_number())):?>
        <span><i class="fa fa-comments"></i> <?php comments_popup_link(__('Leave a comment','dino'), __('1 Comment','dino'), __('% Comments','dino'));?></span>
        <?php endif; ?>
        </div>
        <div class="clear"></div>
    </div>

	<div class="entry-content"><div class="mscont">
		<?php the_content();?>
		
		<?php wp_link_pages( array('before' => '<div class="page-links"><i class="fa fa-file"></i> '.__( 'Pages:', 'dino' ),'after'  => '</div>',));?>
	</div></div>
	
	<div class="entry-meta2">
    	<?php if ( is_sticky() && is_home() && ! is_paged() ) {printf( '<span class="sticky-post"><i class="fa fa-star"></i> %s</span>', __( 'Featured', 'dino' ) );}?>
    	<?php if(get_the_category_list()):?><span><i class="fa fa-list"></i> <?php echo get_the_category_list(',');?></span><?php endif;?>
    	<?php if(get_the_tag_list()):?><span><i class="fa fa-tags"></i> <?php echo get_the_tag_list('',',','');?></span><?php endif;?>
	</div>
    
</div>