<template id="amarar-cilindro">
  <div>
    <v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="dialog = true" color="pink" fab small dark>
      <v-icon>mdi-plus</v-icon>
    </v-btn>
    <v-layout row justify-center>
      <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
        <v-card>
          <v-toolbar dark color="primary">
            <v-btn icon dark @click="dialog = false">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Criar Programação</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
              <v-btn dark flat @click.native="saveItem()">Salvar</v-btn>
            </v-toolbar-items>
          </v-toolbar>
          <v-card-text>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>

                <v-container grid-list-md>
                  

                  <v-layout row justify-center>
                  <small>Demanda</small>
      <v-layout wrap>
        <v-flex>
          <v-select
            v-model="cil_tipo" :items="data"
            item-text="name" item-value="id"
            label="Tipo Cilindro" box
            v-on:keyup.enter="addDemanda()"
            data-vv-name="name" v-validate="'required'" required
            return-object
          ></v-select>
        </v-flex>
        <v-flex>
          <v-autocomplete
            v-model="loja"
            :items="cilindros"
            color="blue-grey lighten-2"
            label="Loja"                              
            item-text="name"              
            data-vv-name="loja"
            :filter="cilindroFilter"
            return-object
            v-validate="'required'"
            required
            >
            <template slot="selection" slot-scope="data">
              <v-chip :selected="data.selected"
                close
                class="chip--select-multi"
                @input="remove(data.item)"
              >
                {{ data.item.numero }}
              </v-chip>
            </template>
            <template slot="item" slot-scope="data" >
              <template v-if="typeof data.item !== 'object'">
                <v-list-tile-content v-text="data.item"></v-list-tile-content>
              </template>
              <template v-else>
                <v-list-tile-content>
                  <v-list-tile-title>{{data.item.numero }} - {{ data.item.cod_barras }}</v-list-tile-title>
                  <v-list-tile-sub-title v-html="data.item.fabricante"></v-list-tile-sub-title>
                </v-list-tile-content>
              </template>
            </template>
          </v-autocomplete>
        </v-flex>
        <v-flex>
          <v-btn @click="addDemanda()" color="blue" fab small dark>
            <v-icon>add</v-icon>
          </v-btn>
        </v-flex>
      </v-layout>
                  
      <template>
        <v-list>
          <v-list-tile  v-for="(todo, index) in data" :key="item.index" @click="">
            <template>
              <v-flex v-if="todo.edit">
                <v-select
                  v-model="todo.cil_tipo" :items="cilTipos"
                  item-text="name" item-value="id"
                  label="Tipo Cilindro" box
                  v-on:keyup.enter="addDemanda()"
                  data-vv-name="name"
                  v-validate="'required'" required
                ></v-select>
              </v-flex>
              <v-list-tile-content v-else>
                <v-list-tile-title v-text="todo.cil_tipo.name"></v-list-tile-title>
              </v-list-tile-content>
              <v-flex v-if="todo.edit">
                <v-text-field 
                  type="number"
                  v-model="todo.qtd"
                  label="Qtd. Cilindros" box
                  :error-messages="errors.collect('qtd')"
                  item-text="todo.qtd"
                  data-vv-name="name"
                  v-on:keyup.enter="addDemanda()"
                ></v-text-field>
              </v-flex>
              <v-list-tile-content v-else>
                <v-list-tile-title  v-text="todo.qtd"></v-list-tile-title>
              </v-list-tile-content>

              <v-list-tile-action>
                <v-btn @click="removeDemanda(index)" color="red" fab small dark>
                  <v-icon>&#10006;</v-icon>
                </v-btn>
              </v-list-tile-action>
              <v-list-tile-action>
                <v-btn @click="todo.edit = !todo.edit" color="blue" fab small dark>
                  <v-icon>&#9998;</v-icon>
                </v-btn>
              </v-list-tile-action>
              
            </template>
          </v-list-tile>
        </v-list>
      </template>
                    <v-flex>
                    <demanda-cil :data="demanda" v-on:close="close()"></demanda-cil>
                    </v-flex>           
                    
                  </v-layout>
                </v-container>
          </v-card-text>
        </v-card>
      </v-dialog>
    </v-layout>
  </div>
</template>

<?php require_once 'src/components/controle_cilindros/programacao/demanda/_demandaCil.php';?>

<script>
Vue.component('amarar-cilindro', {
  name: 'amarar-cilindro',
  template: '#amarar-cilindro',
  $_veeValidate: {
    validator: 'new'
  },
  props: {
    data: {},
    filterKey: String,
    dialogAdd: Boolean,
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      dialog: false,
      loja:{},
      local : {},
      dataProg: null,
      demanda: [],
      locais : [],
      progresso: '1',
      isEditing: false,
      item: {},
      cil_tipo: null,
      qtd: null,
      dtProg: null,
    };
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
    cilindros(){
      return store.state.cilindros;
    },
  },
  created: function() {
    this.dataT();
    this.updateCilindros();
  },
  methods: {
    updateCilindros() {
      this.$store.dispatch("fetchCilindros").then(() => {
        this.locais = store.state.locais;
        this.isLoading = false;
      });
      this.$store.dispatch('findCilProgramacao', this.$route.params._programacao ).then(() => {
      console.log("Buscando dados Programacao")
      });
    },
    saveItem: function(){
      this.errorMessage = []
      this.$validator.validateAll().then((result) => {
        if (result && this.checkForm()) {
          this.isLoading = true
          var postData = {
            loja_id: this.loja.id,
            local_id: this.local.id,
            data: this.dataProg,
            status: '0',
            demanda: this.demanda,
            id: ''
          };
          console.log(postData);
          this.$http.post('./config/api/api.cilindroProg.php?action=publish', postData).then(function(response) {
            //console.log(response);
            if(!response.data.error){
                this.successMessage.push(response.data.message);
                this.isLoading = false;
                setTimeout(() => {
                  this.$router.push('/programacao/'+response.data.id)
                  this.$emit('close');
                }, 2000);
              } else{
                this.errorMessage.push(response.data.message);
                this.isLoading = false;
              }
          })
          .catch(function(error) {
            this.isLoading = false;
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
    cilindroFilter (item, queryText, itemText) {
        const textOne = item.numero.toLowerCase()
        const textTwo = item.cod_barras.toLowerCase()
        const textThree = item.loja_nick.toLowerCase()
        const searchText = queryText.toLowerCase()

        return textOne.indexOf(searchText) > -1 ||
          textTwo.indexOf(searchText) > -1 ||
          textThree.indexOf(searchText) > -1
    },
    localFilter (item, queryText, itemText) {
        const textOne = item.municipio.toLowerCase()
        const textTwo = item.name.toLowerCase()
        const searchText = queryText.toLowerCase()

        return textOne.indexOf(searchText) > -1 ||
          textTwo.indexOf(searchText) > -1
    },
    checkForm:function() {
      this.errorMessage = [];
      if( !this.loja ) this.errorMessage.push("Loja necessário.");
      if( !this.local ) this.errorMessage.push("Local necessário.");
      if( !this.demanda ) this.errorMessage.push("Demanda necessário.");
      if(!this.errorMessage.length) return true;
      //e.preventDefault();
    },
    dataT() {
      var datetime = new Date().toLocaleString();
      var res = datetime.split(" ");
      var date = res[0].split("/");
      var time = res[1].slice(0, -3);
      var dtTime = date[2] + "-" + date[1] + "-" + date[0];
      this.dataProg = dtTime;
    },
  },
});
</script>