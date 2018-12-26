/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário
Vue.http.options.emulateJSON = true;
const INDEXLIST   ='./config/api/apiProprietario.php?action=read';
const CONFIG      ='./config/api/apiConfig.php?action=config';

const BENSLIST   ='./config/api/apiLocal.php?action=read';
const OSLIST      ='./config/api/apiOs.php?action=read';
const CONFIGPROD  ='./config/api/apiConfig.php?action=prod';

const LOCAISLIST          ='./config/api/apiLocal.php?action=read';
const LOCAISPROPRIETARIO  ='./config/api/apiLocal.php?action=proprietario';
const LOCAISLOJA          ='./config/api/apiLocal.php?action=loja';

const EQUIPAMENTOSLIST   ='./config/api/apiEquipamento.php?action=read';
const EQUIPAMENTOSLOJA   ='./config/api/apiEquipamento.php?action=loja';
const EQUIPAMENTOSLOCAL  ='./config/api/apiEquipamento.php?action=local';



const actions = {
  login({ state, commit, rootState }, creds) {
    commit(LOGIN); // show spinner
    return new Promise(resolve => {
      setTimeout(() => {
        localStorage.setItem("token", btoa( creds.token ));
        localStorage.setItem("isLoggedIn", btoa( creds.isLoggedIn ));
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
          commit("SET_OSS", response.data.oss);
          commit("SET_OSUF", response.data.osUF);
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
      Vue.http.get(CONFIG).then((response) => {
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
          commit("SET_UF", response.data.ufs);
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
        Vue.http.get(OSLIST).then((response) => {
        if(response.data.error){
          console.log(response.data.message);
        } else{
          //console.log(response.data);
          //commit("SET_OSPROPRIETARIO", response.data.osProprietario);
          //commit("SET_OSLOJAS", response.data.osLojas);
          //commit("SET_OSS", response.data.oss);
          commit("SET_MODS", response.data.mod);
          resolve();
        }
      })
      .catch((error => {
          console.log(error.statusText);
      }));
    });
  },
  fetchLocalLoja({ commit }, loja) {
    return new Promise((resolve, reject) => {
      var postData = {
        loja: loja,
      }
      //console.log(postData);
      Vue.http.post(LOCAISLOJA, postData)
        .then((response) => {
          //console.log(response.data);
          if(response.data.error){
            console.log(response.data.message);
          } else{
            //console.log(response.data);
            commit("SET_LOCAIS", response.data.locais);
            //commit("SET_BENS", response.data.bens);
            resolve();
          }
        })
        .catch((error => {
            console.log(error);
        }));
    });
  },
  fetchEquipamentoLocal({ commit }, local) {
    return new Promise((resolve, reject) => {
      var postData = { local: local }
      console.log(postData);
      Vue.http.post(EQUIPAMENTOSLOCAL,postData).then((response) => {
        console.log(response.data);
        if(response.data.error){
          console.log(response.data.message);
        } else{
          commit("SET_EQUIPAMENTOS", response.data.equipamentos);
          resolve();
        }
      }).catch((error => {
          console.log(error);
      }));
    });
  },
  fetchLojaUnder({ commit }, loja) {
    return new Promise((resolve, reject) => {
      var postData = { loja: loja }
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


