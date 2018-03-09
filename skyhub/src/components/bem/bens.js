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
      gridColumns: ['displayName', 'name'],
      modalItem: null
    };
  },
  created: function() {
    
  },
  computed: {
    local()  {
      return store.getters.getLocalId(this.$route.params._local);
    },
    loja()  {
      return store.getters.getLojaId(this.$route.params._id);
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