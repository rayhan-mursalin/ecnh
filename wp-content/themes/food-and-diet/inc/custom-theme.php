<?php
/**
 * Implements the settings options for food_diet.
 *
 * @package CodePeople
 * @subpackage Food_Diet
 * @since Food & Diet 1.0.1
 *
 */

 
/**
 * Sets the tabs for multiple customzation options
 */
function fd_theme_admin_tabs( $current = 'layout' ) {
    $tabs = array( 'layout' => __( 'Layout Settings', 'food_diet' ), 'header' => __( 'Header Settings', 'food_diet' ));
    echo '<div id="icon-themes" class="icon32" style="clear: Both;"><br></div>';
    echo '<h2 class="nav-tab-wrapper" style="margin: 1.5em 0;">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=food-diet-setup&fd_theme_tab=$tab'>".$name."</a>";
    }
    echo '</h2>';
    
    // Create the settings form
?>    
    <style>
        .postbox{ margin: 5px 15px 2px; }
    </style>
    <form method="post" action="<?php admin_url( 'themes.php?page=food-diet-setup' ); ?>">
<?php
    wp_nonce_field( __FILE__, "fd-settings-page" );
    switch( $current ){
        case 'header':
            fd_header_tab();
        break;
        default:
            fd_layout_tab();
        break;
    }
?>        
        <div class="submit"><input type="submit" class="button-primary" value="<?php _e('Update Settings', 'food_diet'); ?>" />
    </form>
<?php
} 

function fd_layout_tab(){
    if( isset($_POST['fd-settings-page']) && wp_verify_nonce( $_POST['fd-settings-page'], __FILE__  ) ){
        echo '<div class="updated"><p><strong>'.__( 'Settings Updated', 'food_diet' ).'</strong></div>';
        
        $fd_copyright = array(
            'text' => stripslashes($_POST['fd_copyright_text']),
            'url'  => stripslashes($_POST['fd_copyright_url'])
        );
        set_fd_theme_options( 'copyright', $fd_copyright );
        set_fd_theme_options( 'active_layout', $_POST['fd_layout'] );
        set_fd_theme_options( 'logo', $_POST['fd_logo'] );
    }
    
    $fd_logo = fd_theme_options_raw('logo');
    ?>
    <div class="postbox">
		<h3 class='hndle' style="padding:5px;"><span><?php _e('Website Logo', 'food_diet'); ?></span></h3>
        <div class="inside">
            <table class="form-table" style="display: inline-block;">
                <tr valign="top">
                    <td><?php _e('Select the website logo', 'food_diet'); ?></td>
                    <td>
                        <input type="text" name="fd_logo" value="<?php if( !empty( $fd_logo ) ) print $fd_logo; ?>" />
                        <input type="button" value="Browser" onclick="fd_get_img('fd_logo');" />
                    </td>
                </tr>
            </table>
        </div>
    </div>
 <?php
    // Layout
    $fd_layout = fd_theme_options_raw('active_layout');    
    $layouts = fd_theme_options_raw('layouts');
?>    
    <div class="postbox">
		<h3 class='hndle' style="padding:5px;"><span><?php _e('Select Layout', 'food_diet'); ?></span></h3>
        <div class="inside">
            <table class="form-table" style="display: inline-block;">
                <?php
                    $first_row  = '';
                    $second_row = '';
                    foreach($layouts as $key => $layout){
                        $first_row .= '<td>'.((!empty($layout['image'])) ? '<img src="'.get_template_directory_uri().'/images/'.$layout['image'].'" />' : '').'</td>';
                        $second_row .= '<td><input type="radio" name="fd_layout" value="'.$key.'" '.( ( $key == $fd_layout) ? 'CHECKED' : '' ).' /> '.$layout['name'].'</td>';
                    }
                    print '<tr>'.$first_row.'</tr>';
                    print '<tr>'.$second_row.'</tr>';
                ?>
            </table>
        </div>
    </div>
<?php    
    
    
    // Animation
    $fd_copyright = fd_theme_options_raw('copyright');    
?>    
    <div class="postbox">
		<h3 class='hndle' style="padding:5px;"><span><?php _e('Copyright', 'food_diet'); ?></span></h3>
        <div class="inside">
            <table class="form-table" style="display: inline-block;">
                <tr valign="top">
                    <td><?php _e('Copyright text', 'food_diet'); ?></td>
                    <td><input type="text" name="fd_copyright_text" value="<?php if(!empty($fd_copyright['text'])) print esc_attr($fd_copyright['text']); ?>" /></td>
                </tr>
                <tr valign="top">
                    <td><?php _e('Copyright URL', 'food_diet'); ?></td>
                    <td><input type="text" name="fd_copyright_url" value="<?php if(!empty($fd_copyright['url'])) print esc_attr($fd_copyright['url']); ?>" /></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="postbox">
		<h3 class='hndle' style="padding:5px;"><span>Premium Version</span></h3>
        <div class="inside">
            <p>
                The <strong>premium version</strong> of the theme includes advanced options that allow the creation of a professional and very functional website:
            </p>
            <ul>
                <li>- Allows to activate a <strong>slideshow in homepage</strong> to display the posts included in it.</li>
                <li>- Allows to activate a <strong>search in place</strong>, such that searching results are loading while terms are typed.</li>
                <li>- Allows to display <strong>Ads</strong>, in the corner top-right of website.</li>
                <li>- Allows to integrate the website with <strong>Google Analytics</strong> to follow the statistics of website.</li>
                <li>- Allows to display buttons for sharing the website pages in the most extended <strong>social networks</strong> (Facebook, Twitter and Google+).</li>
                <li>- Allows to insert a <strong>"Contact Us" page</strong> to receive the reviews and requests from customers. The contact page is protected with captcha code to avoid automatics spams.</li>
            </ul>
            <p><a href="http://wordpress.dwbooster.com/themes/food-diet" class="button" target="_blank">Premium Version of Theme</a>  <a href="http://www.dreamweaverdownloads.com/wpinstall/food-diet/" class="button" target="_blank">Go to Demo of Premium Version</a></p>
        </div>
    </div>
<?php
}

