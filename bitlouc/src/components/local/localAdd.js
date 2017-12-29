Vue.component('local-add', {
  name: 'local-add',
  template: '#local-add',
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      tipo: '', regional: '', name: '', municipio: '', uf: '', coordenadas:'', ativa: '', 
      isLoading: false
    };
  },
  props: {
    title: { type: String, default: '' },
    message: { type: String, default: 'Confirm' },
    data: {}
  },
  computed: {
    tipos() {
      return store.state.tipos;
    },
    temErros () {
      return this.errorMessage.length > 0
    },
    temMessage () {
      return this.successMessage.length > 0
    }
  },
  created: function() {
    //this.carregarTipo();
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []
      if(this.formValido()){
        this.isLoading = true
        //const data = {'id': this.data.id, 'coordenadas': this.coordenadas
        //'cadastro': new Date().toJSON() }
        if(this.coordenadas.length < 16){
          this.coordenadas = '0.000000,0.000000'
        };
        var geoposicao = this.coordenadas .split(",");
        var postData = {
          loja: this.$route.params._id,
          tipo: this.tipo,
          regional: this.regional,
          name: this.name,
          municipio: this.municipio,
          uf: this.uf,
          latitude: geoposicao[0],
          longitude: geoposicao[1],
          ativo: '0'
        };
        //var formData = this.toFormData(postData);
        //console.log(postData);
        this.$http.post('./config/api/apiLocalFull.php?action=cadastrar', postData)
          .then(function(response) {
            //console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              setTimeout(() => {
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
    ehVazia () {
      if(this.tipo.length == 0 || this.name.length == 0 || this.municipio.length == 0 || this.uf.length == 0){
          this.errorMessage.push('Por favor, preencha os campos obrigatorio *')
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