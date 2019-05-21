const LOGIN = "LOGIN";
const LOGIN_SUCCESS = "LOGIN_SUCCESS";
const LOGOUT = "LOGOUT";

const user = {

    state: {
        isLoggedIn: !!localStorage.getItem("token"),
        token: atob(localStorage.getItem("token")),
        user: {},
        users:[],
    },

    mutations: {
        [LOGIN](state) {
            state.loading = true;
        },
        [LOGIN_SUCCESS](state, creds) {
            localStorage.setItem("token", btoa( creds.token ));
            state.isLoggedIn = !!localStorage.getItem("token");
            state.user = creds.user
            state.token = creds.token ;
            state.loading = false;
        },
        [LOGOUT](state) {
            state.isLoggedIn = false;
            state.token = NULL;
            state.user = {};
        },
        SET_USER(state, user) {
            state.user = user
        },
        SET_LOGAR(state, creds) {
            state.user = creds.user
            state.isLoggedIn = creds.isLoggedIn;
            state.token = creds.token ;
        },
    },

    actions: {
        login({ state, commit, rootState }, creds) {
            return new Promise(resolve => {
                //commit("SET_LOGAR", creds);
                commit(LOGIN_SUCCESS, creds);
                resolve();
            });
        },
        logout({ commit }) {
            return new Promise((resolve, reject) => {
                Vue.http.post('./config/api/user.api.php?action=logout')
                .then(function(response) {
                    console.log( response); 
                    commit(LOGOUT); 
                    commit("SET_USER", {} );
                    commit("SET_PROPRIETARIO", {});
                    commit("SET_LOJAS", []);
                    commit("SET_OSS", []);
                    commit("SET_OSUF", []);
                    commit(LOGOUT);
                })
                .catch((error => {
                    console.log(error.statusText);
                }));
            });
        },
        isLoggedIn({ commit }) {
            return new Promise((resolve, reject) => {
                var postData = { token: state.token };
                Vue.http.post('./config/api/user.api.php?action=isLoggedIn', postData )
                .then(function(response) {
                    console.log( response); 
                    if(response.data.error){
                        console.log(response.data.message);
                        if(!response.data.user.isLoggedIn){
                            commit(LOGOUT);
                        }
                    } else{
                        commit("SET_LOGAR", response.data.user);                        
                    }
                    resolve();
                })
                .catch((error => {
                    console.log(error.statusText);
                }));
            });
        },
    },

    getters: {
        isLoggedIn: state => state.isLoggedIn,
        user:       state => state.user,
        users:      state => state.users,
    }
}


/*export default {
    state: productos,
    mutations,
};*/