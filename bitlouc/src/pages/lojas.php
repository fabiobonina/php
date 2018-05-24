<template id="lojas">
  <div>
    <top></top>
    <v-content>
      <proprietario></proprietario>
      <v-container fluid>
        <div v-if="user.nivel > 2 && user.grupo == 'P'" class="control">
          <a v-on:click="modalLojaAdd = true" class="button is-link is-al">
            <span class="mdi mdi-store"></span> Loja
          </a>
        </div>
        <grid-lojas :data="lojas"></grid-lojas>
        </v-container>
    </v-content>
    
    <rodape></rodape>

  </div>
</template>

<script src="src/pages/lojas.js"></script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/proprietario/proprietario.php';?>
<?php require_once 'src/components/loja/lojas-grid.php';?>
<?php require_once 'src/components/loja/loja-add.php';?>
<?php require_once 'src/components/loja/loja-del.php';?>
<?php require_once 'src/components/loja/loja-edt.php';?>
<?php require_once 'src/components/loja/loja-cat.php';?>
<?php require_once 'src/components/loja/loja.php';?>

