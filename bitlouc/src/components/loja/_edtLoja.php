<template id="loja-edt">
  <div>
    <!--v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="dialog = true" color="pink" fab small dark>
      <v-icon>mdi-plus</v-icon>
    </v-btn-->
    <v-dialog v-model="dialog" persistent scrollable max-width="500px">
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click="$emit('close')">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>Loja</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn icon flat @click.native="saveItem()">
              <v-icon>mdi-content-save</v-icon>
            </v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-card-title>
          <span class="headline">{{ proprietario.nick }} - Editar Loja</span>
        </v-card-title>
        <v-card-text>
          <v-form>
            <v-text-field
              v-model="data.name"
              label="Nome"
              :error-messages="errors.collect('name')"
              v-validate="'required'"
              data-vv-name="name"
              required
            ></v-text-field>
            <v-text-field
              v-model="data.nick"
              label="Nome Fantasia"
              :counter="20"
              :error-messages="errors.collect('nick')"
              v-validate="'required|max:20'"
              data-vv-name="nick"
              required
            ></v-text-field>
            <v-select
              :items="grupos"
              v-model="data.grupo"
              item-text="name"
              item-value="id"
              label="Grupo"
              :error-messages="errors.collect('grupo')"
              v-validate="'required'"
              data-vv-name="grupo"
              required
            ></v-select>
            <v-select
              :items="seguimentos"
              v-model="data.seguimento"
              item-text="name"
              item-value="id"
              label="Seguimento"
              :error-messages="errors.collect('seguimento')"
              v-validate="'required'"
              data-vv-name="seguimento"
              required
            ></v-select>
            <p>Ativo?</p>
            <v-radio-group v-model="data.ativo" row>
              <v-radio label="Sim" value="0" ></v-radio>
              <v-radio label="Não" value="1"></v-radio>
            </v-radio-group>
          </v-form>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
Vue.component('loja-edt', {
  name: 'loja-edt',
  template: '#loja-edt',
  $_veeValidate: {
    validator: 'new'
  },
  props: {
    data: Object,
    dialog: Boolean
  },
  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      dictionary: {
        attributes: {
          name: 'Nome',
          nick: 'Nome Fantasia',
          grupo: 'Grupo',
          seguimento: 'Seguimento',
          ativo: 'ativo',          
          // custom attributes
        },
        custom: {
        }
      }
    }
  },
  mounted () {
    this.$validator.localize('pt_BR', this.dictionary)
  },
  computed: {
    user()  {
      return store.state.user;
    },
    proprietario() {
      return store.state.proprietario;
    },
    seguimentos() {
      return store.state.seguimentos;
    },
    grupos() {
      return store.state.grupos;
    },
  },
  methods: {
    saveItem: function() {
      this.$validator.validateAll().then((result) => {
        if (result) {
      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          proprietario_id: this.data.proprietario_id,
          id: this.data.id,
          nick: this.data.nick,
          name: this.data.name,
          grupo: this.data.grupo,
          seguimento: this.data.seguimento,
          ativo: this.data.ativo
        };
        //console.log(postData);
        this.$http.post('./config/api/apiLoja.php?action=publish', postData).then(function(response) {
          console.log(response);
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
            }, 2000);
          }
        })
        .catch(function(error) {
          console.log(error);
        });
      }
        }
      });
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.data.name) this.errorMessage.push("Nome necessário.");
      if(!this.data.nick) this.errorMessage.push("Nome Fantasia necessário.");
      if(!this.data.grupo) this.errorMessage.push("Grupo necessário.");
      if(!this.data.seguimento) this.errorMessage.push("Seguimento necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    addNewTodo: function () {
      this.categoria.push(this.item)
      this.item = {}
    }
  }
});

</script>