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
  $data       = $_POST['data'];
  $status     = $_POST['status'];
  $demanda    = $_POST['demanda'];

  $item = $cilindroControl->publish(
    $loja_id,
    $local_id,
    $data,
    $status,
    $demanda
  );
  # Insert
  $res = $item;

endif;

#CADASTRAR
if($action == 'publish'):

  $loja         = $_POST['loja'];
  $local_id     = $_POST['local_id'];
  $numero       = $_POST['numero'];
  $fabricante   = $_POST['fabricante'];
  $capacidade   = $_POST['capacidade'];
  $condenado    = $_POST['condenado'];
  $dt_fabric    = $_POST['dt_fabric'];
  $dt_validade  = $_POST['dt_validade'];
  $tara_inicial = $_POST['tara_inicial'];
  $tara_atual   = $_POST['tara_atual'];
  $status       = $_POST['status'];
  $ativo        = $_POST['ativo'];
  $id           = $_POST['id'];

  $item = $cilindroControl->publish(
    $loja,
    $local_id,
    $numero,
    $fabricante,
    $capacidade,
    $condenado,
    $dt_fabric,
    $dt_validade,
    $tara_inicial,
    $tara_atual,
    $status,
    $ativo,
    $id
  );
  # Insert
  $res = $item;

endif;


header("Content-Type: application/json");
echo json_encode($res);