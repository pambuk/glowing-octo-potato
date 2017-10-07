<template>
    <tr>
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
</template>

<script>
    export default {
        props: ['item']
    }
</script>