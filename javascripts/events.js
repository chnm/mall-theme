(function($) {

    $(document).ready( function() {
        if ($('body').hasClass('event')) {
            var $period = $('#period-nav');
            var periodTop = $('div.items').position().top;
            
            var windowTop;
            var $window = $(window);
            
            $window.resize(function() {
                periodTop = $('div.items').position().top;
                positionNav();
            });

            $window.scroll( function() {
                positionNav();
            });

            function positionNav() {
                windowTop = $window.scrollTop();
                if (windowTop >= periodTop) {
                    $period.addClass('fixed');
                } else {
                    if ($period.hasClass('fixed')) {
                        $period.removeClass('fixed');
                    }
                }
            }
            
            /* localScroll.js settings */
            
            $.localScroll.defaults.axis = 'y';
            
            $('#period-nav').localScroll({
                duration: 1000,
                offset: -48
            });
        }
    });
  
})(jQuery)