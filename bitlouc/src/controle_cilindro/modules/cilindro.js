
const CILINDROLIST      ='./config/api/cilindro.api.php?action=read';
const CILINDROPUBLISH   ='./config/api/cilindro.api.php?action=publish';

const cilindro = {
    
    state: {
        cilindros: [],
        cilindro: {},
    },
    mutations: {
        SET_CILINDROS:  (state, cilindros)  => state.cilindros  = cilindros,
        SET_CILINDRO:   (state, cilindro)   => state.cilindro   = cilindro,
    },
    actions: {
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
        cilindros:    state => state.cilindros,
        cilindroCapacidade: (state) => (capacidade) => {
            return state.cilindros.filter(todo => todo.capacidade_id == capacidade)
        },
    }
}