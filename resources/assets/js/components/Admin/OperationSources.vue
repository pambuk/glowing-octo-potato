<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Visibility</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in items">
            <td>{{ item.name }}</td>
            <td>{{ item.visibility }}</td>
            <td>
                <button
                        class="btn btn-sm"
                        @click.prevent="confirmAction(route('operations.destroy', {operation: item.id}))"
                        style="cursor: pointer">
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['items']
    }
</script>