var Home = Vue.extend({
  template: '#home',
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
    proprietario() {
      return store.state.proprietario;
    },
    osProprietario() {
      return store.state.osProprietario;
    },
    lojas() {
      return store.state.lojas;
    },
  },
  methods: {
  }
});
  