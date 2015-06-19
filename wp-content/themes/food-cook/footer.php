<div id="footer"><div class="inner">
	<div id="foot">
		<div class="div1"><span><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'dino' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'dino' ), 'WordPress' ); ?></a>. Made with Wordpress by <a href="http://rayhanmursalin.com" rel="external">Rayhan Mursalin</a>.</span></div>
		<div class="div2">
<?php
if( dino_theme_option( 'vs-social-email' ) ) :
    echo '<a href="' . esc_url( 'mailto:' . antispambot( dino_theme_option( 'vs-social-email' ), 1 ) ) . '" title="' . __( 'Send Us an Email', 'dino' ) . '"><i class="fa fa-envelope-o"></i></a>';endif;
if( dino_theme_option( 'vs-social-skype' ) ) :
    echo '<a href="skype:' . esc_html( dino_theme_option( 'vs-social-skype' ) ) . '?userinfo" title="' . __( 'Contact Us on Skype', 'dino' ) . '"><i class="fa fa-skype"></i></a>';endif;
if( dino_theme_option( 'vs-social-facebook' ) ) :
    echo '<a href="' . esc_url( dino_theme_option( 'vs-social-facebook' ) ) . '" target="_blank" title="' . __( 'Find Us on Facebook', 'dino' ) . '"><i class="fa fa-facebook"></i></a>';endif;
if( dino_theme_option( 'vs-social-twitter' ) ) :
    echo '<a href="' . esc_url( dino_theme_option( 'vs-social-twitter' ) ) . '" target="_blank" title="' . __( 'Follow Us on Twitter', 'dino' ) . '"><i class="fa fa-twitter"></i></a>';endif;
if( dino_theme_option( 'vs-social-google-plus' ) ) :
    echo '<a href="' . esc_url( dino_theme_option( 'vs-social-google-plus' ) ) . '" target="_blank" title="' . __( 'Find Us on Google Plus', 'dino' ) . '"><i class="fa fa-google-plus"></i></a>';endif;
if( dino_theme_option( 'vs-social-youtube' ) ) :
    echo '<a href="' . esc_url( dino_theme_option( 'vs-social-youtube' ) ) . '" target="_blank" title="' . __( 'View our YouTube Channel', 'dino' ) . '"><i class="fa fa-youtube"></i></a>';endif;
if( dino_theme_option( 'vs-social-instagram' ) ) :
    echo '<a href="' . esc_url( dino_theme_option( 'vs-social-instagram' ) ) . '" target="_blank" title="' . __( 'Follow Us on Instagram', 'dino' ) . '"><i class="fa fa-instagram"></i></a>';endif;
if( dino_theme_option( 'vs-social-pinterest' ) ) :
    echo '<a href="' . esc_url( dino_theme_option( 'vs-social-pinterest' ) ) . '" target="_blank" title="' . __( 'Pin Us on Pinterest', 'dino' ) . '"><i class="fa fa-pinterest"></i></a>';endif;
if( dino_theme_option( 'vs-social-linkedin' ) ) :
    echo '<a href="' . esc_url( dino_theme_option( 'vs-social-linkedin' ) ) . '" target="_blank" title="' . __( 'Find Us on LinkedIn', 'dino' ) . '"><i class="fa fa-linkedin"></i></a>';endif;
if( dino_theme_option( 'vs-social-tumblr' ) ) :
    echo '<a href="' . esc_url( dino_theme_option( 'vs-social-tumblr' ) ) . '" target="_blank" title="' . __( 'Find Us on Tumblr', 'dino' ) . '"><i class="fa fa-tumblr"></i></a>';endif;
if( dino_theme_option( 'vs-social-flickr' ) ) :
    echo '<a href="' . esc_url( dino_theme_option( 'vs-social-flickr' ) ) . '" target="_blank" title="' . __( 'Find Us on Flickr', 'dino' ) . '"><i class="fa fa-flickr"></i></a>';endif;
?>
        </div>
		<div class="clear"></div>
	</div>
</div></div>

<div id="back_top"><i class="fa fa-angle-up"></i></div>

</div>

<?php wp_footer();?>
</body>
</html>
