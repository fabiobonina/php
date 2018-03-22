Vue.component('nota-add', {
  name: 'nota-add',
  template: '#nota-add',
  props: {
    data: {}
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      descricao:'OCORRENCIA: CAUSA: SOLUCAO: PECAS: ALIMENTACAO: HOSPEDAGEM: ETC:',
      causa:'CAUSA',
      isLoading: false
    };
  },
  computed: {
    temMessage() {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    _os() {
      return store.getters.getOsId(this.data.id);
    },
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []

      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          os: this.data.id,
          descricao: this.descricao,
        };
        //var formData = this.toFormData(postData);
        console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=osNotaAdd', postData)
          .then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.atualizacao();
              this.isLoading = false;
              setTimeout(() => {
                this.errorMessage = [];
                this.successMessage = [];
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
      if(!this.descricao){
        this.errorMessage.push("Nota necessário.");
      } else if(this.descricao.length < 100) {
        this.errorMessage.push("Descrição curta.");
      }
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    atualizacao: function(){
      this.$store.dispatch("fetchOs").then(() => {
        console.log("Atualizando dados OS!")
      });
    },
  },
});