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
  localidades: [],
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
  LOJAS_LOCALIADES(state, localidades){
    localidades.id = true
  },
  EDIT_TODO(state, todo){
    state.todo.text = todo.body
    console.log(state.todo.text)
  },
  SET_USERS(state, users) {
    state.users = users
  },
  SET_LOJAS(state, lojas) {
    state.lojas = lojas
  },
  SET_LOCALIDADES(state, localidades) {
    state.localidades = localidades
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
  setLojas({ commit }, lojas) {
    commit("SET_LOJAS", lojas)
  },
  setLocalidades({ commit }, localidades) {
    commit("SET_LOCALIDADES", localidades)
  },
}

const getters = {
  getUsers: state => state.users,
  getLojas: state => state.lojas,
  getTodoById: state => (id) => {
    return state.lojas.filter(loja => loja.id === id)
  }
}


const store = new Vuex.Store({
  state,
  mutations,
  actions,
  getters
})

var products = [
  {id: 1, name: 'Angular', description: 'Superheroic JavaScript MVW Framework.', price: 100},
  {id: 2, name: 'Ember', description: 'A framework for creating ambitious web applications.', price: 100},
  {id: 3, name: 'React', description: 'A JavaScript Library for building user interfaces.', price: 100}
];

function findProduct (productId) {
  return products[findProductKey(productId)];
};

function findProductKey (productId) {
  for (var key = 0; key < products.length; key++) {
    if (products[key].id == productId) {
      return key;
    }
  }
};


var List = Vue.extend({
  template: '#list',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      gridColumns: ['displayName', 'name']
    };
  },
  created: function() {
    this.fetchData();
    this.fetchData2(); // Başlangıçta kayıtları al
  },
  computed: {
    dados() {
      return store.state.lojas;
    },
    dados2() {
      return store.state.localidades;
    },
  },
  methods: {
    // Bu metot http get ile api üzerinden kayıtları users dizisine push eder
    fetchData: function() {
      this.$http.get('./config/api/apiLojaFull.php?action=read')
        .then(function(response) {
          if(response.data.error){
            this.errorMessage = response.data.message;
          } else{
              //console.log(response.data.dados);
              this.$store.dispatch('setLojas', response.data.dados);
              //this.$router.push('/')
              //this.users = response.data.users;
          }
        })
        .catch(function(error) {
          console.log(error);
        });

    },
    fetchData2: function() {
      this.$http.get('./config/api/apiLocalidades.php?action=read')
        .then(function(response) {
          if(response.data.error){
            this.errorMessage = response.data.message;
          } else{
              this.$store.dispatch('setLocalidades', response.data.dados);
              //this.$router.push('/')
              //console.log(response.data.dados);
          }
        })
        .catch(function(error) {
          console.log(error);
        });

    },
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

Vue.component('tabela-grid', {
  template: '#grid-tabela',
  props: {
    data: Array,
    columns: Array,
    filterKey: String
  },
  data: function () {
    var sortOrders = {}
    this.columns.forEach(function (key) {
      sortOrders[key] = 1
    })
    return {
      sortKey: '',
      sortOrders: sortOrders
    }
  },
  computed: {
    filteredData: function () {
      var sortKey = this.sortKey
      var filterKey = this.filterKey && this.filterKey.toLowerCase()
      var order = this.sortOrders[sortKey] || 1
      var data = this.data
      if (filterKey) {
        data = data.filter(function (row) {
          return Object.keys(row).some(function (key) {
            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
          })
        })
      }
      if (sortKey) {
        data = data.slice().sort(function (a, b) {
          a = a[sortKey]
          b = b[sortKey]
          return (a === b ? 0 : a > b ? 1 : -1) * order
        })
      }
      return data
    }
  },
  filters: {
    capitalize: function (str) {
      return str.charAt(0).toUpperCase() + str.slice(1)
    }
  },
  methods: {
    sortBy: function (key) {
      this.sortKey = key
      this.sortOrders[key] = this.sortOrders[key] * -1
    }
  }
});

/*Vue.component('demo-grid', {
  template: '#grid-template',
  props: {
    data: Array,
    columns: Array,
    filterKey: String
  },
  data: function () {
    var sortOrders = {}
    this.columns.forEach(function (key) {
      sortOrders[key] = 1
    })
    return {
      sortKey: '',
      sortOrders: sortOrders
    }
  },
  computed: {
    filteredData: function () {
      var sortKey = this.sortKey
      var filterKey = this.filterKey && this.filterKey.toLowerCase()
      var order = this.sortOrders[sortKey] || 1
      var data = this.data
      if (filterKey) {
        data = data.filter(function (row) {
          return Object.keys(row).some(function (key) {
            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
          })
        })
      }
      if (sortKey) {
        data = data.slice().sort(function (a, b) {
          a = a[sortKey]
          b = b[sortKey]
          return (a === b ? 0 : a > b ? 1 : -1) * order
        })
      }
      return data
    }
  },
  filters: {
    capitalize: function (str) {
      return str.charAt(0).toUpperCase() + str.slice(1)
    }
  },
  methods: {
    sortBy: function (key) {
      this.sortKey = key
      this.sortOrders[key] = this.sortOrders[key] * -1
    }
  }
});*/

var Loja = Vue.extend({
  template: '#loja',
  data: function () {
    return {loja: findProduct(this.$route.params._id)};
  },
  computed: {
    dados(id) {
      return store.getters.getTodoById(this.$route.params._id);
    },
    filteredItems() {
      return store.state.lojas.filter(item => {
          return this.loja.includes(item.id);
      });
    } // filteredItems
  }, // computed
  methods: {
    findProductKey: function (lojaId) {
      for (var key = 0; key < products.length; key++) {
        if (products[key].id == productId) {
          return key;
        }
      }
    },
    updateProduct: function () {
      //Obsolete, product is available directly from data...
      let product = this.product; //var product = this.$get('product');
      products[findProductKey(product.id)] = {
        id: product.id,
        name: product.name,
        description: product.description,
        price: product.price
      };
      router.push('/');
    }
  }
});

var Edit = Vue.extend({
  template: '#edit',
  data: function () {
    return {product: findProduct(this.$route.params._id)};
  },
  methods: {
    updateProduct: function () {
      //Obsolete, product is available directly from data...
      let product = this.product; //var product = this.$get('product');
      products[findProductKey(product.id)] = {
        id: product.id,
        name: product.name,
        description: product.description,
        price: product.price
      };
      router.push('/');
    }
  }
});

var Add = Vue.extend({
  template: '#add',
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
var Delete = Vue.extend({
  template: '#delete',
  data: function () {
    return {item: findProduct(this.$route.params._id)};
  },
  methods: {
    deleteProduct: function () {
      products.splice(findProductKey(this.$route.params._id), 1);
      router.push('/');
    }
  }
});

var router = new VueRouter({
  routes: [
    {path: '/', component: List},
    {path: '/loja/:_id', component: Loja, name: 'loja'},
    {path: '/add', component: Add},
    {path: '/loja/:_id/edit', component: Edit, name: 'edit'},
    {path: '/loja/:_id/delete', component: Delete, name: 'delete'}
  ]
});

var App = {}

new Vue({
  router,
  store
}).$mount('#app')
