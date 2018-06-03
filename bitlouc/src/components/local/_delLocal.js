Vue.component('local-del', {
  name: 'local-del',
  template: '#local-del',
  props: {
    data: Object,
    dialog: Boolean
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [], 
      isLoading: false
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
  },
  methods: {
    deletarItem: function() {
      if(confirm('Deseja realmente deletar ' + this.data.tipo+'-'+ this.data.name + '?')){
        this.isLoading = true
        var postData = {
          id: this.data.id
        };
        //console.log(postData);
        this.$http.post('./config/api/apiLocal.php?action=deletar', postData).then(function(response) {
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
  },
});