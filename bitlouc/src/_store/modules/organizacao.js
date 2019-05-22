Vue.http.options.emulateJSON = true;
const LOGIN = "LOGIN";
const LOGIN_SUCCESS = "LOGIN_SUCCESS";
const LOGOUT = "LOGOUT";

const usuario = JSON.parse(localStorage.getItem('user'));
//console.log(usuario.user)
const user = {

    state: {
        isLoggedIn: !!localStorage.getItem('token'),
        token: localStorage.getItem('token'),
        user: usuario,
        users: [],
    },

    mutations: {
        [LOGIN](state) {
            state.loading = true;
        },
        [LOGIN_SUCCESS](state, creds) {
            localStorage.setItem('token', creds.token );
            localStorage.setItem('user',  JSON.stringify(creds.user) );
            state.isLoggedIn = !!localStorage.getItem('token');
            state.loading = false;
            state.user = creds.user;
            state.token = creds.token ;
        },
        [LOGOUT](state) {
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            state.isLoggedIn = false;
            state.token = null;
            state.user = {};
        },
        SET_USER(state, user) {
            state.user = user
        },
    },

    actions: {
        login({ state, commit, rootState }, creds) {
            return new Promise(resolve => {
                commit(LOGIN);
                commit(LOGIN_SUCCESS, creds);
                router.push('/');
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
                    router.push('/login');
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