<template>
    <div class="container">


        <!--<div class="container col-lg-11 col-lg-offset-1">-->
            <ol class="breadcrumb">
                <li><router-link to="/operation-sources">Operations sources</router-link></li>
                <li class="active">Edit operation item</li>
            </ol>
        <!--</div>-->

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