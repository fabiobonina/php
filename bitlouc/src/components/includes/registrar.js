Vue.use(VeeValidate)
Vue.component('is-login', {
  name: 'is-login',
  template: '#is-login',

  $_veeValidate: {
      validator: 'new'
  },

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
      name:'', email:'', emailR:'', user:'', password:'', passwordR:'',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
      ],
      password: '',
      dictionary: {
        attributes: {
          email: 'E-mail Address'
          // custom attributes
        },
        custom: {
          name: {
            required: () => 'Name can not be empty',
            max: 'The name field may not be greater than 10 characters'
            // custom messages
          },
          select: {
             required: 'Select field is required'
          }
        }
      }
    };
  },
  mounted () {
    this.$validator.localize('pt', this.dictionary)
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