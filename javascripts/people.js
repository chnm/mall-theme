(function($) {

    $(document).ready( function() {
        $('.by-image').click(function(e) {
            e.preventDefault();
            $('.persons.alpha').hide();
            $('.pagination').show()
            $('.persons.images').show();
        });
        $('.alphabetically').click(function(e) {
            e.preventDefault();
            $('.persons.images').hide();
            $('.pagination').hide()
            $('.persons.alpha').show();
        });
    });
  
})(jQuery)