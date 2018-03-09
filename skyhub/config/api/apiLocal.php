<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");

function __autoload($class_name){
  require_once '../classes/' . $class_name . '.php';
}

$usuarios = new Usuarios();
$loja = new Loja();
$lojaCategorias = new lojaCategorias();
$locais = new Locais();
$localCategorias = new LocalCategorias();
$bens = new Bens();
$bemLocalizacao = new BemLocalizacao();
$categorias = new Categorias();
$descricao = new Descricao();
$ativos = new Ativos();

$res = array('error' => true);
$arDados = array();
$arErros = array();
$action = 'read';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}
  
if($action == 'read'):
  $lojaId = $_POST['loja'];
  //$lojaId = '1';

  $arLocais = array();
  $arBens = array();
  #LOCAIS-----------------------------------------------------------------------------------
  foreach($locais->findAll() as $key => $value):if($value->loja == $lojaId) {
    $arLocal = (array) $value;
    $localId = $value->id;

    #LOCAL_CATEGORIA-------------------------------------------------------------------------
    $arCategorias = array();
    foreach($localCategorias->findAll() as $key => $value):if($value->local == $localId) {
      $catLacalCategoria = $value->categoria;
      $catLacalAtivo = $value->ativo;
      $catLacalId = $value->id;
      foreach($categorias->findAll() as $key => $value):if($value->id == $catLacalCategoria) {
        $arCategoria = (array) $value;
        $arCategoria['ativo'] = $catLacalAtivo;
        $arCategoria['catLocal'] = $catLacalId;
        array_push($arCategorias, $arCategoria );
      }endforeach;
    }endforeach;

    $arLocal['categoria']= $arCategorias;
    #LOCAL_CATEGORIA----------------------------------------------------------------------------

    #LOCAIS_BENS-----------------------------------------------------------------------------------
    $status = 3;
    foreach($bemLocalizacao->findAll() as $key => $value):if($value->local == $localId && $value->status <= $status ) {
      $bemId = $value->bem;
      $bemStatus= $value->status;
      foreach($bens->findAll() as $key => $value):if($value->id == $bemId) {
        $arBem = (array) $value; //Bem
        $arBem['loja']= $lojaId;
        $arBem['local']= $localId;
        $arBem['status']=$bemStatus;
        foreach($categorias->findAll() as $key => $value):if($value->id == $arBem['categoria']) {
          $arBem['categoria'] = $value;
        }endforeach;
        array_push($arBens, $arBem );
        
      }endforeach;
    }endforeach;
    #LOCAIS_BENS-----------------------------------------------------------------------------------
    array_push($arLocais, $arLocal );
  }endforeach;
  #LOCAIS-------------------------------------------------------------------------------------------
  $res['locais']= $arLocais;
  $res['bens']= $arBens;
  //$arDados = $arLocal;
  $res['error'] = false;

endif;

#LOJA
if($action == 'loja'):
  $dados = array();
  $lojaId = $_POST['lojaId'];
  //$lojaId = 2;

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

#GEOLOCALIZAÇÃO
if($action == 'coordenadas'):
  $id = $_POST['id'];
  $lat = $_POST['latitude'];
  $long = $_POST['longitude'];

  $locais->setLat($lat);
  $locais->setLong($long);

  if($locais->geolocalizacso($id)){
    $res['error'] = false;
    $res['message']= "OK, dados salvo com sucesso";
  }else{
    $res['error'] = true; 
    $res['message'] = "Error, nao foi possivel salvar os dados";      
  }
endif;

#CADASTRAR
if($action == 'cadastrar'):
  $loja = $_POST['loja'];
  $tipo = $_POST['tipo'];
  $regional = $_POST['regional'];
  $name = $_POST['name'];
  $municipio = $_POST['municipio'];
  $uf = $_POST['uf'];
  $lat = $_POST['latitude'];
  $long = $_POST['longitude'];
  $ativo = $_POST['ativo'];
  $categoria = '';
  if( isset($_POST['categoria']) ):
    $categoria = json_encode($_POST['categoria'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
  endif;

  $locais->setLoja($loja);
  $locais->setTipo($tipo);
  $locais->setRegional($regional);
  $locais->setName($name);
  $locais->setMunicipio($municipio);
  $locais->setUf($uf);
  $locais->setLat($lat);
  $locais->setLong($long);
  $locais->setAtivo($ativo);
  $locais->setCategoria($categoria);
  # Insert
  if($locais->insert()){
    $res['error'] = false;
    $res['message']= "OK, dados salvo com sucesso";
  }else{
    $res['error'] = true; 
    $res['message'] = "Error, nao foi possivel salvar os dados";      
  }
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

#DELETAR-----------------------------------------------------------------------------
if($action == 'deletar'):
  #delete
  $id = $_POST['id'];
  if($lojas->delete($id)){
    if($localCategorias->deleteLocal($id)){
    $res['error'] = false;
    $arDados = "OK, registro deletado";
    $res['message']= $arDados;
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
  $ativo = $_POST['ativo'];
  $id = $_POST['id'];

  $localCategorias->setAtivo($ativo);

  if($localCategorias->update($id)){
    $res['error'] = false;
    $arDados = "OK, dados atualisado com sucesso";
    $res['message']= $arDados;
  }else{
    $res['error'] = true; 
    $arError = "Error, nao foi possivel salvar os dados";
    array_push($arErros, $arError);
  }
endif;
#CATEGORIA-ATIVO----------------------------------------------------------------------

#CATEGORIA-DELETAR----------------------------------------------------------------------
if($action == 'catDelete'):
  $id = $_POST['id'];

  if($localCategorias->delete($id)){
    $res['error'] = false;
    $arDados = "OK, dados deleto com sucesso";
    $res['message']= $arDados;
  }else{
    $res['error'] = true; 
    $arError = "Error, nao foi possivel realisar operação";
    array_push($arErros, $arError);
  }
endif;
#CATEGORIA-DELETAR----------------------------------------------------------------------

#CATEGORIA-CADASTRAR----------------------------------------------------------------------
if($action == 'catCadastrar'):
  #Novo
  $local  = $_POST['local'];
  $categoria = $_POST['categoria'];
  foreach ( $categoria as $data){
    $itemId = $data['id'];
    $duplicado = false;
    foreach($localCategorias->findAll() as $key => $value): {
      $catLacalCategoria = $value->categoria;
      $catLacalLocal = $value->local;
      
      if($local == $catLacalLocal){
        if($itemId == $catLacalCategoria ):
          $duplicado = true;
        endif;
      }          
    }endforeach;
    if( !$duplicado ){
      $localCategorias->setLocal($local);
      $localCategorias->setCategoria($itemId);
      # Insert
      if($localCategorias->insert()){
        $res['error'] = false;
        $arDados = "OK, dados salvo com sucesso";
        $res['message']= $arDados;
      }else{
        $res['error'] = true; 
        $arError = "Error, nao foi possivel salvar os dados";
        array_push($arErros, $arError);
      }
    }else{
      $res['error'] = true; 
      $arError = "Error, item já cadastrado";
      array_push($arErros, $arError);
    }
  }
    
  if($res['error'] == true){
    $res['message']= $arErros;
  }

endif;
#CATEGORIA-CADASTRAR----------------------------------------------------------------------


$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);