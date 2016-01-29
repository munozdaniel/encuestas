{{ content() }}
{{ form("unidad/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("unidad", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit unidad</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="unidad_puntajeHigieneId">Unidad Of PuntajeHigieneId</label>
        </td>
        <td align="left">
            {{ text_field("unidad_puntajeHigieneId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="unidad_puntajeEquipoId">Unidad Of PuntajeEquipoId</label>
        </td>
        <td align="left">
            {{ text_field("unidad_puntajeEquipoId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="unidad_puntajeConfortId">Unidad Of PuntajeConfortId</label>
        </td>
        <td align="left">
            {{ text_field("unidad_puntajeConfortId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="unidad_tieneInconvenientes">Unidad Of TieneInconvenientes</label>
        </td>
        <td align="left">
            {{ text_field("unidad_tieneInconvenientes", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="unidad_comentario">Unidad Of Comentario</label>
        </td>
        <td align="left">
            {{ text_field("unidad_comentario", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="unidad_habilitado">Unidad Of Habilitado</label>
        </td>
        <td align="left">
            {{ text_field("unidad_habilitado", "type" : "numeric") }}
        </td>
    </tr>

    <tr>
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
