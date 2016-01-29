<div class="container" align="center">
    <div class="row">
        {{ partial('index/parcial/header') }}

        <div class="col-md-10 col-md-offset-1 ss-form-container">
            {{ form('adicional/create',"id":"formAdicional","method":"post") }}


            <div class="col-xs-12 col-md-12">
                {{ content() }}

                <div class="center scaffold">
                    <div class="col-xs-12 col-md-12" style="margin-bottom: 25px;">
                        <h2 class="pull-left">Inquilinos</h2>

                        <h3 class="pull-right">
                            <small>Paso 5/5</small>
                        </h3>
                    </div>
                    <!-- -----------------------  -------------------------- -->
                    {{ hidden_field('encuesta_id','value':encuesta_id   ) }}

                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class=" form-group">
                            <fieldset>
                                <legend style="border-bottom:none !important;">
                                    <span class="obligatorio ">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                                    <label for="adicional_reservaId">
                                        <ins>Donde realizó la reserva?</ins>
                                    </label>
                                </legend>

                                <datalist id="lista_reserva">
                                    <option value="EN EL DPTO DE TURISMO DE MI INSTITUCIÓN"></option>
                                    <option value="EN EL COMPLEJO"></option>
                                    <option value="EN NEUQUEN"></option>
                                </datalist>
                                <input type="text" name="adicional_reservaId" list="lista_reserva" required=""
                                       autocomplete="off"
                                       class="form-control" placeholder="Ingrese un nuevo lugar si es necesario"/>
                            </fieldset>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-6 col-xs-12 ">
                        <div class=" form-group">
                            <fieldset>
                                <legend style="border-bottom:none !important;">
                                    <label for="adicional_grupo">
                                        <span class="obligatorio pull-left">[<i
                                                    class="fa fa-asterisk"></i>]&nbsp;</span>
                                        <ins> Como estuvo compuesto su grupo?</ins>
                                    </label>
                                </legend>
                                <label>
                                    <input type="checkbox" class="margin-left-10" name="adicional_grupo[]" value="AMIGOS"/>
                                    <span>AMIGOS</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-10" name="adicional_grupo[]" value="PAREJAS"/>
                                    <span>PAREJAS</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-10" name="adicional_grupo[]" value="FAMILIA"/>
                                    <span>FAMILIA</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-10" id="otroGrupo" name="adicional_grupo[]"
                                           value="OTRO"
                                           onClick="toggle('otroGrupo', 'adicional_grupoOtro')"/>
                                    <span>OTRO</span>
                                </label>
                                {{ text_field('adicional_grupoOtro','class':'form-control ','disabled':'','placeholder':'Ingrese otro grupo') }}
                            </fieldset>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-6 col-xs-12 ">
                        <div class=" form-group">
                            <fieldset>
                                <legend style="border-bottom:none !important;">
                                    <label for="adicional_informacion">
                                        <span class="obligatorio pull-left">[<i
                                                    class="fa fa-asterisk"></i>]&nbsp;</span>
                                        <ins> De que manera recibe la información?</ins>
                                    </label>
                                </legend>
                                <label>
                                    <input type="checkbox" class="margin-left-10" name="adicional_informacion[]"
                                           value="WEB"/>
                                    <span>WEB</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-10" name="adicional_informacion[]"
                                           value="FOLLETOS"/>
                                    <span>FOLLETOS</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-10" name="adicional_informacion[]"
                                           value="CORREO ELECTRONICO"/>
                                    <span>CORREO ELECTRONICO</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-10" id="otraInfo"
                                           name="adicional_informacion" value="OTRO"
                                           onClick="toggle('otraInfo', 'adicional_informacionOtro')"/>
                                    <span>OTRO</span>
                                </label>
                                {{ text_field('adicional_informacionOtro','class':'form-control ','disabled':'','placeholder':'Ingrese otra fuente') }}
                            </fieldset>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-6 col-xs-12 ">
                        <div class=" form-group">
                            <fieldset>
                                <legend style="border-bottom:none !important;">
                                    <label for="adicional_motivo">
                                        <span class="obligatorio pull-left">[<i
                                                    class="fa fa-asterisk"></i>]&nbsp;</span>
                                        <ins> Porque eligió este destino?</ins>
                                    </label>
                                </legend>
                                <label>
                                    <input type="checkbox" class="margin-left-10" name="adicional_motivo[]" value="ES EL MEJOR PARA DESCANSAR"/>
                                    <span>ES EL MEJOR PARA DESCANSAR</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-10" name="adicional_motivo[]" value="ES EL MAS BARATO"/>
                                    <span>ES EL MAS BARATO</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-10" name="adicional_motivo[]" value="POR LOS ACTIVOS"/>
                                    <span>POR LOS ACTIVOS</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-10" name="adicional_motivo[]" value="NO CONOCIA"/>
                                    <span> NO CONOCIA</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-10" id="otroMotivo"
                                           name="adicional_motivo" value="OTRO"
                                           onClick="toggle('otroMotivo', 'adicional_motivoOtro')"/>
                                    <span> OTRO</span>
                                </label>
                                {{ text_field('adicional_motivoOtro','class':'form-control ','disabled':'','placeholder':'Ingrese otro motivo') }}
                            </fieldset>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-6 col-xs-12 ">
                        <div class=" form-group">
                            <fieldset>
                                <legend style="border-bottom:none !important;">
                                    <label for="adicional_conocimiento">
                                        <ins> Conoce algún otro MELEWE?</ins>
                                    </label>
                                </legend>
                                <label>
                                    <input type="checkbox" class="margin-left-8" name="adicional_conocimiento[]"
                                           value="1"/>
                                    <span> SAN MARTIN DE LOS ANDES</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-8" name="adicional_conocimiento[]"
                                           value="2"/>
                                    <span> VILLA LA ANGOSTURA</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-8" name="adicional_conocimiento[]"
                                           value="3"/>
                                    <span> MOQUEHUE</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-8" name="adicional_conocimiento[]"
                                           value="4"/>
                                    <span> LAS GRUTAS</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="margin-left-8" name="adicional_conocimiento[]"
                                           value="5"/>
                                    <span> CAVIAHUE</span>
                                </label>

                            </fieldset>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-12 col-xs-12">
                        <br>
                        <fieldset>
                            <legend style="border-bottom:none !important;">
                                <label for="adicional_observacion">
                                    <ins> Desea agregar alguna observación?</ins>
                                </label>
                            </legend>
                            <textarea id="adicional_observacion" name="adicional_observacion" maxlength="200"
                                      placeholder="INGRESE SU COMENTARIO (máx. 200 caracteres)" rows="4"
                                      class="col-xs-12 col-md-12">
                            </textarea>
                        </fieldset>
                    </div>

                    <div class="col-xs-12 col-md-6 col-md-offset-3 form-group">
                        <hr>
                        {{ submit_button('FINALIZAR','id':'continuarAdicional','class':'form-control btn btn-info ') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    /**
     * Controla que por lo menos un checkbox este habilitado. (uno por pregunta)
     */
    $('form').submit(function (e) {
        // si la cantidad de checkboxes "chequeados" es cero,
        // entonces se evita que se envíe el formulario y se
        // muestra una alerta al usuario
        if ($('input[name="adicional_grupo[]"]:checked').length === 0) {
            e.preventDefault();
            alert('Especifique como esta compuesto su grupo');
        }
        if ($('input[name="adicional_informacion[]"]:checked').length === 0) {
            e.preventDefault();
            alert('Especifique de que manera recibe la información');
        }
        if ($('input[name="adicional_motivo[]"]:checked').length === 0) {
            e.preventDefault();
            alert('Especifique el motivo de su elección por el complejo');
        }

    });
    /**
     * Habilita/Deshabilita un input dependiendo del checkbox
     * @param checkboxID
     * @param toggleID
     */
    function toggle(checkboxID, toggleID) {
        var checkbox = document.getElementById(checkboxID);
        var toggle = document.getElementById(toggleID);
        updateToggle = checkbox.checked ? toggle.disabled = false : toggle.disabled = true;
        if (checkbox.checked) {
            toggle.disabled = false
            toggle.required = true;
        } else {
            toggle.disabled = true
            toggle.required = false;
        }
    }
</script>
<!-- Initialize the plugin: -->
