Vue.component('deslocamento-add', {
  name: 'deslocamento-add',
  template: '#deslocamento-add',
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      coordenadas:'',
      dtDesloc: new Date().toJSON(),
      isLoading: false
    };
  },
  props: {
    title: { type: String, default: '' },
    message: { type: String, default: 'Confirm' },
    data: {}
  },
  computed: {
    temErros () {
      return this.errorMessage.length > 0
    },
    temMessage () {
      if(this.errorMessage.length > 0){
        return true
      }
      if(this.successMessage.length > 0){
        return true
      }
      return false
    },
    tipoDeslocamentos() {
      return store.state.tipoDeslocamentos;
    },
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []
      if(this.formValido()){
        this.isLoading = true
        //const data = {'id': this.data.id, 'geolocalizacao': this.geolocalizacao
        //'cadastro': new Date().toJSON() }
        var geoposicao = this.coordenadas .split(",");
        var postData = {
          id: this.data.id,
          latitude: geoposicao[0],
          longitude: geoposicao[1]
        };        
        this.$http.post('./config/api/apiLocalFull.php?action=coordenadas', postData)
          .then(function(response) {
            //console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              setTimeout(() => {
                this.$emit('atualizar');
              }, 2000);  
            }
          })
          .catch(function(error) {
            console.log(error);
          });
      }
    },
    ehVazia () {
      if(this.coordenadas.length == 0){
          this.errorMessage.push('Por favor, preencha todos os campos')
          return true
      }
      if(this.coordenadas.length < 17){
        this.errorMessage.push('Coordenadas incorretas')
        return true
      }
      return false
    },
    formValido(){
        if(this.ehVazia()){
            return false
        }
        return true
    }
  },
});