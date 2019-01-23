<template id="os-amarrac">
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
      </v-card>
    </v-dialog>
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
      title: 'Amarar OS',
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
          filial: this.filial.id
        };        
        this.$http.post('./config/api/apiOs.php?action=osAmarar', postData)
          .then(function(response) {
            //console.log(response);
            if(!response.data.error){
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              setTimeout(() => {
                this.$emit('atualizar');
              }, 2000);
            } else{
              this.errorMessage.push(response.data.message);
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
      if(!this.filial) this.errorMessage.push("Filial necessário.");
      if(!this.os) this.errorMessage.push("OS necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
  },
});
</script>