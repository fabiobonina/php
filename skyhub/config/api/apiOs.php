<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

require_once '_chave.php';
require_once '../function/osFunction.php';

$osFunction = new OsFunction();
function __autoload($class_name){
  require_once '../classes/' . $class_name . '.php';
}

$proprietario = new Proprietario();
$lojas        = new Loja();
$locais       = new Locais();
$oss          = new Os();
$bens         = new Bens();
$servicos     = new Servicos();
$categorias   = new Categorias();
$mods         = new Mod();
$osTecnicos   = new OsTecnicos();
$notas        = new Nota();



//$res['outros'] = array();
$res    = array('error' => true);
$res['message']    = array();
$arDados= array();
$arErros= array();
$arMessage= array();
$arSucesso 		= array();
$action = 'modAdd';
 

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
      $status = 5;
      foreach($oss->findAll() as $key => $value):if($value->loja == $lojaId && $value->status < $status) {
        $arOs = (array) $value;
        
        $osId     = $value->id;
        $localId  = $value->local;
        $bemId    = $value->bem;
        $servId   = $value->servico;
        $catId    = $value->categoria;
        
        $contPp_OsTt++;
        $contLj_OsTt++;

        #LOCAIS-----------------------------------------------------------
        $arOs['local'] = $locais->find($localId);
        #LOCAIS-----------------------------------------------------------
        
        #BEM--------------------------------------------------------------
        $arOs['bem']= $bens->find($bemId);
        #BEM--------------------------------------------------------------

        #SERVICOS---------------------------------------------------------
        $arOs['servico'] = $servicos->find( $servId );
        #SERVICOS---------------------------------------------------------
        #SERVICOS---------------------------------------------------------
        $arOs['categoria'] = $categorias->find( $catId );
        #SERVICOS---------------------------------------------------------

        #OSTECNICOS-------------------------------------------------------
        $arOs['tecnicos'] = $osFunction->listOsTec($osId);
        #OSTECNICOS-------------------------------------------------------
        
        #OSNOTAS--------------------------------------------------------------------------------------------
        $nota = $osFunction->listOsNota( $osId );

        if( count($nota) > '0'){
          $arOs['notas'] = $nota['0'];
        }else{
          $arOs['notas'] = '';
        }
        #OSNOTAS--------------------------------------------------------------------------------------------
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
if($action == 'osAdd'):
  //
  $loja       = $_POST['loja'];
  $lojaNick   = $_POST['lojaNick'];
  $local      = $_POST['local'];
  $bem        = $_POST['bem'];
  $categoria  = $_POST['categoria'];
  $servico    = $_POST['servico'];
  $tipoServ   = $_POST['tipoServ'];
  $tecnicos   = $_POST['tecnicos'];
  $data       = $_POST['data'];
  $dtCadastro = $_POST['dtCadastro'];
  $estado     = $_POST['estado'];
  $processo   = $_POST['processo'];
  $status     = $_POST['status'];
  $ativo      = $_POST['ativo'];


  $etapaI = $oss->validarOs( $local, $categoria, $bem, $data );

  if( !$etapaI ){
    $dtUltimo   = '';
    $osUltimoMan = $oss->ultimaOs( $local, $categoria);
    if(isset($osUltimoMan->dtUltimo) ){
      $dtUltimo = $osUltimoMan->dtUltimo;
    }
    $oss->setLoja($loja);
    $oss->setLojaNick($lojaNick);
    $oss->setLocal($local);
    $oss->setBem($bem);
    $oss->setCategoria($categoria);
    $oss->setServico($servico);
    $oss->setTipoServ($tipoServ);
    $oss->setData($data);
    $oss->setDtUltimoMan($dtUltimo);
    $oss->setDtCadastro($dtCadastro);
    $oss->setEstado($estado);
    $oss->setProcesso($processo);
    $oss->setStatus($status);
    $oss->setAtivo($ativo);
    # Insert
    $osId = $oss->insert();
  
    if($osId['error']){
      $res['error'] = $osId['error'];
      $res['message']= $osId['message'];
    }else{
      $item = $osFunction->insertOsTec( $tecnicos, $osId['id'] , $loja);

      $res['error'] = $item['error'];
      array_push($arMessage, $osId['message']);
      array_push($arMessage, $item['message']);
      $res['message']= $arMessage;
    }
  }else{
    $res['error']   = true;
    $res['message'] = 'Já existe OS aberta com esse dados!';
  }
endif;
#OS-EDITAR
if($action == 'osEdt'):
  //
  $osId       = $_POST['osId'];
  $local      = $_POST['local'];
  $bem        = $_POST['bem'];
  $categoria  = $_POST['categoria'];
  $servico    = $_POST['servico'];
  $tipoServ   = $_POST['tipoServ'];
  $data       = $_POST['data'];
  $dtUltimo   = $_POST['dtUltimoMan'];
  $ativo      = $_POST['ativo'];
  
  $osUltimoMan = $oss->ultimaOs( $local, $categoria);
  if(isset($osUltimoMan)  && $osUltimoMan->id != $osId ){
    $dtUltimo = $osUltimoMan->dtUltimo;
  }

  $oss->setLocal($local);
  $oss->setBem($bem);
  $oss->setCategoria($categoria);
  $oss->setServico($servico);
  $oss->setTipoServ($tipoServ);
  $oss->setData($data);
  $oss->setDtUltimoMan($dtUltimo);
  $oss->setAtivo($ativo);
  # Insert
  $res = $oss->update($osId);

endif;

#OS-AMARAR
if($action == 'osAmarar'):

  $os     = $_POST['os'];
  $filial = $_POST['filial'];
  $status = $_POST['status'];
  $id     = $_POST['id'];
  $dtOs   = date("Y-m-d H:i:s");

  $oss->setOs($os);
  $oss->setFilial($filial);
  $oss->setDtOs($dtOs);
  $oss->setStatus($status);
  # Amarar
  if($oss->amarar($id)){
    $res['error'] = false;
    $res['message']= "OK, dados salvo com sucesso";
  }else{
    $res['error'] = true; 
    $res['message'] = "Error, nao foi possivel salvar os dados";      
  }
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
if($action =='osNotaAdd'):

    $os       = $_POST['os'];
    $descricao= $_POST['descricao'];

    $notas->setOs($os);
    $notas->setDescricao($descricao);
    # Insert
    if($notas->insert()){
      $res['error'] = false;
      $res['message']= "OK, dados salvo com sucesso";
    }else{
      $res['error'] = true; 
      $res['message'] = "Error, nao foi possivel salvar os dados";      
    }
endif;

#NOTA-EDTAR
if($action =='osNotaEdt'):

    $id       = $_POST['id'];
    $descricao= $_POST['descricao'];

    $notas->setDescricao($descricao);

    if($notas->update($id)){
      $res['error'] = false;
      $res['message']= "OK, dados alterado com sucesso";
    }else{
      $res['error'] = true; 
      $res['message'] = "Error, nao foi possivel salvar os dados"; 
    }
  
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
  
  $osId     = $_POST['os'];
  $status   = $_POST['status'];
  $dtFech = date("Y-m-d H:i:s");
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
  $tecI = $osFunction->insertTecMod( $osId, $tecnico['tecnico'], $tecnico['userNick'], $tecnico['hh'], $status['id'], $status['processo'], $trajeto['id'], $trajeto['valor'], $date, $km, $valor, $tecNivel );
  
  $res['error']     = $tecI['error'];
  array_push($arMessage, $tecI['message']);
  if( !$res['error'] ){
    #tecnicos----------------------------------------------------------------------------------------------------------------------------

    if( $tecnicos != '' ){
      foreach ( $tecnicos as $tec){
        
        $arMods   = array();
        if( $tec['tecnico'] != $tecnico['tecnico'] ){
          $tecNivel = '1';
          $tecII = $osFunction->insertTecMod( $osId, $tec['tecnico'], $tec['userNick'], $tec['hh'], $status['id'], $status['processo'], $trajeto['id'], $trajeto['valor'], $date, $km, $valor, $tecNivel );
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
  $validacaoI = $osFunction->validarTrajetoMod( $tecId, $dtInicio, $dtFinal, $modId );
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
  $validacaoI = $osFunction->validarTrajetoMod( $tecId, $dtInicio, $dtFinal, $modId );
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
if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
  
endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);