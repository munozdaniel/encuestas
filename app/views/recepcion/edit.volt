{{ content() }}
{{ form("recepcion/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("recepcion", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit recepcion</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="recepcion_puntajeNivelId">Recepcion Of PuntajeNivelId</label>
        </td>
        <td align="left">
            {{ text_field("recepcion_puntajeNivelId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="recepcion_puntajeTiempoId">Recepcion Of PuntajeTiempoId</label>
        </td>
        <td align="left">
            {{ text_field("recepcion_puntajeTiempoId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="recepcion_puntajeTratoId">Recepcion Of PuntajeTratoId</label>
        </td>
        <td align="left">
            {{ text_field("recepcion_puntajeTratoId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="recepcion_tieneInconvenientes">Recepcion Of TieneInconvenientes</label>
        </td>
        <td align="left">
            {{ text_field("recepcion_tieneInconvenientes", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="recepcion_comentario">Recepcion Of Comentario</label>
        </td>
        <td align="left">
            {{ text_field("recepcion_comentario", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="recepcion_habilitado">Recepcion Of Habilitado</label>
        </td>
        <td align="left">
            {{ text_field("recepcion_habilitado", "type" : "numeric") }}
        </td>
    </tr>

    <tr>
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
