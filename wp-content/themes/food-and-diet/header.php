<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package CodePeople
 * @subpackage Food_Diet
 * @since Food & Diet 1.0.1
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
        <?php echo fd_theme_options( 'logo' ); ?>
        <nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'food_diet' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'food_diet' ); ?>"><?php _e( 'Skip to content', 'food_diet' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
        <?php 
            $header_background = fd_theme_options('header_background'); 
        ?>    
		<hgroup class="clear" <?php print $header_background; ?> >
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><h1 class="site-title" <?php $fd_title = fd_theme_options( 'title' ); if( $fd_title['animate'] ) echo 'style="visibility: hidden;"'; ?> ><?php bloginfo( 'name' ); ?></h1></a>
			<h2 class="site-description" <?php $fd_tagline = fd_theme_options( 'tagline' ); if( $fd_tagline['animate'] ) echo 'style="visibility: hidden;"'; ?> ><?php bloginfo( 'description' ); ?></h2>
        </hgroup>
        
        <div class="clear"></div>
    </header><!-- #masthead -->

	<div id="main" class="wrapper">