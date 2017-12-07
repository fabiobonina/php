var List = Vue.extend({
    template: '#list',
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
      this.dadosLojas2(); // Başlangıçta kayıtları al
    },
    computed: {
      dados() {
        return store.state.lojas;
      },
      dados2() {
        return store.state.localidades;
      },
    },
    methods: {
      // Bu metot http get ile api üzerinden kayıtları users dizisine push eder
      dadosLojas: function() {
        this.$http.get('./config/api/apiLojaFull.php?action=read')
          .then(function(response) {
            if(response.data.error){
              this.errorMessage = response.data.message;
            } else{
              //console.log(response.data.dados);
              this.$store.dispatch('setLojas', response.data.dados);
            }
          })
          .catch(function(error) {
            console.log(error);
          });
      },
      dadosLojas2: function() {
        this.$http.get('./config/api/apiLocalidades.php?action=read')
          .then(function(response) {
            if(response.data.error){
              this.errorMessage = response.data.message;
            } else{
                this.$store.dispatch('setLocalidades', response.data.dados);
                //this.$router.push('/')
                //console.log(response.data.dados);
            }
          })
          .catch(function(error) {
            console.log(error);
          });
      },
      // Bu metot http post ile formdan alınan verileri apiye iletir
      // Apiden dönen cevap users dizisine push edilir
      onSubmit: function() {
        if (!this.name || !this.surname) {
          alert('Lütfen tüm alanları doldurunuz!');
          return false;
        }
        var postData = {name: this.name, surname: this.surname};
        this.$http.post('../api/api.php', postData)
          .then(function(response) {
            if (response.body.status == 'ok') {
              this.users.push(response.body.users);
            }
            this.name = '';
            this.surname = '';
          })
          .catch(function(error) {
            console.log(error);
          });
      }
    }
  });