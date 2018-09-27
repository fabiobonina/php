<?php
	require_once '_global.php';

	function __autoload($class_name){
		require_once '../model/' . $class_name . '.php';
	}

	class LocalControl extends GlobalControl {

		public function listLocal(){
				
			$locais	= new Local();
			$itens = array();
			foreach($locais->findAll() as $key => $value):{
				$item = (array) $value;
				$item = $this->matrixLocal( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		public function listLocalLoja( $loja ){
			$locais	= new Local();
			$itens = array();
			foreach($locais->findAll() as $key => $value):if($value->loja_id == $loja) {
				$item = (array) $value;
				$item = $this->matrixLocal( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;
		}

		public function matrixLocal( $item ){
			$lojas      = new Loja();

			$item['loja']					= $lojas->find( $item['loja_id'] );
			$item['lojaName'] 				= $item['loja']->name;
			$item['categorias'] = $this->listCategoriaLocal( $item['id'] );
			return $item;

		}

		public function insertLocal(
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

			$locais	= new Local();

			$locais->setLoja($loja);
			$locais->setTipo($tipo);
			$locais->setRegional($regional);
			$locais->setName($name);
			$locais->setMunicipio($municipio);
			$locais->setUf($uf);
			$locais->setAtivo($ativo);
			# Insert
			$item = $locais->insert();
			if($item['error'] == true ){
				$res = $this->statusReturn($item);
			}else{
				$item = $this->insertGeolocalizacao( $item['id'], $lat, $long );
				if( isset( $categorias )):
					$item = $this->insertCategoria( $item['id'], $categorias );
				endif;
				
				$res = $this->statusReturn($item);
			}
			return $res;

			
			$locais->setCategoria($categorias);
		}

		

		public function insertGeolocalizacao( $id, $lat, $long ){

			$locais	= new Local();

			$locais->setLat($lat);
			$locais->setLong($long);
			$item = $locais->geolocalizacso($id);
			if($item['error'] == true ){
				$res = $this->statusReturn($item);
			}else{
				$res = $this->statusReturn($item);
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
				  $localCategorias->setLocal($local);
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

		public function statusCategoria( $locaCatId, $ativo ){

			$localCategorias = new LocalCategorias();

			$localCategorias->setAtivo($ativo);

			$item = $localCategorias->update($id);
			if($item['error'] == true ){
				$res = $this->statusReturn($item);
			}else{
				$res = $this->statusReturn($item);
			}
			return $res;
			
		}

		public function deleteCategoria( $locaCatId ){

			$localCategorias = new LocalCategorias();

			$item = $localCategorias->delete($id);
			if($item['error'] == true ){
				$res = $this->statusReturn($item);
			}else{
				$res = $this->statusReturn($item);
			}
			return $res;
			
		}

		public function listCategoriaLocal( $localId ){
			
			$localCategorias	= new LocalCategorias();
			$categorias				= new Categorias();
    	$arTens 					= array();
			
			foreach($localCategorias->findAll() as $key => $value):if($value->local_id == $localId) {
				$categoriaId 		= $value->categoria_id;
				$localCatAtivo 	= $value->ativo;
				$localCatId 		= $value->id;
				foreach($categorias->find( $categoriaId ) as $key => $value): {
					$item = (array) $value;
					$item['categoria_id'] = $categoriaId;
					$item['ativo'] 				= $localCatAtivo;
					$item['id'] 					= $localCatId;
					array_push( $arTens, $item );
				}endforeach;
			}endforeach;

			$res = $arTens;
			return $res;

		}

	}
