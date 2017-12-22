Vue.component('configuracao', {
  name: 'configuracao',
  template: '#configuracao',
  props: {
    proprietario: String,
    nivel: String,
    grupo: String
  },
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
      };
    },
    created: function() {
      this.dadosConfiguracao();
    },
    computed: {
      dados() {
        //return store.state.lojas;
      },
    },
    methods: {
      // Bu metot http get ile api üzerinden kayıtları users dizisine push eder
      carregarTipo: function() {
        this.$http.get('./config/api/apiConfigFull.php?action=config')
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
    }
  });