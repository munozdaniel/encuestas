
{{ form("sorteo/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("sorteo", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create sorteo</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="sorteo_nombreApellido">Sorteo Of NombreApellido</label>
        </td>
        <td align="left">
            {{ text_field("sorteo_nombreApellido", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="sorteo_correo">Sorteo Of Correo</label>
        </td>
        <td align="left">
            {{ text_field("sorteo_correo", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="sorteo_telefono">Sorteo Of Telefono</label>
        </td>
        <td align="left">
            {{ text_field("sorteo_telefono", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="sorteo_ciudad">Sorteo Of Ciudad</label>
        </td>
        <td align="left">
            {{ text_field("sorteo_ciudad", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="sorteo_habilitado">Sorteo Of Habilitado</label>
        </td>
        <td align="left">
            {{ text_field("sorteo_habilitado", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="sorteo_participa">Sorteo Of Participa</label>
        </td>
        <td align="left">
            {{ text_field("sorteo_participa", "type" : "numeric") }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
