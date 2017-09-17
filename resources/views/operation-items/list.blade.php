<table class="table">
    <tr>
        <th>Description</th>
        <th>Amount</th>
        <th>Options</th>
    </tr>
    @foreach($items as $item)
        <tr>
            <td>{{ $item['description'] }}</td>
            <td>{{ $item['value'] }}</td>
            <td>
                <button
                        class="btn btn-sm"
                        @click.prevent="confirmAction('/operation-items/{{ $item['operation_id'] }}/delete/{{ $item['id'] }}')"
                        style="cursor: pointer">
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
</table>