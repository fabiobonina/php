<?php
	include('../geral/_global.php');


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
			$item->categoria 		= $this->listCategoriaLoja( $item->id );
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
			$lojaCategorias	= new LojaCategorias();
			$item 	= $this->anexoLoja( $lojaId );
			if( !$item['error'] ){
				//echo 'delete';
				$item	= $lojas->delete( $lojaId );
				$item	= $lojaCategorias->deleteLoja( $lojaId );
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
		public function insertCategoria( $lojaId, $categorias ){

			$lojaCategorias = new LojaCategorias();
			$itemTt = 0;
			$itemS = 0;
			$itemR = 0;
			foreach ( $categorias as $data){
				$categoriaId = $data['id'];
				$duplicado = false;
				$itemTt++;
				$error = '';

				foreach($lojaCategorias->findAll() as $key => $value):if( $value->categoria_id == $categoriaId )  {
					$duplicado = true;       
				}endforeach;

				if( !$duplicado ){
					$itemS++;
				  	$lojaCategorias->setLoja($lojaId);
				  	$lojaCategorias->setCategoria($categoriaId);
					$item = $lojaCategorias->insert();
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

		public function statusCategoria( $lojaCatId, $ativo ){

			$lojaCategorias = new LojaCategorias();

			$lojaCategorias->setAtivo($ativo);
			$item = $lojaCategorias->update($lojaCatId);

			$res = $this->statusReturn($item);
			return $res;
			
		}

		public function deleteCategoria( $lojaCatId ){

			$lojaCategorias = new LojaCategorias();

			$item 	= $lojaCategorias->delete($lojaCatId);
			$res 	= $this->statusReturn($item);
			return $res;
			
		}

		public function deleteCategoriaLoja( $localId ){

			$lojaCategorias = new LojaCategorias();

			$res = $lojaCategorias->deleteLoja($localId);
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
