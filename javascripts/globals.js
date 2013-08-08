(function($) {

    $(document).ready( function() {
        if (!$('body').hasClass('home')) {
            /* Create the mobile menu and its icons */
            var menu_icon = $('<a href="#navigation" class="icon-alone"><span aria-hidden="true" data-icon="&#xe005;"></span><span class="screen-reader-text">Menu</span></a>');
            var search_icon = $('<a href="#search" class="icon-alone"><span aria-hidden="true" data-icon="&#xe000;"></span><span class="screen-reader-text">Search</span></a>');
            var mobile_nav = $('<nav id="mobile-nav"></nav>');
            $("#site-title").after(mobile_nav);
            mobile_nav.prepend(search_icon);
            mobile_nav.prepend(menu_icon);
            
            $("#search-form").hide();
            $("#navigation").hide();
            
            $("#mobile-nav a").click(function(e) {
                e.preventDefault();
                var content = $(this).attr("href");
                $(content).toggle();
            });
        } else {
            if ($(window).width() < 640) {
                $("#search").insertAfter("#navigation");
            }            
            
            $(window).resize( function() {
                if ($(window).width() < 640) {
                    $("#search").insertAfter("#navigation");
                } else {
                    $("#search").insertBefore("#navigation");
                }
            });
        }
    });
  
})(jQuery)