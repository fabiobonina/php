<?php
	require_once '_usoFunction.php';
	require_once '../classes/Os.php';
	require_once '../classes/OsTecnicos.php';
	require_once '../classes/Mod.php';
	require_once '../classes/Nota.php';
	require_once '../classes/DeslocStatus.php';
	require_once '../classes/DeslocTrajetos.php';

	class OsFunction extends UsoFunction {

		public function insertOsTec($tecnicos, $osId, $idLoja){
			
			$osTecnicos   = new OsTecnicos();
			$cont1 = '0';
			$cont2 = '0';
			foreach ($tecnicos as $value){
				$cont1++;
				$tecId = $value['id'];
				$userTec = $value['user'];
				$userNickTec = $value['userNick'];
				$hhTec = $value['hh'];

				$validar = $osTecnicos->findTecOs( $tecId, $osId );
				if(	count($validar) == '0' ){ 
					
					$osTecnicos->setOs($osId);
					$osTecnicos->setLoja($idLoja);
					$osTecnicos->setTecnico($tecId);
					$osTecnicos->setUser($userTec);
					$osTecnicos->setUserNick($userNickTec);
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
		public function listOsTec( $osId ){
			$osTecnicos = new OsTecnicos();
			$mods 		= new Mod();
			$arTecnicos = array();
			foreach($osTecnicos->findOs( $osId ) as $key => $value): {
				$arTecnico = (array) $value;
	        	$tecId = $value->tecnico;
          		#MODS-------------------------------------------------------
          		$arTecnico['mods'] = $this->listOsTecMod( $osId, $tecId );
          		#MODS-------------------------------------------------------
				array_push($arTecnicos, $arTecnico);
			}endforeach;
			
			return $arTecnicos;
		}
		public function listOsTecMod( $osId, $tecId ){
			$mods 			= new Mod();
			$deslocStatus 	= new DeslocStatus();
			$deslocTrajetos = new DeslocTrajetos();
			$osTecnicos 	= new OsTecnicos();
			#MODS--------------------------------------------------------------------------------------------
			$arMods = array();
			foreach($mods->findOsTec( $osId, $tecId ) as $key => $value):{
				$arItem =(array) $value;
				$arItem['tecnico']	= $osTecnicos->find($value->tecnico);
				$arItem['status'] 	= $deslocStatus->find($value->status);
				$arItem['trajeto'] 	= $deslocTrajetos->find($value->trajeto);
				array_push($arMods, $arItem);
			}endforeach;
			return  $arMods;
			#MODS--------------------------------------------------------------------------------------------
			
		}
		public function listOsTecModValidacao( $osId, $tecId, $tecHh, $statusId, $trajetoId, $tipoValor, $dtFinal, $kmFinal, $valor ){
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
				$value   		= $data['0'];
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
					$datas['tempo'] 	= $tempo;
					$datas['hhValor'] 	= $this->somarHhValor($tempo, $tecHh );
				}	
				# validar TipoTrajeto
				if( $value->trajeto != $trajetoId){
					$res['error'] = true;
					array_push($arErros, 'Error, Tipo de trajeto é diferente do inicial');
				}else{
					# validar KM
					if( $trajetoId == '1'){
						$valor = $this->somarValorKm($kmInicio, $kmFinal, $tipoValor);
						if( isset($valor['error']) && $valor['error'] == true ){
							$res['error'] =  $valor['error'];
							array_push($arErros, $valor['message']);
						}else{
							$datas['valor'] = $valor;
						}
					}elseif( $trajetoId == '2'){
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
		public function modAdd( $osId, $tecId, $trajetoId, $statusId, $statusProcesso, $date, $km, $valor ){
			$mods 			= new Mod();
			$oss 			= new Os();
			$ativo 			= '0';
			$arSucesso 		= array();
			$arErros 		= array();
			if( count( $mods->findOsTecAtiv( $osId, $tecId, $ativo )) == '0'){
				$mods->setOs($osId);
				$mods->setTecnico($tecId);
				$mods->setTrajeto($trajetoId);
				$mods->setStatus($statusId);
				$mods->setDtInicio($date);
				$mods->setKmInicio($km);
				$mods->setValor($valor);
				
				# InsertFinal
				$item = $mods->insertInicio();
				if( $item['error'] ){
					$res['error']		= $item['error'];
					array_push($arErros, $item['message']);

				}else{
					$itemII = $oss->upProcesso($osId, $statusProcesso );
					if( $itemII['error'] ){
						array_push($arErros, $itemII['message']);
					}else{
						$res['error'] = $itemII['error'];
						array_push($arSucesso, $item['message']);
						array_push($arSucesso, $itemII['message']);
					}
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
		public function modUp( $osId, $trajetoId, $statusProcesso, $date, $km, $tempo, $hhValor, $valor, $modId ){
			$mods 			= new Mod();
			$oss 			= new Os();

			$arSucesso 		= array();
			$arErros 		= array();

			$mods->setTrajeto($trajetoId);
			$mods->setDtFinal($date);
			$mods->setKmFinal($km);
			$mods->setTempo($tempo);
			$mods->setHhValor($hhValor);
			$mods->setValor($valor);
			$mods->setAtivo('1');
			
			# InsertFinal
			$item = $mods->insertFinal($modId);
			if( $item['error'] ){
				$res['error']		= $item['error'];
				array_push($arErros, $item['message']);

			}else{
				array_push($arSucesso, $item);

				$itemII = $oss->upProcesso($osId, $statusProcesso );
				if( $itemII['error'] ){
					array_push($arErros, $itemII['message']);
				}else{
					$res['error'] = $itemII['error'];
					array_push($arSucesso, $itemII);
				}
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
		public function insertTecMod( $osId, $tecId, $tecHh, $statusId, $statusProcesso, $statusCategoria, $trajetoId, $tipoValor, $date, $km, $valor, $tecNivel ){
			$arSucesso 		= array();
			$arErros 		= array();
			$res['error'] 	= false;
			if( $trajetoId == '1' && $tecNivel == '1'){
				$trajetoId 	= '3';
				$tipoValor	= '0';
				$km     	= '0';
			}
		
			#validar informações
			$tec = $this->listOsTecModValidacao( $osId, $tecId, $tecHh, $statusId, $trajetoId, $tipoValor, $date, $km, $valor );
			if( $tec['error'] ){
				$res['error'] = $tec['error'];
				$res['message'] = $tec['message'];
			}else{
				#desloc aberto
				if ( $tec['data'] == '1' ) {
					# InsertFinal
					$itemI = $this->modUp( $osId, $trajetoId, $statusProcesso, $date, $km, $tec['tempo'], $tec['hhValor'], $tec['valor'], $tec['modId']);
					if( $itemI['error'] ){
						$res['error'] = $itemI['error'];
						array_push($arErros, $itemI['message']);
					}else{
						$res['error'] = $itemI['error'];
						array_push($arSucesso, $itemI['message']);
					}
				}
				if ( ($tec['data'] == '0' || $statusCategoria == '2') && !$res['error'] ) {
					#desloc inicial
					$itemII =  $this->modAdd( $osId, $tecId, $trajetoId, $statusId, $statusProcesso, $date, $km, $valor );
					if( $itemII['error'] ){
						$res['error'] = $itemII['error'];
						array_push($arErros, $itemII['message']);
					}else{
						$res['error'] = $itemII['error'];
						array_push($arSucesso, $itemII['message']);
					}
				}
			}

			if($res['error']){
				$res['message'] = $arErros;
				return $res;
			}else{
				$res['message'] = $arSucesso;
				return $res;
			}
			
		}

	}
