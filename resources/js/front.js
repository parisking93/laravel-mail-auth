
require('./bootstrap');

import Vue from 'vue'
import axios from 'axios'

import router from './router';

// import Vue from 'vue';
import App from './views/App';

const app = new Vue({
    el:'#root',
    render : h => h(App),
    router
});
