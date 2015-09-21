<div class="container">
    <div class="row">
        <br>
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Estadisticas </h2>
            <p class="text-center wow fadeInDown">Solo usuarios administradores pueden acceder a esta sección.</p>
        </div>
        <div>{{ formulario.render('complejo_id') }}</div>
        <div id="chartContainer" style="height: 300px; width: 100%;">
        </div>
    </div>
</div>
        <script type="text/javascript">
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {

            title:{
                text: "Fruits sold in First Quarter"
            },
            data: [//array of dataSeries
                { //dataSeries object

                    /*** Change type "column" to "bar", "area", "line" or "pie"***/
                    type: "column",
                    dataPoints: [
                        { label: "banana", y: 18 },
                        { label: "orange", y: 29 },
                        { label: "apple", y: 40 },
                        { label: "mango", y: 34 },
                        { label: "grape", y: 24 }
                    ]
                }
            ]
        });

        chart.render();
    }
</script>