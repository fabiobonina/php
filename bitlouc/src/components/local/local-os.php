<template id="locais-data">
  <div>
    <grid-local :data="locais"></grid-local>
  </div>
</template>
<script>
  var LocaisData = Vue.extend({
    name: 'locais-data',
    template: '#locais-data',
    props: {
    },
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
      };
    },
    created: function() {
      
    },
    computed: {
      locais()  {
        return store.getters.getLocalLoja(this.$route.params._loja);
      },
    },
    methods: {
      
    }
  });

</script>

<?php require_once 'src/components/local/locais-grid.php';?>