<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

require_once '_chave.php';

require_once '../model/Tipos.php';
require_once '../model/Produtos.php';
require_once '../model/Categorias.php';
require_once '../model/CilTipo.php';
require_once '../model/Fabricantes.php';
require_once '../model/Loja.php';
require_once '../model/Local.php';
require_once '../model/Sistema.php';
require_once '../model/Servicos.php';
require_once '../model/Grupo.php';
require_once '../model/Seguimento.php';
require_once '../model/DeslocTrajetos.php';
require_once '../model/DeslocStatus.php';
require_once '../model/UF.php';

require_once '../control/tecControl.php';

$tipos          = new Tipos();
$produtos       = new Produtos();
$categorias     = new Categorias();
$cilTipos       = new CilTipo();
$fabricantes    = new Fabricantes();
$loja           = new Loja();
$locais         = new Local();
$sistemas       = new Sistema();
$grupos         = new Grupo();
$servicos       = new Servicos();
$seguimentos    = new Seguimento();
$tecnicos       = new Tecnicos();
$deslocTrajetos = new DeslocTrajetos();
$deslocStatus   = new DeslocStatus();
$ufs            = new UF();

$tecControl     = new TecControl();

$res = array('error' => false);
$action = 'cilindro';

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
  
  $res['tecnicos'] = $tecControl->listProprietario();

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
  #UF------------------------------------------------------------
  $arItens = array();
  foreach($ufs->findAll() as $key => $value): {
    $arItem = $value; //Tipo
    array_push($arItens, $arItem);
  }endforeach;
  $res['ufs'] = $arItens;
  #UF------------------------------------------------------------

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

if($action == 'cilindro'):

  #PRODUTOS--------------------------------------------------------------
  $arItens = array();
  foreach($cilTipos->findAll() as $key => $value): {
    $arItem = $value; //Tipo
    array_push($arItens, $arItem);
  }endforeach;
  $res['cil_tipos'] = $arItens;
  #PRODUTOS--------------------------------------------------------------
  
endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);