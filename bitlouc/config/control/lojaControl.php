<?php
	require_once '_global.php';


	class LojaControl extends GlobalControl {

		public function matrix( $item ){
			$locais      	= new Local();
			$equipamentos	= new Equipamento();
			$oss			= new Os();

			$item->equipQt 			= $equipamentos->contLoja( $item->id );
			$item->locaisQt 		= $locais->contLoja( $item->id );
			$item->locaisGeoQt 		= $locais->contGeolocalizacaoLoja( $item->id );
			$item->locaisGeoStatus 	= $this->porcentagem( $item->locaisQt, $item->locaisGeoQt  );
			$item->ossPendenteQt 	= $oss->contOsStatusLoja( $item->id, 0 );
			$item->ossAndamentoQt	= $oss->contOsStatusLoja( $item->id, 1 );
			$item->ossConcluidoQt	= $oss->contOsStatusLoja( $item->id, 2 );
			$item->ossQt 			= $oss->contLoja( $item->id );
			$item->categorias 		= $this->listCategoriaLoja( $item->id );
			return $item;

		}

		public function list( $lojaId ){
			$lojas	= new Loja();
			$itens 	= array();
			$item 	= $lojas->find( $lojaId );
			$item = $this->matrix( $item );
			$item = (array)  $item;
			array_push( $itens, $item );

			$res = $itens;
			return $res;

		}

		public function listProprietario( $proprietario_id ){
			$lojas	= new Loja();
			$itens 	= array();
			
			foreach($lojas->findProprietario( $proprietario_id ) as $key => $value): {
				$item =  $value;
				$item = (array) 	$this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;
		}

		

		public function publishLoja(
			$name,
			$nick,
			$proprietario_id,
			$grupo,
			$seguimento,
			$ativo,
			$id
			){
				$lojas	= new Loja();
				foreach($lojas->findAll() as $key => $value): {
					$item = $this->checkDuplicity($value->nick, $nick );
					if( !$item ):
					  $res['error'] = true;
					  $res['message'] = 'Error, Nome Fantasia da loja já ultilizado!';
					endif;

				}endforeach;

				$data = date("Y-m-d");
				$lojas->setName($name);
				$lojas->setNick($nick);
				$lojas->setProprietario($proprietario_id);
				$lojas->setGrupo($grupo);
				$lojas->setSeguimento($seguimento);
				$lojas->setData($data);
				$lojas->setAtivo($ativo);
				if( !$res['error'] && !isset($id) ):
					$item = $lojas->insert();
				endif;
				if( !$res['error'] && isset($id) ):
					$item = $lojas->updade($id);
				endif;

			# Insert

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

		public function listCategoriaLoja( $lojaId ){
			
			$lojaCategorias		= new LojaCategorias();
			$categorias			= new Categorias();
    		$arTens 			= array();
			
			foreach($lojaCategorias->findAll() as $key => $value):if($value->loja_id == $lojaId) {
				$categoriaId 	= $value->categoria_id;
				$lojaCatAtivo 	= $value->ativo;
				$lojaCatId 	= $value->id;
				foreach($categorias->find( $categoriaId ) as $key => $value): {
					$item = (array) $value;
					$item['categoria_id'] 	= $categoriaId;
					$item['ativo']			= $lojaCatAtivo;
					$item['id'] 			= $lojaCatId;
					array_push( $arTens, $item );
				}endforeach;
			}endforeach;

			$res = $arTens;
			return $res;

		}

	}
