const LOGIN = "LOGIN";
const LOGIN_SUCCESS = "LOGIN_SUCCESS";
const LOGOUT = "LOGOUT";

const store = new Vuex.Store({
  state: {
    isLoggedIn: sessionStorage.getItem("token")
  },
  mutations: {
    [LOGIN](state) {
      state.pending = true;
    },
    [LOGIN_SUCCESS](state) {
      state.isLoggedIn = true;
      state.pending = false;
    },
    [LOGOUT](state) {
      state.isLoggedIn = false;
    }
  },
  actions: {
    login({
      state,
      commit,
      rootState
    }, creds) {
      console.log("login...", creds);
      commit(LOGIN); // show spinner
      return new Promise(resolve => {
        setTimeout(() => {
          sessionStorage.setItem("token", "JWT");
          commit(LOGIN_SUCCESS);
          resolve();
        }, 1000);
      });

    },
    logout({
      commit
    }) {
      sessionStorage.removeItem("token");
      commit(LOGOUT);
    }
  },
  getters: {
    isLoggedIn: state => {
      return state.isLoggedIn;
    }
  }
});

const mainNavTpl = `
    <section>
     <router-link to="/">Home</router-link>
     <router-link to="/login" v-if="!isLoggedIn">Login</router-link>
		 <a href="#" v-if="isLoggedIn" @click="logout">Logout</a> 
    </section>
    
`
const MainNav = Vue.component('main-nav', {
  template: mainNavTpl,
  methods: {
    ...Vuex.mapActions(["logout"])
  },
  computed: {
    ...Vuex.mapGetters(["isLoggedIn"])
  }
});
const Home = Vue.component('home', {
  template: "<h1>Home</h1>"
});
const loginTpl = `
  <form @submit.prevent="login()">
   <input type="text" placeholder="email" v-model="email">
   <input type="password" placeholder="password" v-model="password">
   <button type="submit">Login</button>
  </form>
 
`
const Login = Vue.component('login', {
  template: loginTpl,
  data() {
    return {
      email: "",
      password: ""
    }
  },
  methods: {
    login() {
      this.$store.dispatch("login", {
        email: this.email,
        password: this.password
      }).then(res => {
        this.$router.push('/');
      })
    }
  },
});
const routes = [{
    path: '/',
    component: Home
  },
  {
    path: '/login',
    component: Login
  }
]
const router = new VueRouter({
  routes
})
const app = new Vue({
  router,
  store,
  components: {
    "main-nav": MainNav
  },
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      modalLocalAdd: false,
      active: 1,
      dialog2: true,
      dialog: true,
      user: {
            avatar:"http://www.gravatar.com/avatar/5f3781a40c3fde1b4ac568a97692aa70?d=identicon",
            data:"2017-11-08",
            email:"fabiobonina@gmail.com",
            grupo:"P",
            id:"1",
            loja:"1",
            name:"FABIO VITORINO BONINA MORAIS",
            nivel:"4",
            proprietario:"1",
            user:"Fabio Bonina"
        },
        items: [
          {
            title: 'Click Me'
          },
          {
            title: 'Click Me'
          },
          {
            title: 'Click Me'
          },
          {
            title: 'Click Me 2'
          }
        ],
        select: [
          { text: 'State 1' },
          { text: 'State 2' },
          { text: 'State 3' },
          { text: 'State 4' },
          { text: 'State 5' },
          { text: 'State 6' },
          { text: 'State 7' }
        ],
        notifications: false,
        sound: true,
        widgets: false,
    };
  },
  created: function() {
    
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
      ...Vuex.mapGetters(["isLoggedIn"])
    
  }, // computed
  methods: {
      teste(){
        // Define the string
        var string = 'Hello World!';

        // Encode the String
        var encodedString = btoa(string);
        var encoded = btoa(JSON.stringify(this.user))
        console.log(encodedString); // Outputs: "SGVsbG8gV29ybGQh"
        console.log(encoded); 
        // Decode the String
        var decodedString = atob(encodedString);
        var actual = JSON.parse(atob( encoded))
        console.log(decodedString); // Outputs: "Hello World!"
        console.log(actual); 
      }
     
  },
}).$mount('#app')