var Oss = Vue.extend({
    template: '#oss',
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