<template>
    <tr>
        <td>
            <a :href="detailsLink(item)">{{ item.name }}</a>
        </td>
        <td>{{ item.visibility }}</td>
        <td>
            <button class="btn btn-sm" role="button" @click.prevent="deleteItem(item)">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
        </td>
    </tr>
</template>
<script>
    export default {
        props: ['item'],
        methods: {
            detailsLink() {
                return route('operation-sources.show', {operation_source: this.item.id});
            },
            deleteItem() {
                if (confirm('Are you sure?')) {
                    this.$emit('operation-sources:destroy', this.item);
                }
            }
        }
    }
</script>