/**
 * Vue.js with PHP Api
 * @author Gökhan Kaya <0x90kh4n@gmail.com>
 */

// Tüm post dataları json olarak gönderiliyor
// Form data olarak göndermek için true yapılır
Vue.http.options.emulateJSON = true;

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
      gridColumns: ['name', 'power'],
      gridData: []
    };
  },
  computed: {
    filteredProducts() {
      /*return this.products.filter( (product) => {
        return product.name.indexOf(this.searchKey) > -1
        //return !product.name.indexOf(this.searchKey)
      })*/
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
var router = new VueRouter({
  routes: [
    {path: '/', component: List},
    {path: '/product/:product_id', component: Product, name: 'product'},
    {path: '/add-product', component: AddProduct},
    {path: '/product/:product_id/edit', component: ProductEdit, name: 'product-edit'},
    {path: '/product/:product_id/delete', component: ProductDelete, name: 'product-delete'}
  ]
});

var App = {}

new Vue({
  router
}).$mount('#app')
