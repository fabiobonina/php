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
    a: user,
    b: cilindro,
    c: programacao,
    d: cilConfig,
  }
})

store.state.a
store.state.b
store.state.c
store.state.d

Vue.use(VeeValidate)

var App = {}

new Vue({
  router,
  store,
}).$mount('#app')
