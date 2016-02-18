<div class="container" align="center">
    <div class="row">
        {{ partial('index/parcial/header') }}

        <div class="col-md-10 col-md-offset-1 ss-form-container">

            {{ form('personal/create',"class":"","method":"post") }}


            <div class="col-xs-12 col-md-12">
                {{ content() }}

                <div class="center scaffold">
                    <div class="col-xs-12 col-md-12" style="margin-bottom: 25px;">
                        <h2 class="pull-left">El Personal</h2>
                        <h3  class="pull-right"><small>Paso 4/5</small></h3>
                    </div>
                    <!-- ----------------------- -------------------------- -->
                    {{ hidden_field('encuesta_id','value':encuesta_id   ) }}

                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            <span class="obligatorio pull-left">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                            {{ personalForm.label('personal_puntajeAdministrativoId',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-12">
                            {{ personalForm.render('personal_puntajeAdministrativoId') }}                            <hr>

                        </div>
                    </div>
                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            <span class="obligatorio pull-left">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                            {{ personalForm.label('personal_puntajeMucamaId',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-12">
                            {{ personalForm.render('personal_puntajeMucamaId') }}                            <hr>

                        </div>
                    </div>
                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            {{ personalForm.label('personal_tieneInconvenientes',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-7">
                            {{ personalForm.render('personal_tieneInconvenientes') }}
                        </div>
                    </div>

                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            {{ personalForm.label('personal_comentario',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-11">
                            {{ personalForm.render('personal_comentario') }}
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
        document.getElementById("personal_comentario").required = document.getElementById('personal_tieneInconvenientes').value == 1;
    }
</script>