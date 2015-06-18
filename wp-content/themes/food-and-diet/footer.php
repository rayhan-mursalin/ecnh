<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package CodePeople
 * @subpackage Food_Diet
 * @since Food & Diet 1.0.1
 *
 */
?>
	</div><!-- #main .wrapper -->
</div><!-- #page -->
<footer id="colophon" role="contentinfo">
    <div class="content">
        <?php get_sidebar('footer'); ?>
        <div class="site-info">
            <?php do_action( 'food_diet_copyright' ); ?>
            <?php echo fd_theme_options( 'copyright' ); ?>
        </div><!-- .site-info -->  
    </div>    
    <div class="clear"></div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>