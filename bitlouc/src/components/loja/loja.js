var Loja = Vue.extend({
  template: '#loja',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      gridColumns: ['nick', 'name'],
      modalLocalAdd: false,
      modalItem: {},
    };
  },
  created: function() {
    //this.dados2();
    //this.dadosLojas();
  },
  mounted: function() {
    //this.showModal = true;
  },
  computed: {
    loja()  {
      return store.getters.getLojaId(this.$route.params._id);
    },
    locais()  {
      return store.getters.getLocalLoja(this.$route.params._id);
    },
  }, // computed
  methods: {
    /*dados2: function() {
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
    },*/
    /*dadosLojas: function() {
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
    },*/
    onClose: function(){
      this.modalLocalAdd = false;
    },
    onAtualizar: function(){
      this.dadosLojas();
    },
    selecItem: function(data){
      this.modalItem = data;
    },
  },
});