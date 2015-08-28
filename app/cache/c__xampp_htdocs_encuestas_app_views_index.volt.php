<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistema de Encuesta sobre los complejos de Melewe.">
        <meta name="author" content="Pichun Marcia - Muñoz Daniel">
        <?php echo $this->tag->getTitle(); ?>
        <!--  CSS propios de cada pagina -->

        <!-- core CSS -->
        <?php echo $this->tag->stylesheetLink('css/bootstrap.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/font-awesome.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/animate.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/owl.carousel.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/owl.transitions.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/prettyPhoto.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/main.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/responsive.css'); ?>
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
    <body id="home" class="homepage">
        <?php echo $this->getContent(); ?>
    </body>

    <!-- Javascripts -->
    <?php echo $this->tag->javascriptInclude('js/jquery.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/bootstrap.min.js'); ?>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    
    <?php echo $this->tag->javascriptInclude('js/owl.carousel.min.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/mousescroll.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/smoothscroll.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/jquery.prettyPhoto.js'); ?>
    
    <?php echo $this->tag->javascriptInclude('js/jquery.isotope.min.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/jquery.inview.min.js'); ?>
    
    <?php echo $this->tag->javascriptInclude('js/wow.min.js'); ?>
    <?php echo $this->tag->javascriptInclude('js/inicio.js'); ?>
    <!-- JS propios de cada pagina -->

    <?php if (($this->assets->collection('footer'))) { ?>
        <?php echo $this->assets->outputJs('footer'); ?>
    <?php } ?>

</html>
