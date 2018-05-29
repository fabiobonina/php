Vue.component('local-edt', {
  name: 'local-edt',
  template: '#local-edt',
  $_veeValidate: {
    validator: 'new'
  },
  props: {
    data: Object,
    dialog: Boolean
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      coordenadas: this.data.latitude +','+ this.data.longitude,
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
    tipos() {
      return store.state.tipos;
    },
  },
  methods: {
    saveItem: function(){
      this.$validator.validateAll().then((result) => {
        if (result) {
      this.errorMessage = []
      if(this.checkForm()){
        this.isLoading = true
        if(this.coordenadas.length < 16){
          this.coordenadas = '0.000000,0.000000'
        };
        var geoposicao = this.coordenadas .split(",");
        var postData = {
          id: this.data.id,
          tipo: this.data.tipo,
          regional: this.data.regional,
          name: this.data.name,
          municipio: this.data.municipio,
          uf: this.data.uf,
          latitude: geoposicao[0],
          longitude: geoposicao[1],
          ativo: this.data.ativo
        };
        //console.log(postData);
        this.$http.post('./config/api/apiLocal.php?action=editar', postData)
          .then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
                console.log("Atulizando dados das localidades!")
              });
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
      }}
    });
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.data.tipo) this.errorMessage.push("Tipo necessário.");
      if(!this.data.name) this.errorMessage.push("Nome necessário.");
      if(!this.data.municipio) this.errorMessage.push("Municipio necessário.");
      if(!this.data.uf) this.errorMessage.push("Grupo necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    addNewTodo: function () {
      this.categoria.push(this.item)
      this.item = {}
    }
  },
});