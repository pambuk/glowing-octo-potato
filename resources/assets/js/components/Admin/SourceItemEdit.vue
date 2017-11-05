<template>
    <div class="container">
        <h1>Edit source</h1>
        <form @submit.prevent="saveSource">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" v-model="item.name">
            </div>
            <div class="">
                <label for="">Visibility</label>
                <div class="radio">
                    <label>
                        <input v-model="item.visibility" type="radio" name="visibility" value="public">
                        Public
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input v-model="item.visibility" type="radio" name="visibility" value="private">
                        Private
                    </label>
                </div>
            </div>
            <button class="btn btn-default">Save</button>
        </form>
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
            store.getSourceItem(this.$route.params.sourceId).then((response) => {
                this.item = response;
            });
        },
        methods: {
            saveSource() {
                store
                    .setSourceItem(this.item)
                    .then(response => {
                        console.log('item set response', response);
                    })
                    .catch(e => {
                        console.log('catch e', e);
                    });
            }
        }
    }
</script>