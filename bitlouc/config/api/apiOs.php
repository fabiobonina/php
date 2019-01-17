<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

require_once '_chave.php';
require_once '../control/osControl.php';
require_once '../control/notaControl.php';

$osControl    = new OsControl();
$notaControl  = new NotaControl();


//$res['outros'] = array();
$res            = array('error' => true);
$res['message'] = array();
$arDados        = array();
$arErros        = array();
$arMessage      = array();
$arSucesso 		  = array();
$action         = 'email';
 

//$res['user'] = $user;
$acessoNivel        = $user['nivel'];// $user >  include("_chave.php");
$acessoProprietario = $user['proprietario'];
$acessoGrupo        = $user['grupo'];
$acessoloja         = $user['loja'];
//$acessoNivel = 2;
//$acessoProprietario = 1;
//$acessoGrupo = 'P';
//$acessoloja = 24;

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

if($action == 'read'):

  $item = $osControl->listProprietario( $acessoProprietario );
  if($item['error'] == true ){
    $res = $item;
  }else{
    $res['oss']   = $item['dados']; 
    $res['error'] = false;
  }

endif;
if($action == 'os'):
  $os_id = $_POST['os_id'];
  //$os_id = '130';
  $res = $osControl->findOs( $os_id );

endif;

if($action == 'publish'):
  $proprietario_id  = $_POST['proprietario_id'];
  $loja_id          = $_POST['loja_id'];
  $loja_nick        = $_POST['loja_nick'];
  $local_id         = $_POST['local_id'];
  $uf               = $_POST['uf'];
  $equipamento_id   = $_POST['equipamento_id'];
  $categoria_id     = $_POST['categoria_id'];
  $servico_id       = $_POST['servico_id'];
  $servico_tipo     = $_POST['servico_tipo'];
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
    $servico_tipo,
    $data,
    $dtCadastro,
    $ativo,
    $id
  );




endif;

#OS-AMARAR
if($action == 'osAmarar'):

  $os     = $_POST['os'];
  $filial = $_POST['filial'];
  $id     = $_POST['id'];
  
  $res =  $osControl->amarar( $filial, $os, $id );

endif;
#OS-DELETAR
if($action == 'osDel'):
  
  $osId   = $_POST['osId'];
  
  if($oss->delete($osId)){
    if($osTecnicos->deleteOs($osId)){
      $res['error']   = false;
      $res['message'] = 'OK, OS deletada com sucesso';
    }else{
        $res['error']   = true;
        $res['message'] = 'Error, tecnico(s) da OS não foi deletado';
    }
  }else{
      $res['error']   = true;
      $res['message'] = 'Error, não foi deletar OS';
  }
endif;
#NOTA-ADD
if($action =='publishNota'):

    $os_id      = $_POST['os_id'];
    $descricao  = $_POST['descricao'];
    $id         = $_POST['id'];

    if( $id == "" ):
      $id = NULL;
    endif;

    $res =  $notaControl->publishNota(
      $os_id,
			$descricao,
      $id
    );

endif;

#CONCLUIR
if($action == 'osConcluir'):
  
  $osId       = $_POST['os'];
  $processo   = $_POST['processo'];
  $status     = $_POST['status'];
  $dtConcluido= date("Y-m-d H:i:s");

  $oss->setProcesso($processo);
  $oss->setStatus($status);
  $oss->setDtConcluido($dtConcluido);
  
  if($oss->concluir($osId)){
      $res['error']   = false;
      $res['message'] = 'OK, OS concluida com sucesso';
  }else{
      $res['error']   = true;
      $res['message'] = 'Error, não foi possivel concluir a OS';
  }
  
endif;

#REABRIR
if($action == 'osReabrir'):
  
  $osId     = $_POST['os'];
  $status   = $_POST['status'];

  $oss->setStatus($status);
  
  if($oss->reabrir($osId)){
    $res['error']   = false;
    $res['message'] = 'OK, OS foi reaberta';
  }else{
    $res['error']   = true;
    $res['message'] = 'Error, não foi possivel rabrir a OS';
  }
  
endif;
#CONCLUIR
if($action == 'osFechar'):
  
  $osId       = $_POST['os'];
  $status     = $_POST['status'];
  $dtFech     = date("Y-m-d H:i:s");
  $processo   = $_POST['processo'];

  $oss->setProcesso($processo);
  $oss->setStatus($status);
  $oss->setDtFech($dtFech);
  
  if($oss->fechar($osId)){
    $res['error']   = false;
    $res['message'] = 'OK, OS fechada com sucesso';
  }else{
    $res['error']   = true;
    $res['message'] = 'Error, não foi possivel fechar a OS';
  }
  
