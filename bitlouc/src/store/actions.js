/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário
Vue.http.options.emulateJSON = true;
const INDEXLIST     ='./config/api/apiProprietario.php?action=read';
const CONFIG        ='./config/api/apiConfig.php?action=config';
const CONFIGPROD    ='./config/api/apiConfig.php?action=prod';

const BENSLIST      ='./config/api/apiLocal.php?action=read';
const OSLIST        ='./config/api/apiOs.php?action=read';
const OSFIND        ='./config/api/apiOs.php?action=os';
const OSSTATUSFIND  ='./config/api/apiOs.php?action=status';
const OSAMARARFIND  ='./config/api/apiOs.php?action=semAmaracao';

const LOCAISLIST          ='./config/api/apiLocal.php?action=read';
const LOCAISPROPRIETARIO  ='./config/api/apiLocal.php?action=proprietario';
const LOCAISLOJA          ='./config/api/apiLocal.php?action=loja';
const LOCALFIND           ='./config/api/apiLocal.php?action=local';

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
  
  fetchIndex({ commit }) {
    return new Promise((resolve, reject) => {
      var postData = { token: state.token };
      Vue.http.post('./config/api/apiProprietario.php?action=read', postData )
      .then(function(response) {
        //console.log( response); 
        if(response.data.error){
          console.log(response.data.message);
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
      .catch((error => {
          console.log(error.statusText);
      }));
    });
  },
  findOs({ commit }, os_id ) {
    return new Promise((resolve, reject) => {
      var postData = {
        os_id: os_id,
      }
      Vue.http.post(OSFIND, postData).then((response) => {
        if(response.data.error){
          console.log(response.data.message);
        } else{
          commit("SET_OS", response.data.os);
          resolve();
        }
      })
      .catch((error => {
          console.log(error.statusText);
      }));
    });
  },
  findOsStatus({ commit }, status ) {
    return new Promise((resolve, reject) => {
      var postData = {
        status: status,
      }
      Vue.http.post(OSSTATUSFIND, postData).then((response) => {
        if(response.data.error){
          console.log(response.data.message);
        } else{          
          commit("SET_OSS", response.data.oss);
          resolve();
        }  
      })
      .catch((error => {
          console.log(error.statusText);
      }));
    });
  },
  findOsSemAmaracao({ commit } ) {
    return new Promise((resolve, reject) => {
      Vue.http.get(OSAMARARFIND).then((response) => {
        //console.log(response.data);
        if(response.data.error){
          console.log(response.data.message);
        } else{          
          commit("SET_OSS", response.data.oss);
          resolve();
        } 
      })
      .catch((error => {
          console.log(error.statusText);
      }));
    });
  },
  findLocal({ commit }, local_id ) {
    return new Promise((resolve, reject) => {
      var postData = {
        local_id: local_id,
      }
      Vue.http.post(LOCALFIND, postData).then((response) => {
        if(response.data.error){
          console.log(response.data.message);
        } else{
          commit("SET_LOCAL", response.data.local);
          resolve();
        }
      })
      .catch((error => {
          console.log(error.statusText);
      }));
    });
  },
  fetchLocal({ commit }, loja_id) {
    return new Promise((resolve, reject) => {
      //console.log(postData);
      Vue.http.get(LOCAISLIST)
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
  fetchLocalLoja({ commit }, loja_id) {
    return new Promise((resolve, reject) => {
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


