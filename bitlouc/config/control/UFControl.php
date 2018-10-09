<?php
	require_once '_global.php';
	require_once 'lojaControl.php';

	class ProprietarioControl extends GlobalControl {

		public function matrix( $item ){
			$lojas      	= new Loja();
			$locais      	= new Local();
			$equipamentos	= new Equipamento();
			$oss			= new Os();

			$item['equipQt'] 			= $equipamentos->contProprietario( $item['id'] );
			$item['lojasQt'] 			= $lojas->contProprietario( $item['id'] );
			$item['locaisQt'] 			= $locais->contProprietario( $item['id'] );
			$item['locaisGeoQt'] 		= $locais->contGeolocalizacaoProprietario( $item['id'] );
			$item['locaisGeoStatus'] 	= $this->porcentagem( $item['locaisQt'], $item['locaisGeoQt']  );
			$item['ossPendenteQt'] 		= $oss->contOsStatusUF( $item['id'], 0 );
			$item['ossAndamentoQt']		= $oss->contOsStatusUF( $item['id'], 1 );
			$item['ossConcluidoQt']		= $oss->contOsStatusUF( $item['id'], 2 );
			$item['ossQt'] 				= $oss->contProprietario( $item['id'] );
			//$item['lojaName'] 		= $item['loja']->name;
			//$item['categorias'] 		= $this->listCategoriaProprietario( $item['id'] );
			return $item;

			$item['equipLocal_tt'] 			= $equipamentos->contProprietario( $item['id'] );
			$item['loja']					= $lojas->find( $item['loja_id'] );
			$item['lojaName'] 				= $item['loja']->name;
			$item['categorias'] 			= $this->listCategoriaProprietario( $item['id'] );
			return $item;

		}

		public function listProprietario( $proprietario_id, $userNivel, $userGrupo, $userLoja  ){
			$proprietarios	= new Proprietario();
			$lojaControl    = new LojaControl();

			$item = (array)  $proprietarios->find( $proprietario_id );

			if( $item['ativo']  == 0 ){
				$res['error'] = false;
				$res['dados'] = $this->matrixProprietario( $item );
				$res['message'] = 'OK, Local pode ser deletado';
			}else{
				$res['error'] = true;
				$res['message'] = 'Error, Entre em contado com o Admistrador do sitema';
			}

			return $res;
		}

		public function anexoProprietario( $localId ){

			$equipamentos	= new Equipamento();

			$item['equipLocal_tt'] 			= $equipamentos->contProprietario( $item['id'] );
			if( $item['equipLocal_tt']  == 0 ){
				$res['error'] = false;
				$res['message'] = 'OK, Local pode ser deletado';
			}else{
				$res['error'] = true;
				$res['message'] = 'Error, '.$item['equipLocal_tt'] .' - Equipamento(s) nesse Local! É necessario remover-los antes.';
			}
			return $res;
		}

		public function statusOSProprietario( $proprietaio_id ){

			$equipamentos	= new Equipamento();

			$item['equipLocal_tt'] 			= $equipamentos->contProprietario( $item['id'] );
			if( $item['equipLocal_tt']  == 0 ){
				$res['error'] = false;
				$res['message'] = 'OK, Local pode ser deletado';
			}else{
				$res['error'] = true;
				$res['message'] = 'Error, '.$item['equipLocal_tt'] .' - Equipamento(s) nesse Local! É necessario remover-los antes.';
			}
			return $res;
		}
		public function statusOSLoja( $localId ){

			$equipamentos	= new Equipamento();

			$item['equipLocal_tt'] 			= $equipamentos->contProprietario( $item['id'] );
			if( $item['equipLocal_tt']  == 0 ){
				$res['error'] = false;
				$res['message'] = 'OK, Local pode ser deletado';
			}else{
				$res['error'] = true;
				$res['message'] = 'Error, '.$item['equipLocal_tt'] .' - Equipamento(s) nesse Local! É necessario remover-los antes.';
			}
			return $res;
		}
		

	}
