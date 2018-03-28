/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário
Vue.http.options.emulateJSON = true;

const state = {
  deslocTrajetos: [],
  deslocStatus: [],
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
  servicos:[],
  tecnicos:[],
  osProprietario:{},
  osLojas:[],
  oss:[],
  mods:[],
  grupos:[],
  seguimentos:[],
  search:'',
}

const mutations = {
  SET_SEARCH(state, search) {
    state.search = search
  },
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
  SET_SERVICOS(state, servicos) {
    state.servicos = servicos
  },
  SET_TECNICOS(state, tecnicos) {
    state.tecnicos = tecnicos
  },
  SET_OSPROPRIETARIO(state, osProprietario) {
    state.osProprietario = osProprietario
  },
  SET_OSLOJAS(state, osLojas) {
    state.osLojas = osLojas
  },
  SET_OSS(state, oss) {
    state.oss = oss
  },
  SET_MODS(state, mods) {
    state.mods = mods
  },
  SET_SEGUIMENTOS(state, seguimentos) {
    state.seguimentos = seguimentos
  },
  SET_GRUPOS(state, grupos) {
    state.grupos = grupos
  },
  SET_DESLOC_TRAJETOS(state, deslocTrajetos) {
    state.deslocTrajetos = deslocTrajetos
  },
  SET_DESLOC_STATUS(state, deslocStatus) {
    state.deslocStatus = deslocStatus
  },
}

const actions = {
  setSearch({ commit }, search) {
    commit("SET_SEARCH", search)
  },
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
        Vue.http.get("./config/api/apiProprietario.php?action=read")
        .then((response) => {
          if(response.body.error){
            console.log(response.body.message);
          } else{
            commit("SET_USER", response.body.user);
            commit("SET_PROPRIETARIO", response.body.proprietarios);
            commit("SET_LOJAS", response.body.lojas);
            commit("SET_LOCAIS", response.body.locais);
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
        Vue.http.get("./config/api/apiConfig.php?action=config")
      .then((response) => {
        if(response.body.error){
          console.log(response.body.message);
        } else{
          //console.log(response.body);
          commit("SET_TIPOS", response.body.tipos);
          commit("SET_CATEGORIAS", response.body.categorias);
          commit("SET_FABRICANTES", response.body.fabricantes);
          commit("SET_SERVICOS", response.body.servicos);
          commit("SET_TECNICOS", response.body.tecnicos);
          commit("SET_SEGUIMENTOS", response.body.seguimentos);
          commit("SET_GRUPOS", response.body.grupos);
          commit("SET_DESLOC_STATUS", response.body.deslocStatus);
          commit("SET_DESLOC_TRAJETOS", response.body.deslocTrajetos);
          resolve();
        }
      })
      .catch((error => {
          console.log(error.statusText);
      }));
    });
  },
  fetchOs({ commit }) {
    return new Promise((resolve, reject) => {
        Vue.http.get("./config/api/apiOs.php?action=read")
      .then((response) => {
        if(response.body.error){
          console.log(response.body.message);
        } else{
          //console.log(response.body);
          commit("SET_OSPROPRIETARIO", response.body.osProprietario);
          commit("SET_OSLOJAS", response.body.osLojas);
          commit("SET_OSS", response.body.oss);
          commit("SET_MODS", response.body.mod);
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
      Vue.http.post("./config/api/apiLocal.php?action=read",postData)
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
        Vue.http.get("./config/api/apiConfig.php?action=prod")
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
  //getSearch: state => state.tipoDeslocamentos,
  getSearch: state => state.search,
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
  getServicos: state => state.servicos,
  getTecnicos: state => state.tecnicos,
  getOss: state => state.oss,
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
  getOssLoja: (state) => (loja) => {
    return state.oss.filter(todo => todo.loja === loja)
  },
  getOsId: (state) => (id) => {
    return state.oss.find(todo => todo.id === id)
  },
  getModOsTec: (state) => (os, tecnico) => {
    return state.oss.filter(todo => todo.os === os && todo.tecnico === tecnico)
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

Vue.component('v-select', VueSelect.VueSelect);

Vue.component('todo-item', {
  template: `
    <li>
      {{ user }}
      <button class="delete" aria-label="close" v-on:click="$emit(\'remove\')"></button>
    </li>
  `,
  props: ['user']
});

var router = new VueRouter({
  routes: [
    {path: '/', component: Home,
      children: [
        { path: '', component: Dashboard },
        { path: 'oss', component: Oss },
        { path: 'lojas', component: Lojas },
      ]
    },
    {path: '/loja/:_id', component: Loja,
      children: [
        { path: '', component: Locais },
        { path: 'lojaos', component: LojaOss },
      ]
     },
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
    {path: '/loja/:_id/local/:_local', component: Local,
      children: [
        { path: '', component: Bens },
        { path: 'localos', component: LocalOs },
      ]
    },
    {path: '/oss/:_id/os/:_os', component: Os, name: 'os'},
    {path: '*', component: NaoEncontrado}
  ]
});

var App = {}

new Vue({
  router,
  store
}).$mount('#app')
