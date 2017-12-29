/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário
Vue.http.options.emulateJSON = true;

const state = {
  proprietario:{},
  lojas: [],
  loja: [],
  locais: [],
  local: {},
  bens: [],
  users:[],
  user:[],
  tipos:[],
  produtos:[],
  fabricantes:[],
  categorias:[],
}

const mutations = {
  SET_PROPRIETARIO(state, proprietario) {
    state.proprietario = proprietario
  },
  SET_USERS(state, users) {
    state.users = users
  },
  SET_USER(state, user) {
    state.user = user
  },
  SET_LOJAS(state, lojas) {
    state.lojas = lojas
  },
  SET_LOJA(state, loja) {
    state.loja = loja
  },
  SET_LOCAL(state, local) {
    state.local = local
  },
  SET_LOCAIS(state, locais) {
    state.locais = locais
  },
  SET_BENS(state, bens) {
    state.bens = bens
  },
  SET_TIPOS(state, tipos) {
    state.tipos = tipos
  },
  SET_PRODUTOS(state, produtos) {
    state.produtos = produtos
  },
  SET_FABRICANTES(state, fabricantes) {
    state.fabricantes = fabricantes
  },
  SET_CATEGORIAS(state, categorias) {
    state.categorias = categorias
  },
  
}

const actions = {
  setProprietario({ commit }, proprietario) {
    commit("SET_PROPRIETARIO", proprietario)
  },
  setUser({ commit }, user) {
    commit("SET_USER", user)
  },
  setUsers({ commit }, users) {
    commit("SET_USERS", users)
  },
  setLojas({ commit }, lojas) {
    commit("SET_LOJAS", lojas)
  },
  setLoja({ commit }, loja) {
    commit("SET_LOJA", loja)
  },
  setLocais({ commit }, locais) {
    commit("SET_LOCAIS", locais)
  },
  setLocal({ commit }, local) {
    commit("SET_LOCAL", local)
  },
  setBens({ commit }, bens) {
    commit("SET_BENS", bens)
  },
  setTipos({ commit }, tipos) {
    commit("SET_TIPOS", tipos)
  },
  setProdutos({ commit }, produtos) {
    commit("SET_PRODUTOS", produtos)
  },
  setFabricantes({ commit }, fabricantes) {
    commit("SET_FABRICANTES", fabricantes)
  },
  setCategorias({ commit }, categorias) {
    commit("SET_CATEGORIAS", categorias)
  },
  fetchUsers({ commit }, { self })  {         
    Vue.http.get("https://jsonplaceholder.typicode.com/users")
    .then((response) => {
        commit("SET_LOJA", response.body);
        self.filterUsers();
    })
    .catch((error => {
        console.log(error.statusText)
    }))
  },
  fetchIndex({ commit }) {
    return new Promise((resolve, reject) => {
        Vue.http.get("./config/api/apiProprietarioFull1.php?action=read")
        .then((response) => {
          if(response.body.error){
            console.log(response.body.message);
          } else{
            commit("SET_USER", response.body.user);
            commit("SET_PROPRIETARIO", response.body.proprietarios);
            commit("SET_LOJAS", response.body.lojas);
            resolve();
          }
        })
        .catch((error => {
            console.log(error.statusText);
        }));
    });
  },
  fetchConfig({ commit }) {
    return new Promise((resolve, reject) => {
        Vue.http.get("./config/api/apiConfigFull.php?action=config")
      .then((response) => {
        if(response.body.error){
          console.log(response.body.message);
        } else{
          //console.log(response.body);
          commit("SET_TIPOS", response.body.tipos);
          commit("SET_CATEGORIAS", response.body.categorias);
          commit("SET_FABRICANTES", response.body.fabricantes);
          resolve();
        }
      })
      .catch((error => {
          console.log(error.statusText);
      }));
    });
  },
  fetchLocais({ commit }, loja) {
    return new Promise((resolve, reject) => {
      var postData = {
      loja: loja,
      }
      //console.log(postData);
      Vue.http.post("./config/api/apiLocalFull.php?action=read",postData)
        .then((response) => {
          if(response.body.error){
            console.log(response.body.message);
          } else{
            //console.log(response.body);
            commit("SET_LOCAIS", response.body.locais);
            commit("SET_BENS", response.body.bens);
            resolve();
          }
        })
        .catch((error => {
            console.log(error);
        }));
    });
  },
  fetchProdutos({ commit }) {
    return new Promise((resolve, reject) => {
        Vue.http.get("./config/api/apiConfigFull.php?action=prod")
        .then((response) => {
          if(response.body.error){
            console.log(response.body.message);
          } else{
            commit("SET_PRODUTOS", response.body.produtos);
            resolve();
          }
        })
        .catch((error => {
            console.log(error);
        }));
    });
  },
}

const getters = {
  getUser: state => state.user,
  getUsers: state => state.users,
  getProprietario: state => state.proprietario,
  getLojas: state => state.lojas,
  getLocais: state => state.locais,
  getLocal: state => state.local,
  getBens: state => state.bens,
  getTipos: state => state.tipos,
  getProdutos: state => state.produtos,
  getFabricantes: state => state.fabricantes,
  getCategorias: state => state.categorias,
  getTodoById: state => (id) => {
    return state.lojas.filter(loja => loja.id === id)
  },
  getLojaId: (state) => (id) => {
    return state.lojas.find(todo => todo.id === id)
    //return state.lojas.filter(loja => loja.id === id)
  },
  getTodoBy: (state) => (id) => {
    return state.lojas.find(todo => todo.id === id)
  },
  getLocalId: (state) => (id) => {
    return state.locais.find(todo => todo.id === id)
    //return state.lojas.filter(loja => loja.id === id)
  },
  getLocalId: (state) => (id) => {
    return state.locais.find(todo => todo.id === id)
    //return state.lojas.filter(loja => loja.id === id)
  },
  getLocalLoja: (state) => (loja) => {
    return state.locais.filter(todo => todo.loja === loja)
    //return state.lojas.filter(loja => loja.id === id)
  },
  getBensLocal: (state) => (local) => {
    return state.bens.filter(todo => todo.local === local)
  },
}

const store = new Vuex.Store({
  state,
  mutations,
  actions,
  getters
})

var NaoEncontrado = Vue.extend({
  template: '#naoEncontrado',
  data: function () {
    return {item: '' };
  },
  methods: {
    deleteProduct: function () {
      //products.splice(findProductKey(this.$route.params._id), 1);
      //router.push('/');
    }
  }
});

var router = new VueRouter({
  routes: [
    {path: '/', component: List},
    {path: '/loja/:_id', component: Loja, name: 'loja'},
    /*{path: '/config', component: Loja,
    children: [
        {path: '', components: { 
            default: SegList,
            ordem: OrdemList,
            grupo: GrupoList,
            fab: FabList
            }, name:'Configuração'},
      ]
    },*/
    {path: '/loja/:_id/local/:_local', component: Local, name: 'local'},
    {path: '*', component: NaoEncontrado}
  ]
});

var App = {}

new Vue({
  router,
  store
}).$mount('#app')
