Vue.component('os-add', {
  name: 'os-add',
  template: '#os-add',
  props: {
    data: {}
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
        console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=cadastrar', postData)
          .then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.$store.dispatch("fetchOs").then(() => {
                console.log("Atualizando dados OS!")
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
          //this.$store.state.create(data)
      }
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