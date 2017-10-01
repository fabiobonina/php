<?php
  ob_start();
  session_start();

  // login
  if(!isset($_SESSION['loginUser']) && (!isset($_SESSION['loginNivel']))){
    header("Location: login.php");exit;
  }

	//include("admin/conexao/conecta.php");
	include("admin/includes/logout.php");

	$userUsuario = $_SESSION['loginUser'];
  $userEmail = $_SESSION['loginEmail'];
	$userSenha = $_SESSION['loginProprietario'];
	$userNivel = $_SESSION['loginNivel'];
	$userGrupo = $_SESSION['loginGrupo'];
  $userLoja = $_SESSION['loginLoja'];
  $userNome = $_SESSION['loginNome'];

  function __autoload($class_name){
		require_once 'admin/classes/' . $class_name . '.php';
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SkyHub | Web Mobi</title>
    <link href="admin/img/fa-paw.png" rel="icon" type="image/png" />

    <!-- Bootstrap -->
    <link href="config/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="config/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="config/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="config/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="config/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="config/build/css/custom.min.css" rel="stylesheet">
  </head>