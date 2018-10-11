<?php
	require_once '_global.php';

	class LocalControl extends GlobalControl {

		public function matrix( $item ){
			$lojas      	= new Loja();
			$equipamentos	= new Equipamento();
			$oss			= new Os(); 
			$item->equipamentos_qt	= $equipamentos->contLocal( $item->id );
			$loja					= $lojas->find( $item->loja_id );
			$item->loja_name 		= $loja->name;
			$item->categorias 		= $this->listCategoriaLocal( $item->id );
			$item->dtVisitado = '0000-00-00';
			$os 		= $oss->visitadoLocal( $item->id );
			if( isset($os->dtVisitado) ){
				$item->dtVisitado = $os->dtVisitado;
			}
			return $item;

		}

		public function list(){
				
			$locais	= new Local();
			$itens 	= array();
			foreach($locais->findAll() as $key => $value):{
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		public function listLoja( $loja ){
			$locais	= new Local();
			$itens = array();
			foreach($locais->findAll() as $key => $value):if($value->loja_id == $loja) {
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;
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
			if( !$item['error'] ){
				$item = $this->insertGeolocalizacao( $item['id'], $lat, $long );
				if( isset( $categorias )):
					$item = $this->insertCategoria( $item['id'], $categorias );
				endif;				
			}
			$res = $this->statusReturn($item);
			return $res;
		}

		public function updateLocal(
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

			$locais	= new Local();

			$locais->setLoja($loja);
			$locais->setTipo($tipo);
			$locais->setRegional($regional);
			$locais->setName($name);
			$locais->setMunicipio($municipio);
			$locais->setUf($uf);
			$locais->setAtivo($ativo);
			# Update
			$item = $locais->updete($id);
			$item = $this->insertGeolocalizacao( $id, $lat, $long );
			
			$res = $this->statusReturn($item);
			return $res;
		}

		public function insertGeolocalizacao( $id, $lat, $long ){

			$locais	= new Local();

			$locais->setLat($lat);
			$locais->setLong($long);
			$item = $locais->geolocalizacso($id);

			$res = $this->statusReturn($item);
			return $res;
		}
		
		public function deleteLocal( $localId ){

			$locais 			= new Local();
			$localCategorias	= new LocalCategorias();
			$item 	= $this->anexoLocal( $localId );
			if( !$item['error'] ){
				$item	= $locais->delete($localId);
				$item	= $localCategorias->deleteCategoriaPorLocal($localId);
			}
			$res	= $this->statusReturn($item);
			return $res;
		}

		public function anexoLocal( $localId ){

			$equipamentos	= new Equipamento();

			$item['equipLocal_tt'] 			= $equipamentos->contLocal( $item['id'] );
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

		public function deleteCategoriaPorLocal( $localId ){

			$localCategorias = new LocalCategorias();

			$res = $localCategorias->deleteLocal($localId);
			//$res = $this->statusReturn($item);
			return $res;
			
		}

		public function listCategoriaLocal( $localId ){
			
			$localCategorias	= new LocalCategorias();
			$categorias			= new Categorias();
    		$arTens 			= array();
			
			foreach($localCategorias->findAll() as $key => $value):if($value->local_id == $localId) {
				$categoriaId 	= $value->categoria_id;
				$localCatAtivo 	= $value->ativo;
				$localCatId 	= $value->id;
				 
				$item = $categorias->find( $categoriaId );
				$item->localCat_id 		= $categoriaId;
				$item->localCat_ativo	= $localCatAtivo;
				$item->localCat_id		= $localCatId;
					
				$item = (array) $item;
				array_push( $arTens, $item );
				
			}endforeach;

			$res = $arTens;
			return $res;

		}

	}
