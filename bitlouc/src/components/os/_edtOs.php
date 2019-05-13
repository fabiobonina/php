<template id="os-edt">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click="$emit('close')">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>{{ title }}</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn icon flat @click.native="saveItem()">
              <v-icon>mdi-content-save</v-icon>
            </v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-card-title>
          <span class="headline">{{ data.local_tipo }} - {{ data.local_name }}</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader></loader>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
                <div v-if="data.equipamento">
                <p>{{ data.equipamento.name }} - {{ data.equipamento.modelo }} <i class="fa fa-qrcode"></i> {{ data.equipamento.numeracao }} <i class="fa fa-fw fa-barcode"></i>{{ data.equipamento.plaqueta }}</p>
                </div>
                <div v-else>
                  <v-autocomplete
                    :items="categorias"
                    v-model="data.categoria_id"
                    item-text="name"
                    label="Cagetoria"
                    :error-messages="errors.collect('categoria_id')"
                    v-validate="'required'"
                    data-vv-name="categoria_id"
                    item-value="id"
                    required
                  ></v-autocomplete>
                </div>
              </v-flex>
              <v-flex xs12 sm6 md5>
                <v-text-field
                  type="date"
                  v-model="date"
                  label="Data"
                  :error-messages="errors.collect('date')"
                  v-validate="'required'"
                  data-vv-name="data"
                  item-text="name"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md7>
                <v-autocomplete
                  :items="servicos"
                  v-model="data.servico_id"
                  item-text="name"
                  label="Serviços"
                  :error-messages="errors.collect('servico_id')"
                  v-validate="'required'"
                  data-vv-name="servico_id"
                  item-value="id"
                  required
                ></v-autocomplete>
              </v-flex>

              <v-flex xs12 sm3>
                <v-subheader v-text="'Ativo?'"></v-subheader>
              </v-flex>
              <v-flex xs12 sm9>
                <v-radio-group v-model="data.ativo" row>
                  <v-radio label="Sim" value="0"></v-radio>
                  <v-radio label="Não" value="1"></v-radio>
                </v-radio-group>
              </v-flex>
            </v-layout>
          </v-container>
          <small>*indica campo obrigatório</small>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
Vue.component('os-edt', {
  name: 'os-edt',
  template: '#os-edt',
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
      title: 'Editar Ocorrecia',
      item:{},
      
      date: "",
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

      if(this.checkForm()){
        //store.commit('isLoading')
        var postData = {
          proprietario_id: this.data.proprietario_id,
          loja_id:        this.data.loja_id,
          loja_nick:      this.data.loja_nick,
          local_id:       this.data.local_id,
          uf:             this.data.uf,
          equipamento_id: this.data.equipamento_id,
          categoria_id:   this.data.categoria_id,
          servico_id:     this.data.servico_id,
          data:           this.date,
          dtCadastro:     this.data.dtCadastro,
          ativo:          this.data.ativo,
          id:             this.data.id
        };
        //var formData = this.toFormData(postData);
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=publish', postData)
          .then(function(response) {
            //console.log(response);
            if(!response.data.error){
              this.successMessage.push(response.data.message);
              this.$store.dispatch("findOs", this.data.id).then(() => {
                console.log("Atualizando dados OS!")
              });
              //store.commit('isLoading');
              setTimeout(() => {
                this.$emit('atualizar');
              }, 2000);  

              
            } else{
              this.errorMessage.push(response.data.message);
              //store.commit('isLoading');
            }
          })
          .catch(function(error) {
            console.log(error);
          });
          //this.$store.state.create(data)
      }
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.data.servico) this.errorMessage.push("Serviço necessário.");
      if(!this.data.data) this.errorMessage.push("Data necessário.");
      if(!this.data.ativo) this.errorMessage.push("Ativo necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    dataT: function () {
      function formatDate(data, formato) {
        if (formato == 'pt-br') {
          return (data.substr(0, 10).split('-').reverse().join('/'));
        } else {
          return (data.substr(0, 10).split('/').reverse().join('-'));
        }
      }
      this.date = formatDate(this.data.data);
    },
    addCategoria: function () {
      if( this.data ) {
        this.categoria = this.data.equipamento.categoria;
        this.equipamento = this.data.id;
      }
    }
  },
});
</script>