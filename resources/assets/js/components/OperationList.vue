<template>
    <table class="table table-striped">
        <tr><td>{{ items }}</td></tr>
        <tr>
            <th>Description</th>
            <th>Type</th>
            <th style="text-align: right">Amount</th>
            <th>Options</th>
        </tr>
        <tr v-for="item in items">
            <td>
                <a href="/operations/show/{{ item.id }}">
                    {{ item.description }}
                </a>
            </td>
            <td>{{ item.type }}</td>
            <td style="text-align: right">{{ item.value }}</td>
            <td>
                <button
                        class="btn btn-sm"
                        @click.prevent="confirmAction('/operations/delete/{{ item.id }}')"
                        style="cursor: pointer">
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            </td>
        </tr>
        <tr>
            <td><strong>Total: </strong></td>
            <td colspan="2" style="text-align: right">
                <!--<strong>{{ number_format($operations->sum('value'), 2) }}</strong>-->
            </td>
        </tr>
    </table>
</template>

<script>
    export default {
        data() {
            return {
                items: this._items
            };
        },
        mounted() {
            console.log('OperationList', this);
        },
        props: {
            _items: {}
        }
    }
</script>