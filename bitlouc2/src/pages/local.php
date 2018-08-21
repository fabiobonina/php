<template id="local">
  <div>
    <top></top>
    <v-content>
      <local-top></local-top>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-content>
    <rodape></rodape>
  </div>
</template>
<script src="src/pages/local.js"></script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/local/local-top.php';?>
<?php require_once 'src/components/bem/bens.php';?>