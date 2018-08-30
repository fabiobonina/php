<template id="dashboard">
  <div>
    <vue-map></vue-map>
  </div>
</template>
<script>
var Dashboard = Vue.extend({
  name: 'dashboard',
  template: '#dashboard',
  props: {
    proprietario: String,
    nivel: String,
    grupo: String
  },
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      gridColumns: ['displayName', 'name']
    };
  },
  created: function() {

  },
  computed: {
    dados() {
      return store.state.lojas;
    },
  },
  methods: {
    
    // Bu metot http post ile formdan alınan verileri apiye iletir
    // Apiden dönen cevap users dizisine push edilir
  }
});

</script>

<?php require_once 'src/components/local/maps.php';?>

