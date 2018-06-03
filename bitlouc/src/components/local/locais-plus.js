var LocaisPlus = Vue.extend({
  name: 'locais-plus',
  template: '#locais-plus',
  props: {
  },
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
    };
  },
  created: function() {
    
  },
  computed: {
    locais()  {
      return store.state.locais;
    },
  },
  methods: {
    
    // Bu metot http post ile formdan alınan verileri apiye iletir
    // Apiden dönen cevap users dizisine push edilir
  }
});