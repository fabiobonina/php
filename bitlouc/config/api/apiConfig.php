<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

require_once '_chave.php';

function __autoload($class_name){
  require_once '../model/' . $class_name . '.php';
}

$tipos          = new Tipos();
$produtos       = new Produtos();
$categorias     = new Categorias();
$fabricantes    = new Fabricantes();
$loja           = new Loja();
$locais         = new Locais();
$sistemas       = new Sistema();
$grupos         = new Grupo();
$servicos       = new Servicos();
$seguimentos    = new Seguimento();
$tecnicos       = new Tecnicos();
$deslocTrajetos = new DeslocTrajetos();
$deslocStatus   = new DeslocStatus();

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
  #DESLOC_TIPO-----------------------------------------------------------
  $arItens = array();
  foreach($deslocTrajetos->findAll() as $key => $value): {
    $arItem = $value;
    array_push($arItens, $arItem);
  }endforeach;
  $res['deslocTrajetos'] = $arItens;
  #DESLOC_TIPO-----------------------------------------------------------
  #DESLOC_STATUS-----------------------------------------------------------
  $arItens = array();
  foreach($deslocStatus->findAll() as $key => $value): {
    $arItem = $value;
    array_push($arItens, $arItem);
  }endforeach;
  $res['deslocStatus'] = $arItens;
  #DESLOC_STATUS-----------------------------------------------------------


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