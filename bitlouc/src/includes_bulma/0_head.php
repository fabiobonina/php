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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="./dist/css/bulma.min.css"> 
  <script src="lib/vue.js"></script>
  <script src="lib/vuex.js"></script>
  <script src="lib/vue-router.js"></script>
  <script src="lib/vue-resource.js"></script>
    
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body>