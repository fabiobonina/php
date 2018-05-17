var Oss = Vue.extend({
    template: '#oss',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
            active: '0',
            router: [
                { title: 'OS Lojas', router: '/oss', icon: 'store' },
                { title: 'OS Status', router: '/oss/os-status', icon: 'trending_up' },
                { title: 'Suas OS', router: '/oss/os-tec', icon: 'person' },
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