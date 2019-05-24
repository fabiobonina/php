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
            <loader></loader>
            <v-stepper v-model="progresso" vertical light>
              <v-stepper-step editable :complete="Number(progresso) > 1" step="1">
                {{ data.dono.nick }}: {{ data.donoLocal.tipo }} - {{ data.donoLocal.name }}
                <small>Proprietario do Equipamento</small>
              </v-stepper-step>
              <v-stepper-content step="1">
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12 sm7 md4 >
                      <v-autocomplete outline
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
                      ></v-autocomplete>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-stepper-content>
              <v-stepper-step editable :complete="Number(progresso) > 2" step="2">
                {{ data.loja.nick }}: {{ data.local.tipo }} - {{ data.local.name }}
                <small>Local do Equipamento</small>
              </v-stepper-step>
              <v-stepper-content step="2">
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12 sm7 md4 >
                      <v-autocomplete outline
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
                    ></v-select>
                  </v-flex>
                  <v-flex xs3 sm2 md1>
                    <small class="subheading">Ativo?</small>
                  </v-flex>
                  <v-flex xs8 sm4 md4>
                    <v-radio-group v-model="data.ativo" row>
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
    dialogEdt: Boolean,
    dialogDel: Boolean,
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      
      dialog: false,
      donoLocais: [],
      locais : [],
      progresso: '3',
      item:{},
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
    }
  },
  mounted () {
    this.$validator.localize('pt_BR', this.dictionary)
  },
  computed: {
    user()  {
      return this.$store.state.user;
    },
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    lojas() {
      return this.$store.state.lojas;
    },
    produtos() {
      return this.$store.state.produtos;
    },
    fabricantes() {
      return this.$store.state.fabricantes;
    },
    categorias() {
      return this.$store.state.categorias;
    },
    statusBens() {
      return this.$store.state.statusBens;
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
      this.loja = store.getters.getLojaId(this.$route.params._loja);
      this.local = store.getters.getLocalId(this.$route.params._local);
      this.dono = store.getters.getLojaId(this.user.loja);
      this.donoLocal = store.getters.getLocalLojaSingle(this.user.loja);
      this.updateLocal();
    },
    updateLocal() {
      this.locais = store.getters.getLocalLoja(this.loja.id);
      this.donoLocais = store.getters.getLocalLoja(this.dono.id);
    },
    saveItem: function(){
      this.errorMessage = []
      this.$validator.validateAll().then((result) => {
        if (result) {
          //store.commit('isLoading')
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
              //store.commit('isLoading');
            } else{
              this.successMessage.push(response.data.message);
              this.$store.dispatch('fetchLocais', this.$route.params._loja).then(() => {
                console.log("Atulizando dados das localidades!")
              });
              //store.commit('isLoading');
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
  },
});
</script>