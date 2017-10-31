/**
 * Vue.js with PHP Api
 * @author Gökhan Kaya <0x90kh4n@gmail.com>
 */

// Tüm post dataları json olarak gönderiliyor
// Form data olarak göndermek için true yapılır
Vue.http.options.emulateJSON = true;

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

/*var app = new Vue({
  el: '#app',
  data: {
    name: '',
    surname: '',
    users: [],
    searchKey: ''
  },
  created: function() {
    this.fetchData(); // Başlangıçta kayıtları al
  },
  methods: {
    // Bu metot http get ile api üzerinden kayıtları users dizisine push eder
    fetchData: function() {
      this.$http.get('./api/apiUser.php')
        .then(function(response) {
          /*if (response.body.status == 'ok') {
            let users = this.users;
            //console.log(response.body.users);
            response.body.dados.map(function(value, key) {
              users.push({id: value.id, name: value.name, surname: value.surname });
            });
          }*//*
          if(response.data.error){
            this.errorMessage = response.data.message;
          } else{
              this.users = response.data.users;
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
});*/
var List = Vue.extend({
  template: '#product-list',
  data: function () {
    return {
      products: products,
      searchKey: '',
      searchQuery: '',
      gridColumns: ['user', 'email', 'Actions'],
      gridData: [
        { name: 'Chuck Norris', power: Infinity },
        { name: 'Bruce Lee', power: 9000 },
        { name: 'Jackie Chan', power: 7000 },
        { name: 'Jet Li', power: 8000 }
      ],
      users: []
    };
  },
  computed: {
    filteredProducts() {
      return this.products.filter( (product) => {
        return product.name.indexOf(this.searchKey) > -1
        //return !product.name.indexOf(this.searchKey)
      })
    }
  },
  created: function() {
    this.fetchData(); // Başlangıçta kayıtları al
  },
  methods: {
    // Bu metot http get ile api üzerinden kayıtları users dizisine push eder
    fetchData: function() {
      this.$http.get('./api/apiUser.php')
        .then(function(response) {
          /*if (response.body.status == 'ok') {
            let users = this.users;
            //console.log(response.body.users);
            response.body.dados.map(function(value, key) {
              users.push({id: value.id, name: value.name, surname: value.surname });
            });
          }*/
          if(response.data.error){
            this.errorMessage = response.data.message;
          } else{
              this.users = response.data.users;
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

var Product = Vue.extend({
  template: '#product',
  data: function () {
    return {product: findProduct(this.$route.params.product_id)};
  }
});

var ProductEdit = Vue.extend({
  template: '#product-edit',
  data: function () {
    return {product: findProduct(this.$route.params.product_id)};
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

var ProductDelete = Vue.extend({
  template: '#product-delete',
  data: function () {
    return {product: findProduct(this.$route.params.product_id)};
  },
  methods: {
    deleteProduct: function () {
      products.splice(findProductKey(this.$route.params.product_id), 1);
      router.push('/');
    }
  }
});

var AddProduct = Vue.extend({
  template: '#add-product',
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

Vue.component('demo-grid', {
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
});


var User = Vue.extend({
  template: '#product',
  data: function () {
    return {product: findProduct(this.$route.params.product_id)};
  }
});

var UserEdit = Vue.extend({
  template: '#product-edit',
  data: function () {
    return {product: findProduct(this.$route.params.product_id)};
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

var AddUser = Vue.extend({
  template: '#add-product',
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
var UserDelete = Vue.extend({
  template: '#user-delete',
  data: function () {
    return {product: findProduct(this.$route.params.product_id)};
  },
  methods: {
    deleteProduct: function () {
      products.splice(findProductKey(this.$route.params.product_id), 1);
      router.push('/');
    }
  }
});

var router = new VueRouter({
  routes: [
    {path: '/', component: List},
    {path: '/product/:product_id', component: Product, name: 'product'},
    {path: '/add-product', component: AddProduct},
    {path: '/product/:product_id/edit', component: ProductEdit, name: 'product-edit'},
    {path: '/product/:product_id/delete', component: ProductDelete, name: 'product-delete'},
    {path: '/product/:user_id', component: User, name: 'user'},
    {path: '/add-user', component: AddUser},
    {path: '/user/:user_id/edit', component: UserEdit, name: 'user-edit'},
    {path: '/user/:user_id/delete', component: UserDelete, name: 'user-delete'}
  ]
});

var App = {}

new Vue({
  router
}).$mount('#app')
