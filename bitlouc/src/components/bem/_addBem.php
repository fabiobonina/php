<template id="bem-add">
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
            <v-toolbar-title>Equipamentos</v-toolbar-title>
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
                {{ proprietario.nick }}: {{ proprietarioLocal.tipo }} - {{ proprietarioLocal.name }}
                <small>Proprietario do Equipamento</small>
              </v-stepper-step>
              <v-stepper-content step="1">
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12 sm7 md4 >
                      <v-autocomplete outline
                        :items="lojas"
                        v-model="proprietario"
                        item-text="name"
                        label="Proprietario"
                        :error-messages="errors.collect('proprietario')"
                        v-validate="'required'"
                        data-vv-name="proprietario"
                        return-object
                        required
                      ></v-autocomplete>
                    </v-flex>
                    <v-flex xs12 sm7 md4 >
                      <v-autocomplete outline
                        :items="proprietarioLocais"
                        v-model="proprietarioLocal"
                        item-text="name"
                        label="Proprietario Local"
                        :error-messages="errors.collect('proprietarioLocal')"
                        v-validate="'required'"
                        data-vv-name="proprietarioLocal"
                        return-object
                        required
                      ></v-autocomplete>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-stepper-content>
              <v-stepper-step editable :complete="Number(progresso) > 2" step="2">
                {{ loja.nick }}: {{ local.tipo }} - {{ local.name }}
                <small>Local do Equipamento</small>
              </v-stepper-step>
              <v-stepper-content step="2">
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12 sm7 md4 >
                      <v-autocomplete outline
                        :items="lojas"
                        v-model="loja"
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
                        v-model="local"
                        item-text="name"
                        label="Local"
                        :error-messages="errors.collect('local')"
                        v-validate="'required'"
                        data-vv-name="local"
                        return-object
                        required
                      ></v-autocomplete>
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
                      <v-autocomplete outline
                        :items="categorias"
                        v-model="categoria"
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
                        v-model="produto"
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
                      v-model="fabricante"
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
                      v-model="modelo"
                      label="Modelo"
                      :error-messages="errors.collect('modelo')"
                      v-validate="''"
                      data-vv-name="modelo"
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md6>
                    <v-text-field outline
                      v-model="name"
                      label="Nome"
                      :error-messages="errors.collect('name')"
                      v-validate="''"
                      data-vv-name="name"
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md3>
                    <v-text-field outline
                      v-model="numeracao"
                      label="Numeracao"
                      :error-messages="errors.collect('numeracao')"
                      v-validate="''"
                      data-vv-name="numeracao"
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md3>
                    <v-text-field outline
                      v-model="plaqueta"
                      label="Plaqueta"
                      :error-messages="errors.collect('plaqueta')"
                      v-validate="''"
                      data-vv-name="plaqueta"
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md3 >
                      <v-text-field outline
                        type="date"
                        v-model="dataFab"
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
                      v-model="dataCompra"
                      label="Data Compra"
                      :error-messages="errors.collect('dataCompra')"
                      v-validate="'required'"
                      data-vv-name="dataCompra"
                      item-text="name"
                      required
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs3 sm2 md1>
                    <small class="subheading">Ativo?</small>
                  </v-flex>
                  <v-flex xs8 sm4 md4>
                    <v-radio-group v-model="ativo" row>
                      <v-radio label="Sim" value="0" ></v-radio>
                      <v-radio label="Não" value="1"></v-radio>
                    </v-radio-group>
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
Vue.component('bem-add', {
  name: 'bem-add',
  template: '#bem-add',
  $_veeValidate: {
    validator: 'new'
  },
  props: {
    data: {},
    filterKey: String,
    dialogedt: Boolean,
    dialogdel: Boolean,
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      dialog: false,
      name: null,
      produto: null, modelo: '', numeracao:'', modelo:'', fabricante: null,
      categoria: null, plaqueta: '', dataFab: '', dataCompra: '', ativo: '0',
      proprietario: null, proprietarioLocal: null, proprietarioLocais: [],
      loja: null, local: null, locais : [],
      progresso: '3',
      item:{},
    };
  },
  watch: {
    'proprietario': function (newQuestion, oldQuestion) {
      this.updateLocal()
    },
    'loja': function (newQuestion, oldQuestion) {
      this.updateLocal()
    },
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
  },
  created: function() {
    this.$store.dispatch('fetchProdutos').then(() => {
      console.log("Buscando dados dos produtos!")
    });
    this.initialize();
  },
  methods: {
    initialize() {
      this.loja = store.getters.getLojaId(this.$route.params._id);
      this.local = store.getters.getLocalId(this.$route.params._local);
      this.proprietario = store.getters.getLojaId(this.user.loja);
      this.proprietarioLocal = store.getters.getLocalLojaSingle(this.user.loja);
      this.updateLocal();
    },
    updateLocal() {
      this.locais = store.getters.getLocalLoja(this.loja.id);
      this.proprietarioLocais = store.getters.getLocalLoja(this.proprietario.id);
    },
    saveItem: function(){
      this.errorMessage = []
      this.$validator.validateAll().then((result) => {
        if (result) {
          this.isLoading = true
          var postData = {
            produto: this.produto.id,
            tag: this.produto.tag,
            modelo: this.modelo,
            name: this.name,
            fabricante: this.fabricante.id,
            fabricanteNick: this.fabricante.nick,
            proprietario: this.propriedade.id,
            proprietarioNick: this.propriedade.nick,
            proprietarioLocal: this.propriedadeLocal.id,
            categoria: this.categoria.id,
            numeracao: this.numeracao,
            plaqueta: this.plaqueta,
            dataFab: this.dataFab,
            dataCompra: this.dataCompra,
            loja: this.loja,
            local: this.local,
            ativo: this.ativo
          };
          console.log(postData);
          /*this.$http.post('./config/api/apiBem.php?action=cadastrar', postData)
            .then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
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
          });*/
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
  },
});
</script>