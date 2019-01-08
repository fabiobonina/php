<template id="os-tec">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ data.local.tipo }} - {{ data.local.name }}: OS Tecnicos</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
              <div v-if="data.bem">
                <p>{{ data.bem.name }} - {{ data.bem.modelo }} <i class="fa fa-qrcode"></i> {{ data.bem.numeracao }} <i class="fa fa-fw fa-barcode"></i>{{ data.bem.plaqueta }}</p>
              </div>
              <h2 class="subtitle">Tecnicos</h2>
              <div v-for="item in _os.tecnicos" :key="item.id">
                  <v-chip small close @input="tecDelete(item)">
                    <v-avatar small >
                      <img :src="item.avatar" alt="trevor">
                    </v-avatar>
                    {{item.userNick}}
                  </v-chip>
              </div>
              <v-flex xs12>
                <v-autocomplete
                  :items="_tecnicos"
                  v-model="tecnicos"
                  label="Tecnicos"
                  item-text="userNick"
                  multiple
                  chips
                  return-object
                  max-height="auto"
                  :error-messages="errors.collect('')" v-validate="''" data-vv-name="tecnicos"
                >
                  <template slot="selection" slot-scope="data">
                    <v-chip
                      :selected="data.selected"
                      :key="JSON.stringify(data.item)"
                      close
                      class="chip--select-multi"
                      @input="data.parent.selectItem(data.item)"
                    >
                      <v-avatar>
                        <img :src="data.item.avatar">
                      </v-avatar>
                      {{ data.item.userNick }}
                    </v-chip>
                  </template>
                  <template slot="item" slot-scope="data">
                    <template v-if="typeof data.item !== 'object'">
                      <v-list-tile-content v-text="data.item"></v-list-tile-content>
                    </template>
                    <template v-else>
                      <v-list-tile-avatar>
                        <img :src="data.item.avatar">
                      </v-list-tile-avatar>
                      <v-list-tile-content>
                        <v-list-tile-title v-html="data.item.userNick"></v-list-tile-title>
                        <v-list-tile-sub-title v-html="data.item.email"></v-list-tile-sub-title>
                      </v-list-tile-content>
                    </template>
                  </template>
                </v-autocomplete>
              </v-flex>
            </v-layout>
          </v-container>
          <small>*indica campo obrigatório</small>

        </v-card-text>
        <v-card-actions>
            <v-btn flat @click.stop="$emit('close')">Fechar</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" flat @click.stop="saveItem()">Salvar</v-btn>
        </v-card-actions>
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
    };
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
          os: this.data.id,
          loja: this.data.loja,
          tecnicos: this.tecnicos,
        };
        //var formData = this.toFormData(postData);
        //console.log(postData);
        this.$http.post('./config/api/apiOsTec.php?action=osTecAdd', postData)
          .then(function(response) {
            //console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.atualizacao();
              this.isLoading = false;
              setTimeout(() => {
                this.errorMessage   = null;
                this.successMessage = null;
                this.tecnicos       = null;
              }, 2000);
            }
          })
          .catch(function(error) {
            console.log(error);
          });
          //this.$store.state.create(data)
      }
    },
    tecDelete: function(item) {
      if(confirm('Deseja realmente remover ' + item.userNick + '?')){
        this.isLoading = true
        var postData = {
          id: item.id,
          os: this.data.id,
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOsTec.php?action=osTecDel', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage.push( response.data.message);
            this.isLoading = false;
          } else{
            this.successMessage = response.data.message;
            this.isLoading = false;
            this.atualizacao();
            setTimeout(() => {
              //this.$emit('close');
              this.errorMessage = [];
              this.successMessage = [];
            }, 2000);
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
    atualizacao: function(){
      this.$store.dispatch("fetchOs").then(() => {
        console.log("Atualizando dados OS!")
      });
    },
  },
});

</script>