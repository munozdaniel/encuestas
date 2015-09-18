/**
 * Created by dmunioz on 18/09/2015.
 */
jQuery(function($) {

    //Initiat WOW JS
    new WOW().init();
    //smoothScroll
    smoothScroll.init();

    // FORMULARIO DE CONTACTOS
    var form = $('#main-contact-form');
    form.submit(function(event){
        event.preventDefault();
        var form_status = $('<div class="form_status"></div>');
        $.ajax({
            url: $(this).attr('action'),
            beforeSend: function(){
                form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Enviando Correo...</p>').fadeIn() );
            }
        }).done(function(data){
            form_status.html('<p class="text-success">Gracias por contactarnos, en breve se estarán comunicando con usted.</p>').delay(3000).fadeOut();
        });
    });



    //Google Map
    var latitude = $('#google-map').data('latitude');
    var longitude = $('#google-map').data('longitude');
    function initialize_map() {
        var myLatlng = new google.maps.LatLng(latitude,longitude);
        var mapOptions = {
            zoom: 14,
            scrollwheel: false,
            center: myLatlng
        };
        var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize_map);

});