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
  <!--link href="./img/bit-louc.jpg" rel="icon" type="image/jpg" /-->
  <link href="./img/bit-louc.png" rel="icon" type="image/png" />
  <!-- Tell the browser to be responsive to screen width -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
  <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <!-- MATERIALDESINGN ICO -->
  <link rel="stylesheet" type="text/css" href="./dist/css/materialdesign/css/materialdesignicons.min.css" media="all">
  <link rel="stylesheet" type="text/css" href="./dist/css/vuemaps.css">
  
  <!-- BLUMA steps -->

  <script src="dist/lib/vue.js"></script>
  <script src="dist/lib/vuex.js"></script>
  <script src="dist/lib/vue-router.js"></script>
  <script src="dist/lib/vue-resource.js"></script>
  <script src="dist/js/vue-select.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios@0.18.0/dist/axios.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.16.2/lodash.min.js"></script>
  <script src="dist/lib/vuetify.js"></script>
  <script src="https://unpkg.com/vee-validate@2.0.8/dist/vee-validate.js"></script>
  
  <script src="https://unpkg.com/vee-validate@2.0.8/dist/locale/pt_BR.js"></script>
  <script src="https://unpkg.com/babel-polyfill/dist/polyfill.min.js"></script>

  
  
  <!-- BLUMA steps -->

  <!-- GOOGLE MAPS -->
  <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlfHdTSE_d9zwwYKs5gbL01mHElMLCFgE&libraries=places,geometry"></script>
    
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body>