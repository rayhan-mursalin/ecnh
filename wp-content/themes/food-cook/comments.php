<?php
/**
 * The template for displaying Comments.
 *
 */
if(post_password_required())return;?>

<?php if(have_comments()):?>
<div id="comments">
	<ol class="comment-list">
		<?php wp_list_comments(array('callback'=>'dino_theme_comment'));?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :?>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link('<i class="fa fa-arrow-left"></i> Older Comments'); ?></div>
		<div class="alignright"><?php next_comments_link('Newer Comments <i class="fa fa-arrow-right"></i>'); ?></div>
        <div class="clear"></div>
	</div>
	<?php endif;?>
    
	<?php if ( ! comments_open() && get_comments_number() ) : ?>
	<p class="no-comments"><i class="fa fa-exclamation-circle"></i> Comments are closed</p>
	<?php endif; ?>

</div>
<?php endif;?>

<?php //comment_form(); ?>
<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$fields =  array(
	'author' => '<div class="input-container"><input id="author" type="text" aria-required="true" tabindex="1" size="22" value="'.esc_attr($commenter['comment_author']).'" name="author" '.$aria_req.' autocomplete="off" /><span>'.__('Name').' '.($req?'*':'').'</span></div>',
	'email' => '<div class="input-container"><input id="email" type="text" aria-required="true" tabindex="2" size="22" value="'.esc_attr($commenter['comment_author_email']).'" name="email" '.$aria_req.' autocomplete="off" /><span>'.__('Email').' '.($req?'*':'').'</span></div>',
	'url' => '<div class="input-container"><input id="url" type="text" aria-required="true" tabindex="3" size="22" value="'.esc_attr($commenter['comment_author_url']).'" name="url" autocomplete="off" /><span>'.__('Website').'</span></div>'
);
$comments_args = array(
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
    'fields' =>  $fields,
	'comment_field'        => '<div class="input-container-full"><textarea id="comment" tabindex="4" rows="10" cols="58" name="comment" autocomplete="off" /></textarea></div><div class="input-container-full"><button class="button" type="submit">Post Comment</button></div>',
	'cancel_reply_link'    => '<i class="fa fa-times-circle"></i>'
);
comment_form($comments_args);
?>