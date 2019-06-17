//import Vue from 'vue';
//import Vuex from '../../dist/vue/vuex.js';
import productos from './modules/productos.js';
import {state} from './state.js';
import {getters} from './getters.js';
import {mutations} from './mutations.js';



export const store = new Vuex.Store({
    state: state,
    getters: getters,
    mutations:mutations,
    modules: {
        productos
    }
});
