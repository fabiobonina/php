<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

require_once '_chave.php';
require_once '../control/proprietarioControl.php';
require_once '../control/lojaControl.php';
require_once '../control/osControl.php';
require_once '../control/UFControl.php';

$proprietarioControl  = new ProprietarioControl();
$lojaControl          = new LojaControl();
$osControl            = new OsControl();
$ufControl            = new UFControl();

$res = array('error' => true);
$arDados = array();
$action = 'read';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

$res['user'] =  $user;

if( !$user['error'] ):
  $acessoID           = $user['id'];
  $acessoUF           = $user['uf'];
  $acessoNivel        = $user['nivel'];
  $acessoProprietario = $user['proprietario'];
  $acessoGrupo        = $user['grupo'];
  $acessoloja         = $user['loja'];
  //$acessoID = '1';
  //$acessoUF = 'PE';
  //$acessoNivel = 2;
  //$acessoProprietario = 1;
  //$acessoGrupo = 'P';
  //$acessoloja = 1;
  if($action == 'logout'):

  endif;

  if($action == 'read'):

    #PROPRITARIO--------------------------------------------------------------------------------------------------------------------------------------
    $arProprietario = array();
    $arLojas = array();
    $arrayLocais = array();
    $arBens = array();
    
    $item   = $proprietarioControl->listProprietario( $acessoProprietario, $acessoNivel, $acessoGrupo, $acessoloja );

    if($item['error'] == true ){
      $res = $item;
    }else{
      $res['proprietarios'] = $item['dados'];
      $res['osUF']  = $ufControl->listStatusUFProprietario( $acessoProprietario);
      if($acessoGrupo == 'P'){
        
        if($acessoNivel >= 3){
          $res['lojas'] = $lojaControl->listProprietario( $acessoProprietario );
          $res['oss']   = $osControl->listIIIProprietario( $acessoloja );
        }elseif ( $acessoNivel == 2 ) {
          $res['lojas']       = $lojaControl->listProprietario( $acessoProprietario );
          $res['oss']         = $osControl->listTec( $acessoID,  $acessoUF);
        }else{
          $res['lojas']       = $lojaControl->list( $acessoloja );
          $res['oss']         = $osControl->listIIILoja( $acessoloja );
        }
        
      }else{
        $res['lojas'] = $lojaControl->list( $acessoloja );
        $res['oss']   = $osControl->listIIILoja( $acessoloja );
        $res['osUF']  = $ufControl->listStatusUFProprietario( $acessoProprietario);
      }
      
      $res['error']         = false;
    }
    
  endif;

  #LOJA
  if($action == 'loja'):
    $dados = array();
    $lojaId = $_POST['lojaId'];

    foreach($loja->findAll() as $key => $value):if($value->id == $lojaId) {
      $loja = (array) $value;
      $locais = array();
      foreach($locais->findAll() as $key => $value):if($value->loja == $lojaId) {
        $local = (array) $value;
        array_push($locais, $local );
      }endforeach;

      $loja['locais']= $locais;
      $dados = $loja;
    }endforeach;
  endif;

endif;
$res['dados'] = $arDados;
//$res = array_map('htmlentities' , $res);

header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);