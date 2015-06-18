<?php
/**
 * Food and Diet functions and definitions.
 *
 * @package CodePeople
 * @subpackage Food_Diet
 * @since Food and Diet 1.0.6
 *
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ){
	$content_width = 625;
}
 
/*
 * Defining Constants
 */ 
function fd_init(){
    $theme = wp_get_theme();
    define( 'FD_THEME_NAME', $theme->get( 'Name' ) );
    define( 'FD_THEME_HOMEPAGE', $theme->get( 'ThemeURI' ) );
    define( 'FD_THEME_VERSION', $theme->get( 'Version' ) );
    define( 'FD_THEME_URL', $theme->get( 'Template' ) );
    define( 'FD_OPTIONS', 'food_diet_options');
}
fd_init();    

include get_template_directory().'/inc/theme_options.php';

/* 
 * Setup the theme information
 */
function fd_setup(){
    
    load_theme_textdomain( 'food_diet', get_template_directory() . '/languages' );
    
    add_editor_style();
    
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // This theme supports a variety of post formats.
    add_theme_support( 'post-formats', array( 'aside', 'audio', 'gallery', 'image', 'link', 'video', 'quote', 'status' ) );

    if(function_exists('register_nav_menu')) {
        register_nav_menu('primary', __('Primary Nav Menu', "food_diet"));
    }

    add_theme_support( 'custom-background', array(
        'default-color' => 'FAFAFA',
    ) );
    
    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
    
}
add_action( 'after_setup_theme', 'fd_setup' );

/**
 * Enqueues scripts and styles for front-end.
 */
function fd_scripts_styles() {
    global $wp_styles;

    // jQuery is required
    wp_enqueue_script( 'jquery' );
    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    /*
     * Adds JavaScript for handling the elements in theme.
     */
    wp_enqueue_script( 'food-diet-script', get_template_directory_uri() . '/js/fooddiet.js', array(), '1.0', true );

    /*
     * Loads our main stylesheet.
     */
    wp_enqueue_style( 'food-diet-style', get_stylesheet_uri() );
    
    $active_layout = fd_theme_options_raw('active_layout');    
    $layouts = fd_theme_options_raw('layouts');
    if( $active_layout ){
        wp_enqueue_style( 'food-diet-style-'.$active_layout, get_template_directory_uri().'/css/'.$layouts[$active_layout]['css'], array('food-diet-style') );
    }
    /*
    * If textillate is enabled set the corresponding code and styles
    */
    $fd_title = fd_theme_options_raw( 'title' );
    $fd_tagline = fd_theme_options_raw( 'tagline' );
    
    if( $fd_title[ 'animate' ] || $fd_tagline[ 'animate' ] ){
        wp_enqueue_style( 'food-diet-animate-style', get_template_directory_uri() .'/css/animate.css' );
        wp_enqueue_script( 'food-diet-lettering-script', get_template_directory_uri() .'/js/jquery.lettering-0.6.1.min.js' );
        wp_enqueue_script( 'food-diet-textillate-script', get_template_directory_uri() .'/js/jquery.textillate.js' );
    }
    
    /*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'food-diet-ie', get_template_directory_uri() . '/css/ie.css', array( 'food-diet-style' ) );
	$wp_styles->add_data( 'food-diet-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'fd_scripts_styles' );

/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 */
function fd_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'fd_page_menu_args' );

/**
 * Registers our main widget area and the front page widget areas.
 */
function fd_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'food_diet' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages', 'food_diet' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'food_diet' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears on website footer', 'food_diet' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'food_diet' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears as secondary widget area on website footer', 'food_diet' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'fd_widgets_init' );

/*
* Set code in the footer
*/
function fd_footer(){
    $fd_title = fd_theme_options( 'title' );
    $fd_tagline = fd_theme_options( 'tagline' );
    if( $fd_title['animate'] ){
?>
        <script>
            jQuery( function($){
                $('.site-title').textillate({ in: { effect: '<?php print $fd_title['effect']; ?>' }});
            } );
        </script>            
<?php        
    }
    
    if( $fd_tagline['animate'] ){
?>
        <script>
            jQuery( function($){
                $('.site-description').textillate({ initialDelay: 2000, in: { effect: '<?php print $fd_tagline['effect']; ?>', delay: 3, shuffle: true } });
            } );
        </script>           
<?php        
    }
}
add_action( 'wp_footer', 'fd_footer' );

/**
 * Displays navigation to next/previous pages when applicable.
 */
function fd_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'food_diet' ); ?></h3>
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&lsaquo;</span> Older posts', 'food_diet' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rsaquo;</span>', 'food_diet' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}

/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 */
function fd_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'food_diet' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'food_diet' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'food_diet' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'food_diet' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'food_diet' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'food_diet' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}

/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function fd_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'food_diet' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'food_diet' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'food_diet' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'food_diet' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'food_diet' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'food_diet' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'food_diet' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}

/**
 * Extends the default WordPress body class
 */
function fd_body_class( $classes ) {
	if ( ! is_active_sidebar( 'sidebar-1' ) )
		$classes[] = 'full-width';
	return $classes;
}
add_filter( 'body_class', 'fd_body_class' );

/**
 * Adjusts content_width
 */
function fd_content_width() {
	if ( is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'fd_content_width' );

/**
 * Functions for theme customization
 */
function fd_settings_admin_menus(){
    add_theme_page('Food Diet Setup', 'Food Diet Setup', 'manage_options', 'food-diet-setup', 'fd_theme_settings');
}
add_action( "admin_menu", "fd_settings_admin_menus" );
 
function fd_theme_settings(){
    // Enqueue the scripts and styles for theme customize
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script( 'fd-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'jquery' ), false, true );
    
    include get_template_directory().'/inc/custom-theme.php';
    
?>       
    <h1><?php _e('Food Diet Theme Advanced Customization', 'food_diet'); ?></h1>
    <div class="clear"></div>
<?php        
    if ( isset ( $_GET['fd_theme_tab'] ) ) fd_theme_admin_tabs($_GET['fd_theme_tab']); else fd_theme_admin_tabs('layout');
   
}