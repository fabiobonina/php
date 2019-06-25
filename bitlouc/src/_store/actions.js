/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário
Vue.http.options.emulateJSON = true;
const INDEXLIST     ='./config/api/organizacao.api.php?action=read';
const CONFIG        ='./config/api/config.api.php?action=config';
const CONFIGPROD    ='./config/api/config.api.php?action=prod';

const LOCAISLIST          ='./config/api/local.api.php?action=read';
const LOCAISPROPRIETARIO  ='./config/api/local.api.php?action=proprietario';
const LOCAISLOJA          ='./config/api/local.api.php?action=loja';
const LOCALFIND           ='./config/api/local.api.php?action=local';

const BENSLIST           ='./config/api/local.api.php?action=read';
const EQUIPAMENTOSLIST   ='./config/api/equipamento.api.php?action=read';
const EQUIPAMENTOSLOJA   ='./config/api/equipamento.api.php?action=loja';
const EQUIPAMENTOSLOCAL  ='./config/api/equipamento.api.php?action=local';

const actions = {
  setSearch({ commit }, search) {
    commit("SET_SEARCH", search)
  },
  setStatus({ commit }, status) {
    commit("SET_STATUS", status)
  },
  errorMessage({ commit }, errorMessage) {
    commit("errorMessage", errorMessage)
  },
  successMessage({ commit }, successMessage) {
    commit("successMessage", successMessage)
  },
  apagarMessage({ commit }) {
    commit("apagarMessage");
  },
  fetchIndex({ commit }) {
    return new Promise((resolve, reject) => {
      Vue.http.get('./config/api/organizacao.api.php?action=read')
      .then(function(response) {
        if(response.data.error){
          console.log(response.data.message);
          if(!response.data.user.isLoggedIn){
            localStorage.removeItem("token");
            localStorage.removeItem("isLoggedIn");
            commit(LOGOUT);
            resolve();
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
      .catch( function(error) {
          console.log(error.statusText);
      });
    });
  },
  fetchConfig({ commit }) {
    return new Promise((resolve, reject) => {
      Vue.http.get(CONFIG).then((response) => {
        if(!response.data.error){
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
        } else{
          console.log(response.data.message);
        }
      })
      .catch( function(error) {
          console.log(error.statusText);
      });
    });
  },
  findLocal({ commit }, local_id ) {
    return new Promise((resolve, reject) => {
      commit('loading_ativo');
      var postData = {
        local_id: local_id,
      }
      Vue.http.post(LOCALFIND, postData).then((response) => {
        if(response.data.error){
          console.log(response.data.message);
        } else{
          commit("SET_LOCAL", response.data.local);
          
        }
        commit('loading_inativo');
        resolve();
      })
      .catch( function(error) {
          commit('loading_inativo');
          console.log(error.statusText);
      });
    });
  },
  fetchLocal({ commit }) {
    return new Promise((resolve, reject) => {
      //console.log(postData);
      commit('loading_ativo');
      Vue.http.get(LOCAISLIST)
        .then((response) => {
          //console.log(response.data);
          if(response.data.error){
            console.log(response.data.message);
          } else{
            //console.log(response.data);
            commit("SET_LOCAIS", response.data.locais);
            //commit("SET_BENS", response.data.bens);
            
          }
          commit('loading_inativo');
          resolve();
        })
        .catch( function(error) {
            console.log(error);
            commit('loading_inativo');
        });
    });
  },
  fetchLocalLoja({ commit }, loja_id) {
    return new Promise((resolve, reject) => {
      
      commit('loading_ativo');
      var postData = {
        loja: loja_id,
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
          }
          
          resolve();
          commit('loading_inativo');
        })
        .catch( function(error) {
            console.log(error);
          commit('loading_inativo');
        });
    });
  },
  fetchEquipamentoLocal({ commit }, local) {
    return new Promise((resolve, reject) => {
      commit('loading_ativo');
      var postData = { local: local }
      //console.log(postData);
      Vue.http.post(EQUIPAMENTOSLOCAL,postData).then((response) => {
        //console.log(response.data);
        if(response.data.error){
          console.log(response.data.message);
        } else{
          commit("SET_EQUIPAMENTOS", response.data.equipamentos); 
        }
        resolve();
      }).catch( function(error) {
          console.log(error);
      });
      commit('loading_inativo');
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
        .catch( function(error) {
            console.log(error);
        });
    });
  },
  /*fetchProdutos({ commit }) {
    return new Promise((resolve, reject) => {
      commit('loading_ativo');
        Vue.http.get(CONFIGPROD)
        .then(function(response) {
          if(response.data.error){
            console.log(response.data.message);
          } else{
            commit("SET_PRODUTOS", response.data.produtos);
          }
          commit('loading_inativo');
          resolve();
        })
        .catch( function(error) {
          commit('loading_inativo');
          console.log(error);
        });
    });
  },*/
};