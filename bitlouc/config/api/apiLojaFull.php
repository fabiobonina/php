<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');



  function __autoload($class_name){
		require_once '../classes/' . $class_name . '.php';
	}

  $usuarios = new Usuarios();
  $loja = new Loja();
  $locais = new Locais();
  $sistemas = new Sistema();
  $grupo = new Grupo();
  $lojaGrupo = new LojaGrupo();
  $descricao = new Descricao();
  $ativos = new Ativos();

  $res = array('error' => false);
  $action = 'read';

  if(isset($_GET['action'])){
		$action = $_GET['action'];
	}

  if($action == 'read'){

    //Montar Array lojas------------------------------------------------------------
    $arLojas = array();
    foreach($loja->findAll() as $key => $value): {
      
      $arLoja = (array) $value; //Loja
      $lojaId = $value->id;

      //Montar Array locais-------------------------------------------------------
      $arrayLocais = array();
      $cont_localGeo = 0;
      foreach($locais->findAll() as $key => $value):if($value->loja == $lojaId) {
        $arLocal = (array) $value;
        if( $value->latitude <> 0.00000 && $value->longitude <> 0.00000){
          $cont_localGeo++;
        }
        array_push($arrayLocais, $arLocal );
      }endforeach;
      $locaisTt = count($arrayLocais);
      if($locaisTt > 0){
        $geoStatus = round(($cont_localGeo/$locaisTt)*100, 1);
       }else{
         $geoStatus = 0;
       }
      
      $arLoja['locais']= $arrayLocais;
      $arLoja['locaisQt']= $locaisTt;
      $arLoja['locaisGeoQt']= $cont_localGeo;
      $arLoja['locaisGeoStatus']= $geoStatus;
      //Montar Array locais------------------------------------------------------

      //Montar Array produtos----------------------------------------------------
      $arProdutos = array();
      foreach($lojaGrupo->findAll() as $key => $value):if($value->loja == $lojaId) {
        $grupoId = $value->produto;
        foreach($grupo->findAll() as $key => $value):if($value->id == $grupoId) {
          $arProduto = (array) $value;
          array_push($arProdutos, $arProduto );
        }endforeach;
      }endforeach;

      $arLoja['produtos']= $arProdutos;
      //Montar Array produtos----------------------------------------------------


      array_push($arLojas, $arLoja);
          
    }endforeach;
    //Montar Array lojas------------------------------------------------------------

  }


  if($action == 'loja'){
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
    
  }

  $res['dados'] = $arLojas;
  header("Content-Type: application/json");
  echo json_encode($res);