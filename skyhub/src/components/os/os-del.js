Vue.component('os-del', {
  name: 'os-del',
  template: '#os-del',
  props: {
    data: Object
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
      return store.getters.getLojaId(this.$route.params._id);
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
      this.$store.dispatch("findOs").then(() => {
        console.log("Atualizando dados OS!")
      });
    }
  },
});