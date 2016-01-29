<div class="container" align="center">
    <div class="row">
        {{ partial('index/parcial/header') }}

        <div class="col-md-10 col-md-offset-1 ss-form-container">

            {{ form('unidad/create',"class":"","method":"post") }}


            <div class="col-xs-12 col-md-12">
                {{ content() }}

                <div class="center scaffold">
                    <div class="col-xs-12 col-md-12" style="margin-bottom: 25px;">
                        <h2 class="pull-left">Las Unidades</h2>
                        <h3  class="pull-right"><small>Paso 3/5</small></h3>
                    </div>
                    <!-- ----------------------- -------------------------- -->
                    {{ hidden_field('encuesta_id','value':encuesta_id   ) }}

                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            <span class="obligatorio pull-left">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                            {{ unidadForm.label('unidad_puntajeHigieneId',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-12">
                            {{ unidadForm.render('unidad_puntajeHigieneId') }}                            <hr>

                        </div>
                    </div>
                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            <span class="obligatorio pull-left">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                            {{ unidadForm.label('unidad_puntajeEquipoId',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-12">
                            {{ unidadForm.render('unidad_puntajeEquipoId') }}                            <hr>

                        </div>
                    </div>
                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            <span class="obligatorio pull-left">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                            {{ unidadForm.label('unidad_puntajeConfortId',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-12">
                            {{ unidadForm.render('unidad_puntajeConfortId') }}                            <hr>

                        </div>
                    </div>
                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            {{ unidadForm.label('unidad_tieneInconvenientes',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-7">
                            {{ unidadForm.render('unidad_tieneInconvenientes') }}
                        </div>
                    </div>
                    <div class=" form-group">
                        <div class="col-xs-12 col-md-12">
                            {{ unidadForm.label('unidad_comentario',['class':'pull-left']) }}
                        </div>
                        <div class="col-xs-12 col-md-11">
                            {{ unidadForm.render('unidad_comentario') }}
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
