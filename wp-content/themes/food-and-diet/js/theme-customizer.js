( function( $ ) {
    var fd_image;
    
	window["fd_image_url"] = function(html) {
        file_url = jQuery(html).attr('href');
		if (file_url) {
			fd_image.val(file_url);
		}
		tb_remove();
		window.send_to_editor = window.fd_send_to_editor_default;
    }

    window["fd_send_to_editor_default"] = window.send_to_editor;
    window['fd_get_img'] = function(name){
        fd_image = $('input[name="'+name+'"]');
        window.send_to_editor = window.fd_image_url;
        tb_show('', 'media-upload.php?TB_iframe=true');
        return false;
    };    

} )( jQuery );