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
      itemsLojas: [
        { title: 'Lojas', router: '#/lojas', icon: 'dashboard' },
        { title: 'Localidades', router: '#/localidades', icon: 'settings' }
      ],
      items: [
        { title: 'OsLojas', router: '#/oss', icon: 'dashboard' },
        { title: 'OSsTec', router: '#/oss/oss-tec', icon: 'settings' },
        { title: 'OSsStatus', router: '#/oss/oss-status', icon: 'settings' }
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