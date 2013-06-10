(function($) {

    $(document).ready( function() {
        if ($('body').hasClass('exploration-answer')) {
            var items_number = $('.related-items .image').length;
            $('.related-items').css('width', 100 * items_number + "%");
            
        }
    });
  
})(jQuery)