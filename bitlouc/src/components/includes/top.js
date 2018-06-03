Vue.component('top', {
  name: 'top',
  template: '#top',
  data: function () {
    return {
      drawer: null,
      errorMessage: '',
      successMessage: '',
      modalUser: false,
      admins: [
        {name:'OSs', icon:'people_outline'},
        ['Settings', 'settings']
      ],
      cruds: [
        ['Create', 'add'],
        ['Read', 'insert_drive_file'],
        ['Update', 'update'],
        ['Delete', 'delete']
      ],
      home: [
        { title: 'Home',  router: '/', icon: 'home' },
        { title: 'OSs',   router: '/oss', icon: 'build' },
        { title: 'Lojas', router: '/lojas', icon: 'store' },
      ],
      items: [
        { title: 'Proprietario',  router: '', icon: 'dashboard' },
        { title: 'Config',        router: '/config', icon: 'settings' }
      ],
    };
  },
  created: function() {
    
  },
  computed: {
    user() {
      return store.state.user;
    },
    isLoggedIn() {
      return store.state.isLoggedIn;
    },    
    //...Vuex.mapGetters(["isLoggedIn"])
  },
  watch: {
    // sempre que a pergunta mudar, essa função será executada
  },
  methods: {
    atualizar(){
      this.isLoggedIn
    }
  }
});