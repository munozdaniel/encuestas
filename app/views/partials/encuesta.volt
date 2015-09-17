
<div class="container">
    <div class="row">

        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">ENCUESTA COMPLEJO MELEWE </h2>
            <p class="text-center wow fadeInDown">Contesta la encuesta y <strong>participa del sorteo </strong>  de una estadia en Melewe!! <ins>3 Noches para 2 Personas</ins></p>
        </div>
        <div class ="col-md-10 col-md-offset-1 ss-form-container">

            {{ form('index/index',"class":"","method":"post") }}

            {{ content() }}

            <div class ="col-md-12">
                <div class="center scaffold">
                    <h2>Melewe</h2><br>
                    <!-- ----------------------- ENCUESTA FORM PART I -------------------------- -->
                    <div class="col-md-4">
                        <div class="espacio-form">

                            <span class="obligatorio mizquierda">*</span>{{ encuestaForm.label('encuesta_nroUnidad') }}<br>
                            {{ encuestaForm.render('encuesta_nroUnidad') }}
                            {% if encuestaForm.messages('encuesta_nroUnidad') != "" %}
                                <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" data-original-title="{{ encuestaForm.messages('encuesta_nroUnidad')}}">
                                    <i class="fa fa-exclamation-circle obligatorio"></i>
                                </a>
                            {% endif %}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="espacio-form">
                            <span class="obligatorio mizquierda">*</span>{{ encuestaForm.label('encuesta_cantDias') }}<br>
                            {{ encuestaForm.render('encuesta_cantDias') }}
                            {% if encuestaForm.messages('encuesta_cantDias') != "" %}
                                <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" data-original-title="{{ encuestaForm.messages('encuesta_cantDias')}}">
                                    <i class="fa fa-exclamation-circle obligatorio"></i>
                                </a>
                            {% endif %}
                        </div>
                    </div>
                    <div class="col-md-4 espacio-form">
                        <div class="">
                            <span class="obligatorio mizquierda">*</span>{{ encuestaForm.label('encuesta_tipoPax') }}<br>
                            {{ encuestaForm.render('encuesta_tipoPax') }}
                            {% if encuestaForm.messages('encuesta_tipoPax') != "" %}
                                <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" data-original-title="{{ encuestaForm.messages('encuesta_tipoPax')}}">
                                    <i class="fa fa-exclamation-circle obligatorio"></i>
                                </a>
                            {% endif %}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="espacio-form">
                            <span class="obligatorio mizquierda">*</span> {{ encuestaForm.label('encuesta_fechaEstadia') }}<br>
                            {{ encuestaForm.render('encuesta_fechaEstadia') }}
                            {% if encuestaForm.messages('encuesta_fechaEstadia') != "" %}
                                <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" data-original-title="{{ encuestaForm.messages('encuesta_fechaEstadia')}}">
                                    <i class="fa fa-exclamation-circle obligatorio"></i>
                                </a>
                            {% endif %}
                        </div>
                    </div>

                    <div class ="col-md-12">
                        <div class="espacio-form">
                            <label>{{ encuestaForm.label('encuesta_primeraVisita') }}</label><br>
                            {{ encuestaForm.render('encuesta_primeraVisita') }}<br>
                        </div>
                    </div>
                    <!-- ----------------------- RECEPCION FORM -------------------------- -->
                    <div class="col-md-12">
                        <div class="table-responsive espacio-form"><hr>
                            <h4>RECEPCIÓN <br> <small>Cual es su opinión con respecto a:</small></h4>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Nivel de desmpeño<span class="obligatorio"> *</span></td>
                                    <td>{{ recepcionForm.render('recepcion_nivelDesempeno') }}</td>
                                </tr>
                                <tr>
                                    <td>Tiempo de respuesta<span class="obligatorio"> *</span></td>
                                    <td>{{ recepcionForm.render('recepcion_tiempoRespuesta') }}</td>
                                </tr>
                                <tr>
                                    <td>Trato y Cordialidad<span class="obligatorio"> *</span></td>
                                    <td>{{ recepcionForm.render('recepcion_tratoYCordialidad') }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="espacio-form">
                            {{ recepcionForm.label('recepcion_inconvenientes') }}<br>
                            {{ recepcionForm.render('recepcion_inconvenientes') }}
                            <br>
                            {{ recepcionForm.label('recepcion_comentarios') }}
                            <br>
                            {{ recepcionForm.render('recepcion_comentarios') }}
                            <br>
                        </div>
                    </div>
                    <!-- ----------------------- UNIDAD FORM -------------------------- -->
                    <div class="col-md-12">
                        <div class="table-responsive espacio-form"><hr>
                            <h4>UNIDADES <br> <small>Cual es su opinión con respecto a:</small></h4>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Higiene de las instalaciones<span class="obligatorio"> *</span></td>
                                    <td>{{ unidadForm.render('puntaje_higiene') }}</td>
                                </tr>
                                <tr>
                                    <td>Equipamiento<span class="obligatorio"> *</span></td>
                                    <td>{{ unidadForm.render('puntaje_equipamiento') }}</td>
                                </tr>
                                <tr>
                                    <td>Confort<span class="obligatorio"> *</span></td>
                                    <td>{{ unidadForm.render('puntaje_confort') }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="espacio-form">
                            {{ unidadForm.label('unidad_inconveniente') }}
                            <br>
                            {{ unidadForm.render('unidad_inconveniente') }}
                            <br>
                            {{ unidadForm.label('unidad_comentarios') }}
                            <br>
                            {{ unidadForm.render('unidad_comentarios') }}
                            <br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- ----------------------- PERSONAL FORM -------------------------- -->
                        <div class="table-responsive espacio-form"><hr>
                            <h4>PERSONAL <br> <small>Cual es su opinión con respecto al Trato y Cordialidad de:</small></h4>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Personal de Administración<span class="obligatorio"> *</span></td>
                                    <td>{{ personalForm.render('personal_tratoAdministrativo') }}</td>
                                </tr>
                                <tr>
                                    <td>Mucamas<span class="obligatorio"> *</span></td>
                                    <td>{{ personalForm.render('personal_tratoMucamas') }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="espacio-form">
                            {{ personalForm.label('personal_comentarios') }}
                            <br>
                            {{ personalForm.render('personal_comentarios') }}
                            <br>
                        </div>
                        <hr>
                    </div>

                    <!-- ----------------------- ENCUESTA FORM PART II -------------------------- -->
                    <div class="col-md-12">
                        <div class="col-md-6 espacio-form">
                            <span id="colC">
                                <span class="obligatorio mizquierda"> *</span>{{ encuestaForm.label('composicion_id') }}<br>
                                {{ encuestaForm.render('composicion_id') }}
                                {% if encuestaForm.messages('composicion_id') != "" %}
                                    <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" data-original-title="{{ encuestaForm.messages('composicion_id')}}">
                                        <i class="fa fa-exclamation-circle obligatorio"></i>
                                    </a>
                                {% endif %}
                                <br>
                                {{ encuestaForm.render('encuesta_otroComposicionGrupo') }}

                            </span>
                        </div>
                        <div class="col-md-6 espacio-form">
                            <span id="colR">
                                <span class="obligatorio mizquierda"> *</span>{{ encuestaForm.label('reservacion_id') }}<br>
                                {{ encuestaForm.render('reservacion_id') }}
                                {% if encuestaForm.messages('reservacion_id') != "" %}
                                    <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" data-original-title="{{ encuestaForm.messages('reservacion_id')}}">
                                        <i class="fa fa-exclamation-circle obligatorio"></i>
                                    </a>
                                {% endif %}
                                <br>
                                {{ encuestaForm.render('encuesta_otroDondeReservo') }}
                            </span>
                        </div>
                        <div class="col-md-6 espacio-form">
                            <label>De que manera recibe información?</label>
                            {% for info in informacion %}

                                <div>
                                    {% set nombre = "informacion_id"~(info.informacion_id-1) %}
                                    {% if loop.last %}
                                        <label class="sub-items">
                                            {{ encuestaForm.render(nombre) }}
                                            {{ info.informacion_nombre }}
                                        </label>
                                        {{ encuestaForm.render('encuesta_otroComoSeInforma') }}
                                    {% else %}
                                        <label class="sub-items">
                                            {{ encuestaForm.render(nombre) }}
                                            {{ info.informacion_nombre }}
                                        </label>
                                    {% endif %}
                                </div>
                            {% endfor %}
                        </div>
                        <div class="col-md-6 espacio-form">
                            <label>Conoce algún otro Melewe? Cuál?</label>
                            {% for unComplejo in complejos %}
                                <div>
                                    <label class="sub-items">
                                        {% set nombre = "complejo_id"~(unComplejo.complejo_id-1) %}
                                        {{ encuestaForm.render(nombre) }}
                                        {{ unComplejo.complejo_nombre }}
                                    </label>
                                </div>
                            {% endfor %}
                        </div>

                        {{ encuestaForm.label('motivo_id') }}
                        <div class="espacio-form">
                            {{ encuestaForm.render('motivo_id') }}
                        </div>
                        {{ encuestaForm.label('encuesta_observacion') }}
                        <div class="espacio-form">
                            {{ encuestaForm.render('encuesta_observacion') }}
                        </div>
                        <div class="espacio-form ">
                            {% if encuestaForm.messages('recaptcha') != "" %}
                                <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" data-original-title="{{ encuestaForm.messages('recaptcha')}}">
                                    <i class="fa fa-exclamation-circle obligatorio"></i>
                                </a>
                            {% endif %}
                            {{ encuestaForm.render('recaptcha') }}

                        </div>
                    </div>
                </div>
                <!-- ---------------------------------------------------- -->
                <div class="espacio-form col-md-6 col-md-offset-3" align="center">
                    {{ encuestaForm.render('Continuar') }}
                </div>
            </div><!--Fin: col-md-12 -->

            {{ end_form() }}
        </div><!-- col-md-8 col-md-offset-2 -->

    </div>

</div>
<!-- Script para habilitar/deshabilitar el textbox -->
<script type="text/javascript">
    function habilitarOtro(campo,id,valor) {
       //alert(campo+"-"+id+"- "+valor);
        $('#'+campo).prop('disabled',valor != 4);
    }
    function habilitarDeshabilitarCampo(campo,id,valor) {
        //alert("campo: "+campo + " - id: "+id + " - valor: "+valor);

        if($('#'+id).prop('checked'))
        {
            $('#'+campo).prop('disabled',false);
        }
        else
        {
            $('#'+campo).prop('disabled',true);
        }
        //$('#'+campo).prop('disabled',valor != 1);

    }
</script>