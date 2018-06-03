Vue.component('proprietario-top', {
  name: 'proprietario-top',
  template: '#proprietario-top',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      router: [
        { title: 'Locais', router: '', icon: 'store' },
        { title: 'Lojas', router: 'lojas', icon: 'trending_up' },
        { title: 'Bens', router: 'bens', icon: 'person' },
      ],
      model: 'tab-2',
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
  