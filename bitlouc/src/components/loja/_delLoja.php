<template id="loja-del">
  <div>
    <v-dialog v-model="dialog" persistent scrollable max-width="500px">
      <v-card>
        <v-toolbar dark color="error">
          <v-btn icon dark @click="$emit('close')">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>Loja</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn icon flat @click.native="deletarItem()">
              <v-icon>mdi-delete</v-icon>
            </v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-card-title color="primary">
          <span class="headline">{{ proprietario.nick }} - Deletar Loja</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>
          <v-form>
            <h1 class="headline">{{ data.name }}</h1>
            <h2 class="headline">{{ data.nick }}</h2>
            <h2 class="headline">Grupo: {{ data.grupo }}, Seguimento: {{ data.seguimento }}</h2>
          </v-form>

        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
Vue.component('loja-del', {
  name: 'loja-del',
  template: '#loja-del',
  props: {
    data: Object,
    dialog: Boolean
  },
  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
    }
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    proprietario() {
      return store.state.proprietario;
    },
  },
  methods: {
    deletarItem: function() {
      if(confirm('Deseja realmente deletar ' + this.data.nick + '?')){
        this.isLoading = true
        var postData = {
          id: this.data.id
        };
        //console.log(postData);
        this.$http.post('./config/api/apiLoja.php?action=deletar', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage.push(response.data.message);
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.$store.dispatch("fetchIndex").then(() => {
              console.log("Atualizado lojas!")
            });
            setTimeout(() => {
              this.$emit('close');
            }, 3000);
          }
        })
        .catch(function(error) {
          console.log(error);
        });
      }
    }
  }
});
</script>