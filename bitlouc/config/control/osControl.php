<?php
	require_once '_global.php';
	require_once 'email.control.php';
	require_once '../emailPHP.php';

	class OsControl extends GlobalControl {

		public function matrix( $item ){
			
			$oss     		= new Os();
			$osTecnicos     = new OsTecnicos();
			$lojas     		= new Loja();
			$locais     	= new Local();
			$servicos   	= new Servicos();
			$categorias 	= new Categorias();
			$notas      	= new Nota();
			$equipamentos	= new Equipamento();
			$fabricantes	= new Fabricantes();
			$users			= new User();

			
			$local 					= $locais->find( $item->local_id );
			$item->local_tipo		= $local->tipo;
			$item->local_name		= $local->name;
			$item->local_municipio	= $local->municipio;
			$item->local_uf			= $local->uf;
			$item->local_lat		= $local->latitude;
			$item->local_long		= $local->longitude;
			$item->equipamento		= $equipamentos->find( $item->equipamento_id );
			if($item->equipamento){
				$fabricante			= $fabricantes->find( $item->equipamento->fabricante_id );
				$item->equipamento->fabricante_nick		= $fabricante->nick;
			}
			$user					= $users->find( $item->user_id );
			$item->user_user		= $user->user;
			$item->servico			= $servicos->find( $item->servico_id );
			$item->categoria		= $categorias->find( $item->categoria_id );
			$item->tecnicos			= $this->listOsTec( $item->id );
			$item->notas			= $notas->findOs( $item->id );

			//$oss->ajuste( $item->id, $local->uf );
			//$osTecnicos->ajuste( $item->id, $item->status );

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
			$data,
			$dtCadastro,
			$ativo,
			$id)
		{
			$item['error'] = false;
			$oss	= new Os();

			if( $loja_id == '38' ){
				$etapaI = false;
			}else{
				$etapaI = $oss->validarOs( $local_id, $categoria_id, $equipamento_id, $data, $id );
			}
			
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
			$oss->setData($data);
			$oss->setDtUltimoMan($dtUltimo);
			$oss->setDtCadastro($dtCadastro);
			$oss->setAtivo($ativo);
			$oss->setUser( $_SESSION['loginId']);

			if(	$etapaI ){
				$item['error']   = true;
				$item['message'] = 'Error, OS já existe!';
				
			}else{

				if( $id == '' ):
					# Insert
					$item = $oss->insert();

					if(!$item['error']){
						$email_status = 'nova no sistema';
						$this->osEmail( $item['id'], $email_status );
					}
				endif;
				if( $id > '0' ):
					# Update
					$item = $oss->update($id);

					if(!$item['error']){
						$email_status = 'teve uma alteração';
						$this->osEmail( $id, $email_status );
					}
				endif;
				
			}

			

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
		public function amarar( $filial, $os, $id ) {
			$item['error'] = false;
			$oss	= new Os();
			
			$dtOs   = date("Y-m-d H:i:s");
			
			$oss->setFilial($filial);
			$oss->setOs($os);
			$oss->setDtOs($dtOs);
			# Amarar

			$item = $oss->amarar($id);
			
			if(!$item['error']){
				$email_status = 'recebeu o numero da OS';
				$this->osEmail( $id, $email_status );
			}

			$res = $item;
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

		public function statusII( $status, $os_id ) {
			$oss	= new Os();
			//$item['error'] = false;

			$data = date("Y-m-d H:i:s");
			$oss->setStatus($status);
			$oss->setDtConcluido($data);
			$oss->setDtFech($data);

			$item = $oss->statusII($os_id);
			$email_status = ' atendimento encerrado';

			
			if(!$item['error']){
				//$this->osEmail( $os_id, $email_status );
			}

			$res = $item;
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
		}
		public function osEmail( $os_id, $email_status){
			
			$tecnicos   = new Tecnicos();
			$emailPhp   = new Email();
			$users		= new User();
			$oss     	= new Os();

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
			
			#autor
			$autor['email'] 		= $_SESSION['loginEmail'] ;
			$autor['user_nick'] 	= $_SESSION['loginUser'] ;
			array_push($txtEmails, $autor );
			#solicitante
			$solicitante	= $users->findSimples( $os->user_id );
			$user['email'] 		= $solicitante->email;
			$user['user_nick'] 	= $solicitante->user;
			array_push($txtEmails, $user );
			
			#designados
			if($os->tecnicos){
				foreach ($os->tecnicos as $value){	
					$tec	= $tecnicos->find( $value['tecnico_id'] );
					
					$user['email'] 		= $tec->email;
					$user['user_nick'] 	= $tec->user_nick;
	
					array_push($txtTec, $user['user_nick'] );
					array_push($txtEmails, $user );
					
				}
			}else{

			}
			#equipamentos definição
			if($os->equipamento){
				$txtEquipamento = $os->equipamento->name .' '.$os->equipamento->modelo. ' &nbsp; #'.$os->equipamento->fabricante_nick. '  (Code: '.$os->equipamento->numeracao.' | Ativo: '. $os->equipamento->plaqueta .' )' ;
			}else{
				$txtEquipamento = 'não definido';
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
			$corpoMensagem = 
			'<div>
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
																<a href="http://bitlouc.com/" target="_blank">
																	<img alt="Logo BitLOUC" title="Logo BitLOUC" style="margin-left:5%; float:left; width:128px;height:51px"  height="36" width="89" src="http://bitlouc.com/interface/imagem/bitlouc_logo.png"></img>
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
																<a href="http://bitlouc.com/#/os/'. $os->id .'" target="_blank">
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
																	<a href="http://bitlouc.com/#/os/'. $os->id .'" target="_blank">acesso cliqui aqui</a>
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
														<tr valign="top">
															<td colspan="4">
																Alterado por: '.$_SESSION['loginUser'].'
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

		public function osEmailII( $os_id, $email_status){
			
			$tecnicos   = new Tecnicos();
			$emailPhp   = new Email();
			$email   	= new EmailControl();
			$users		= new User();
			$oss     	= new Os();

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
			
			#autor
			$autor['email'] 		= $_SESSION['loginEmail'] ;
			$autor['user_nick'] 	= $_SESSION['loginUser'] ;
			array_push($txtEmails, $autor );
			#solicitante
			$solicitante	= $users->findSimples( $os->user_id );
			$user['email'] 		= $solicitante->email;
			$user['user_nick'] 	= $solicitante->user;
			array_push($txtEmails, $user );
			
			#designados
			if($os->tecnicos){
				foreach ($os->tecnicos as $value){	
					$tec	= $tecnicos->find( $value['tecnico_id'] );
					
					$user['email'] 		= $tec->email;
					$user['user_nick'] 	= $tec->user_nick;
	
					array_push($txtTec, $user['user_nick'] );
					array_push($txtEmails, $user );
					
				}
			}else{

			}
			#equipamentos definição
			if($os->equipamento){
				$txtEquipamento		= $os->equipamento->name;
				$txtEquip_modelo	= $os->equipamento->modelo. ' &nbsp; #'.$os->equipamento->fabricante_nick;
				$txtEquip_code	 	= '(Code: '.$os->equipamento->numeracao.' | Ativo: '. $os->equipamento->plaqueta .' )';
			}else{
				$txtEquipamento = 'não definido';
				$txtEquip_modelo	='';
				$txtEquip_code		='';
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
			foreach ($os->notas as $key => $value): {
				$item = $value->id;
				$item = '
				<tr>
				<td align="center">
					<table cellspacing="0" cellpadding="0" border="0" width="100%">
						<tbody>
							<tr>
								<td align="left" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:17px; color:#595a5a;">
									Data:
								</td>
								<td align="right" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:17px; color:#3e3f3e;font-weight: bold;">
								'.date('d/m/Y', strtotime(str_replace('-','/', $os->data))) .'
								</td>
							</tr> 
							<tr>
								<td align="left" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:17px; color:#595a5a;">
									N° OS:
								</td>
								<td align="right" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:17px; color:#3e3f3e;font-weight: bold;">
									'.$os->filial.'-'.$os->os. ' 
								</td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
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
			$corpoMensagem = 
			'
			<div id=":1ee" class="a3s aXjCH msg-3796989667682919919">
    <u></u>
    <div style="background:#f7f7f7;margin:0;padding:0">
      <div style="display:none;font-size:1px;color:#ffffff;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden">
        Transferência realizada com sucesso
      </div>
	  <div class="m_-3796989667682919919mj-container" style="background-color:#f7f7f7">
		
        <div style="margin:0px auto;max-width:600px">
            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
                <tbody>
                    <tr>
                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:10px;border-collapse:collapse"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="border:1px solid #d9d9d9;margin:0px auto;max-width:600px;background:white" class="m_-3796989667682919919dropShadow-1 m_-3796989667682919919mainContainer">
            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:white;border-collapse:collapse" align="center" border="0">
                <tbody>
                    <tr>
                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-bottom:30px;border-collapse:collapse">
                            
							'.
							#Logo do Email
							$email->top('1', $os->id, $email_status)
							.'

                            <div style="margin:0px auto;max-width:600px">
                                <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
                                    <tbody>
                                        <tr>
                                            <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:60px 40px 60px 40px;border-collapse:collapse">
                                                <div style="margin:0px auto;max-width:600px">
                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;border-collapse:collapse">
                                                                    <div class="m_-3796989667682919919mj-column-per-100 m_-3796989667682919919outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
                                                                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;padding-bottom:40px;border-collapse:collapse" align="center">
                                                                                        <div style="color:#555;font-family:sans-serif;font-size:24px;font-weight:book;line-height:1.5;text-align:center">
                                                                                            Instancia, <strong>Fabio</strong>!
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;border-collapse:collapse" align="center">
                                                                                        <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:1.5;text-align:center">
                                                                                            A transferência para <strong>sua conta no Banco Inter S.A.</strong> foi realizada com sucesso.
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div style="margin:0px auto;max-width:600px">
                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px 40px 0px;border-collapse:collapse">
                                                                    <div class="m_-3796989667682919919mj-column-per-33 m_-3796989667682919919outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
                                                                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
                                                                            <tbody></tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="m_-3796989667682919919mj-column-per-33 m_-3796989667682919919outlook-group-fix m_-3796989667682919919dropShadow-1" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
                                                                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;padding-top:30px;border-collapse:collapse" align="center">
                                                                                        <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:3;text-align:center">Valor Enviado</div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;border-collapse:collapse" align="center">
                                                                                        <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:3;text-align:center">
                                                                                            <strong>R$ 100,00</strong>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;padding-bottom:30px;border-collapse:collapse" align="center">
                                                                                        <div style="color:#999;font-family:sans-serif;font-size:16px;line-height:3;text-align:center">19 FEV às 07:09</div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="m_-3796989667682919919mj-column-per-33 m_-3796989667682919919outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
                                                                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
                                                                            <tbody></tbody>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div style="margin:0px auto;max-width:600px">
                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-bottom:0px;border-collapse:collapse">
                                                                    <div class="m_-3796989667682919919mj-column-per-100 m_-3796989667682919919outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
                                                                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="word-wrap:break-word;font-size:0px;padding:0px;border-collapse:collapse" align="center">
                                                                                        <div style="color:#555;font-family:sans-serif;font-size:16px;line-height:1.5;text-align:center">
                                                                                            Abraços,<br> Equipe <span class="il">Nubank</span>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="margin:0px auto;max-width:600px">
            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
                <tbody>
                    <tr>
                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-top:30px;border-collapse:collapse">
                            <div class="m_-3796989667682919919mj-column-per-100 m_-3796989667682919919outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
                                    <tbody>
                                        <tr>
                                            <td style="word-wrap:break-word;font-size:0px;padding:10px 25px;border-collapse:collapse" align="center">
                                                <div>
                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;border-collapse:collapse" align="center" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding:4px;vertical-align:middle;border-collapse:collapse">
                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="background:transparent;border-radius:3px;width:40px;border-collapse:collapse" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-size:0px;vertical-align:middle;width:40px;height:40px;border-collapse:collapse">
                                                                                    <a href="https://mandrillapp.com/track/click/30052082/www.youtube.com?p=eyJzIjoiQmNtaklremc1UWRxdDdEV3ZxUE1GSnRPRXdvIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3d3dy55b3V0dWJlLmNvbVxcXC9jaGFubmVsXFxcL1VDZ3NEWDNoVHdpUGR0R0hKak1GZkR4Z1wiLFwiaWRcIjpcImNhOGM2ZGViYzZmMjRlZThiMmQ0NmQ2YTZmMzM0Y2IyXCIsXCJ1cmxfaWRzXCI6W1wiZmM0YzcyMzZiNTY1NjkxMzg5N2QzODc4ZWFhMTQ1ZDYyYTU5ZmRjYlwiXX0ifQ" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/30052082/www.youtube.com?p%3DeyJzIjoiQmNtaklremc1UWRxdDdEV3ZxUE1GSnRPRXdvIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3d3dy55b3V0dWJlLmNvbVxcXC9jaGFubmVsXFxcL1VDZ3NEWDNoVHdpUGR0R0hKak1GZkR4Z1wiLFwiaWRcIjpcImNhOGM2ZGViYzZmMjRlZThiMmQ0NmQ2YTZmMzM0Y2IyXCIsXCJ1cmxfaWRzXCI6W1wiZmM0YzcyMzZiNTY1NjkxMzg5N2QzODc4ZWFhMTQ1ZDYyYTU5ZmRjYlwiXX0ifQ&amp;source=gmail&amp;ust=1551438303305000&amp;usg=AFQjCNH5PD-jwP5z03VwvuM502GxgnHkbQ">
                                                                                        <img alt="nuyoutube" height="40" src="https://ci5.googleusercontent.com/proxy/dZ3zszQE2P8fw3Gs8M0wfXbC-4y-zHgG2YIuOLA9qT4S8pefTagBjrjPBWdntItRRvQcZhmHvrVrlacJmFui-dAA-65ze_DJI7c=s0-d-e1-ft#https://nu-emails.s3.amazonaws.com/ico-youtube-grey.png" style="display:block;border-radius:3px;border:0;height:auto;line-height:100%;outline:none;text-decoration:none" width="40" class="CToWUd">
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td style="padding:4px 4px 4px 0;vertical-align:middle;border-collapse:collapse">
                                                                    <a href="https://mandrillapp.com/track/click/30052082/www.youtube.com?p=eyJzIjoiQmNtaklremc1UWRxdDdEV3ZxUE1GSnRPRXdvIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3d3dy55b3V0dWJlLmNvbVxcXC9jaGFubmVsXFxcL1VDZ3NEWDNoVHdpUGR0R0hKak1GZkR4Z1wiLFwiaWRcIjpcImNhOGM2ZGViYzZmMjRlZThiMmQ0NmQ2YTZmMzM0Y2IyXCIsXCJ1cmxfaWRzXCI6W1wiZmM0YzcyMzZiNTY1NjkxMzg5N2QzODc4ZWFhMTQ1ZDYyYTU5ZmRjYlwiXX0ifQ" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:13px;line-height:22px;border-radius:3px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/30052082/www.youtube.com?p%3DeyJzIjoiQmNtaklremc1UWRxdDdEV3ZxUE1GSnRPRXdvIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3d3dy55b3V0dWJlLmNvbVxcXC9jaGFubmVsXFxcL1VDZ3NEWDNoVHdpUGR0R0hKak1GZkR4Z1wiLFwiaWRcIjpcImNhOGM2ZGViYzZmMjRlZThiMmQ0NmQ2YTZmMzM0Y2IyXCIsXCJ1cmxfaWRzXCI6W1wiZmM0YzcyMzZiNTY1NjkxMzg5N2QzODc4ZWFhMTQ1ZDYyYTU5ZmRjYlwiXX0ifQ&amp;source=gmail&amp;ust=1551438303305000&amp;usg=AFQjCNH5PD-jwP5z03VwvuM502GxgnHkbQ">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;border-collapse:collapse" align="center" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding:4px;vertical-align:middle;border-collapse:collapse">
                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="background:transparent;border-radius:3px;width:40px;border-collapse:collapse" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-size:0px;vertical-align:middle;width:40px;height:40px;border-collapse:collapse">
                                                                                    <a href="https://mandrillapp.com/track/click/30052082/www.facebook.com?p=eyJzIjoibkdLcVE3QVc5T1RKSEJQUVZwMlNPdzlQYXU4IiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvd3d3LmZhY2Vib29rLmNvbVxcXC9udWJhbmticmFzaWxcIixcImlkXCI6XCJjYThjNmRlYmM2ZjI0ZWU4YjJkNDZkNmE2ZjMzNGNiMlwiLFwidXJsX2lkc1wiOltcIjY0MjNlNTBlOWU5ZDY5OTE1M2FiODdmMDA0NjVmYmNkYWNlZTZhMzNcIl19In0" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/30052082/www.facebook.com?p%3DeyJzIjoibkdLcVE3QVc5T1RKSEJQUVZwMlNPdzlQYXU4IiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvd3d3LmZhY2Vib29rLmNvbVxcXC9udWJhbmticmFzaWxcIixcImlkXCI6XCJjYThjNmRlYmM2ZjI0ZWU4YjJkNDZkNmE2ZjMzNGNiMlwiLFwidXJsX2lkc1wiOltcIjY0MjNlNTBlOWU5ZDY5OTE1M2FiODdmMDA0NjVmYmNkYWNlZTZhMzNcIl19In0&amp;source=gmail&amp;ust=1551438303305000&amp;usg=AFQjCNHegKvqn4ePnx_H_DWRrX8SORY6Dw">
                                                                                        <img alt="nufacebook" height="40" src="https://ci3.googleusercontent.com/proxy/svl2CAy--y9K0gRfH6gKHfZdhJ4CwmCwzTpRcWma1IJN9AtgKMDNO3wbhCbXc-61HWuL3FJBxdCjRfRMxqRKXo3b_pVmD4mPJFV-=s0-d-e1-ft#https://nu-emails.s3.amazonaws.com/ico-facebook-grey.png" style="display:block;border-radius:3px;border:0;height:auto;line-height:100%;outline:none;text-decoration:none" width="40" class="CToWUd">
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td style="padding:4px 4px 4px 0;vertical-align:middle;border-collapse:collapse">
                                                                    <a href="https://mandrillapp.com/track/click/30052082/www.facebook.com?p=eyJzIjoibkdLcVE3QVc5T1RKSEJQUVZwMlNPdzlQYXU4IiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvd3d3LmZhY2Vib29rLmNvbVxcXC9udWJhbmticmFzaWxcIixcImlkXCI6XCJjYThjNmRlYmM2ZjI0ZWU4YjJkNDZkNmE2ZjMzNGNiMlwiLFwidXJsX2lkc1wiOltcIjY0MjNlNTBlOWU5ZDY5OTE1M2FiODdmMDA0NjVmYmNkYWNlZTZhMzNcIl19In0" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:13px;line-height:22px;border-radius:3px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/30052082/www.facebook.com?p%3DeyJzIjoibkdLcVE3QVc5T1RKSEJQUVZwMlNPdzlQYXU4IiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvd3d3LmZhY2Vib29rLmNvbVxcXC9udWJhbmticmFzaWxcIixcImlkXCI6XCJjYThjNmRlYmM2ZjI0ZWU4YjJkNDZkNmE2ZjMzNGNiMlwiLFwidXJsX2lkc1wiOltcIjY0MjNlNTBlOWU5ZDY5OTE1M2FiODdmMDA0NjVmYmNkYWNlZTZhMzNcIl19In0&amp;source=gmail&amp;ust=1551438303305000&amp;usg=AFQjCNHegKvqn4ePnx_H_DWRrX8SORY6Dw">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;border-collapse:collapse" align="center" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding:4px;vertical-align:middle;border-collapse:collapse">
                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="background:transparent;border-radius:3px;width:40px;border-collapse:collapse" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-size:0px;vertical-align:middle;width:40px;height:40px;border-collapse:collapse">
                                                                                    <a href="https://mandrillapp.com/track/click/30052082/twitter.com?p=eyJzIjoibnZvU01OWkFmS2lKUHdqWGZNNVEzVmkzS2tJIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3R3aXR0ZXIuY29tXFxcL251YmFua1wiLFwiaWRcIjpcImNhOGM2ZGViYzZmMjRlZThiMmQ0NmQ2YTZmMzM0Y2IyXCIsXCJ1cmxfaWRzXCI6W1wiOTBmMTYwODYyMWQ3MzA1MWUxNzJhYzZmNzU3YjI3ZmUyYTRmNDgwOFwiXX0ifQ" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/30052082/twitter.com?p%3DeyJzIjoibnZvU01OWkFmS2lKUHdqWGZNNVEzVmkzS2tJIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3R3aXR0ZXIuY29tXFxcL251YmFua1wiLFwiaWRcIjpcImNhOGM2ZGViYzZmMjRlZThiMmQ0NmQ2YTZmMzM0Y2IyXCIsXCJ1cmxfaWRzXCI6W1wiOTBmMTYwODYyMWQ3MzA1MWUxNzJhYzZmNzU3YjI3ZmUyYTRmNDgwOFwiXX0ifQ&amp;source=gmail&amp;ust=1551438303305000&amp;usg=AFQjCNEOJ22TW1NR4cCfxFaNdBti3uprxw">
                                                                                        <img alt="nutwitter" height="40" src="https://ci5.googleusercontent.com/proxy/Op2xN70Tzo1F_nYX1hBomaX31kLgoKROY6uJdNmlLpCNAT9PQxFdgJW9dhMyIRBiM5E_whZLG5HGKl1f_eCR1kxf2d9v5sLe7u4=s0-d-e1-ft#https://nu-emails.s3.amazonaws.com/ico-twitter-grey.png" style="display:block;border-radius:3px;border:0;height:auto;line-height:100%;outline:none;text-decoration:none" width="40" class="CToWUd">
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td style="padding:4px 4px 4px 0;vertical-align:middle;border-collapse:collapse">
                                                                    <a href="https://mandrillapp.com/track/click/30052082/twitter.com?p=eyJzIjoibnZvU01OWkFmS2lKUHdqWGZNNVEzVmkzS2tJIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3R3aXR0ZXIuY29tXFxcL251YmFua1wiLFwiaWRcIjpcImNhOGM2ZGViYzZmMjRlZThiMmQ0NmQ2YTZmMzM0Y2IyXCIsXCJ1cmxfaWRzXCI6W1wiOTBmMTYwODYyMWQ3MzA1MWUxNzJhYzZmNzU3YjI3ZmUyYTRmNDgwOFwiXX0ifQ" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:13px;line-height:22px;border-radius:3px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/30052082/twitter.com?p%3DeyJzIjoibnZvU01OWkFmS2lKUHdqWGZNNVEzVmkzS2tJIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3R3aXR0ZXIuY29tXFxcL251YmFua1wiLFwiaWRcIjpcImNhOGM2ZGViYzZmMjRlZThiMmQ0NmQ2YTZmMzM0Y2IyXCIsXCJ1cmxfaWRzXCI6W1wiOTBmMTYwODYyMWQ3MzA1MWUxNzJhYzZmNzU3YjI3ZmUyYTRmNDgwOFwiXX0ifQ&amp;source=gmail&amp;ust=1551438303305000&amp;usg=AFQjCNEOJ22TW1NR4cCfxFaNdBti3uprxw">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;border-collapse:collapse" align="center" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding:4px;vertical-align:middle;border-collapse:collapse">
                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="background:transparent;border-radius:3px;width:40px;border-collapse:collapse" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-size:0px;vertical-align:middle;width:40px;height:40px;border-collapse:collapse">
                                                                                    <a href="https://mandrillapp.com/track/click/30052082/www.instagram.com?p=eyJzIjoiU3JIal9UM2RoVGk0SXAyNWZWeVBHS3hjb01BIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvd3d3Lmluc3RhZ3JhbS5jb21cXFwvbnViYW5rXCIsXCJpZFwiOlwiY2E4YzZkZWJjNmYyNGVlOGIyZDQ2ZDZhNmYzMzRjYjJcIixcInVybF9pZHNcIjpbXCIzMDJjMTUwZTRlYThiY2E3MzAwNjk2NmFiY2JmYzZkODBlNDYxMGJiXCJdfSJ9" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/30052082/www.instagram.com?p%3DeyJzIjoiU3JIal9UM2RoVGk0SXAyNWZWeVBHS3hjb01BIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvd3d3Lmluc3RhZ3JhbS5jb21cXFwvbnViYW5rXCIsXCJpZFwiOlwiY2E4YzZkZWJjNmYyNGVlOGIyZDQ2ZDZhNmYzMzRjYjJcIixcInVybF9pZHNcIjpbXCIzMDJjMTUwZTRlYThiY2E3MzAwNjk2NmFiY2JmYzZkODBlNDYxMGJiXCJdfSJ9&amp;source=gmail&amp;ust=1551438303305000&amp;usg=AFQjCNGeejiqLiBP4qOA7l8YGbDuQ-obrg">
                                                                                        <img alt="nuinstagram" height="40" src="https://ci6.googleusercontent.com/proxy/i1kT8xii1ssSuDBgsn9nnsHy_KLHNzEhU3Cn5ZzD53cx-wytJjsvmrS5EkOe-LESF2G56ANzpjB2-W9r8iLT2YIvZtbvRC1_abcBrQ=s0-d-e1-ft#https://nu-emails.s3.amazonaws.com/ico-instagram-grey.png" style="display:block;border-radius:3px;border:0;height:auto;line-height:100%;outline:none;text-decoration:none" width="40" class="CToWUd">
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td style="padding:4px 4px 4px 0;vertical-align:middle;border-collapse:collapse">
                                                                    <a href="https://mandrillapp.com/track/click/30052082/www.instagram.com?p=eyJzIjoiU3JIal9UM2RoVGk0SXAyNWZWeVBHS3hjb01BIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvd3d3Lmluc3RhZ3JhbS5jb21cXFwvbnViYW5rXCIsXCJpZFwiOlwiY2E4YzZkZWJjNmYyNGVlOGIyZDQ2ZDZhNmYzMzRjYjJcIixcInVybF9pZHNcIjpbXCIzMDJjMTUwZTRlYThiY2E3MzAwNjk2NmFiY2JmYzZkODBlNDYxMGJiXCJdfSJ9" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:13px;line-height:22px;border-radius:3px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/30052082/www.instagram.com?p%3DeyJzIjoiU3JIal9UM2RoVGk0SXAyNWZWeVBHS3hjb01BIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvd3d3Lmluc3RhZ3JhbS5jb21cXFwvbnViYW5rXCIsXCJpZFwiOlwiY2E4YzZkZWJjNmYyNGVlOGIyZDQ2ZDZhNmYzMzRjYjJcIixcInVybF9pZHNcIjpbXCIzMDJjMTUwZTRlYThiY2E3MzAwNjk2NmFiY2JmYzZkODBlNDYxMGJiXCJdfSJ9&amp;source=gmail&amp;ust=1551438303306000&amp;usg=AFQjCNH5ZMrCLDFYVHYW0cfRX03TbD83lw">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;border-collapse:collapse" align="center" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding:4px;vertical-align:middle;border-collapse:collapse">
                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="background:transparent;border-radius:3px;width:40px;border-collapse:collapse" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-size:0px;vertical-align:middle;width:40px;height:40px;border-collapse:collapse">
                                                                                    <a href="https://mandrillapp.com/track/click/30052082/www.linkedin.com?p=eyJzIjoib2Q3SDl5akdDWXRZMFgwb0dKbUpwTm1QQjNnIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3d3dy5saW5rZWRpbi5jb21cXFwvY29tcGFueS1iZXRhXFxcLzM3Njc1MjlcXFwvXCIsXCJpZFwiOlwiY2E4YzZkZWJjNmYyNGVlOGIyZDQ2ZDZhNmYzMzRjYjJcIixcInVybF9pZHNcIjpbXCJhMGZjMDNmMzA5Y2JjYmM4ZWUwMmVjMGE5NGRhZWNiMmI3OWNlMmY0XCJdfSJ9" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/30052082/www.linkedin.com?p%3DeyJzIjoib2Q3SDl5akdDWXRZMFgwb0dKbUpwTm1QQjNnIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3d3dy5saW5rZWRpbi5jb21cXFwvY29tcGFueS1iZXRhXFxcLzM3Njc1MjlcXFwvXCIsXCJpZFwiOlwiY2E4YzZkZWJjNmYyNGVlOGIyZDQ2ZDZhNmYzMzRjYjJcIixcInVybF9pZHNcIjpbXCJhMGZjMDNmMzA5Y2JjYmM4ZWUwMmVjMGE5NGRhZWNiMmI3OWNlMmY0XCJdfSJ9&amp;source=gmail&amp;ust=1551438303306000&amp;usg=AFQjCNGyPFy7z7NXTasuFnnpXZ9GLxByqA">
                                                                                        <img alt="nulinkedin" height="40" src="https://ci4.googleusercontent.com/proxy/NBrR1NWriKsqV1L1NMwyBId_TwJOHci-kOcrycokMT9iKg5qiTAemtSbOJ4IIef56VxPm1GmH3zAVV9YR_Rfle3RfzrNsV0T6MPa=s0-d-e1-ft#https://nu-emails.s3.amazonaws.com/ico-linkedin-grey.png" style="display:block;border-radius:3px;border:0;height:auto;line-height:100%;outline:none;text-decoration:none" width="40" class="CToWUd">
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td style="padding:4px 4px 4px 0;vertical-align:middle;border-collapse:collapse">
                                                                    <a href="https://mandrillapp.com/track/click/30052082/www.linkedin.com?p=eyJzIjoib2Q3SDl5akdDWXRZMFgwb0dKbUpwTm1QQjNnIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3d3dy5saW5rZWRpbi5jb21cXFwvY29tcGFueS1iZXRhXFxcLzM3Njc1MjlcXFwvXCIsXCJpZFwiOlwiY2E4YzZkZWJjNmYyNGVlOGIyZDQ2ZDZhNmYzMzRjYjJcIixcInVybF9pZHNcIjpbXCJhMGZjMDNmMzA5Y2JjYmM4ZWUwMmVjMGE5NGRhZWNiMmI3OWNlMmY0XCJdfSJ9" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:13px;line-height:22px;border-radius:3px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/30052082/www.linkedin.com?p%3DeyJzIjoib2Q3SDl5akdDWXRZMFgwb0dKbUpwTm1QQjNnIiwidiI6MSwicCI6IntcInVcIjozMDA1MjA4MixcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3d3dy5saW5rZWRpbi5jb21cXFwvY29tcGFueS1iZXRhXFxcLzM3Njc1MjlcXFwvXCIsXCJpZFwiOlwiY2E4YzZkZWJjNmYyNGVlOGIyZDQ2ZDZhNmYzMzRjYjJcIixcInVybF9pZHNcIjpbXCJhMGZjMDNmMzA5Y2JjYmM4ZWUwMmVjMGE5NGRhZWNiMmI3OWNlMmY0XCJdfSJ9&amp;source=gmail&amp;ust=1551438303306000&amp;usg=AFQjCNGyPFy7z7NXTasuFnnpXZ9GLxByqA">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="margin:0px auto;max-width:600px">
            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
                <tbody>
                    <tr>
                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-top:0px;border-collapse:collapse">
                            <div class="m_-3796989667682919919mj-column-per-100 m_-3796989667682919919outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
                                    <tbody>
                                        <tr>
                                            <td style="word-wrap:break-word;font-size:0px;padding:0px;padding-bottom:0px;border-collapse:collapse" align="center">
                                                <div style="color:#777;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:1.5;text-align:center">Atendimento 24 horas</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="word-wrap:break-word;font-size:0px;padding:10px 40px 20px 40px;border-collapse:collapse" align="center">
                                                <div style="color:#777;font-family:sans-serif;font-size:13px;line-height:1.5;text-align:center">
                                                    Em caso de qualquer dúvida, fique à vontade para responder esse email ou nos contatar no 
                                                    <a href="http://meajuda@nubank.com.br" style="color:#8c43c5;font-weight:bold" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://meajuda@nubank.com.br&amp;source=gmail&amp;ust=1551438303306000&amp;usg=AFQjCNFH2h5FAEPhbONgtHmITHoRf-TutA">meajuda@<span class="il">nubank</span>.com.br</a>. 
                                                    <p style="display:block;margin:13px 0">Para urgências ligue para 0800 591 2117. Atendimento 24 horas, todos os dias.</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="word-wrap:break-word;font-size:0px;padding:0px;padding-bottom:0px;border-collapse:collapse" align="center">
                                                <div style="color:#777;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:1.5;text-align:center">Ouvidoria</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="word-wrap:break-word;font-size:0px;padding:10px 40px 20px 40px;border-collapse:collapse" align="center">
                                                <div style="color:#777;font-family:sans-serif;font-size:13px;line-height:1.5;text-align:center">
                                                    Se você não ficou satisfeito com a solução do nosso time de atendimento, ligue para 0800 887 0463 em dias úteis, das 9h às 18h, horário de São Paulo. <br><br>  
                                                    <span class="il">Nubank</span> 2019
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <img src="https://ci6.googleusercontent.com/proxy/6hGAX9QCL9kG4XnM53EjB6v5DBx5OP1ZZWOISIi3in3R_CcoSaYWY1qKH4emAfdlk67q-Zd12flIV0o6Fa3CbEWAN6qnrjX-QFKbnByp5KWAfkz-9hBWRKsayaGqpnYj5LZorpZHvFw=s0-d-e1-ft#https://mandrillapp.com/track/open.php?u=30052082&amp;id=ca8c6debc6f24ee8b2d46d6a6f334cb2" height="1" width="1" class="CToWUd">
</div>
<div class="yj6qo"></div>
<div class="adL"></div>
</div>
	<table align="center" cellpadding="0" cellspacing="0" height="100%" width="100%" style="background-color: #f2f2f2">
		<tbody>
			<tr>
            	<td align="center" valign="middle">
                	<table align="center" cellpadding="0" cellspacing="0" width="550" style="background-color: #FFFFFF">
						<tbody>
							<tr>
								'.
									#Inicio do Email
									$email->inicio('2', $os->id)
								.'
                    		<tr>
                        	<td align="center">
                            <table width="440" cellspacing="0" cellpadding="0" border="0">
								<tbody>
								<!-- Top -->
									<tr>
									'.
										#top do Email
										$email->top('2', $os->id, $email_status )
									.'
									<tr>
                                <!-- Bloco de dados -->
                                <tr>
                                    <td align="center" style="padding-top: 20px;">
                                        <table align="center" cellspacing="0" cellpadding="0" border="0" style="background-color: #f6f6f6;" width="429">
											<tbody>
												<tr>
													<td align="center" style="padding-top: 40px;">
														<table align="center" cellspacing="0" cellpadding="0" border="0" width="90%">
															<tbody>
																<tr>
																	<td align="center">
																		<table cellspacing="0" cellpadding="0" border="0" width="100%">
																			<tbody>
																				<tr>
																					<td align="left" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:17px; color:#595a5a;">
																						Data:
																					</td>
																					<td align="right" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:17px; color:#3e3f3e;font-weight: bold;">
																					'.date('d/m/Y', strtotime(str_replace('-','/', $os->data))) .'
																					</td>
																				</tr> 
																				<tr>
																					<td align="left" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:17px; color:#595a5a;">
																						N° OS:
																					</td>
																					<td align="right" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:17px; color:#3e3f3e;font-weight: bold;">
																						'.$os->filial.'-'.$os->os. ' 
																					</td>
																				</tr> 
																			</tbody>
																		</table>
																	</td>
																</tr>
																<tr>
																	<td align="center" height="46" style="line-height: 1px;font-size: 1px;">
																		<img src="http://localhost/codephp/php/bitlouc/interface/imagem/linha-branca.jpg" style="display: block;border: none;" width="367" height="3" alt="">
																	</td>
																</tr>
																<tr>
																	<td align="left" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:12px; color:#595a5a;">
																		Nessa transação foram acumulados 6 números da sorte para participar da promoção 1 Ano Grátis de Shell V-Power.
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
												<tr>
													<td align="center" height="36" style="line-height: 1px;font-size: 1px;">
														<img src="http://localhost/codephp/php/bitlouc/interface/imagem/linha-branca.jpg" style="display: block;border: none;" width="367" height="3" alt="">
													</td>
												</tr> 
												
												<tr>
													<td align="center" style="padding-top: 25px;">
														<table align="center" cellspacing="0" cellpadding="0" border="0" width="90%">
															<tbody>
																<tr>
																	<td align="center">
																		<table cellspacing="0" cellpadding="0" border="0" width="100%">
																			<tbody>
																				<tr>
																					<td align="left" height="60" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">
																						Loja:
																					</td>
																					<td align="right" height="60" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#999999;">
																						'.$os->loja_nick.'<br>
																					</td>
																				</tr>
																				<tr>
																					<td align="left" height="30" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">
																						Local:
																					</td>
																					<td align="right" style="font-family: arial; font-size: 15px; color:#999999; line-height: 20px; padding: 0 0px 20px 0">
																						<span>'.$os->local_tipo .' - '. $os->local_name.' </span><br>
																						<span style="font-size:11px"> ('.$os->local_municipio .' - '. $os->local_uf. ')</span><br>
																						<a style="font-size:11px" href="https://maps.google.com/maps?q='.$os->local_lat.'%2C'.$os->local_long .'&z=17&hl=pt-BR" target="_blank"> Como chegar</a><br>
																					</td>
																				</tr>
																				<tr>
																					<td align="left" height="40" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">
																						Equipamento:
																					</td>
																					<td align="right" style="font-family: arial; font-size: 15px; color:#999999; line-height: 20px; padding: 0 0px 20px 0">
																						<span>'.$txtEquipamento.'</span><br>
																						<span style="font-size:11px">'.$txtEquip_modelo.'</span><br>
																						<span style="font-size:11px"> '.$txtEquip_code.'</span>
																					</td>
																				</tr>
																				<tr>
																					<td align="left" height="20" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">
																						Categoria:
																					</td>
																					<td align="right" height="20" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#999999;">
																						'.$os->categoria->name.'
																					</td>
																				</tr>
																				<tr>
																					<td align="left" height="20" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">
																						Serviço:
																					</td>
																					<td align="right" height="20" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#999999;">
																						'.$os->servico->name.'
																					</td>
																				</tr>
																				<tr>
																					<td align="left" height="40" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">
																						Solicitante:
																					</td>
																					<td align="right" height="40" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#999999;">
																						'.$os->user_user.'
																					</td>
																				</tr>
																				
																				<tr>
																					<td align="left" height="40" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#676867;font-weight: bold;">
																					Designado(s):
																					</td>
																					<td align="right" height="40" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;font-weight: bold;">
																					'. $comma_separated.'
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
												<tr>
													<td align="center" height="36" style="line-height: 1px;font-size: 1px;">
														<img src="http://localhost/codephp/php/bitlouc/interface/imagem/linha-branca.jpg" style="display: block;border: none;" width="367" height="3" alt="">
													</td>
												</tr>
												'. $txtNotas . '
												<tr>
													<td align="center" style="padding-top: 25px;">
														<table align="center" cellspacing="0" cellpadding="0" border="0" width="90%">
															<tbody>
																<tr>
																	<td align="center">
																		<table cellspacing="0" cellpadding="0" border="0" width="100%">
																			<tbody>
																				<tr>
																					<td align="left" height="30" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">
																						ID da Transação:
																					</td>
																					<td align="right" height="30" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">
																						47366889
																					</td>
																				</tr>
																				<tr>
																					<td align="left" height="30" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">
																						CNPJ da Loja:
																					</td>
																					<td align="right" height="30" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">
																						69943686000401
																					</td>
																				</tr>
																				<tr>
																					<td align="left" height="50" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">
																						CPF do Cliente:
																					</td>
																					<td align="right" height="50" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">
																						05265139427
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
                                </td>
                            </tr>
                            <!-- / Bloco de dados -->

                                <tr>
									<td class="corpo-footer" valign="top" width="100%" style="padding: 35px 35px 40px 45px; color: #404040; font-size: 10px; font-family: arial; line-height: 12px">
										Alterado por: '.$_SESSION['loginUser'].'
									</td>
                                </tr>
                                <tr>
                                    <td height="36" style="font-size: 1px;line-height: 1px;">&nbsp;</td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                   
                </tbody></table>
            </td>
        </tr>
        <tr>
            <td align="center">
                <table align="center" cellspacing="0" cellpadding="0" border="0" width="550" style="background-color: #f8ce0f;">
					<tbody>
					<tr>
                        <td align="center" valign="middle"><img src="https://static.cdn.responsys.net/i5/responsysimages/raizencom/contentlibrary/campaigns/cmp_numero_sem_premio/sem-premio-01/img/footer.jpg" width="550" height="144" style="display: block;border: none;" alt="Vá bem. Vá de Shell"></td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table cellpadding="0" cellspacing="0" width="80%">
                                <tbody><tr>
                                    <td align="left" valign="middle" style="padding-top: 30px;font-family:Verdana, Helvetica, sans-serif; font-size:10px; color:#595a5a;padding-bottom: 20px;">
                                        Promoção Pague e Ganhe vigente de 16/10/2018 a 20/03/2019 ou enquanto durarem os estoques de milhas. Promoção 1 Ano Grátis de Shell V-Power válida de 16/10/2018 a 15/04/2019. A entrega do prêmio está condicionada à análise dos critérios de participação previstos no regulamento contido no site <a href="http://e.shell.com.br/pub/cc?_ri_=X0Gzc2X%3DYQpglLjHJlYQGgzdhwEaAE8nXPKpWzc8DJzcycFXp3sL362U0JUFyzgfKLzfzc99zfwVXtpKX%3DBBAY&amp;_ei_=Es6oP330hIs333wqpnKYFFMutKHj2seMriFP82AENG1nN8WvQKLbFWW9jcQK46nMXx8E." target="_blank" style="color: #595a5a; text-decoration: none;">www.shell.com.br/promocaoumanogratis</a>. Certificado de autorização CAIXA nº 4-7132/2018 e nº 5-7206/2018. O 1 ano grátis de Shell V-Power será disponibilizado através de um cartão pré-pago no valor de R$ 5.160,00. Consulte os regulamentos e demais condições de participação no App Shell Box.
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody></table>
			
			<div>
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
																<a href="http://bitlouc.com/" target="_blank">
																	<img alt="Logo BitLOUC" title="Logo BitLOUC" style="margin-left:5%; float:left; width:128px;height:51px"  height="36" width="89" src="http://bitlouc.com/interface/imagem/bitlouc_logo.png"></img>
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
																<a href="http://bitlouc.com/#/os/'. $os->id .'" target="_blank">
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
																	<a href="http://bitlouc.com/#/os/'. $os->id .'" target="_blank">acesso cliqui aqui</a>
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
														<tr valign="top">
															<td colspan="4">
																Alterado por: '.$_SESSION['loginUser'].'
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
			//return $emailPhp->smtpmailer($txtEmails, $txtEmail, $txtNome, $txtAssunto, $corpoMensagem);
			return $corpoMensagem;
		}

		
	}
