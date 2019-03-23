<template id="creator">
  <div>
    <v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="dialog = true" color="pink" fab small dark>
      <v-icon>add</v-icon>
    </v-btn>
    <v-layout row justify-center>
      <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
        <v-card>
          <v-toolbar dark color="primary">
            <v-btn icon dark @click="dialog = false">
              <v-icon>close</v-icon>
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
            <v-stepper v-model="progresso" vertical light>
              <v-stepper-step editable :complete="Number(progresso) > 1" step="1">
                <div>{{ loja.nick }}</div>
                <small>Loja</small>
              </v-stepper-step>
              <v-stepper-content step="1">

                <v-flex>
                  <v-autocomplete
                    v-model="loja"
                    :items="lojas"
                    color="blue-grey lighten-2"
                    label="Loja"                              
                    item-text="name"              
                    data-vv-name="loja"
                    :filter="lojaFilter"
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
                        {{ data.item.nick }}
                      </v-chip>
                    </template>
                    <template slot="item" slot-scope="data" >
                      <template v-if="typeof data.item !== 'object'">
                        <v-list-tile-content v-text="data.item"></v-list-tile-content>
                      </template>
                      <template v-else>
                        <v-list-tile-content>
                          <v-list-tile-title v-html="data.item.nick"></v-list-tile-title>
                          <v-list-tile-sub-title v-html="data.item.name"></v-list-tile-sub-title>
                        </v-list-tile-content>
                      </template>
                    </template>
                  </v-autocomplete>
                </v-flex>

              </v-stepper-content>
              <v-stepper-step editable :complete="Number(progresso) > 2" step="2">
                <div>{{ local.name }}</div>
                <small>Local</small>
              </v-stepper-step>
              <v-stepper-content step="2">
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex>
                  <v-autocomplete
                    v-model="local"
                    :items="locais"
                    color="blue-grey lighten-2"
                    label="Local"                              
                    item-text="name"              
                    data-vv-name="local"
                    :filter="localFilter"
                    return-object
                    v-validate="'required'"
                    required
                    >
                    <template slot="selection" slot-scope="data">
                      <v-chip :selected="data.selected"
                        close
                        class="chip--select-multi"
                        @input="local = ''"
                      >
                        {{ data.item.name }}
                      </v-chip>
                    </template>
                    <template slot="item" slot-scope="data" >
                      <template v-if="typeof data.item !== 'object'">
                        <v-list-tile-content v-text="data.item"></v-list-tile-content>
                      </template>
                      <template v-else>
                        <v-list-tile-content>
                          <v-list-tile-title v-html="data.item.nick"></v-list-tile-title>
                          <v-list-tile-sub-title v-html="data.item.name"></v-list-tile-sub-title>
                        </v-list-tile-content>
                      </template>
                    </template>
                  </v-autocomplete>
                </v-flex>
                  </v-layout>
                </v-container>
              </v-stepper-content>
              <v-stepper-step editable :complete="Number(progresso) > 3" step="3">
                <small>Demanda</small>
              </v-stepper-step>
              <v-stepper-content step="3">
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12 sm6 d-flex>
                      <v-select
                        v-model="cil_tipo"
                        :items="cilTipos"
                        box
                        label="Tipo Cilindros"
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
                      ></v-text-field>
                    </v-flex>
                    <template>
                        <v-treeview :items="demanda"></v-treeview>
                      </template>

                  </v-layout>
                </v-container>
              </v-stepper-content>
            </v-stepper>
          </v-card-text>
        </v-card>
      </v-dialog>
    </v-layout>
  </div>
</template>
  
</template>
<script>
Vue.component('creator', {
  name: 'creator',
  template: '#creator',
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
      cil_tipo: '',
      cil_qtd: '',
      demanda: [],
      cil_1000: '',
      locais : [],
      progresso: '1',
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
    lojas() {
      return store.state.lojas;
    },
  },
  created: function() {
    this.$store.dispatch('fetchCilTipos').then(() => {
      console.log("carregando tipos de cilindros")
    });
    this.initialize();
  },
  methods: {
    initialize() {
      //this.loja = store.getters.getLojaId(this.$route.params._loja);
      //this.local = store.getters.getLocalId(this.$route.params._local);
      //this.dono = store.getters.getLojaId(this.user.loja);
      //this.donoLocal = store.getters.getLocalLojaSingle(this.user.loja);
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
  },
});
</script>