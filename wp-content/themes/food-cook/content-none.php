<?php
/**
 * @package dino
 */
?>
<div id="post-0" class="post no-results not-found">
	<div class="entry-title"><span>Nothing Found</span></div>
	<div class="entry-content"><div class="mscont">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			
			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'dino' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
			
		<?php elseif ( is_search() ) : ?>
			
			<p><?php echo esc_attr(dino_theme_option('vs-website-nosearch-msg'));?></p>
			
            <div class="not-found-options">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="alba-button">[<?php echo __('Return Home','dino');?>]</a>
            </div>
			
		<?php else : ?>
			
			<p><?php echo esc_attr(dino_theme_option('vs-website-nosearch-msg'));?></p>
            
            <div class="not-found-options">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="alba-button">[<?php echo __('Return Home','dino');?>]</a>
            </div>
			
		<?php endif; ?>
	</div></div>
</div>