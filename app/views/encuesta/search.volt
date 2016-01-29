
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("encuesta/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("encuesta/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Encuesta</th>
            <th>Encuesta Of FechaCreacion</th>
            <th>Encuesta Of Habilitado</th>
            <th>Encuesta Of AlojamientoId</th>
            <th>Encuesta Of RecepcionId</th>
            <th>Encuesta Of UnidadId</th>
            <th>Encuesta Of PersonalId</th>
            <th>Encuesta Of AdicionalId</th>
            <th>Encuesta Of SorteoId</th>
            <th>Encuesta Of Terminado</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for encuesta in page.items %}
        <tr>
            <td>{{ encuesta.getEncuestaId() }}</td>
            <td>{{ encuesta.getEncuestaFechacreacion() }}</td>
            <td>{{ encuesta.getEncuestaHabilitado() }}</td>
            <td>{{ encuesta.getEncuestaAlojamientoid() }}</td>
            <td>{{ encuesta.getEncuestaRecepcionid() }}</td>
            <td>{{ encuesta.getEncuestaUnidadid() }}</td>
            <td>{{ encuesta.getEncuestaPersonalid() }}</td>
            <td>{{ encuesta.getEncuestaAdicionalid() }}</td>
            <td>{{ encuesta.getEncuestaSorteoid() }}</td>
            <td>{{ encuesta.getEncuestaTerminado() }}</td>
            <td>{{ link_to("encuesta/edit/"~encuesta.getEncuestaId(), "Edit") }}</td>
            <td>{{ link_to("encuesta/delete/"~encuesta.getEncuestaId(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("encuesta/search", "First") }}</td>
                        <td>{{ link_to("encuesta/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("encuesta/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("encuesta/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
