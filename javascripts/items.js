(function($) {
    $(document).ready( function() {
        $('.images a:first-of-type').addClass('current');
        $('.thumbnails img:first-of-type').addClass('current');
        $('.thumbnails img').click( function() {
            var selected_title = $(this).attr('title');
            $('.current').removeClass('current');
            $(this).addClass('current');
            $('.images img[title="' + selected_title + '"]').parent().addClass("current");
        });
    });
})(jQuery)