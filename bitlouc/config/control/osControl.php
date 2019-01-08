<?php
	require_once '_global.php';
	require_once '../emailPHP.php';

	class OsControl extends GlobalControl {

		public function matrix( $item ){
			
			$oss     		= new OS();
			$osTecnicos     = new OsTecnicos();
			$lojas     		= new Loja();
			$locais     	= new Local();
			$bens   		= new Bens();
			$servicos   	= new Servicos();
			$categorias 	= new Categorias();
			$notas      	= new Nota();
			$equipamentos	= new Equipamento();
			$fabricantes	= new Fabricantes();

			
			$local 					= $locais->find( $item->local_id );
			$item->local_tipo		= $local->tipo;
			$item->local_name		= $local->name;
			$item->local_municipio	= $local->municipio;
			$item->local_uf			= $local->uf;
			$item->local_lat		= $local->latitude;
			$item->local_long		= $local->longitude;
			$item->equipamento		= $equipamentos->find( $item->equipamento_id );
			if($item->equipamento){
				$fabricante				= $fabricantes->find( $item->equipamento->fabricante_id );
				$item->equipamento->fabricante_nick		= $fabricante->nick;
			}			
			$item->servico			= $servicos->find( $item->servico_id );
			$item->categoria		= $categorias->find( $item->categoria_id );
			$item->tecnicos			= $this->listOsTec( $item->id );
			$item->notas			= $notas->findOs( $item->id );

			$oss->ajuste( $item->id, $local->uf );
			$osTecnicos->ajuste( $item->id, $item->status );

			return $item;

		}

		public function publish(
			$proprietario_id,
			$loja_id,
			$loja_nick,
			$local_id,
			$uf,
			$equipamento_id,
			$categoria_id,
			$servico_id,
			$servico_tipo,
			$data,
			$dtCadastro,
			$ativo,
			$id)
		{
			$item['error'] = false;
			$oss	= new OS();

			$etapaI = $oss->validarOs( $local_id, $categoria_id, $equipamento_id, $data );

			if( !$etapaI ){
				$dtUltimo   = '';
				$osUltimoMan = $oss->ultimaOs( $local_id, $categoria_id);
				if(isset($osUltimoMan->dtUltimo) ){
					$dtUltimo = $osUltimoMan->dtUltimo;
				}
				$oss->setProprietario($proprietario_id);
				$oss->setLoja($loja_id);
				$oss->setLojaNick($loja_nick);
				$oss->setLocal($local_id);
				$oss->setEquipamento($equipamento_id);
				$oss->setCategoria($categoria_id);
				$oss->setServico($servico_id);
				$oss->setServicoTipo($servico_tipo);
				$oss->setData($data);
				$oss->setDtUltimoMan($dtUltimo);
				$oss->setDtCadastro($dtCadastro);
				$oss->setStatus($status);
				$oss->setAtivo($ativo);
				# Insert
				$item = $oss->insert();
			
				if($item['error']){
				$res['error'] = $item['error'];
				$res['message']= $item['message'];
				}else{
					$tecII = $osControl->osEmail( $item['id'] );
					$res['error'] = $item['error'];
				array_push($arMessage, $item['message']);
				array_push($arMessage, $item['message']);
				$res['message']= $arMessage;
				}
			}else{
				$res['error']   = true;
				$res['message'] = 'Error, OS já existe!';
			}



			foreach($oss->findAll() as $key => $value):if($value->loja_id == $loja_id )  {
				$validar = $this->checkDuplicity($value->name, $name );
				if( $validar ):
					$validarId = $value->id;
					$item['error'] = true;
					$item['message'] = 'Error, Nome já existe!';
				endif;
			}endforeach;
			
			if( !isset($id) && !$item['error'] ):
				# Insert
				$item = $oss->insert();
				if( !$item['error'] ){
					$item = $this->insertGeolocalizacao( $item['id'], $lat, $long );				
				}
			endif;
			if( isset($id) && ( !$item['error'] || $validarId == $id ) ):
				# Update
				$item = $oss->update($id);
				$item = $this->insertGeolocalizacao( $id, $lat, $long );
				//echo 'updade';
			endif;

			$res = $this->statusReturn($item);
			return $res;
		}

		public function listLoja( $loja_id ){
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

		public function findOs( $os_id ){
			$oss	= new Os();
			
			$item = $oss->find( $os_id );

			if( key($item) == "id" ){
				$res['error'] = false;
				$res['os'] = $this->matrix( $item );
				$res['message'] = 'OK, Dados emcontrado';
				
			}else{
				$res = $item;
			}

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
		
		public function insertOsTec($tecnicos, $os_id, $idLoja){
			
			$osTecnicos   = new OsTecnicos();
			$cont1 = '0';
			$cont2 = '0';
			foreach ($tecnicos as $value){
				$cont1++;
				$tecId = $value['id'];
				$userTec = $value['user_id'];
				$userNickTec = $value['userNick'];
				$hhTec = $value['hh'];

				$validar = $osTecnicos->findTecOs( $tecId, $os_id );
				if(	!$validar ){ 
					
					$osTecnicos->setOs($os_id);
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
				$res['success'] = true;
				$res['message'] = "Error, nao foi possivel salvar os dados";    
			}else{
				$res['success'] = false;
				$res['message']= 'OK, salvo '.$cont2.'/ '.$cont1.' enviados';
			}

			return $res;
		}
		public function deleteOsTec($tecId, $os_id){
			$osTecnicos   = new OsTecnicos();

			$validar = $this->listOsTecMod($os_id, $tecId);
			if(	count($validar) == '0' ){ 
				if($osTecnicos->delete($tecId)){
					$res['success'] = false;
					$res['message']= 'OK, Tecnico deletado!';
				}else{
					$res['success'] = true;
					$res['message'] = "Error, nao foi possivel deletar os dados"; 
				}
			}else{
				$res['success'] = true;
				$res['message'] = "Error, tecnico com deslocamento amarado a OS"; 
			}

			return $res;
		}
		public function listOsTec( $os_id ){
			$osTecnicos = new OsTecnicos();
			$mods 		= new Mod();
			$tecnicos	= new Tecnicos();
			$user 		= new User();

			$arTecnicos = array();
			foreach($osTecnicos->findOs( $os_id ) as $key => $value): {
				$arTecnico = (array) $value;
				$tecId = $value->tecnico_id;
				$tecItem = $tecnicos->find( $tecId );
				$userItem = $user->find( $tecItem->user_id );
				$arTecnico['avatar'] = $userItem->avatar;
          		#MODS-------------------------------------------------------
          		$arTecnico['mods'] = $this->listOsTecMod( $os_id, $tecId );
          		#MODS-------------------------------------------------------
				array_push($arTecnicos, $arTecnico);
			}endforeach;
			
			return $arTecnicos;
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
			$res['success'] = false;
			$arMessage = array();
			$ativo = '0';
				#MODS.................................
				$data = $mods->findOsTecAtiv( $os_id, $tecId, $ativo );
				if( count($data) > '1' ){
					$res['success'] 	= true;
					$res['message'] ='Error, Mais de 1 trajeto aberto!';
					return $res;
				}elseif( count($data) == '0' ){
					$res['success'] = false;
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
						$res['success'] = true;
						array_push($arMessage, 'Error, Status inferior ao Status inicial');
					}
					# validar data
					$tempo = $this->dtDiff($dtInicio, $date);
					if( isset($tempo['success']) && $tempo['success'] == true ){
						$res['success'] =  $tempo['success'];
						array_push($arMessage, $tempo['message']);
					}else{
						$res['tempo'] 	= $tempo;
						$res['hhValor'] 	= $this->somarHhValor($tempo, $tecHh );
					}	
					# validar TipoTrajeto
					if( $value->trajeto != $trajetoId){
						$res['success'] = true;
						array_push($arMessage, 'Error, Tipo de trajeto é diferente do inicial');
					}else{
						# validar KM
						if( $trajetoId == '1'){
							$valor = $this->somarValorKm($kmInicio, $kmFinal, $tipoValor);
							if( isset($valor['success']) && $valor['success'] == true ){
								$res['success'] =  $valor['success'];
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

			$res['success']	= false;
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
				$res['success']		= $item['success'];
				array_push($arMessage, $item['message']);
				if( !$res['success'] ){
					$itemII = $oss->upProcesso($os_id, $statusProcesso );
					$res['success']		= $itemII['success'];
					array_push($arMessage, $itemII['message']);
				}
			}else{
				$res['success']	= true;
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
			$res['success']	= $item['success'];
			array_push($arMessage, $item['message'] );
			if( !$res['success'] ){
				$itemII = $oss->upProcesso($os_id, $statusProcesso );
				$res['success'] = $itemII['success'];
				array_push($arMessage, $itemII['message']);
				
			}

			$res['message'] = $arMessage;
			return $res;


		}
		public function insertTecMod( $os_id, $tecId, $tecName, $tecHh, $statusId, $statusProcesso, $trajetoId, $tipoValor, $date, $km, $valor, $tecNivel ){
			
			$mods = new Mod();
			$arMessage 		= array();
			$res['success'] 	= false;

			$etapaI = $mods->ModValido($tecId, $date);
			
			if( !$etapaI ){

				if( $trajetoId == '1' && $tecNivel == '1'){
					$trajetoId 	= '3';
					$tipoValor	= '0';
					$km     	= '0';
				}
			
				#validar informações
				$tec = $this->listOsTecModValidacao( $os_id, $tecId, $tecHh, $statusId, $trajetoId, $tipoValor, $date, $km, $valor );
				$res['success'] = $tec['success'];
				if( $res['success'] ){
					$res['message'] = $tec['message'];
				}else{
					#desloc aberto
					if ( $tec['data'] == '1' ) {
						# InsertFinal
						$itemI = $this->modUp( $os_id, $trajetoId, $statusProcesso, $date, $km, $tec['tempo'], $tec['hhValor'], $tec['valor'], $tec['modId']);
						$res['success'] = $itemI['success'];
						array_push($arMessage, $itemI['message']);
						
					}
					if ( ($tec['data'] == '0' || $tec['statusNivel']  == '2') && !$res['success'] ) {
						#desloc inicial
						$itemII =  $this->modAdd( $os_id, $tecId, $trajetoId, $statusId, $statusProcesso, $date, $km, $valor );
						$res['success'] = $itemII['success'];
						array_push($arMessage, $itemII['message']);

					}
				}
			}else{
				$res['success'] = true;
				array_push($arMessage, $tecName.' já tem um trajeto nesse periodo ('. $etapaI->dtInicio .' ate '. $etapaI->dtFinal .' ).');
			}
			$res['message'] = $arMessage;
			return $res;
			
			
		}
		public function validarTrajetoMod( $tecId, $dtInicio, $dtFinal, $modId ){
			
			$mods = new Mod();
			$arMessage 		= array();
			$res['success'] 	= false;

			$etapaI = $mods->ModValido($tecId, $dtInicio);
			$etapaII = $mods->ModValido($tecId, $dtFinal);
			
			if( !$etapaI || $modId == $etapaI->id ){

				array_push($arMessage, 'OK');
			}else{
				
				$res['success'] = true;
				array_push($arMessage, 'Error, já tem um trajeto nesse periodo ('. $etapaI->dtInicio .' ate '. $etapaI->dtFinal .' ) ');
			}
			if( !$etapaII || $modId == $etapaII->id ){
				array_push($arMessage, 'OK');
				
			}else{
				$res['success'] = true;
				array_push($arMessage, 'Error, já tem um trajeto nesse periodo ('. $etapaII->dtInicio .' ate '. $etapaII->dtFinal .' ) ');
			}
			$res['message'] = $arMessage;
			return $res;
		}
		public function osEmail( $os_id ){
			
			$tecnicos   = new Tecnicos();
			$emailPhp   = new Email();
			$oss     	= new OS();

			$item 		= $oss->find( $os_id );
			$os			= $this->matrix( $item );
			
			/* Recuperar os Dados do Formulário de Envio*/
			$txtNome 		= 'BitLOUC';//$_POST["txtNome"];
			$txtAssunto 	= 'OCORRENCIA ('.$os->id.') '.$os->loja_nick.': '.$os->local_tipo.' - '.$os->local_name.', '.$os->local_municipio .'-'.$os->local_uf;//$_POST["txtAssunto"];
			$txtEmail 		= 'bitlouc@gmail.com';//$_POST["txtEmail"];
			$txtMensagem 	= 'OK';//$_POST["txtMensagem"];
			$txtTec 		= array();
			$txtEmails	 	= array();
			$txtNotas	 	= array();
			
			if($os->equipamento){
				$txtEquipamento = $os->equipamento->name .' '.$os->equipamento->modelo. ' &nbsp; #'.$os->equipamento->fabricante_nick. '  (Code: '.$os->equipamento->numeracao.' | Ativo: '. $os->equipamento->plaqueta .' )' ;
			}else{
				$txtEquipamento = 'não definido';
			}

			if($os->tecnicos){
				foreach ($os->tecnicos as $value){	
					$tec	= $tecnicos->find( $value['tecnico_id'] );
					
					$user['email'] 		= $tec->email;
					$user['userNick'] 	= $value['userNick'];
	
					array_push($txtTec, $user['userNick'] );
					array_push($txtEmails, $user );
					
				}
			}else{

			}
			//var_dump( $os->notas);
			foreach ($os->notas as $key => $value): {
				$item = $value->id;
				$item = '
				<td colspan="4">
					<table width="100%">
						<thead>
							<tr bgcolor="#DADADA">
								<td width="7%"><b>Data</b></td>
								<td width="20%">'. $DateOfRequest = date("d/m/Y H:i:s", strtotime( $value->data )) . '</td>
								<td width="9%"><b>Usuario</b></td>
								<td width="40">'.$value->user .'</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="4"><b>Descrição</b>'. $value->descricao . '</td>									
							</tr>
						</tbody>
					</table>
					<tr><td colspan="4"><hr></td></tr>
				</td>';
				array_push($txtNotas, $item );
			}endforeach;
			
			//$array = array('lastname', 'email', 'phone');
			$txtNotas = implode("", $txtNotas);
			$comma_separated = implode(", ", $txtTec);

			/* Montar o corpo do email*/
			$corpoMensagem = '<div>
				<table border="0" cellspacing="0" cellpadding="0" width="100%" height="6%">
					<tbody>
						<tr>
							<td valign="top" align="middle">
								<table border="1" cellspacing="0" cellpadding="0" width="100%" height="10%">
									<tbody>
										<tr>
											<td height="5%" align="middle">
												<table width="100%" border="0">
													<tbody>
														<tr>
															<td align="center" bgcolor="005483" colspan="1" >
																<a href="http://localhost/codephp/php/bitlouc/" target="_blank">
																	<img alt="Logo BitLOUC" title="Logo BitLOUC" style="margin-left:5%; float:left; width:128px;height:51px"  height="36" width="89" src="http://localhost/codephp/php/bitlouc/interface/imagem/bitlouc_logo.png"></img>
																</a>
																<b><font color="white" face="Arial" size="3" valign="middle">Informação da Ocorrencia </font></b>
																
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<table border="0" cellspacing="0" cellpadding="0" width="100%">
					<tbody>
						<tr><td height="10"></td></tr>
						<tr>
							<td valign="top">
								<table border="1" cellspacing="0" cellpadding="0" width="100%" height="100%">
									<tbody>
										<tr>
											<td valign="top" colspan="4">
												<table border="0" cellspacing="1" cellpadding="1" width="100%">
													<tbody>
														<tr height="20">
															<td bgcolor="#006699" width="10%" colspan="4" align="middle"><b>Ocorrencia</b></td>
														</tr>
														<tr height="5%">
															<td width="10%" align="left"><b>Ocorrencia </b></td>
															<td width="40%" align="left">
																<a href="http://localhost/codephp/php/bitlouc/'. $os->id .'" target="_blank">
																	<b>'. $os->id .'</b> cliqui aqui
																</a>
															</td>
															<td width="10%" align="left"><b>N° OS</b></td>
															<td width="40%" align="left">'.$os->filial.'-'.$os->os. ' </td>
														</tr>
														<tr height="5%">
															<td width="10%" align="left"><b>Data</b></td>
															<td width="40%" align="left">'.date('d/m/Y', strtotime(str_replace('-','/', $os->	data))) .'</td>
															<td width="10%" align="left"><b>Categoria</b></td>
															<td width="40%" align="left">'.$os->categoria->name.'</td>
														</tr>
														<tr height="5%">
															<td width="10%" align="left"><b>Loja</b></td>
															<td width="40%" align="left">'.$os->loja_nick.'</td>
															<td width="10%" align="left"> <b>Serviço</b> </td>
															<td width="40%" align="left">'.$os->servico->name.'</td>
														</tr>
														<tr height="5%">
															<td width="10%" align="left"> <b>Local</b> </td>
															<td width="40%" align="left">'.$os->local_tipo .' - '. $os->local_name. ' <a href="https://maps.google.com/maps?q='.$os->local_lat.'%2C'.$os->local_long .'&z=17&hl=pt-BR" target="_blank"> Como chegar</a></td>
															<td width="10%" align="left"><b>Equipamento</b></td>
															<td width="40%" align="left"> '.$txtEquipamento.'</td>
														</tr>
														<tr height="5%">
															<td width="10%" align="left"> <b>Municipio</b> </td>
															<td width="40%" align="left">'.$os->local_municipio .' - '. $os->local_uf. '</td>
															<td width="10%" align="left"><b>Solicitante</b></td>
															<td width="40%" align="left">'. $_SESSION['loginUser'].'</td>
														</tr>
														<tr height="5%">
															<td width="10%" align="left"><b>Desiginado(s)</b></td>
															<td width="40%" align="left" colspan="3">'. $comma_separated.'</td>
														</tr>
			
														<tr height="10%"><td colspan="4"> &nbsp;</td></tr>
														<tr height="20">
															<td bgcolor="#006699" width="10%" colspan="4" align="middle">
																<b>Historico de Atividades</b>
															</td>
														</tr>
														<tr valign="top">
															'. $txtNotas . '
														</tr>
														<tr height="10%"> <td colspan="4"> &nbsp; </td> </tr>
														<!-- >tr height="20">
															<td bgcolor="#006699" width="10%" colspan="4" align="middle">
																<b>Itens do Rateio</b>
															</td>
														</tr>
														<tr valign="top">
															<td colspan="4">
																<table width="100%">
																	<thead>
																		<tr bgcolor="#DADADA">
																			<td width="4%"> <b>Item</b> </td>
																			<td width="20%"> <b>Codigo</b> </td>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td>teste</td>
																			<td>Não existe rateio.</td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr-->
													</tbody>
												</table><br>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<span class="im">
					<i>Email enviado automaticamente. Não responder. - BitLOUC</i>      
				</span>
			</div>';
			
			/*<div class="column is-two-thirds has-text-left">
              <h1 class="title is-5"> .'$os.loja_nick'. | .'$os.local.tipo'. - .'$os.local.name'. (.'$os.local.municipio'./.'$os.local.uf'.) </h1>
              <p class="subtitle" style="margin-bottom: 0;"> .'$os.data'. | .'$os.servico.name'.
                <span class="pull-right"> <span class="tag">.' $os.categoria.name '.</span> &nbsp;  </span>
              </p>
               
              <p><span class="icon mdi mdi-worker"></span>  <a v-for="tecnico in $os.tecnicos">.'tecnico.userNick'. |</a> </p>
			</div>*/
			return $emailPhp->smtpmailer($txtEmails, $txtEmail, $txtNome, $txtAssunto, $corpoMensagem);
			//return $corpoMensagem;
		}

		
	}
