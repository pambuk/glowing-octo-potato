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
        <tr v-for="item in items" :key="item.id">
            <td>
                <a :href="'/operations/show/' + item.id">{{ item.description }}</a>
            </td>
            <td>{{ item.type }}</td>
            <td style="text-align: right">{{ item.value }}</td>
            <td>
                <button
                        class="btn btn-sm"
                        @click.prevent="confirmAction('/operations/delete/' + item.id)"
                        style="cursor: pointer">
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td><strong>Total: </strong></td>
            <td colspan="2" style="text-align: right">
                <!-- <strong>{{ number_format($operations->sum('value'), 2) }}</strong> -->
            </td>
        </tr>
        </tfoot>
    </table>
</template>

<script>
    export default {
        props: ['items']
    }
</script>