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
//$acessoNivel = $user['nivel'];// $user >  include("_chave.php");
//$acessoProprietario = $user['proprietario']
//$acessoGrupo = $user['grupo']
//$acessoloja = $user['loja']
$acessoNivel = 2;
$acessoProprietario = 1;
$acessoGrupo = 'P';
$acessoloja = 1;

if($action == 'read'):
  //$acessoProprietario = $_POST['acessoProprietario'];

  #PROPRITARIO
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

      $contLj_localGeo = 0;
      $contLj_localTt = 0;
      $contLj_bemTt = 0;
      #LOCAIS-----------------------------------------------------------------------------------
      foreach($locais->findAll() as $key => $value):if($value->loja == $lojaId) {
        $arLocal = (array) $value;
        $localId = $value->id;

        $contPp_localTt++;//CONTADOR LOCAIS PROPRIEDADE
        $contLj_localTt++;//CONTADOR LOCAIS LOJA
        if( $value->latitude <> 0.00000 && $value->longitude <> 0.00000){
          $contPp_localGeo++;//CONTADOR COORDENADAS PROPRIEDADE
          $contLj_localGeo++;//CONTADOR COORDENADAS LOJA
        }

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

        array_push($arrayLocais, $arLocal );

        #LOCAIS_BENS-----------------------------------------------------------------------------------
        $status = 3;
        foreach($bemLocalizacao->findAll() as $key => $value):if($value->local == $localId && $value->status <= $status ) {
          $bemId = $value->bem;
          $bemId = $value->bem;
          foreach($bens->findAll() as $key => $value):if($value->id == $bemId) {
            $arBem = (array) $value; //Bem
            $arBem['loja']= $lojaId;
            $arBem['local']= $localId;
            array_push($arBens, $arBem );
        
            $contPp_bemTt++;
            $contLj_bemTt++;
            
          }endforeach;
        }endforeach;
        #LOCAIS_BENS-----------------------------------------------------------------------------------
        
      }endforeach;
      #LOCAIS-------------------------------------------------------------------------------------------
      $locaisTtLj = count($arrayLocais);
      if($locaisTtLj > 0){
        $geoStatus = round(($contLj_localGeo/$locaisTtLj)*100, 1);
      }else{
        $geoStatus = 0;
      }
      //$arLoja['locais']= $arrayLocais;
      $arLoja['locaisQt']= $locaisTtLj;
      $arLoja['locaisGeoQt']= $contLj_localGeo;
      $arLoja['locaisGeoStatus']= $geoStatus;
      $arLoja['bensQt']= $geoStatus;
      
      #LOJA_CATEGORIA-----------------------------------------------------------------------------
      $arCategorias = array();
      foreach($lojaCategorias->findAll() as $key => $value):if($value->loja == $lojaId) {
        $categoriasId = $value->categoria;
        foreach($categorias->findAll() as $key => $value):if($value->id == $categoriasId) {
          $arCategoria = (array) $value;
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
    $arProprietario['bemsQt']= $geoStatus;
  }endforeach;
  
  /*/$localId = '2';
  foreach($locais->findAll() as $key => $value):if($value->id == $localId) {
    $arLocal = (array) $value;
    $lojaId = $value->loja;

    foreach($loja->findAll() as $key => $value):if($value->id == $lojaId) {
      $arLoja = (array) $value; //Loja
    }endforeach;
    $arLocal['loja']= $arLoja;

    $arBens = array();
    $status = 1;
    foreach($bemLocalizacao->findAll() as $key => $value):if($value->local == $localId && $value->status == $status) {
      $bemId = $value->bem;
      foreach($bens->findAll() as $key => $value):if($value->id == $bemId) {
        $arBem = (array) $value; //Bem
        array_push($arBens, $arBem );
      }endforeach;
    }endforeach;
    $arLocal['bens']= $arBens;

    //Montar Array grupos----------------------------------------------------
    $arCategorias = array();
    foreach($localCategorias->findAll() as $key => $value):if($value->local == $localId) {
      $categoriaId = $value->categoria;
      foreach($categorias->findAll() as $key => $value):if($value->id == $categoriaId) {
        $arCategoria = (array) $value;
        array_push($arCategorias, $arCategoria );
      }endforeach;
    }endforeach;

    $arLocal['categoria']= $arCategorias;
    //Montar Array grupos----------------------------------------------------
    
  }endforeach; */
  $res['bens']= $arBens;
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

  $locais->setLoja($loja);
  $locais->setTipo($tipo);
  $locais->setRegional($regional);
  $locais->setName($name);
  $locais->setMunicipio($municipio);
  $locais->setUf($uf);
  $locais->setLat($lat);
  $locais->setLong($long);
  $locais->setAtivo($ativo);
  # Insert
  if($locais->insert()){
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
//$res = array_map('htmlentities' , $res);

header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);