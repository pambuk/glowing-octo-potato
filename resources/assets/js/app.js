import bootstrap from './bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import App from './components/Admin/App.vue';
import OperationList from './components/OperationList.vue';
import OperationSources from './components/Admin/OperationSources.vue';
import SourceItemEdit from './components/Admin/SourceItemEdit.vue';
import SourceItemAdd from './components/Admin/SourceItemAdd.vue';

Vue.component('operation-list', OperationList);
Vue.component('operation-sources', OperationSources);
Vue.component('source-item-edit', SourceItemEdit);
Vue.component('source-item-add', SourceItemAdd);

const routes = [
    {path: '/operation-sources', component: OperationSources},
    // {path: '/operation-sources/add', component: SourceItemAdd},
    {path: '/operation-sources/:sourceId', component: SourceItemEdit},
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
