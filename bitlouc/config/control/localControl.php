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

			$equipamento	= new Local();
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

	}
