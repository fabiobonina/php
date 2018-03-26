<?php

	include( '_usoFunction.php');
	include('../classes/osTecnicos.php');
	include('../classes/Mod.php');
	include('../classes/Nota.php');
	include('../classes/DeslocStatus.php');


	class OsFunction extends UsoFunction {

		public function insertOsTec($tecnicos, $osId, $idLoja){
		
			$cont1 = '0';
			$cont2 = '0';
			foreach ($tecnicos as $value){
				$osTecnicos   = new OsTecnicos();
				$cont1++;

				$tecId = $value['id'];
				$userTec = $value['userNick'];
				$hhTec = $value['hh'];

				$validar = $this->listOsTec($osId, $tecId);
				if(	count($validar) == '0' ){ 
					
					$osTecnicos->setOs($osId);
					$osTecnicos->setLoja($idLoja);
					$osTecnicos->setTecnico($tecId);
					$osTecnicos->setUser($userTec);
					$osTecnicos->setHh($hhTec);
					if($osTecnicos->insert()){
						$cont2++;
					}

				}
			}
			if($cont2 == '0'){
				$res['error'] = true;
				$res['message'] = "Error, nao foi possivel salvar os dados";    
			}else{
				$res['error'] = false;
				$res['message']= 'OK, salvo '.$cont2.'/ '.$cont1.' enviados';
			}

			return $res;
		}
		public function deleteOsTec($tecId, $osId){
			$osTecnicos   = new OsTecnicos();

			$validar = $this->listOsTecMod($osId, $tecId);
			if(	count($validar) == '0' ){ 
				if($osTecnicos->delete($tecId)){
					$res['error'] = false;
					$res['message']= 'OK, Tecnico deletado!';
				}else{
					$res['error'] = true;
					$res['message'] = "Error, nao foi possivel deletar os dados"; 
				}
			}else{
				$res['error'] = true;
				$res['message'] = "Error, tecnico com deslocamento amarado a OS"; 
			}

			return $res;
		}
		public function listOsTec( $osId, $tecId ){
			$osTecnicos   = new OsTecnicos();
			$arTecnicos = array();
			foreach($osTecnicos->findAll() as $key => $value):if($value->os == $osId && $value->tecnico == $tecId)  {
			$arTecnico = (array) $value;
			array_push($arTecnicos, $arTecnico);
			}endforeach;
			
			return $arTecnicos;
		}
		public function listOsTecMod( $osId, $tecId ){
			$mods = new Mod();
			$deslocStatus = new DeslocStatus();
			#MODS--------------------------------------------------------------------------------------------
			$arMods = array();
			foreach($mods->findAll() as $key => $value):if($value->os == $osId && $value->tecnico == $tecId)  {
			$arItem = $value;
			array_push($arMods, $arItem);
			}endforeach;
			return  $arMods;
			#MODS--------------------------------------------------------------------------------------------
			
		}
		
		public function listOsTecModValidacao( $osId, $tecId, $statusId, $dtFinal, $tipoId, $tipoValor, $kmFinal ){
			$mods = new Mod();
			#MODS--------------------------------------------------------------------------------------------
			$ativo = '0';
			$arMods = array();
			$res['error'] = false;
			$res['message'] = array();
			$arMods['data'] = array();
			foreach($mods->findOsTecAtiv( $osId, $tecId, $ativo ) as $key => $value): {
				$arItem 		= (array) $value;
    			$arMods['modId']= $value->id;
				$dtInicio 		= $value->dtInicio;
				$kmInicio 		= $value->kmInicio;
				# validar Status
				if( $value->status ==  $statusId ){
					$res['error'] = true;
					array_push($res['message'], 'Error, exite um deslocamento aberto com esse mesmo Status');
				}
				# validar data
				$tempo = $this->dtDiff($dtInicio, $dtFinal);
				if( $tempo['error'] ){
					$res['error'] =  $tempo['error'];
					array_push($res['message'], $tempo['message']);
				}else{
					$arMods['tempo'] = $tempo;
				}	
				# validar TipoTrajeto
				if( $value->tipoTrajeto != $tipoId){
					$stTeste = true;
					array_push($res['message'], 'Error, Tipo de trajeto é diferente do inicial');
				}else{
					# validar KM
					$valor = $this->somarValorKm($kmInicio, $kmFinal, $tipoValor);
					if( $valor['error'] ){
						$res['error'] =  $valor['error'];
						array_push($res['message'], $valor['message']);
					}else{
						$arMods['valor'] = $valor;
					}	
				}
				
				array_push($arMods['data'], $arItem);
			}endforeach;

			if($res['error']){
				return $res;
			}elseif( count($tecI['data']) > '1' ){
				$res['error'] = true;
				array_push($res['message'], 'Error, Mais de 1 trajeto aberto!');
				return $res;
			}else{
				$arMods['error'] = false;
				return $arMods;
			}
			#MODS--------------------------------------------------------------------------------------------
		}

		public function modAdd( $osId, $tecId, $tipoId, $statusId, $statusProcesso, $date, $km, $valor ){
			
			$mods = new Mod();
			$oss = new Os();
			$res['message'] = array();
			$mods->setOs($osId);
			$mods->setTecnico($tecId);
			$mods->setTipoTrajeto($tipoId);
			$mods->setStatus($statusId);
			$mods->setDtInicio($date);
			$mods->setKmInicio($km);
			$mods->setValor($valor);

			# InsertFinal
			if( $mods->insertInicio() ){
				$res['error']	= false;
				$res['message']	= "OK, deslocamento salvo com sucesso";
				if( $oss->upProcesso($osId, $statusProcesso )){
					$res['error'] = false;
					array_push($res['message'], "OK, processo da OS alterado com sucesso");
				}else{
					$res['error'] = true;
					array_push($arErros, "Error, nao foi possivel mudar processo OS");
				}
			}else{
				$res['error']	= true;
				$res['message'] = "Error, nao foi possivel iniciar deslocamento";
			}
		}

		public function modUp( $osId, $tecId, $tipoId, $statusId, $statusProcesso, $date, $km, $tempo, $valor, $modId ){
			$mods = new Mod();
			$mods->setOs($osId);
			$mods->setTecnico($tecId);
			$mods->setTipoTrajeto($tipoId);
			$mods->setStatus($statusId);
			$mods->setDtFinal($date);
			$mods->setKmFinal($km);
			$mods->setTempo($tempo);
			$mods->setValor($valor);
			$mods->setAtivo('1');
			
			# InsertFinal
			if( $mods->insertFinal($modId) ){
				$res['error']	= false;
				array_push($res['message'], "OK, dados salvo com sucesso");
				if( $oss->upProcesso($osId, $statusProcesso )){
					$res['error'] = false;
					array_push($res['message'], "OK, processo da OS alterado com sucesso");
				}else{
					$res['error'] = true;
					array_push($arErros, "Error, nao foi possivel mudar processo OS");
				}
			}else{
				$res['error']	= true;
				array_push($res['message'], 'Error, não foi possivel fechar o deslocamento( '.$modId.' )');
			}
		}

		public function listOsNota( $osId ){
			$notas = new Nota();
			#MODS--------------------------------------------------------------------------------------------
			$arDatas = array();
			foreach($notas->findAll() as $key => $value):if($value->os == $osId )  {
				$arItem = $value;
				array_push($arDatas, $arItem);
			}endforeach;
			return  $arDatas;
			#MODS--------------------------------------------------------------------------------------------
		}

	}
