<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");
include( '../function/osFunction.php');

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

$osFunction = new OsFunction();

$res    = array('error' => true);
$res['message']    = array();
$arDados= array();
$arErros= array();
$action = 'read';

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
      $estado = 3;
      foreach($oss->findAll() as $key => $value):if($value->loja == $lojaId && $value->estado < $estado) {
        $arOs = (array) $value;
        
        $osId = $value->id;
        $localId = $value->local;
        $bemId = $value->bem;
        $servId = $value->servico;
        $catId = $value->categoria;
        
        $contPp_OsTt++;
        $contLj_OsTt++;

        #LOCAIS-------------------------------------------------------------------------------------------
        $arOs['local'] = $locais->find($localId);
        #LOCAIS-------------------------------------------------------------------------------------------
        
        #BEM---------------------------------------------------------------------------------------------
        $arOs['bem']= $bens->find($bemId);
        #BEM---------------------------------------------------------------------------------------------

        #SERVICOS----------------------------------------------------------------------------------------
        $arOs['servico'] = $servicos->find( $servId );
        #SERVICOS----------------------------------------------------------------------------------------
        #SERVICOS----------------------------------------------------------------------------------------
        $arOs['categoria'] = $categorias->find( $catId );
        #SERVICOS----------------------------------------------------------------------------------------

        #OSTECNICOS--------------------------------------------------------------------------------------------
        $arTecnicos = array();
        foreach($osTecnicos->findOs($osId) as $key => $value): {
          $arTecnico = (array) $value;
          $tecId = $value->tecnico;
          #MODS--------------------------------------------------------------------------------------------
          $arTecnico['mods'] = $osFunction->listOsTecMod( $osId, $tecId );
          #MODS--------------------------------------------------------------------------------------------
          //$arTecnico = $value;
          array_push($arTecnicos, $arTecnico);
        }endforeach;
        $arOs['tecnicos'] = $arTecnicos;
        #OSTECNICOS--------------------------------------------------------------------------------------------

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
if($action == 'cadastrar'):
  /**/
  $loja       = $_POST['loja'];
  $lojaNick   = $_POST['lojaNick'];
  $local      = $_POST['local'];
  $bem        = $_POST['bem'];
  $categoria  = $_POST['categoria'];
  $servico    = $_POST['servico'];
  $tipoServ   = $_POST['tipoServ'];
  $tecnicos   = json_encode($_POST['tecnicos'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
  $data       = $_POST['data'];
  $dtCadastro = $_POST['dtCadastro'];
  $estado     = $_POST['estado'];
  $processo   = $_POST['processo'];
  $status     = $_POST['status'];
  $ativo      = $_POST['ativo'];

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

#DESCRICAO ADD
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

#DESCRICAO Editar
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
if($action == 'deslocamento'):
  $arMods = array();
  #Novo
  $os       = $_POST['os'];
  $tecnico = $_POST['tecnico'];
  $tecnicos = $_POST['tecnicos'];
  $tipo     = $_POST['tipo'];
  $status   = $_POST['status'];
  $date     = $_POST['date'];
  $km       = $_POST['km'];
  $valor    = $_POST['valor'];

  //$os                 = '1';
  //$tecnico['id']      = '1';
  //$tecnico2['id']     = '2';
  //$tecnicos[0]        = $tecnico;
  //$tecnicos[1]        = $tecnico2;
  //$tipo['id']         = '1';
  //$tipo['valor']      = '0.85';
  //$status['id']       = '8';
  //$status['categoria']= '2';
  //$status['processo'] = '8';
  //$date               = date("Y-m-d H:i:s");
  //$km                 = '30';
  //$valor              = '0';

  $stTeste = false;
  # tecnico----------------------------------------------------------------------------------------------------------------------------
  foreach($mods->findAll() as $key => $value): if($value->ativo == '0' && $value->tecnico == $tecnico['id'] && $value->os == $os ) {

    $arMod = (array) $value;
    $idMod = $value->id;
    $dbDate = $value->dtInicio;
    # validar Status
    if( $value->status ==  $status['id']){
      $stTeste = true;
      array_push($arErros, 'Error, exite um deslocamento aberto com esse mesmo Status');
    }
    # validar data
    if( strtotime($dbDate) > strtotime($date) ){
      $stTeste = true;
      array_push($arErros, 'Error, dataFinal('.$date.') menor que dataInicio('.$dbDate.')');
    }else{

      $tempo = $osFunction->dtDiff($dbDate, $date);

    }
    # validar TipoTrajeto
    if( $value->tipoTrajeto != $tipo['id']){
        $stTeste = true;
        array_push($arErros, 'Error, Tipo de trajeto é diferente do inicial');
    }else{
      # validar KM
      if( $tipo['id'] == '1'){
        if( $value->kmInicio > $km ){
          $stTeste = true;
          array_push($arErros, 'Error, KmFinal('.$km.') menor que kmInicio('.$value->kmInicio.')');
        }else{
          $valor = ($km - $value->kmInicio ) * $tipo['valor'];
        }
      }
      
    }
    
    array_push($arMods, $arMod);

  }endforeach;

  if(!$stTeste){
    #desloc aberto
    if ( count($arMods) == '1' ) {
      # code...
      $mods->setOs($os);
      $mods->setTecnico($tecnico['id']);
      $mods->setTipoTrajeto($tipo['id']);
      $mods->setStatus($status['id']);
      $mods->setDtFinal($date);
      $mods->setKmFinal($km);
      $mods->setTempo($tempo);
      $mods->setValor($valor);
      $mods->setAtivo('1');
      
      # InsertFinal
      if( $mods->insertFinal($idMod) ){
        foreach( $oss->find($os) as $key => $value ): {
          $oss->setProcesso($status['processo']);
          if( $oss->upProcesso($os) ){
            if($status['categoria'] == 2 ){
              $arMods = array();
            }
            $res['error'] = false;
            $arDados = "OK, dados salvo com sucesso";
            $res['message']= $arDados;
          }else{
            $res['error'] = true;
            array_push($arErros, "Error, nao foi possivel mudar processo OS");
          }
        }endforeach;
      }else{
        $res['error'] = true;
      }
    }else{
      $res['error'] = true;
      array_push($arErros, "Error, nao foi possivel salvar deslocamento");
    }
    #desloc inicial
    if (count($arMods) == '0' || $status['categoria'] == 2 ) {
      $mods->setOs($os);
      $mods->setTecnico($tecnico['id']);
      $mods->setTipoTrajeto($tipo['id']);
      $mods->setStatus($status['id']);
      $mods->setDtInicio($date);
      $mods->setKmInicio($km);
      $mods->setValor($valor);
      
      # Insert
      if($mods->insertInicio()){
        foreach($oss->find($os) as $key => $value): {
          $oss->setProcesso($status['processo']);
          if($oss->upProcesso($os)){
            $res['error'] = false;
            $arDados = "OK, dados salvo com sucesso";
            $res['message']= $arDados;
          }else{
            $res['error'] = true;
            array_push($arErros, "Error, nao foi possivel mudar processo OS");
          }
        }endforeach;
      }else{
        $res['error'] = true;
        array_push($arErros, "Error, nao foi possivel salvar deslocamento");
      }
    }else {
      $res['error'] = true;
      array_push($arErros, 'Error, item já cadastrado'); 
    }
    #tecnicos----------------------------------------------------------------------------------------------------------------------------
    foreach ( $tecnicos as $data){
      $itemId    =  $data['id'];
      $arMods = array();
      
      #VALIDAR-TECNICO.............................
      if( $itemId != $tecnico['id'] ){
        #carona
        if( $tipo['id'] == '1'){
          $tipo['id'] = '3';
          $km         = '0';
          $valor      = '0';
        }
        foreach($mods->findAll() as $key => $value): if($value->ativo == '0' && $value->tecnico == $itemId && $value->os == $os ) {

          $arMod = (array) $value;
          $idMod = $value->id;
          $dbDate = $value->dtInicio;
          # validar Status
          if( $value->status ==  $status['id']){
            $stTeste = true;
            array_push($arErros, 'Error, exite um deslocamento aberto com esse mesmo Status');
          }
          # validar data
          if( strtotime($dbDate) > strtotime($date) ){
            $stTeste = true;
            array_push($arErros, 'Error, dataFinal('.$date.') menor que dataInicio('.$dbDate.')');
          }else{
            $dbDate = new DateTime($dbDate);
            $aDate  = new DateTime($date);
            $diff   = $dbDate->diff($aDate);
            $tempo  = $diff->h + ($diff->days * 24);
          }
          # validar TipoTrajeto
          if( $value->tipoTrajeto != $tipo['id']){
              $stTeste = true;
              array_push($arErros, 'Error, Tipo de trajeto é diferente do inicial');
          }          
          array_push($arMods, $arMod);
  
        }endforeach;
        
        if(!$stTeste){
          #desloc aberto
          if ( count($arMods) == '1' ) {
            # code...
            $mods->setOs($os);
            $mods->setTecnico($itemId);
            $mods->setTipoTrajeto($tipo['id']);
            $mods->setStatus($status['id']);
            $mods->setDtFinal($date);
            $mods->setKmFinal($km);
            $mods->setTempo($tempo);
            $mods->setValor($valor);
            $mods->setAtivo('1');
            
            # InsertFinal
            if( $mods->insertFinal($idMod) ){
              foreach( $oss->find($os) as $key => $value ): {
                $oss->setProcesso($status['processo']);
                if( $oss->upProcesso($os) ){
                  if($status['categoria'] == 2 ){
                    $arMods = array();
                  }
                  $res['error'] = false;
                  $arDados = "OK, dados salvo com sucesso";
                  $res['message']= $arDados;
                }else{
                  $res['error'] = true;
                  array_push($arErros, "Error, nao foi possivel mudar processo OS");
                }
              }endforeach;
            }else{
              $res['error'] = true;
            }
          }else{
            $res['error'] = true;
            array_push($arErros, "Error, nao foi possivel salvar deslocamento");
          }
          #desloc inicial
          if (count($arMods) == '0' || $status['categoria'] == 2 ) {
            $mods->setOs($os);
            $mods->setTecnico($itemId);
            $mods->setTipoTrajeto($tipo['id']);
            $mods->setStatus($status['id']);
            $mods->setDtInicio($date);
            $mods->setKmInicio($km);
            $mods->setValor($valor);
            
            # Insert
            if($mods->insertInicio()){
              foreach($oss->find($os) as $key => $value): {
                $oss->setProcesso($status['processo']);
                if($oss->upProcesso($os)){
                  $res['error'] = false;
                  $arDados = "OK, dados salvo com sucesso";
                  $res['message']= $arDados;
                }else{
                  $res['error'] = true;
                  array_push($arErros, "Error, nao foi possivel mudar processo OS");
                }
              }endforeach;
            }else{
              $res['error'] = true;
              array_push($arErros, "Error, nao foi possivel salvar deslocamento");
            }
          }else {
            $res['error'] = true;
            array_push($arErros, 'Error, item já cadastrado'); 
          }
        }
      }
      #VALIDAR-TECNICO..............................
    }
    #tecnicos----------------------------------------------------------------------------------------------------------------------------
  }else {
    $res['error'] = true; 
    echo 'ok null';
  }

  if($res['error'] == true){
    $res['message']= $arErros;
  }

endif;
#DESLOCAMENTO----------------------------------------------------------------------
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
  
  //$osId               = '1';
  //$tecnico['id']      = '1';
  //$tecnico2['id']     = '2';
  //$tecnicos[1]        = $tecnico2;
  //$trajeto['id']         = '1';
  //$trajeto['valor']      = '0.85';
  #inicil
  //$status['id']       = '1';
  //$status['categoria']= '1';
  //$status['processo'] = '1';
  //$date               = date("2018-03-01 07:30:00");
  //$km                 = '1';
  #serviço
  //$status['id']       = '4';
  //$status['categoria']= '2';
  //$status['processo'] = '4';
  //$date               = date("2018-03-01 09:00:00");
  //$km                 = '30';
  #retorno
  //$status['id']       = '8';
  //$status['categoria']= '2';
  //$status['processo'] = '8';
  //$date               = date("2018-03-01 13:00:00");
  //$km                 = '30';

  #retorno
  //$status['id']       = '11';
  //$status['categoria']= '0';
  //$status['processo'] = '11';
  //$date               = date("2018-03-01 14:00:00");
  //$km                 = '50';
  
  //$valor              = '0';
  //$res['outros'] = $_POST;

  #tecnicoI----------------------------------------------------------------------------------------------------------------------------
  $tecNivel = '0';
  $tecI = $osFunction->insertTecMod( $osId, $tecnico['tecnico'], $status['id'], $status['processo'], $status['categoria'], $trajeto['id'], $trajeto['valor'], $date, $km, $valor, $tecNivel );
  //$res['outros'] = $tecI;
  if( $tecI['error'] ){
    $res['error']     = $tecI['error'];
    array_push($res['message'], $tecI['message']);
  }else{
    #tecnicos----------------------------------------------------------------------------------------------------------------------------
    if(isset($tecnicos)){
      foreach ( $tecnicos as $data){
        $tecId   = $data['tecnico'];
        $arMods   = array();
        if( $tecId != $tecnico['tecnico'] ){
          $tecNivel = '1';
          $tecII = $osFunction->insertTecMod( $osId, $tecId, $status['id'], $status['processo'], $status['categoria'], $trajeto['id'], $trajeto['valor'], $date, $km, $valor, $tecNivel );
          //$res['outro'] = $tecII;
          if( $tecII['error'] ){
            $res['error']   = $tecII['error'];
            array_push( $res['message'], $tecII['message'] );
          }else{
            #desloc aberto
            $res['error']   = $tecII['error'];
            array_push( $res['message'], $tecII['message'] );
          }
        }
      }
      #tecnicos----------------------------------------------------------------------------------------------------------------------------
    }
  }
  $res['outros'] = $_POST;
endif;
#DESLOCAMENTO----------------------------------------------------------------------


#DELETAR
if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
  
endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);