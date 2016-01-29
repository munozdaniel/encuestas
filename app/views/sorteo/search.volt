
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("sorteo/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("sorteo/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Sorteo</th>
            <th>Sorteo Of NombreApellido</th>
            <th>Sorteo Of Correo</th>
            <th>Sorteo Of Telefono</th>
            <th>Sorteo Of Ciudad</th>
            <th>Sorteo Of Habilitado</th>
            <th>Sorteo Of Participa</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for sorteo in page.items %}
        <tr>
            <td>{{ sorteo.getSorteoId() }}</td>
            <td>{{ sorteo.getSorteoNombreapellido() }}</td>
            <td>{{ sorteo.getSorteoCorreo() }}</td>
            <td>{{ sorteo.getSorteoTelefono() }}</td>
            <td>{{ sorteo.getSorteoCiudad() }}</td>
            <td>{{ sorteo.getSorteoHabilitado() }}</td>
            <td>{{ sorteo.getSorteoParticipa() }}</td>
            <td>{{ link_to("sorteo/edit/"~sorteo.getSorteoId(), "Edit") }}</td>
            <td>{{ link_to("sorteo/delete/"~sorteo.getSorteoId(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("sorteo/search", "First") }}</td>
                        <td>{{ link_to("sorteo/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("sorteo/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("sorteo/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
