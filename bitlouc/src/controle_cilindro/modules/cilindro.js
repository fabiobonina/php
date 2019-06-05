
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
                    state.loading = true;
                    //console.log(response.data);
                    if(!response.data.error){
                        commit("SET_CILINDROS", response.data.cilindros);
                    } else{
                        console.log(response.data.message);
                    }
                    state.loading = false;
                    resolve();
                })
                .catch((error => {
                    state.loading = false;
                    console.log(error.statusText);
                }));
            });
        },
        publishCilindro({ commit }, postData ) {
            return new Promise((resolve, reject) => {
                state.loading = true;
                Vue.http.post( CILINDROPUBLISH , postData).then((response) => {
                    console.log(response.data);
                    if(!response.data.error){
                        commit("SET_PROGRAMACAO", response.data.programacao);
                        commit("SET_CILITEMS", response.data.items);
                    } else{
                        console.log(response.data.message);
                    }
                    state.loading = false;
                    resolve();
                })
                .catch((error => {
                    state.loading = false;
                    console.log(error.statusText);
                }));
            });
        },
        
    },
    getters: {
        cilindros:    state => state.cilindros,
        cilindroCapacidade: (state) => (capacidade) => {
            return state.cilindros.filter(todo => todo.capacidade == capacidade)
        },
    }
}