<template id="locais-plus">
  <div>
    <grid-local :data="locais"></grid-local>
  </div>
</template>
<script>
  var LocaisPlus = Vue.extend({
    name: 'locais-plus',
    template: '#locais-plus',
    props: {
    },
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
      };
    },
    created: function() {
      this.$store.dispatch('fetchLocal' ).then(() => {
        console.log("Buscando locais")
      });
    },
    computed: {
      locais()  {
        return store.state.locais;
      },
    },
    methods: {
    }
  });
</script>

<?php require_once 'src/components/local/locais-grid.php';?>