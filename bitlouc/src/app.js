/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário
Vue.http.options.emulateJSON = true;
const INDEXLIST   ='./config/api/apiProprietario.php?action=read';
const CONFIG      ='./config/api/apiConfig.php?action=config';
const LOCALLIST   ='./config/api/apiLocal.php?action=read';
const OSLIST      ='./config/api/apiOs.php?action=read';
const CONFIGPROD  ='./config/api/apiConfig.php?action=prod';

const LOGIN = "LOGIN";
const LOGIN_SUCCESS = "LOGIN_SUCCESS";
const LOGOUT = "LOGOUT";

const state = {
  isLoggedIn: !!localStorage.getItem("token"),
  token: atob(localStorage.getItem("token")),
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
  status:'0',
}

const mutations = {
  [LOGIN](state) {
    state.pending = true;
  },
  [LOGIN_SUCCESS](state) {
    state.isLoggedIn = true;
    state.pending = false;
  },
  [LOGOUT](state) {
    state.isLoggedIn = false;
    state.token = '';
  },
  SET_SEARCH(state, search) {
    state.search = search
  },
  SET_STATUS(state, status) {
    state.status = status
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
  SET_LOGAR(state, creds) {
    state.user = creds.user
    state.isLoggedIn = creds.isLoggedIn;
    state.token = creds.token ;
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
  login({ state, commit, rootState }, creds) {
    commit(LOGIN); // show spinner
    return new Promise(resolve => {
      setTimeout(() => {
        localStorage.setItem("token", btoa( creds.token ));
        commit("SET_LOGAR", creds);
        commit(LOGIN_SUCCESS);
        resolve();
      }, 1000);
    });
  },
  logout({ commit }) {
    localStorage.removeItem("token");
    localStorage.removeItem("isLoggedIn");
    commit(LOGOUT);
  },
  setSearch({ commit }, search) {
    commit("SET_SEARCH", search)
  },
  setStatus({ commit }, status) {
    commit("SET_STATUS", status)
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
  fetchIndex({ commit }) {
    return new Promise((resolve, reject) => {
      var postData = { token: state.token };
      Vue.http.post(INDEXLIST, postData )
      .then(function(response) {
        //console.log( response); 
        if(response.data.error){
          //console.log(response.data.message);
          if(!response.data.isLoggedIn){
            localStorage.removeItem("token");
            localStorage.removeItem("isLoggedIn");
            commit(LOGOUT);
          }
        } else{
          commit("SET_USER", response.data.user);
          commit("SET_PROPRIETARIO", response.data.proprietarios);
          commit("SET_LOJAS", response.data.lojas);
          commit("SET_LOCAIS", response.data.locais);
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
      Vue.http.get(CONFIG)
      .then((response) => {
        if(response.data.error){
          console.log(response.data.message);
        } else{
          //console.log(response.data);
          commit("SET_TIPOS", response.data.tipos);
          commit("SET_CATEGORIAS", response.data.categorias);
          commit("SET_FABRICANTES", response.data.fabricantes);
          commit("SET_SERVICOS", response.data.servicos);
          commit("SET_TECNICOS", response.data.tecnicos);
          commit("SET_SEGUIMENTOS", response.data.seguimentos);
          commit("SET_GRUPOS", response.data.grupos);
          commit("SET_DESLOC_STATUS", response.data.deslocStatus);
          commit("SET_DESLOC_TRAJETOS", response.data.deslocTrajetos);
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
        Vue.http.get(OSLIST)
      .then((response) => {
        if(response.data.error){
          console.log(response.data.message);
        } else{
          //console.log(response.data);
          commit("SET_OSPROPRIETARIO", response.data.osProprietario);
          commit("SET_OSLOJAS", response.data.osLojas);
          commit("SET_OSS", response.data.oss);
          commit("SET_MODS", response.data.mod);
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
      Vue.http.post(LOCALLIST,postData)
        .then((response) => {
          if(response.data.error){
            console.log(response.data.message);
          } else{
            //console.log(response.data);
            commit("SET_LOCAIS", response.data.locais);
            commit("SET_BENS", response.data.bens);
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
        Vue.http.get(CONFIGPROD)
        .then((response) => {
          if(response.data.error){
            console.log(response.data.message);
          } else{
            commit("SET_PRODUTOS", response.data.produtos);
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
  isLoggedIn: state => {
    return state.isLoggedIn;
  },
  //getSearch: state => state.tipoDeslocamentos,
  getSearch: state => state.search,
  getStatus: state => state.status,
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
  getLojaAtivo: (state) => () => {
    return state.lojas.filter(todo => todo.ativo === '0')
    //return state.lojas.filter(loja => loja.id === id)
  },
  getTodoBy: (state) => (id) => {
    return state.lojas.find(todo => todo.id === id)
  },
  getLocalId: (state) => (id) => {
    return state.locais.find(todo => todo.id === id)
    //return state.lojas.filter(loja => loja.id === id)
  },
  getLocalLoja: (state) => (loja) => {
    state.locais.filter(todo => todo.ativo === '0')
    return state.locais.filter(todo => todo.loja === loja)
    //return state.lojas.filter(loja => loja.id === id)
  },
  getBensLocal: (state) => (local) => {
    return state.bens.filter(todo => todo.local === local)
  },
  getOssLoja: (state) => (loja) => {
    return state.oss.filter(todo => todo.loja === loja)
  },
  getOssLocal: (state) => (local) => {
    return state.oss.filter(todo => todo.local.id === local)
  },
  getOssStatus: (state) => (status) => {
    return state.oss.filter(todo => todo.status === status)
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

//Vue.component('v-select', VueSelect.VueSelect);

Vue.component('todo-item', {
  template: `
    <li>
      {{ user }}
      <button class="delete" aria-label="close" v-on:click="$emit(\'remove\')"></button>
    </li>
  `,
  props: ['user']
});
Vue.use(VeeValidate)
var router = new VueRouter({
  routes: [
    { path: '/', component: Home,
      children: [
        { path: '', component: Dashboard },
      ]
    },
    { path: '/oss', component: Oss,
      children: [
        { path: '', component: OsLojas },
        { path: 'os-status', component: OsStus },
        { path: 'os-tec', component: OsTec },
      ] 
    },
    { path: '/oss/:_id/os/:_os', component: Os, name: 'os'},
    { path: '/lojas', component: Lojas, name: 'lojas' },
    { path: '/loja/:_id', component: Loja,
      children: [
        { path: '', component: LocaisIndex },
        { path: 'oss', component: LojaOss },
        //{ path: 'bens', component: LojaBens },
      ]
    },
    { path: '/proprietario', component: Proprietario,
      children: [
        { path: '', component: LojasPlus },
        { path: 'locais', component: LocaisPlus },
        //{ path: 'oss', component: OsPlus },
        //{ path: 'bens', component: LojaBens },
      ]
    },
    /*{ path: '/loja/:_id/local/:_local', component: Local,
      children: [
        { path: '', component: Bens },
        { path: 'oss-local', component: OssLocal },
      ]
    },
    /*{path: '/oss/:_id/os/:_os', component: Os, name: 'os'},
    {path: '/projeto', component: Projeto,
      children: [
        { path: '', component: Dashboard },
        { path: 'oss', component: OssHome,
          children: [
          { path: '', component: Oss },
          { path: 'oss-tec', component: OssTec },
          { path: 'oss-status', component: OssStus },
        ] },
        { path: 'lojas', component: Lojas },
        { path: 'oss-tec', component: OssTec },
      ]
    },*/
    {path: '*', component: NaoEncontrado},
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
  ]
});

var App = {}

new Vue({
  router,
  store,
}).$mount('#app')
