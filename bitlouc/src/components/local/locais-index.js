var LocaisIndex = Vue.extend({
  name: 'locais-index',
  template: '#locais-index',
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
      return store.getters.getLocalLoja(this.$route.params._id);
    },
  },
  methods: {
    
    // Bu metot http post ile formdan alınan verileri apiye iletir
    // Apiden dönen cevap users dizisine push edilir
  }
});