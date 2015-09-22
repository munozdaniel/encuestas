<div class="container">
    <div class="row">
        <br>
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Estadisticas </h2>
            <p class="text-center wow fadeInDown">Solo usuarios administradores pueden acceder a esta sección.</p>
        </div>
        {{ content() }}
        <select>
            <option value="1" >Personal</option>
            <option value="2">Recepcion</option>
            <option value="3">Unidades</option>
        </select>
       {{ link_to('estadistica/unidad','class':'btn btn-success',"Generar") }}

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
