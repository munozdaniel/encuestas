<div class="container">
    <div class="row">
        <br>
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Estadisticas </h2>
            <div class="btn-group" role="group" aria-label="..." align="center">
                {{ link_to('estadistica/unidad','type':'button','class':'btn btn-default',"Recepción") }}
                {{ link_to('estadistica/personal','type':'button','class':'btn btn-default',"Unidad") }}
                {{ link_to('estadistica/index','type':'button','class':'btn btn-default',"Personal") }}

            </div>


        </div>
        {{ content() }}


        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <table id="datatable" hidden="">
            <thead>
            <tr>
                <th></th>
                {% for punto in puntaje %}
                    <th>{{ punto.puntaje_descripcion}}</th>
                {% endfor %}
            </tr>
            </thead>
            <tbody>
            {% for elemento in arregloIndexado %}
                <tr>
                    {% for unGrafico in elemento %}
                        {% if loop.first %}
                            <th>{{  unGrafico.NOMBRE }}</th>
                        {% endif %}
                            <td>{{  unGrafico.PUNTAJE }}</td>

                    {% endfor %}
                </tr>
            {% endfor %}

            </tbody>
        </table>

    </div>
</div>
