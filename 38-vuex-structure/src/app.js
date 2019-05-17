
import {store} from './store/store.js';
import Productos    from './components/Productos.js';
import Carro        from './components/Carro.js';

Vue.use(Vuex);

new Vue({
    el: '#app',
    store,
    components: {
        Productos,
        Carro   
    },
    render: h => h(App)
});