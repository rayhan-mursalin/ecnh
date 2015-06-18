/**
 * fooddiet.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function() {
    jQuery(function($){
        $('.menu-toggle').click(function(){
            $('.nav-menu').toggle();
        });
        $('.entry-meta').each(function(){var e = $(this); if(/^\s*$/.test(e.html())) e.hide(); });
    });
} )();