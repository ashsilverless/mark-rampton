$(function() {

var $root = $('html, body');

$('a[href^="#"]').click(function () {
    $root.animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);

    return false;
});





    /* ~~~~~~~~~~ Smooth scroll ~~~~~~~~~~ */

    $(function() {
        $('a.page-scroll').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: ($($anchor.attr('href')).offset().top - 120)
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });

    /* ~~~~~~~~~~ Overlay search ~~~~~~~~~~ */

    if($('#overlay-search').length) {
        var $overlay = $('#overlay-search');
        $('.search-button-action').click(function(){
            if ( $overlay.is(':visible') ) {
                $overlay.fadeOut();
            } else {
                $overlay.fadeIn();
            }
        });

        $('#close').click(function(){
            $overlay.fadeOut();
        });
    }


    /* ~~~~~~~~~~ Toggle content button name change ~~~~~~~~~~ */

    $('#toggle-content-button').click(function () {
        if($.trim($("#toggle-content-button").html())=='Read more') {
            $('#toggle-content-button').html('Hide');
        } else {
            $('#toggle-content-button').html('Read more');
        }
    });


    /* ~~~~~~~~~~ Add page scroll to contact link on top navbar ~~~~~~~~~~ */

    $('.navbar-default .navbar-nav .contact-link a').addClass('page-scroll');


    /* ~~~~~~~~~~ Change navbar after scroll ~~~~~~~~~~ */

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 100) {
            $(".navbar-default").addClass("navbar-scrolled");
        } else {
            $(".navbar-default").removeClass("navbar-scrolled");
        }
    });


    /* ~~~~~~~~~~ Match height ~~~~~~~~~~ */

    $(function() {
        $('.match-height').matchHeight({
            byRow: true,
            property: 'min-height',
            target: null,
            remove: false
        });
    });


    /* ~~~~~~~~~ Convert images to inline SVG ~~~~~~~~~~ */

    jQuery('img.svg').each(function(){
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        jQuery.get(imgURL, function(data) {
            var $svg = jQuery(data).find('svg');

            if(typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }

            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }

            $svg = $svg.removeAttr('xmlns:a');
            $img.replaceWith($svg);
        }, 'xml');
    });


    /* ~~~~~~~~~~ Mix it up ~~~~~~~~~~ */

    $('.mix-it-up').mixItUp();

    $('.mix-it-up').on('mixEnd', function(e, state){
        jQuery(window).trigger('resize').trigger('scroll');
    });


    /* ~~~~~~~~~~ Parallax ~~~~~~~~~~ */

    $('.parallax-window').parallax();


    /* ~~~~~~~~~~ OWL Carousel ~~~~~~~~~~ */

    $('.modal-owl').owlCarousel({
        items:1,
        center: true,
        loop:true,
        nav:true,
        margin: 10,
        dots: false,
        URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash'
    });

    $('.gallery-carousel').owlCarousel({
        items:1,
        center: true,
        loop:true,
        nav:false,
        margin: 10,
        dots: false,
        autoplay:true,
        autoplayTimeout:3000,
        mouseDrag: false,
        touchDrag: false
    });

});

(function($){
    $(document).ready(function(){
        $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).parent().siblings().removeClass('open');
            $(this).parent().toggleClass('open');
        });
    });




    
})(jQuery);
