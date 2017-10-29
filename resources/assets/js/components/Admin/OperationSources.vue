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
                v-for="item in sourceItems"
                :key="item.id" :item="item"
                v-on:operation-sources:destroy="deleteItem"></operation-sources-item>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['items'],
        data() {
            return {
                sourceItems: this.items
            };
        },
        methods: {
            deleteItem(item) {
                axios
                    .delete(route('operation-sources.destroy', {operation_source: item.id}))
                    .then((response) => {
                        this.sourceItems = _.filter(this.sourceItems, (listItem) => {
                            return item.id !== listItem.id;
                        });
                    });
            }
        }
    }
</script>