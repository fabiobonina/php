<template id="loja-edt">
  <div>
    <v-dialog v-model="dialog" persistent scrollable max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ proprietario.nick }} - Editar Loja</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
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
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
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
    categorias() {
      return store.state.categorias;
    },
  },
  methods: {
    saveItem: function() {
      this.$validator.validateAll().then((result) => {
        if (result) {
      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          nick: this.data.nick,
          name: this.data.name,
          grupo: this.data.grupo,
          seguimento: this.data.seguimento,
          ativo: this.data.ativo,
          id: this.data.id
        };
        //console.log(postData);
        this.$http.post('./config/api/apiLoja.php?action=editar', postData).then(function(response) {
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