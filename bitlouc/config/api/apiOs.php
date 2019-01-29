<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

require_once '_chave.php';
require_once '../control/osControl.php';
require_once '../control/notaControl.php';

$osControl    = new OsControl();
$notaControl  = new NotaControl();
$mods 			  = new Mod();

$res = array('error' => true);
$action = 'status';
 

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
  $res['oss']   = $item;
  $res['error'] = false;

endif;

if($action == 'loja'):
  $loja = '1';
  $item = $osControl->listLoja( $loja );
  $res['oss']   = $item;
  $res['error'] = false;

endif;
if($action == 'os'):
  $os_id = $_POST['os_id'];
 //$os_id = '130';
  $res = $osControl->findOs( $os_id );

endif;

if($action == 'semAmaracao'):

  $item = $osControl->findAmarar();
  $res['oss']   = $item;
  $res['error'] = false;

  
endif;

if($action == 'status'):
  $status = $_POST['status'];
  //$status = '6';
  $item = $osControl->findStatus( $status );
  $res['oss']   = $item;
  $res['error'] = false;

endif;

if($action == 'publish'){
  $proprietario_id  = $_POST['proprietario_id'];
  $loja_id          = $_POST['loja_id'];
  $loja_nick        = $_POST['loja_nick'];
  $local_id         = $_POST['local_id'];
  $uf               = $_POST['uf'];
  $equipamento_id   = $_POST['equipamento_id'];
  $categoria_id     = $_POST['categoria_id'];
  $servico_id       = $_POST['servico_id'];
  $data             = $_POST['data'];
  $dtCadastro       = $_POST['dtCadastro'];
  $ativo            = $_POST['ativo'];
  $id               = $_POST['id'];

  if( $id == "" ):
    $id = NULL;
  endif;
  if( $equipamento_id == "" ):
    $equipamento_id = NULL;
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
    $data,
    $dtCadastro,
    $ativo,
    $id
  );
}

#OS-AMARAR
if($action == 'osAmarar'):

  $os     = $_POST['os'];
  $filial = $_POST['filial'];
  $id     = $_POST['id'];
  
  $res =  $osControl->amarar( $filial, $os, $id );

endif;
#OS-DELETAR
if($action == 'osDel'):
  
  $os_id   = $_POST['os_id'];
  
  $res = $osControl->delete($os_id);

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
if($action == 'osStatus'):
  
  $os_id        = $_POST['os_id'];
  $status       = $_POST['status'];
  
  $res =  $osControl->status( $status, $os_id );
  
endif;
#atendimento encerado
if($action == 'statusII'):

  $os_id        = $_POST['os_id'];
  $status       = $_POST['status'];
  
  $res =  $osControl->statusII( $status, $os_id );
  
endif;

#DESLOCAMENTO----------------------------------------------------------------------
if($action == 'desloc'):
  #Novo
  $os_id     = $_POST['os_id'];
  $tecnico  = $_POST['tecnico'];
  $tecnicos = $_POST['tecnicos'];
  $trajeto  = $_POST['trajeto'];
  $status   = $_POST['status'];
  $date     = $_POST['date'];
  $km       = $_POST['km'];
  $valor    = $_POST['valor'];
  
  #tecnicoI----------------------------------------------------------------------------------------------------------------------------
  $tecNivel = '0';
  $tecI = $osControl->insertTecMod( $os_id, $tecnico['tecnico_id'], $tecnico['user_nick'], $tecnico['hh'], $status['id'], $status['processo'], $trajeto['id'], $trajeto['valor'], $date, $km, $valor, $tecNivel );
  
  $res['error']     = $tecI['error'];
  array_push($arMessage, $tecI['message']);
  if( !$res['error'] ){
    #tecnicos----------------------------------------------------------------------------------------------------------------------------

    if( $tecnicos != '' ){
      foreach ( $tecnicos as $tec){
        
        $arMods   = array();
        if( $tec['tecnico'] != $tecnico['tecnico'] ){
          $tecNivel = '1';
          $tecII = $osControl->insertTecMod( $os_id, $tec['tecnico_id'], $tec['user_nick'], $tec['hh'], $status['id'], $status['processo'], $trajeto['id'], $trajeto['valor'], $date, $km, $valor, $tecNivel );
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
  $os_id      = $_POST['os_id'];
  $tecnico_id = $_POST['tecnico_id'];
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
  $mod_id = '';
  
  #Valida se periodo da data, foi usado pelo tecnico 
  $validacaoI = $osControl->validarTrajetoMod( $tecnico_id, $dtInicio, $dtFinal, $mod_id );

  if( !$validacaoI['error']){
    #tecnicoI----------------------------------------------------------------------------------------------------------------------------
    $mods->setOs($os_id);
    $mods->setTecnico($tecnico_id);
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
    
    $res    = $item;
  }else{
    $res    = $validacaoI;
  }
    
endif;
#MOD-EDT----------------------------------------------------------------------
if($action == 'modEdt'):
  #Novo
  
  $os_id      = $_POST['os_id'];
  $mod_id     = $_POST['mod_id'];
  $tecnico_id = $_POST['tecnico_id'];
  $trajeto    = $_POST['trajeto'];
  $status     = $_POST['status'];
  $dtInicio   = $_POST['dtInicio'];
  $dtFinal    = $_POST['dtFinal'];
  $kmInicio   = $_POST['kmInicio'];
  $kmFinal    = $_POST['kmFinal'];
  $valor      = $_POST['valor'];
  $tempo      = $_POST['tempo'];
  $hhValor    = $_POST['hhValor'];
  
  #Valida se periodo da data, foi usado pelo tecnico 
  $validacaoI = $osControl->validarTrajetoMod( $tecnico_id, $dtInicio, $dtFinal, $mod_id );

  if( !$validacaoI['error'] ){
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
    $item = $mods->update( $mod_id );

    $res = $item;
  }else{
    $res    = $validacaoI;
  }

endif;
#MOD-EDT----------------------------------------------------------------------
if($action == 'modDel'):
  #Novo
  $mod_id    = $_POST['id'];
  
  if($mods->delete($mod_id)){
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
  $os_id     = $_POST['os_id'];
  $tecnico_id    = $_POST['tecnico_id'];
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
  $mod_id = '';
  
  #Valida se periodo da data, foi usado pelo tecnico 
  $validacaoI = $osControl->validarTrajetoMod( $tecnico_id, $dtInicio, $dtFinal, $mod_id );
  $res['error'] = $validacaoI['error'];
  $res['message'] = $validacaoI;
  if( !$res['error'] ){
    #tecnicoI----------------------------------------------------------------------------------------------------------------------------
    $mods->setOs($os_id);
    $mods->setTecnico($tecnico_id);
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
      $itemII = $oss->upProcesso($os_id, $status['processo'] );
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
  $os_id = '130';
  $os_status = 'está em teste no sistema';
  $res['dados'] = $osControl->osEmail( $os_id, $os_statuss);
  //$res['dados'] = $osControl->osEmail( $os_id );
      
endif;


header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);