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
$arErros = array();
$action = 'deslocamento';

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


#DESLOCAMENTO----------------------------------------------------------------------
if($action == 'deslocamento'):
  $arMods = array();
  #Novo
  //$os       = $_POST['os'];
  //$tecnico = $_POST['tecnico'];
  //$tecnicos = $_POST['tecnicos'];
  //$tipo     = $_POST['tipo'];
  //$status   = $_POST['status'];
  //$date     = $_POST['date'];
  //$km       = $_POST['km'];
  //$valor    = $_POST['valor'];

  $os            = '1';
  $tecnico['id'] = '1';
  $tecnico2['id']= '2';
  $tecnicos[0]   = $tecnico;
  $tecnicos[1]   = $tecnico2;
  $tipo['id']    = '1';
  $status['id']  = '1';
  $date          = date("Y-m-d H:i:s");
  $km            = '2';
  $valor         = '0';

  $stTeste = false;
  # tecnico...
  foreach($mods->findAll() as $key => $value): if($value->ativo == '0' && $value->tecnico == $tecnico['id'] && $value->os == $os ) {
    $arMod = (array) $value;

    if( $value->status ==  $status['id']){
      $stTeste = true;
    }
    array_push($arMods, $arMod);

  }endforeach;

  echo $result = count($arMods);
  if(!$stTeste){
    #desloc aberto
    if (count($arMods) == '1'){
      echo 'ok_1';
    }
    #desloc inicial
    elseif (count($arMods) == '0' && $status['categoria'] == (0 || 2 )) {
      # code...
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
          if($oss->upProcesso($os)){
            $oss->setProcesso($status['processo']);
            $res['error'] = false;
            $arDados = "OK, dados salvo com sucesso";
            $res['message']= $arDados;
          }else{
            $res['error'] = true;
            $arError = "Error, nao foi possivel mudar processo OS";
            array_push($arErros, $arError);
          }
        }endforeach;
      }else{
        $res['error'] = true; 
        $arError = "Error, nao foi possivel salvar os dados";
        array_push($arErros, $arError);
      }
    

    } else {
    # code...
    $res['error'] = true;
    $arError = 'Error, item já cadastrado';
    array_push($arErros, $arError);  
    echo 'ok null';
    }

    foreach ( $tecnicos as $data){
      $itemId    =  '1';//$data['id'];
      $duplicado = false;
      $arMods = array();

      foreach($mods->findAll() as $key => $value): if($value->ativo == $ativo && $value->tecnico == $itemId ) {
        $arMod = (array) $value;
        $tecMod = $value->tecnico;
        $osMod  = $value->os;
        
        /*if($local == $catLacalLocal){
          if($itemId == $catLacalCategoria ):
            $duplicado = true;
          endif;
        }*/
        array_push($arMods, $arMod);   
      }endforeach;

      echo $result = count($arMods);

      if (count($arMods) == '1'){
        echo 'ok_1';

      }
      elseif (count($arMods) == '0') {
        # code...
        if( !$duplicado ){
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
              if($oss->upProcesso($os)){
                $oss->setProcesso($status['processo']);
                $res['error'] = false;
                $arDados = "OK, dados salvo com sucesso";
                $res['message']= $arDados;
              }else{
                $res['error'] = true;
                $arError = "Error, nao foi possivel mudar processo OS";
                array_push($arErros, $arError);
              }
            }endforeach;
          }else{
            $res['error'] = true; 
            $arError = "Error, nao foi possivel salvar os dados";
            array_push($arErros, $arError);
          }
        }else{
          $res['error'] = true; 
          $arError = "Error, item já cadastrado";
          array_push($arErros, $arError);
        }
      } else {
        # code...
        $res['error'] = true; 
        $arError = 'Error, item já cadastrado';
        array_push($arErros, $arError);
        echo 'ok null';
      }
    }
    /*if( !$duplicado ){
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
          if($oss->upProcesso($os)){
            $oss->setProcesso($status['processo']);
            $res['error'] = false;
            $arDados = "OK, dados salvo com sucesso";
            $res['message']= $arDados;
          }else{
            $res['error'] = true;
            $arError = "Error, nao foi possivel mudar processo OS";
            array_push($arErros, $arError);
          }
        }endforeach;
      }else{
        $res['error'] = true; 
        $arError = "Error, nao foi possivel salvar os dados";
        array_push($arErros, $arError);
      }
    }else{
      $res['error'] = true; 
      $arError = "Error, item já cadastrado";
      array_push($arErros, $arError);
    }
  //}*/


  } else {
    # code...
    $res['error'] = true; 
    $arError = 'Error, exite um deslocamento aberto com esse mesmo Status';
    array_push($arErros, $arError);
    echo 'ok null';
  }

  
    
  if($res['error'] == true){
    $res['message']= $arErros;
  }

endif;
#DESLOCAMENTO----------------------------------------------------------------------



#DELETAR
if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
  
endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);