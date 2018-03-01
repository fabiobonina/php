Vue.component('loja-adt', {
  name: 'loja-adt',
  template: '#loja-adt',
  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      item:{},
      nick:'', name:'', grupo:'C', seguimento:'', ativo:'0', categoria: []
    }
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    proprietario() {
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
          grupo: this.grupo,
          seguimento: this.seguimento,
          categoria: this.categoria,
          proprietario: this.proprietario.id,
          ativo: this.ativo
        };
        //console.log(postData);
        this.$http.post('./config/api/apiLoja.php?action=cadastrar', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage = response.data.message;
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.$store.dispatch("fetchIndex").then(() => {
              console.log("Buscando dados para inicial!")
            });
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
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    addNewTodo: function () {
      this.categoria.push(this.item)
      this.item = {}
    }
  }
});