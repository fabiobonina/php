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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BitLOUC</title>
  <!--link href="./img/bit-louc.jpg" rel="icon" type="image/jpg" /-->
  <link href="./img/bit-louc.png" rel="icon" type="image/png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="./bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="./dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.css' rel="stylesheet" type="text/css"></link>
  <script src="lib/vue.js"></script>
  <script src="lib/vuex.js"></script>
  <script src="lib/vue-router.js"></script>
  <script src="lib/vue-resource.js"></script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">