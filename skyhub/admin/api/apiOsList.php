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
foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->status < 4) {
	$oatId = $value->id;
	$oatUsuario = $value->nickuser;
	$oatCliente = $value->cliente;
	$oatLocalId = $value->localidade;
	$oatFilial = $value->filial;
	$oatOs = $value->os;
	$oatServId = $value->servico;
	$oatSistId = $value->sistema;
	$oatData = $value->data;
	$oatAtivo = $value->ativo;
	$oatDataSol = $value->data_sol;
	$oatDataOs = $value->data_os;
	$oatDataFec = $value->data_fech;
  $oatDataTer = $value->data_term;
	$oatStatus = $value->status;
	foreach($localidades->findAll() as $key => $value):if($value->id == $oatLocalId) {
		$oatLocal = $value->nome;
		$oatLat = $value->latitude;
		$oatLong = $value->longitude;
	}endforeach;
	foreach($servicos->findAll() as $key => $value):if($value->id == $oatServId) {
		$oatServico = $value->descricao;
	}endforeach;
	foreach($sistemas->findAll() as $key => $value):if($value->id == $oatSistId) {
		$oatSistema =  $value->descricao;
	}endforeach;

		if ($out != "[") {
			$out .= ",";
		}
		$out .= '{"id": "'.$oatId.'",';
		$out .= '"nickuser": "'.$oatUsuario.'",';
		$out .= '"cliente": "'.$oatCliente.'",';
		$out .= '"localId": "'.$oatLocalId.'",';
		$out .= '"local": "'.$oatLocal.'",';
		$out .= '"localLat": "'.$oatLat.'",';
		$out .= '"localLog": "'.$oatLong.'",';
		$out .= '"servicoId": "'.$oatServId.'",';
		$out .= '"servico": "'.$oatServico.'",';
		$out .= '"sistemaId": "'.$oatSistId.'",';
		$out .= '"sistema": "'.$oatSistema.'",';
		$out .= '"data": "'.$oatData.'",';
		$out .= '"filial": "'.$oatFilial.'",';
		$out .= '"os": "'.$oatOs.'",';
		$out .= '"data_sol": "'.$oatDataSol.'",';
		$out .= '"data_os": "'.$oatDataOs.'",';
		$out .= '"data_fech": "'.$oatDataFec.'",';
		$out .= '"data_term": "'.$oatDataTer.'",';
		$out .= '"status": "'.$oatStatus.'",';
		$out .= '"ativo": "'.$oatAtivo.'"}';
	}endforeach;
		$out .= "]";

		echo $out;
