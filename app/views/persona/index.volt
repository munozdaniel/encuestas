
{{ content() }}

<div align="right">
    {{ link_to("persona/new", "Create persona") }}
</div>

{{ form("persona/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search persona</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="persona_id">Persona</label>
        </td>
        <td align="left">
            {{ text_field("persona_id", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="persona_nombre">Persona Of Nombre</label>
        </td>
        <td align="left">
            {{ text_field("persona_nombre", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="persona_apellido">Persona Of Apellido</label>
        </td>
        <td align="left">
            {{ text_field("persona_apellido", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="persona_correo">Persona Of Correo</label>
        </td>
        <td align="left">
            {{ text_field("persona_correo", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="persona_telefono">Persona Of Telefono</label>
        </td>
        <td align="left">
            {{ text_field("persona_telefono", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="persona_ciudad">Persona Of Ciudad</label>
        </td>
        <td align="left">
            {{ text_field("persona_ciudad", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="persona_encuestaId">Persona Of EncuestaId</label>
        </td>
        <td align="left">
            {{ text_field("persona_encuestaId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="persona_habilitado">Persona Of Habilitado</label>
        </td>
        <td align="left">
            {{ text_field("persona_habilitado", "type" : "numeric") }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
