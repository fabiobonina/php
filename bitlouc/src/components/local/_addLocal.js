Vue.component('local-add', {
  name: 'local-add',
  template: '#local-add',
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
      tipo: '', regional: '', name: '', municipio: '', uf: '', coordenadas:'', ativo: '0', categoria: [],
      item:{},
      isLoading: false,
      dictionary: {
        attributes: {
          name: 'Nome',
          nick: 'Nome Fantasia',
          // custom attributes
        },
        custom: {
        }
      }
    };
  },
  mounted () {
    this.$validator.localize('pt_BR', this.dictionary)
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
    categorias() {
      return store.state.categorias;
    },
  },
  methods: {
    saveItem: function(){
      this.$validator.validateAll().then((result) => {
        if (result) {
      this.errorMessage = []
      if(this.checkForm()){
        this.isLoading = true
        if(!this.coordenadas){
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
          ativo: this.ativo,
          categoria: this.categoria
        };
        //console.log(postData);
        this.$http.post('./config/api/apiLocal.php?action=cadastrar', postData)
          .then(function(response) {
            //console.log(response);
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
      } }
    });
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.tipo) this.errorMessage.push("Tipo necessário.");
      if(!this.name) this.errorMessage.push("Nome necessário.");
      if(!this.municipio) this.errorMessage.push("Municipio necessário.");
      if(!this.uf) this.errorMessage.push("UF necessário.");
      if(!this.ativo) this.errorMessage.push("Ativo necessário.");
      if(this.coordenadas.length > 0){
        if(this.coordenadas.length < 17) this.errorMessage.push('Coordenadas incorretas!');
      }
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    addNewTodo: function () {
      this.categoria.push(this.item)
      this.item = {}
    }
  },
});