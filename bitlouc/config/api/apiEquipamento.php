<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");
require_once '../control/equipamentoControl.php';

$equiControl      = new EquipamentoControl();

$res = array('error' => true);
$action = 'local';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

if($action == 'read'):

  $item = $equiControl->listSistema();
  $res['equipamentos'] = $item;
  $res['error'] = false;

endif;

if($action == 'loja'):

  //$lojaId = $_POST['loja'];
  $lojaId = '1';
  $item = $equiControl->listLoja( $lojaId );
  $res['equipamentos'] = $item;
  $res['error'] = false;

endif;

if($action == 'local'):

  //$localId = $_POST['local'];
  $localId = '1';
  $item = $equiControl->listLocal( $localId );
  $res['equipamentos'] = $item;
  $res['error'] = false;

endif;

if($action == 'localCont'):

  //$localId = $_POST['local'];
  $localId = '1';
  $item = $equiControl->contEquipLoja( $localId );
  $res['equipamentos'] = $item;
  $res['error'] = false;

endif;

#CADASTRAR
if($action == 'insert'):
  $produto            = $_POST['produto'];
  $tag                = $_POST['tag'];
  $name               = $_POST['name'];
  $modelo             = $_POST['modelo'];
  $fabricante         = $_POST['fabricante'];
  $fabricanteNick     = $_POST['fabricanteNick'];
  $proprietario       = $_POST['proprietario'];
  $proprietarioNick   = $_POST['proprietarioNick'];
  $proprietarioLocal  = $_POST['proprietarioLocal'];
  $categoria          = $_POST['categoria'];
  $numeracao          = $_POST['numeracao'];
  $plaqueta           = $_POST['plaqueta'];
  $dataFab            = $_POST['dataFab'];
  $dataCompra         = $_POST['dataCompra'];
  $loja               = $_POST['loja'];
  $local              = $_POST['local'];
  $status             = $_POST['status'];
  $ativo              = $_POST['ativo'];

  /*$produto = '1';
  $tag = 'tag';
  $name = 'name';
  $modelo = 'modelo';
  $numeracao = 'numeracao';
  $fabricante = '1';
  $fabricanteNick = 'fabricanteNick';
  $proprietario = '1';
  $proprietarioNick = 'proprietarioNick';
  $proprietarioLocal = '2';
  $categoria = '1';
  $plaqueta = '10101010';
  $dataFab = date("Y-m-d");
  $dataCompra = date("Y-m-d");
  $ativo = '0';*/

  $item = $equiControl->insertSistema(
    $produto,
    $tag,
    $name,
    $modelo,
    $fabricante,
    $fabricanteNick,
    $proprietario,
    $proprietarioNick,
    $proprietarioLocal,
    $categoria,
    $numeracao,
    $plaqueta,
    $dataFab,
    $dataCompra,
    $loja,
    $local,
    $status,
    $ativo
  );
  # Insert
  $res = $item;

endif;

#ATUALIZAR
if(isset($_POST['atualizar'])):

endif;

header("Content-Type: application/json");
echo json_encode($res);