<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');



  function __autoload($class_name){
		require_once '../classes/' . $class_name . '.php';
	}

  $loja = new Loja();
  $lojaGrupos = new LojaGrupos();

  $locais = new Locais();
  $locaisGrupos = new LocaisGrupos();

  $grupos = new Grupos();

  
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
      $arLocalGrupo = array();
      foreach($locais->findAll() as $key => $value):if($value->loja == $lojaId) {
        $arLocal = (array) $value;
        $localId = $value->id;

        if( $value->latitude <> 0.00000 && $value->longitude <> 0.00000){
          $cont_localGeo++;
        }
        
        //Montar Array grupos----------------------------------------------------
        $arGrupos = array();
        foreach($locaisGrupos->findAll() as $key => $value):if($value->local == $localId) {
          $grupoId = $value->grupo;
          foreach($grupos->findAll() as $key => $value):if($value->id == $grupoId) {
            $arGrupo = (array) $value;
            array_push($arGrupos, $arGrupo );
          }endforeach;
        }endforeach;

        $arlocal['grupos']= $arGrupos;
        //Montar Array grupos----------------------------------------------------


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

      //Montar Array grupos----------------------------------------------------
      $arGrupos = array();
      foreach($lojaGrupos->findAll() as $key => $value):if($value->loja == $lojaId) {
        $gruposId = $value->grupo;
        foreach($grupos->findAll() as $key => $value):if($value->id == $gruposId) {
          $arGrupo = (array) $value;
          array_push($arGrupos, $arGrupo );
        }endforeach;
      }endforeach;

      $arLoja['grupos']= $arGrupos;
      //Montar Array grupos----------------------------------------------------


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