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
      this.carregarConfig();
    },
    computed: {
      dados() {
        //return store.state.lojas;
      },
    },
    methods: {
      // Bu metot http get ile api üzerinden kayıtları users dizisine push eder
      carregarConfig: function() {
        this.$http.get('./config/api/apiConfigFull.php?action=config')
          .then(function(response) {
            if(response.data.error){
              this.errorMessage = response.data.message;
            } else{
              //console.log(response.data);
              this.$store.dispatch('setTipos', response.data.tipos);
              this.$store.dispatch('setProdutos', response.data.produtos);
              this.$store.dispatch('setCategorias', response.data.categorias);
              this.$store.dispatch('setFabricantes', response.data.fabricantes);
            }
          })
          .catch(function(error) {
            console.log(error);
          });
      },
    }
  });