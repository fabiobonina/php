var OsStus = Vue.extend({
  template: '#os-status',
  name: 'os-status',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      ativo: '0',
      itens: [
        { name: 'sem Amaração', ativo: '0', icon: 'done' },
        { name: 'Abertas', ativo: '1', icon: 'done' },
        { name: 'Retornos', ativo: '2', icon: 'done' },
      ],
    };
  },
  created: function() {
    //this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
      //console.log("Buscando dados das locais!")
    //});
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    user()  {
      return store.state.user;
    },
    oss()  {
      return store.state.oss;
    },
    status()  {
      return store.state.status;
    }
  }, // computed
  methods: {
    status(item){
      this.$store.dispatch("setStatus", item );

    }
  },
});