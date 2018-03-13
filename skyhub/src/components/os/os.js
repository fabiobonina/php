var Os = Vue.extend({
  template: '#os',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      search: '',
      modalItem: null,
      gridColumns: ['nick', 'name'],
      modalDeslocAdd: false,
      modalDescAdd: false,
      selectedCategoria: 'All',
      active: '1',
    };
  },
  created: function() {
    this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
      console.log("Buscando dados das locais!")
    });
  },
  mounted: function() {
    //this.modalDeslocAdd = true;
  },
  computed: {
    loja()  {
      return store.getters.getOsId(this.$route.params._id);
    },
    oss()  {
      return store.getters.getOsId(this.$route.params._os);
    },
  }, // computed
  methods: {
    onAtualizar: function(){
      this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
        console.log("Buscando dados das locais!")
      });
    },
    selecItem: function(data){
      this.modalItem = data;
    },
  },
});