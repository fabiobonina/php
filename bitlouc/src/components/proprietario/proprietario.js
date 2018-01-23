var List = Vue.extend({
  template: '#list',
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
    lojas() {
      return store.state.lojas;
    },
  },
  methods: {
  }
});
  