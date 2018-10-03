/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário

const store = new Vuex.Store({
  state,
  mutations,
  actions,
  getters
})

Vue.use(VeeValidate)

var App = {}

new Vue({
  router,
  store,
}).$mount('#app')
