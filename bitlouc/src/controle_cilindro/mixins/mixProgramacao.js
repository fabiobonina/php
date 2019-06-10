var mixProgramacao = {
  data: function () {
      return {
          errorMessage: [],
          successMessage: [],
          defaultItem: {
            loja:{},
            local : {},
            dt_programacao: new Date().toISOString().substr(0, 10),
            demanda: [],
          },
      };
  },
  created: function() {
      //this.getProgramacoes();
  },
  computed: {
      /*programacoes() {
          return this.$store.state.cilProgramacao;
      }*/
  }, // computed
  methods: {
    saveItem: function(){
      this.errorMessage = []
      this.$validator.validateAll().then((result) => {
        if (result && this.checkForm()) {
          this.errorMessage = [];
          var postData = {
            loja:           this.defaultItem.loja,
            local:          this.defaultItem.local,
            dt_programcao:  this.defaultItem.dt_programacao,
            demanda:        this.defaultItem.demanda,
            id:             this.defaultItem.id
          };
          //this.publishItem(this.defaultItem);
          this.$store.dispatch('publishCilindro', postData ).then(() => {
            this.successMessage.push(response.data.message);
            this.atualizar();
          })
          .catch(function(error) {
            console.log(error);
          });
          /*this.$http.post('./config/api/cilindro.api.php?action=publish', postData).then(function(response) {
            console.log(response);
            if(!response.data.error){
                this.successMessage.push(response.data.message);
                store.commit('isLoading');
                setTimeout(() => {
                  this.$router.push('/programacao/'+response.data.id)
                  this.$emit('close');
                }, 2000);
              } else{
                this.errorMessage.push(response.data.message);
                store.commit('isLoading');
              }
          })
          .catch(function(error) {
            store.commit('isLoading');
            console.log(error);
          });*/
        }
      });
    },
    close: function() {
      this.dialog = false;
      this.$emit('close');
    },
    atualizar: function(){
      setTimeout(() => {
        this.dialog = false;
        this.$emit('atualizar');
      }, 2000);
    },
    checkForm: function() {
      this.errorMessage = [];
      if( !this.defaultItem.loja )            this.errorMessage.push("Loja é necessário.");
      if( !this.defaultItem.local )           this.errorMessage.push("Local é necessário.");
      if( !this.defaultItem.dt_programacao )  this.errorMessage.push("DtProgramacao é necessário.");
      if( !this.defaultItem.demanda )         this.errorMessage.push("Demanda é necessário.");
      if(!this.errorMessage.length)   return true;
      //e.preventDefault();
    },
  },

}