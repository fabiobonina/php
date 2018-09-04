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
          <v-toolbar-title>{{ loja.nick }}: {{ local.tipo }} - {{ local.name }}</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click.native="dialog = false">Save</v-btn>
          </v-toolbar-items>
        </v-toolbar>
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
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

        <div class="field">
          <label class="label">Produto</label>
          <div class="control">
            <div>
              <v-select label="name" v-model="produto" :options="produtos"></v-select>
            </div>
          </div>
        </div>
        <div class="field">
          <label class="label">Modelo</label>
          <div class="control">
            <input v-model="modelo" class="input" type="text" placeholder="Modelo">
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <div class="field">
              <label class="label">Numeração</label>
              <div class="control">
                <input v-model="numeracao" class="input" type="text" placeholder="Mumeração">
              </div>
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Plaqueta</label>
              <div class="control">
                <input v-model="plaqueta" class="input" type="text" placeholder="Plaqueta">
              </div>
            </div>
          </div>
        </div>
        <div class="field">
          <label class="label">Fabricante</label>
          <div class="control">
            <div>
              <v-select label="name" v-model="fabricante" :options="fabricantes"></v-select>
            </div>
          </div>
        </div>
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
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="saveItem()">Save</button>
      </footer>
    </div>
  </div>
      </v-card>
    </v-dialog>
  </v-layout>
  </div>

  <div>
    <v-dialog v-model="dialog" fullscreen hide-overlay persistent>
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click.stop="$emit('close')">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Atendimento</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click.stop="saveItem()">Salvar</v-btn>
          </v-toolbar-items>
        </v-toolbar>
      <v-stepper v-model="e1" light alt-labels>
        <v-stepper-header>
          <v-stepper-step :complete="e1 > 1" step="1">Trajeto</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 2" step="2">Serv. Inicio</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 3" step="3">Serv. Fim</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 4" step="4">Retorno</v-stepper-step>
        </v-stepper-header>

        <message v-if="temMessage" :success="successMessage" :error="errorMessage"></message>
        <loader :dialog="isLoading"></loader>
        <template>
          <!-- tecnicos -->
          <v-autocomplete multiple chips return-object max-height="auto"
            :items="data.tecnicos" v-model="tecnicos" label="Tecnicos" item-text="userNick"
            :error-messages="errors.collect('tecnico')" v-validate="'required'" data-vv-name="tecnico" required>
            <template slot="selection" slot-scope="data">
              <v-chip :selected="data.selected" :key="JSON.stringify(data.item)" close
                class="chip--select-multi" @input="data.parent.selectItem(data.item)" >
                <v-avatar>
                  <img :src="data.item.avatar">
                </v-avatar>
                {{ data.item.userNick }}
              </v-chip>
            </template>
            <template slot="item" slot-scope="data">
              <template v-if="typeof data.item !== 'object'">
                <v-list-tile-content v-text="data.item"></v-list-tile-content>
              </template>
              <template v-else>
                <v-list-tile-avatar>
                  <img :src="data.item.avatar">
                </v-list-tile-avatar>
                <v-list-tile-content>
                  <v-list-tile-title v-html="data.item.userNick"></v-list-tile-title>
                  <v-list-tile-sub-title v-html="data.item.email"></v-list-tile-sub-title>
                </v-list-tile-content>
              </template>
            </template>
          </v-autocomplete>
        </template>
        <v-stepper-items>
          <v-stepper-content step="1">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                    <span class="headline">Trajeto Inicial</span>
                  </v-flex>
                </v-layout>
              </v-card-title>
              <v-card-text align-center>
                <template>
                  <v-container grid-list-md>
                    <v-layout wrap>
                      <v-flex xs7 sm7 md7>
                        <v-text-field
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
                      <v-flex xs5 sm5 md5>
                        <v-text-field
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
                      <v-flex xs12 sm12 md12>
                        <km-desp :data="data"></km-desp>
                      </v-flex>
                    </v-layout>
                  </v-container>
                </template>
              </v-card-text>            
            </v-card>
            <template>
              <v-container grid-list-xl text-xs-center>
                <v-layout row wrap>
                  <v-flex xs12 >
                    <v-btn v-if="dateServInicio == ''" @click="servInicio()" color="primary" right> Continue </v-btn>
                    <v-btn v-else @click="e1 = 2" color="primary" right> Continue </v-btn>
                  </v-flex>
                </v-layout>
              </v-container>
            </template>
          </v-stepper-content>

          <v-stepper-content step="2">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                  <span class="headline">Inicio do Serviço</span>
                  </v-flex>
                </v-layout>
              </v-card-title>
              <v-card-text align-center>
                <template>
                  <v-container grid-list-md>
                    <v-layout wrap>
                      <v-flex xs7 sm7 md7>
                        <v-text-field
                          type="date"
                          v-model="dateServInicio"
                          label="Data"
                          :error-messages="errors.collect('dateServInicio')"
                          v-validate="'required'"
                          data-vv-name="dateServInicio"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs5 sm5 md5>
                        <v-text-field
                          type="time"
                          v-model="horaServInicio"
                          label="Hora"
                          :error-messages="errors.collect('horaServInicio')"
                          v-validate="'required'"
                          data-vv-name="horaServInicio"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs12 sm12 md12>
                        <km-desp :data="data"></km-desp>
                      </v-flex>
                    </v-layout>
                  </v-container>
                  <small>*indica campo obrigatório</small>
                </template>
              </v-card-text>            
            </v-card>
            <template>
              <v-container grid-list-xl text-xs-center>
                <v-layout row wrap>
                  <v-flex xs12 >
                    <v-btn v-if="dateServFinal == ''" @click="servFim()" color="primary" right>Continue</v-btn>
                    <v-btn v-else @click="e1 = 3" color="primary" right>Continue</v-btn>
                  </v-flex>
                </v-layout>
              </v-container>
            </template>
          </v-stepper-content>
          <v-stepper-content step="3">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                  <span class="headline">Final do Serviço</span>
                  </v-flex>
                </v-layout>
              </v-card-title>
              <v-card-text align-center>
                <template>
                  <v-container grid-list-md>
                    <v-layout wrap>
                      <v-flex xs7 sm7 md7>
                        <v-text-field
                          type="date"
                          v-model="dateServFinal"
                          label="Data"
                          :error-messages="errors.collect('dateServFinal')"
                          v-validate="'required'"
                          data-vv-name="dateServFinal"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs5 sm5 md5>
                        <v-text-field
                          type="time"
                          v-model="horaServFinal"
                          label="Hora"
                          :error-messages="errors.collect('horaServFinal')"
                          v-validate="'required'"
                          data-vv-name="horaServFinal"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs12 sm12 md12>
                        <km-desp :data="data"></km-desp>
                      </v-flex>
                    </v-layout>
                  </v-container>
                  <small>*indica campo obrigatório</small>
                </template>
              </v-card-text>            
            </v-card>
            <template>
              <v-container grid-list-xl text-xs-center>
                <v-layout row wrap>
                  <v-flex xs12>
                    <v-btn v-if="dateFinal == ''" @click="dialogStatusServFinal = true" color="primary" right>Continue</v-btn>
                    <v-btn v-else @click="e1 = 4" color="primary" right>Continue</v-btn>
                  </v-flex>
                </v-layout>
              </v-container>
            </template>
          </v-stepper-content>
          <v-stepper-content step="4">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                  <span class="headline">Atendimento Final</span>
                  </v-flex>
                </v-layout>
              </v-card-title>
              <v-card-text align-center>
                <template>
                  <v-container grid-list-md>
                    <v-layout wrap>
                      <v-flex xs7 sm7 md7>
                        <v-text-field
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
                      <v-flex xs5 sm5 md5>
                        <v-text-field
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
                      <v-flex xs12 sm12 md12>
                        <km-desp :data="data"></km-desp>
                      </v-flex>
                    </v-layout>
              </v-container>
              <small>*indica campo obrigatório</small>
                </template>
              </v-card-text>            
            </v-card>
            <template>
              <v-container grid-list-xl text-xs-center>
                <v-layout row wrap>
                  <v-flex xs12>
                    <v-btn @click="dialogStatusAtenFinal = true" color="primary" right>Continue</v-btn>
                  </v-flex>
                </v-layout>
              </v-container>
            </template>
          </v-stepper-content>
        </v-stepper-items>
        
        <template>
          <div class="text-xs-center">
            <v-dialog v-model="dialogStatusAtenInicio" hide-overlay persistent width="300">
              <v-card color="primary" dark>
                <v-card-text>
                  <span class="headline">Iniciar Trajeto ou Servio?</span>
                  <template>
                    <v-layout align-center>
                      <v-flex xs12 text-xs-center>
                        <div>
                          <v-btn @click="atendimento('1')" small color="cyan">Trajeto!</v-btn>
                          <v-btn @click="atendimento('2')" small color="success">Serviço!</v-btn>
                        </div>
                      </v-flex>
                    </v-layout>
                  </template>
                </v-card-text>
              </v-card>
            </v-dialog>
          </div>
        </template>
        <template>
          <div class="text-xs-center">
            <v-dialog v-model="dialogStatusServFinal" hide-overlay persistent width="300">
              <v-card color="primary" dark>
                <v-card-text>
                  <template>
                    <v-layout row wrap align-center>
                      <p class="text-xs-center headline">Escolhar o Status do Final do Serviço</p>
                      <v-flex xs12 sm12 v-for="item in statusServFinal" :key="item.id">
                        <v-btn block color="cyan" @click="atendimento(tem.status)">
                          <span>{{item.name }}</span>
                        </v-btn>
                      </v-flex>
                    </v-layout>
                  </template>
                </v-card-text>
              </v-card>
            </v-dialog>
          </div>
        </template>
        <template>
          <div class="text-xs-center">
            <v-dialog v-model="dialogStatusAtenFinal" hide-overlay persistent width="300">
              <v-card color="primary" dark>
                <v-card-text>
                  <template>
                    <v-layout row wrap align-center>
                      <p class="text-xs-center headline">Escolhar o Status Final</p>
                      <v-flex xs12 sm12 v-for="item in statusAtenFinal" :key="item.id">
                        <v-btn block color="cyan" @click="atendimento(tem.status)">
                          <span>{{item.name }}</span>
                        </v-btn>
                      </v-flex>
                    </v-layout>
                  </template>
                </v-card-text>
              </v-card>
            </v-dialog>
          </div>
        </template>
      </v-stepper>
      </v-card>
    </v-dialog>
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