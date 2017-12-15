var Local = Vue.extend({
  template: '#local',
  data: function () {
    return {
      unsupportedBrowser: false,
      showModal: false,
      searchQuery: '',
    };
  },
  created: function() {
    //this.dados2();
    this.dadosLocal();
  },
  computed: {
    dados()  {
      return store.state.local;;
    },
    //store.state.lojas // filteredItems
  }, // computed
  methods: {
    dadosLocal: function() {
      var postData = {
        idLocal: this.$route.params._local,
      };
      //var formData = this.toFormData(postData);
      //console.log(postData);
      this.$http.post('./config/api/apiLocalFull.php?action=read', postData)
        .then(function(response) {
          //console.log(response.data.dados);
          if(response.data.error){
            this.errorMessage = response.data.message;
          } else{
              //console.log(response.data.dados);
              this.$store.dispatch('setLocal', response.data.dados);
              //this.$router.push('/')
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    onAtualizar: function(){
      this.dadosLocal();
    },

  },
  beforeCreate () {
    this.loja = this.$route.params._id
  },
});