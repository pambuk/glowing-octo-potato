require('./bootstrap');
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('operation-list', require('./components/OperationList.vue'));

const app = new Vue({
    el: '#app',
    methods: {
        confirmAction: function(uri) {
            if (confirm('Are you sure?')) {
                window.location.href = uri;
            }
        }
    }
});
