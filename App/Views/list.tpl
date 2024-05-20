
<table border="1">

    <tr>
        <th>Data</th>
        <th>Datas</th>
        <th>Dates</th>
    </tr>
    {% foreach ($datas as $key => $data) %}
    <tr>
        <td>{{ $data['data'] }} </td>
        <td>{{ $data['datas'] }} </td>
        <td>{{ $data['dates'] }} </td>
   </tr>
    {% endforeach %}
     
</table>
