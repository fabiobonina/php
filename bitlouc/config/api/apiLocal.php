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

  $item = $localControl->listLocal();
  $res['locais'] = $item;
  $res['error'] = false;

endif;

#LOJA
if($action == 'loja'):

  //$lojaId = $_POST['loja'];
  $lojaId = '1';
  $item = $localControl->listLocalLoja( $lojaId );
  $res['locais'] = $item;
  $res['error'] = false;
  
endif;

#CADASTRAR
if($action == 'cadastrar'):
  $loja       = $_POST['loja'];
  $tipo       = $_POST['tipo'];
  $regional   = $_POST['regional'];
  $name       = $_POST['name'];
  $municipio  = $_POST['municipio'];
  $uf         = $_POST['uf'];
  $lat        = $_POST['latitude'];
  $long       = $_POST['longitude'];
  $ativo      = $_POST['ativo'];
  $categorias = $_POST['categorias'];


  $item = $equiControl->insertLocal(
    $loja,
    $tipo,
    $regional,
    $name,
    $municipio,
    $uf,
    $lat,
    $long,
    $categorias,
    $ativo
  );
  
  $res = $item;
  
endif;

#EDITAR-----------------------------------------------------------------------------
if($action == 'editar'):
  #editar
  $id = $_POST['id'];
  $tipo = $_POST['tipo'];
  $regional = $_POST['regional'];
  $name = $_POST['name'];
  $municipio = $_POST['municipio'];
  $uf = $_POST['uf'];
  $lat = $_POST['latitude'];
  $long = $_POST['longitude'];
  $ativo = $_POST['ativo'];
  
  $locais->setTipo($tipo);
  $locais->setRegional($regional);
  $locais->setName($name);
  $locais->setMunicipio($municipio);
  $locais->setUf($uf);
  $locais->setLat($lat);
  $locais->setLong($long);
  $locais->setAtivo($ativo);

  if($locais->update($id)){
    $res['error'] = false;
    $arDados = "OK, dados registrado com sucesso";
    $res['message']= $arDados;
  }else{
    $res['error'] = true; 
    $arError = "Error, nao foi possivel salvar os dados";
    array_push($arErros, $arError);
  }

  if( ($res['error'] == true) && (isset($arErros)) ){
    $res['message']= $arErros;
  }
endif;
#EDITAR-----------------------------------------------------------------------------
#GEOLOCALIZAÇÃO
if($action == 'coordenadas'):
  $id = $_POST['id'];
  $lat = $_POST['latitude'];
  $long = $_POST['longitude'];

  
  $item = $localControl->insertLocalGeolocalização( $id, $lat, $long );
  $res = $item;
endif;

#DELETAR-----------------------------------------------------------------------------
if($action == 'deletar'):
  #delete
  $id = $_POST['id'];
  if($locais->delete($id)){
    if($localCategorias->deleteLocal($id)){
      $res['error'] = false;
      $res['message']= "OK, registro deletado";
    }else{
      $res['error'] = true; 
      $arError = "Error, nao foi possivel deletar os dados";
      array_push($arErros, $arError);
    }
  }else{
    $res['error'] = true; 
    $arError = "Error, nao foi possivel deletar os dados";
    array_push($arErros, $arError);
  }

  if( ($res['error'] == true) && (isset($arErros)) ){
    $res['message']= $arErros;
  }

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
  #Novo
  $local      = $_POST['local'];
  $categorias = $_POST['categoria'];

  $item = $localControl->statusCategoria( $locaCatId, $ativo );
  $res = $item;  

endif;
#CATEGORIA-CADASTRAR----------------------------------------------------------------------

header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);