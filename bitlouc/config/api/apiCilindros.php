<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");
require_once '../control/cilindro.control.php';

$cilindroControl      = new CilindroControl();

$res = array('error' => true);
$action = 'read';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

if($action == 'read'):

  $item = $cilindroControl->list();
  $res['cilindros'] = $item;
  $res['error'] = false;

endif;

if($action == 'loja'):

  $loja_id = $_POST['loja'];
  //$loja_id = '1';
  $item = $cilindroControl->listLoja( $loja_id );
  $res['cilindros'] = $item;
  $res['error'] = false;

endif;

if($action == 'local'):

  $local_id = $_POST['local'];
  //$local_id = '1';
  $item = $cilindroControl->listLocal( $local_id );
  $res['cilindos'] = $item;
  $res['error'] = false;

endif;

if($action == 'localCont'):

  $local_id = $_POST['local'];
  //$local_id = '1';
  $item = $cilindroControl->contEquipLoja( $local_id );
  $res['cilindos'] = $item;
  $res['error'] = false;

endif;

#CADASTRAR
if($action == 'insert'):
  $loja_id    = $_POST['loja_id'];
  $local_id   = $_POST['local_id'];
  $demanda    = $_POST['demanda'];
  $data       = $_POST['data'];
  $ativo      = $_POST['ativo'];

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

  $item = $cilindroControl->insertSistema(
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