<?php
	require_once '_global.php';

	function __autoload($class_name){
		require_once '../model/' . $class_name . '.php';
	}

	class LojaControl extends GlobalControl {

		public function listLoja(){
				
			$lojas	= new Loja();
			$itens = array();
			foreach($lojas->findAll() as $key => $value):{
				$item = (array) $value;
				$item = $this->matrixLoja( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		public function listLojaProprietario( $proprietario_id ){
			$lojas	= new Loja();
			$itens 	= array();
			foreach($lojas->findAll() as $key => $value):if($value->proprietario_id == $proprietario_id ) {
				$item = (array) $value;
				$item = $this->matrixLoja( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;
		}

		public function matrixLoja( $item ){
			$lojas      = new Loja();
			$equipamentos	= new Equipamento();

			$item['equipLocal_tt'] 			= $equipamentos->contLoja( $item['id'] );
			$item['loja']					= $lojas->find( $item['loja_id'] );
			$item['lojaName'] 				= $item['loja']->name;
			$item['categorias'] 			= $this->listCategoriaLoja( $item['id'] );
			return $item;

		}

		public function insertLoja(
			$loja,
			$tipo,
			$regional,
			$name,
			$municipio,
			$uf,
			$lat,
			$long,
			$categorias,
			$ativo ){

			$lojas	= new Loja();

			$lojas->setLoja($loja);
			$lojas->setTipo($tipo);
			$lojas->setRegional($regional);
			$lojas->setName($name);
			$lojas->setMunicipio($municipio);
			$lojas->setUf($uf);
			$lojas->setAtivo($ativo);
			# Insert
			$item = $lojas->insert();
			if( !$item['error'] ){
				$item = $this->insertGeolocalizacao( $item['id'], $lat, $long );
				if( isset( $categorias )):
					$item = $this->insertCategoria( $item['id'], $categorias );
				endif;				
			}
			$res = $this->statusReturn($item);
			return $res;
		}

		public function updateLoja(
			$loja,
			$tipo,
			$regional,
			$name,
			$municipio,
			$uf,
			$lat,
			$long,
			$ativo,
			$id ){

			$lojas	= new Loja();

			$lojas->setLoja($loja);
			$lojas->setTipo($tipo);
			$lojas->setRegional($regional);
			$lojas->setName($name);
			$lojas->setMunicipio($municipio);
			$lojas->setUf($uf);
			$lojas->setAtivo($ativo);
			# Update
			$item = $lojas->updete($id);
			$item = $this->insertGeolocalizacao( $id, $lat, $long );
			
			$res = $this->statusReturn($item);
			return $res;
		}

		public function insertGeolocalizacao( $id, $lat, $long ){

			$lojas	= new Loja();

			$lojas->setLat($lat);
			$lojas->setLong($long);
			$item = $lojas->geolocalizacso($id);

			$res = $this->statusReturn($item);
			return $res;
		}
		
		public function deleteLoja( $localId ){

			$lojas 			= new Loja();
			$localCategorias	= new LocalCategorias();
			$item 	= $this->anexoLoja( $localId );
			if( !$item['error'] ){
				$item	= $lojas->delete($localId);
				$item	= $localCategorias->deleteCategoriaPorLoja($localId);
			}
			$res	= $this->statusReturn($item);
			return $res;
		}

		public function anexoLoja( $localId ){

			$equipamentos	= new Equipamento();

			$item['equipLocal_tt'] 			= $equipamentos->contLoja( $item['id'] );
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
				  $localCategorias->setLoja($local);
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

		public function deleteCategoriaPorLoja( $localId ){

			$localCategorias = new LocalCategorias();

			$res = $localCategorias->deleteLoja($localId);
			//$res = $this->statusReturn($item);
			return $res;
			
		}

		public function listCategoriaLoja( $localId ){
			
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
