<?php
/**
 * The sidebar containing the widget areas for footer.
 *
 *
 * @package CodePeople
 * @subpackage Food_Diet
 * @since Food & Diet 1.0.1
 *
 */

if ( ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) )
	return;
$footer_bars = 0;
?>
<div class="widget-area" role="complementary">

	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : 
            $footer_bars++;
    ?>
    
	<div class="first footer-widgets">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- .first -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div class="<?php print(($footer_bars) ?  'second' : 'first'); ?> footer-widgets">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div><!-- .second -->
	<?php endif; ?>
</div>