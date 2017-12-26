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
    onClose: function(){
      this.modalBemAdd = false;
    },
    onAtualizar: function(){
      this.dadosLojas();
    },
    selecItem: function(data){
      this.modalItem = data;
    },
  },
});