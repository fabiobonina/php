<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");

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
$grupos = new Grupo();
$servicos = new Servicos();
$seguimentos = new Seguimento();
$tecnicos = new Tecnicos();

$res = array('error' => false);
$action = 'config';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

$arDados = array();
if($action == 'config'):

  #TIPOS-----------------------------------------------------------------
  $arItens = array();
  foreach($tipos->findAll() as $key => $value): {
    $arItem = $value; //Tipo
    array_push($arItens, $arItem);
  }endforeach;
  $res['tipos'] = $arItens;
  #TIPOS-----------------------------------------------------------------

  #CATEGORIAS------------------------------------------------------------
  $arItens = array();
  foreach($categorias->findAll() as $key => $value): {
    $arItem = $value; //Tipo
    array_push($arItens, $arItem);
  }endforeach;
  $res['categorias'] = $arItens;
  #CATEGORIAS------------------------------------------------------------

  #FABRICANTES-----------------------------------------------------------
  $arItens = array();
  foreach($fabricantes->findAll() as $key => $value): {
    $arItem = $value; //Tipo
    array_push($arItens, $arItem);
  }endforeach;
  $res['fabricantes'] = $arItens;
  #FABRICANTES-----------------------------------------------------------

  #SERVICOS-----------------------------------------------------------
  $arItens = array();
  foreach($servicos->findAll() as $key => $value): {
    $arItem = $value;
    array_push($arItens, $arItem);
  }endforeach;
  $res['servicos'] = $arItens;
  #SERVICOS-----------------------------------------------------------
  #SEGUIMENTOS-----------------------------------------------------------
  $arItens = array();
  foreach($seguimentos->findAll() as $key => $value): {
    $arItem = $value;
    array_push($arItens, $arItem);
  }endforeach;
  $res['seguimentos'] = $arItens;
  #SEGUIMENTOS-----------------------------------------------------------
  #TECNICOS-----------------------------------------------------------
  $arItens = array();
  foreach($grupos->findAll() as $key => $value): {
    $arItem = $value;
    array_push($arItens, $arItem);
  }endforeach;
  $res['grupos'] = $arItens;
  #TECNICOS-----------------------------------------------------------
  #TECNICOS-----------------------------------------------------------
  $arItens = array();
  foreach($tecnicos->findAll() as $key => $value): {
    $arItem = $value;
    array_push($arItens, $arItem);
  }endforeach;
  $res['tecnicos'] = $arItens;
  #TECNICOS-----------------------------------------------------------

endif;

if($action == 'prod'):

  #PRODUTOS--------------------------------------------------------------
  $arItens = array();
  foreach($produtos->findAll() as $key => $value): {
    $arItem = $value; //Tipo
    array_push($arItens, $arItem);
  }endforeach;
  $res['produtos'] = $arItens;
  #PRODUTOS--------------------------------------------------------------
  
endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);