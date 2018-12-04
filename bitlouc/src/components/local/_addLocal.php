<template id="local-add">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ loja.nick }} - Nova Local</span>
        </v-card-title>
        <v-card-text>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
                <v-text-field
                  v-model="regional"
                  label="Regional"
                  :error-messages="errors.collect('regional')"
                  v-validate="''"
                  data-vv-name="regional"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-select
                  :items="tipos"
                  v-model="tipo"
                  item-text="name"
                  item-value="id"
                  label="Tipo"
                  :error-messages="errors.collect('tipo')"
                  v-validate="'required'"
                  data-vv-name="tipo"
                  required
                ></v-select>
              </v-flex>
              <v-flex xs12 sm6 md8>
                <v-text-field
                  v-model="name"
                  label="Nome"
                  :error-messages="errors.collect('name')"
                  v-validate="'required'"
                  data-vv-name="name"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md8>
                <v-text-field
                  v-model="municipio"
                  label="Municipio"
                  :error-messages="errors.collect('municipio')"
                  v-validate="'required'"
                  data-vv-name="municipio"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field
                  v-model="uf"
                  label="UF"
                  :error-messages="errors.collect('uf')"
                  v-validate="'required'"
                  data-vv-name="uf"
                  required
                ></v-text-field>
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
              <v-flex xs12 sm6 md2>
                <small class="subheading">Ativo?</small>
              </v-flex>
              <v-flex xs12 sm6 md10>
                <v-radio-group v-model="ativo" row>
                  <v-radio label="Sim" value="0" ></v-radio>
                  <v-radio label="Não" value="1"></v-radio>
                </v-radio-group>
              </v-flex>
            </v-layout>
          </v-container>
          <small>*indica campo obrigatório</small>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>
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
  Vue.component('local-add', {
    name: 'local-add',
    template: '#local-add',
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
        tipo: '', regional: '', name: '', municipio: '', uf: '', coordenadas:'', ativo: '0',
        item:{},
        isLoading: false,
        dictionary: {
          attributes: {
            name: 'Nome',
            nick: 'Nome Fantasia',
            // custom attributes
          },
          custom: {
          }
        }
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
      },
      loja()  {
        console.log(store.getters.getLojaId(this.$route.params._loja));
        return store.getters.getLojaId(this.$route.params._loja);
      },
      tipos() {
        return store.state.tipos;
      },
      categorias() {
        return store.state.categorias;
      },
    },
    methods: {
      saveItem: function(){
        this.$validator.validateAll().then((result) => {
          if (result) {
        this.errorMessage = []
        if(this.checkForm()){
          this.isLoading = true
          if(!this.coordenadas){
            this.coordenadas = '0.000000,0.000000'
          };
          var geoposicao = this.coordenadas .split(",");
          var postData = {
            id: '',
            loja_id: this.loja.id,
            proprietario_id: this.loja.proprietario_id,
            tipo: this.tipo,
            regional: this.regional,
            name: this.name,
            municipio: this.municipio,
            uf: this.uf,
            latitude: geoposicao[0],
            longitude: geoposicao[1],
            ativo: this.ativo
          };
          //console.log(postData);
          this.$http.post('./config/api/apiLocal.php?action=publish', postData)
            .then(function(response) {
              console.log(response);
              if(response.data.error){
                this.errorMessage.push(response.data.message);
                this.isLoading = false;
              } else{
                this.successMessage.push(response.data.message);
                this.$store.dispatch('fetchLocais', this.data.loja).then(() => {
                  console.log("Atulizando dados das localidades!")
                });
                this.isLoading = false;
                setTimeout(() => {
                  this.$emit('close');
                }, 2000);  
              }
            })
            .catch(function(error) {
              console.log(error);
            });
        } }
      });
      },
      checkForm:function(e) {
        this.errorMessage = [];
        if(!this.tipo) this.errorMessage.push("Tipo necessário.");
        if(!this.name) this.errorMessage.push("Nome necessário.");
        if(!this.municipio) this.errorMessage.push("Municipio necessário.");
        if(!this.uf) this.errorMessage.push("UF necessário.");
        if(!this.ativo) this.errorMessage.push("Ativo necessário.");
        if(this.coordenadas.length > 0){
          if(this.coordenadas.length < 17) this.errorMessage.push('Coordenadas incorretas!');
        }
        if(!this.errorMessage.length) return true;
        e.preventDefault();
      },
      addNewTodo: function () {
        this.categoria.push(this.item)
        this.item = {}
      }
    },
  });
</script>