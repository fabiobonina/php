<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");

function __autoload($class_name){
  require_once '../classes/' . $class_name . '.php';
}

$proprietario = new Proprietario();
$lojas = new Loja();
$locais = new Locais();
$oss = new Os();
$bens = new Bens();
$servicos = new Servicos();
$mods = new Mod();
$osTecnicos = new OsTecnicos();


$res = array('error' => true);
$arDados = array();
$action = 'read';

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

#CADASTRAR
if($action == 'cadastrar'):
  /**/
  $loja = $_POST['loja'];
  $lojaNick = $_POST['lojaNick'];
  $local = $_POST['local'];
  $bem = $_POST['bem'];
  $categoria = $_POST['categoria'];
  $servico = $_POST['servico'];
  $tipoServ = $_POST['tipoServ'];
  $tecnicos = json_encode($_POST['tecnicos'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
  $data = $_POST['data'];
  $dtCadastro = $_POST['dtCadastro'];
  $estado = $_POST['estado'];
  $processo = $_POST['processo'];
  $status = $_POST['status'];
  $ativo = $_POST['ativo'];

  /*
  $tecnicos = array();
  $tecnico1['id'] = '1';
  $tecnico2['id'] = '2';
  array_push($tecnicos, $tecnico1 );
  array_push($tecnicos, $tecnico2 );

  $loja = '1';
  $lojaNick = 'AGESPISA';
  $local = '2';
  $bem = '1';
  $categoria = '1';
  $servico = 'servico';
  $tipoServ = '3';
  $tecnicoss = json_encode($tecnicos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);//$tecnicos = 'tecnicos';
  $data = date("Y-m-d");
  $dtCadastro = date('Y-m-d H:i:s');
  $estado = '0';
  $processo = '0';
  $status = '0';
  $ativo = '0';
  /*/
  //$tecnicosss = array();

  
  $oss->setLoja($loja);
  $oss->setLojaNick($lojaNick);
  $oss->setLocal($local);
  $oss->setBem($bem);
  $oss->setCategoria($categoria);
  $oss->setServico($servico);
  $oss->setTipoServ($tipoServ);
  $oss->setTecnicos($tecnicos);
  $oss->setData($data);
  $oss->setDtCadastro($dtCadastro);
  $oss->setEstado($estado);
  $oss->setProcesso($processo);
  $oss->setStatus($status);
  $oss->setAtivo($ativo);
  # Insert
  if($oss->insert()){
    $res['error'] = false;
    $res['message']= "OK, dados salvo com sucesso";
  }else{
    $res['error'] = true; 
    $res['message'] = "Error, nao foi possivel salvar os dados";      
  }
endif;

#ATUALIZAR
if(isset($_POST['atualizar'])):

  
endif;

#DESLOCAMENTO
if(isset($_POST['deslocamento'])):

  
endif;

#DELETAR
if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
  
endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);