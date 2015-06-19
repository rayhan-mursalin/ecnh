<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset');?>">
<meta name="viewport" content="width=device-width" />

<title><?php wp_title('|',true,'right');?></title>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
<?php if(dino_theme_option('vs-favicon')):echo '<link rel="icon" href="'.esc_url(dino_theme_option('vs-favicon')).'">';endif;?>

<?php wp_head();?>
</head>

<body <?php body_class(); ?>>
<div id="container">

<div id="header"><div class="inner">
	<div id="caption">
    	<div id="title">
        <i class="<?php echo esc_attr(dino_theme_option('vs-logo-icon'));?>"></i>
        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
        </div>
        <?php if ( dino_theme_option( 'vs-header-search' )):?>
        <div id="divsearch">
            <?php get_search_form(); ?>
            <div class="clear"></div>
        </div>
        <?php endif;?>
        
        <div class="clear"></div>
	</div>
</div></div>

<div id="navigation"><div class="inner">
	<div id="nav" class="<?php if((is_home())or(is_single())or(is_search())){echo 'mr';}?>">
<div class="menu-toggle"><a href="javascript:void(0)"><?php _e( 'Menu', 'dino' ); ?></a></div>
<?php wp_nav_menu(array('theme_location'=>'menu'));?>
    </div>
</div></div>