Vue.component('loja-del', {
  name: 'loja-del',
  template: '#loja-del',
  props: {
    data: Object
  },
  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
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
    deletarItem: function() {
      if(confirm('Deseja realmente deletar ' + this.data.nick + '?')){
        this.isLoading = true
        var postData = {
          id: this.data.id
        };
        //console.log(postData);
        this.$http.post('./config/api/apiLoja.php?action=deletar', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage = response.data.message;
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.$store.dispatch("fetchIndex").then(() => {
              console.log("Atualizado lojas!")
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
    }
  }
});