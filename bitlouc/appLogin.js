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

var Login = Vue.extend({
  template: '#login',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      gridColumns: ['nome', 'email'],
      users: []
    };
  },
  created: function() {
    //this.fetchData(); // Başlangıçta kayıtları al
  },
  computed: {
    message() {
      return store.state.users;
    }
  },
  methods: {
    // Bu metot http get ile api üzerinden kayıtları users dizisine push eder
    /*fetchData: function() {
      this.$http.get('./api/apiLoja.php?action=read')
        .then(function(response) {
          /*if (response.body.status == 'ok') {
            let users = this.users;
            //console.log(response.body.users);
            response.body.dados.map(function(value, key) {
              users.push({id: value.id, name: value.name, surname: value.surname });
            });
          }*-/
          if(response.data.error){
            this.errorMessage = response.data.message;
          } else{
              this.$store.dispatch('setUsers', response.data.users);
              //this.$router.push('/')
              //this.users = response.data.users;
          }
        })
        .catch(function(error) {
          console.log(error);
        });

    },*/
    // Bu metot http post ile formdan alınan verileri apiye iletir
    // Apiden dönen cevap users dizisine push edilir
    onSubmit: function() {
      if (!this.name || !this.surname) {
        alert('Lütfen tüm alanları doldurunuz!');
        return false;
      }
      var postData = {name: this.name, surname: this.surname};
      this.$http.post('../api/api.php', postData)
        .then(function(response) {
          if (response.body.status == 'ok') {
            this.users.push(response.body.users);
          }
          this.name = '';
          this.surname = '';
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
});

var Register = Vue.extend({
  template: '#register',
  data: function () {
    return {product: {name: '', description: '', price: ''}
    }
  },
  methods: {
    createProduct: function() {
      //Obsolete, product is available directly from data...
      let product = this.product; //var product = this.$get('product');
      products.push({
        id: Math.random().toString().split('.')[1],
        name: product.name,
        description: product.description,
        price: product.price
      });
      router.push('/');
    }
  }
});

var router = new VueRouter({
  routes: [
    {path: '/', component: Login},
    {path: '/register', component: Register}
  ]
});

var App = {}

new Vue({
  router,
  store
}).$mount('#app')
