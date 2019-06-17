<?php
	require_once '_global.php';
	
	class TecControl extends GlobalControl {

		public function matrix( $item ){
			
			$users			= new User();

			$user					= $users->find( $item->user_id );
			$item->user_user		= $user->user;
			$item->avatar			= $user->avatar;

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

			$etapaI = $oss->validarOs( $local_id, $categoria_id, $equipamento_id, $data, $id );

			$dtUltimo   = '';
			$osUltimoMan = $oss->ultimaOs( $local_id, $categoria_id );
			if(isset($osUltimoMan->dtUltimo) ){
				$dtUltimo = $osUltimoMan->dtUltimo;
			}

			$oss->setProprietario($proprietario_id);
			$oss->setLoja($loja_id);
			$oss->setLojaNick($loja_nick);
			$oss->setLocal($local_id);
			$oss->setUf($uf);
			$oss->setEquipamento($equipamento_id);
			$oss->setCategoria($categoria_id);
			$oss->setServico($servico_id);
			$oss->setServicoTipo($servico_tipo);
			$oss->setData($data);
			$oss->setDtUltimoMan($dtUltimo);
			$oss->setDtCadastro($dtCadastro);
			$oss->setAtivo($ativo);
			$oss->setUser( $_SESSION['loginId']);

			if(	!isset($id) && !$etapaI ){
				# Insert
				$item = $oss->insert();
			
				if(!$item['error']){
					$email_status = 'foi abertar no sistema';
					$this->osEmail( $item['id'], $email_status );
				}
			}
			if(	$etapaI ){
				$item['error']   = true;
				$item['message'] = 'Error, OS já existe!';
			}

			if( isset($id) && ( !$item['error'] || $etapaI ) ):
				# Update
				$item = $oss->update($id);
				if(!$item['error']){
					$email_status = 'teve uma alteração';
					$this->osEmail( $id, $email_status );
				}
			endif;

			$res = $item;
			return $res;
		}

		public function listProprietario(){
			$tecnicos	= new Tecnicos();
			$itens 		= array();
			
			foreach($tecnicos->findProprietario( $_SESSION['user_proprietario'] ) as $key => $value) : if( $value->ativo == '0' ) {
				$item = $value;
				$item = $this->matrix( $item );
				$item = (array) $item;
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
		
		public function insertOsTec($tecnicos, $os_id, $loja_id ){
			
			$osTecnicos   = new OsTecnicos();

			foreach ($tecnicos as $value){
				$tec_id 	= $value['id'];
				$user_id 	= $value['user_id'];
				$user_nick 	= $value['user_nick'];
				$hh 		= $value['hh'];

				$validar = $osTecnicos->findTecOs( $tec_id, $os_id );
				if(	!$validar ){ 
					
					$osTecnicos->setOs($os_id);
					$osTecnicos->setLoja($loja_id );
					$osTecnicos->setTecnico($tec_id);
					$osTecnicos->setUser($user_id);
					$osTecnicos->setUserNick($user_nick);
					$osTecnicos->setHh($hh);
					
					$item = $osTecnicos->insert();

				}
			}
			
			$res = $item;
			return $res;
		}
		public function deleteOsTec($tec_id, $os_id){
			$osTecnicos   = new OsTecnicos();
			$item = array();
			$validar = $this->listOsTecMod($os_id, $tec_id);
			if(	count($validar) == '0' ){ 
				$item = $osTecnicos->delete($tec_id);
			}else{
				$item['error'] = true;
				$item['message'] = "Error, tecnico com deslocamento amarado a OS"; 
			}

			$res = $item;
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
				$tec_id = $value->tecnico_id;
				$tecItem = $tecnicos->find( $tec_id );
				$userItem = $user->find( $tecItem->user_id );
				$arTecnico['avatar'] = $userItem->avatar;
          		#MODS-------------------------------------------------------
          		$arTecnico['mods'] = $this->listOsTecMod( $os_id, $tec_id );
          		#MODS-------------------------------------------------------
				array_push($arTecnicos, $arTecnico);
			}endforeach;
			
			return $arTecnicos;
		}
		public function listOsTecMod( $os_id, $tec_id ){
			$mods 			= new Mod();
			$deslocStatus 	= new DeslocStatus();
			$deslocTrajetos = new DeslocTrajetos();
			$osTecnicos 	= new OsTecnicos();
			#MODS--------------------------------------------------------------------------------------------
			$arMods = array();
			foreach($mods->findOsTec( $os_id, $tec_id ) as $key => $value):{
				$arItem =(array) $value;
				$arItem['tecnico']	= $osTecnicos->findTecOs($tec_id, $os_id);
				$arItem['status'] 	= $deslocStatus->find($value->status);
				$arItem['trajeto'] 	= $deslocTrajetos->find($value->trajeto);
				array_push($arMods, $arItem);
			}endforeach;
			return  $arMods;
			#MODS--------------------------------------------------------------------------------------------
			
		}
		public function listOsTecModValidacao( $os_id, $tec_id, $tecHh, $statusId, $trajetoId, $tipoValor, $date, $kmFinal, $valor ){
			$mods = new Mod();
			$res['success'] = false;
			$arMessage = array();
			$ativo = '0';
				#MODS.................................
				$data = $mods->findOsTecAtiv( $os_id, $tec_id, $ativo );
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
		public function modAdd( $os_id, $tec_id, $statusId, $dtInicio, $dtServInicio ){
			$mods 			= new Mod();
			$oss 			= new Os();

			$res['success']	= false;
			$arMessage 		= array();
			$ativo 			= '0';
			
			if( count( $mods->findOsTecAtiv( $os_id, $tec_id, $ativo )) == '0'){
				$mods->setOs($os_id);
				$mods->setTecnico($tec_id);
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
		public function insertTecMod( $os_id, $tec_id, $tecName, $tecHh, $statusId, $statusProcesso, $trajetoId, $tipoValor, $date, $km, $valor, $tecNivel ){
			
			$mods = new Mod();
			$arMessage 		= array();
			$res['success'] 	= false;

			$etapaI = $mods->ModValido($tec_id, $date);
			
			if( !$etapaI ){

				if( $trajetoId == '1' && $tecNivel == '1'){
					$trajetoId 	= '3';
					$tipoValor	= '0';
					$km     	= '0';
				}
			
				#validar informações
				$tec = $this->listOsTecModValidacao( $os_id, $tec_id, $tecHh, $statusId, $trajetoId, $tipoValor, $date, $km, $valor );
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
						$itemII =  $this->modAdd( $os_id, $tec_id, $trajetoId, $statusId, $statusProcesso, $date, $km, $valor );
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
		public function validarTrajetoMod( $tec_id, $dtInicio, $dtFinal, $modId ){
			
			$mods = new Mod();
			$arMessage 		= array();
			$res['success'] 	= false;

			$etapaI = $mods->ModValido($tec_id, $dtInicio);
			$etapaII = $mods->ModValido($tec_id, $dtFinal);
			
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
		public function osEmail( $os_id, $email_status){
			
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
					$user['user_nick'] 	= $value['user_nick'];
	
					array_push($txtTec, $user['user_nick'] );
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
															<td width="40%" align="left">'.date('d/m/Y', strtotime(str_replace('-','/', $os->data))) .'</td>
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
															<td width="40%" align="left">'. $os->user_user .'</td>
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
														<tr style="background-color:#ffffcc;color:black valign:middle">
															<td colspan="4">
																<font size="3" >
																	<center>Prezado(a), ocorrencia ('. $os->id .') '. $email_status .'.
																	<a href="http://localhost/codephp/php/bitlouc/'. $os->id .'" target="_blank">acesso cliqui aqui</a>
																	<br><br></center>
																</font>
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
               
              <p><span class="icon mdi mdi-worker"></span>  <a v-for="tecnico in $os.tecnicos">.'tecnico.user_nick'. |</a> </p>
			</div>*/
			return $emailPhp->smtpmailer($txtEmails, $txtEmail, $txtNome, $txtAssunto, $corpoMensagem);
			//return $corpoMensagem;
		}

		
	}
