<template id="demanda-add">
  <div>
    <v-layout row justify-center>
        <v-card>
          <v-card-text>
                <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
                <loader :dialog="isLoading"></loader>
                
                <v-container grid-list-md>
                <h2>Test Application</h2>


                <div>
                  <input type="text" v-model="todo.title" placeholder="input todo" v-on:keyup.enter="addTodo">

                  <ul>
                    {{testTodo}}
                    <li v-for="(todo, index) in todoStorage">
                      
                      <input v-if="todo.edit" type="text" v-model="todo.title">
                      <span v-else> {{todo.id}}  {{todo.title}} </span>
                      <button @click="removeTodo(index)">&#10006;</button>
                      <button @click="todo.edit = !todo.edit">&#9998;</button>
                    </li>
                  </ul>
                </div>
                <small>Demanda</small>
                  <v-layout wrap>
                    <v-flex xs12 sm6 d-flex>
                      <v-select
                        v-model="item.cil_tipo" :items="cilTipos"
                        item-text="name" item-value="id"
                        box label="Tipo Cilindro"
                        v-on:keyup.enter="addDemanda()"
                        data-vv-name="name"
                        v-validate="'required'" required
                      ></v-select>
                    </v-flex>
                    <v-flex xs12 sm6 d-flex>
                      <v-text-field 
                        type="number"
                        v-model="item.cil_qtd"
                        label="Qtd. Cilindros"
                        :error-messages="errors.collect('cil_qtd')"
                        item-text="item.cil_qtd"
                        data-vv-name="name"
                        v-on:keyup.enter="addDemanda()"
                        
                      ></v-text-field>
                      <template>
                        <v-btn @click="addDemanda()" color="blue" fab small dark>
                          <v-icon>add</v-icon>
                        </v-btn>
                      </template>
                    </v-flex>
                    
                    <template>
                        <!--v-treeview :items="demanda" :item-text="cil_qtd"></v-treeview-->
                      </template>
                    <ul>
                      {{item}}
                      <li v-for="(todo, index) in data">
                        
                        <input v-if="todo.edit" type="text" v-model="todo.cil_tipo">
                        <span v-else> {{todo}}  {{todo.cil_tipo}} </span>
                        <button @click="removeTodo(index)">&#10006;</button>
                        <button @click="todo.edit = !todo.edit">&#9998;</button>
                      </li>
                    </ul>

                  </v-layout>
                </v-container>
          </v-card-text>
        </v-card>
    </v-layout>
  </div>
</template>

<script>

var STORAGE_KEY = 'todos-vuejs-2.0'
var todoStorage = {
  fetch: function () {
    var todos = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]')
    todos.forEach(function (todo, index) {
      todo.id = index
    })
    todoStorage.uid = todos.length
    return todos
  },
  save: function (todos) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(todos))
  }
}

Vue.component('demanda-add', {
  name: 'demanda-add',
  template: '#demanda-add',
  $_veeValidate: {
    validator: 'new'
  },
  props: {
    data: Array,
    //filterKey: String,
    //dialogAdd: Boolean,
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      dialog: false,
      demanda: [],
      progresso: '1',
      item: {
        cil_tipo: null,
        cil_qtd: null,
        edit: false
      },
      isEditing: false,
      todo: {
        title: null,
        edit: false
      },
      todos: '',
      testTodo: null
    }
  },
  watch: {
    'progresso': function (newQuestion, oldQuestion) {
      
      // Items have already been loaded
      if (this.loja.length > 0 && this.progresso == '2') return

      // Items have already been requested
      if (this.isLoading) return
      //this.updateLocal()
      this.isLoading = true

    },
    'loja': function (newQuestion, oldQuestion) {
      this.updateLocal()
    },
    'dialogEdt': function (newQuestion, oldQuestion) {
      this.dialog = true
    },
    dialog (val) {
      val || this.close()
    },
  },
  mounted () {
    this.$validator.localize('pt_BR', this.dictionary)
  },
  computed: {
    user()  {
      return store.state.user;
    },
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    cilTipos() {
      return store.state.cil_tipos;
    },
    todoStorage(){
      var vm = this
      todoStorage.save(vm.todos)
      return vm.todos
    }
  },
  created: function() {
    this.$store.dispatch('fetchCilTipos').then(() => {
      console.log("carregando tipos de cilindros")
    });
    this.initialize();
  },
  methods: {
    initialize() {
      //this.updateLocal();
    },
    updateLocal() {
      this.$store.dispatch('fetchLocalLoja', this.loja.id ).then(() => {
        //console.log("Buscando dados do local!");
        this.locais = store.state.locais;
        this.isLoading = false;
      });
    },
    saveItem: function(){
      this.errorMessage = []
      this.$validator.validateAll().then((result) => {
        if (result && this.checkForm()) {
          this.isLoading = true
          var postData = {
            produto: this.loja.id,
            tag: this.local.tag,
            name: this.cil_p,
            modelo: this.cil_g,
          };
          //console.log(postData);
          this.$http.post('./config/api/apiCilindro.php?action=insert', postData).then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.$store.dispatch('fetchLocais', this.$route.params._loja).then(() => {
                console.log("Atulizando dados das localidades!")
              });
              this.isLoading = false;
              setTimeout(() => {
                this.close();
              }, 2000);
            }
          })
          .catch(function(error) {
            console.log(error);
          });
        }
      });
    },
    close () {
      this.dialog = false;
      this.$emit('close');
    },
    atualizar: function(){
      this.$emit('atualizar');
    },
    remove (item) {
        const index = this.data.indexOf(item)
        if (index >= 0) this.data.splice(index, 1)
    },
    checkForm:function() {
      this.errorMessage = [];
      if( !this.item.cil_tipo ) this.errorMessage.push("Tipo de cilindro necessário.");
      if( !this.item.cil_qtd ) this.errorMessage.push("Qtd. de cilindro necessário.");
      if(!this.errorMessage.length) return true;
      //e.preventDefault();
    },
    addDemanda(){
      var vm = this;
      if ( this.checkForm() ) {
          this.isLoading = true          
          var postData = {
            cil_tipo: this.item.cil_tipo.id,
            //cil_qtd: this.tem.cil_qtd,
            edit: false
          };
          //console.log(postData);
          //this.item.push( this.item );
          this.data.push( this.item );
          this.item = {};
          this.isLoading = false
          console.log(this.data);
        }
      
    },
    addTodo(){
      var vm = this 
      vm.todos.push({id: todoStorage.uid++, title:vm.todo.title, edit: false })
      vm.todo = []
    },
    removeTodo(index){
      this.todos.splice(index, 1)
    }
  },
});

</script>
