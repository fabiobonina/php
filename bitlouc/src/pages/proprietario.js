var Proprietario = Vue.extend({
    template: '#proprietario',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
            active: '0',
            router: [
                { title: 'Lojas', router: '', icon: 'store' },
                { title: 'Locais', router: '/locais', icon: 'store' },
                { title: 'OSs', router: '/oss', icon: 'trending_up' },
                { title: 'Bens', router: '/loja-bens', icon: 'person' },
            ],
            model: 'tab-2',
            text: 'Lorem ipsum dolor '
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