/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/

const store = new Vuex.Store({
  actions: actions,
  state: state,
  getters: getters,
  mutations: mutations,
  modules: {
    moduloA: productos,
    moduloB: controleCilindro,
    moduloC: user,
  }
})

store.state.moduloA
store.state.moduloB

Vue.use(VeeValidate)

var App = {}

new Vue({
  router,
  store,
}).$mount('#app')
