<template>
    <div class="container">
        <h1>Edit source</h1>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" :value="item.name">
        </div>
    </div>
</template>
<script>

    import store from '../../store';

    export default {
        data() {
            return {
                item: {}
            };
        },
        mounted() {
//            console.log(this, store);
           store.getSourceItem(this.$route.params.sourceId).then((response) => {
               this.item = response;
           });
        }
    }
</script>