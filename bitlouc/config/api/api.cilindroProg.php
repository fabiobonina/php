<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");
require_once '../control/cilProgDemanda.control.php';
require_once '../control/cilProg.control.php';

$cilindroProgControl    = new CilindroProgControl();
$cilindroDemandaControl = new CilindroDemandaControl();
$cilindroItemControl    = new CilindroItemControl();

$res = array('error' => true);
$action = 'show';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

if($action == 'read'):

  $item = $cilindroProgControl->list();
  $res['cilProgramacoes'] = $item;
  $res['error'] = false;

endif;

if($action == 'show'):

  //$programacao_id = $_POST['programacao_id'];
  $programacao_id = '2';
  $item = $cilindroProgControl->show( $programacao_id );
  $res= $item;
  //$res['error'] = false;

endif;

if($action == 'local'):

  $local_id = $_POST['local'];
  //$local_id = '1';
  $item = $cilindroProgControl->listLocal( $local_id );
  $res['cilindos'] = $item;
  $res['error'] = false;

endif;

if($action == 'localCont'):

  $local_id = $_POST['local'];
  //$local_id = '1';
  $item = $cilindroProgControl->contEquipLoja( $local_id );
  $res['cilindos'] = $item;
  $res['error'] = false;

endif;

#PUBLISH
if($action == 'publish'):
  $loja_id    = $_POST['loja_id'];
  $local_id   = $_POST['local_id'];
  $data       = $_POST['data'];
  $status     = $_POST['status'];
  $demanda    = $_POST['demanda'];
  $id         = $_POST['id'];

  $item = $cilindroProgControl->publish(
    $loja_id,
    $local_id,
    $data,
    $status,
    $id
  );
  //$item['id'] = '1';
  if(!$item['error']){
    $item = $cilindroDemandaControl->add( $demanda, $id, $item['id'] );
  }
  # Insert
  $res = $item;

endif;

#CADASTRAR
if($action == 'prog-publish'):

  $loja_id  = $_POST['loja_id'];
  $local_id = $_POST['local_id'];
  $data     = $_POST['data'];
  $status   = $_POST['status'];
  $demanda  = $_POST['demanda'];
  $id       = $_POST['id'];

  $item = $cilindroProgControl->prog_publish(
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

#PUBLISH
if($action == 'publish-itens'):
  $programacao_id = $_POST['programacao_id'];
  $demanda_id     = $_POST['demanda_id'];
  $cilindro_id    = $_POST['cilindro_id'];
  $id             = $_POST['id'];

  $item = $cilindroProgControl->publishItem(
    $programacao_id,
    $demanda_id,
    $cilindro_id,
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