endif;
if($action == 'osValidar'):
  
  $osId     = $_POST['os'];
  $status   = $_POST['status'];

  $oss->setStatus($status);
  
  if($oss->avalidar($osId)){
    $res['error']   = false;
    $res['message'] = 'OK, OS aprovada com sucesso';
  }else{
    $res['error']   = true;
    $res['message'] = 'Error, não foi possivel validar a OS';
  }
  
endif;
#DESLOCAMENTO----------------------------------------------------------------------
if($action == 'desloc'):
  #Novo
  $osId     = $_POST['os'];
  $tecnico  = $_POST['tecnico'];
  $tecnicos = $_POST['tecnicos'];
  $trajeto  = $_POST['trajeto'];
  $status   = $_POST['status'];
  $date     = $_POST['date'];
  $km       = $_POST['km'];
  $valor    = $_POST['valor'];
  
  #tecnicoI----------------------------------------------------------------------------------------------------------------------------
  $tecNivel = '0';
  $tecI = $osControl->insertTecMod( $osId, $tecnico['tecnico'], $tecnico['userNick'], $tecnico['hh'], $status['id'], $status['processo'], $trajeto['id'], $trajeto['valor'], $date, $km, $valor, $tecNivel );
  
  $res['error']     = $tecI['error'];
  array_push($arMessage, $tecI['message']);
  if( !$res['error'] ){
    #tecnicos----------------------------------------------------------------------------------------------------------------------------

    if( $tecnicos != '' ){
      foreach ( $tecnicos as $tec){
        
        $arMods   = array();
        if( $tec['tecnico'] != $tecnico['tecnico'] ){
          $tecNivel = '1';
          $tecII = $osControl->insertTecMod( $osId, $tec['tecnico'], $tec['userNick'], $tec['hh'], $status['id'], $status['processo'], $trajeto['id'], $trajeto['valor'], $date, $km, $valor, $tecNivel );
          #desloc aberto
          $res['error']   = $tecII['error'];
          array_push($arMessage, $tecII['message'] );
        }
      }
      #tecnicos----------------------------------------------------------------------------------------------------------------------------
    }
  }
  $res['message'] = $arMessage;
endif;
#DESLOCAMENTO----------------------------------------------------------------------
#MOD-ADD----------------------------------------------------------------------
if($action == 'modAdd'):
  #Novo
  $osId     = $_POST['osId'];
  $tecId    = $_POST['tecId'];
  //$tecnicos = $_POST['tecnicos'];
  $trajeto  = $_POST['trajeto'];
  $status   = $_POST['status'];
  $dtInicio = $_POST['dtInicio'];
  $dtFinal  = $_POST['dtFinal'];
  $kmInicio = $_POST['kmInicio'];
  $kmFinal  = $_POST['kmFinal'];
  $valor    = $_POST['valor'];
  $tempo    = $_POST['tempo'];
  $hhValor  = $_POST['hhValor'];
  $modId = '';
  
  #Valida se periodo da data, foi usado pelo tecnico 
  $validacaoI = $osControl->validarTrajetoMod( $tecId, $dtInicio, $dtFinal, $modId );
  $res['error'] = $validacaoI['error'];
  $res['outros'] = $validacaoI;
  if( !$res['error'] ){
    #tecnicoI----------------------------------------------------------------------------------------------------------------------------
    $mods->setOs($osId);
    $mods->setTecnico($tecId);
    $mods->setTrajeto($trajeto['id']);
    $mods->setStatus($status['id']);
    $mods->setDtInicio($dtInicio);
    $mods->setDtFinal($dtFinal);
    $mods->setKmInicio($kmInicio);
    $mods->setKmFinal($kmFinal);
    $mods->setTempo($tempo);
    $mods->setHhValor($hhValor);
    $mods->setValor($valor);
    $mods->setAtivo('1');
    $item = $mods->insert();
    
    $res['error']     = $item['error'];
    array_push($arMessage, $item['message']);

    if( !$res['error'] ){
      $itemII = $oss->upProcesso($osId, $status['processo'] );
      $res['error']     = $itemII['error'];
      array_push($arMessage, $itemII['message']); 
    }
  }else{
    $arMessage   = $validacaoI['message'];
  }
  $res['message'] = $arMessage;
