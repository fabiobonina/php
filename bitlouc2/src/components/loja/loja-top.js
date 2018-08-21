Vue.component('loja-top',{
  template: '#loja-top',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      modalCat: false,
      active: 1,
      router: [
        { title: 'Locais', router: '', icon: 'store' },
        { title: 'OSs', router: '/oss', icon: 'trending_up' },
        { title: 'Bens', router: '/bens', icon: 'person' },
      ],
    };
  },
  created: function() {
    this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
      console.log("Buscando dados das locais!")
    });
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    loja()  {
      return store.getters.getLojaId(this.$route.params._id);
    },
    locais()  {
      return store.state.locais;
    },
  }, // computed
  methods: {
    onAtualizar: function(){
      this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
        console.log("Buscando dados das locais!")
      });
    }
  },
});