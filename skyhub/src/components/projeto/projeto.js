var Projeto = Vue.extend({
    template: '#projeto',
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
        message: '',
        item: '',
      };
    },
    created() {
      this.$store.dispatch("fetchIndex").then(() => {
        console.log("Buscando dados para inicial!")
      });
      this.$store.dispatch("findOs").then(() => {
        console.log("Buscando dados OS!")
      });
    },
    computed: {
      user() {
        return store.state.user;
      },
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
      set_data : function(){
        console.log('set');
        localStorage.setItem( 'YourItem', this.message );
        this.item = this.get_data();
      },
      get_data : function(){
        console.log('get');
        return localStorage.getItem( 'YourItem' );
      },
      remove_data : function(){
        console.log('get');
        return localStorage.removeItem( 'YourItem' );
      }
    }
  });
    