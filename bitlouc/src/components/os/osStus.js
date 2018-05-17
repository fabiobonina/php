var OsStus = Vue.extend({
  template: '#os-status',
  name: 'os-status',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      itens: [
        { id:1, name: 'sem Amaração', ativo: '0', icon: 'done' },
        { id:2, name: 'Abertas', ativo: '1', icon: 'done' },
        { id:3, name: 'Retornos', ativo: '2', icon: 'done' },
      ],
    };
  },
  created: function() {
    //this.$store.dispatch('setStatus', this.ativo);
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
    status: {
      // getter
      get: function () {
        return store.state.status;
      },
      // setter
      set: function (newValue) {
        var name = newValue
        this.$store.dispatch("setStatus", name );
      }
    }
  }, // computed
  methods: {
    setStatus(item){
      var name = item;
      this.$store.dispatch("setStatus", name );
    }
  },
});