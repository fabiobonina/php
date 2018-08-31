<template id="loja-cat">
  <div>
    <v-dialog v-model="dialog" persistent scrollable max-width="500px">
      <v-card>
        <v-card-title>
          CATEGORIAS: {{ proprietario.nick }} - {{ loja.nick }} 
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
          <v-form>
            <div>
              <v-chip small v-for="item in loja.categoria" close @input="catDelete(item)" :key="item.id"
              :color="item.ativo =='0'? 'green' : '' " text-color="white">
                <v-avatar>
                  <v-btn flat small icon color=""
                    @click.stop="catStatus(item); item.ativo == '0'? item.ativo = '1' : item.ativo = '0' ">
                    <v-icon v-if="item.ativo == '0'" dark>check_circle </v-icon>
                    <v-icon v-else dark>panorama_fish_eye</v-icon>
                  </v-btn>
                </v-avatar>
                <strong>{{ item.name }}</strong>
              </v-chip>
            </div>
            <v-autocomplete
              :items="categorias"
              v-model="categoria"
              label="Categorias"
              :error-messages="errors.collect('categoria')"
              v-validate="'required'"
              data-vv-name="categoria"
              required
              multiple
              chips
              max-height="auto"
            >
              <template slot="selection" slot-scope="data">
                <v-chip
                  :selected="data.selected"
                  :key="JSON.stringify(data.item)"
                  close
                  class="chip--select-multi"
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
Vue.component('loja-cat', {
  name: 'loja-cat',
  template: '#loja-cat',
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
      categoria: [],
      ativo:'',
      item:{},
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
    loja()  {
      return store.getters.getLojaId(this.data.id);
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
              categoria: this.categoria,
              loja: this.data.id
            };
            //console.log(postData);
            this.$http.post('./config/api/apiLoja.php?action=catCadastrar', postData ).then(function(response) {
              //console.log(response.data.message);
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
                  this.errorMessage = [];
                  this.successMessage = [];
                  this.categoria = [];
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
    catDelete: function(data) {
      if(confirm('Deseja realmente deletar ' + data.name + '?')){
        this.isLoading = true
        var postData = {
          id: data.id
        };
        //console.log(postData);
        this.$http.post('./config/api/apiLoja.php?action=catDelete', postData ).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage = response.data.message;
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.$store.dispatch('fetchIndex').then(() => {
              console.log("Atualizado lojas!")
            });
            setTimeout(() => {
              //this.$emit('close');
              this.errorMessage = [];
              this.successMessage = [];
            }, 2000);
          }
        })
        .catch(function(error) {
          console.log(error);
        });
      }
    },
    catStatus: function(data) {
      this.isLoading = true
      if(data.ativo == 0) this.ativo = '1';
      if(data.ativo == 1) this.ativo = '0';
      var postData = {
        ativo: this.ativo,
        id: data.id
      };
      console.log(postData);
      this.$http.post('./config/api/apiLoja.php?action=catStatus', postData ).then(function(response) {
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
            this.errorMessage = [];
            this.successMessage = [];
          }, 2000);
        }
      })
      .catch(function(error) {
        console.log(error);
      });
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(this.categoria.length == 0) this.errorMessage.push("Categoria necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    remove (item) {
      this.chips.splice(this.chips.indexOf(item), 1)
      this.chips = [...this.chips]
    },
    addNewTodo: function () {
      this.categoria.push(this.item)
      this.item = {}
    }
  }
});

</script>