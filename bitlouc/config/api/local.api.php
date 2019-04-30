<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

require_once '_chave.php';
require_once '../control/localControl.php';

$localControl     = new LocalControl();

$res = array('error' => true);
$arErros = array();
$action = 'read';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}
  
if($action == 'read'):

  $item = $localControl->listProprietario();
  $res['locais'] = $item;
  $res['error'] = false;

endif;

#LOJA
if($action == 'loja'):

  $lojaId = $_POST['loja'];
  //$lojaId = '1';
  
  
  if($user['grupo'] == 'P'){
    $item = $localControl->listLoja( $lojaId );
  }else{
    $item = $localControl->listLoja( $user['loja'] );
  }
  $res['locais'] = $item;
  $res['error'] = false;
  
endif;

if($action == 'local'):
  $local_id = $_POST['local_id'];
  //$local_id = '130';
  $res = $localControl->find( $local_id );

endif;

#CRIAR_EDITAR-------------------------------------------------------------------------------
if($action == 'publish'):
  $loja_id          = $_POST['loja_id'];
  $proprietario_id  = $_POST['proprietario_id'];
  $tipo             = $_POST['tipo'];
  $regional         = $_POST['regional'];
  $name             = $_POST['name'];
  $municipio        = $_POST['municipio'];
  $uf               = $_POST['uf'];
  $lat              = $_POST['latitude'];
  $long             = $_POST['longitude'];
  $ativo            = $_POST['ativo'];
  $id               = $_POST['id'];
  if( $id == "" ):
    $id = NULL;
  endif;

  $res =  $localControl->publish( $loja_id, $proprietario_id, $tipo,  $regional, $name, $municipio,  $uf,  $lat,  $long, $ativo, $id );

endif;
#CRIAR_EDITAR-------------------------------------------------------------------------------



#GEOLOCALIZAÇÃO
if($action == 'coordenadas'):
  $id = $_POST['id'];
  $lat = $_POST['latitude'];
  $long = $_POST['longitude'];

  $item = $localControl->insertGeolocalizacao( $id, $lat, $long );
  $res = $item;
endif;

#DELETAR-----------------------------------------------------------------------------
if($action == 'deletar'):
  #delete
  $id = $_POST['id'];
  
  $item = $localControl->delete($id);
  $res = $item;

endif;
#DELETAR-----------------------------------------------------------------------------

#CATEGORIA-ATIVO----------------------------------------------------------------------
if($action == 'catStatus'):
  $ativo      = $_POST['ativo'];
  $locaCatId  = $_POST['id'];

  $item = $localControl->statusCategoria( $locaCatId, $ativo );
  $res = $item;

endif;
#CATEGORIA-ATIVO----------------------------------------------------------------------

#CATEGORIA-DELETAR----------------------------------------------------------------------
if($action == 'catDelete'):
  $locaCatId = $_POST['id'];

  $item = $localControl->deleteCategoria( $locaCatId );
  $res = $item;

endif;
#CATEGORIA-DELETAR----------------------------------------------------------------------

#CATEGORIA-CADASTRAR----------------------------------------------------------------------
if($action == 'catCadastrar'):

  $local_id   = $_POST['local_id'];
  $categorias = $_POST['categoria'];

  $item = $localControl->insertCategoria( $local_id, $categorias  );
  $res = $item;  

endif;
#CATEGORIA-CADASTRAR----------------------------------------------------------------------

header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);