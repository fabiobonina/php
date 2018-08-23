
<template id="oss">
  <div>
    <top></top>

    <v-content>
      <v-tabs v-model="active" color="blue" dark slider-color="yellow">
        <v-tab v-for="n in router" :key="n.title" :to="{path: n.router}" ripple> {{ n.title }} </v-tab>     
      </v-tabs>
      <v-container>
        <router-view></router-view>
      </v-container>
    </v-content>

    <rodape></rodape>
  </div>    
</template>
<script src="src/pages/oss.js"></script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/os/osLojas.php';?>
<?php require_once 'src/components/os/osStus.php';?>
<?php require_once 'src/components/os/tecOs.php';?>

<!-- components os -->
<?php require_once 'src/components/os/os.php';?>
<?php require_once 'src/components/os/os-grid.php';?>
<?php require_once 'src/components/os/localOss.php';?>
<!-- /components os -->
