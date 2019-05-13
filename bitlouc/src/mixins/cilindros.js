var getProgramacao = {
    data: function () {
        return {
            
            errorMessage: '',
            successMessage: '',
        };
    },
    created: function() {
        this.getProgramacoes();
    },
    computed: {
        programacoes() {
            return store.state.cilProgramacao;
        }
    }, // computed
    methods: {
        getProgramacoes(){
            //store.commit('isLoading');
            this.$http.get('./config/api/api.cilindroProg.php?action=read')
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
    },

}