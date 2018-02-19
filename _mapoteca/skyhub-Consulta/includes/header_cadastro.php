<?php
ob_start();
session_start();

	include("includes/logout.php");

/*/Seleciona usuario logado
$selecionaLogado = "SELECT * from usuarios WHERE nickuser= :usuarioLogado AND senha= :senhaLogado";
	try{
		$result = $conexao->prepare($selecionaLogado);
		$result->bindParam('usuarioLogado',$usuarioLogado, PDO::PARAM_STR);
		$result->bindParam('senhaLogado',$senhaLogado, PDO::PARAM_STR);
		$result->execute();
		$contar = $result->rowCount();

		if($contar=1){
			$loop = $result->fetchAll();
			foreach ($loop as $show){
					 $nomeLogado = $show['nome'];
					 $emailLogado = $show['email'];
					 $userLogado = $show['nickuser'];
					 $senhaLogado = $show['senha'];
					 $racaLogado = $show['raca'];
					 $dt_nascLogado = $show['data_nascimento'];
					 $dt_cdLogado = $show['data_cadastro'];
					 $dt_lgLogado = $show['data_ultimo_login'];
					 $nivelLogado = $show['nivel_usuario'];
			}
		}
		}catch (PDOException $erro){ echo $erro;}
*/
?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<title>RiskZone</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<link href="admin/css/bootstrap-responsive.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="admin/css/font-awesome.css" rel="stylesheet">
<link href="admin/css/style.css" rel="stylesheet">
<link href="admin/css/pages/dashboard.css" rel="stylesheet">

 <!--Report-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyD690bEo7B-V4nQR5T8-aiyf61bbGzrL6Q" type="text/javascript"></script>
<script type="text/javascript" src="js/mapas.js"></script>

<!--Check-in -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD690bEo7B-V4nQR5T8-aiyf61bbGzrL6Q"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="mapa.js"></script>
<script type="text/javascript" src="jquery-ui.custom.min.js"></script>