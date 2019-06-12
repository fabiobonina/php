
const OSLIST        ='./config/api/os.api.php?action=read';
const OSFIND        ='./config/api/os.api.php?action=os';
const OSSTATUSFIND  ='./config/api/os.api.php?action=status';
const OSAMARARFIND  ='./config/api/os.api.php?action=semAmaracao';

const os = {
    
    state: {
      os:{},
      oss:[],
      osLojas:[],
      ocorrencias:[],
      osUf:[],
    },
    mutations: {        
      SET_OS:   (state, os)     => state.os     = os,
      SET_OSS:  (state, oss)    => state.oss    = oss,
      SET_OSLOJAS: (state, osLojas) => state.osLojas = osLojas,
      SET_OCORRENCIAS: (state, ocorrencias) => state.ocorrencias = ocorrencias,
      SET_OSUF: (state, osUf) => state.osUf = osUf,
    },
    actions: {
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
              commit('loading_ativo');
              var postData = {
                status: status,
              }
              Vue.http.post(OSSTATUSFIND, postData).then((response) => {
                commit('loading_inativo');
                if(response.data.error){
                  console.log(response.data.message);
                } else{          
                  commit("SET_OSS", response.data.oss);
                }
                resolve();
              })
              .catch((error => {
                commit('loading_inativo');
                  console.log(error);
              }));
            });
          },
          findOsSemAmaracao({ commit } ) {
            return new Promise((resolve, reject) => {
              commit('loading_ativo');
              Vue.http.get(OSAMARARFIND).then((response) => {
                //console.log(response.data);
                if(response.data.error){
                  console.log(response.data.message);
                } else{          
                  commit("SET_OSS", response.data.oss);
                  commit('loading_inativo');
                  resolve();
                } 
              })
              .catch((error => {
                  commit('loading_inativo');
                  console.log(error.statusText);
              }));
            });
          },
        fetchCilindros({ commit }) {
            return new Promise((resolve, reject) => {
                Vue.http.get(CILINDROLIST).then((response) => {
                    commit('loading_ativo');
                    //console.log(response.data);
                    if(!response.data.error){
                        commit("SET_CILINDROS", response.data.cilindros);
                    } else{
                        console.log(response.data.message);
                    }
                    commit('loading_inativo');
                    resolve();
                })
                .catch((error => {
                    commit('loading_inativo');
                    console.log(error.statusText);
                }));
            });
        },
        publishCilindro({ commit }, postData ) {
            return new Promise((resolve, reject) => {
                //commit('loading_ativo');
                commit('loading_ativo');
                //console.log(postData);
                Vue.http.post( CILINDROPUBLISH , postData).then((response) => {
                    //console.log(response);
                    //console.log(response.data.message);
                    if(!response.data.error){
                        //commit(fetchCilindros());
                    } else{
                        console.log(response.data.message);
                    }                    
                    console.log(response.data.message);
                    commit('loading_inativo');
                    resolve();
                })
                .catch((error => {
                    commit('loading_inativo');
                    console.log(error.statusText);
                }));
            });
        },
        
    },
    getters: {
      oss: state => state.oss,
      os: state => state.os,
      ocorrencias: state => state.ocorrencias,
      getOssLoja: (state) => (loja) => {
        return state.oss.filter(todo => todo.loja_id === loja)
      },
      getOssLocal: (state) => (local) => {
        return state.oss.filter(todo => todo.local.id === local)
      },
      getOssUF: (state) => (uf) => {
        return state.oss.filter(todo => todo.uf == uf)
      },
      getUF: (state) => (id) => {
        return state.osUf.find(todo => todo.id == id)
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
}