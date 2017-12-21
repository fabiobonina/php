Vue.component('index', {
  name: 'index',
  template: '#index',
  props: {
    proprietario: String,
    nivel: String,
    grupo: String
  },
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
        searchQuery: '',
        gridColumns: ['displayName', 'name']
      };
    },
    created: function() {
      this.dadosLojas();
    },
    computed: {
      dados() {
        return store.state.lojas;
      },
    },
    methods: {
      // Bu metot http get ile api üzerinden kayıtları users dizisine push eder
      dadosLojas: function() {
        this.$http.get('./config/api/apiProprietarioFull.php?action=read')
          .then(function(response) {
            if(response.data.error){
              this.errorMessage = response.data.message;
            } else{
              //console.log(response.data.dados);
              this.$store.dispatch('setProprietario', response.data.dados);
              this.$store.dispatch('setUser', response.data.user);
            }
          })
          .catch(function(error) {
            console.log(error);
          });
      },
      // Bu metot http post ile formdan alınan verileri apiye iletir
      // Apiden dönen cevap users dizisine push edilir
    }
  });