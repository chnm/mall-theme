jQuery(document).ready( function() {
    if (jQuery('.layout-scavenger-hunt').length > 0) {
        jQuery('.content > h2').hide();
    }
    jQuery('.layout-scavenger-hunt img').click( function(e) {
        jQuery(this).siblings('.found-actions').slideToggle();
    });
    jQuery('a.text').unbind("click").click( function(e) {
        e.preventDefault();
        jQuery(this).siblings('.transcript').slideToggle();
    });
});