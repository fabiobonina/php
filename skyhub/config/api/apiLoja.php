<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

include("_chave.php");

  function __autoload($class_name){
		require_once '../classes/' . $class_name . '.php';
	}

  $loja = new Loja();
  $lojaCategorias = new LojaCategorias();

  $locais = new Locais();
  $localCategorias = new LocalCAtegorias();

  $categorias = new Categorias();

  
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
      $arLocalCategoria = array();
      foreach($locais->findAll() as $key => $value):if($value->loja == $lojaId) {
        
        $arLocal = (array) $value;
        $localId = $value->id;

        if( $value->latitude <> 0.00000 && $value->longitude <> 0.00000){
          $cont_localGeo++;
        }

        //Montar Array categoria----------------------------------------------------
        $arCategorias = array();
        foreach($localCategorias->findAll() as $key => $value):if($value->local == $localId) {
          $categoriaId = $value->categoria;
          foreach($categorias->findAll() as $key => $value):if($value->id == $categoriaId) {
            $arCategoria = (array) $value;
            array_push($arCategorias, $arCategoria );
          }endforeach;
        }endforeach;

        $arLocal['categoria']= $arCategorias;
        //Montar Array categoria----------------------------------------------------


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

      //Montar Array categorias----------------------------------------------------
      $arCategorias = array();
      foreach($lojaCategorias->findAll() as $key => $value):if($value->loja == $lojaId) {
        $categoriasId = $value->categoria;
        foreach($categorias->findAll() as $key => $value):if($value->id == $categoriasId) {
          $arCategoria = (array) $value;
          array_push($arCategorias, $arCategoria );
        }endforeach;
      }endforeach;

      $arLoja['categoria']= $arCategorias;
      //Montar Array categorias----------------------------------------------------


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
  echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);