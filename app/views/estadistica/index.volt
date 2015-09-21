<div class="container">
    <div class="row">
        <br>
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Estadisticas </h2>
            <p class="text-center wow fadeInDown">Solo usuarios administradores pueden acceder a esta sección.</p>
        </div>
        {{ content() }}
       {{ link_to('estadistica/generar','class':'btn btn-success',"Generar") }}
        <select id="complejo_id" name="complejo_id">
            <option value="1">NO</option>
            <option value="2">SAN MARTIN DE LOS ANDES</option>
            <option value="3">VILLA LA ANGOSTURA</option>
            <option value="4">MOQUEHUE</option>
            <option value="5">LAS GRUTAS</option>
        </select>
        <div id="chartContainer" style="width: 800px; height: 380px;"></div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $.getJSON("EstadisticaController.php", function (result) {

            var chart = new CanvasJS.Chart("chartContainer", {
                data: [
                    {
                        dataPoints: result
                    }
                ]
            });

            chart.render();
        });
    });
</script>