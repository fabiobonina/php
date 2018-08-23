<template id="lojas">
  <div>

    <top></top>
    <v-content>
      <v-container fluid>
        <grid-lojas :data="lojas"></grid-lojas>
      </v-container>
    </v-content>
    <rodape></rodape>

  </div>
</template>

<script src="src/pages/lojas.js"></script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/loja/lojas-grid.php';?>
<?php require_once 'src/components/loja/_addLoja.php';?>
<?php require_once 'src/components/loja/_edtLoja.php';?>
<?php require_once 'src/components/loja/_delLoja.php';?>
<?php require_once 'src/components/loja/_catLoja.php';?>

