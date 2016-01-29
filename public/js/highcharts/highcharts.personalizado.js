/**
 * Created by dmunioz on 22/09/2015.
 */

$(function () {
    $('#container').highcharts({
        data: {
            table: 'datatable'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Opiniones de los Inquilinos:'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Puntaje'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
});
