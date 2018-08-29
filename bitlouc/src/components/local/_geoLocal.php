<template id="local-geo">
<div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{data.tipo}} - {{data.name}}, {{data.municipio}}/{{data.uf}}</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
          <v-container grid-list-md>
            <v-layout wrap>
            
              <v-flex xs12>
                Coordenadas atual: {{ data.latitude }}, {{ data.longitude }}
              </v-flex>
              <v-flex xs12>
                <v-text-field
                  v-model="coordenadas"
                  label="Coordenadas"
                  :error-messages="errors.collect('coordenadas')"
                  v-validate="''"
                  data-vv-name="coordenadas"
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
</template>
<script>
  Vue.component('local-geo', {
    name: 'local-geo',
    template: '#local-geo',
    $_veeValidate: {
      validator: 'new'
    },
    props: {
      dialog: Boolean,
      data: {}
    },
    data() {
      return {
        errorMessage: [],
        successMessage: [],
        coordenadas:'',
        isLoading: false
      };
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
        this.$validator.validateAll().then((result) => {
          if (result) {
        this.errorMessage = []
        if(this.formValido()){
          this.isLoading = true
          //const data = {'id': this.data.id, 'geolocalizacao': this.geolocalizacao
          //'cadastro': new Date().toJSON() }
          var geoposicao = this.coordenadas .split(",");
          var postData = {
            id: this.data.id,
            latitude: geoposicao[0],
            longitude: geoposicao[1]
          };        
          this.$http.post('./config/api/apiLocal.php?action=coordenadas', postData)
            .then(function(response) {
              //console.log(response);
              if(response.data.error){
                this.errorMessage.push(response.data.message);
                this.isLoading = false;
              } else{
                this.successMessage.push(response.data.message);
                this.isLoading = false;
                this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
                  console.log("Atualizado locais!")
                });
                setTimeout(() => {
                  this.$emit('close');
                }, 2000);  
              }
            })
            .catch(function(error) {
              console.log(error);
            });
        }}
      });
      },
      ehVazia () {
        if(this.coordenadas.length == 0){
            this.errorMessage.push('Por favor, preencha todos os campos')
            return true
        }
        if(this.coordenadas.length < 17){
          this.errorMessage.push('Coordenadas incorretas')
          return true
        }
        return false
      },
      formValido(){
          if(this.ehVazia()){
              return false
          }
          return true
      }
    },
  });
</script>