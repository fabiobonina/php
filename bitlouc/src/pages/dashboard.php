<template id="dashboard">
  <div>
    <os-statusec></os-statusec>
    <vue-map></vue-map> 
  </div>
</template>

<?php require_once 'src/components/local/maps.php';?>
<?php require_once 'src/components/os/osStatusTec.php';?>

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



