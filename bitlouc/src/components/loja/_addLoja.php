<template id="loja-add">
  <div>
  <v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="dialog = true" color="pink" fab small dark>
      <v-icon>mdi-plus</v-icon>
    </v-btn>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click="dialog = false">
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
          <span class="headline">{{ proprietario.nick }}</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
          <v-form>
            <v-text-field
              v-model="name"
              label="Nome"
              :error-messages="errors.collect('name')"
              v-validate="'required'"
              data-vv-name="name"
              required
            ></v-text-field>
            <v-text-field
              v-model="nick"
              label="Nome Fantasia"
              :counter="20"
              :error-messages="errors.collect('nick')"
              v-validate="'required|max:20'"
              data-vv-name="nick"
              required
            ></v-text-field>
            <v-select
              :items="grupos"
              v-model="grupo"
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
              v-model="seguimento"
              item-text="name"
              item-value="id"
              label="Seguimento"
              :error-messages="errors.collect('seguimento')"
              v-validate="'required'"
              data-vv-name="seguimento"
              required
            ></v-select>
            <v-autocomplete
              :items="categorias" v-model="categoria" label="Categorias"
              :error-messages="errors.collect('categoria')" v-validate="'required'" data-vv-name="categoria"
              required multiple chips max-height="auto"
              >
              <template slot="selection" slot-scope="data">
                <v-chip
                  :selected="data.selected"
                  :key="JSON.stringify(data.item)"
                  close class="chip--select-multi"
                  @input="data.parent.selectItem(data.item)"
                >
                  {{ data.item.name }}
                </v-chip>
              </template>
              <template slot="item" slot-scope="data">
                <template v-if="typeof data.item !== 'object'">
                  <v-list-tile-content v-text="data.item"></v-list-tile-content>
                </template>
                <template v-else>
                  <v-list-tile-content>
                    <v-list-tile-title v-html="data.item.name"></v-list-tile-title>
                  </v-list-tile-content>
                </template>
              </template>
            </v-autocomplete>
            <p>Ativo?</p>
            <v-radio-group v-model="ativo" row>
              <v-radio label="Sim" value="0" ></v-radio>
              <v-radio label="Não" value="1"></v-radio>
            </v-radio-group>
          </v-form>
        </v-card-text>
      </v-card>
    </v-dialog>

  </div>
</template>

<script>
  Vue.component('loja-add', {
  name: 'loja-add',
  template: '#loja-add',
  $_veeValidate: {
    validator: 'new'
  },
  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      dialog: true,
      item:{},
      nick:'', name:'', grupo:'C', seguimento:'', ativo:'0', categoria: [],
      dictionary: {
        attributes: {
          name: 'Nome',
          nick: 'Nome Fantasia',
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
              id: '',
              nick: this.nick,
              name: this.name,
              grupo: this.grupo,
              seguimento: this.seguimento,
              categoria: this.categoria,
              proprietario_id: this.proprietario.id,
              ativo: this.ativo
            };
            //console.log(postData);
            this.$http.post('./config/api/apiLoja.php?action=publish', postData).then(function(response) {
              console.log(response);
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
      if(!this.name) this.errorMessage.push("Nome necessário.");
      if(!this.nick) this.errorMessage.push("Nome Fantasia necessário.");
      if(!this.grupo) this.errorMessage.push("Grupo necessário.");
      if(!this.seguimento) this.errorMessage.push("Seguimento necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    addNewTodo: function () {
      this.categoria.push(this.item)
      this.item = {}
    },
    close () {
      this.dialog = false;
      this.$emit('close');
    },
  }
  });
</script>