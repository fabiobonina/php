Vue.component('index', {
  name: 'index',
  template: '#index',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
    };
  },
  created: function() {
    this.$store.dispatch("fetchIndex").then(() => {
      console.log("Buscando dados para inicial!")
    });
  }
});