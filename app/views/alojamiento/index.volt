
{{ content() }}

<div align="right">
    {{ link_to("alojamiento/new", "Create alojamiento") }}
</div>

{{ form("alojamiento/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search alojamiento</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="alojamiento_id">Alojamiento</label>
        </td>
        <td align="left">
            {{ text_field("alojamiento_id", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="alojamiento_nroUnidad">Alojamiento Of NroUnidad</label>
        </td>
        <td align="left">
            {{ text_field("alojamiento_nroUnidad", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="alojamiento_cantDias">Alojamiento Of CantDias</label>
        </td>
        <td align="left">
            {{ text_field("alojamiento_cantDias", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="alojamiento_tipoPaxId">Alojamiento Of TipoPaxId</label>
        </td>
        <td align="left">
            {{ text_field("alojamiento_tipoPaxId", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="alojamiento_fechaEstadia">Alojamiento Of FechaEstadia</label>
        </td>
        <td align="left">
                {{ text_field("alojamiento_fechaEstadia", "type" : "date") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="alojamiento_primeraVisita">Alojamiento Of PrimeraVisita</label>
        </td>
        <td align="left">
            {{ text_field("alojamiento_primeraVisita", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="alojamiento_habilitado">Alojamiento Of Habilitado</label>
        </td>
        <td align="left">
            {{ text_field("alojamiento_habilitado", "type" : "numeric") }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
