var Proprietario = Vue.extend({
    template: '#proprietario',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
        };
    },
    created() {
    },
    computed: {
        osLojas() {
            return store.state.osLojas;
        },
    },
    methods: {
        
    }
});