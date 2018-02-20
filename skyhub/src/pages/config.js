Vue.component('configuracao', {
  name: 'configuracao',
  template: '#configuracao',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
    };
  },
  created: function() {
    this.$store.dispatch("fetchConfig").then(() => {
      console.log("Buscando dados das Configurações!")
    });
  }
});