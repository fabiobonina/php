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
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      login: ['name', 'email'],
      regintror: ['name', 'email', 'emailR', 'user', 'password', 'passwordR'],
      users: [],
      isLoading: false
    };
  },
  created: function() {
    //this.fetchData(); // Başlangıçta kayıtları al
  },
  computed: {

  },
  methods: {
    logar: function(){
      this.errorMessage = []
      if(this.formValido()){
        this.isLoading = true
        //const data = {'id': this.data.id, 'geolocalizacao': this.geolocalizacao
        //'cadastro': new Date().toJSON() }
        var postData = {
          id: this.data.id,
          latitude: geoposicao[0],
          longitude: geoposicao[1]
        };        
        this.$http.post('./config/api/apiUser.php?action=login', postData)
          .then(function(response) {
            //console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              setTimeout(() => {
                this.$emit('atualizar');
              }, 2000);  
            }
          })
          .catch(function(error) {
            console.log(error);
          });
      }
    },
    
    // Bu metot http post ile formdan alınan verileri apiye iletir
    // Apiden dönen cevap users dizisine push edilir

    isEmpty () {
      if(this.nome.length == 0 || this.email.length == 0 || this.password.length == 0 || this.passwordR.length == 0){
          return true;
      }
      return false;
    },
    passwordValid () {
        if(this.password.length < 6 || this.passwordR.length < 6){
            return false;
        }
        if(this.password !== this.passwordR){
            return false;
        }
        return true;
    },
    isFormValid(){
        if(this.isEmpty()){
            this.errors.push('Por favor, preencha todos os campos')
            return false
        }
        if(!this.passwordValid()){
            this.errors.push('senha incorreta')
            return false
        }
        return true
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
      error:'',
      errorEmail:'',
      errorPassword:'',
      isLoading: false,
      name:'', email:'', emailR:'', user:'', password:'', passwordR:'',
    }
  },
  computed: {
    temErros () {
      return this.errorMessage.length > 0
    },
    temMessage () {
      if(this.errorMessage.length > 0){
        return true
      }
      if(this.successMessage.length > 0){
        return true
      }
      return false
    },
  },
  methods: {
    registrar: function() {
      this.error = ''
      this.errorPassword = ''
      this.errorEmail = ''
      if(this.formValido()){
        this.isLoading = true
        //const data = {'id': this.data.id, 'modelo': this.modelo
        //'cadastro': new Date().toJSON() }
        var postData = {
          name: this.name,
          user: this.user,
          email: this.email,
          password: this.password
        };
        //var formData = this.toFormData(postData);
        console.log(postData);
        this.$http.post('./config/api/apiUser.php?action=registrar', postData)
          .then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              setTimeout(() => {
                this.$emit('atualizar');
              }, 2000);  
            }
          })
          .catch(function(error) {
            console.log(error);
          });
          //this.$store.state.create(data)
      }
    },
    isEmpty () {
      if(this.name.length == 0 || this.user.length == 0 || this.email.length == 0 || this.emailR.length == 0 || this.password.length == 0 || this.passwordR.length == 0){
          return true;
      }
      return false;
    },
    passwordValid () {
        if(this.password.length < 6 || this.passwordR.length < 6){
            return false;
        }
        if(this.password !== this.passwordR){
            return false;
        }
        return true;
    },
    emailValid () {
      if(this.email !== this.emailR){
          return false;
      }
      return true;
    },
    formValido(){
        if(this.isEmpty()){
          this.errorMessage.push('Por favor, preencha todos os campos')
          return false
        }
        if(!this.passwordValid()){
          this.errorPassword = 'senha incorreta'
          return false
        }
        if(!this.emailValid()){
          this.errorEmail = 'email incorreta'
          return false
        }
        return true
    }
  }
});

var App = {}

new Vue({
  store
}).$mount('#app')
