<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');



  function __autoload($class_name){
		require_once '../admin/classes/' . $class_name . '.php';
	}

  $oats = new Oats();
  $usuarios = new Usuarios();
  $clientes = new Clientes();
  $localidades = new Localidades();
  $sistemas = new Sistemas();
  $servicos = new Servicos();
  $descricoes = new Descricoes();
  $ativos = new Ativos();
  $out = "[";

  foreach($clientes->findAll() as $key => $value): {
      $clientId = $value->id;
      $clientNome = $value->nome;
      $clientNick = $value->nick;
      $clientAtivo = $value->ativo;

  		if ($out != "[") {
  			$out .= ",";
  		}
      $out .= '{"id": "'.$clientId.'",';
  		$out .= '"nome": "'.$clientNome.'",';
      $out .= '"nick": "'.$clientNick.'",';
      $out .= '"ativo": "'.$clientAtivo.'"}';
  	 }endforeach;
		$out .= "]";

		echo $out;
