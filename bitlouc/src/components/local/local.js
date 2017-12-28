var Local = Vue.extend({
  template: '#local',
  data: function () {
    return {
      unsupportedBrowser: false,
      searchQuery: '',
      modalBemAdd: false,
      modalItem: {},
    };
  },
  mounted: function() {
    this.modalBemAdd = true;
  },
  created: function() {
    this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
      console.log("Buscando dados das locais!")
    });
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
    //store.state.lojas // filteredItems
  }, // computed
  methods: {
    onAtualizar: function(){
      this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
        this.modalBemAdd = false;
      });
    },
    selecItem: function(data){
      this.modalItem = data;
    },
  },
});