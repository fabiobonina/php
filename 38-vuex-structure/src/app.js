import Vue from 'vue';
import App from './App.js';
import {store} from './store/store';

new Vue({
    el: '#app',
    store,
    render: h => h(App)
});