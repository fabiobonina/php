<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");
require_once '../../control/controleCilindro/cilindro.control.php';

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

  $loja_id    = $_POST['loja_id'];
  $local_id   = $_POST['local_id'];
  $data       = $_POST['data'];
  $status     = $_POST['status'];
  $demanda    = $_POST['demanda'];
  $id         = $_POST['id'];

  $item = $cilindroControl->prog_publish(
    $loja_id,
    $local_id,
    $data,
    $status,
    $demanda,
    $id
  );
  # Insert
  $res = $item;

endif;

#ATUALIZAR
if(isset($_POST['atualizar'])):

endif;

header("Content-Type: application/json");
echo json_encode($res);