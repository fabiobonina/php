<template id="os-add">
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
        <v-card-text>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>
          <v-container grid-list-md>
            <v-layout wrap>
            <span class="headline">{{ local.tipo }} {{ local.name }}</span>
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
            </v-layout>
          </v-container>
          <small>*indica campo obrigatório</small>

        </v-card-text>

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
      title: 'Novo Antendimento',
      isLoading: false,
      item:{},
      servico: null,
      dataOs: '',
      equipamento: null,
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
              proprietario_id: this.loja.proprietario_id,
              loja_id:          this.loja.id,
              loja_nick:        this.loja.nick,
              local_id:         this.local.id,
              uf:               this.local.uf,
              equipamento_id:   this.equipamento,
              categoria_id:     this.categoria.id,
              servico_id:       this.servico.id,
              servico_tipo:     this.servico.tipo,
              data:             this.dataOs,
              dtCadastro:       new Date().toJSON(),
              ativo:            '0',
              id:               ''
            };
            //var formData = this.toFormData(postData);
            console.log(postData);
            this.$http.post('./config/api/apiOs.php?action=publish', postData)
            .then(function(response) {
              console.log(response);
              if(response.data.error){
                this.errorMessage.push(response.data.message);
                this.isLoading = false;
              } else{
                this.successMessage.push(response.data.message);
                this.atualizacao();
                this.isLoading = false;
                setTimeout(() => {
                  this.$router.push('/')
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
      this.$store.dispatch("fetchOs").then(() => {
        console.log("Atualizando dados OS!")
      });
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.servico) this.errorMessage.push("Serviço necessário.");
      if(!this.dataOs) this.errorMessage.push("Data necessário.");
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
        this.equipamento = this.data.id;
      }
    }
  },
});

</script>