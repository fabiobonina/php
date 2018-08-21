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
<script src="src/pages/locais.js"></script>