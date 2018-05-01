Vue.component('top', {
  name: 'top',
  template: '#top',
  data: function () {
    return {
      drawer: null,
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      modalUser: false,
      active: '0',
      dialog: true,
      dialog2: false,
      dialog3: false,        
      e1: true,
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
      ],
      password: ''
    };
  },
  created: function() {
    
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