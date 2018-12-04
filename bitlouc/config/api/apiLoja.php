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
    $item = $lojaControl->list( $lojaId );
    $res['lojas'] = $item;

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

    $ativo          = $_POST['ativo'];
    $lojaCatId      = $_POST['id'];

    $item = $lojaControl->statusCategoria( $lojaCatId, $ativo );
    $res = $item;

  endif;
  #CATEGORIA-ATIVO----------------------------------------------------------------------
  
  #CATEGORIA-DELETAR----------------------------------------------------------------------
  if($action == 'catDelete'):
    $lojaCatId = $_POST['id'];

    $item = $lojaControl->deleteCategoria( $lojaCatId );
    $res = $item;

  endif;
  #CATEGORIA-DELETAR----------------------------------------------------------------------
  
  #CATEGORIA-CADASTRAR----------------------------------------------------------------------
  if($action == 'catCadastrar'):
    #Novo
    $loja  = $_POST['loja'];
    $categoria = $_POST['categoria'];
    
    $res =  $lojaControl->insertCategoria( $loja, $categoria );

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
  