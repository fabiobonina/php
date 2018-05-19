Vue.component('proprietario', {
  name: 'proprietario',
  template: '#proprietario',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',

    };
  },
  created() {
    this.$store.dispatch("fetchIndex").then(() => {
      console.log("Buscando dados para inicial!")
    });
    this.$store.dispatch("fetchOs").then(() => {
      console.log("Buscando dados OS!")
    });
  },
  computed: {
    user() {
      return store.state.user;
    },
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
  