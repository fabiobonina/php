var Locais = Vue.extend({
  name: 'locais',
  template: '#locais',
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
      modalLocalAdd: false,
      gridColumns: ['displayName', 'name']
    };
  },
  created: function() {
    
  },
  computed: {
    dados() {
      return store.state.lojas;
    },
    locais()  {
      return store.getters.getLocalLoja(this.$route.params._id);
    },
  },
  methods: {
    
    // Bu metot http post ile formdan alınan verileri apiye iletir
    // Apiden dönen cevap users dizisine push edilir
  }
});