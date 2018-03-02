var Lojas = Vue.extend({
  template: '#lojas',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      active: '0',
      gridColumns: ['displayName', 'name'],
      search:'',
      modalLojaAdd: false
    };
  },
  created() {
  },
  computed: {
    proprietario() {
      return store.state.proprietario;
    },
    osProprietario() {
      return store.state.osProprietario;
    },
    lojas() {
      return store.state.lojas;
    },
  },
  methods: {
    onAtualizar: function(){
      this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
        console.log("Buscando dados das locais!")
      });
    }
  }
});
  