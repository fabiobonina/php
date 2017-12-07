Vue.component('geolocalizacao', {
  name: 'geolocalizacao',
  template: '#geolocalizacao',
  data() {
    return {
      errors: [],
      geolocalizacao:'',
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
        return this.errors.length > 0
    }
  },
  methods: {
    saveItem: function(){
      this.errors = []
      if(this.formValido()){
        this.isLoading = true
        //const data = {'id': this.data.id, 'geolocalizacao': this.geolocalizacao
            //'cadastro': new Date().toJSON() }
        var postData = {id: this.data.id, geolocalizacao: this.geolocalizacao};
        this.$http.post('./config/api/apiLojaFull.php?action=geolocalizacao', postData)
          .then(function(response) {
            if(response.data.error){
              this.errors.push(response.data.error);
              this.isLoading = false;
            } else{
                this.$emit('close');
            }
          })
          .catch(function(error) {
            console.log(error);
          });
          //this.$store.state.create(data)
      }
    },
    /*beforeLeave: function() {
      this.$emit('unsupportedBrowser')
    },*/
    ehVazia () {
      if(this.geolocalizacao.length == 0){
          this.errors.push('Por favor, preencha todos os campos')
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