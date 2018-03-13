Vue.component('deslocamento-add', {
  name: 'deslocamento-add',
  template: '#deslocamento-add',
  props: {
    data: Object
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      dtDesloc: '',
      status: {},
      tipo: { id: 0 },
      km: '',
      status: Number(this.data.processo)+1, dtInicio: '', kmInicio:'', dtFinal: '', kmFinal:'',  dtDesloc: '', valor: '', tempo: '',
      tecnicos: null,
      isLoading: false,
    };
  },
  
  created: function() {
    this.dataT()
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    deslocTipos() {
      return store.state.deslocTipos;
    },
    deslocStatus() {
      return store.state.deslocStatus;
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
    },
    tipoPercurso(){
      if(this.tipo.id == 0 ){
          return false
      }
      return true
    },
    dataT() {
      var datetime = new Date().toLocaleString();
      var res = datetime.split(" ");
      var date = res[0].split("/");
      var time = res[1].slice(0, -3);
      var dtTime = date[2] + "-" + date[1] + "-" + date[0] + "T" + time;
      this.dtInicio = dtTime;
      this.dtFinal = dtTime;
    }
  },
});