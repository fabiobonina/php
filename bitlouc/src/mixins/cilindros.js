var getProgramacao = {
    data: function () {
        return {
            isLoading: false,
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
            this.isLoading = true;
            this.$http.get('./config/api/api.cilindroProg.php?action=read')
                .then(function(response) {
                    console.log(response);
                    this.isLoading = false;
                    if(!response.data.error){
                        this.successMessage.push(response.data.message);
                        this.$store.dispatch("setCilProgramacoes", response.data.cilProgramacoes );
                    } else{
                        this.errorMessage.push(response.data.message);                        
                    }
                })
                .catch(function(error) {
                    this.isLoading = false;
                    this.errorMessage.push(error);
                }
            );
        },
    },

}