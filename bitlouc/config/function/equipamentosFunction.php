<?php
	require_once '_usoFunction.php';
	require_once '../classes/Equipamentos.php';
	require_once '../classes/EquipamentosLocal.php';
	require_once '../emailPHP.php';

	class EquipamentosFunction extends UsoFunction {

		public function insertSistema(
			$produto,
			$tag,
			$name,
			$modelo,
			$fabricante,
			$fabricanteNick,
			$proprietario,
			$proprietarioNick,
			$proprietarioLocal,
			$categoria,
			$numeracao,
			$plaqueta,
			$dataFab,
			$dataCompra,
			$loja,
			$local,
			$status,
			$ativo
		){
			$equipamento	= new Equipamento();
			
			$equipamento->setProduto($produto);
			$equipamento->setTag($tag);
			$equipamento->setName($name);
			$equipamento->setModelo($modelo);
			$equipamento->setNumeracao($numeracao);
			$equipamento->setFabricante($fabricante);
			$equipamento->setFabricanteNick($fabricanteNick);
			$equipamento->setProprietario($proprietario);
			$equipamento->setProprietarioNick($proprietarioNick);
			$equipamento->setProprietarioLocal($proprietarioLocal);
			$equipamento->setCategoria($categoria);
			$equipamento->setPlaqueta($plaqueta);
			$equipamento->setDataFabricacao($dataFab);
			$equipamento->setDataCompra($dataCompra);
			$equipamento->setLoja($loja);
			$equipamento->setLocal($local);
			$equipamento->setAtivo($ativo);

			$item = $equipamento->insert();
			if($item['error'] == true ){
				$res = $this->statusReturn($item);
			}else{
				$item = $this->insertSistemaLocal(
					$item['id'],
					$dataCompra,
					$loja,
					$local,
					$status
				);
				$res = $this->statusReturn($item);
			}
			return $res;
		}
		public function insertSistemaLocal(
			$bem,
			$data,
			$loja,
			$local,
			$status
		){
			$equipamentoLocal 	= new EquipamentoLocal();

			$equipamentoLocal->setBem($bem);
			$equipamentoLocal->setData($data);
			$equipamentoLocal->setLoja($loja);
			$equipamentoLocal->setLocal($local);
			$equipamentoLocal->setStatus($status);
			
			$res = $equipamentoLocal->insert();

			return $res;
		}


		public function modAdd( $osId, $tecId, $trajetoId, $statusId, $statusProcesso, $date, $km, $valor ){
			$mods 			= new Mod();
			$oss 			= new Os();

			$res['error']	= false;
			$arMessage 		= array();
			$ativo 			= '0';
			
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
				$res['error']		= $item['error'];
				array_push($arMessage, $item['message']);
				if( !$res['error'] ){
					$itemII = $oss->upProcesso($osId, $statusProcesso );
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
		public function modUp( $osId, $trajetoId, $statusProcesso, $date, $km, $tempo, $hhValor, $valor, $modId ){
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
				$itemII = $oss->upProcesso($osId, $statusProcesso );
				$res['error'] = $itemII['error'];
				array_push($arMessage, $itemII['message']);
				
			}

			$res['message'] = $arMessage;
			return $res;


		}
		public function insertTecMod( $osId, $tecId, $tecName, $tecHh, $statusId, $statusProcesso, $trajetoId, $tipoValor, $date, $km, $valor, $tecNivel ){
			
			$mods = new Mod();
			$arMessage 		= array();
			$res['error'] 	= false;

			$etapaI = $mods->ModValido($tecId, $date);
			
			if( !$etapaI ){

				if( $trajetoId == '1' && $tecNivel == '1'){
					$trajetoId 	= '3';
					$tipoValor	= '0';
					$km     	= '0';
				}
			
				#validar informações
				$tec = $this->listOsTecModValidacao( $osId, $tecId, $tecHh, $statusId, $trajetoId, $tipoValor, $date, $km, $valor );
				$res['error'] = $tec['error'];
				if( $res['error'] ){
					$res['message'] = $tec['message'];
				}else{
					#desloc aberto
					if ( $tec['data'] == '1' ) {
						# InsertFinal
						$itemI = $this->modUp( $osId, $trajetoId, $statusProcesso, $date, $km, $tec['tempo'], $tec['hhValor'], $tec['valor'], $tec['modId']);
						$res['error'] = $itemI['error'];
						array_push($arMessage, $itemI['message']);
						
					}
					if ( ($tec['data'] == '0' || $tec['statusNivel']  == '2') && !$res['error'] ) {
						#desloc inicial
						$itemII =  $this->modAdd( $osId, $tecId, $trajetoId, $statusId, $statusProcesso, $date, $km, $valor );
						$res['error'] = $itemII['error'];
						array_push($arMessage, $itemII['message']);

					}
				}
			}else{
				$res['error'] = true;
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
		public function osFull( $osId ){
			$oss		= new Os();
			$locais     = new Locais();
			$bens       = new Bens();
			$servicos   = new Servicos();
			$categorias = new Categorias();
			$notas      = new Nota();

			$os 			= $oss->find( $osId );
			$os->local 		= $locais->find( $os->local );
			$os->bem		= $bens->find( $os->bem );
			$os->servico	= $servicos->find( $os->servico );
			$os->categoria	= $categorias->find( $os->categoria );
			$os->tecnicos	= $this->listOsTec( $osId );
			$os->notas		= $notas->motaOs( $osId );

			return $os;
		}
		public function osEmail( $osId ){
			
			$tecnicos   = new Tecnicos();
			$emailPhp   = new Email();
			$os			= $this->osFull( $osId );
			
			/* Recuperar os Dados do Formulário de Envio*/
			$txtNome 		= 'BitLOUC';//$_POST["txtNome"];
			$txtAssunto 	= 'OS: '.$os->lojaNick.' | '.$os->local->tipo.' - '.$os->local->name.', '.$os->categoria->name.' ('.$os->id.')';//$_POST["txtAssunto"];
			$txtEmail 		= 'bitlouc@gmail.com';//$_POST["txtEmail"];
			$txtMensagem 	= 'OK';//$_POST["txtMensagem"];
			$txtTec 		= array();
			$txtEmails	 	= array();
			
			if($os->bem){
				$txtBem = $os->bem->name .' '.$os->bem->modelo. ' &nbsp; #'.$os->bem->fabricanteNick. '  (Code: '.$os->bem->numeracao.' | Ativo: '. $os->bem->plaqueta .' )' ;
			}else{
				$txtBem = $os->bem;
			}
			foreach ($os->tecnicos as $value){
				$tec	= $tecnicos->find( $value['tecnico'] );
				
				$user['email'] 		= $tec->email;
				$user['userNick'] 	= $value['userNick'];

				array_push($txtTec, $user['userNick'] );
				array_push($txtEmails, $user );
				
			}
			//$array = array('lastname', 'email', 'phone');
			$comma_separated = implode(", ", $txtTec);

			/* Montar o corpo do email*/
			$corpoMensagem = '<b>N. OS: </b>'.$os->filial.' - '.$os->os. ' (Data: '. $os->data .')' 
							.'<br><a href="http://skyhub.esy.es/#/oss/'. $os->loja .'/os/'. $os->id .'" target="_blank">'.$txtAssunto.'</a> '
							.'<br><b>Municipio:</b> '.$os->local->municipio .'/'. $os->local->uf 
							.'<br><b>Serviço:</b> '.$os->servico->name
							.'<br><b>Bem:</b> '.$txtBem
							.'<br><b>Tecnicos:</b> '.$comma_separated
							.'<br><br>(Criado por: '. $_SESSION['loginUser'].')';
			
			/*<div class="column is-two-thirds has-text-left">
              <h1 class="title is-5"> .'$os.lojaNick'. | .'$os.local.tipo'. - .'$os.local.name'. (.'$os.local.municipio'./.'$os.local.uf'.) </h1>
              <p class="subtitle" style="margin-bottom: 0;"> .'$os.data'. | .'$os.servico.name'.
                <span class="pull-right"> <span class="tag">.' $os.categoria.name '.</span> &nbsp;  </span>
              </p>
               
              <p><span class="icon mdi mdi-worker"></span>  <a v-for="tecnico in $os.tecnicos">.'tecnico.userNick'. |</a> </p>
			</div>*/
			return $emailPhp->smtpmailer($txtEmails, $txtEmail, $txtNome, $txtAssunto, $corpoMensagem);
			//return $corpoMensagem;
		}
	}
