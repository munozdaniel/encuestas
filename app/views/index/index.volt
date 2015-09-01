{{ content() }}
<section id="main-slider">
    <div class="owl-carousel">
        <div class="item" style="background-image: url(images/slider/bg1.jpg);">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
        <div class="item" style="background-image: url(images/slider/bg2.jpg);">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
        <div class="item" style="background-image: url('images/slider/bg2.jpg');">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
    </div><!--/.owl-carousel-->
</section><!--/#main-slider-->


<section id="features">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">ENCUESTAS

            </h2>
            <p class="text-center wow fadeInDown">Seleccione un complejo para comenzar</p>
        </div>
        <div class="row">
            <div class="col-sm-6 wow fadeInLeft">
                {{ image("images/main-feature.png", "alt": "Paisaje Encuestas", "class":"img-responsive") }}
            </div>
            <div class="col-sm-6">
                <div class="media service-box wow fadeInRight">
                    <div class="pull-left">
                        <i class="fa fa-pagelines"></i>
                    </div>
                    <div class="media-body">
                        <p>
                            {{ link_to("encuesta/villa", "Villa la Angostura", "class": "media-heading links-encuestas") }}
                            <br><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>
                        </p>
                    </div>
                </div>

                <div class="media service-box wow fadeInRight">
                    <div class="pull-left">
                        <i class="fa fa-picture-o"></i>
                    </div>
                    <div class="media-body">
                        {{ link_to("encuesta/caviahue", "Caviahue", "class": "media-heading links-encuestas") }}
                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                    </div>
                </div>

                <div class="media service-box wow fadeInRight">
                    <div class="pull-left">
                        <i class="fa fa-tree"></i>
                    </div>
                    <div class="media-body">
                        {{ link_to("encuesta/moquehue", "Moquehue", "class": "media-heading links-encuestas") }}
                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                    </div>
                </div>

                <div class="media service-box wow fadeInRight">
                    <div class="pull-left">
                        <i class="fa fa-car"></i>
                    </div>
                    <div class="media-body">
                        {{ link_to("encuesta/andes", "San Martin de los Andes", "class": "media-heading links-encuestas") }}
                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                    </div>
                </div>
                <div class="media service-box wow fadeInRight">
                    <div class="pull-left">
                        <i class="fa fa-sun-o"></i>
                    </div>
                    <div class="media-body">
                        {{ link_to("encuesta/grutas", "Las Grutas", "class": "media-heading links-encuestas") }}
                        <p>Complejo Casas y Duplex</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="get-in-touch">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Melewe</h2>
            <p class="text-center wow fadeInDown">El Placer de Vivir<br></p>
        </div>
    </div>
</section><!--/#get-in-touch-->


<section id="contact">
    <div id="google-map" style="height:650px" data-latitude="52.365629" data-longitude="4.871331"></div>
    <div class="container-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <div class="contact-form">
                        <h3>Contacto</h3>

                        <address>
                            <strong>Twitter, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>

                        <form id="main-contact-form" name="contact-form" method="post" action="#">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Asunto" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="8" placeholder="Mensaje" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#bottom-->
