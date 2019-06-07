var mixCilindro = {
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
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
        getProgramacoes(){
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
        },
        saveItem: function(){
            this.errorMessage = []
            this.$validator.validateAll().then((result) => {
              if (result && this.checkForm()) {
                var postData = this.defaultItem;
                console.log(postData);
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
    },

}