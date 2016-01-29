
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("alojamiento/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("alojamiento/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Alojamiento</th>
            <th>Alojamiento Of NroUnidad</th>
            <th>Alojamiento Of CantDias</th>
            <th>Alojamiento Of TipoPaxId</th>
            <th>Alojamiento Of FechaEstadia</th>
            <th>Alojamiento Of PrimeraVisita</th>
            <th>Alojamiento Of Habilitado</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for alojamiento in page.items %}
        <tr>
            <td>{{ alojamiento.getAlojamientoId() }}</td>
            <td>{{ alojamiento.getAlojamientoNrounidad() }}</td>
            <td>{{ alojamiento.getAlojamientoCantdias() }}</td>
            <td>{{ alojamiento.getAlojamientoTipopaxid() }}</td>
            <td>{{ alojamiento.getAlojamientoFechaestadia() }}</td>
            <td>{{ alojamiento.getAlojamientoPrimeravisita() }}</td>
            <td>{{ alojamiento.getAlojamientoHabilitado() }}</td>
            <td>{{ link_to("alojamiento/edit/"~alojamiento.getAlojamientoId(), "Edit") }}</td>
            <td>{{ link_to("alojamiento/delete/"~alojamiento.getAlojamientoId(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("alojamiento/search", "First") }}</td>
                        <td>{{ link_to("alojamiento/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("alojamiento/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("alojamiento/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
