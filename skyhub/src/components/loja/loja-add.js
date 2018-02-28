Vue.component('loja-add', {
  name: 'loja-add',
  template: '#loja-add',
  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      item:{},
      nick:'', name:'', proprietario:'', grupo:'', seguimento:'', data:'', ativo:'0', categoria: []
    }
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    proprietarios() {
      return store.state.proprietario;
    },
    seguimentos() {
      return store.state.seguimentos;
    },
    grupos() {
      return store.state.grupos;
    },
    categorias() {
      return store.state.categorias;
    },
  },
  methods: {
    saveItem: function() {
      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          nick: this.nick,
          name: this.name,
          grupoLoja: this.grupoLoja,
          seguimento: this.seguimento,
          data: this.data,
          ativa: this.ativa
        };
        //console.log(postData);
        this.$http.post('./config/api/apiUser.php?action=registrar', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage.push(response.data.message);
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
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
      if(!this.name) this.errorMessage.push("Nome necessário.");
      if(!this.nick) this.errorMessage.push("Nome Fantasia necessário.");
      if(!this.grupo) this.errorMessage.push("Grupo necessário.");
      if(!this.seguimento) this.errorMessage.push("Seguimento necessário.");
      if(!this.categoria) this.errorMessage.push("categoria necessária.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    addNewTodo: function () {
      this.categoria.push(this.item)
      this.item = {}
    }
  }
});