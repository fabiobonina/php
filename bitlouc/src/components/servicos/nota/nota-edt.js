Vue.component('nota-edt', {
  name: 'nota-edt',
  template: '#nota-edt',
  props: {
    data: {},
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
          id: this.data.notas.id,
          descricao: this.data.notas.descricao,
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=osNotaEdt', postData)
          .then(function(response) {
            //console.log(response);
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
      if(!this.data.notas.descricao){
        this.errorMessage.push("Nota necessário.");
      } else if(this.data.notas.descricao.length < 70) {
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