endif;
#MOD-EDT----------------------------------------------------------------------
if($action == 'modEdt'):
  #Novo
  
  $osId     = $_POST['osId'];
  $modId    = $_POST['modId'];
  $tecId  = $_POST['tecId'];
  //$tecnicos = $_POST['tecnicos'];
  $trajeto  = $_POST['trajeto'];
  $status   = $_POST['status'];
  $dtInicio = $_POST['dtInicio'];
  $dtFinal  = $_POST['dtFinal'];
  $kmInicio = $_POST['kmInicio'];
  $kmFinal  = $_POST['kmFinal'];
  $valor    = $_POST['valor'];
  $tempo    = $_POST['tempo'];
  $hhValor  = $_POST['hhValor'];
  
  #Valida se periodo da data, foi usado pelo tecnico 
  $validacaoI = $osControl->validarTrajetoMod( $tecId, $dtInicio, $dtFinal, $modId );
  $res['error'] = $validacaoI['error'];
  $res['outros'] = $validacaoI;
  if( !$res['error'] ){
    #tecnicoI----------------------------------------------------------------------------------------------------------------------------
    $mods->setTrajeto($trajeto['id']);
    $mods->setStatus($status['id']);
    $mods->setDtInicio($dtInicio);
    $mods->setDtFinal($dtFinal);
    $mods->setKmInicio($kmInicio);
    $mods->setKmFinal($kmFinal);
    $mods->setTempo($tempo);
    $mods->setHhValor($hhValor);
    $mods->setValor($valor);
    $mods->setAtivo('1');
    $item = $mods->update( $modId );

    $res['error']   = $item['error'];
    $res['message'] = $item['message'];

    if( !$res['error'] ){
      $itemII = $oss->upProcesso($osId, $status['processo'] );
      $res['error']     = $itemII['error'];
      array_push($arMessage, $itemII['message']); 
    }
  }else{
    $arMessage   = $validacaoI['message'];
  }
  $res['message'] = $arMessage;
  $res;

endif;
#MOD-EDT----------------------------------------------------------------------
if($action == 'modDel'):
  #Novo
  $modId    = $_POST['id'];
  
  if($mods->delete($modId)){
    $res['error'] = false;
    $res['message']= 'OK, Trajeto deletado!';
  }else{
    $res['error'] = true;
    $res['message'] = "Error, nao foi possivel deletar os Trajeto"; 
  }

endif;
#MOD-EDT----------------------------------------------------------------------
#DELETAR
if($action == 'modFull'):
  #Novo
  $osId     = $_POST['osId'];
  $tecId    = $_POST['tecId'];
  $tecnicos = $_POST['tecnicos'];
  $trajeto  = $_POST['trajeto'];
  $status   = $_POST['status'];
  $dtInicio = $_POST['dtInicio'];
  $dtFinal  = $_POST['dtFinal'];
  $kmInicio = $_POST['kmInicio'];
  $kmFinal  = $_POST['kmFinal'];
  $valor    = $_POST['valor'];
  $tempo    = $_POST['tempo'];
  $hhValor  = $_POST['hhValor'];
  $modId = '';
  
  #Valida se periodo da data, foi usado pelo tecnico 
  $validacaoI = $osControl->validarTrajetoMod( $tecId, $dtInicio, $dtFinal, $modId );
  $res['error'] = $validacaoI['error'];
  $res['outros'] = $validacaoI;
  if( !$res['error'] ){
    #tecnicoI----------------------------------------------------------------------------------------------------------------------------
    $mods->setOs($osId);
    $mods->setTecnico($tecId);
    $mods->setTrajeto($trajeto['id']);
    $mods->setStatus($status['id']);
    $mods->setDtInicio($dtInicio);
    $mods->setDtFinal($dtFinal);
    $mods->setKmInicio($kmInicio);
    $mods->setKmFinal($kmFinal);
    $mods->setTempo($tempo);
    $mods->setHhValor($hhValor);
    $mods->setValor($valor);
    $mods->setAtivo('1');
    $item = $mods->insert();
    
    $res['error']     = $item['error'];
    array_push($arMessage, $item['message']);

    if( !$res['error'] ){
      $itemII = $oss->upProcesso($osId, $status['processo'] );
      $res['error']     = $itemII['error'];
      array_push($arMessage, $itemII['message']); 
    }
  }else{
    $arMessage   = $validacaoI['message'];
  }
  $res['message'] = $arMessage;
endif;

#CADASTRAR
if($action == 'email'):
  //
  $osId = '130';
  $os_status = 'está em teste no sistema';
  $res['dados'] = $osControl->osEmail( $osId, $os_statuss);
  //$res['dados'] = $osControl->osEmail( $osId );
      
endif;

//$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);