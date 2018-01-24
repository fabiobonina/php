var Oss = Vue.extend({
  template: '#oss',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      gridColumns: ['nick', 'name'],
      modalLocalAdd: false,
      active: 1
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
    oss()  {
      return store.getters.getOssLoja(this.$route.params._id);
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