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
			$item->categoria 		= $this->listCategoriaLocal( $item->id );
			$item->dtVisitado 		= '0000-00-00';
			$os 					= $oss->visitadoLocal( $item->id );
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

		public function listLoja( $loja_id ){
			$locais	= new Local();
			$itens = array();
			foreach($locais->findAll() as $key => $value):if($value->loja_id == $loja_id) {
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;
		}

		public function publish(
			$loja_id,
			$proprietario_id,
			$tipo,
			$regional,
			$name,
			$municipio,
			$uf,
			$lat,
			$long,
			$ativo,
			$id)
		{
			$item['error'] = false;
			$locais	= new Local();

			$locais->setLoja($loja_id);
			$locais->setProprietario($proprietario_id);
			$locais->setTipo($tipo);
			$locais->setRegional($regional);
			$locais->setName($name);
			$locais->setMunicipio($municipio);
			$locais->setUf($uf);
			$locais->setAtivo($ativo);

			foreach($locais->findAll() as $key => $value):if($value->loja_id == $loja_id )  {
				$validar = $this->checkDuplicity($value->name, $name );
				if( $validar ):
					$validarId = $value->id;
					$item['error'] = true;
					$item['message'] = 'Error, Nome já existir!';
				endif;
			}endforeach;
			
			if( !isset($id) && !$item['error'] ):
				# Insert
				$item = $locais->insert();
				if( !$item['error'] ){
					$item = $this->insertGeolocalizacao( $item['id'], $lat, $long );				
				}
			endif;
			if( isset($id) && ( !$item['error'] || $validarId == $id ) ):
				# Update
				$item = $locais->update($id);
				$item = $this->insertGeolocalizacao( $id, $lat, $long );
				//echo 'updade';
			endif;

			$res = $this->statusReturn($item);
			return $res;
		}

		public function find( $local_id ){
			$locais	= new Local();
			
			$item = $locais->find( $local_id );

			if( key($item) == "id" ){
				$res['error'] = false;
				$res['local'] = $this->matrix( $item );
				$res['message'] = 'OK, Dados emcontrado';
				
			}else{
				$res = $item;
			}

			return $res;

		}

		public function insertGeolocalizacao( $id, $lat, $long ){

			$locais	= new Local();

			$locais->setLat($lat);
			$locais->setLong($long);
			$item = $locais->geolocalizacao($id);

			$res = $this->statusReturn($item);
			return $res;
		}
		
		public function delete( $local_id ){

			$locais 			= new Local();
			$localCategorias	= new LocalCategorias();
			$item 				= $this->anexoLocal( $local_id );
			if( !$item['error'] ){
				$item	= $locais->delete($local_id);
				$item	= $localCategorias->deletePorLocal($local_id);
			}
			$res	= $this->statusReturn($item);
			return $res;
		}

		public function anexoLocal( $local_id ){

			$equipamentos	= new Equipamento();

			$item['equip_tt'] 			= $equipamentos->contLocal( $local_id );
			if( $item['equip_tt']  == 0 ){
				$res['error'] = false;
				$res['message'] = 'OK, Local pode ser deletado';
			}else{
				$res['error'] = true;
				$res['message'] = 'Error, local com'.$item['equip_tt'] .' - Equipamento(s)! É necessario remover-los antes.';
			}
			return $res;
		}

		#LOCAL_CATERORIAS----------------------------------------------------------------------------------
		public function insertCategoria( $local_id, $categorias ){

			$localCategorias = new LocalCategorias();
			$itemTt = 0;
			$itemS = 0;
			$itemR = 0;

			foreach ( $categorias as $data){
				$categoriaId = $data['id'];
				$duplicado = false;
				$itemTt++;
				$error = '';

				foreach($localCategorias->findAll() as $key => $value):if( $value->local_id == $local_id && $value->categoria_id == $categoriaId )  {
					$duplicado = true;       
				}endforeach;

				if( !$duplicado ){
					$itemS++;
				  	$localCategorias->setLocal($local_id);
				  	$localCategorias->setCategoria($categoriaId);
					$item = $localCategorias->insert();
					if($item['error'] == true ){
						$error = $item['message'];
					}
				}else{
					$itemR++;
				}
				$item['error'] = false;
				$item['message'] = 'Do(s) '.$itemTt .' enviado(s), '.$itemS .' - valido(s), '.$itemR .' - já cadastrado(s).(Error: '.$error .' )';
			}

			$res = $this->statusReturn($item);
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

		public function deleteCategoriaPorLocal( $local_id ){

			$localCategorias = new LocalCategorias();

			$res = $localCategorias->deleteLocal($local_id);
			//$res = $this->statusReturn($item);
			return $res;
			
		}

		public function listCategoriaLocal( $local_id ){
			
			$localCategorias	= new LocalCategorias();
			$categorias			= new Categorias();
    		$arTens 			= array();
			
			foreach($localCategorias->findAll() as $key => $value):if($value->local_id == $local_id) {
				$categoriaId 	= $value->categoria_id;
				$lojaCatAtivo 	= $value->ativo;
				$lojaCatId 		= $value->id;

				$item = $categorias->find( $categoriaId );
				$item->categoria_id = $categoriaId;
				$item->ativo		= $lojaCatAtivo;
				$item->id 			= $lojaCatId;
				$item = (array) $item;
				array_push( $arTens, $item );
			}endforeach;

			$res = $arTens;
			return $res;

		}

	}
