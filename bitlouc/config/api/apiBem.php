<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");
require_once '../function/EquipamentosFunction.php';



function __autoload($class_name){
  require_once '../classes/' . $class_name . '.php';
}

$usuarios         = new Usuarios();
$loja             = new Loja();
$lojaCategoria    = new LojaCategorias();
$locais           = new Locais();
$localCategorias  = new LocalCategorias();
$bens             = new Bens();
$bemLocalizacao   = new BemLocalizacao();
$categorias       = new Categorias();
$descricao        = new Descricao();
$ativos           = new Ativos();
$equiFunction     = new EquipamentosFunction();

$res = array('error' => true);
$arDados = array();
$action = 'cadastrar';

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
      $categoriaId = $value->categoria;
      foreach($categorias->findAll() as $key => $value):if($value->id == $categoriaId) {
        $arCategoria = (array) $value;
        array_push($arCategorias, $arCategoria );
      }endforeach;
    }endforeach;

    $arLocal['categoria']= $arCategorias;
    #LOCAL_CATEGORIA----------------------------------------------------------------------------

    #LOCAIS_BENS-----------------------------------------------------------------------------------
    $status = 3;
    foreach($bemLocalizacao->findAll() as $key => $value):if($value->local == $localId && $value->status <= $status ) {
      $bemId = $value->bem;
      foreach($bens->findAll() as $key => $value):if($value->id == $bemId) {
        $arBem = (array) $value; //Bem
        $arBem['loja']= $lojaId;
        $arBem['local']= $localId;
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
  $produto            = $_POST['produto'];
  $tag                = $_POST['tag'];
  $name               = $_POST['name'];
  $modelo             = $_POST['modelo'];
  $fabricante         = $_POST['fabricante'];
  $fabricanteNick     = $_POST['fabricanteNick'];
  $proprietario       = $_POST['proprietario'];
  $proprietarioNick   = $_POST['proprietarioNick'];
  $proprietarioLocal  = $_POST['proprietarioLocal'];
  $categoria          = $_POST['categoria'];
  $numeracao          = $_POST['numeracao'];
  $plaqueta           = $_POST['plaqueta'];
  $dataFab            = $_POST['dataFab'];
  $dataCompra         = $_POST['dataCompra'];
  $loja               = $_POST['loja'];
  $local              = $_POST['local'];
  $ativo              = $_POST['ativo'];

  /*$produto = '1';
  $tag = 'tag';
  $name = 'name';
  $modelo = 'modelo';
  $numeracao = 'numeracao';
  $fabricante = '1';
  $fabricanteNick = 'fabricanteNick';
  $proprietario = '1';
  $proprietarioNick = 'proprietarioNick';
  $proprietarioLocal = '2';
  $categoria = '1';
  $plaqueta = '10101010';
  $dataFab = date("Y-m-d");
  $dataCompra = date("Y-m-d");
  $ativo = '0';*/

  $item = $equiFunction->insertSistema(
    $produto,
    $tag,
    $name,
    $modelo,
    $fabricante,
    $fabricanteNick,
    $proprietario,
    $proprietarioNick,
    $proprietarioLocal,
    $categoria,
    $numeracao,
    $plaqueta,
    $dataFab,
    $dataCompra,
    $loja,
    $local,
    $ativo
  );
  # Insert
  if( $item ){
    $res['error'] = false;
    $res['message']= "OK, dados salvo com sucesso";
  }else{
    $res['error'] = true; 
    $res['message'] = "Error, nao foi possivel salvar os dados";      
  }
endif;

#ATUALIZAR
if(isset($_POST['atualizar'])):

  $id = $_POST['id'];
  $cliente = $_POST['cliente'];
  $regional = $_POST['regional'];
  $nome = $_POST['nome'];
  $municipio = $_POST['municipio'];
  $uf = $_POST['uf'];
  $lat = $_POST['lat'];
  $long =$_POST["long"];
  $ativo =$_POST["ativo"];

  $locais->setCliente($cliente);
  $locais->setRegional($regional);
  $locais->setNome($nome);
  $locais->setMunicipio($municipio);
  $locais->setUf($uf);
  $locais->setLat($lat);
  $locais->setLong($long);
  $locais->setAtivo($ativo);

  if($locais->update($id)){
    echo '<div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Atualizado com sucesso!</strong> Redirecionando ...
      </div>';
    header("Refresh: 1, ".$redirecionar_1);
  }
endif;

#DELETAR
if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
  $id = (int)$_GET['id'];
  if($locais->delete($id)){
    echo '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Deletado com sucesso!</strong> Redirecionando ...
        </div>';
    header("Refresh: 1, ".$redirecionar_1);
  }
endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res);