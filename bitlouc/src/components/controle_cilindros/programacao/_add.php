<template id="creator">
  <div>
    <v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="dialog = true" color="pink" fab small dark>
      <v-icon>add</v-icon>
    </v-btn>
    <v-layout row justify-center>
      <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
        <v-card>
          <v-toolbar dark color="primary">
            <v-btn icon dark @click="dialog = false">
              <v-icon>close</v-icon>
            </v-btn>
            <v-toolbar-title>Criar Programação</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
              <v-btn dark flat @click.native="saveItem()">Salvar</v-btn>
            </v-toolbar-items>
          </v-toolbar>
          <v-card-text>
            <message :alerta="temMessage" :success="successMessage" :error="errorMessage"></message>
            <loader :dialog="isLoading"></loader>
            <v-stepper v-model="progresso" vertical light>
              <v-stepper-step editable :complete="Number(progresso) > 1" step="1">
                <small>Proprietario do Equipamento</small>
              </v-stepper-step>
              <v-stepper-content step="1">
              <template>
                  <v-card
                    color="red lighten-2"
                    dark
                  >
                    <v-card-title class="headline red lighten-3">
                      Search for Public APIs
                    </v-card-title>
                    <v-card-text>
                      Explore hundreds of free API's ready for consumption! For more information visit
                      <a
                        class="grey--text text--lighten-3"
                        href="https://github.com/toddmotto/public-apis"
                        target="_blank"
                      >the Github repository</a>.
                    </v-card-text>
                    <v-card-text>
                      <v-autocomplete
                        v-model="model"
                        :items="items"
                        :loading="isLoading"
                        :search-input.sync="search"
                        color="white"
                        hide-no-data
                        hide-selected
                        item-text="Description"
                        item-value="API"
                        label="Public APIs"
                        placeholder="Start typing to Search"
                        prepend-icon="mdi-database-search"
                        return-object
                      ></v-autocomplete>
                    </v-card-text>
                    <v-divider></v-divider>
                    <v-expand-transition>
                      <v-list v-if="model" class="red lighten-3">
                        <v-list-tile
                          v-for="(field, i) in fields"
                          :key="i"
                        >
                          <v-list-tile-content>
                            <v-list-tile-title v-text="field.value"></v-list-tile-title>
                            <v-list-tile-sub-title v-text="field.key"></v-list-tile-sub-title>
                          </v-list-tile-content>
                        </v-list-tile>
                      </v-list>
                    </v-expand-transition>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn
                        :disabled="!model"
                        color="grey darken-3"
                        @click="model = null"
                      >
                        Clear
                        <v-icon right>mdi-close-circle</v-icon>
                      </v-btn>
                    </v-card-actions>
                  </v-card>
                </template>
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12 sm7 md4 >
            <v-layout wrap>
              <v-flex xs12>
              <!--div v-for="item in _os.tecnicos" :key="item.id">
                  <v-chip small close @input="tecDelete(item)">
                    <v-avatar small >
                      <img :src="item.avatar" alt="trevor">
                    </v-avatar>
                    {{item.user_nick}}
                  </v-chip>
              </div-->
              <v-flex xs12>
                <template>
                  <v-card color="blue darken-1" dark >
                    <v-form>
                      <v-container>
                        <v-layout wrap>
                          <v-flex xs12>
                            <v-autocomplete
                              v-model="loja"
                              :items="lojas"
                              color="blue-grey lighten-2"
                              label="Loja(s)"                              
                              item-text="name"              
                              data-vv-name="loja"
                              :filter="customFilter"
                              return-object
                            >
                              <template slot="selection" slot-scope="data">
                                <v-chip
                                  :selected="data.selected"
                                  close
                                  class="chip--select-multi"
                                  @input="remove(data.item)"
                                >
                                  {{ data.item.nick }}
                                </v-chip>
                              </template>
                              <template slot="item" slot-scope="data" >
                                <template v-if="typeof data.item !== 'object'">
                                  <v-list-tile-content v-text="data.item"></v-list-tile-content>
                                </template>
                                <template v-else>
                                  <v-list-tile-content>
                                    <v-list-tile-title v-html="data.item.nick"></v-list-tile-title>
                                    <v-list-tile-sub-title v-html="data.item.name"></v-list-tile-sub-title>
                                  </v-list-tile-content>
                                </template>
                              </template>
                            </v-autocomplete>
                          </v-flex>
                        </v-layout>
                      </v-container>
                    </v-form>
                    <v-divider></v-divider>
                    
                  </v-card>
                </template>
            </v-layout>
            <small>*indica campo obrigatório</small>
                      <!--v-autocomplete outline
                        :items="lojas"
                        v-model="data.dono"
                        item-text="name"
                        label="Proprietario"
                        :error-messages="errors.collect('dono')"
                        v-validate="'required'"
                        data-vv-name="dono"
                        return-object
                        required
                      ></v-autocomplete>
                    </v-flex>
                    <v-flex xs12 sm7 md4 >
                      <v-autocomplete outline
                        :items="donoLocais"
                        v-model="data.donoLocal"
                        item-text="name"
                        label="Proprietario Local"
                        :error-messages="errors.collect('donoLocal')"
                        v-validate="'required'"
                        data-vv-name="donoLocal"
                        return-object
                        required
                      ></v-autocomplete-->
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-stepper-content>
              <v-stepper-step editable :complete="Number(progresso) > 2" step="2">

                <small>Local do Equipamento</small>
              </v-stepper-step>
              <v-stepper-content step="2">
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12 sm7 md4 >
                      <!--v-autocomplete outline
                        :items="lojas"
                        v-model="data.loja"
                        item-text="name"
                        label="Loja"
                        :error-messages="errors.collect('loja')"
                        v-validate="'required'"
                        data-vv-name="loja"
                        return-object
                        required
                      ></v-autocomplete>
                    </v-flex>
                    <v-flex xs12 sm7 md4 >
                      <v-autocomplete outline
                        :items="locais"
                        v-model="data.local"
                        item-text="name"
                        label="Local"
                        :error-messages="errors.collect('local')"
                        v-validate="'required'"
                        data-vv-name="local"
                        return-object
                        required
                      ></v-autocomplete-->
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-stepper-content>
              <v-stepper-step editable :complete="Number(progresso) > 3" step="3">
                <small>Dados equipamentos</small>
              </v-stepper-step>
              <v-stepper-content step="3">
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12 sm6 md4>
                      <!--v-autocomplete outline
                        :items="categorias"
                        v-model="data.categoria"
                        item-text="name"
                        label="Cagetoria"
                        :error-messages="errors.collect('categoria')"
                        v-validate="'required'"
                        data-vv-name="categoria"
                        return-object
                        required
                      ></v-autocomplete>
                    </v-flex>
                    <v-flex xs12 sm6 md4>
                      <v-autocomplete outline
                        :items="produtos"
                        v-model="data.produto"
                        item-text="name"
                        label="Produto"
                        :error-messages="errors.collect('produto')"
                        v-validate="'required'"
                        data-vv-name="produto"
                        return-object
                        required
                      ></v-autocomplete>
                    </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-select outline
                      :items="fabricantes"
                      v-model="data.fabricante"
                      item-text="name"
                      label="Fabricante"
                      :error-messages="errors.collect('fabricante')"
                      v-validate="'required'"
                      data-vv-name="fabricante"
                      return-object
                      required
                    ></v-select>
                  </v-flex>
                  <v-flex xs12 sm6 md6>
                    <v-text-field outline 
                      v-model="data.modelo"
                      label="Modelo"
                      :error-messages="errors.collect('modelo')"
                      v-validate="''"
                      data-vv-name="modelo"
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md6>
                    <v-text-field outline
                      v-model="data.name"
                      label="Nome"
                      :error-messages="errors.collect('name')"
                      v-validate="''"
                      data-vv-name="name"
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md3>
                    <v-text-field outline
                      v-model="data.numeracao"
                      label="Numeracao"
                      :error-messages="errors.collect('numeracao')"
                      v-validate="''"
                      data-vv-name="numeracao"
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md3>
                    <v-text-field outline
                      v-model="data.plaqueta"
                      label="Plaqueta"
                      :error-messages="errors.collect('plaqueta')"
                      v-validate="''"
                      data-vv-name="plaqueta"
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md3 >
                      <v-text-field outline
                        type="date"
                        v-model="data.dataFab"
                        label="Data Fabricação"
                        :error-messages="errors.collect('dataFab')"
                        v-validate="'required'"
                        data-vv-name="dataFab"
                        item-text="name"
                        required
                      ></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md3 >
                    <v-text-field outline
                      type="date"
                      v-model="data.dataCompra"
                      label="Data Compra"
                      :error-messages="errors.collect('dataCompra')"
                      v-validate="'required'"
                      data-vv-name="dataCompra"
                      item-text="name"
                      required
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-select outline
                      :items="statusBens"
                      v-model="data.status"
                      item-value="id"
                      item-text="name"
                      label="status"
                      :error-messages="errors.collect('status')"
                      v-validate="'required'"
                      data-vv-name="status"
                      required
                    ></v-select-->
                  </v-flex>
                  <v-flex xs3 sm2 md1>
                    <small class="subheading">Ativo?</small>
                  </v-flex>
                  <v-flex xs8 sm4 md4>
                    <!--v-radio-group v-model="data.ativo" row>
                      <v-radio label="Sim" value="0" ></v-radio>
                      <v-radio label="Não" value="1"></v-radio>
                    </v-radio-group-->
                  </v-flex>
                </v-layout>
                </v-container>
              </v-stepper-content>
            </v-stepper>
          </v-card-text>
        </v-card>
      </v-dialog>
    </v-layout>
  </div>
