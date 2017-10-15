require('./bootstrap');
window.Vue = require('vue');

Vue.component('operation-list', require('./components/OperationList.vue'));
Vue.component('operation-list-item', require('./components/OperationListItem.vue'));
Vue.component('operation-sources', require('./components/Admin/OperationSources.vue'));

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
