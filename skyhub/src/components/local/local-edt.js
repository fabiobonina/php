Vue.component('local-edt', {
  name: 'local-edt',
  template: '#local-edt',
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      tipo: '', regional: '', name: '', municipio: '', uf: '', coordenadas:'', ativo: '0', 
      isLoading: false
    };
  },
  props: {
    title: { type: String, default: '' },
    message: { type: String, default: 'Confirm' },
    data: {}
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    tipos() {
      return store.state.tipos;
    },
  },
  created: function() {
    //this.carregarTipo();
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []
      if(this.checkForm()){
        this.isLoading = true
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
          ativo: this.ativo
        };
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
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.tipo) this.errorMessage.push("Tipo necessário.");
      if(!this.name) this.errorMessage.push("Nome necessário.");
      if(!this.municipio) this.errorMessage.push("Municipio necessário.");
      if(!this.uf) this.errorMessage.push("Grupo necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    addNewTodo: function () {
      this.categoria.push(this.item)
      this.item = {}
    }
  },
});