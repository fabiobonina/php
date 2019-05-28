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

const OSLIST        ='./config/api/os.api.php?action=read';
const OSFIND        ='./config/api/os.api.php?action=os';
const OSSTATUSFIND  ='./config/api/os.api.php?action=status';
const OSAMARARFIND  ='./config/api/os.api.php?action=semAmaracao';

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
      state.loading = true;
      var postData = {
        status: status,
      }
      Vue.http.post(OSSTATUSFIND, postData).then((response) => {
        state.loading = false;
        if(response.data.error){
          console.log(response.data.message);
        } else{          
          commit("SET_OSS", response.data.oss);
        }
        resolve();
      })
      .catch((error => {
        state.loading = false;
          console.log(error);
      }));
    });
  },
  findOsSemAmaracao({ commit } ) {
    return new Promise((resolve, reject) => {
      state.loading = true;
      Vue.http.get(OSAMARARFIND).then((response) => {
        //console.log(response.data);
        if(response.data.error){
          console.log(response.data.message);
        } else{          
          commit("SET_OSS", response.data.oss);
          state.loading = false;
          resolve();
        } 
      })
      .catch((error => {
          state.loading = false;
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
      //console.log(postData);
      Vue.http.post(EQUIPAMENTOSLOCAL,postData).then((response) => {
        //console.log(response.data);
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
  /*/CILINCROS
  fetchCilindros({ commit }) {
    return new Promise((resolve, reject) => {
      Vue.http.get(CILINDROLIST).then((response) => {
        if(!response.data.error){
          //console.log(response.data);
          commit("SET_CILINDROS", response.data.cilindros);
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
  fetchCilProgramacao({ commit }) {
    return new Promise((resolve, reject) => {
      Vue.http.get(CILPROGRAMACAOLIST).then((response) => {
        if(!response.data.error){
          //console.log(response.data);
          commit("SET_CILPROGRAMACOES", response.data.cilProgramacoes);
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
  showCilProgramacao({ commit }, programacao_id ) {
    return new Promise((resolve, reject) => {
      var postData = {
        programacao_id: programacao_id,
      }
      Vue.http.post(CILPROGRAMACAOSHOW, postData).then((response) => {
        //console.log(response.data);
        if(!response.data.error){
          commit("SET_CILPROGRAMACAO", response.data.programacao);
          commit("SET_CILITEMS", response.data.items);
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
  setCilindro({ commit }, cilindro) {
    commit("SET_CILINDRO", cilindro)
  },
  cilindroItens({ commit }, data ) {
    return new Promise((resolve, reject) => {
      var postData = data
      var retorno = [];
      Vue.http.post(CILPROGRAMACAOITEM, postData).then((response) => {
        //console.log(response.data);
        if(!response.data.error){
          retorno = data.cilindroItem;
        } else{
          console.log(response.data.message);
        }
        localStorage.setItem("cilindroItem", retorno );
        resolve();
      })
      .catch((error => {
          console.log(error.statusText);
      }));
    });
  },*/
}


