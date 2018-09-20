<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

require_once '_chave.php';
require_once '../control/osControl.php';

function __autoload($class_name){
  require_once '../model/' . $class_name . '.php';
}

$proprietario = new Proprietario();
$lojas        = new Loja();
$locais       = new Locais();
$oss          = new Os();
$bens         = new Bens();
$servicos     = new Servicos();
$mods         = new Mod();
$osTecnicos   = new OsTecnicos();
$deslocStatus = new DeslocStatus();
$osControl   = new OsControl();

$res     = array('error' => true);
$arDados = array();
$arErros = array();
$action  = 'teste';
$res['message'] = array();

//$res['user'] = $user;
$acessoNivel = $user['nivel'];// $user >  include("_chave.php");
$acessoProprietario = $user['proprietario'];
$acessoGrupo = $user['grupo'];
$acessoloja = $user['loja'];
//$acessoNivel = 2;
//$acessoProprietario = 1;
//$acessoGrupo = 'P';
//$acessoloja = 24;

if(isset($_GET['action'])){
  $action = $_GET['action'];
}
  
if($action == 'read'):
  //$lojaId = $_POST['loja'];
  //$lojaId = '1';

  $osStatus = '1';
  $arLojas = array();
  $contPp_OsTt = 0;
  $arProprietario = array();
  $arOss = array();

  
  $status              = '0';
  //$res['outros'] = $_POST;
  #tecnicoI----------------------------------------------------------------------------------------------------------------------------
  $tecI = array();
  $tecNivel = '0';
  $local= '2';
  $categoria= '1';
  $tecI = $osTecnicos->findTecStatus(  $tecId, $status );
  $tecII = $osControl->listOsTec($osId);
  $res['outros'] = $tecII;
  #PROPRITARIO-----------------------------------------------------------------------------------------
  foreach($proprietario->findAll() as $key => $value):if($value->id == $acessoProprietario && $value->ativo == '0' ) {
    $arProprietario['id'] = $value->id;
    #LOJAS---------------------------------------------------------------------------------------------
    $arLojas = array();
    
    foreach($lojas->findAll() as $key => $value):if($value->proprietario == $acessoProprietario && (( $acessoNivel > 1 && $acessoGrupo == 'P' ) || $value->id == $acessoloja )){


    }endforeach;
    $res['oss']= $arOss;
    #LOJAS---------------------------------------------------------------------------------------------
  }endforeach;
  #PROPRITARIO-----------------------------------------------------------------------------------------
  $res['osProprietario']= $arProprietario;
  $res['osLojas']= $arLojas;
  $res['error'] = false;

endif;

#OS_TEC_ADD
if($action == 'osTecAdd'):

  $os = $_POST['os'];
  $loja = $_POST['loja'];
  $tecnicos = $_POST['tecnicos'];

  $item = $osControl->insertOsTec( $tecnicos, $os , $loja);

  //$res['dados'] = $item;
  # Insert

  $res['error'] = $item['error']; 
  $res['message'] = $item['message'];
endif;

#OS_TEC_DEL
if($action == 'osTecDel'):

  $id = $_POST['id'];
  $os = $_POST['os'];

  $item = $osControl->deleteOsTec( $id, $os);

  $res['dados'] = $item;
  # Insert
  if( !$item['error'] ){
    $res['error'] = $item['error'];
    $res['message']= $item['message'];
  }else{
    $res['error'] = $item['error']; 
    $res['message'] = $item['message'];
  }
endif;

#DESLOCAMENTO----------------------------------------------------------------------
if($action == 'deslocamento'):
  $arMods = array();
  #Novo
  $os       = $_POST['os'];
  $tecnico = $_POST['tecnico'];
  $tecnicos = $_POST['tecnicos'];
  $tipo     = $_POST['tipo'];
  $status   = $_POST['status'];
  $date     = $_POST['date'];
  $km       = $_POST['km'];
  $valor    = $_POST['valor'];

  //$os                 = '1';
  //$tecnico['id']      = '1';
  //$tecnico2['id']     = '2';
  //$tecnicos[0]        = $tecnico;
  //$tecnicos[1]        = $tecnico2;
  //$tipo['id']         = '1';
  //$tipo['valor']      = '0.85';
  //$status['id']       = '8';
  //$status['categoria']= '2';
  //$status['processo'] = '8';
  //$date               = date("Y-m-d H:i:s");
  //$km                 = '30';
  //$valor              = '0';

  $stTeste = listOsTecModValidacao( $osId, $tecId, $statusId, $dtFinal, $tipoId, $tipoValor, $kmFinal, $valor );
  # tecnico----------------------------------------------------------------------------------------------------------------------------
  


  if($res['error'] == true){
    $res['message']= $arErros;
  }

endif;
#DESLOCAMENTO----------------------------------------------------------------------

#ATUALIZAR
if($action == 'teste'):
    
  $modId    = '150';
  $tecId    = '150';
  $tecName  = 'Fabio';
  
  $dtFinal  = "2018-03-15 13:00:00";

  //$res['outros'] = $_POST;
  #tecnicoI----------------------------------------------------------------------------------------------------------------------------
  
  $local      = '8';
  $categoria  = '1';
  $bem        = '';
  $data = "2018-03-15";
  


  //$etapaI = $oss->validarOs( $local, $categoria, $bem, $data );
  //$tecI = $osTecnicos->findTecStatus(  $tecId, $status );
  //$tecII = $mods->ModValidoII($tecId, $modId, $dtInicio, $dtFinal);
  //$tecIII = $mods->ModValidoIII($tecId, $modId, $dtInicio, $dtFinal);
  $tecII = $osControl->osEmail( $tecId );
  $res['II'] = $tecII;
  //$res['III'] = $tecIII;
  //$res['date'] = $date;
 
  //listOsTec
  
endif;

#DELETAR
if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
  
endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);