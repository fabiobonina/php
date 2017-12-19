<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

function __autoload($class_name){
  require_once '../classes/' . $class_name . '.php';
}

$proprietario = new Proprietario();

$loja = new Loja();
$lojaCategoria = new LojaCategorias();

$locais = new Locais();
$localCategorias = new LocalCategorias();
$equipamentos = new Equipamentos();
$eqLocalizacao = new EqLocalizacao();
$categorias = new Categorias();

$usuarios = new Usuarios();
$ativos = new Ativos();

$res = array('error' => true);
$arDados = array();
$action = 'read';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}



if($action == 'read'):

  //$proprietarioId = $_POST['proprietarioId'];
  $proprietarioId = '1';
  $arLojas = array();
  foreach($proprietario->findAll() as $key => $value):if($value->id == $proprietarioId && $value->ativo == '0') {
    $arProprietario = (array) $value;
  }endforeach;
  
  $arLojas['proprietario']= $arProprietario;
  //$localId = $_POST['idLocal'];

  $localId = '2';

  
  foreach($locais->findAll() as $key => $value):if($value->id == $localId) {
    $arLocal = (array) $value;
    $lojaId = $value->loja;

    foreach($loja->findAll() as $key => $value):if($value->id == $lojaId) {
      $arLoja = (array) $value; //Loja
    }endforeach;
    $arLocal['loja']= $arLoja;

    $arEquipamentos = array();
    $status = 1;
    foreach($eqLocalizacao->findAll() as $key => $value):if($value->local == $localId && $value->status == $status) {
      $equipId = $value->equipamento;
      foreach($equipamentos->findAll() as $key => $value):if($value->id == $equipId) {
        $arEquipamento = (array) $value; //Bem
        array_push($arEquipamentos, $arEquipamento );
      }endforeach;
    }endforeach;
    $arLocal['equipamento']= $arEquipamentos;

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

  }endforeach;
  $arDados = $arLocal;
  $arDados = $arLojas;
  $res['error'] = false;
  //Montar Array lojas------------------------------------------------------------
  /*$arLojas = array();
  foreach($loja->findAll() as $key => $value): {
    
    $arLoja = (array) $value; //Loja
    $lojaId = $value->id;

    //Montar Array locais-------------------------------------------------------
    $arrayLocais = array();
    $cont_localGeo = 0;
    $arLocalGrupo = array();
    foreach($locais->findAll() as $key => $value):if($value->loja == $lojaId) {
      
      $arLocal = (array) $value;
      $localId = $value->id;

      if( $value->latitude <> 0.00000 && $value->longitude <> 0.00000){
        $cont_localGeo++;
      }

      //Montar Array grupos----------------------------------------------------
      $arGrupos = array();
      foreach($locaisGrupos->findAll() as $key => $value):if($value->local == $localId) {
        $grupoId = $value->grupo;
        foreach($categorias->findAll() as $key => $value):if($value->id == $grupoId) {
          $arGrupo = (array) $value;
          array_push($arGrupos, $arGrupo );
        }endforeach;
      }endforeach;

      $arLocal['grupos']= $arGrupos;
      //Montar Array grupos----------------------------------------------------


      array_push($arrayLocais, $arLocal );
      
    }endforeach;
    $locaisTt = count($arrayLocais);
    if($locaisTt > 0){
      $geoStatus = round(($cont_localGeo/$locaisTt)*100, 1);
      }else{
        $geoStatus = 0;
      }
    
    $arLoja['locais']= $arrayLocais;
    $arLoja['locaisQt']= $locaisTt;
    $arLoja['locaisGeoQt']= $cont_localGeo;
    $arLoja['locaisGeoStatus']= $geoStatus;
    //Montar Array locais------------------------------------------------------

    //Montar Array grupos----------------------------------------------------
    $arGrupos = array();
    foreach(ss->findAll() as $key => $value):if($value->loja == $lojaId) {
      $categoriasId = $value->grupo;
      foreach($categorias->findAll() as $key => $value):if($value->id == $categoriasId) {
        $arGrupo = (array) $value;
        array_push($arGrupos, $arGrupo );
      }endforeach;
    }endforeach;

    $arLoja['grupos']= $arGrupos;
    //Montar Array grupos----------------------------------------------------


    array_push($arLojas, $arLoja);
        
  }endforeach;*/
  //Montar Array lojas------------------------------------------------------------

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
header("Content-Type: application/json");
echo json_encode($res);