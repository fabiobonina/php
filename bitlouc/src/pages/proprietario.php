<template id="proprietario">
  <div>

    <top></top>
    <v-content>
      <proprietario-top></proprietario-top>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-content>
    <rodape></rodape>

  </div>
</template>

<script src="src/pages/proprietario.js"></script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/proprietario/proprietario-top.php';?>
<?php require_once 'src/components/loja/loja-oss.php';?>
<?php require_once 'src/components/local/locais-plus.php';?>


