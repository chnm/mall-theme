(function($) {
    $(document).ready( function() {
        if ($('.layout-scavenger-hunt').length > 0) {
            $('.content > h2').hide();
        }
        var flag = false;
        $('.item-expanded img').bind('touchstart mousedown', function(e) {
            if (!flag) {
              flag = true;
              setTimeout(function(){ flag = false; }, 100);
              $(this).siblings('.found-actions').toggle();
            }
            return false
        });

        $('.item-collapsed').click(function() {
            $(this).next().slideToggle();
            $(this).toggleClass('open');
        });
        
        $('a.text, a.read, a.hunt-item').click(function(e) {
            e.preventDefault();
        });

        $('a.text').bind('touchstart mousedown', function(e) {
            $(this).parent().siblings('.transcript').slideToggle();
        });

        $('a.done').bind('touchstart mousedown', function(e) {
            $(this).parent().hide();
            $(this).parent().siblings('.transcript').hide();
        })
    });
})(jQuery)
