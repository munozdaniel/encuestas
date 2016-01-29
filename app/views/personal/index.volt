
{{ content() }}

<div align="right">
    {{ link_to("personal/new", "Create personal") }}
</div>

{{ form("personal/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search personal</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="personal_id">Personal</label>
        </td>
        <td align="left">
            {{ text_field("personal_id", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="personal_puntajeAdministrativoId">Personal Of PuntajeAdministrativoId</label>
        </td>
        <td align="left">
            {{ text_field("personal_puntajeAdministrativoId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="personal_puntajeMucamaId">Personal Of PuntajeMucamaId</label>
        </td>
        <td align="left">
            {{ text_field("personal_puntajeMucamaId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="personal_comentario">Personal Of Comentario</label>
        </td>
        <td align="left">
            {{ text_field("personal_comentario", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="personal_habilitado">Personal Of Habilitado</label>
        </td>
        <td align="left">
            {{ text_field("personal_habilitado", "type" : "numeric") }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
