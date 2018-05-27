<template id="loja">
  <div>

    <top></top>
    <v-content>
      <loja></loja>
      <v-container fluid>
        <v-tabs v-model="active" color="blue" dark slider-color="yellow">
          <v-tab v-for="n in router" :key="n.title" :to="$route.params._id + n.router" ripple> {{ n.title }} </v-tab>     
        </v-tabs>
        <v-container>
          <router-view></router-view>
        </v-container>
      </v-container>
    </v-content>
    <rodape></rodape>

  </div>
</template>

<script src="src/pages/loja.js"></script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/loja/lojas-grid.php';?>
<?php require_once 'src/components/loja/_addLoja.php';?>
<?php require_once 'src/components/loja/_edtLoja.php';?>
<?php require_once 'src/components/loja/_delLoja.php';?>
<?php require_once 'src/components/loja/_catLoja.php';?>
<?php require_once 'src/components/loja/loja-locais.php';?>

