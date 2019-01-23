<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');



  function __autoload($class_name){
		require_once '../admin/classes/' . $class_name . '.php';
	}

  $oats = new Oats();
  $usuarios = new Usuarios();
  $clientes = new Clientes();
  $localidades = new Localidades();
  $sistemas = new Sistemas();
  $servicos = new Servicos();
  $descricoes = new Descricoes();
  $ativos = new Ativos();
  $cont_oatLat = 0;
  $out = "{";

     foreach($localidades->findAll() as $key => $value):{
        $localId = $value->id;
        $localidade = $value->cliente . " | " . $value->nome;
        $localLat = $value->latitude;
        $localLong = $value->longitude;
        $cont_oatTt = 0;

        foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->localidade == $localId && $value->status < 4 ) {
          $cont_oatTt++;
        }endforeach;

        if( $cont_oatTt > 0 && $localLat <> 0){
      		if ($out != "{") {
      			$out .= ",";
      		}
          $out .= '"'.$localidade.'": { ';
      		$out .= 'center: {lat: '.$localLat.', ';
      		$out .= 'lng: '.$localLong.'},';
          $out .= 'atendimento: '.$cont_oatTt.'}';


        }
      }endforeach;

		$out .= "}";


		echo $out;
