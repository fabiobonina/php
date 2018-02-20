/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário
Vue.http.options.emulateJSON = true;
const state = {
  todos:[{body: 'Learn vuex', completed: false}],
  todo: {},
  lojas: [],
  users:[]
}

const mutations = {
  ADD_TODO(state){
    state.todos.push({
      body: state.todo.text,
      completed: false
      })
  },
  ADD_TEXT(state, text){
    state.todo.text = text  
  },
  REMOVE_TODO(state, todo){ state.todos.splice(state.todos.indexOf(todo), 1)
  },
  COMPLETE(state, todo){
    todo.completed = true
  },
  EDIT_TODO(state, todo){
    state.todo.text = todo.body
    console.log(state.todo.text)
  },
  SET_USERS(state, users) {
    state.users = users
  },
}

const actions = {
  addTodo({commit}){
    commit('ADD_TODO')
  },
  addText({commit}, e){
    commit('ADD_TEXT', e.target.value)
  },
  remove({commit}, todo){
    commit('REMOVE_TODO', todo)
  },
  complete({commit}, todo){
    commit('COMPLETE', todo)
  },
  edit({commit}, todo){
    commit('EDIT_TODO', todo)
  },
  setUsers({ commit }, users) {
    commit("SET_USERS", users)
  },
}

const getters = {
  getUsers: state => state.users
}


const store = new Vuex.Store({
  state,
  mutations,
  actions,
  getters
})


Vue.component('home', {
  name: 'home',
  template: '#home',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      novo: false,
      users: [],
      isLoading: false,
    };
  },
  created: function() {
    //this.fetchData(); // Başlangıçta kayıtları al
  },
  computed: {

  },
  methods: {
    
  }
});
Vue.component('login', {
  name: 'login',
  template: '#login',
  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      email:'',
      password:'',
    }
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
  },
  methods: {
    logar: function() {
      if(this.checkForm()){
        this.isLoading = true
        //const data = {'id': this.data.id, 'modelo': this.modelo
        //'cadastro': new Date().toJSON() }
        var postData = {
          email: this.email,
          password: this.password
        };
        //var formData = this.toFormData(postData);
        console.log(postData);
        this.$http.post('./config/api/apiUser.php?action=logar', postData)
          .then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              setTimeout(() => {
                this.$router.push('index.php');
                this.$emit('close');
              }, 2000);
            }
          })
          .catch(function(error) {
            console.log(error);
          });
      }
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.email) {
        this.errorMessage.push("Email necessário.");
      } else if(!this.validEmail(this.email)) {
        this.errorMessage.push("Email válido necessário.");
      }
      if(!this.password) this.errorMessage.push("Password necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    validEmail:function(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
  }
});

Vue.component('register', {
  name: 'register',
  template: '#register',
  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      name:'', email:'', emailR:'', user:'', password:'', passwordR:'',
    }
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
  },
  methods: {
    registrar: function() {
      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          name: this.name,
          user: this.user,
          email: this.email,
          password: this.password
        };
        //console.log(postData);
        this.$http.post('./config/api/apiUser.php?action=registrar', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage.push(response.data.message);
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            setTimeout(() => {
              this.$emit('close');
            }, 2000);
          }
        })
        .catch(function(error) {
          console.log(error);
        });
      }
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.name) this.errorMessage.push("Nome necessário.");
      if(!this.user) this.errorMessage.push("Usuario necessário.");
      if(!this.email) {
        this.errorMessage.push("Email necessário.");
      } else if(!this.validEmail(this.email)) {
        this.errorMessage.push("Email válido necessário.");
      } else if(this.email !== this.emailR) {
        this.errorMessage.push("Email não é igual a confirmação.");
      }
      if(!this.password) {
        this.errorMessage.push("Password necessário.");
      } else if(this.password !== this.passwordR) {
        this.errorMessage.push("Password não é igual a confirmação.");        
      }
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    validEmail:function(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
  }
});
var NaoEncontrado = Vue.extend({
  name: 'naoEncontrado',
  template: '#naoEncontrado',
  data: function () {
    return {item: '' };
  },
  methods: {
    deleteProduct: function () {
      //products.splice(findProductKey(this.$route.params._id), 1);
      //router.push('/');
    }
  }
});
var router = new VueRouter({
  routes: [
    {path: '/', component: home,  name: 'home'},
    {path: '*', component: NaoEncontrado}
  ]
});

var App = {}

new Vue({
  store,
  router
}).$mount('#app')
