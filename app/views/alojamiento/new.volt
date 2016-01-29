<div class="container" align="center">
    <div class="row">
        {{ partial('index/parcial/header') }}

        <div class="col-md-10 col-md-offset-1 ss-form-container">

            {{ form('alojamiento/create',"class":"","method":"post") }}

            {{ content() }}

            <div class="col-xs-12 col-md-12">
                <div class="center scaffold">
                    <div class="col-xs-12 col-md-12" style="margin-bottom: 25px;">
                        <h2 class="pull-left">El Alojamiento</h2>
                        <h3  class="pull-right"><small>Paso 1/5</small></h3>
                    </div>
                    {{ hidden_field('encuesta_id','value':encuesta_id   ) }}
                    <!-- ----------------------- ENCUESTA FORM PART I -------------------------- -->
                    <div class="col-xs-12 col-md-6 form-group">
                        <span class="obligatorio pull-left">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                        {{ alojamientoForm.label('alojamiento_nroUnidad',['class':'pull-left']) }}
                        {{ alojamientoForm.render('alojamiento_nroUnidad') }}
                    </div>
                    <div class="col-xs-12 col-md-6 form-group">
                        <span class="obligatorio  pull-left">[<i class="fa fa-asterisk"></i>] &nbsp;</span>
                        {{ alojamientoForm.label('alojamiento_cantDias',['class':'pull-left']) }}
                        {{ alojamientoForm.render('alojamiento_cantDias') }}
                    </div>
                    <div class="col-xs-12 col-md-6 form-group">
                        <span class="obligatorio  pull-left">[<i class="fa fa-asterisk"></i>] &nbsp;</span>
                        {{ alojamientoForm.label('alojamiento_tipoPaxId',['class':'pull-left']) }}
                        {{ alojamientoForm.render('alojamiento_tipoPaxId') }}
                    </div>
                    <div class="col-xs-12 col-md-6 form-group">
                        <span class="obligatorio  pull-left">[<i class="fa fa-asterisk"></i>] &nbsp;</span>
                        {{ alojamientoForm.label('alojamiento_fechaEstadia',['class':'pull-left']) }}
                        {{ alojamientoForm.render('alojamiento_fechaEstadia') }}
                    </div>

                    <div class="col-xs-12 col-md-6 form-group">
                        <span class="obligatorio  pull-left">[<i class="fa fa-asterisk"></i>] &nbsp;</span>
                        {{ alojamientoForm.label('alojamiento_primeraVisita',['class':'pull-left']) }}
                        {{ alojamientoForm.render('alojamiento_primeraVisita') }}
                    </div>
                    <div class="col-xs-12 col-md-5 col-md-offset-3 form-group pull-right">
                        {{ submit_button('CONTINUAR','class':'form-control btn btn-info ') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>