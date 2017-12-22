<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');



  function __autoload($class_name){
		require_once '../classes/' . $class_name . '.php';
	}

  $tipos = new Tipos();
  $produtos = new Produtos();
  $categorias = new Categorias();
  $fabricantes = new Fabricantes();
  $loja = new Loja();
  $locais = new Locais();
  $sistemas = new Sistema();
  $grupo = new Grupo();
  $descricao = new Descricao();
  $ativos = new Ativos();

  $res = array('error' => false);
  $action = 'config';

  if(isset($_GET['action'])){
		$action = $_GET['action'];
	}

  $arDados = array();
  if($action == 'config'){

    #TIPOS------------------------------------------------------------
    $arItens = array();
    foreach($tipos->findAll() as $key => $value): {
      $arItem = $value; //Tipo
      array_push($arItens, $arItem);
    }endforeach;
    $arDados['tipos'] = $arItens;
    #TIPOS------------------------------------------------------------
    #PRODUTOS------------------------------------------------------------
    $arItens = array();
    foreach($produtos->findAll() as $key => $value): {
      $arItem = $value; //Tipo
      array_push($arItens, $arItem);
    }endforeach;
    $arDados['produtos'] = $arItens;
    #PRODUTOS------------------------------------------------------------
    #CATEGORIAS------------------------------------------------------------
    $arItens = array();
    foreach($categorias->findAll() as $key => $value): {
      $arItem = $value; //Tipo
      array_push($arItens, $arItem);
    }endforeach;
    $arDados['categorias'] = $arItens;
    #CATEGORIAS------------------------------------------------------------
    #FABRICANTES------------------------------------------------------------
    $arItens = array();
    foreach($fabricantes->findAll() as $key => $value): {
      $arItem = $value; //Tipo
      array_push($arItens, $arItem);
    }endforeach;
    $arDados['fabricantes'] = $arItens;
    #FABRICANTES------------------------------------------------------------

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