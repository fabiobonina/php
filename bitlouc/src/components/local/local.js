var Local = Vue.extend({
  template: '#local',
  data: function () {
    return {
      product: this.$route.params._local,
      unsupportedBrowser: false,
      showModal: false
    };
  },
  created: function() {
    //this.dados2();
    this.dadosLojas();
  },
  computed: {
    dados()  {
      return store.getters.getTodoBy(this.$route.params._id);
    },
    //store.state.lojas // filteredItems
  }, // computed
  methods: {
    dados2: function() {
      if (!this.$route.params._id) {
        alert('Por favor, preencha todos os campos!');
        return false;
      }
      var postData = {lojaId: this.$route.params._id};
      this.$http.post('./config/api/apiLojaFull.php?action=loja', postData)
        .then(function(response) {
          if(response.data.error){
            this.errorMessage = response.data.message;
          } else{
              this.$store.dispatch('setLoja', response.data.dados);
              //this.$router.push('/')
              //console.log(response.data.dados);
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    dadosLojas: function() {
      this.$http.get('./config/api/apiLojaFull.php?action=read')
        .then(function(response) {
          if(response.data.error){
            this.errorMessage = response.data.message;
          } else{
              //console.log(response.data.dados);
              this.$store.dispatch('setLojas', response.data.dados);
              //this.$router.push('/')
              //this.users = response.data.users;
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    onAtualizar: function(){
      this.dadosLojas();
    },

  },
  beforeCreate () {
    this.loja = this.$route.params._id
  },
});