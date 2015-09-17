<div class="container">
    <div class="row">
        <br>
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Dejanos tus datos para el sorteo!</h2>
            <p class="text-center wow fadeInDown"></p>
        </div>


        <div class ="col-md-10 col-md-offset-1 ss-form-container espacio-form">
            <div>
                {{ content() }}
            </div>
            <br>
            <br>
            {{ form('class': 'form-search') }}
            <table class="signup" align="center">
                <tr>
                    <td align="right">{{ form.label('sorteo_nombreApellido') }}</td>
                    <td>
                        {{ form.render('sorteo_nombreApellido') }}
                        {# Mostrar Error #}
                        {% if form.messages('sorteo_nombreApellido') != "" %}
                            <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" data-original-title="{{ form.messages('sorteo_nombreApellido')}}">
                                <i class="fa fa-exclamation-circle obligatorio"></i>
                            </a>
                        {% endif %}

                    </td>
                </tr>
                <tr>
                    <td align="right">{{ form.label('sorteo_correo') }}</td>
                    <td>
                        {{ form.render('sorteo_correo') }}
                        {% if form.messages('sorteo_correo') != "" %}
                            <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" data-original-title="{{ form.messages('sorteo_correo')}}">
                                <i class="fa fa-exclamation-circle obligatorio"></i>
                            </a>
                        {% endif %}
                    </td>
                </tr>
                <tr>
                    <td align="right">{{ form.label('sorteo_telefono') }}</td>
                    <td>
                        {{ form.render('sorteo_telefono') }}
                        {% if form.messages('sorteo_telefono') != "" %}
                            <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" data-original-title="{{ form.messages('sorteo_telefono')}}">
                                <i class="fa fa-exclamation-circle obligatorio"></i>
                            </a>
                        {% endif %}
                    </td>
                </tr>
                <tr>
                    <td align="right">{{ form.label('sorteo_ciudad') }}</td>
                    <td>
                        {{ form.render('sorteo_ciudad') }}
                        {% if form.messages('sorteo_ciudad') != "" %}
                            <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" data-original-title="{{ form.messages('sorteo_ciudad')}}">
                                <i class="fa fa-exclamation-circle obligatorio"></i>
                            </a>
                        {% endif %}
                    </td>
                </tr>

                <tr>
                    <td align="right"></td>
                    <td>{{ form.render('Participar') }}</td>
                </tr>
            </table>
                <br><br><br><br>
        </div>
        <hr>
    </div>
</div>
