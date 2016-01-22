<div class="container" align="center">
    <div class="row">

        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">ENCUESTA COMPLEJO MELEWE </h2>

            <p class="text-center wow fadeInDown">Contesta la encuesta y <strong>participa del sorteo </strong> de una
                estadia en Melewe!!
                <ins>3 Noches para 2 Personas</ins>
            </p>
        </div>
        <div class="col-md-10 col-md-offset-1 ss-form-container">

            {{ form('index/saveAlojamiento',"class":"","method":"post") }}

            {{ content() }}

            <div class="col-xs-12 col-md-12">
                <div class="center scaffold">
                    <h2>Paso 1/5</h2><br>
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
                        {{ alojamientoForm.label('alojamiento_tipoPax',['class':'pull-left']) }}
                        {{ alojamientoForm.render('alojamiento_tipoPax') }}
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
                    <div class="col-xs-12 col-md-12 form-group">
                        {{ submit_button('CONTINUAR','class':'form-control btn btn-success ') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>