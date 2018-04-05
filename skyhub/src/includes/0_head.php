<?php
// Horario
date_default_timezone_set('America/Recife');
ob_start();
session_start();

// login
if(!isset($_SESSION['loginUser']) && (!isset($_SESSION['loginNivel']))){
  header("Location: login.php");exit;
}

//include("admin/conexao/conecta.php");
include("src/includes/logout.php");

$userUser = $_SESSION['loginUser'];
$userEmail = $_SESSION['loginEmail'];
$userProprietario = $_SESSION['loginProprietario'];
$userNivel = $_SESSION['loginNivel'];
$userGrupo = $_SESSION['loginGrupo'];
$userLoja = $_SESSION['loginLoja'];
$userName = $_SESSION['loginName'];
$userAvatar = $_SESSION['loginAvatar'];
$userDtCadastro = $_SESSION['loginDtCadastro'];

function __autoload($class_name){
  require_once 'admin/classes/' . $class_name . '.php';
}

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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700' rel='stylesheet' type='text/css'>
  <!-- BLUMA CSS -->
  <link rel="stylesheet" href="./dist/css/bulma.min.css">
  <!-- MATERIALDESINGN ICO -->
  <link rel="stylesheet" type="text/css" href="./dist/css/materialdesign/css/materialdesignicons.min.css" media="all">

  <link rel="stylesheet" type="text/css" href="./dist/css/index.css">
  <link rel="stylesheet" type="text/css" href="./dist/css/_progress.css">
  <link rel="stylesheet" type="text/css" href="./dist/css/vuemaps.css">
  
  <!-- BLUMA steps -->
  <!-- link rel="stylesheet" type="text/css" href="https://wikiki.github.io/css/documentation.css" -->
  <link rel="stylesheet" type="text/css" href="./dist/bulma-steps/dist/bulma-steps.min.css" >

  <script src="dist/lib/vue.js"></script>
  <script src="dist/lib/vuex.js"></script>
  <script src="dist/lib/vue-router.js"></script>
  <script src="dist/lib/vue-resource.js"></script>
  <script src="dist/js/vue-select.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios@0.18.0/dist/axios.js"></script>
  
  <!-- BLUMA steps -->
  <!--script src="https://wikiki.github.io/css/documentation.css?v=201801131648"></script-->
  <script src="./dist/bulma-steps/dist/bulma-steps.min.js"></script>
  <!-- GOOGLE MAPS -->
  <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlfHdTSE_d9zwwYKs5gbL01mHElMLCFgE&libraries=places,geometry"></script>
    
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body>