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
			$id)
		{
			$lojas	= new Loja();
			$item['error'] = false;

			$data = date("Y-m-d");
			$lojas->setName($name);
			$lojas->setNick($nick);
			$lojas->setProprietario($proprietario_id);
			$lojas->setGrupo($grupo);
			$lojas->setSeguimento($seguimento);
			$lojas->setData($data);
			$lojas->setAtivo($ativo);

			foreach($lojas->findAll() as $key => $value): {
				$validar = $this->checkDuplicity($value->nick, $nick );
				if( $validar ):
					$item['id'] = $value->id;
					$item['error'] = true;
					$item['message'] = 'Error, Nome Fantasia já existir!';
				endif;
			}endforeach;
			
			if( !isset($id) && !$item['error'] ):
				
				# Insert
				$item = $lojas->insert();

			endif;
			if( isset($id) && ( !$item['error'] || $item['id'] == $id ) ):
				# Update
				$item = $lojas->update($id);
				//echo "edt";
			endif;

			$res = $this->statusReturn($item);
			return $res;
		}
		
		public function deleteLoja( $lojaId ){

			$lojas 				= new Loja();
			$localCategorias	= new LojaCategorias();
			$item 	= $this->anexoLoja( $lojaId );
			if( !$item['error'] ){
				//echo 'delete';
				$item	= $lojas->delete( $lojaId );
				$item	= $localCategorias->deleteLoja( $lojaId );
			}
			$res	= $this->statusReturn($item);
			return $res;
		}

		public function anexoLoja( $lojaId ){

			$equipamentos	= new Equipamento();
			$locais			= new Local();

			$item['equip_tt'] 	= $equipamentos->contLoja( $lojaId );
			$item['local_tt']	= $locais->contLoja( $lojaId );

			if( $item['equip_tt'] > 0 || $item['local_tt'] > 0 ){
				$res['error'] = true;
				$res['message'] = 'Error, loja com '.$item['local_tt'] .' - Localidade(s), '.$item['equip_tt'] .' - Equipamento(s)! É necessario remover-los antes.';
			}else{
				$res['error'] = false;
				$res['message'] = 'OK, Loja pode ser deletado';
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
