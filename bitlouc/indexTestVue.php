<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Vuetify</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">
    <!--link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet" type="text/css"></link>
    <link href="styles.css" rel="stylesheet" type="text/css"-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    
    <?php include("src/components/teste.php");?>
    <div class="page">
      <div class="container">
      <button id="show-modal" v-on:click="showModal = true" class="btn btn-primary">Show Modal</button>
      </div>
      <modal-component v-if="showModal" v-on:close="onClose" :acivated="modalVisible"></modal-component>
    </div>
    
    <script src="lib/vue.js"></script>
    <script src="lib/vuex.js"></script>
    <script src="lib/vue-router.js"></script>
    <script src="lib/vue-resource.js"></script>
    <script>
      const modalComponent = Vue.component('modal-component', {
        name: 'modalComponent',
        template: '#modal-component',
        data() {
          return {
            activeInComponent: false,
            message: '<i>Modal Content!</i>',
          };
        },
        props: {
          title: { type: String, default: '' },
          message: { type: String, default: 'Confirm' }
        },
        methods: {
          beforeLeave: function() {
            this.$emit('unsupportedBrowser')
          }
        },
      });

      const page = new Vue({
        name: 'page',
        el: '.page',
        components: {
          'modal-component': modalComponent,
        },
        data() {
          return {
            unsupportedBrowser: false,
            showModal: false
          };
        },
        mounted: function() {
          this.showModal = true;
        },
        methods: {
          onClose: function(){
            this.showModal = false;
            this.unsupportedBrowser = true;
            console.log("Unsupported!");
          }
        },
      });
    </script>

  </body>
</html>
