<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistema de Encuesta sobre los complejos de Melewe.">
        <meta name="author" content="Pichun Marcia - Muñoz Daniel">
        {{ get_title() }}
        <!--  CSS propios de cada pagina -->


        <!-- core CSS -->
        {{ stylesheet_link('css/bootstrap.min.css') }}
        {{ javascript_include('js/jquery.js') }}
        {{ javascript_include('js/bootstrap.min.js') }}
        {{ stylesheet_link('css/font-awesome.min.css') }}
        {{ stylesheet_link('css/animate.min.css') }}
        {{ stylesheet_link('css/owl.carousel.css') }}
        {{ stylesheet_link('css/owl.transitions.css') }}
        {{ stylesheet_link('css/prettyPhoto.css') }}
        {{ stylesheet_link('css/main.css') }}
        {{ stylesheet_link('css/responsive.css') }}
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <body id="home" class="homepage" onLoad="redireccionar()">
        {{ content() }}
    </body>

    <!-- Javascripts -->
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    {# Carrusel del inicio. Verificar si se puede utilizar solamente en el action.#}
    {{ javascript_include('js/owl.carousel.min.js') }}
    {{ javascript_include('js/mousescroll.js') }}
    {{ javascript_include('js/smoothscroll.js') }}
    {{ javascript_include('js/jquery.prettyPhoto.js') }}
    {# ISOTOPE: Verificar si se puede borrar, es posible que se utilice con el filtro de galerias.#}
    {{ javascript_include('js/jquery.isotope.min.js') }}
    {{ javascript_include('js/jquery.inview.min.js') }}
    {#Wow: Utilizado para las transiciones de los eltos.#}
    {{ javascript_include('js/wow.min.js') }}
    {{ javascript_include('js/inicio.js') }}
    <!-- JS propios de cada pagina -->

    {%  if (assets.collection("footer")) %}
        {{  assets.outputJs("footer") }}
    {% endif %}
    {%  if (assets.collection("footerInline")) %}
        {{  assets.outputInlineJs("footerInline") }}
    {% endif %}
    <!-- Include the plugin's CSS and JS: -->
    <!-- Redireccionar cada diez minutos -->
    <script language="JavaScript">
        function redireccionar() {
            setTimeout("location.href='http://www.melewe.com.ar/encuestas'", 600000);
        }
    </script>
</html>
