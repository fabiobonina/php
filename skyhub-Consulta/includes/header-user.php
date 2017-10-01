<?php
ob_start();
session_start();

// login
if(!isset($_SESSION['loginUser']) && (!isset($_SESSION['loginSenha']))){
	header("Location: login.php");exit;
}

	//include("admin/conexao/conecta.php");
	include("admin/includes/logout.php");

	$userUsuario = $_SESSION['loginUser'];
	$userSenha = $_SESSION['loginSenha'];
	$userNivel = $_SESSION['loginNivel'];
	$userNome = $_SESSION['loginNome'];

?>


<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<title>SkyHub - System | Apoio Técnico</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<link href="admin/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="admin/css/font-awesome.css" rel="stylesheet">
<link href="admin/css/style.css" rel="stylesheet">
<link href="admin/css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script src="admin/js/jquery-1.7.2.min.js"></script>     
<script src="admin/js/jquery.maskedinput.js" type="text/javascript"></script>