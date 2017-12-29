<?php
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
  <link href="./img/bit-louc.jpg" rel="icon" type="image/jpg" />
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
</head>