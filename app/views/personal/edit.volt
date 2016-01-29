{{ content() }}
{{ form("personal/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("personal", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit personal</h1>
</div>

<table>
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
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
