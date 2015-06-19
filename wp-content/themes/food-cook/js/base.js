(function($){
	jQuery(document).ready(function($){		
		$("#nav .menu-toggle").click(function(){					   
			var term = $("#nav .menu").css("display");
			if(term == "none"){$("#nav .menu").css("display","block");}else{$("#nav .menu").css("display","none");}		   
		});
		
		jQuery('#back_top').click(function(){
			jQuery('html, body').animate({scrollTop:0}, 'normal');return false;
		});	
		jQuery(window).scroll(function(){
			if(jQuery(this).scrollTop() !== 0){jQuery('#back_top').fadeIn();}else{jQuery('#back_top').fadeOut();}
		});
		if(jQuery(window).scrollTop() !== 0){jQuery('#back_top').show();}else{jQuery('#back_top').hide();}
	});
})(jQuery);