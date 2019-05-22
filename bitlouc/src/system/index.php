<template id="home-page">
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
<?php require_once 'src/system/components/home.html';?>
<?php require_once 'src/system/components/top.html';?>
<?php require_once 'src/system/components/rodape.html';?>



<?php require_once 'src/system/components/user/user.html';?>

<?php require_once 'src/system/components/login/isLogin.html';?>
<?php require_once 'src/system/components/login/logout.html';?>
<?php require_once 'src/system/pages/login.html';?>
<?php require_once 'src/system/pages/registrar.html';?>

<?php require_once 'src/system/components/includes/config.html';?>
<?php require_once 'src/system/components/includes/_loader.html';?>
<?php require_once 'src/system/components/includes/_copia.html';?>
<?php require_once 'src/system/components/includes/_message.html';?>


<?php //require_once 'src/components/gerencial/proprietario-top.php';?>
<?php //require_once 'src/components/loja/lojas-plus.php';?>
<?php //require_once 'src/components/local/locais-plus.php';?>
<?php //require_once 'src/components/os/ossPlus.php';?>

<?php //require_once 'src/components/os/maps.html';?>
<?php //require_once 'src/components/os/osStatusTec.html';?>

<script>
  var HomePage = Vue.extend({
    template: '#home-page',
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




