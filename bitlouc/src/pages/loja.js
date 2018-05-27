var Loja = Vue.extend({
    template: '#loja',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
            active: '0',
            router: [
                { title: 'Locais', router: '', icon: 'store' },
                { title: 'OSs', router: '/loja-locais', icon: 'trending_up' },
                { title: 'Bens', router: '/loja-bens', icon: 'person' },
            ],
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