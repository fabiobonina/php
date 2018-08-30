<template id="locais">
  <div>
    <top></top>
    <v-content>
      <loja-top></loja-top>      
      <v-container fluid>
        <grid-local :data="locais"></grid-local>
      </v-container>
    </v-content>
    <rodape></rodape>
  </div>
</template>


<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/loja/loja-top.php';?>
<?php require_once 'src/components/loja/_addLoja.php';?>
<?php require_once 'src/components/loja/_edtLoja.php';?>
<?php require_once 'src/components/loja/_delLoja.php';?>
<?php require_once 'src/components/loja/_catLoja.php';?>

<?php require_once 'src/components/loja/loja-oss.php';?>
<?php require_once 'src/components/local/locais-index.php';?>
<script>
  var Locais = Vue.extend({
  name: 'locais',
  template: '#locais',
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
      return store.state.locais;
    },
  },
  methods: {
    
    // Bu metot http post ile formdan alınan verileri apiye iletir
    // Apiden dönen cevap users dizisine push edilir
  }
});
</script>