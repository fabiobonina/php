<template id="demanda-add">
    <v-layout row justify-center>
        <v-card>
          <v-card-text>
                <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
                <loader :dialog="isLoading"></loader>
                
                <small>Demanda</small>
                  <v-layout wrap>
                    <v-flex>
                      <v-select
                        v-model="item.cil_tipo" :items="cilTipos"
                        item-text="name" item-value="id"
                        box label="Tipo Cilindro"
                        v-on:keyup.enter="addDemanda()"
                        data-vv-name="name"
                        v-validate="'required'" required
                      ></v-select>
                    </v-flex>
                    <v-flex>
                      <v-text-field 
                        type="number"
                        v-model="item.cil_qtd"
                        label="Qtd. Cilindros"
                        :error-messages="errors.collect('cil_qtd')"
                        item-text="item.cil_qtd"
                        data-vv-name="name"
                        v-on:keyup.enter="addDemanda()"
                        
                      ></v-text-field>
                      
                    </v-flex>
                    <v-flex>
                        <v-btn @click="addDemanda()" color="blue" fab small dark>
                          <v-icon>add</v-icon>
                        </v-btn>
                      </v-flex>
                    </v-layout>
                    
                    <template>
                        <!--v-treeview :items="demanda" :item-text="cil_qtd"></v-treeview-->
                      </template>
                      <template v-for="(todo, index) in data">
                        <v-layout v-if="todo.edit" >
                          <v-flex xs12 sm6 d-flex>
                            <v-select
                              v-model="todo.cil_tipo" :items="cilTipos"
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
                              v-model="todo.cil_qtd"
                              label="Qtd. Cilindros"
                              :error-messages="errors.collect('cil_qtd')"
                              item-text="todo.cil_qtd"
                              data-vv-name="name"
                              v-on:keyup.enter="addDemanda()"
                            ></v-text-field>
                        </v-layout>
                        

                        <div v-else>  {{todo.cil_tipo}} </div>
                        <button @click="removeTodo(index)">&#10006;</button>
                        <button @click="todo.edit = !todo.edit">&#9998;</button>
                        <v-btn @click="todo.edit = !todo.edit" color="blue" fab small dark>
                                <v-icon>&#9998;<</v-icon>
                              </v-btn>
                      </div>
                    </template>
                    <!--template>
                          <div v-if="data.length">
                            <v-data-table :headers="headers" :items="data">
                              <template v-slot:items="props">
                                <td>
                                  <v-edit-dialog
                                    :return-value.sync="props.item.cil_tipo"
                                    lazy
                                    @save="save"
                                    @cancel="cancel"
                                    @open="open"
                                    @close="close"
                                  > {{ props.item.cil_tipo }}
                                    <template v-slot:input>
                                      <v-text-field
                                        v-model="props.item.cil_tipo"
                                        label="Edit"
                                        single-line
                                        counter
                                      ></v-text-field>
                                    </template>
                                  </v-edit-dialog>
                                </td>
                                <td class="text-xs-right">
                                  <v-edit-dialog
                                    :return-value.sync="props.item.cil_qtd"
                                    large
                                    lazy
                                    persistent
                                    @save="save"
                                    @cancel="cancel"
                                    @open="open"
                                    @close="close"
                                  >
                                    <div>{{ props.item.cil_qtd }}</div>
                                    <template v-slot:input>
                                      <div class="mt-3 title">Update cil_qtd</div>
                                    </template>
                                    <template v-slot:input>
                                      <v-text-field
                                        v-model="props.item.cil_qtd"
                                        label="Edit"
                                        single-line
                                        counter
                                        autofocus
                                      ></v-text-field>
                                    </template>
                                  </v-edit-dialog>
                                </td>
                              </template>
                            </v-data-table>

                            <v-snackbar v-model="snack" :timeout="3000" :color="snackColor">
                              {{ snackText }}
                              <v-btn flat @click="snack = false">Close</v-btn>
                            </v-snackbar>
                          </div>
                        </template-->

                  
                </v-container>
          </v-card-text>
        </v-card>
    </v-layout>
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
      headers: [
          { text: 'Tipo Cinlindro', value: 'cil_tipo', align: 'left', sortable: false },
          { text: 'Qtd. Cilindro', value: 'cil_qtd', sortable: false }
      ],
      todo: {
        title: null,
        edit: false
      },
      todos: '',
      testTodo: null,
      snack: false,
        snackColor: '',
        snackText: '',
        max25chars: v => v.length <= 25 || 'Input too long!',
        pagination: {},
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
    },
    save () {
        this.snack = true
        this.snackColor = 'success'
        this.snackText = 'Data saved'
      },
      cancel () {
        this.snack = true
        this.snackColor = 'error'
        this.snackText = 'Canceled'
      },
      open () {
        this.snack = true
        this.snackColor = 'info'
        this.snackText = 'Dialog opened'
      },
      close () {
        console.log('Dialog closed')
      }
  },
});

</script>
