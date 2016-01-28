<div class="container" align="center">
    <div class="row">
        {{ partial('index/parcial/header') }}

        <div class="col-md-10 col-md-offset-1 ss-form-container">

            {{ form('persona/create',"class":"","method":"post") }}

            {{ content() }}

            <div class="col-xs-12 col-md-12">
                <div class="center scaffold">
                    <div class="col-xs-12 col-md-12" style="margin-bottom: 25px;">
                        <h2 class="pull-left">Datos Personales
                            <br>
                            <small>Identifiquese para comenzar la encuesta</small>
                        </h2>
                    </div>

                    <!-- ----------------------- ENCUESTA FORM PART I -------------------------- -->
                    <div class="col-xs-12 col-md-6 form-group">
                        <span class="obligatorio pull-left">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                        <label for="persona_apellido" class=" pull-left">Apellido</label>
                        {{ text_field('persona_apellido','placeholder':'Ingrese el apellido','maxlength':'60','class':'form-control','required':'') }}
                    </div>
                    <div class="col-xs-12 col-md-6 form-group">
                        <span class="obligatorio pull-left">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                        <label for="persona_nombre" class=" pull-left">Nombre</label>
                        {{ text_field('persona_nombre','placeholder':'Ingrese el nombre','maxlength':'60','class':'form-control','required':'') }}
                    </div>
                    <div class="col-xs-12 col-md-6 form-group">
                        <span class="obligatorio pull-left">[<i class="fa fa-asterisk"></i>]&nbsp;</span>
                        <label for="persona_correo" class=" pull-left">Correo</label>
                        {{ email_field('persona_correo','placeholder':'ejemplo@imps.org.ar','maxlength':'60','class':'form-control','required':'') }}
                    </div>
                    <div class="col-xs-12 col-md-6 form-group">
                        <label for="persona_telefono" class=" pull-left">Telefono <small>(opcional)</small></label>
                        {{ text_field('persona_telefono','placeholder':'Ingrese únicamente números','maxlength':'60','class':'form-control') }}
                    </div>
                    <div class="col-xs-12 col-md-6 form-group">
                        <label for="persona_telefono" class=" pull-left">Ciudad <small>(opcional)</small></label>
                        {{ text_field('persona_ciudad','placeholder':'Ingrese la ciudad','maxlength':'60','class':'form-control') }}
                    </div>
                    <div class="col-xs-12 col-md-5 col-md-offset-3 form-group pull-right">
                        {{ submit_button('COMENZAR','class':'form-control btn btn-info ') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>