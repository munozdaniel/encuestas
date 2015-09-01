{{ content() }}
<div class="container">
    <div class="row">
        <br><br>
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">ENCUESTA COMPLEJO MELEWE CAVIAHUE</h2>
            <p class="text-center wow fadeInDown">Contesta la encuesta y <strong>participa del sorteo </strong>  de una estadia en Melewe!! <ins>3 Noches para 2 Personas</ins></p>
        </div>
        <div class ="col-md-8 col-md-offset-2">

            {{ form('encuesta/guardarVilla',"class":"form-login","method":"post") }}

            <ul class="pager">
                <li class="previous pull-left">
                    {{ link_to("index/index", "&larr; Volver") }}
                </li>

            </ul>
            <div class ="col-md-12">
                <div class="center scaffold">
                    <h2>Melewe</h2>
                    <!-- ----------------------- ENCUESTA FORM -------------------------- -->
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
                        <label>SI</label>
                        {{ encuestaForm.render('rbtPrimeraVisitaSi') }}
                        <label>NO</label>
                        {{ encuestaForm.render('rbtPrimeraVisitaNo') }}
                    </div>
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
                    <!-- ----------------------- RECEPCION FORM -------------------------- -->
                    <!-- ----------------------- UNIDAD FORM -------------------------- -->
                    <!-- ----------------------- PERSONAL FORM -------------------------- -->
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