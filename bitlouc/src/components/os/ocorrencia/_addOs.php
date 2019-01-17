<template id="os-add">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ local.tipo }} {{ local.name }} - Nova OS</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
                <div v-if="data">
                  <p>{{ data.name }} - {{ data.modelo }}, Code: {{ data.numeracao }}, Ativo: {{ data.plaqueta }}</p>
                </div>
                <div v-else>
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
              </v-flex>
              <v-flex xs12 sm6 md5>
                <v-text-field
                  type="date"
                  v-model="dataOs"
                  label="Data"
                  :error-messages="errors.collect('dataOs')"
                  v-validate="'required'"
                  data-vv-name="dataOs"
                  item-text="name"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md7>
                <v-autocomplete
                  :items="servicos"
                  v-model="servico"
                  item-text="name"
                  label="Serviços"
                  :error-messages="errors.collect('servico')"
                  v-validate="'required'"
                  data-vv-name="servico"
                  return-object
                  required
                ></v-autocomplete>
              </v-flex>
              
              <v-flex xs12>
                <v-autocomplete
                  :items="tecnicos"
                  v-model="tecnico"
                  label="Tecnico"
                  item-text="userNick"
                  multiple
                  chips
                  return-object
                  max-height="auto"
                  :error-messages="errors.collect('tecnico')" v-validate="'required'" data-vv-name="tecnico"
                  required
                >
                  <template slot="selection" slot-scope="data">
                    <v-chip
                      :selected="data.selected"
                      :key="JSON.stringify(data.item)"
                      close
                      class="chip--select-multi"
                      @input="data.parent.selectItem(data.item)"
                    >
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
              </v-flex>
              <v-flex xs12 sm3>
                <v-subheader v-text="'Ativo?'"></v-subheader>
              </v-flex>
              <v-flex xs12 sm9>
                <v-radio-group v-model="ativo" row>
                  <v-radio label="Sim" value="0"></v-radio>
                  <v-radio label="Não" value="1"></v-radio>
                </v-radio-group>
              </v-flex>
            </v-layout>
          </v-container>
          <small>*indica campo obrigatório</small>

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
Vue.component('os-add', {
  name: 'os-add',
  template: '#os-add',
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
      item:{},
      servico: null, tecnico: null, dataOs: '', ativo: '0',
      isLoading: false,
      bem: null,
      categoria: null
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
      return store.getters.getLojaId(this.$route.params._loja);
    },
    local()  {
      return store.getters.getLocalId(this.$route.params._local);
    },
    servicos() {
      return store.state.servicos;
    },
    tecnicos() {
      return store.state.tecnicos;
    },
    categorias() {
      return store.state.categorias;
    },
    filterServ: function () {
      var vm = this;
      var servicos = vm.servicos;
      if(vm.data === null) {
        return vm.servicos.filter(function(item) {
          return item.tipo == '0';
        });
      } else {
        return vm.servicos.filter(function(item) {
          return item.tipo > '0';
        });
      }
    }
  },
  created: function() {
    this.$store.dispatch('fetchProdutos').then(() => {
      console.log("Buscando dados dos produtos!")
    });
    this.dataT();
    this.addCategoria();
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []
      this.$validator.validateAll().then((result) => {
        if (result) {
          if(this.checkForm()){
            this.isLoading = true
            var postData = {
              loja: this.loja.id,
              lojaNick: this.loja.nick,
              local: this.local.id,
              bem: this.bem,
              categoria: this.categoria.id,
              servico: this.servico.id,
              tipoServ: this.servico.tipo,
              tecnicos: this.tecnico,
              data: this.dataOs,
              dtCadastro: new Date().toJSON(),
              estado: '0',
              processo: '0',
              status: '0',
              ativo: this.ativo
            };
            //var formData = this.toFormData(postData);
            //console.log(postData);
            this.$http.post('./config/api/apiOs.php?action=osAdd', postData)
            .then(function(response) {
              //console.log(response);
              if(response.data.error){
                this.errorMessage.push(response.data.message);
                this.isLoading = false;
              } else{
                this.successMessage.push(response.data.message);
                this.atualizacao();
                this.isLoading = false;
                setTimeout(() => {
                  this.$emit('close');
                }, 2000);  
              }
            })
            .catch(function(error) {
              console.log(error);
            });
              //this.$store.state.create(data)
          }
        }
      });
    },
    atualizacao: function(){
      this.$store.dispatch("findOs").then(() => {
        console.log("Atualizando dados OS!")
      });
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.servico) this.errorMessage.push("Serviço necessário.");
      if(!this.dataOs) this.errorMessage.push("Data necessário.");
      if(!this.tecnico) this.errorMessage.push("Tecnico necessário.");
      if(!this.ativo) this.errorMessage.push("Ativo necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    dataT() {
      var datetime = new Date().toLocaleString();
      var res = datetime.split(" ");
      var date = res[0].split("/");
      var time = res[1].slice(0, -3);
      var dtTime = date[2] + "-" + date[1] + "-" + date[0];
      this.dataOs = dtTime;
    },
    addCategoria: function () {
      if( this.data ) {
        this.categoria = this.data.categoria;
        this.bem = this.data.id;
      }
    }
  },
});

</script>