
<body id="home" class="homepage">

<header id="header">
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    {{ link_to('index/index','class':'navbar-brand', image('images/logogral.png','alt':'logo melewe')) }}

            </div>
            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    {{ elemento.getMenu() }}
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header><!--/header-->
{{ content() }}
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2015 IMPS - Instituto Municipal de Previsión Social.
            </div>
            <div class="col-sm-6">
                <ul class="social-icons">
                    <li>
                        <a href="https://www.facebook.com/complejos.melewe?fref=ts" target="_blank">
                        {{ image('images/redsocial.png','alt':'logo facebook') }}
                       </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->

