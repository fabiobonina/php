<?php
	require_once '_global.php';
	require_once 'lojaControl.php';

	class ProprietarioControl extends GlobalControl {

		public function matrixProprietario( $item ){
			$lojas      	= new Loja();
			$locais      	= new Local();
			$equipamentos	= new Equipamento();
			$oss			= new Os();

			$item['equipQt'] 			= $equipamentos->contProprietario( $item['id'] );
			$item['lojasQt'] 			= $lojas->contProprietario( $item['id'] );
			$item['locaisQt'] 			= $locais->contProprietario( $item['id'] );
			$item['locaisGeoQt'] 		= $locais->contGeolocalizacaoProprietario( $item['id'] );
			$item['locaisGeoStatus'] 	= $this->porcentagem( $item['locaisQt'], $item['locaisGeoQt']  );
			$item['ossPendenteQt'] 		= $oss->contOsStatusProprietario( $item['id'], 0 );
			$item['ossAndamentoQt']		= $oss->contOsStatusProprietario( $item['id'], 1 );
			$item['ossConcluidoQt']		= $oss->contOsStatusProprietario( $item['id'], 2 );
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

		public function statusPependecia( $localId ){

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

		#LOCAL_CATERORIAS----------------------------------------------------------------------------------
		public function insertCategoria( $localId, $categorias ){

			$localCategorias = new LocalCategorias();

			foreach ( $categorias as $data){
				$categoriaId = $data['id'];
				$duplicado = false;

				foreach($localCategorias->findAll() as $key => $value):if( $value->categoria_id == $categoriaId )  {
					$duplicado = true;       
				}endforeach;

				if( !$duplicado ){
				  	$localCategorias->setProprietario($local);
				  	$localCategorias->setCategoria($itemId);
					
					  $item = $localCategorias->insert();

				}else{
				  $item['error'] = true; 
				  $item['message'] = "Error, item já cadastrado";
				}
			}

			if($item['error'] == true ){
				$res = $this->statusReturn($item);
			}else{

				$res = $this->statusReturn($item);
			}
			return $res;

		}

		public function statusCategoria( $localCatId, $ativo ){

			$localCategorias = new LocalCategorias();

			$localCategorias->setAtivo($ativo);
			$item = $localCategorias->update($localCatId);

			$res = $this->statusReturn($item);
			return $res;
			
		}

		public function deleteCategoria( $localCatId ){

			$localCategorias = new LocalCategorias();

			$item = $localCategorias->delete($localCatId);
			$res = $this->statusReturn($item);
			return $res;
			
		}

		public function deleteCategoriaPorProprietario( $localId ){

			$localCategorias = new LocalCategorias();

			$res = $localCategorias->deleteProprietario($localId);
			//$res = $this->statusReturn($item);
			return $res;
			
		}

		public function listCategoriaProprietario( $localId ){
			
			$localCategorias	= new LocalCategorias();
			$categorias			= new Categorias();
    		$arTens 			= array();
			
			foreach($localCategorias->findAll() as $key => $value):if($value->local_id == $localId) {
				$categoriaId 	= $value->categoria_id;
				$localCatAtivo 	= $value->ativo;
				$localCatId 	= $value->id;
				foreach($categorias->find( $categoriaId ) as $key => $value): {
					$item = (array) $value;
					$item['categoria_id'] 	= $categoriaId;
					$item['ativo']			= $localCatAtivo;
					$item['id'] 			= $localCatId;
					array_push( $arTens, $item );
				}endforeach;
			}endforeach;

			$res = $arTens;
			return $res;

		}

	}
