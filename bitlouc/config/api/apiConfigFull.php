<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');



  function __autoload($class_name){
		require_once '../classes/' . $class_name . '.php';
	}

  $tipos = new Tipos();
  $loja = new Loja();
  $locais = new Locais();
  $sistemas = new Sistema();
  $grupo = new Grupo();
  $lojaGrupo = new LojaGrupo();
  $descricao = new Descricao();
  $ativos = new Ativos();

  $res = array('error' => false);
  $action = 'read';

  if(isset($_GET['action'])){
		$action = $_GET['action'];
	}

  $arDados = array();
  if($action == 'tipo'){

    //Montar Array tipos------------------------------------------------------------
    
    foreach($tipos->findAll() as $key => $value): {
      $arItens = $value; //Tipo
      array_push($arDados, $arItens);
    }endforeach;
    
    //Montar Array tipos------------------------------------------------------------

  }
  if($action == 'teste'){
    
        //Montar Array lojas------------------------------------------------------------
        //$arDados = array();
        foreach($loja->findAll() as $key => $value): {
          
          $arLoja = (array) $value; //Loja

          array_push($arDados, $arLoja);
              
        }endforeach;
        //Montar Array lojas------------------------------------------------------------
    
      }

  if($action == 'loja'){
    $dados = array();
    $lojaId = $_POST['lojaId'];

    foreach($loja->findAll() as $key => $value):if($value->id == $lojaId) {
      $loja = (array) $value;
      $locais = array();
      foreach($locais->findAll() as $key => $value):if($value->loja == $lojaId) {
        $local = (array) $value;
        array_push($locais, $local );
      }endforeach;

      $loja['locais']= $locais;
      $dados = $loja;
    }endforeach;
    
  }

  $res['dados'] = $arDados;
  header("Content-Type: application/json");
  echo json_encode($res);