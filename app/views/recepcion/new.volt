<div class="container" align="center">
    <div class="row">
        {{ partial('index/parcial/header') }}

        <div class="col-md-10 col-md-offset-1 ss-form-container">

            {{ form('recepcion/create',"class":"","method":"post") }}


            <div class="col-xs-12 col-md-12">
                {{ content() }}

                <div class="center scaffold">
                    <div class="col-xs-12 col-md-12" style="margin-bottom: 25px;">
                        <h2 class="pull-left">La Recepción</h2>
                        <h3  class="pull-right"><small>Paso 2/5</small></h3>
                    </div>
                    <!-- -----------------------  -------------------------- -->
                    {{ hidden_field('encuesta_id','value':encuesta_id   ) }}

                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            <span class="obligatorio pull-left">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                            {{ recepcionForm.label('recepcion_puntajeNivelId',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-12">
                            {{ recepcionForm.render('recepcion_puntajeNivelId') }}                            <hr>

                        </div>
                    </div>
                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            <span class="obligatorio pull-left">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                            {{ recepcionForm.label('recepcion_puntajeTiempoId',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-12">
                            {{ recepcionForm.render('recepcion_puntajeTiempoId') }}                            <hr>

                        </div>
                    </div>
                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            <span class="obligatorio pull-left">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                            {{ recepcionForm.label('recepcion_puntajeTratoId',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-12">
                            {{ recepcionForm.render('recepcion_puntajeTratoId') }}                            <hr>

                        </div>
                    </div>
                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            {{ recepcionForm.label('recepcion_tieneInconvenientes',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-7">
                            {{ recepcionForm.render('recepcion_tieneInconvenientes') }}
                        </div>
                    </div>
                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            {{ recepcionForm.label('recepcion_comentario',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-11">
                            {{ recepcionForm.render('recepcion_comentario') }}
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    <div class="col-xs-12 col-md-5 col-md-offset-3 form-group pull-right">
                        {{ submit_button('CONTINUAR','class':'form-control btn btn-info ') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function asignarRequired(){
        document.getElementById("recepcion_comentario").required = document.getElementById('recepcion_tieneInconvenientes').value == 1;
    }
</script>