const controleCilindro = {

    state: {
        isLoggedIn: !!localStorage.getItem("token"),
        token: atob(localStorage.getItem("token")),
        user: {},
        users:[],
    },

    mutations: {
        [LOGIN](state) {
            state.pending = true;
        },
        [LOGIN_SUCCESS](state) {
            state.isLoggedIn = !!localStorage.getItem("token");
            state.pending = false;
        },
        [LOGOUT](state) {
            state.isLoggedIn = false;
            state.token = NULL;
            state.user = "";
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
        isLoggedIn({ commit }) {
            return new Promise((resolve, reject) => {
              var postData = { token: state.token };
              Vue.http.post('./config/api/organizacao.api.php?action=read', postData )
              .then(function(response) {
                //console.log( response); 
                if(response.data.error){
                  console.log(response.data.message);
                  if(!response.data.user.isLoggedIn){
                    localStorage.removeItem("token");
                    localStorage.removeItem("isLoggedIn");
                    commit(LOGOUT);
                  }
                } else{
                  commit("SET_USER", response.data.user);
                  resolve();
                }
              })
              .catch((error => {
                  console.log(error.statusText);
              }));
            });
        },
    },

    getters: {
        isLoggedIn: state => state.isLoggedIn,
        getUser: state => state.user,
        getUsers: state => state.users,
    }
}


/*export default {
    state: productos,
    mutations,
};*/