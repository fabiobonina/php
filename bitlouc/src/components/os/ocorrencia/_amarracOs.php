<template id="os-amarrac">
<div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">OS: {{ data.local.tipo }} - {{ data.local.name }} {{data.servico.name }}</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
              <div>
                <p class="subtitle">Numero atual: {{ data.filial }} | {{ data.os }}</p>
              </div>
              </v-flex>
              <v-flex xs12 sm6 md5>
                <v-autocomplete
                  :items="filiais"
                  v-model="filial"
                  item-text="name"
                  label="Filial"
                  :error-messages="errors.collect('filial')"
                  v-validate="'required'"
                  data-vv-name="filial"
                  return-object
                  required
                ></v-autocomplete>
              </v-flex>
              <v-flex xs12 sm6 md7>
                <v-text-field
                  type="text"
                  v-model="os"
                  label="OS"
                  :error-messages="errors.collect('os')"
                  v-validate="'required'"
                  data-vv-name="os"
                  item-text="name"
                  required
                ></v-text-field>
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
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
        <!--#CONTEUDO -->
        <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
        Numero atual: {{ data.filial }} | {{ data.os }}
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Filial | OS</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded">
                <v-select label="name" v-model="filial" :options="filiais"></v-select>
              </p>
            </div>
            <div class="field">
              <p class="control is-expanded has-icons-right">
                <input v-model="os" class="input" type="text" placeholder="OS">
                <span class="icon is-small is-right">
                  <span class="mdi mdi-wrench"></span>
                </span>
              </p>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>
<script>
Vue.component('os-amarrac', {
  name: 'os-amarrac',
  template: '#os-amarrac',
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
      filial: null,
      os: null,
      isLoading: false,
      filiais: [
        {id:'1', name: 'PE'},
        {id:'3', name: 'CE'},
        {id:'4', name: 'GO'},
        {id:'5', name: 'SBO'},
        {id:'0', name: 'WT'},
      ]
    };
  },
  mounted () {
    this.$validator.localize('pt_BR', this.dictionary)
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    }
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []
      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          id: this.data.id,
          os: this.os,
          filial: this.filial.id,
          status: '1'
        };        
        this.$http.post('./config/api/apiOs.php?action=osAmarar', postData)
          .then(function(response) {
            //console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              this.atualizacao();
              setTimeout(() => {
                this.$emit('close');
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
      if(!this.filial) this.errorMessage.push("Filial necessário.");
      if(!this.os) this.errorMessage.push("OS necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    atualizacao: function(){
      this.$store.dispatch("findOs").then(() => {
        console.log("Atualizando dados OS!")
      });
    },
  },
});
</script>