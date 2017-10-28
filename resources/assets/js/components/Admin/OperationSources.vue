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
            <td>
                <a :href="detailsLink(item)">{{ item.name }}</a>
            </td>
            <td>{{ item.visibility }}</td>
            <td>
                <button
                        class="btn btn-sm" role="button"
                        @click.prevent="confirmAction(route('operations.destroy', {operation: item.id}))">
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['items'],
        methods: {
            detailsLink: (item) => {
                return route('operation-sources.show', {operation_source: item.id});
            }
        }
    }
</script>