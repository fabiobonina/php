var Locais = Vue.extend({
  name: 'locais',
  template: '#locais',
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