<template id="configuracao">
  <div>
    
  </div>
</template>

<script>
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
    this.$store.dispatch("fetchIndex").then(() => {
      console.log("Buscando dados para inicial!")
    });
    this.$store.dispatch("findOs").then(() => {
      console.log("Buscando dados OS!")
    });
  }
});

</script>