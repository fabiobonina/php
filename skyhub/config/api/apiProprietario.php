<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");

function __autoload($class_name){
  require_once '../classes/' . $class_name . '.php';
}

#PROPRIETARIO
$proprietario = new Proprietario();
#LOJA
$loja = new Loja();
$lojaCategorias = new LojaCategorias();
#LOCAL
$locais = new Locais();
$localCategorias = new LocalCategorias();
#EQUIPAMENTOS
$bens = new Bens();
$bemLocalizacao = new BemLocalizacao();
$categorias = new Categorias();
$usuarios = new Usuarios();
$ativos = new Ativos();


$res = array('error' => true);
$arDados = array();
$action = 'read';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}
$res['user'] = $user;
$acessoNivel = $user['nivel'];
$acessoProprietario = $user['proprietario'];
$acessoGrupo = $user['grupo'];
$acessoloja = $user['loja'];
//$acessoNivel = 2;
//$acessoProprietario = 1;
//$acessoGrupo = 'c';
//$acessoloja = 1;

if($action == 'read'):
  //$acessoProprietario = $_POST['acessoProprietario'];

  #PROPRITARIO--------------------------------------------------------------------------------------------------------------------------------------
  $arLojas = array();
  $arrayLocais = array();
  $arBens = array();
  foreach($proprietario->findAll() as $key => $value):if($value->id == $acessoProprietario && $value->ativo == '0' ) {
    $arProprietario = (array) $value;

    $contPp_localTt = 0;
    $contPp_localGeo = 0;
    $contPp_bemTt = 0;
    #LOJAS-------------------------------------------------------------------------------------
    foreach($loja->findAll() as $key => $value):
      if($value->proprietario == $acessoProprietario && $value->ativo == '0' && (( $acessoNivel > 1 && $acessoGrupo == 'P' ) || $value->id == $acessoloja )){
      $arLoja = (array) $value;//Loja
      $lojaId = $value->id;
      $lojaName = $value->name;

      $contLj_localGeo = 0;
      $contLj_localTt = 0;
      $contLj_bemTt = 0;
      #LOCAIS-----------------------------------------------------------------------------------
      foreach($locais->findAll() as $key => $value):if($value->loja == $lojaId) {
        $arLocal = (array) $value;
        $localId = $value->id;
        $arLocal['lojaNick'] = $lojaName;
        $contPp_localTt++;//CONTADOR LOCAIS PROPRIEDADE
        $contLj_localTt++;//CONTADOR LOCAIS LOJA
        if( $value->latitude <> 0.00000 && $value->longitude <> 0.00000){
          $contPp_localGeo++;//CONTADOR COORDENADAS PROPRIEDADE
          $contLj_localGeo++;//CONTADOR COORDENADAS LOJA
        }
        #LOCAL_CATEGORIA-------------------------------------------------------------------------
        $arCategorias = array();
        foreach($localCategorias->findAll() as $key => $value):if($value->local == $localId) {
          $catLacalCategoria = $value->categoria;
          $catLacalAtivo = $value->ativo;
          $catLacalId = $value->id;
          foreach($categorias->findAll() as $key => $value):if($value->id == $catLacalCategoria) {
            $arCategoria = (array) $value;
            $arCategoria['ativo'] = $catLacalAtivo;
            $arCategoria['id'] = $catLacalId;
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
            $contPp_bemTt++;
            $contLj_bemTt++;
          }endforeach;
        }endforeach;
        #LOCAIS_BENS-----------------------------------------------------------------------------------
        array_push($arrayLocais, $arLocal);
      }endforeach;
      #LOCAIS-------------------------------------------------------------------------------------------
      if($contLj_localTt > 0){
        $geoStatus = round(($contLj_localGeo/$contLj_localTt)*100, 1);
      }else{
        $geoStatus = 0;
      }
      //$arLoja['locais']= $arrayLocais;
      $arLoja['locaisQt']= $contLj_localTt;
      $arLoja['locaisGeoQt']= $contLj_localGeo;
      $arLoja['locaisGeoStatus']= $geoStatus;
      $arLoja['bensQt']= $contLj_bemTt;
      
      #LOJA_CATEGORIA-----------------------------------------------------------------------------
      $arCategorias = array();
      foreach($lojaCategorias->findAll() as $key => $value):if($value->loja == $lojaId) {
        $catLjCategoria = $value->categoria;
        $catLjAtivo = $value->ativo;
        $catLjId = $value->id;
        foreach($categorias->findAll() as $key => $value):if($value->id == $catLjCategoria) {
          $arCategoria = (array) $value;
          $arCategoria['ativo'] = $catLjAtivo;
          $arCategoria['id'] = $catLjId;
          array_push($arCategorias, $arCategoria );
        }endforeach;
      }endforeach;
      $arLoja['categoria']= $arCategorias;
      #LOJA_CATEGORIA------------------------------------------------------------------------------
      
      array_push($arLojas, $arLoja);
    }endforeach;
    #LOJA--------------------------------------------------------------------------------------------
    if($contPp_localTt > 0){
      $geoStatus = round(($contPp_localGeo/$contPp_localTt)*100, 1);
    }else{
      $geoStatus = 0;
    }
    $arProprietario['locaisQt']= $contPp_localTt;
    $arProprietario['locaisGeoQt']= $contPp_localGeo;
    $arProprietario['locaisGeoStatus']= $geoStatus;
    $arProprietario['bemsQt']= $contPp_bemTt;
  }endforeach;
  
  //$res['bens']= $arBens;
  $res['locais']= $arrayLocais;
  $res['lojas']= $arLojas;
  //$arDados = $arLocal;
  $res['proprietarios'] = $arProprietario;
  $res['error'] = false;
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
#PROPRITARIO--------------------------------------------------------------------------------------------------------------------------------------  
endif;


$res['dados'] = $arDados;
//$res = array_map('htmlentities' , $res);

header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);