
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("recepcion/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("recepcion/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Recepcion</th>
            <th>Recepcion Of PuntajeNivelId</th>
            <th>Recepcion Of PuntajeTiempoId</th>
            <th>Recepcion Of PuntajeTratoId</th>
            <th>Recepcion Of TieneInconvenientes</th>
            <th>Recepcion Of Comentario</th>
            <th>Recepcion Of Habilitado</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for recepcion in page.items %}
        <tr>
            <td>{{ recepcion.getRecepcionId() }}</td>
            <td>{{ recepcion.getRecepcionPuntajenivelid() }}</td>
            <td>{{ recepcion.getRecepcionPuntajetiempoid() }}</td>
            <td>{{ recepcion.getRecepcionPuntajetratoid() }}</td>
            <td>{{ recepcion.getRecepcionTieneinconvenientes() }}</td>
            <td>{{ recepcion.getRecepcionComentario() }}</td>
            <td>{{ recepcion.getRecepcionHabilitado() }}</td>
            <td>{{ link_to("recepcion/edit/"~recepcion.getRecepcionId(), "Edit") }}</td>
            <td>{{ link_to("recepcion/delete/"~recepcion.getRecepcionId(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("recepcion/search", "First") }}</td>
                        <td>{{ link_to("recepcion/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("recepcion/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("recepcion/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
