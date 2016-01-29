
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("personal/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("personal/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Personal</th>
            <th>Personal Of PuntajeAdministrativoId</th>
            <th>Personal Of PuntajeMucamaId</th>
            <th>Personal Of Comentario</th>
            <th>Personal Of Habilitado</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for personal in page.items %}
        <tr>
            <td>{{ personal.getPersonalId() }}</td>
            <td>{{ personal.getPersonalPuntajeadministrativoid() }}</td>
            <td>{{ personal.getPersonalPuntajemucamaid() }}</td>
            <td>{{ personal.getPersonalComentario() }}</td>
            <td>{{ personal.getPersonalHabilitado() }}</td>
            <td>{{ link_to("personal/edit/"~personal.getPersonalId(), "Edit") }}</td>
            <td>{{ link_to("personal/delete/"~personal.getPersonalId(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("personal/search", "First") }}</td>
                        <td>{{ link_to("personal/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("personal/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("personal/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
