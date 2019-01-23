<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

require_once '_chave.php';
require_once '../control/osControl.php';
require_once '../control/notaControl.php';

$osControl    = new OsControl();
$notaControl  = new NotaControl();

$res = array('error' => true);
$action = 'read';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}
  
if($action == 'read'):

  $item = $osControl->listProprietario( $acessoProprietario );
  $res['oss']   = $item;
  $res['error'] = false;

endif;

#LOJA
if($action == 'loja'):


  
endif;

if($action == 'local'):


endif;

#CRIAR_EDITAR-------------------------------------------------------------------------------
if($action == 'publish'):
  $proprietario_id  = $_POST['proprietario_id'];
  $loja_id          = $_POST['loja_id'];
  $loja_nick        = $_POST['loja_nick'];
  $local_id         = $_POST['local_id'];
  $uf               = $_POST['uf'];
  $equipamento_id   = $_POST['equipamento_id'];
  $categoria_id     = $_POST['categoria_id'];
  $servico_id       = $_POST['servico_id'];
  $data             = $_POST['data'];
  $dtCadastro       = $_POST['dtCadastro'];
  $ativo            = $_POST['ativo'];
  $id               = $_POST['id'];

  if( $id == "" ):
    $id = NULL;
  endif;
  if( $equipamento_id == "" ):
    $equipamento_id = '0';
  endif;

  $res =  $osControl->publish( 
    $proprietario_id,
    $loja_id,
    $loja_nick,
    $local_id,
    $uf,
    $equipamento_id,
    $categoria_id,
    $servico_id,
    $data,
    $dtCadastro,
    $ativo,
    $id
  );

endif;
#CRIAR_EDITAR-------------------------------------------------------------------------------
if($action == 'semAmaracao'):

  $item = $osControl->findAmarar();
  $res['oss']   = $item;
  $res['error'] = false;

  
endif;


#GEOLOCALIZAÇÃO
if($action == 'status'):
  $status = $_POST['status'];
  //$status = '6';
  $item = $osControl->findStatus( $status );
  $res['oss']   = $item;
  $res['error'] = false;

endif;

#DELETAR-----------------------------------------------------------------------------

#DELETAR-----------------------------------------------------------------------------

#CATEGORIA-ATIVO----------------------------------------------------------------------
if($action == 'osStatus'):
  
  $os_id        = $_POST['os_id'];
  $status       = $_POST['status'];

  $res =  $osControl->status( $status, $os_id );
  
endif;
#CATEGORIA-ATIVO----------------------------------------------------------------------

#CATEGORIA-DELETAR----------------------------------------------------------------------

#CATEGORIA-DELETAR----------------------------------------------------------------------

#CATEGORIA-CADASTRAR----------------------------------------------------------------------

#CATEGORIA-CADASTRAR----------------------------------------------------------------------

header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);