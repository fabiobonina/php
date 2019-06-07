<?php
	require_once '_global.php';
	require_once '../emailPHP.php';

	class CilindroControl extends GlobalControl{

		public function matrix( $item ){
			
			$oss     	= new Cilindro();
			$lojas     	= new Loja();
			$locais     = new Local();
			$cilTipos	= new CilTipo();
			
			$item->loja				= $lojas->find( $item->loja_id );
			$item->local 			= $locais->find( $item->local_id );
			$item->capacidade_id	= $item->capacidade;
			$item->capacidade		= $cilTipos->findCapacidade( $item->capacidade );
			
			return $item;

		}

		public function publish(
			$loja,
			$local_id,
			$numero,
			$fabricante,
			$capacidade,
			$condenado,
			$dt_fabric,
			$dt_validade,
			$tara_inicial,
			$tara_atual,
			$status,
			$ativo,
			$id )
		{
			
			$item['error'] = false;
			$cilindros	= new Cilindro();

			$etapaI = $cilindros->validar( $numero, $fabricante, $capacidade['capacidade'], $dt_fabric, $id );
			$dtUltimo   = '';
			/*$osUltimoMan = $cilindros->ultimaOs( $local_id->id, $categoria_id );
			if(isset($osUltimoMan->dtUltimo) ){
				$dtUltimo = $osUltimoMan->dtUltimo;
			}*/
			$data = date("Y-m-d");
			$cod_barras = $this->codigoBarras($numero, $loja['grupo'], $capacidade['name'], $dt_fabric);

			$cilindros->setNumero($numero);
			$cilindros->setFabricante($fabricante);
			$cilindros->setCapacidade($capacidade['capacidade']);
			$cilindros->setDtFabric($dt_fabric);
			$cilindros->setDtValidade($dt_validade);
			$cilindros->setTaraInicial($tara_inicial);
			$cilindros->setTaraAtual($tara_atual);
			$cilindros->setCondenado($condenado);
			$cilindros->setGrupo($loja['grupo']);
			$cilindros->setProprietario($loja['proprietario_id']);
			$cilindros->setLoja($loja['id']);
			$cilindros->setLojaNick($loja['nick']);
			$cilindros->setLocal($local_id);
			$cilindros->setCodBarras($cod_barras);
			$cilindros->setDtCadastro($data);
			$cilindros->setDtRevisado($data);
			$cilindros->setStatus($status);
			$cilindros->setAtivo($ativo);
			if(	$etapaI ){
				$item['error']   = true;
				$item['message'] = 'Error, Cilindro já existe!';
				
			}else{
				if( $id == '' ):
					# Insert
					$item = $cilindros->insert();

					if(!$item['error']){
						//$email_status = 'nova no sistema';
						//$this->osEmail( $item['id'], $email_status );
					}
				endif;
				if( $id > '0' ):
					# Update
					$item = $cilindros->update($id);

					if(!$item['error']){
						//$email_status = 'teve uma alteração';
						//$this->osEmail( $id, $email_status );
					}
				endif;
			}

			$res = $item;
			return $res;

		}
		public function delete( $os_id ){

			$oss 			= new Cilindro();
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
		public function codigoBarras( $numero, $grupo, $capacidade, $dt_fabric ) {
			$item['error'] = false;
			
			$newNumero = $this->limpar_texto($numero);
			$newDate = date("dmY", strtotime($dt_fabric));
			
			if($grupo == 'P'){
				$newGrupo = 'B';
			}else{
				$newGrupo = 'C';
			}

			$cod_barras = $newNumero.$newGrupo.$capacidade.$newDate;

			return $cod_barras;
		}
		
		public function status( $status, $os_id ) {
			$oss	= new Cilindro();
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
			$oss	= new Cilindro();
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
		public function list(){
			$cilindros	= new Cilindro();
			$itens 	= array();
			
			foreach($cilindros->findAll() as $key => $value): {
				$item = $value;
				$item = $this->matrix( $item );
				//$item = (array)  $item;
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}
		public function listLoja( $loja_id ){
			$oss	= new Cilindro();
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
			$oss	= new Cilindro();
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
			$oss	= new Cilindro();
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
			$oss	= new Cilindro();
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
			$oss	= new Cilindro();
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
			$oss	= new Cilindro();
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
			$oss	= new Cilindro();
			
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
			$oss	= new Cilindro();
			$itens 	= array();
			
			foreach($oss->findIIILoja( $loja_id ) as $key => $value): {
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		
	}
