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
        <operation-sources-item
                v-for="item in items"
                :key="item.id" :item="item"
                v-on:operation-sources:destroy="deleteItem"></operation-sources-item>
        </tbody>
    </table>
</template>

<script>
    import OperationSourceItem from './OperationSourcesItem.vue';

    export default {
        components: {
            'operation-sources-item': OperationSourceItem
        },
        mounted() {
            axios
                .get(route('api.operation-sources.index'))
                .then((response) => {
                    this.items = response.data;
                });
        },
        data() {
            return {
                items: []
            };
        },
        methods: {
            deleteItem(item) {
                axios
                    .delete(route('operation-sources.destroy', {operation_source: item.id}))
                    .then(() => {
                        this.items = _.filter(this.items, (listItem) => {
                            return item.id !== listItem.id;
                        });
                    });
            }
        }
    }
</script>