function fd_header_tab(){
    if( isset($_POST['fd-settings-page']) && wp_verify_nonce( $_POST['fd-settings-page'], __FILE__  ) ){
        echo '<div class="updated"><p><strong>'.__( 'Settings Updated', 'food_diet' ).'</strong></div>';
        
        $fd_title = array(
            'animate' => ( ( isset($_POST['fd_animate_title']) ) ? true : false ),
            'effect'  => $_POST['fd_title_effect']
        );
        set_fd_theme_options('title', $fd_title);
        
        $fd_tagline = array(
            'animate' => ( ( isset($_POST['fd_animate_tagline']) ) ? true : false ),
            'effect'  => $_POST['fd_tagline_effect']
        );
        set_fd_theme_options('tagline', $fd_tagline);
        
        $fd_header_background = array();
        $_POST['fd_header_background_image'] = trim( $_POST['fd_header_background_image'] );
        if( !empty( $_POST['fd_header_background_image'] ) ) $fd_header_background['image'] = $_POST['fd_header_background_image'];
        $fd_header_background['repeat'] = $_POST['fd_header_background_repeat'];
        $fd_header_background['vertical_align'] = $_POST['fd_header_background_vertical_align'];
        $fd_header_background['horizontal_align'] = $_POST['fd_header_background_horizontal_align'];
        set_fd_theme_options('header_background', $fd_header_background);
    }
    
    // Animation
    $fd_title = fd_theme_options_raw('title');    
    $fd_tagline = fd_theme_options_raw('tagline');    
    $effects = array('flash', 'bounce',  'shake', 'tada', 'swing', 'wobble', 'pulse', 'flip', 'flipInX', 'flipOutX', 'flipInY', 'flipOutY', 'fadeIn', 'fadeInUp', 'fadeInDown', 'fadeInLeft', 'fadeInRight', 'fadeInUpBig', 'fadeInDownBig', 'fadeInLeftBig', 'fadeInRightBig', 'fadeOut', 'fadeOutUp', 'fadeOutDown', 'fadeOutLeft', 'fadeOutRight', 'fadeOutUpBig', 'fadeOutDownBig', 'fadeOutLeftBig', 'fadeOutRightBig', 'bounceIn', 'bounceInDown', 'bounceInUp', 'bounceInLeft', 'bounceInRight', 'bounceOut', 'bounceOutDown', 'bounceOutUp', 'bounceOutLeft', 'bounceOutRight', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'hinge', 'rollIn', 'rollOut');
?>    
    <div class="postbox">
		<h3 class='hndle' style="padding:5px;"><span><?php _e('Title & Tagline Appearance', 'food_diet'); ?></span></h3>
        <div class="inside">
            <table class="form-table" style="display: inline-block;">
                <tr valign="top">
                    <td><?php _e('Animate title', 'food_diet'); ?></td>
                    <td><input type="checkbox" name="fd_animate_title" <?php if($fd_title['animate']) print 'CHECKED' ; ?> /></td>
                    <td><?php _e('effect', 'food_diet'); ?></td>
                    <td>
                        <select name="fd_title_effect">
                        <?php
                            foreach($effects as $effect){
                                print '<option value="'.$effect.'" '.( ( $effect == $fd_title['effect'] ) ? 'SELECTED' : '' ).'>'.$effect.'</option>';
                            }
                        ?>    
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <td><?php _e('Animate tagline', 'food_diet'); ?></td>
                    <td><input type="checkbox" name="fd_animate_tagline" <?php if($fd_tagline['animate']) print 'CHECKED' ; ?> /></td>
                    <td><?php _e('effect', 'food_diet'); ?></td>
                    <td>
                        <select name="fd_tagline_effect">
                        <?php
                            foreach($effects as $effect){
                                print '<option value="'.$effect.'" '.( ( $effect == $fd_tagline['effect'] ) ? 'SELECTED' : '' ).'>'.$effect.'</option>';
                            }
                        ?>    
                        </select>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php
        $header_background = fd_theme_options_raw('header_background');
    ?>
    <div class="postbox">
		<h3 class='hndle' style="padding:5px;"><span><?php _e('Background Image', 'food_diet'); ?></span></h3>
        <div class="inside">
            <table class="form-table" style="display: inline-block;">
                <tr valign="top">
                    <td><?php _e('Select an image for header\'s background', 'food_diet'); ?></td>
                    <td>
                        <input type="text" name="fd_header_background_image" value="<?php if( !empty( $header_background['image'] ) ) print $header_background['image']; ?>" />
                        <input type="button" value="Browser" onclick="fd_get_img('fd_header_background_image');" />
                    </td>
                </tr>
                <tr valign="top">
                    <td><?php _e('Repeat', 'food_diet'); ?></td>
                    <td>
                        <select name="fd_header_background_repeat">
                        <?php
                            $bg_repeat = array('no-repeat', 'repeat', 'repeat-x', 'repeat-y');
                            foreach($bg_repeat as $repeat){
                                print '<option value="'.$repeat.'" '.( ( $repeat == $header_background['repeat'] ) ? 'SELECTED' : '' ).'>'.$repeat.'</option>';
                            }
                        ?>    
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <td><?php _e('Align image horizontally at', 'food_diet'); ?></td>
                    <td>
                        <select name="fd_header_background_horizontal_align">
                        <?php
                            $horizontal_align = array('left', 'center', 'right');
                            foreach($horizontal_align as $align){
                                print '<option value="'.$align.'" '.( ( $align == $header_background['horizontal_align'] ) ? 'SELECTED' : '' ).'>'.$align.'</option>';
                            }
                        ?>    
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <td><?php _e('Align image vertically at', 'food_diet'); ?></td>
                    <td>
                        <select name="fd_header_background_vertical_align">
                        <?php
                            $vertical_align = array('top', 'center', 'bottom');
                            foreach($vertical_align as $align){
                                print '<option value="'.$align.'" '.( ( $align == $header_background['vertical_align'] ) ? 'SELECTED' : '' ).'>'.$align.'</option>';
                            }
                        ?>    
                        </select>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php   
}

