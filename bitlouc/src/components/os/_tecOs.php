<template id="os-tec">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
      <v-toolbar dark color="primary">
          <v-btn icon dark @click="$emit('close')">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>{{ title }}</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn icon flat @click.native="saveItem()">
              <v-icon>mdi-content-save</v-icon>
            </v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-card-title>
          <span class="headline">{{ data.local_tipo }} - {{ data.local_name }}</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
                <div v-if="data.equipamento">
                  <p>{{ data.equipamento.name }} - {{ data.equipamento.modelo }} <i class="fa fa-qrcode"></i> {{ data.equipamento.numeracao }} <i class="fa fa-fw fa-barcode"></i>{{ data.equipamento.plaqueta }}</p>
                </div>
              <h2 class="subtitle">Tecnicos</h2>
              <div v-for="item in _os.tecnicos" :key="item.id">
                  <v-chip small close @input="tecDelete(item)">
                    <v-avatar small >
                      <img :src="item.avatar" alt="trevor">
                    </v-avatar>
                    {{item.user_nick}}
                  </v-chip>
              </div>
              <v-flex xs12>
                <template>
                  <v-card color="blue-grey darken-1" dark >
                    <v-form>
                      <v-container>
                        <v-layout wrap>
                          <v-flex xs12>
                            <v-autocomplete
                              v-model="tecnicos"
                              :items="_tecnicos"
                              box
                              chips
                              color="blue-grey lighten-2"
                              label="Tecnico(s)"                              
                              item-text="name"              
                              data-vv-name="tecnicos"
                              :filter="customFilter"
                              return-object
                              multiple
                            >
                              <template slot="selection" slot-scope="data">
                                <v-chip
                                  :selected="data.selected"
                                  close
                                  class="chip--select-multi"
                                  @input="remove(data.item)"
                                >
                                  <v-avatar>
                                    <img :src="data.item.avatar">
                                  </v-avatar>
                                  {{ data.item.user_nick }}
                                </v-chip>
                              </template>
                              <template slot="item" slot-scope="data" >
                                <template v-if="typeof data.item !== 'object'">
                                  <v-list-tile-content v-text="data.item"></v-list-tile-content>
                                </template>
                                <template v-else>
                                  <v-list-tile-avatar>
                                    <img :src="data.item.avatar">
                                  </v-list-tile-avatar>
                                  <v-list-tile-content>
                                    <v-list-tile-title v-html="data.item.user_nick"></v-list-tile-title>
                                    <v-list-tile-sub-title v-html="data.item.email"></v-list-tile-sub-title>
                                  </v-list-tile-content>
                                </template>
                              </template>
                            </v-autocomplete>
                          </v-flex>
                        </v-layout>
                      </v-container>
                    </v-form>
                    <v-divider></v-divider>
                    
                  </v-card>
                </template>
              </v-flex>
            </v-layout>
          </v-container>
          <small>*indica campo obrigatório</small>

        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
Vue.component('os-tec', {
  name: 'os-tec',
  template: '#os-tec',
  $_veeValidate: {
    validator: 'new'
  },
  props: {
    data: Object,
    dialog: Boolean
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      item:{},
      tecnicos: null,
      isLoading: false,
      autoUpdate: true,
        friends: ['Sandra Adams', 'Britta Holt'],
        isUpdating: false,
        name: 'Midnight Crew',
        title: 'Novo Tecnicos',
      }
  },
  mounted () {
    this.$validator.localize('pt_BR', this.dictionary)
  },
  computed: {
    temMessage() {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    loja() {
      return store.getters.getLojaId(this.data.id);
    },
    _tecnicos() {
      return store.state.tecnicos;
    },
    _os() {
      return store.getters.getOsId(this.data.id);
    },
  },
  created: function() {
    this.$store.dispatch('fetchProdutos').then(() => {
      console.log("Buscando dados dos produtos!")
    });
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []

      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          os_id: this.data.id,
          loja_id: this.data.loja_id,
          tecnicos: this.tecnicos,
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOsTec.php?action=osTecAdd', postData)
          .then(function(response) {
            //console.log(response);
            if(!response.data.error){
              this.successMessage.push(response.data.message);
              this.atualizar();
              this.isLoading = false;
              setTimeout(() => {
                this.errorMessage   = null;
                this.successMessage = null;
                this.tecnicos       = null;
              }, 2000);              
            } else{              
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            }
          })
          .catch(function(error) {
            console.log(error);
          });
          //this.$store.state.create(data)
      }
    },
    tecDelete: function(item) {
      if(confirm('Deseja realmente remover ' + item.user_nick + '?')){
        this.isLoading = true
        var postData = {
          id: item.id,
          os_id: this.data.id,
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOsTec.php?action=osTecDel', postData).then(function(response) {
          //console.log(response);
          if(!response.data.error){
            this.successMessage = response.data.message;
            this.isLoading = false;
            this.atualizar();
            setTimeout(() => {
              //this.$emit('close');
              this.errorMessage = [];
              this.successMessage = [];
            }, 2000);
          } else{
            this.errorMessage.push( response.data.message);
            this.isLoading = false;
          }
        })
        .catch(function(error) {
          console.log(error);
        });
      }
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.tecnicos) this.errorMessage.push("Tecnicos necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    atualizar: function(){
      this.$emit('atualizar');
    },
    remove (item) {
        const index = this.tecnicos.indexOf(item)
        if (index >= 0) this.tecnicos.splice(index, 1)
    },
    customFilter (item, queryText, itemText) {
        const textOne = item.user_nick.toLowerCase()
        const textTwo = item.email.toLowerCase()
        const searchText = queryText.toLowerCase()

        return textOne.indexOf(searchText) > -1 ||
          textTwo.indexOf(searchText) > -1
    },
  },
});

</script>