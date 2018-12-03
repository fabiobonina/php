<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

  require_once '_chave.php';

  require_once '../control/lojaControl.php';

  $lojaControl  = new LojaControl();


  $res = array('error' => false);
  $arDados = array();
  $arErros = array();
  $arLojas = array();
  $action = 'read';

  if(isset($_GET['action'])){
    $action = $_GET['action'];
  }

  if($action == 'read'){

    $lojaId = '1';
    $item = $lojaControl->listLoja( $lojaId );
    $res['locais'] = $item;

  }

  #CRIAR_EDITAR-------------------------------------------------------------------------------
  if($action == 'publish'):
    #editar
    $name             = $_POST['name'];
    $nick             = $_POST['nick'];
    $proprietario_id  = $_POST['proprietario_id'];
    $grupo            = $_POST['grupo'];
    $seguimento       = $_POST['seguimento'];
    $ativo            = $_POST['ativo'];
    $id               = $_POST['id'];
    if( $id == "" ):
      $id = NULL;
    endif;

    $res =  $lojaControl->publishLoja( $name, $nick,	$proprietario_id,	$grupo,	$seguimento, $ativo, $id );

  endif;
  #CRIAR_EDITAR-------------------------------------------------------------------------------

  #DELETAR-----------------------------------------------------------------------------
  if($action == 'deletar'):
    
    #delete
    $id = $_POST['id'];
    $res =  $lojaControl->deleteLoja( $id );

  endif;
  #DELETAR-----------------------------------------------------------------------------

  #CATEGORIA-ATIVO----------------------------------------------------------------------
  if($action == 'catStatus'):
    $ativo = $_POST['ativo'];
    $id     = $_POST['id'];

    $lojaCategorias->setAtivo($ativo);

    if($lojaCategorias->update($id)){
      $res['error'] = false;
      $arDados = "OK, dados atualisado com sucesso";
      $res['message']= $arDados;
    }else{
      $res['error'] = true; 
      $arError = "Error, nao foi possivel salvar os dados";
      array_push($arErros, $arError);
    }
  endif;
  #CATEGORIA-ATIVO----------------------------------------------------------------------
  
  #CATEGORIA-DELETAR----------------------------------------------------------------------
  if($action == 'catDelete'):
    $id = $_POST['id'];

    if($lojaCategorias->delete($id)){
      $res['error'] = false;
      $arDados = "OK, dados deleto com sucesso";
      $res['message']= $arDados;
    }else{
      $res['error'] = true; 
      $arError = "Error, nao foi possivel realisar operação";
      array_push($arErros, $arError);
    }
  endif;
  #CATEGORIA-DELETAR----------------------------------------------------------------------
  
  #CATEGORIA-CADASTRAR----------------------------------------------------------------------
  if($action == 'catCadastrar'):
    #Novo
    $loja  = $_POST['loja'];
    $categoria = $_POST['categoria'];
    foreach ( $categoria as $data){
      $itemId = $data['id'];
      $duplicado = false;
      foreach($lojaCategorias->findAll() as $key => $value): {
        $catLjCategoria = $value->categoria;
        $catLjLoja = $value->loja;
        
        if($loja == $catLjLoja){
          if($itemId == $catLjCategoria ):
            $duplicado = true;
          endif;
        }          
      }endforeach;
      if( !$duplicado ){
        $lojaCategorias->setLoja($loja);
        $lojaCategorias->setCategoria($itemId);
        # Insert
        if($lojaCategorias->insert()){
          $res['error'] = false;
          $res['message']= "OK, dados salvo com sucesso";
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
    }
      
    if($res['error'] == true){
      $res['message']= $arErros;
    }

  endif;
  #CATEGORIA-CADASTRAR----------------------------------------------------------------------
  
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

  $res['dados'] = $arLojas;
  header("Content-Type: application/json");
  echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
  