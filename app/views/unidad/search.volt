
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("unidad/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("unidad/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Unidad</th>
            <th>Unidad Of PuntajeHigieneId</th>
            <th>Unidad Of PuntajeEquipoId</th>
            <th>Unidad Of PuntajeConfortId</th>
            <th>Unidad Of TieneInconvenientes</th>
            <th>Unidad Of Comentario</th>
            <th>Unidad Of Habilitado</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for unidad in page.items %}
        <tr>
            <td>{{ unidad.getUnidadId() }}</td>
            <td>{{ unidad.getUnidadPuntajehigieneid() }}</td>
            <td>{{ unidad.getUnidadPuntajeequipoid() }}</td>
            <td>{{ unidad.getUnidadPuntajeconfortid() }}</td>
            <td>{{ unidad.getUnidadTieneinconvenientes() }}</td>
            <td>{{ unidad.getUnidadComentario() }}</td>
            <td>{{ unidad.getUnidadHabilitado() }}</td>
            <td>{{ link_to("unidad/edit/"~unidad.getUnidadId(), "Edit") }}</td>
            <td>{{ link_to("unidad/delete/"~unidad.getUnidadId(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("unidad/search", "First") }}</td>
                        <td>{{ link_to("unidad/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("unidad/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("unidad/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
