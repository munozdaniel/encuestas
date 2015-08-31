jQuery(function($) {'use strict';

    // Navigation Scroll
    $(window).scroll(function(event) {
      //  Scroll();
    });

    /*

       //Redirige para que aparesca en la parte superior de la pagina y las transacciones entre las secciones sea lenta.
     $('.navbar-collapse ul li a').on('click', function() {

        $('html, body').animate({scrollTop: $(this.hash).offset().top -5}, 1000);
        return false;
    });
    */
/*
    // User define function:
    function Scroll() {
        var contentTop      =   [];
        var contentBottom   =   [];
        var winTop      =   $(window).scrollTop();
        var rangeTop    =   200;
        var rangeBottom =   500;
        $('.navbar-collapse').find('.scroll a').each(function(){
            contentTop.push( $( $(this).attr('href') ).offset().top);
            contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
        })
        $.each( contentTop, function(i){
            if ( winTop > contentTop[i] - rangeTop ){
                $('.navbar-collapse li.scroll')
                    .removeClass('active')
                    .eq(i).addClass('active');
            }
        })
    };
*/
    $('#tohash').on('click', function(){
        $('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
        return false;
    });

    // accordian
    $('.accordion-toggle').on('click', function(){
        $(this).closest('.panel-group').children().each(function(){
            $(this).find('>.panel-heading').removeClass('active');
        });

        $(this).closest('.panel-heading').toggleClass('active');
    });
    })
