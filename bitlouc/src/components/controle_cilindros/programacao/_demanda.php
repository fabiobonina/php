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
                        v-model="cil_tipo"
                        :items="cilTipos"
                        item-text="capacidade"
                        item-value="id"
                        return-object
                        box
                        label="Tipo Cilindros"
                        v-on:keyup.enter="addTodo"
                      ></v-select>
                    </v-flex>
                    <v-flex xs12 sm6 d-flex>
                      <v-text-field 
                        type="number"
                        v-model="cil_qtd"
                        label="Qtd .Cilindros"
                        :error-messages="errors.collect('cil_p')"
                        v-validate="''"
                        data-vv-name="cil_p"
                        item-text="cil_p"
                        v-on:keyup.enter="addTodo"
                      ></v-text-field>
                      <template>

                      <v-btn @click="addDemanda" color="blue" fab small dark>
                        <v-icon>add</v-icon>
                      </v-btn>
                    </template>
                    </v-flex>
                    
                    <template>
                        <v-treeview :items="todoStorage" :item-text="todoStorage.title"></v-treeview>
                      </template>

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
    data: [],
    //filterKey: String,
    //dialogAdd: Boolean,
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      dialog: false,
      loja:{},
      local : {},
      cil_tipo: '',
      cil_qtd: '',
      demanda: [],
      cil_1000: '',
      locais : [],
      progresso: '1',
      isEditing: false,
      todo: {
        title: null,
        edit: false
      },
      todos:todoStorage.fetch(),
      testTodo: null
    }
  },
  watch: {
    'progresso': function (newQuestion, oldQuestion) {
      
      // Items have already been loaded
      if (this.loja.length > 0 && this.progresso == '2') return

      // Items have already been requested
      if (this.isLoading) return
      this.updateLocal()
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
    lojas() {
      return store.state.lojas;
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
      this.updateLocal();
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
        //const index = this.loja.indexOf(item)
        //if (index >= 0) this.loja.splice(index, 1)
        this.loja = null
    },
    lojaFilter (item, queryText, itemText) {
        const textOne = item.nick.toLowerCase()
        const textTwo = item.name.toLowerCase()
        const searchText = queryText.toLowerCase()

        return textOne.indexOf(searchText) > -1 ||
          textTwo.indexOf(searchText) > -1
    },
    localFilter (item, queryText, itemText) {
        const textOne = item.nick.toLowerCase()
        const textTwo = item.name.toLowerCase()
        const searchText = queryText.toLowerCase()

        return textOne.indexOf(searchText) > -1 ||
          textTwo.indexOf(searchText) > -1
    },
    checkForm:function() {
      this.errorMessage = [];
      if( !this.loja ) this.errorMessage.push("Loja necessário.");
      if( !this.local ) this.errorMessage.push("Local necessário.");
      if( !this.cil_p && !this.cil_g ) this.errorMessage.push("Demanda necessário.");
      if(!this.errorMessage.length) return true;
      //e.preventDefault();
    },
    addDemanda(){
      var vm = this 
      vm.data.push({ cil_tipo: vm.cil_tipo, title: vm.cil_qtd, edit: false })
      vm.cil_tipo = ''
      vm.cil_qtd = ''
    },
    addTodo(){
      var vm = this 
      vm.todos.push({id: todoStorage.uid++, title:vm.todo.title,edit: false })
      vm.todo = []
    },
    removeTodo(index){
      this.todos.splice(index, 1)
    }
  },
});

</script>
