<div align="center">
    <button class="btn btn-primary btn-lg" onclick="activarDesactivarMapa()">Activar/Desactivar Mapa</button>
</div>
<br>
<section id="contact">
    <div id="google-map" style="height:650px" data-latitude="-38.9538913" data-longitude="-68.06898039999999" ></div>
    <div class="container-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <div id="formulario" class="contact-form">
                        <h3>Información de Contacto</h3>

                        <address id="address_id">
                            <strong>Turismo Central Neuquén</strong><br>
                            Fotheringham 107, (8300) Neuquén<br>
                            <strong>turismo@imps.tur.ar</strong><br>
                            <abbr title="Phone">Teléfono:</abbr> (0299) 4479921
                        </address>

                        <form id="main-contact-form" name="contact-form" method="post" action="#">
                            {% for item in contacto%}
                                {% if loop.last %}
                                    {{ item }}
                                {% else %}
                                    <div class="form-group">
                                        {{ item }}
                                    </div>
                                {% endif %}

                            {% endfor %}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#bottom-->
<script type="text/javascript">

    function activarDesactivarMapa() {
        $('#google-map').toggleClass('mostrar-mapa');
        $('#formulario').toggleClass('ocultar-consulta-form');
    }
</script>