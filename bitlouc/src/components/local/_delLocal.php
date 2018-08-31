<template id="local-del">
  <div>
    <v-dialog v-model="dialog" persistent scrollable max-width="500px">
      <v-card>
        <v-card-title color="primary">
          <span class="headline">{{ loja.nick }} - Deletar Local</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
          <v-form>
            <h1 class="headline">{{ data.tipo }}-{{ data.name }}</h1>
            <h2 class="headline">{{ data.municipio }}/ {{ data.uf }}</h2>
            <h2 class="headline">Regional: {{ data.regional }}</h2>

          </v-form>

        </v-card-text>
        <v-card-actions>
            <v-btn flat @click.stop="$emit('close')">Fechar</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="error" flat @click.stop="deletarItem()">Deletar</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
  Vue.component('local-del', {
    name: 'local-del',
    template: '#local-del',
    props: {
      data: Object,
      dialog: Boolean
    },
    data() {
      return {
        errorMessage: [],
        successMessage: [], 
        isLoading: false
      };
    },
    computed: {
      temMessage () {
        if(this.errorMessage.length > 0) return true
        if(this.successMessage.length > 0) return true
        return false
      },
      loja()  {
        return store.getters.getLojaId(this.data.loja);
      },
    },
    methods: {
      deletarItem: function() {
        if(confirm('Deseja realmente deletar ' + this.data.tipo+'-'+ this.data.name + '?')){
          this.isLoading = true
          var postData = {
            id: this.data.id
          };
          //console.log(postData);
          this.$http.post('./config/api/apiLocal.php?action=deletar', postData).then(function(response) {
            //console.log(response);
            if(response.data.error){
              this.errorMessage = response.data.message;
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              this.$store.dispatch("fetchIndex").then(() => {
                console.log("Atualizado lojas!")
              });
              setTimeout(() => {
                this.$emit('close');
              }, 2000);
            }
          })
          .catch(function(error) {
            console.log(error);
          });
        }
      }
    },
  });
</script>