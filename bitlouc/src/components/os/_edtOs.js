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
      item:{},
      isLoading: false,
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
      return store.getters.getLojaId(this.$route.params._id);
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
        this.isLoading = true
        var postData = {
          osId: this.data.id,
          local: this.data.local.id,
          bem: this.data.bem,
          categoria: this.data.categoria.id,
          servico: this.data.servico.id,
          tipoServ: this.data.servico.tipo,
          data: this.data.data,
          dtUltimoMan: this.data.dtUltimoMan,
          ativo: this.data.ativo
        };
        //var formData = this.toFormData(postData);
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=osEdt', postData)
          .then(function(response) {
            //console.log(response);
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
      if(!this.data.servico) this.errorMessage.push("Serviço necessário.");
      if(!this.data.data) this.errorMessage.push("Data necessário.");
      if(!this.data.ativo) this.errorMessage.push("Ativo necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    addCategoria: function () {
      if( this.data ) {
        this.categoria = this.data.bem.categoria;
        this.bem = this.data.id;
      }
    }
  },
});