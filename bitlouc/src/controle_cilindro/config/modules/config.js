
const CILCONFIG ='./config/api/CilConfig.api.php?action=read';

const controleCilindro = {
    
    state: {
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
        SET_CILTIPOS:   (state, cilTipos)   => state.cilTipos   = cilTipos,
    },
    actions: {
        fetchCilTipos({ commit }) {
            return new Promise((resolve, reject) => {
                Vue.http.get(CILCONFIG)
                .then((response) => {
                    state.loading = true;
                    //console.log(response.data);
                    if(response.data.error){
                        console.log(response.data.message);
                    } else{
                        commit("SET_CILTIPOS", response.data.cilTipos);
                    }
                    state.loading = false;
                    resolve();
                })
                .catch((error => {
                    state.loading = false;
                    console.log(error);
                }));
            });
        },
    
    },
    getters: {
        cilTipos:           state =>    state.cilTipos,
        cilFabricante:      state =>    state.cilFabricante,
    }
}


/*export default {
    state: productos,
    mutations,
};*/