<template id="os-del">
  <div>
    <v-dialog v-model="dialog" persistent scrollable max-width="500px">
      <v-card>
        <v-card-title color="primary">
          <span class="headline">OS Deletar</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>
          <v-form>
            <div v-if='data.bem'>
              <p>{{ data.bem.name }} - {{ data.bem.modelo }} <i class="fa fa-qrcode"></i> {{ data.bem.numeracao }} <i class="fa fa-fw fa-barcode"></i>{{ data.bem.plaqueta }}</p>
            </div>
            <h1 class="headline">{{ data.lojaNick }} | {{ data.local.tipo }} - {{ data.local.name }}</h1>
            <h2 class="headline">{{ data.categoria.name }}-{{ data.servico.name }}</h2>
            <h2 class="headline">{{ data.data }}</h2>
          </v-form>

        </v-card-text>
        <v-card-actions>
            <v-btn flat @click.stop="$emit('close')">Fechar</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="error" flat @click.stop="deletarItem()">Deletar</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
Vue.component('os-del', {
  name: 'os-del',
  template: '#os-del',
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
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    loja()  {
      return store.getters.getLojaId(this.$route.params._loja);
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

  methods: {
    deletarItem: function(data) {
      if(confirm('Deseja realmente deletar ' + this.data.local.name +' - '+ this.data.data +'?')){
        this.isLoading = true
        var postData = {
          osId: this.data.id
        };
        console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=osDel', postData).then(function(response) {
          console.log(response);
          if(response.data.error){
            this.errorMessage.push( response.data.message);
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.atualizacao();
            setTimeout(() => {
              this.$emit('close');
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
    dataT() {
      var datetime = new Date().toLocaleString();
      var res = datetime.split(" ");
      var date = res[0].split("/");
      var time = res[1].slice(0, -3);
      var dtTime = date[2] + "-" + date[1] + "-" + date[0];
      this.dataOs = dtTime;
    },
    atualizacao: function () {
      this.$store.dispatch("fetchOs").then(() => {
        console.log("Atualizando dados OS!")
      });
    }
  },
});

</script>