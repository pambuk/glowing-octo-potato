<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Description</th>
                <th>Type</th>
                <th style="text-align: right">Amount</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <operation-list-item v-for="item in items" :item="item"></operation-list-item>
        </tbody>
        <tfoot>
            <tr>
                <td><strong>Total: </strong></td>
                <td colspan="2" style="text-align: right">
                     <strong>{{ sumFormattedAsCurrency }}</strong>
                </td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</template>

<script>
    export default {
        props: ['items'],
        computed: {
            summedValues: (vm) => {
                return vm.items
                    .reduce((sum, item) => {return Number.parseFloat(sum) + Number.parseFloat(item.value)}, 0);
            },
            sumFormattedAsCurrency: (vm) => {
                return vm.summedValues.toLocaleString('pl-PL', {style: 'currency', currency: 'PLN'});
            }
        }
    }
</script>