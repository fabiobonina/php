const controleCilindro = {
    
    state: {
        cilindros:[],
        cilindro:[],
        cilProgramacoes:[],
        cilProgramacao:{},
        cilDemanda:{},
        cilItems:{},
        cil_tipos:[],
    },
    mutations: {
        anadirProducto: (state, producto) => state.productos.unshift(producto),
        SET_CILINDROS: (state, cilindros) => state.cilindros = cilindros,
        SET_CILINDRO: (state, cilindro) => state.cilindro = cilindro,
        SET_CILPROGRAMACOES: (state, cilProgramacoes) =>  state.cilProgramacoes = cilProgramacoes,
        SET_CILPROGRAMACAO: (state, cilProgramacao) =>  state.cilProgramacao = cilProgramacao,
        SET_CILDEMANDA: (state, cilDemanda) =>  state.cilDemanda = cilDemanda, 
        SET_CILITEMS: (state, cilItems) =>  state.cilItems = cilItems, 
        SET_CIL_TIPOS: (state, cil_tipos) =>  state.cil_tipos = cil_tipos,
    },
    actions: {
        fetchCilTipos({ commit }) {
            return new Promise((resolve, reject) => {
                Vue.http.get(CONFIGCILIND)
                .then((response) => {
                if(response.data.error){
                    console.log(response.data.message);
                } else{
                    commit("SET_CIL_TIPOS", response.data.cil_tipos);
                    resolve();
                }
                })
                .catch((error => {
                    console.log(error);
                }));
            });
        },
        //CILINCROS
        fetchCilindros({ commit }) {
            return new Promise((resolve, reject) => {
            Vue.http.get('./config/api/cilindro.api.php?action=read').then((response) => {
                console.log(response.data);
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
            Vue.http.get('./config/api/cilProgramacao.api.php?action=read').then((response) => {
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
            Vue.http.post('./config/api/cilProgramacao.api.php?action=show', postData).then((response) => {
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
            Vue.http.post('./config/api/cilProgramacao.api.php?action=item', postData).then((response) => {
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
        },
    },
    getters: {
        getItemsDemanda: (state) => (demanda_id) => {
            return state.cilItems.filter(todo => todo.demanda_id == demanda_id)
        },
    }
}


/*export default {
    state: productos,
    mutations,
};*/