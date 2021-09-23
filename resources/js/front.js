
require('./bootstrap');

import Vue from 'vue';
window.axios = require('axios');
window.axios.defaults.headers.common['X-requested-With'] = 'XMLHttpRequest';

import router from './router';

// import Vue from 'vue';
import App from './views/App';

const app = new Vue({
    el:'#root',
    render : h => h(App),
    router
});
