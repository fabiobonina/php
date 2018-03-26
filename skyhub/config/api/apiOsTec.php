<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");
include('../function/osFunction.php');

function __autoload($class_name){
  require_once '../classes/' . $class_name . '.php';
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
$osFunction   = new OsFunction();

$res     = array('error' => true);
$arDados = array();
$arErros = array();
$action  = 'teste';

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
  #PROPRITARIO-----------------------------------------------------------------------------------------
  foreach($proprietario->findAll() as $key => $value):if($value->id == $acessoProprietario && $value->ativo == '0' ) {
    $arProprietario['id'] = $value->id;
    #LOJAS---------------------------------------------------------------------------------------------
    $arLojas = array();
    
    foreach($lojas->findAll() as $key => $value):if($value->proprietario == $acessoProprietario && (( $acessoNivel > 1 && $acessoGrupo == 'P' ) || $value->id == $acessoloja )){
      $arLoja = (array) $value;
      $lojaId = $value->id;
      
      $contLj_OsTt = 0;
      #OSS--------------------------------------------------------------------------------------------
      $estado = 3;
      foreach($oss->findAll() as $key => $value):if($value->loja == $lojaId && $value->estado < $estado) {
        $arOs = (array) $value;
        
        $osId = $value->id;
        $localId = $value->local;
        $bemId = $value->bem;
        $servId = $value->servico;
        
        $contPp_OsTt++;
        $contLj_OsTt++;

        #LOCAIS-------------------------------------------------------------------------------------------
        foreach($locais->findAll() as $key => $value):if($value->id == $localId) {
          $arLocal = (array) $value;
          $arOs['local']= $arLocal;
        }endforeach;
        #LOCAIS-------------------------------------------------------------------------------------------
        
        #BEM---------------------------------------------------------------------------------------------
        foreach($bens->findAll() as $key => $value):if($value->id == $bemId) {
          $arBem = (array) $value; //Bem
          $arOs['bem']= $arBem;
        }endforeach;
        #BEM---------------------------------------------------------------------------------------------

        #SERVICOS----------------------------------------------------------------------------------------
        foreach($servicos->findAll() as $key => $value):if($value->id == $servId)  {
          $arItem = $value;
          $arOs['servico'] = $arItem;
        }endforeach;
        #SERVICOS----------------------------------------------------------------------------------------

        #OSTECNICOS--------------------------------------------------------------------------------------------
        $arTecnicos = array();
        foreach($osTecnicos->findAll() as $key => $value):if($value->os == $osId)  {
          $arTecnico = (array) $value;
          $idTecnico = $value->tecnico;
          #MODS--------------------------------------------------------------------------------------------
          $arMods = array();
          foreach($mods->findAll() as $key => $value):if($value->os == $osId && $value->tecnico == $idTecnico)  {
            $arItem = $value;
            array_push($arMods, $arItem);
          }endforeach;
          $arTecnico['mods'] = $arMods;
          #MODS--------------------------------------------------------------------------------------------
          //$arTecnico = $value;
          array_push($arTecnicos, $arTecnico);
        }endforeach;
        $arOs['tecnicos'] = $arTecnicos;
        #OSTECNICOS--------------------------------------------------------------------------------------------
        
        array_push($arOss, $arOs);
      }endforeach;
      
      #OSS--------------------------------------------------------------------------------------------
      $arLoja['osQt']= $contLj_OsTt;
      $arProprietario['osQt']= $contPp_OsTt;

      if($contLj_OsTt > 0){
        array_push($arLojas, $arLoja );   
      }
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

  $item = $osFunction->insertOsTec( $tecnicos, $os , $loja);

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

#OS_TEC_DEL
if($action == 'osTecDel'):

  $id = $_POST['id'];
  $os = $_POST['os'];

  $item = $osFunction->deleteOsTec( $id, $os);

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
    
  $dt1 = '1';
  $dtFinal  = date("2018-03-01 10:10:00");
  $kmFinal = '30';
  $osId = '1';
  $tecId = '1';
  $ativo = '0';
  $tipoId         = '1';
  $tipoValor      = '0.85';
  $statusId       = '4';
  $status['categoria']= '2';
  $status['processo'] = '4';
  $status['id']       = '1';
  $status['categoria']= '1';
  $status['processo'] = '1';
  $date               = date("2018-03-01 07:30:00");
  $km                 = '1';
  //$status['id']       = '4';
  //$status['categoria']= '2';
  //$status['processo'] = '4';
  //$date               = date("2018-03-01 08:00:00");
  //$km                 = '30';
    //$data = $mods->findOsTecAtiv( $osId, $tecId, $ativo );
    $stTeste = listOsTecModValidacao( $osId, $tecId, $statusId, $dtFinal, $tipoId, $tipoValor, $kmFinal, $valor );
			#MODS--------------------------------------------------------------------------------------------
			
			#MODS--------------------------------------------------------------------------------------------
    //$data = $deslocStatus->findAll();    
    //$res['error'] = false;
    $res['message']= $data;
    
  
endif;

#DELETAR
if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
  
endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);