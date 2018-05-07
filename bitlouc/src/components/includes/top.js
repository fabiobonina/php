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
        ['Management', 'people_outline'],
        ['Settings', 'settings']
      ],
      cruds: [
        ['Create', 'add'],
        ['Read', 'insert_drive_file'],
        ['Update', 'update'],
        ['Delete', 'delete']
      ]
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