{{ content() }}
<div class="container">
    <div class="row">
        <br><br>
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">ENCUESTA COMPLEJO MELEWE CAVIAHUE</h2>
            <p class="text-center wow fadeInDown">Contesta la encuesta y <strong>participa del sorteo </strong>  de una estadia en Melewe!! <ins>3 Noches para 2 Personas</ins></p>
        </div>
        <div class ="col-md-10 col-md-offset-2">

            {{ form('encuesta/guardarVilla',"class":"form-login","method":"post") }}

            <ul class="pager">
                <li class="previous pull-left">
                    {{ link_to("index/index", "&larr; Volver") }}
                </li>

            </ul>
            <div class ="col-md-12">
                <div class="center scaffold">
                    <h2>Melewe</h2>
                    <!-- ----------------------- ENCUESTA FORM PART I -------------------------- -->

                    <div class="espacio-form">
                        <label>Estuve alojando en la unidad Nº</label><br>
                        {{ encuestaForm.render('unidad') }}
                    </div>


                    <div class="espacio-form">
                        <label>Fecha de Estadía</label><br>
                        {{ encuestaForm.render('fechaEstadia') }}
                    </div>

                    <div class="espacio-form">
                        <label>Es su primer visita?</label><br>
                        <label class="sub-items">SI</label>
                        {{ encuestaForm.render('rbtPrimeraVisitaSi') }}
                        <label class="sub-items">NO</label>
                        {{ encuestaForm.render('rbtPrimeraVisitaNo') }}
                    </div>

                    <!-- ----------------------- RECEPCION FORM -------------------------- -->
                    <div class="table-responsive espacio-form"><hr>
                        <h4>RECEPCIÓN <br> <small>Cual es su opinión con respecto a:</small></h4>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Nivel de desmpeño</td>
                                <td>{{ recepcionForm.render('nivelDesempeno') }}</td>
                            </tr>
                            <tr>
                                <td>Tiempo de respuesta</td>
                                <td>{{ recepcionForm.render('tiempoRespuesta') }}</td>
                            </tr>
                            <tr>
                                <td>Trato y Cordialidad</td>
                                <td>{{ recepcionForm.render('tratoCordialidad') }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="espacio-form">
                        <label>Hubo algún inconveniente?</label><br>
                        <label class="sub-items">SI</label>
                        {{ recepcionForm.render('rbtInconvenienteSi') }}
                        <label class="sub-items">NO</label>
                        {{ recepcionForm.render('rbtInconvenienteNo') }}
                        <br>
                        <label>Comentarios</label><br>
                        {{ recepcionForm.render('comentarios') }}
                        <br>
                    </div>
                    <!-- ----------------------- UNIDAD FORM -------------------------- -->
                    <div class="table-responsive espacio-form"><hr>
                        <h4>UNIDADES <br> <small>Cual es su opinión con respecto a:</small></h4>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Higiene de las instalaciones</td>
                                <td>{{ unidadForm.render('higiene') }}</td>
                            </tr>
                            <tr>
                                <td>Equipamiento</td>
                                <td>{{ unidadForm.render('equipamiento') }}</td>
                            </tr>
                            <tr>
                                <td>Confort</td>
                                <td>{{ unidadForm.render('confort') }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="espacio-form">
                        <label>Hubo algún inconveniente?</label><br>
                        <label class="sub-items">SI</label>
                        {{ unidadForm.render('rbtInconvenienteSi') }}
                        <label class="sub-items">NO</label>
                        {{ unidadForm.render('rbtInconvenienteNo') }}
                        <br>
                        <label>Comentarios</label><br>
                        {{ unidadForm.render('comentarios') }}
                        <br>
                    </div>
                    <!-- ----------------------- PERSONAL FORM -------------------------- -->
                    <div class="table-responsive espacio-form"><hr>
                        <h4>PERSONAL <br> <small>Cual es su opinión con respecto al Trato y Cordialidad de:</small></h4>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Higiene de las instalaciones</td>
                                <td>{{ personalForm.render('personal') }}</td>
                            </tr>
                            <tr>
                                <td>Equipamiento</td>
                                <td>{{ personalForm.render('mucamas') }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="espacio-form">
                        <label>Comentarios</label><br>
                        {{ personalForm.render('comentarios') }}
                        <br>
                    </div>
                    <!-- ----------------------- ENCUESTA FORM PART II -------------------------- -->

                    <div class="espacio-form">
                        <label>Como estuvo compuesto su grupo?</label><br>
                        {{ encuestaForm.render('composicionGrupo') }}<br>
                        {{ encuestaForm.render('composicionGrupoOtro') }}
                    </div>
                    <div class="espacio-form">
                        <label>Donde hizo la reserva?</label><br>
                        {{ encuestaForm.render('dondeReservo') }}<br>
                        {{ encuestaForm.render('dondeReservoOtro') }}

                    </div>
                    <div class="col-md-6 espacio-form">
                        <label>De que manera recibe información?</label>
                        {% for info in informacion %}
                            <div>
                                <label class="sub-items">
                                    {% set nombre = "complejo"~(info.informacion_id-1) %}
                                    {{ encuestaForm.render(nombre) }}
                                    {{ info.informacion_nombre }}
                                </label>
                            </div>
                        {% endfor %}
                    </div>
                    <div class="col-md-6 espacio-form">
                        <label>Conoce algún otro Melewe? Cuál?</label>
                        {% for unComplejo in complejos %}
                            <div>
                                <label class="sub-items">
                                    {% set nombre = "complejo"~(unComplejo.complejo_id-1) %}
                                    {{ encuestaForm.render(nombre) }}
                                    {{ unComplejo.complejo_nombre }}
                                </label>
                            </div>
                        {% endfor %}
                    </div>
                    <label>Porque eligió este destino?</label>
                    <div class="espacio-form">
                         {{ encuestaForm.render('motivoDeEleccion') }}
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
    function habilitarOtro(id,valor) {
        //alert(id+"- "+valor);
        $('#'+id+'Otro').prop('disabled',valor != 1);
    }
</script>