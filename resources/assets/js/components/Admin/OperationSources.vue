<template>
    <div>
        <h1>
            Operation sources

            <a href="" type="button" class="btn btn-default pull-right" aria-label="Right Align">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
            </a>
        </h1>
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
    </div>
</template>

<script>
    import OperationSourceItem from './OperationSourcesItem.vue';
    import store from '../../store';

    export default {
        components: {
            'operation-sources-item': OperationSourceItem
        },
        mounted() {
            store.getSourceItems().then((response) => {
                this.items = response;
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