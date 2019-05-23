<template id="organizacao">
    <div>
        <top></top>
        <v-content>
            <v-container fluid>
              <router-view></router-view>
            </v-container>
        </v-content>
        <rodape></rodape>
    </div>
</template>
<?php // require_once 'src/system/pages/dashboard.html';?>
<?php require_once 'src/organizacao/pages/home.html';?>

<?php require_once 'src/organizacao/pages/locais.html';?>

<?php require_once 'src/organizacao/pages/lojas.html';?>
<?php require_once 'src/organizacao/pages/loja.html';?>
<?php require_once 'src/organizacao/components/loja/lojas-grid.html';?>
<?php require_once 'src/organizacao/components/loja/_addLoja.html';?>
<?php require_once 'src/organizacao/components/loja/_crudLoja.html';?>
<?php require_once 'src/organizacao/components/loja/_edtLoja.html';?>
<?php require_once 'src/organizacao/components/loja/_delLoja.html';?>
<?php require_once 'src/organizacao/components/loja/_catLoja.html';?>

<?php //require_once 'src/components/gerencial/proprietario-top.php';?>
<?php //require_once 'src/components/loja/lojas-plus.php';?>
<?php //require_once 'src/components/local/locais-plus.php';?>
<?php //require_once 'src/components/os/ossPlus.php';?>

<?php //require_once 'src/components/os/maps.html';?>
<?php //require_once 'src/components/os/osStatusTec.html';?>

<script>
  var Organizacao = Vue.extend({
    template: '#organizacao',
    data: function () {
      return {
  
      };
    },
    created() {

    },
    computed: {

    },
    methods: {
    }
  });

</script>