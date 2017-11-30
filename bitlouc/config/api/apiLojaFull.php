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
  $action = 'loja';

  if(isset($_GET['action'])){
		$action = $_GET['action'];
	}

  if($action == 'read'){
    $resultado = array();

    foreach($lojas->findAll() as $key => $value): {     
      $array = (array) $value;
      $lojaId = $value->id;
      $resultado2 = array();

      foreach($localidades->findAll() as $key => $value):if($value->loja == $lojaId) {
        $array2 = (array) $value;
        array_push($resultado2, $array2 );
      }endforeach;

      array_push($resultado, $array);
          
    }endforeach;

  }
  if($action == 'loja'){
    $resultado = array();
    $lojaId = $_POST['lojaId'];

    foreach($lojas->findAll() as $key => $value):if($value->id == $lojaId) {
      $array = (array) $value;
      $resultado2 = array();
      foreach($localidades->findAll() as $key => $value):if($value->loja == $lojaId) {
        $array2 = (array) $value;
        array_push($resultado2, $array2 );
      }endforeach;

      $array['locais']= $resultado2;
      $resultado = $array;
    }endforeach;
    
  }
  $res['dados'] = $resultado;
  header("Content-Type: application/json");
  echo json_encode($res);