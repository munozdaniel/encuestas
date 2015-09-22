<div class="container">
    <div class="row">
        <br>
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Estadisticas </h2>
            <p class="text-center wow fadeInDown">Solo usuarios administradores pueden acceder a esta sección.</p>
        </div>
        {{ content() }}
       {{ link_to('estadistica/generar','class':'btn btn-success',"Generar") }}

        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <table id="datatable" hidden="" >
            <thead>
            <tr>
                <th></th>
                {% for punto in puntaje %}
                    <th>{{ punto.puntaje_descripcion}}</th>
                {% endfor %}
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>Personal Administrativo</th>
                {% for personal in administrativo %}
                    <td>{{  personal.TRATO }}</td>
                {% endfor %}
            </tr>
            </tbody>
        </table>

    </div>
</div>
