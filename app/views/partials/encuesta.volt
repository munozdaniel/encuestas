
<div class="container">
    <div class="row">

        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">ENCUESTA COMPLEJO MELEWE </h2>
            <p class="text-center wow fadeInDown">Contesta la encuesta y <strong>participa del sorteo </strong>  de una estadia en Melewe!! <ins>3 Noches para 2 Personas</ins></p>
        </div>
        <div class ="col-md-10 col-md-offset-1 ss-form-container">

            {{ form('encuesta/guardar',"class":"","method":"post") }}

            {{ content() }}

            <div class ="col-md-12">
                <div class="center scaffold">
                    <h2>Melewe</h2><br>
                    <!-- ----------------------- ENCUESTA FORM PART I -------------------------- -->
                    <div class="col-md-4">
                        <div class="espacio-form">
                            <label>{{ encuestaForm.label('encuesta_nroUnidad') }}</label><br>
                            {{ encuestaForm.render('encuesta_nroUnidad') }} <span class="obligatorio"> *</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="espacio-form">
                            <label>{{ encuestaForm.label('encuesta_cantDias') }}</label><br>
                            {{ encuestaForm.render('encuesta_cantDias') }} <span class="obligatorio"> *</span>
                        </div>
                    </div>
                    <div class="col-md-4 espacio-form">
                        <div class="">
                            <label></i>{{ encuestaForm.label('encuesta_tipoPax') }}</label><br>
                            {{ encuestaForm.render('encuesta_tipoPax') }} <span class="obligatorio"> *</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="espacio-form">
                            <label> {{ encuestaForm.label('encuesta_fechaEstadia') }}</label><br>
                            {{ encuestaForm.render('encuesta_fechaEstadia') }}<span class="obligatorio"> *</span>
                        </div>
                    </div>
                    <div class ="col-md-12">
                        <div class="espacio-form">
                            <label>{{ encuestaForm.label('encuesta_primeraVisita') }}</label><br>
                            {{ encuestaForm.render('encuesta_primeraVisita') }}<br>
                        </div>

                        <!-- ----------------------- RECEPCION FORM -------------------------- -->
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
                            <label>Hubo algún inconveniente?</label><br>
                            {{ recepcionForm.render('recepcion_inconvenientes') }}
                            <br>
                            <label>Comentarios</label><br>
                            {{ recepcionForm.render('recepcion_comentarios') }}
                            <br>
                        </div>
                        <!-- ----------------------- UNIDAD FORM -------------------------- -->
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
                            <label>Hubo algún inconveniente?</label><br>

                            {{ unidadForm.render('unidad_inconveniente') }}
                            <br>
                            <label>Comentarios</label><br>
                            {{ unidadForm.render('unidad_comentarios') }}
                            <br>
                        </div>
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
                            <label>Comentarios</label><br>
                            {{ personalForm.render('personal_comentarios') }}
                            <br>
                        </div>
                        <!-- ----------------------- ENCUESTA FORM PART II -------------------------- -->

                        <div class="espacio-form">
                            <span id="colC">
                                <label>Como estuvo compuesto su grupo?</label><span class="obligatorio"> *</span><br>
                                {{ encuestaForm.render('composicion_id') }}<br>
                                {{ encuestaForm.render('encuesta_otroComposicionGrupo') }}
                            </span>
                        </div>
                        <div class="espacio-form">
                            <span id="colR">
                                <label>Donde hizo la reserva?</label><span class="obligatorio"> *</span><br>
                                {{ encuestaForm.render('reservacion_id') }}<br>
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
                        <label>Porque eligió este destino?</label>
                        <div class="espacio-form">
                            {{ encuestaForm.render('motivo_id') }}
                        </div>
                        <label>Observaciones</label>
                        <div class="espacio-form">
                            {{ encuestaForm.render('encuesta_observacion') }}
                        </div>
                        <div>
                            {{ encuestaForm.render('recaptcha') }}
                        </div>
                    </div>
                </div>
                <!-- ---------------------------------------------------- -->
                <ul class="pager">
                    <li class="col-md-12">
                        {{ submit_button("Continuar >>", "class": "btn btn-success") }}
                    </li>
                </ul>
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
        alert("campo: "+campo + " - id: "+id + " - valor: "+valor);

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