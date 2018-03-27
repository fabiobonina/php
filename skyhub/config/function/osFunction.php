<?php

	include( '_usoFunction.php');
	include('../classes/Os.php');
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
		public function listOsTecModValidacao( $osId, $tecId, $statusId, $tipoId, $tipoValor, $dtFinal, $kmFinal, $valor ){
			$mods = new Mod();
			
			$ativo = '0';
			$res['error'] = false;
			$arErros = array();
			#MODS.................................
			$data = $mods->findOsTecAtiv( $osId, $tecId, $ativo );

			if( count($data) > '1' ){
				$res['error'] 	= true;
				$res['message'] ='Error, Mais de 1 trajeto aberto!';
				return $res;
			}elseif( count($data) == '0' ){
				$res['error'] = false;
				$res['data'] = '0';
				return $res;
			}else{
				$value   = $data['0'];
				$datas['modId']	= $value->id;
				$dtInicio 		= $value->dtInicio;
				$kmInicio 		= $value->kmInicio;
				# validar Status
				if( $value->status == $statusId ){
					$res['error'] = true;
					array_push($arErros, 'Error, exite um deslocamento aberto com esse mesmo Status');
				}
				# validar data
				$tempo = $this->dtDiff($dtInicio, $dtFinal);
				if( isset($tempo['error']) && $tempo['error'] == true ){
					$res['error'] =  $tempo['error'];
					array_push($arErros, $tempo['message']);
				}else{
					$datas['tempo'] = $tempo;
				}	
				# validar TipoTrajeto
				if( $value->tipoTrajeto != $tipoId){
					$res['error'] = true;
					array_push($arErros, 'Error, Tipo de trajeto é diferente do inicial');
				}else{
					# validar KM
					if( $tipoId == '1'){
						$valor = $this->somarValorKm($kmInicio, $kmFinal, $tipoValor);
						if( isset($valor['error']) && $valor['error'] == true ){
							$res['error'] =  $valor['error'];
							array_push($arErros, $valor['message']);
						}else{
							$datas['valor'] = $valor;
						}
					}elseif( $tipoId == '2'){
						$datas['valor'] = $value->valor + $valor;
					}else{
						$datas['valor'] = '0';
					}
				}
			}
			if($res['error']){
				$res['message'] = $arErros;
				return $res;
			}else{
				$datas['error'] = false;
				$datas['data'] = '1';
				return $datas;
			}
	
		}
		public function modAdd( $osId, $tecId, $tipoId, $statusId, $statusProcesso, $date, $km, $valor ){
			$mods 			= new Mod();
			$oss 			= new Os();
			$ativo 			= '0';
			$res['error'] = false;
			$arSucesso 		= array();
			$arErros 		= array();
			if( count( $mods->findOsTecAtiv( $osId, $tecId, $ativo )) == '0'){
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
					array_push($arSucesso, "OK, deslocamento salvo com sucesso");
					if( $oss->upProcesso($osId, $statusProcesso )){
						array_push($arSucesso, "OK, processo da OS alterado com sucesso");
					}else{
						$res['error'] = true;
						array_push($arErros, "Error, nao foi possivel mudar processo OS");
					}
				}else{
					$res['error']	= true;
					array_push($arErros, "Error, nao foi possivel iniciar deslocamento");
				}
			}else{
				$res['error']	= true;
				array_push($arErros, "Error, exite um deslocamento em aberto");
			}
			if($res['error']){
				$res['message'] = $arErros;
				return $res;
			}else{
				$res['message'] = $arSucesso;
				return $res;
			}
			
		}
		public function modUp( $osId, $tecId, $tipoId, $statusProcesso, $date, $km, $tempo, $valor, $modId ){
			$mods 			= new Mod();
			$oss 			= new Os();

			$res['error'] 	= false;
			$arSucesso 		= array();
			$arErros 		= array();

			$mods->setOs($osId);
			$mods->setTecnico($tecId);
			$mods->setTipoTrajeto($tipoId);
			$mods->setDtFinal($date);
			$mods->setKmFinal($km);
			$mods->setTempo($tempo);
			$mods->setValor($valor);
			$mods->setAtivo('1');
			
			# InsertFinal
			if( $mods->insertFinal($modId) ){
				array_push($arSucesso, "OK, deslocamento salvo com sucesso");
				if( $oss->upProcesso($osId, $statusProcesso )){
					array_push($arSucesso, "OK, processo da OS alterado com sucesso");
				}else{
					$res['error'] = true;
					array_push($arErros, "Error, nao foi possivel mudar processo OS");
				}
			}else{
				$res['error']	= true;
				array_push($arErros, 'Error, não foi possivel fechar o deslocamento( '.$modId.' )');
			}
			if($res['error']){
				$res['message'] = $arErros;
				return $res;
			}else{
				$res['message'] = $arSucesso;
				return $res;
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
		public function insertTecMod( $osId, $tecId, $statusId, $statusProcesso, $statusCategoria, $tipoId, $tipoValor, $date, $km, $valor, $tecNivel ){
			$res['error']   = false;
			if( $tipoId == '1' && $tecNivel == '1'){
				$tipoId 	= '3';
				$tipoValor	= '0';
				$km     	= '0';
			}
			#validar informações
			$tec = $this->listOsTecModValidacao( $osId, $tecId, $statusId, $tipoId, $tipoValor, $date, $km, $valor );
			if( $tec['error'] ){
				$res['error'] = $tec['error'];
				$res['message'] = $tec['message'];
			}else{
				#desloc aberto
				if ( $tec['data'] == '1' ) {
					# InsertFinal
					$item = $this->modUp( $osId, $tecId, $tipoId, $statusProcesso, $date, $km, $tec['tempo'], $tec['valor'], $tec['modId']);
					if( $item['error'] ){
						$res['error'] = $item['error'];
						$res['message']= $item['message'];
					}else{
						$res['error'] = $item['error']; 
						$res['message'] = $item['message'];
					}
				}
				if ( $tec['data'] == '0' || $statusCategoria == '2') {
					#desloc inicial
					$item =  $this->modAdd( $osId, $tecId, $tipoId, $statusId, $statusProcesso, $date, $km, $valor );
					if( $item['error'] ){
						$res['error'] = $item['error'];
						$res['message'] = $item['message'];
					}else{
						$res['error'] = $item['error']; 
						$res['message'] = $item['message'];
					}
				}
			}

			return $res;
			
		}
	}
