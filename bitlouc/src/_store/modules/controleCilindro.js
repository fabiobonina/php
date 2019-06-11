
const CILCONFIG             ='./config/api/CilConfig.api.php?action=read';
const CILINDROLIST          ='./config/api/cilindro.api.php?action=read';
const CILPROGRAMACAOLIST    ='./config/api/cilProgramacao.api.php?action=read';
const CILPROGRAMACAOSHOW    ='./config/api/cilProgramacao.api.php?action=show';
const CILPROGRAMACAOITEM    ='./config/api/cilProgramacao.api.php?action=item';

const controleCilindro = {
    
    state: {
        cilindros: [],
        cilindro: {},
        programacoes: [],
        programacao: {},
        cilDemanda: {},
        cilItems: {},
        cilTipos: [],
        cilFabricante: [
            'CBC',
            'CILBRAS',
            'GIFEL',
            'GBC',
            'MAT SA',
        ],
    },
    mutations: {
        SET_CILINDROS:      (state, cilindros)      => state.cilindros      = cilindros,
        SET_CILINDRO:       (state, cilindro)       => state.cilindro       = cilindro,
        SET_PROGRAMACOES:   (state, programacoes)   => state.programacoes   = programacoes,
        SET_PROGRAMACAO:    (state, programacao)    => state.programacao    = programacao,
        SET_CILDEMANDA:     (state, cilDemanda)     => state.cilDemanda     = cilDemanda, 
        SET_CILITEMS:       (state, cilItems)       => state.cilItems       = cilItems, 
        SET_CILTIPOS:       (state, cilTipos)       => state.cilTipos       = cilTipos,
    },
    actions: {
        fetchCilTipos({ commit }) {
            return new Promise((resolve, reject) => {
                Vue.http.get(CILCONFIG)
                .then((response) => {
                    commit('loading_ativo');
                    //console.log(response.data);
                    if(response.data.error){
                        console.log(response.data.message);
                    } else{
                        commit("SET_CILTIPOS", response.data.cilTipos);
                    }
                    commit('loading_inativo');
                    resolve();
                })
                .catch((error => {
                    commit('loading_inativo');
                    console.log(error);
                }));
            });
        },
        //CILINCROS
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
        listProgramacao({ commit }) {
            return new Promise((resolve, reject) => {
                Vue.http.get( CILPROGRAMACAOLIST ).then((response) => {
                    commit('loading_ativo');
                    if(!response.data.error){
                        //console.log(response.data);
                        commit("SET_PROGRAMACOES", response.data.programacoes);
                        localStorage.setItem('programacoes',  JSON.stringify(response.data.programacoes) );
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
        showProgramacao({ commit }, programacao_id ) {
            return new Promise((resolve, reject) => {
                commit('loading_ativo');
                var postData = { programacao_id: programacao_id, }
                Vue.http.post( CILPROGRAMACAOSHOW , postData).then((response) => {
                    //console.log(response.data);
                    if(!response.data.error){
                        commit("SET_PROGRAMACAO", response.data.programacao);
                        commit("SET_CILITEMS", response.data.items);
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
        cilindroItens({ commit }, data ) {
            return new Promise((resolve, reject) => {
                commit('loading_ativo');
                var postData = data
                var retorno = [];
                Vue.http.post( CILPROGRAMACAOITEM , postData).then((response) => {
                    //console.log(response.data);
                    if(!response.data.error){
                        retorno = data.cilindroItem;
                    } else{
                        console.log(response.data.message);
                    }
                    localStorage.setItem("cilindroItem", retorno );
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
            return state.cilindros.filter(todo => todo.capacidade == capacidade)
        },
        itemsDemanda: (state) => (demanda_id) => {
            return state.cilItems.filter(todo => todo.demanda_id == demanda_id)
        },
        programacao:        state =>    state.programacao,
        getProgramacoes:    state =>    state.programacoes,
        cilTipos:           state =>    state.cilTipos,
        cilFabricante:      state =>    state.cilFabricante,
    }
}


/*export default {
    state: productos,
    mutations,
};*/