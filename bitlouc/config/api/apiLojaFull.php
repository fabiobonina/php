<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');



  function __autoload($class_name){
		require_once '../classes/' . $class_name . '.php';
	}

  $oats = new Oats();
  $usuarios = new Usuarios();
  $lojas = new Lojas();
  $localidades = new Localidades();
  $sistemas = new Sistemas();
  $servicos = new Servicos();
  $descricoes = new Descricoes();
  $ativos = new Ativos();
  $res = array('error' => false);
  $action = 'read';

  if(isset($_GET['action'])){
		$action = $_GET['action'];
	}

  if($action == 'read'){
    $resultado = array();

    /*while($result = $query->fetch()) {
      array_push($resultado, $result);
    }*/
    foreach($lojas->findAll() as $key => $value): {
      $ar1 = array();
      $ar1['loja'] = $value; 
      $lojaId = $value->id;
      $ar2 = array();
      foreach($localidades->findAll() as $key => $value):if($value->loja == $lojaId) {
        array_push($ar2, $value);        
      }endforeach;
      $ar2['locais'] = $ar2;
      $ar = array_merge($ar1, $ar2);
      array_push($resultado, $ar);
          
    }endforeach;

  }
  $res['dados'] = $resultado;
  header("Content-Type: application/json");
  echo json_encode($res);