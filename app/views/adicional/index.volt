
{{ content() }}

<div align="right">
    {{ link_to("adicional/new", "Create adicional") }}
</div>

{{ form("adicional/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search adicional</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="adicional_id">Adicional</label>
        </td>
        <td align="left">
            {{ text_field("adicional_id", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="adicional_reservaId">Adicional Of ReservaId</label>
        </td>
        <td align="left">
            {{ text_field("adicional_reservaId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="adicional_reservaOtro">Adicional Of ReservaOtro</label>
        </td>
        <td align="left">
            {{ text_field("adicional_reservaOtro", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="adicional_grupoId">Adicional Of GrupoId</label>
        </td>
        <td align="left">
            {{ text_field("adicional_grupoId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="adicional_grupoOtro">Adicional Of GrupoOtro</label>
        </td>
        <td align="left">
            {{ text_field("adicional_grupoOtro", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="adicional_informacionId">Adicional Of InformacionId</label>
        </td>
        <td align="left">
            {{ text_field("adicional_informacionId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="adicional_informacionOtro">Adicional Of InformacionOtro</label>
        </td>
        <td align="left">
            {{ text_field("adicional_informacionOtro", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="adicional_conocimientoId">Adicional Of ConocimientoId</label>
        </td>
        <td align="left">
            {{ text_field("adicional_conocimientoId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="adicional_motivoId">Adicional Of MotivoId</label>
        </td>
        <td align="left">
            {{ text_field("adicional_motivoId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="adicional_motivoOtro">Adicional Of MotivoOtro</label>
        </td>
        <td align="left">
            {{ text_field("adicional_motivoOtro", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="adicional_observacion">Adicional Of Observacion</label>
        </td>
        <td align="left">
            {{ text_field("adicional_observacion", "size" : 30) }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
