<template id="locais-index">
  <div>
    <grid-local :data="locais"></grid-local>
  </div>
</template>
<script>
  var LocaisIndex = Vue.extend({
    name: 'locais-index',
    template: '#locais-index',
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
        return store.getters.getLocalLoja(this.$route.params._id);
      },
    },
    methods: {
      
    }
  });

</script>

<?php require_once 'src/components/local/locais-grid.php';?>