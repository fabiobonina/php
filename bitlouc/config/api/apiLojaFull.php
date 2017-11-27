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
      
      $array = (array) $value;
      $lojaId = $value->id;
      $resultado2 = array();
      foreach($localidades->findAll() as $key => $value):if($value->loja == $lojaId) {
        //array_push($ar2, $value);
        $array2 = (array) $value;
        array_push($resultado2, $array2 );
      }endforeach;
      $dado2['locais'] = $resultado2;
      //var_dump($array2);
      //$ar = array_merge($ar1, $ar2);
      //$ar2 = array('teste' => 'outros');
      array_push($array, $dado2);
      array_push($resultado, $array);
          
    }endforeach;

  }
  $res['dados'] = $resultado;
  header("Content-Type: application/json");
  echo json_encode($res);