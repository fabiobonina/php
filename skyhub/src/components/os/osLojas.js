Vue.component('os-lojas', {
    name: 'os-lojas',
    template: '#os-lojas',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
            active: '0',
            gridColumns: ['displayName', 'name']
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