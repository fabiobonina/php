<?php
	require_once '_global.php';
	require_once '../emailPHP.php';

	class CilindroProgControl extends GlobalControl {

		public function matrix( $item ){
			
			$lojas     		= new Loja();
			$locais     	= new Local();
			
			$item->local 			= $locais->find( $item->local_id );
			$item->local_tipo		= $item->local->tipo;
			$item->local_name		= $item->local->name;
			$item->local_municipio	= $item->local->municipio;
			$item->local_uf			= $item->local->uf;
			$item->loja 			= $lojas->find( $item->loja_id );
			$item->loja_nick		= $item->loja->nick;
			$item->loja_name		= $item->loja->name;
			//$item->local_uf			= $loja->uf;
			//$item->local_lat		= $local->latitude;
			//$item->local_long		= $local->longitude;
			//$item->equipamento		= $equipamentos->find( $item->equipamento_id );
			$item->demandas		= $this->listDemanda( $item->id );

			//$oss->ajuste( $item->id, $local->uf );
			//$osTecnicos->ajuste( $item->id, $item->status );

			return $item;

		}

		public function publish(
			$loja_id,
			$local_id,
			$data,
			$status,
			$id )
		{
			$item['error'] = false;
			$cilindroProg	= new CilindroProg();

			$cilindroProg->setLoja($loja_id);
			$cilindroProg->setLocal($local_id);
			$cilindroProg->setData($data);
			$cilindroProg->setStatus($status);

			if( $id == '' ):
				# Insert
				$item = $cilindroProg->insert();

			endif;
			if( $id > '0' ):
				# Update
				$item = $cilindroProg->update($id);

			endif;

			$res = $item;
			return $res;

		}
		public function delete( $os_id ){

			$oss 			= new Os();
			$osTecnicos		= new OsTecnicos();
			//$item 	= $this->anexoLoja( $os_id );
			//if( !$item['error'] ){
				//echo 'delete';
				$item	= $oss->delete( $os_id );
				$item	= $osTecnicos->deleteOs( $os_id );
			//}
			$res	= $item;
			return $res;
		}
		
		public function status( $status, $os_id ) {
			$oss	= new Os();
			//$item['error'] = false;

			$data = date("Y-m-d H:i:s");
			$oss->setStatus($status);
			$oss->setDtConcluido($data);
			$oss->setDtFech($data);

			#reabrir
			$reabrir = '0';
			if($status == $reabrir){
				$item = $oss->statusI($os_id);
				$email_status = ' atendimento reaberto';
			}
			#atendimento inicio
			$at_inicio = '1';
			if($status == $at_inicio){

				$item = $oss->statusI($os_id);
				$email_status = ' atendimento iniciado';
				//$item['message1'] = $email_status;

			}
			#atendimento 
			$at_final = '2'; 
			if($status == $at_final ){

				$item = $oss->statusI($os_id);
				$email_status = ' atendimento encerrado';

			}
			#ajuste OS 
			$os_ajuste = '3';
			if($status == $os_ajuste ){

				$item = $oss->statusI($os_id);
				$email_status = ' OS reaberta por divergência nas informações';

			}
			#concluir OS 
			$os_concluir = '4';
			if( $status == $os_concluir ){

				$item = $oss->concluir($os_id);
				$email_status = ' a OS foi concluida';

			}
			#finalizada
			$os_final = '5';
			if( $status == $os_final ){

				$item = $oss->fechar($os_id);
				$email_status = ', a OS finalizada no sistema';

			}
			#validar
			$os_validar = '6';
			if( $status == $os_validar ){

				$item = $oss->statusI($os_id);
				$email_status = ' OS validada';
			}
			if(!$item['error'] && $status != $os_validar ){
				$this->osEmail( $os_id, $email_status );
			}

			$res = $item;
			return $res;
		}

		public function list(){
			$cilindroProg	= new CilindroProg();
			$itens 	= array();
			foreach($cilindroProg->findAll() as $key => $value): {
				$item = $value;
				$item = $this->matrix( $item );
				$item = (array)  $item;
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		public function show( $cilProgramacao_id ){
			$cilindroProg	= new CilindroProg();
			
			$item = $cilindroProg->find( $cilProgramacao_id );

			if( key($item) == "id" ){
				$res['error'] = false;
				$res['programacao'] = $this->matrix( $item );
				$res['message'] = 'OK, Dados emcontrado';
				
			}else{
				$res = $item;
			}

			return $res;

		}

		public function listDemanda( $progracao_id ){
			$cilindroDemandas 	= new CilindroDemanda();
			$cilTipos			= new CilTipo();
			

			$arItem = array();
			foreach($cilindroDemandas->findProg( $progracao_id ) as $key => $value): {
				
				$value->cil_tipo = $cilTipos->find( $value->cil_tipo_id );
				array_push( $arItem, $value );
			}endforeach;
			
			return $arItem;
		}

		/*public function listLoja( $loja_id ){
			$oss	= new Os();
			$itens 	= array();
			
			foreach($oss->findLoja( $loja_id ) as $key => $value): {
				$item = $value;
				$item = $this->matrix( $item );
				$item = (array)  $item;
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		public function listProprietario( $proprietario_id ){
			$oss	= new Os();
			$itens 	= array();
			
			foreach($oss->findProprietario( $proprietario_id ) as $key => $value): {
				$item = $value;
				$item = $this->matrix( $item );
				$item = (array)  $item;
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		public function listIIIProprietario( $proprietario_id ){
			$oss	= new Os();
			$itens 	= array();
			
			foreach($oss->findIIIProprietario( $proprietario_id ) as $key => $value): {
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		public function listIIILoja( $loja_id ){
			$oss	= new Os();
			$itens 	= array();
			
			foreach($oss->findIIILoja( $loja_id ) as $key => $value): {
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}
		public function findAmarar(){
			$oss	= new Os();
			$itens 	= array();
			
			foreach($oss->findAmarar() as $key => $value): {
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}
		public function findStatus( $status ){
			$oss	= new Os();
			$itens 	= array();
			
			foreach($oss->findStatus( $status ) as $key => $value): {
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}
		

		public function contStatusUFProprietario( $loja_id ){
			$oss	= new Os();
			$itens 	= array();
			
			foreach($oss->findIIILoja( $loja_id ) as $key => $value): {
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}
		public function listTec( $user_id, $uf ){
			$osTecnicos	= new OsTecnicos();
			$itens 	= array();
			
			foreach($osTecnicos->findUserUF( $user_id, $uf) as $key => $value): {
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}
		
		
		public function listOsTecMod( $os_id, $tecId ){
			$mods 			= new Mod();
			$deslocStatus 	= new DeslocStatus();
			$deslocTrajetos = new DeslocTrajetos();
			$osTecnicos 	= new OsTecnicos();
			#MODS--------------------------------------------------------------------------------------------
			$arMods = array();
			foreach($mods->findOsTec( $os_id, $tecId ) as $key => $value):{
				$arItem =(array) $value;
				$arItem['tecnico']	= $osTecnicos->findTecOs($tecId, $os_id);
				$arItem['status'] 	= $deslocStatus->find($value->status);
				$arItem['trajeto'] 	= $deslocTrajetos->find($value->trajeto);
				array_push($arMods, $arItem);
			}endforeach;
			return  $arMods;
			#MODS--------------------------------------------------------------------------------------------
			
		}
		public function listOsTecModValidacao( $os_id, $tecId, $tecHh, $statusId, $trajetoId, $tipoValor, $date, $kmFinal, $valor ){
			$mods = new Mod();
			$res['error'] = false;
			$arMessage = array();
			$ativo = '0';
				#MODS.................................
				$data = $mods->findOsTecAtiv( $os_id, $tecId, $ativo );
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
					$res['modId']	= $value->id;
					$dtInicio 		= $value->dtInicio;
					$kmInicio 		= $value->kmInicio;
					# validar Status
					if( $statusId > $value->status ){
						$res['statusNivel'] 	= '2';
					}elseif( $statusId == $value->status ){
						$res['statusNivel'] 	= '1';
					}else{
						$res['error'] = false;
						array_push($arMessage, 'Error, Status inferior ao Status inicial');
					}
					# validar data
					$tempo = $this->dtDiff($dtInicio, $date);
					if( isset($tempo['error']) && $tempo['error'] == true ){
						$res['error'] =  $tempo['error'];
						array_push($arMessage, $tempo['message']);
					}else{
						$res['tempo'] 	= $tempo;
						$res['hhValor'] 	= $this->somarHhValor($tempo, $tecHh );
					}	
					# validar TipoTrajeto
					if( $value->trajeto != $trajetoId){
						$res['error'] = false;
						array_push($arMessage, 'Error, Tipo de trajeto é diferente do inicial');
					}else{
						# validar KM
						if( $trajetoId == '1'){
							$valor = $this->somarValorKm($kmInicio, $kmFinal, $tipoValor);
							if( isset($valor['error']) && $valor['error'] == true ){
								$res['error'] =  $valor['error'];
								array_push($arMessage, $valor['message']);
							}else{
								$res['valor'] = $valor;
							}
						}elseif( $trajetoId == '2'){
							$res['valor'] = $value->valor + $valor;
						}else{
							$res['valor'] = '0';
						}
					}
				}

				$res['message'] = $arMessage;
				$res['data'] 	= '1';
				return $res;
				
		}
		public function modAdd( $os_id, $tecId, $statusId, $dtInicio, $dtServInicio ){
			$mods 			= new Mod();
			$oss 			= new Os();

			$res['error']	= false;
			$arMessage 		= array();
			$ativo 			= '0';
			
			if( count( $mods->findOsTecAtiv( $os_id, $tecId, $ativo )) == '0'){
				$mods->setOs($os_id);
				$mods->setTecnico($tecId);
				$mods->setDtInicio($date);
				$mods->setDtServInicio($km);
				$mods->setStatus($statusId);
				# InsertFinal
				$item = $mods->insertInicio();
				$res['error']		= $item['error'];
				array_push($arMessage, $item['message']);
				if( !$res['error'] ){
					$itemII = $oss->upProcesso($os_id, $statusProcesso );
					$res['error']		= $itemII['error'];
					array_push($arMessage, $itemII['message']);
				}
			}else{
				$res['error']	= true;
				array_push($arMessage, "Error, exite um deslocamento em aberto");
			}

			$res['message'] = $arMessage;
			return $res;
		}
		public function modUp( $os_id, $trajetoId, $statusProcesso, $date, $km, $tempo, $hhValor, $valor, $modId ){
			$mods 			= new Mod();
			$oss 			= new Os();

			$arMessage 		= array();

			$mods->setTrajeto($trajetoId);
			$mods->setDtFinal($date);
			$mods->setKmFinal($km);
			$mods->setTempo($tempo);
			$mods->setHhValor($hhValor);
			$mods->setValor($valor);
			$mods->setAtivo('1');
			
			# InsertFinal
			$item 			= $mods->insertFinal($modId);
			$res['error']	= $item['error'];
			array_push($arMessage, $item['message'] );
			if( !$res['error'] ){
				$itemII = $oss->upProcesso($os_id, $statusProcesso );
				$res['error'] = $itemII['error'];
				array_push($arMessage, $itemII['message']);
				
			}

			$res['message'] = $arMessage;
			return $res;


		}
		public function insertTecMod( $os_id, $tecId, $tecName, $tecHh, $statusId, $statusProcesso, $trajetoId, $tipoValor, $date, $km, $valor, $tecNivel ){
			
			$mods = new Mod();
			$arMessage 		= array();
			$res['error'] 	= true;

			$etapaI = $mods->ModValido($tecId, $date);
			
			if( !$etapaI ){

				if( $trajetoId == '1' && $tecNivel == '1'){
					$trajetoId 	= '3';
					$tipoValor	= '0';
					$km     	= '0';
				}
			
				#validar informações
				$tec = $this->listOsTecModValidacao( $os_id, $tecId, $tecHh, $statusId, $trajetoId, $tipoValor, $date, $km, $valor );
				$res['error'] = $tec['error'];
				if( $res['error'] ){
					$res['message'] = $tec['message'];
				}else{
					#desloc aberto
					if ( $tec['data'] == '1' ) {
						# InsertFinal
						$itemI = $this->modUp( $os_id, $trajetoId, $statusProcesso, $date, $km, $tec['tempo'], $tec['hhValor'], $tec['valor'], $tec['modId']);
						$res['error'] = $itemI['error'];
						array_push($arMessage, $itemI['message']);
						
					}
					if ( ($tec['data'] == '0' || $tec['statusNivel']  == '2') && !$res['error'] ) {
						#desloc inicial
						$itemII =  $this->modAdd( $os_id, $tecId, $trajetoId, $statusId, $statusProcesso, $date, $km, $valor );
						$res['error'] = $itemII['error'];
						array_push($arMessage, $itemII['message']);

					}
				}
			}else{
				$res['error'] = false;
				array_push($arMessage, $tecName.' já tem um trajeto nesse periodo ('. $etapaI->dtInicio .' ate '. $etapaI->dtFinal .' ).');
			}
			$res['message'] = $arMessage;
			return $res;
			
			
		}
		public function validarTrajetoMod( $tecId, $dtInicio, $dtFinal, $modId ){
			
			$mods = new Mod();
			$arMessage 		= array();
			$res['error'] 	= false;

			$etapaI = $mods->ModValido($tecId, $dtInicio);
			$etapaII = $mods->ModValido($tecId, $dtFinal);
			
			if( !$etapaI || $modId == $etapaI->id ){

				array_push($arMessage, 'OK');
			}else{
				$res['error'] = true;
				array_push($arMessage, 'Error, já tem um trajeto nesse periodo ('. $etapaI->dtInicio .' ate '. $etapaI->dtFinal .' ) ');
			}
			if( !$etapaII || $modId == $etapaII->id ){
				array_push($arMessage, 'OK');
				
			}else{
				$res['error'] = true;
				array_push($arMessage, 'Error, já tem um trajeto nesse periodo ('. $etapaII->dtInicio .' ate '. $etapaII->dtFinal .' ) ');
			}
			$res['message'] = $arMessage;
			return $res;
		}*/
		
	}
