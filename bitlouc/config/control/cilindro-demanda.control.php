<?php
	require_once '_global.php';
	require_once '../emailPHP.php';

	class CilindroDemandaControl extends GlobalControl {

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

		public function publish( $cil_prog_id, $demanda, $id ) {
			$item['error'] 		= false;
			$cilindroDemandas	= new CilindroDemanda();

			$cilindroProg->setCilProg($cil_prog_id);
			$cilindroProg->setCliTipo($demanda->cil_tipo->id);
			$cilindroProg->setQtd($$demanda->cil_qtd);

			if( $id == '' ):
				# Insert
				$item = $cilindroProg->insert();
			endif;
			if( $id > '0' ):
				# Update
				$item = $cilindroProg->update($id);

				/*if(!$item['error']){
					$email_status = 'teve uma alteração';
					$this->osEmail( $id, $email_status );
				}*/
			endif;

			$res = $item;
			return $res;

		}

		public function add( $cil_prog_id, $demanda ) {
			$item['error'] = false;

			
			foreach ($demanda as $value){
				$cil_tipo_id	= $value['cil_tipo']->id;
				$qtd 			= $value['cil_qtd'];
		  
				$item = $this->publish($cil_tipo_id, $qtd );
		  
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
			'
	<table align="center" cellpadding="0" cellspacing="0" height="100%" width="100%" style="background-color: #f2f2f2">
		<tbody>
			<tr>
            	<td align="center" valign="middle">
                	<table align="center" cellpadding="0" cellspacing="0" width="550" style="background-color: #FFFFFF">
						<tbody>
							<tr>
								<td align="center" valign="middle" style="padding:20px 0px 30px;background-color: #f2f2f2;">
									<table cellspacing="0" cellpadding="0" align="center" width="550">
										<tbody>
											<tr>
												<td align="center" valign="middle">
													<table cellspacing="0" cellpadding="0" align="center" width="550" style="padding: 0 10px">
														<tbody>
															<tr>
																<td align="left" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:12px; color:#333333;">
																	<span style="display: none;">Confira todos os detalhes.</span>
																</td>
																<td align="right" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:12px; color:#333333;">
																	<a href="http://bitlouc.com/#/os/'. $os->id .'" target="_blank" style="color:#333333">Ver Online</a>&nbsp;
																	<!--|&nbsp;<a href="http://e.shell.com.br/pub/sf/FormLink?_ri_." target="_blank" style="color:#333333">Descadastre-se</a>-->
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
                        	<td align="center">
                            <table width="440" cellspacing="0" cellpadding="0" border="0">
								<tbody>
								<tr>
									<td align="left" valign="top" style="padding-top: 30px;">
										<a href="http://bitlouc.com" target="_blank">
											<img alt="BitLOUC" border="0" src="http://localhost/codephp/php/bitlouc/interface/imagem/bitlouc_logoii.png" style="display:block;border:0;" height="36" width="89">
										</a>
									</td> 
                                </tr>
                                <tr>
									<td align="left" valign="middle" style="padding-top: 30px;font-family:Verdana, Helvetica, sans-serif; font-size:20px; color:#3f3f3f; font-weight: bold;line-height: 25px;">
										INSTANCIA '. $email_status .'.
									</td>
                                </tr>
                                <tr>
									<td align="left" valign="middle" style="padding-top: 30px;font-family:Verdana, Helvetica, sans-serif; font-size:14px;line-height: 25px; color: #595a5a;">
										<span style="color: #dd1d21;">Oi, Fabio!</span> Tudo bem? <br><br>
                                    Deu tudo certo com a sua compra de <strong>R$ 79,03</strong>! <br>
                                    Aqui embaixo você pode conferir todos os detalhes:
                                    </td>                                    
                                </tr>

                                <!-- Bloco de dados -->
                                <tr>
                                    <td align="center" style="padding-top: 20px;">
                                        <table align="center" cellspacing="0" cellpadding="0" border="0" style="background-color: #f6f6f6;" width="429">
                                            <tbody><tr>
                                                <td align="center" style="padding-top: 40px;">
                                                    <table align="center" cellspacing="0" cellpadding="0" border="0" width="90%">
                                                        <tbody><tr>
                                                            <td align="center">
                                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                    <tbody><tr>
                                                                        <td align="left" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:17px; color:#595a5a;">Você acumulou:
                                                                        </td>
                                                                        <td align="right" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:17px; color:#3e3f3e;font-weight: bold;"> 19 pontos
                                                                        </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <td align="left" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:17px; color:#595a5a;">Saldo Atual:
                                                                        </td>
                                                                        <td align="right" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:17px; color:#3e3f3e;font-weight: bold;"> 110 pontos
                                                                        </td>
                                                                    </tr> 
                                                                </tbody></table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" height="46" style="line-height: 1px;font-size: 1px;"><img src="https://static.cdn.responsys.net/i5/responsysimages/raizencom/contentlibrary/campaigns/cmp_numero_sem_premio/sem-premio-01/img/linha-branca.jpg" style="display: block;border: none;" width="367" height="3" alt="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:12px; color:#595a5a;">
    Nessa transação foram acumulados 6 números da sorte para participar da promoção 1 Ano Grátis de Shell V-Power.
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="36" style="line-height: 1px;font-size: 1px;"><img src="https://static.cdn.responsys.net/i5/responsysimages/raizencom/contentlibrary/campaigns/cmp_numero_sem_premio/sem-premio-01/img/divisao.jpg" style="display: block;border: none;" width="429" height="36" alt="">
                                                </td>
                                            </tr> 
                                             
                                            <tr>
                                                <td align="center" style="padding-top: 25px;">
                                                    <table align="center" cellspacing="0" cellpadding="0" border="0" width="90%">
                                                        <tbody><tr>
                                                            <td align="center">
                                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                    <tbody><tr>
                                                                        <td align="left" height="60" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">Posto:
                                                                        </td>
                                                                        <td align="right" height="60" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#999999;">Cemopel-Cm Petroleo Ltda.<br>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left" height="40" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">Data:
                                                                        </td>
                                                                        <td align="right" style="font-family: arial; font-size: 15px; color:#999999; line-height: 20px; padding: 0 0px 20px 0">
    
                                                         16/03/2019 às 21:41 <br><span style="font-size:11px"> (Horário de Brasília)</span>
                                                     </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left" height="40" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">Combustível:
                                                                        </td>
                                                                        <td align="right" height="40" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#999999;">Gasolina Comum
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left" height="40" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">Litragem:
                                                                        </td>
                                                                        <td align="right" style="font-family: arial; font-size: 15px; color:#999999; line-height: 20px; padding: 0 0px 20px 0">
                                             18,82 litros
                                         </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left" height="40" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">Valor do abastecimento:
                                                                        </td>
                                                                             <td align="right" style="font-family: arial; font-size: 15px; color:#999999; line-height: 20px; padding: 0 0px 20px 0">
                                                
                                             R$ 79,03
                                         </td>
                                                                    </tr> 
                                                                 <tr>
                                                                        <td align="left" height="40" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#676867;font-weight: bold;">VALOR PAGO:
                                                                        </td>
                                                                        <td align="right" height="40" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;font-weight: bold;">R$ 79,03
                                                                        </td>
                                                                    </tr>          
                                                                </tbody></table>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>    
                                            <tr>
                                                <td align="center" height="36" style="line-height: 1px;font-size: 1px;"><img src="https://static.cdn.responsys.net/i5/responsysimages/raizencom/contentlibrary/campaigns/cmp_numero_sem_premio/sem-premio-01/img/divisao.jpg" style="display: block;border: none;" width="429" height="36" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-top: 25px;">
                                                    <table align="center" cellspacing="0" cellpadding="0" border="0" width="90%">
                                                        <tbody><tr>
                                                            <td align="center">
                                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                    <tbody><tr>
                                                                        <td align="left" height="30" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">ID da Transação:
                                                                        </td>
                                                                        <td align="right" height="30" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">47366889
                                                                        </td>
                                                                    </tr>
                                                               <tr>
                                                                        <td align="left" height="30" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">CNPJ da Loja:
                                                                        </td>
                                                                        <td align="right" height="30" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">69943686000401
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left" height="50" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">CPF do Cliente:
                                                                        </td>
                                                                        <td align="right" height="50" valign="top" style="font-family:Verdana, Helvetica, sans-serif; font-size:14px; color:#595a5a;">05265139427
                                                                        </td>
                                                                    </tr>            
                                                                </tbody></table>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr> 

                                        </tbody></table>
                                    </td>
                                </tr>
                                <!-- / Bloco de dados -->

                                <tr>
    <td class="corpo-footer" valign="top" width="100%" style="padding: 35px 35px 40px 45px; color: #404040; font-size: 10px; font-family: arial; line-height: 12px">
Consulte os dados do cartão e o histórico de transações no Shell Box. Em caso de dúvidas sobre esta transação, entre em contato com o Shell Box na aba "Ajuda", localizada no menu lateral.
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
                    <tbody><tr>
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