</template>
  
</template>
<script>
Vue.component('creator', {
  name: 'creator',
  template: '#creator',
  $_veeValidate: {
    validator: 'new'
  },
  props: {
    data: {},
    filterKey: String,
    dialogAdd: Boolean,
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      dialog: false,
      loja:[],
      donoLocais: [],
      locais : [],
      progresso: '1',
      item:{},
        descriptionLimit: 60,
      entries: [],
      isLoading: false,
      model: null,
      search: null
    };
  },
  watch: {
    'dono': function (newQuestion, oldQuestion) {
      this.updateLocal()
    },
    'loja': function (newQuestion, oldQuestion) {
      this.updateLocal()
    },
    'dialogEdt': function (newQuestion, oldQuestion) {
      this.dialog = true
    },
    dialog (val) {
      val || this.close()
    },
    search (val) {
        // Items have already been loaded
        if (this.items.length > 0) return

        // Items have already been requested
        if (this.isLoading) return

        this.isLoading = true

        // Lazily load input items
        fetch('https://api.publicapis.org/entries')
          .then(res => res.json())
          .then(res => {
            const { count, entries } = res
            this.count = count
            this.entries = entries
          })
          .catch(err => {
            console.log(err)
          })
          .finally(() => (this.isLoading = false))
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
    lojas() {
      return store.state.lojas;
    },
    produtos() {
      return store.state.produtos;
    },
    fabricantes() {
      return store.state.fabricantes;
    },
    categorias() {
      return store.state.categorias;
    },
    statusBens() {
      return store.state.statusBens;
    },
    fields () {
        if (!this.model) return []

        return Object.keys(this.model).map(key => {
          return {
            key,
            value: this.model[key] || 'n/a'
          }
        })
      },
      items () {
        return this.entries.map(entry => {
          const Description = entry.Description.length > this.descriptionLimit
            ? entry.Description.slice(0, this.descriptionLimit) + '...'
            : entry.Description

          return Object.assign({}, entry, { Description })
        })
      }
  },
  created: function() {
    this.$store.dispatch('fetchProdutos').then(() => {
      console.log("Buscando dados dos produtos!")
    });
    this.initialize();
  },
  methods: {
    initialize() {
      //this.loja = store.getters.getLojaId(this.$route.params._loja);
      //this.local = store.getters.getLocalId(this.$route.params._local);
      //this.dono = store.getters.getLojaId(this.user.loja);
      //this.donoLocal = store.getters.getLocalLojaSingle(this.user.loja);
      this.updateLocal();
    },
    updateLocal() {
      //this.locais = store.getters.getLocalLoja(this.loja.id);
      //this.donoLocais = store.getters.getLocalLoja(this.dono.id);
    },
    saveItem: function(){
      this.errorMessage = []
      this.$validator.validateAll().then((result) => {
        if (result) {
          this.isLoading = true
          var postData = {
            produto: this.produto.id,
            tag: this.produto.tag,
            name: this.name,
            modelo: this.modelo,
            fabricante: this.fabricante.id,
            fabricanteNick: this.fabricante.nick,
            dono: this.dono.id,
            donoNick: this.dono.nick,
            donoLocal: this.donoLocal.id,
            categoria: this.categoria.id,
            numeracao: this.numeracao,
            plaqueta: this.plaqueta,
            dataFab: this.dataFab,
            dataCompra: this.dataCompra,
            loja: this.loja.id,
            local: this.local.id,
            status: this.status,
            ativo: this.ativo
          };
          //console.log(postData);
          this.$http.post('./config/api/apiBem.php?action=insert', postData).then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.$store.dispatch('fetchLocais', this.$route.params._loja).then(() => {
                console.log("Atulizando dados das localidades!")
              });
              this.isLoading = false;
              setTimeout(() => {
                this.close();
              }, 2000);
            }
          })
          .catch(function(error) {
            console.log(error);
          });
        }
      });
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.categoria) this.errorMessage.push("Categoria necessário.");
      if(!this.produto) this.errorMessage.push("Produto necessário.");
      if(!this.modelo) this.errorMessage.push("Modelo necessário.");
      if(!this.fabricante) this.errorMessage.push("Municipio necessário.");
      if(!this.ativo) this.errorMessage.push("Ativo necessário.");
      if(!this.dataCompra) this.errorMessage.push('data compra necessário!');
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    close () {
      this.dialog = false;
      this.$emit('close');
    },
    atualizar: function(){
      this.$emit('atualizar');
    },
    remove (item) {
        const index = this.loja.indexOf(item)
        if (index >= 0) this.loja.splice(index, 1)
    },
    customFilter (item, queryText, itemText) {
        const textOne = item.nick.toLowerCase()
        const textTwo = item.nome.toLowerCase()
        const searchText = queryText.toLowerCase()

        return textOne.indexOf(searchText) > -1 ||
          textTwo.indexOf(searchText) > -1
    },
  },
});
</script>