Vue.component('local-add', {
  name: 'local-add',
  template: '#local-add',
  data() {
    return {
      errors: [],
      sucessos: [],
      tipo: '', regional: '', name: '', municipio: '', uf: '', coordenadas:'', ativa: '', 
      isLoading: false,
      tipos: []
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
    },
    concluido () {
      return this.sucessos.length > 0
    }
  },
  created: function() {
    this.carregarTipo();
  },
  methods: {
    saveItem: function(){
      this.errors = []
      if(this.formValido()){
        this.isLoading = true
        //const data = {'id': this.data.id, 'coordenadas': this.coordenadas
            //'cadastro': new Date().toJSON() }
        var postData = {
          loja: this.$route.params._id,
          tipo: this.tipo,
          regional: this.regional,
          name: this.name,
          municipio: this.municipio,
          uf: this.uf,
          coordenadas: this.coordenadas,
          ativa: 0
        };
        this.$http.post('./config/api/apiConfigFull.php?action=cadastrar', postData)
          .then(function(response) {
            if(response.data.error){
              this.errors.push(response.data.error);
              this.isLoading = false;
            } else{
              this.sucessos.push(response.data.status);
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
    carregarTipo: function() {
      this.$http.get('./config/api/apiConfigFull.php?action=tipo')
        .then(function(response) {
          if(response.data.error){
            this.errorMessage = response.data.message;
          } else{
            //console.log(response.data.dados);
            this.tipos = response.data.dados;
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    /*beforeLeave: function() {
      this.$emit('unsupportedBrowser')
    },*/
    ehVazia () {
      if(this.tipo.length == 0 || this.name.length == 0 || this.municipio.length == 0 || this.uf.length == 0){
          this.errors.push('Por favor, preencha os campos obrigatorio *')
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