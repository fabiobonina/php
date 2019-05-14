<?php
  // Horario
  date_default_timezone_set('America/Recife');
  ob_start();
  session_start();
  // login
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>BitLOUC</title>
    <link href="dist/img/bit-louc.png" rel="icon" type="image/png">
    <!-- Tell the browser to be responsive to screen width -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <!-- MATERIALDESINGN ICO -->
    <link rel="stylesheet" type="text/css" href="./dist/css/materialdesign/css/materialdesignicons.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="./dist/css/vuemaps.css">
    
    <link href="dist/vuetify/vuetify.min.css" rel="stylesheet">
    <!-- Vuejs -->
    <script src="dist/vue/vuejs/vue.js"></script>
    <script src="dist/vue/vuex.js"></script>
    <script src="dist/vue/vue-router.js"></script>
    <script src="dist/vue/vue-resource.js"></script>

    <!-- Axios -->
    <script src="dist/axios/axios.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.16.2/lodash.min.js"></script>
    <!-- Vuetify -->
    <script src="dist/vuetify/vuetify.min.js"></script>
    <!-- Vee-Validade -->
    <script src="dist/vee-validade/vee-validate.min.js"></script>
    <script src="dist/vee-validade/pt_BR.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/node-uuid/1.4.7/uuid.js"></script>

    <!-- Google Maps -->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlfHdTSE_d9zwwYKs5gbL01mHElMLCFgE&libraries=places,geometry"></script>

    <!-- Chart -->
    <script src="https://unpkg.com/chart.js@2.7.2/dist/Chart.bundle.js"></script>
    <script src="https://unpkg.com/vue-chartkick@0.5.0"></script>

    <script src="//unpkg.com/vue-clipboards@1.0.5/dist/vue-clipboards.js"></script>
      
  </head>
    <body>
        <!-- page content -->
        <?php include("src/index.php");?>
        <!-- /page content -->
    </body>
</html>

