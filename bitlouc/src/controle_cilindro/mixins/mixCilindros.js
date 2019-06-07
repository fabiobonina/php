var mixCilindro = {
  data: function () {
      return {
          errorMessage: [],
          successMessage: [],
          defaultItem: {
            loja:{},
            local : {},
            serie: '',
            fabricante: '',
            capacidade: {},
            dt_fabric: '',
            dt_validade: '',
            tara_inicial: '',
            tara_atual: '',
            condenado:    '0',
            status:       '0',
            ativo:        '0',
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
    /*getProgramacoes(){
        //store.commit('isLoading');
        this.$http.get('./config/api/cilProgramacao.api.php?action=read')
            .then(function(response) {
                console.log(response);
                //store.commit('isLoading');
                if(!response.data.error){
                    this.successMessage.push(response.data.message);
                    this.$store.dispatch("setCilProgramacoes", response.data.cilProgramacoes );
                } else{
                    this.errorMessage.push(response.data.message);                        
                }
            })
            .catch(function(error) {
                //store.commit('isLoading');
                this.errorMessage.push(error);
            }
        );
    },*/
    saveItem: function(){
      this.errorMessage = []
      this.$validator.validateAll().then((result) => {
        if (result && this.checkForm()) {
          var postData = this.defaultItem;
          //console.log(postData);
          this.$store.dispatch('publishCilindro', postData ).then(() => {
            this.atualizar();
          })
          .catch(function(error) {
            console.log(error);
          });
          /*this.$http.post('./config/api/api.cilindroProg.php?action=publish', postData).then(function(response) {
            //console.log(response);
            if(!response.data.error){
                this.successMessage.push(response.data.message);
                //store.commit('isLoading');
                setTimeout(() => {
                  this.$router.push('/programacao/'+response.data.id)
                  this.$emit('close');
                }, 2000);
              } else{
                this.errorMessage.push(response.data.message);
                //store.commit('isLoading');
              }
          })
          .catch(function(error) {
            //store.commit('isLoading');
            console.log(error);
          });*/
        }
      });
    },
    close () {
      this.dialog = false;
      this.$emit('close');
    },
    atualizar: function(){
      setTimeout(() => {
        this.dialog = false;
        this.$emit('atualizar');
      }, 2000);
    },
    checkForm:function() {
      this.errorMessage = [];
      if( !this.defaultItem.loja )          this.errorMessage.push("Loja é necessário.");
      if( !this.defaultItem.fabricante )    this.errorMessage.push("Fabricante é necessário.");
      if( !this.defaultItem.capacidade )    this.errorMessage.push("Capacidade é necessário.");
      if( !this.defaultItem.serie )         this.errorMessage.push("N. Serie é necessário.");
      if( !this.defaultItem.dt_fabric )     this.errorMessage.push("Dt.Fabricação é necessário.");
      if( !this.defaultItem.tara_inicial )  this.errorMessage.push("Tara Inicial é necessário.");
      if(!this.errorMessage.length)   return true;
      //e.preventDefault();
    },
  },

}