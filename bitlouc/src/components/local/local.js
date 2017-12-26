var Local = Vue.extend({
  template: '#local',
  data: function () {
    return {
      unsupportedBrowser: false,
      searchQuery: '',
      modalBemAdd: false,
      modalItem: {},
    };
  },
  created: function() {
    //this.dados2();
    this.dadosLocal();
  },
  mounted: function() {
    this.modalBemAdd = true;
  },
  computed: {
    dados()  {
      return store.state.local;
    },
    dados2()  {
      return store.getters.getLocalId(this.$route.params._local);
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
    onClose: function(){
      this.modalBemAdd = false;
    },
    onAtualizar: function(){
      this.dadosLojas();
    },
    selecItem: function(data){
      this.modalItem = data;
    },

  },
  beforeCreate () {
    this.loja = this.$route.params._id
  },
});