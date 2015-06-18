<?php
/*
 * Implement the methods related to theme options 
 *
 * @package CodePeople
 * @subpackage Food_Diet
 * @since Food & Diet 1.0.1
 *
 */
 
 
 /*
 * Default options
 */ 
if( empty( $fd_default_options ) ){
    $fd_default_options = array(
        'layouts' => array(
            0 => array(
                'image' => 'default_layout.png',
                'name'  => __( 'Default', 'food_diet' ),
            ),
            
            1 => array(
                'image' => 'dark_layout.png',
                'name'  => __( 'Dark', 'food_diet' ),
                'css'   => 'dark.css'
            ),
            
            2 => array(
                'image' => 'light_layout.png',
                'name'  => __( 'Light', 'food_diet' ),
                'css'   => 'light.css'
            )
        ),
        'active_layout' => 0,
        'header_background' => array(
            'repeat' => 'no-repeat',
            'vertical_align' => 'bottom',
            'horizontal_align' => 'right'
        ),
        'logo' => get_template_directory_uri().'/images/logo.png',
        'title' => array(
            'animate' => true,
            'effect'  => 'flipInY'
        ),            
        'tagline' => array(
            'animate' => true,
            'effect'  => 'bounceInDown'
        ),
        'copyright' => array(
            'text'  => __( 'Theme developed by CodePeople', 'food_diet' ),
            'url'   => 'http://wordpress.dwbooster.com' 
        )
    );
}

/*
 * Set theme options
 */
function set_fd_theme_options($var, $val){
    global $fd_default_options;
    $theme_options = get_option(FD_OPTIONS);
    if( $theme_options === false ){
        update_option( FD_OPTIONS, $fd_default_options );
        $theme_options = $fd_default_options;
    }
    $theme_options[$var] = $val;
    update_option( FD_OPTIONS, $theme_options );
} 
 
/*
 * Get theme options
 */
function fd_theme_options_raw($var){
    global $fd_default_options;
    $theme_options = get_option(FD_OPTIONS);
    if( $theme_options === false ){
        update_option( FD_OPTIONS, $fd_default_options );
        $theme_options = $fd_default_options;
    }
    
    return ( !empty($theme_options[$var]) ) ? $theme_options[$var] : '';
}

function fd_theme_options( $var ){
    $val = fd_theme_options_raw( $var );
    return ( !empty( $val ) ) ? fd_parse_option( $var, $val ) : '';
}

/*
 * Get the theme option in the correct format
 */
    
function fd_parse_option( $opt, $val ){
    $r = '';
    
    switch($opt){
        case 'logo':
            $r = '<img src="'.esc_url( $val ).'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" class="logo" />';
        break;
        case 'copyright':
            if( !empty( $val['text'] ) ){
                $r = $val['text'];
                if( !empty( $val['url'] ) ){
                    $r = '<a href="'.esc_url( $val['url'] ).'">'.$r.'</a>';
                }
            }
        break;
        case 'header_background':
            if( !empty( $val['image'] ) ){
                $r = 'style="background: url(\''.$val['image'].'\') '.$val['horizontal_align'].' '.$val['vertical_align'].' '.$val['repeat'].'"';
            }
        break;
        default:
            $r = $val;
        break;
    }
    
    return $r;
}