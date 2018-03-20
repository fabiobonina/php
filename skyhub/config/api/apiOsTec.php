<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");

include('../function/_GeralFunction.php');

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

$textFunction = new TextFunction();

$res = array('error' => true);
$arDados = array();
$arErros = array();
$action = 'teste';

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
  $os = $_POST['os'];
  $loja = $_POST['loja'];
  $tecnicos = json_encode($_POST['tecnicos'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

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

  $tecnicos = json_decode( $this->tecnicos);
			foreach ($tecnicos as $value){
				$idTec = $value->id;
				$userTec = $value->userNick;
				$hhTec = $value->hh;
        $osTecnicos->setOs($os);
        $osTecnicos->setLoja($loja);
        $osTecnicos->setTecnico($tecnico);
        $osTecnicos->setUser($user);
        $osTecnicos->setHh($hhTec);
      }
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
      $dbDate = new DateTime($dbDate);
      $aDate  = new DateTime($date);
      $diff   = $dbDate->diff($aDate);
      $tempo  = $diff->h + ($diff->days * 24);
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

#ATUALIZAR
if($action == 'teste'):
    
    $dt1 = date("2018-01-01 10:10:00");
    $dt2  = date("2018-01-02 10:10:00");
    
    $data = $textFunction->dtDiff($dt1, $dt2);    
    $res['error'] = false;
    $res['message']= $data;
    
  
endif;

#DELETAR
if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
  
endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);