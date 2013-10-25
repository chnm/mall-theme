jQuery(document).ready( function() {
    jQuery('.layout-scavenger-hunt img').click( function(e) {
        jQuery(this).siblings('.found-actions').slideToggle();
    });
    jQuery('a.text').unbind("click").click( function(e) {
        e.preventDefault();
        jQuery(this).siblings('.transcript').slideToggle();
    });
});