<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");

function __autoload($class_name){
  require_once '../classes/' . $class_name . '.php';
}

$oss = new Os();
$lojas = new Loja();
$bens = new Bens();


$res = array('error' => true);
$arDados = array();
$action = 'read';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}
  
if($action == 'read'):
  //$lojaId = $_POST['loja'];
  //$lojaId = '1';
  $osStatus = '1';
  $arLocais = array();
  $arOss = array();
  #LOCAIS-----------------------------------------------------------------------------------
  foreach($lojas->findAll() as $key => $value): {
    $arLoja = (array) $value;
    $lojaId = $value->id;
    

    #LOCAL_CATEGORIA-------------------------------------------------------------------------
    $arLojas = array();
    foreach($oss->findAll() as $key => $value):if($value->loja == $lojaId) {
      $arOs = (array) $value;
      $bemId = $value->bem;
    

    $arLocal['categoria']= $arOs;
    #LOCAL_CATEGORIA----------------------------------------------------------------------------

    #LOCAIS_BENS-----------------------------------------------------------------------------------
    $status = 3;
    
      
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

#CADASTRAR
if($action == 'cadastrar'):

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
  $status = $_POST['status'];
  $ativo = $_POST['ativo'];

  /*
  $loja = '1';
  $lojaNick = 'AGESPISA';
  $local = '2';
  $bem = '1';
  $categoria = '1';
  $servico = 'servico';
  $tipoServ = '3';
  $tecnicos = 'tecnicos';
  $data = date("Y-m-d");
  $dtCadastro = date('Y-m-d H:i:s');
  $estado = '0';
  $status = '0';
  $ativo = '0';
  */
  
  $os->setLoja($loja);
  $os->setLojaNick($lojaNick);
  $os->setLocal($local);
  $os->setBem($bem);
  $os->setCategoria($categoria);
  $os->setServico($servico);
  $os->setTipoServ($tipoServ);
  $os->setTecnicos($tecnicos);
  $os->setData($data);
  $os->setDtCadastro($dtCadastro);
  $os->setEstado($estado);
  $os->setStatus($status);
  $os->setAtivo($ativo);
  # Insert
  if($os->insert()){
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

#DELETAR
if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
  
endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);