<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

require_once '_chave.php';

require_once '../model/CilTipo.php';


$cilTipos          = new CilTipo();

$res = array('error' => false);
$action = 'read';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

$arDados = array();
if($action == 'read'):

  #CIL-TIPOS-----------------------------------------------------------------
  $res['cilTipos']  = $cilTipos->findAll();
  #CIL-TIPOS-----------------------------------------------------------------

endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);