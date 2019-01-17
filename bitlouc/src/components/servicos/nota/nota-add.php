<template id="nota-add">
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
          <v-container>
            <v-layout wrap>
              <v-flex xs12>
                <div>
                <v-text-field
                  name="input-1"
                  label="Nota do Serviço"
                  v-model="descricao"
                  textarea
                ></v-text-field>

                </div>
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
Vue.component('nota-add', {
  name: 'nota-add',
  template: '#nota-add',
  props: {
    data: {},
    dialog: Boolean
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      title: 'Descrição serviço',
      descricao:'OCORRENCIA: CAUSA: SOLUCAO: PECAS: ALIMENTACAO: HOSPEDAGEM: ETC:',
      causa:'CAUSA',
      isLoading: false
    };
  },
  computed: {
    temMessage() {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    _os()  {
      return store.state.os;
    },
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []

      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          descricao:  this.descricao,
          os_id:         this.data.id,
          id:         ''
        };
        //var formData = this.toFormData(postData);
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=publishNota', postData)
          .then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.atualizacao();
              this.isLoading = false;
              setTimeout(() => {
                this.errorMessage = [];
                this.successMessage = [];
                this.$emit('close');
              }, 2000);
            }
          })
          .catch(function(error) {
            console.log(error);
          });
          //this.$store.state.create(data)
      }
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.descricao){
        this.errorMessage.push("Nota necessário.");
      } else if(this.descricao.length < 20) {
        this.errorMessage.push("Descrição curta.");
      }
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    atualizacao: function(){
      this.$store.dispatch('findOs', this.$route.params._os).then(() => {
        console.log("Buscando dados da os")
      });
    },
  },
});

</script>