<?php
	require_once '_global.php';

	class EquipamentoControl extends GlobalControl {

		public function matrix( $item ){
			$categorias 	= new Categorias();
			$produtos		= new Produtos();
			$fabricantes 	= new Fabricantes();
			$lojas      	= new Loja();
			$locais     	= new Local();

			$categoria				= $categorias->find( $item->categoria_id );
			$item->categoriaTag 	= $categoria->tag;
			$produto 				= $produtos->find( $item->produto_id );
			$item->produtoName 		= $produto->name;
			$fabricante				= $fabricantes->find( $item->fabricante_id );
			$item->fabricanteName 	= $fabricante->name;
			$dono					= $lojas->find( $item->dono_id );
			$item->donoName 		= $dono->name;
			$donoLocal				= $locais->find( $item->donoLocal_id );
			$item->donoLocalName	= $donoLocal->name;
			$item->loja				= $lojas->find( $item->loja_id );
			$item->lojaName 		= $item->loja->name;
			$item->local			= $locais->find( $item->local_id );
			$item->localName 		= $item->local->name;
			return $item;

		}

		public function list(){
				
			$equipamentos	= new Equipamento();
			$itens = array();
			foreach($equipamentos->findAll() as $key => $value):{
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		public function listLoja( $loja ){
				
			$equipamentos	= new Equipamento();
			$itens = array();
			foreach($equipamentos->findAll() as $key => $value):if($value->loja_id == $loja) {
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		public function listLocal( $local ){
				
			$equipamentos	= new Equipamento();
			$itens = array();
			foreach($equipamentos->findAll() as $key => $value):if($value->local_id == $local) {
				$item = $value;
				$item = (array) $this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		public function contEquipLocal( $local_id ){
				
			$equipamentos	= new Equipamento();
			
			$res['equipQt'] = $equipamentos->contLocal( $local_id );
			return $res;

		}

		public function contEquipLoja( $loja_id ){
				
			$equipamentos	= new Equipamento();
			
			$res['equipLoja_tt'] = $equipamentos->contLoja( $loja_id );
			return $res;

		}

		

		public function insertSistema(
			$produto,
			$tag,
			$name,
			$modelo,
			$fabricante,
			$fabricanteNick,
			$proprietario,
			$proprietarioNick,
			$proprietarioLocal,
			$categoria,
			$numeracao,
			$plaqueta,
			$dataFab,
			$dataCompra,
			$loja,
			$local,
			$status,
			$ativo ){

			$equipamento	= new Equipamento();
			$equipamento->setProduto( $produto );
			$equipamento->setTag( $tag );
			$equipamento->setName( $name );
			$equipamento->setModelo( $modelo );
			$equipamento->setNumeracao( $numeracao );
			$equipamento->setPlaqueta( $plaqueta );
			$equipamento->setFabricante( $fabricante );
			$equipamento->setProprietario( $proprietario );
			$equipamento->setProprietarioLocal( $proprietarioLocal );
			$equipamento->setCategoria( $categoria );
			$equipamento->setDataFabricacao( $dataFab );
			$equipamento->setDataCompra( $dataCompra );
			$equipamento->setLoja( $loja );
			$equipamento->setLocal( $local );
			$equipamento->setAtivo( $ativo );

			$item = $equipamento->insert();
			if($item['error'] == true ){
				$res = $this->statusReturn($item);
			}else{
				$item = $this->insertSistemaLocal(
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
