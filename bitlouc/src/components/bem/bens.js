var Bens = Vue.extend({
  name: 'bens',
  template: '#bens',
  props: {
    proprietario: String,
    nivel: String,
    grupo: String
  },
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      search: '',
      modalAdd: false,
      modalOs: false,
      active: '1',
      modalItem: null,
      itens: [
        { id:1, name: 'Operação', ativo: '1', icon: 'done' },
        { id:2, name: 'Instalação', ativo: '0', icon: 'done' },
        { id:3, name: 'Ocioso', ativo: '2', icon: 'done' },
      ],
    };
  },
  created: function() {
    
  },
  computed: {
    user()  {
      return store.state.user;
    },
    local()  {
      return store.getters.getLocalId(this.$route.params._local);
    },
    bens()  {
      return store.getters.getBensLocal(this.$route.params._local);
    },
  },
  methods: {
    
    // Bu metot http post ile formdan alınan verileri apiye iletir
    // Apiden dönen cevap users dizisine push edilir
  }
});