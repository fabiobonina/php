var mixItem = {
  data: function () {
      return {
          errorMessage: [],
          successMessage: [],
          defaultItem: {
            loja:{},
            local : {},
            dt_programacao: new Date().toISOString().substr(0, 10),
            demanda: [],
            status: '0',
            id: '',
          },
      };
  },
  created: function() {
      //this.getProgramacoes();
  },
  computed: {
      /*programacoes() {
          return this.$store.getters.cilProgramacao;
      }*/
  }, // computed
  methods: {
    saveItem: function(){
      this.errorMessage = []
      this.$store.commit('isLoading');
      this.$validator.validateAll().then((result) => {
        if (result && this.checkForm()) {
          this.errorMessage = [];
          var postData = {
            loja_id:        this.defaultItem.loja.id,
            local_id:       this.defaultItem.local.id,
            dt_programacao:  this.defaultItem.dt_programacao,
            status:         this.defaultItem.status,
            demanda:        this.defaultItem.demanda,
            id:             this.defaultItem.id
          };
          //this.publishItem(this.defaultItem);
          /*this.$store.dispatch('publishCilindro', postData ).then(() => {
            this.successMessage.push(response.data.message);
            this.atualizar();
          })
          .catch(function(error) {
            console.log(error);
          });*/
          //console.log(postData);
          this.$http.post('./config/api/cilProgramacao.api.php?action=publish', postData).then(function(response) {
            //console.log(response);
            this.$store.commit('isLoading');
            if(!response.data.error){
                this.successMessage.push(response.data.message);                
                setTimeout(() => {
                  this.$router.push('/controle-cilindros/programacao/show/'+response.data.id)
                  this.$emit('close');
                }, 2000);
              } else{
                this.errorMessage.push(response.data.message);
              }
          })
          .catch(function(error) {
            this.$store.commit('isLoading');
            console.log(error);
          });
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