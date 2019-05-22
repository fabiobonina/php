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
    a: productos,
    b: controleCilindro,
    c: user,
  }
})

store.state.a
store.state.b
store.state.c

Vue.use(VeeValidate)

var App = {}

new Vue({
  router,
  store,
}).$mount('#app')
