<div class="container" align="center">
    <div class="row">
        {{ partial('index/parcial/header') }}

        <div class="col-md-10 col-md-offset-1 ss-form-container">
            {{ form('adicional/create',"id":"crearAdicional","method":"post") }}


            <div class="col-xs-12 col-md-12">
                {{ content() }}

                <div class="center scaffold">
                    <div class="col-xs-12 col-md-12" style="margin-bottom: 25px;">
                        <h2 class="pull-left">Inquilinos</h2>

                        <h3 class="pull-right">
                            <small>Paso 5/5</small>
                        </h3>
                    </div>
                    <!-- ----------------------- ENCUESTA FORM PART I -------------------------- -->
                    <div class="col-xs-12 col-md-6">
                        <div class=" form-group">

                        <fieldset>
                            <legend style="border-bottom:none !important;">
                                <i class="fa fa-question-circle"></i>
                                <label for="adicional_reservaId"><ins>Donde hizo la reserva?</ins></label></legend>
                            <select id="adicional_reservaId" name="adicional_reservaId" class="form-control"
                                    onchange="habilitarOtro('adicional_reservaOtro',this.id,this.value)">
                                <option value="">Seleccione una opción</option>
                                <option value="1">EN EL DPTO DE TURISMO DE MI INSTITUCIÓN</option>
                                <option value="2">EN EL COMPLEJO</option>
                                <option value="3">EN NEUQUEN</option>
                                <option value="4">OTRO</option>
                            </select>
                            <input type="text" id="adicional_reservaOtro" name="adicional_reservaOtro"
                                             class="form-control" placeholder="Otro lugar" disabled="">
                        </fieldset>
                            </div>
                    </div>

                    <div class="col-md-6 col-xs-12 ">
                        <div class=" form-group">
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#adicional_grupo').multiselect({
                                        nonSelectedText: '<span >SELECCIONAR LOS GRUPOS</span>',
                                        enableHTML: true
                                    });
                                });
                            </script>
                            <!-- Build your select: -->
                            <fieldset>
                                <legend style="border-bottom:none !important;">
                                    <label for="adicional_grupo">
                                        <i class="fa fa-question-circle"></i>
                                        <ins> Como estuvo compuesto su grupo?</ins>
                                    </label>
                                </legend>
                                <select id="adicional_grupo" name="adicional_grupo[]" class="form-control"
                                        multiple="multiple">
                                    <option value="AMIGOS"> AMIGOS</option>
                                    <option value="PAREJAS"> PAREJAS</option>
                                    <option value="FAMILIA"> FAMILIA</option>
                                </select>
                            </fieldset>
                            <br>

                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                               <span>
                                   {{ text_field('adicional_grupoOtro','class':'form-control','placeholder':'OTRO GRUPO (opcional)') }}
                               </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <hr>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class=" form-group">
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#adicional_informacion').multiselect({
                                        nonSelectedText: '<span >SELECCIONAR LOS MEDIOS</span>',
                                        enableHTML: true
                                    });
                                });
                            </script>
                            <!-- Build your select: -->
                            <fieldset>
                                <legend style="border-bottom:none !important;">
                                    <label for="adicional_informacion">
                                        <i class="fa fa-question-circle"></i>
                                        <ins> De que manera recibe la información?</ins>
                                    </label>
                                </legend>
                                <select id="adicional_informacion" name="adicional_informacion[]" class="form-control"
                                        multiple="multiple">
                                    <option value="WEB"> WEB</option>
                                    <option value="FOLLETOS"> FOLLETOS</option>
                                    <option value="CORREO ELECTRONICO"> CORREO ELECTRONICO</option>
                                </select>
                            </fieldset>
                            <br>

                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                               <span>
                                   {{ text_field('adicional_informacionOtro','class':'form-control','placeholder':'OTRO MEDIO (opcional)') }}
                               </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-xs-12">
                        <div class=" form-group">
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#adicional_motivo').multiselect({
                                        nonSelectedText: '<span >SELECCIONAR LOS MOTIVOS</span>',
                                        enableHTML: true
                                    });
                                });
                            </script>
                            <!-- Build your select: -->
                            <fieldset>
                                <legend style="border-bottom:none !important;">
                                    <label for="adicional_motivo">
                                        <i class="fa fa-question-circle"></i>
                                        <ins> Porque eligió este destino?</ins>
                                    </label>
                                </legend>
                                <select id="adicional_motivo" name="adicional_motivo[]" class="form-control"
                                        multiple="multiple">
                                    <option value="ES EL MEJOR PARA DESCANSAR"> ES EL MEJOR PARA DESCANSAR</option>
                                    <option value="ES EL MAS BARATO"> ES EL MAS BARATO</option>
                                    <option value="POR LOS ACTIVOS"> POR LOS ACTIVOS</option>
                                    <option value="NO CONOCIA"> NO CONOCIA</option>
                                </select>
                            </fieldset>
                            <br>

                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                               <span>
                                   {{ text_field('adicional_motivoOtro','class':'form-control','placeholder':'OTRO MOTIVO (opcional)') }}
                               </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <hr>
                    </div>

                    {# ===================================================================================== #}
                    <div class="col-md-6 col-xs-12">
                        <div class=" form-group">
                            <fieldset>
                                <legend style="border-bottom:none !important;">
                                    <label for="adicional_conocimiento">
                                        <i class="fa fa-question-circle"></i>
                                        <ins> Conoce algún otro MELEWE?</ins>
                                    </label>
                                </legend>

                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('#adicional_conocimiento').multiselect({
                                            nonSelectedText: '<span >SELECCIONAR LOS COMPLEJOS</span>',
                                            enableHTML: true
                                        });
                                    });
                                </script>
                                <!-- Build your select: -->
                                <select id="adicional_conocimiento" name="adicional_conocimiento[]" class="form-control"
                                        multiple="multiple">
                                    <option value="1"> SAN MARTIN DE LOS ANDES</option>
                                    <option value="2"> VILLA LA ANGOSTURA</option>
                                    <option value="3"> MOQUEHUE</option>
                                    <option value="4"> LAS GRUTAS</option>
                                    <option value="5"> CAVIAHUE</option>
                                </select>
                            </fieldset>

                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <fieldset>
                            <legend style="border-bottom:none !important;">
                                <label for="adicional_conocimiento">
                                    <ins> Desea agregar alguna observación?</ins>
                                </label>
                            </legend>
                            <textarea id="adicional_observacion" name="adicional_observacion" maxlength="200"
                                      placeholder="INGRESE SU COMENTARIO (máx. 200 caracteres)" rows="4" class="col-xs-12 col-md-12" >
                            </textarea>
                        </fieldset>
                    </div>

                    <div class="col-xs-12 col-md-12 form-group">
                        <hr>
                        {{ submit_button('CONTINUAR','id':'continuarAdicional','class':'form-control btn btn-success ') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function habilitarOtro(campo, id, valor) {
        //alert(campo+"-"+id+"- "+valor);
        $('#' + campo).prop('disabled', valor != 4);
    }
    function habilitarDeshabilitarCampo(campo, id, valor) {
        //alert("campo: "+campo + " - id: "+id + " - valor: "+valor);

        if ($('#' + id).prop('checked')) {
            $('#' + campo).prop('disabled', false);
        }
        else {
            $('#' + campo).prop('disabled', true);
        }
        //$('#'+campo).prop('disabled',valor != 1);

    }

</script>
<!-- Initialize the plugin: -->
