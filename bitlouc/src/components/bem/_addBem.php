<template id="bem-add">
  <div>
    <v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="dialog = true" color="pink" fab small dark>
      <v-icon>add</v-icon>
    </v-btn>
  <v-layout row justify-center>
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click.native="dialog = false">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Equipamentos</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click="saveItem()">Salvar</v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-card-text>
          <message :alerta="temMessage" :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
         {{ loja.nick }}: {{ local.tipo }} - {{ local.name }}
        <!--#CONTEUDO -->
        <div>
          <v-autocomplete
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
        </div>
        <div>
          <v-autocomplete
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
        </div>
        <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12 sm6 md8>
                <v-text-field
                  v-model="modelo"
                  label="Modelo"
                  :error-messages="errors.collect('modelo')"
                  v-validate="''"
                  data-vv-name="modelo"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md8>
                <v-text-field
                  v-model="plaqueta"
                  label="Plaqueta"
                  :error-messages="errors.collect('plaqueta')"
                  v-validate="''"
                  data-vv-name="plaqueta"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-select
                  :items="fabricantes"
                  v-model="fabricante"
                  item-text="name"
                  item-value="id"
                  label="Fabricante"
                  :error-messages="errors.collect('fabricante')"
                  v-validate="'required'"
                  data-vv-name="fabricante"
                  required
                ></v-select>
              </v-flex>
              <v-flex xs7 sm7 md3 >
                  <v-text-field outline
                    type="date"
                    v-model="dateInicio"
                    label="Data Inicio"
                    :error-messages="errors.collect('dateInicio')"
                    v-validate="'required'"
                    data-vv-name="dateInicio"
                    item-text="name"
                    required
                  ></v-text-field>
                </v-flex>
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
              <v-flex xs12>
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

        
        <div class="columns">
          <div class="column">
            <div class="field">
              <label class="label">Dt.Frabricação</label>
              <div class="control">
                <input v-model="dataFab" class="input" type="date" placeholder="Data fabricaçao">
              </div>
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Dt.Compra</label>
              <div class="control">
                <input v-model="dataCompra" class="input" type="date" placeholder="Data compra">
              </div>
            </div>
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field">
            <label class="label">Ativo? &nbsp;</label>
          </div>
          <div class="field-body">
              <div class="control">
                <input type="radio" value="1" v-model="ativo">
                <label for="one">Não</label>
                <input type="radio" value="0" v-model="ativo">
                <label for="two">Sim</label>
              </div>
          </div>
        </div> 

        <template>
          <v-stepper v-model="progresso" vertical light>
            <v-stepper-step editable :complete="Number(progresso) > 1" step="1">
              {{ dateInicio }} {{ horaInicio }}
              <small>Proprietario</small>
            </v-stepper-step>
            <v-stepper-content step="1">
              <v-layout wrap align-center>
                <v-flex xs12 sm12 md3>
                  <span class="headline white--text">Atendimento Inicial</span>
                </v-flex>
                <v-flex xs7 sm7 md3 >
                  <v-text-field outline
                    type="date"
                    v-model="dateInicio"
                    label="Data Inicio"
                    :error-messages="errors.collect('dateInicio')"
                    v-validate="'required'"
                    data-vv-name="dateInicio"
                    item-text="name"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs5 sm5 md2>
                  <v-text-field outline 
                    type="time"
                    v-model="horaInicio"
                    label="Hora Inicio"
                    :error-messages="errors.collect('horaInicio')"
                    v-validate="'required'"
                    data-vv-name="horaInicio"
                    item-text="name"
                    required
                  ></v-text-field>
                </v-flex>
              </v-layout>
            </v-stepper-content>

            <v-stepper-step editable step="2">
              {{ dateFinal }} {{ horaFinal }}
              <small>Atendimento Final</small>
            </v-stepper-step>
            <v-stepper-content step="2">
              <v-layout wrap align-center>
                <v-flex xs12 sm12 md3>
                  <span class="headline white--text">Atendimento Final</span>
                </v-flex>
                <v-flex xs7 sm7 md2>
                  <v-text-field outline 
                    type="date"
                    v-model="dateFinal"
                    label="Data"
                    :error-messages="errors.collect('dateFinal')"
                    v-validate="'required'"
                    data-vv-name="dateFinal"
                    item-text="name"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs5 sm5 md2>
                  <v-text-field outline 
                    type="time"
                    v-model="horaFinal"
                    label="Hora"
                    :error-messages="errors.collect('horaFinal')"
                    v-validate="'required'"
                    data-vv-name="horaFinal"
                    item-text="name"
                    required
                  ></v-text-field>
                </v-flex>
              </v-layout>

            </v-stepper-content>
          </v-stepper>
        </template>
        <v-container fluid grid-list-xl>
        <v-layout wrap align-center>
        <v-flex>
          <v-text-field solo 
            type="number"
            v-model="tempo"
            label="Tempo"
            :error-messages="errors.collect('tempo')"
            v-validate="''"
            data-vv-name="tempo"
            item-text="name"
            disabled
          ></v-text-field>
        </v-flex>
        </v-layout>
        </v-container>

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
  props: {
    data: {},
    filterKey: String
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      dialog: false,
      produto: null, modelo: '', numeracao:'', modelo:'', fabricante: null,
      categoria: null, plaqueta: '', dataFab: '', dataCompra: '', ativo: '',
      isLoading: false,
      progresso: '1',
      item:{},
    };
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
    loja()  {
      return store.getters.getLojaId(this.$route.params._id);
    },
    local()  {
      return store.getters.getLocalId(this.$route.params._local);
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
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []
      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          produto: this.produto.id,
          tag: this.produto.tag,
          name: this.produto.name,
          modelo: this.modelo,
          numeracao: this.numeracao,
          fabricante: this.fabricante.id,
          fabricanteNick: this.fabricante.nick,
          proprietario: this.loja.id,
          proprietarioNick: this.loja.nick,
          proprietarioLocal: this.local.id,
          categoria: this.categoria.id,
          plaqueta: this.plaqueta,
          dataFab: this.dataFab,
          dataCompra: this.dataCompra,
          ativo: this.ativo
        };
        console.log(postData);
        this.$http.post('./config/api/apiBem.php?action=cadastrar', postData)
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
        });
      }
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