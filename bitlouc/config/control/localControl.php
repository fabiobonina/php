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
				$item = $this->insertCategoria( $item['id'], $categorias );
				$res = $this->statusReturn($item);
			}
			return $res;

			
			$locais->setCategoria($categorias);
		}

		public function listCategoriaLocal( $localId ){
			
			$localCategorias	= new LocalCategorias();
			$categorias			= new Categorias();
    		$arTens = array();
			
			foreach($localCategorias->findAll() as $key => $value):if($value->local == $localId) {
				$categoriaId = $value->categoria;
				$catLocalAtivo = $value->ativo;
				$catLocalId = $value->id;
				foreach($categorias->find( $categoriaId ) as $key => $value): {
					$item = (array) $value;
					$item['ativo'] = $catLocalAtivo;
					$item['catLocal'] = $catLocalId;
					array_push($arTens, $item );
				}endforeach;
			}endforeach;

			$res = $arTens;
			return $res;

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

		public function insertCategoria( $localId, $categorias ){

			$localCategorias = new LocalCategorias();
			$locais	= new Local();
			foreach ( $categorias as $data){
				$itemId = $data['id'];
				$duplicado = false;
				foreach($localCategorias->findAll() as $key => $value): {
				  $catLacalCategoria = $value->categoria;
				  $catLacalLocal = $value->local;
				  
				  if($local == $catLacalLocal){
					if($itemId == $catLacalCategoria ):
					  $duplicado = true;
					endif;
				  }          
				}endforeach;
				if( !$duplicado ){
				  $localCategorias->setLocal($local);
				  $localCategorias->setCategoria($itemId);
				  # Insert
				  if($localCategorias->insert()){
					$res['error'] = false;
					$arDados = "OK, dados salvo com sucesso";
					$res['message']= $arDados;
				  }else{
					$res['error'] = true; 
					$arError = "Error, nao foi possivel salvar os dados";
					array_push($arErros, $arError);
				  }
				}else{
				  $res['error'] = true; 
				  $arError = "Error, item já cadastrado";
				  array_push($arErros, $arError);
				}
			  }
				
			  if($res['error'] == true){
				$res['message']= $arErros;
			  }
			$locais->setLat($lat);
			$locais->setLong($long);
			$item = $locais->geolocalizacao($id);
			if($item['error'] == true ){
				$res = $this->statusReturn($item);
			}else{
				$item = $this->insertLocalLocal(
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

	}
