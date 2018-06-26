
Vue.component('is-login', {
    name: 'is-login',
    template: '#is-login',

  data: function () {
    return {
      drawer: null,
      errorMessage: '',
      successMessage: '',
      novo: false,
      dialog: true,
    };
  },
  mounted () {
  },
  computed: {
    user() {
      return store.state.user;
    },    
    ...Vuex.mapGetters(["isLoggedIn"])
  },
  watch: {
    // sempre que a pergunta mudar, essa função será executada
  },
  methods: {

  }
});