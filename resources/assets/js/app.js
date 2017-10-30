import bootstrap from './bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import App from './components/Admin/App.vue';
import OperationList from './components/OperationList.vue';
// import OperationListItem from './components/OperationListItem.vue';
import OperationSources from './components/Admin/OperationSources.vue';
// import OperationSourcesItem from './components/Admin/OperationSourcesItem.vue';
import SourceItemEdit from './components/Admin/SourceItemEdit.vue';

Vue.component('operation-list', OperationList);
// Vue.component('operation-list-item', OperationListItem);
Vue.component('operation-sources', OperationSources);
Vue.component('source-item-edit', SourceItemEdit);

const routes = [
    {path: '/operation-sources', component: OperationSources},
    // {path: '/admin/operation-sources', component: OperationSources},
    // {path: '/admin/operation-sources', component: OperationSources},
];
const router = new VueRouter({routes});

Vue.mixin({
    methods: {
        confirmAction: (uri) => {
            if (confirm('Are you sure?')) {
                window.location.href = uri;
            }
        },
        route
    }
});

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});
