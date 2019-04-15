
const comumMixins = {
    data: function () {
        return {
            isLoading: false,
            errorMessage: '',
            successMessage: '',
        };
    },
    computed: {
        temMessage () {
            if(this.errorMessage.length > 0) return true
            if(this.successMessage.length > 0) return true
            return false
        },
    }
}