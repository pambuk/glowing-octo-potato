import bootstrap from './bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.component('operation-list', require('./components/OperationList.vue'));
Vue.component('operation-list-item', require('./components/OperationListItem.vue'));
Vue.component('operation-sources', require('./components/Admin/OperationSources.vue'));
Vue.component('operation-sources-item', require('./components/Admin/OperationSourcesItem.vue'));
Vue.component('source-item-edit', require('./components/Admin/SourceItemEdit.vue'));

Vue.mixin({
    methods: {
        confirmAction: (uri) => {
            if (confirm('Are you sure?')) {
                window.location.href = uri;
            }            
        },
        route: route
    }
});

const app = new Vue({
    el: '#app'
});
