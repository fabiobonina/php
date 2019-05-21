<template id="nota-edt">
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
          <span class="headline">{{ _os.local_tipo }} - {{ _os.local_name }}</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader></loader>
          <v-container>
            <v-layout wrap>
              <v-flex xs12>
                <div>
                <v-text-field
                  name="input-1"
                  label="Nota do Serviço"
                  v-model="data.descricao"
                  textarea
                ></v-text-field>

                </div>
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
Vue.component('nota-edt', {
  name: 'nota-edt',
  template: '#nota-edt',
  props: {
    data: {},
    dialog: Boolean
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      title: 'Descrição serviço',
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
        //store.commit('isLoading')
        var postData = {
          id: this.data.id,
          descricao: this.data.descricao,
          os_id: this._os.id
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=publishNota', postData)
          .then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              //store.commit('isLoading');
            } else{
              this.successMessage.push(response.data.message);
              this.atualizacao();
              //store.commit('isLoading');
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
      if(!this.data.descricao){
        this.errorMessage.push("Nota necessário.");
      } else if(this.data.descricao.length < 20) {
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