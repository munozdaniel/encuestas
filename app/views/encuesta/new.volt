
{{ form("encuesta/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("encuesta", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create encuesta</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="encuesta_id">Encuesta</label>
        </td>
        <td align="left">
            {{ text_field("encuesta_id", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="encuesta_fechaCreacion">Encuesta Of FechaCreacion</label>
        </td>
        <td align="left">
                {{ text_field("encuesta_fechaCreacion", "type" : "date") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="encuesta_habilitado">Encuesta Of Habilitado</label>
        </td>
        <td align="left">
            {{ text_field("encuesta_habilitado", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="encuesta_alojamientoId">Encuesta Of AlojamientoId</label>
        </td>
        <td align="left">
            {{ text_field("encuesta_alojamientoId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="encuesta_recepcionId">Encuesta Of RecepcionId</label>
        </td>
        <td align="left">
            {{ text_field("encuesta_recepcionId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="encuesta_unidadId">Encuesta Of UnidadId</label>
        </td>
        <td align="left">
            {{ text_field("encuesta_unidadId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="encuesta_personalId">Encuesta Of PersonalId</label>
        </td>
        <td align="left">
            {{ text_field("encuesta_personalId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="encuesta_adicionalId">Encuesta Of AdicionalId</label>
        </td>
        <td align="left">
            {{ text_field("encuesta_adicionalId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="encuesta_sorteoId">Encuesta Of SorteoId</label>
        </td>
        <td align="left">
            {{ text_field("encuesta_sorteoId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="encuesta_terminado">Encuesta Of Terminado</label>
        </td>
        <td align="left">
            {{ text_field("encuesta_terminado", "type" : "numeric") }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
