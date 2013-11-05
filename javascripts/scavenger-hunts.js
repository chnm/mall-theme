jQuery(document).ready( function() {
    if (jQuery('.layout-scavenger-hunt').length > 0) {
        jQuery('.content > h2').hide();
    }
    var flag = false;
    jQuery('.layout-scavenger-hunt img').bind('touchstart mousedown', function(e) {
        if (!flag) {
          flag = true;
          setTimeout(function(){ flag = false; }, 100);
          jQuery(this).siblings('.found-actions').toggle();
        }
        return false
    });
    jQuery('a.text').bind('touchstart mousedown', function(e) {
        e.preventDefault();
        jQuery(this).parent().siblings('.transcript').toggle();
    });
    jQuery('a.done').bind('touchstart mousedown', function(e) {
        e.preventDefault();
        jQuery(this).parent().hide();
        jQuery(this).parent().siblings('.transcript').hide();
    })
});

new Fastclick(document.body);