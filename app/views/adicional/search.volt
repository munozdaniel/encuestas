
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("adicional/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("adicional/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Adicional</th>
            <th>Adicional Of ReservaId</th>
            <th>Adicional Of ReservaOtro</th>
            <th>Adicional Of GrupoId</th>
            <th>Adicional Of GrupoOtro</th>
            <th>Adicional Of InformacionId</th>
            <th>Adicional Of InformacionOtro</th>
            <th>Adicional Of ConocimientoId</th>
            <th>Adicional Of MotivoId</th>
            <th>Adicional Of MotivoOtro</th>
            <th>Adicional Of Observacion</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for adicional in page.items %}
        <tr>
            <td>{{ adicional.getAdicionalId() }}</td>
            <td>{{ adicional.getAdicionalReservaid() }}</td>
            <td>{{ adicional.getAdicionalReservaotro() }}</td>
            <td>{{ adicional.getAdicionalGrupoid() }}</td>
            <td>{{ adicional.getAdicionalGrupootro() }}</td>
            <td>{{ adicional.getAdicionalInformacionid() }}</td>
            <td>{{ adicional.getAdicionalInformacionotro() }}</td>
            <td>{{ adicional.getAdicionalConocimientoid() }}</td>
            <td>{{ adicional.getAdicionalMotivoid() }}</td>
            <td>{{ adicional.getAdicionalMotivootro() }}</td>
            <td>{{ adicional.getAdicionalObservacion() }}</td>
            <td>{{ link_to("adicional/edit/"~adicional.getAdicionalId(), "Edit") }}</td>
            <td>{{ link_to("adicional/delete/"~adicional.getAdicionalId(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("adicional/search", "First") }}</td>
                        <td>{{ link_to("adicional/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("adicional/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("adicional/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
