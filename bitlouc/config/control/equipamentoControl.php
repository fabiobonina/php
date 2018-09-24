<?php
	require_once '_global.php';
	require_once '../model/Equipamento.php';
	require_once '../model/EquipamentoLocal.php';

	class EquipamentoControl extends GlobalControl {

		public function findAlllistSistemaLocal(
			$equipamento,
			$data,
			$loja,
			$local,
			$status ){
			#LOCAIS_BENS-----------------------------------------------------------------------------------
			$status = 3;
			foreach($bemLocalizacao->findAll() as $key => $value):if($value->local == $localId && $value->status <= $status ) {
			  $bemId = $value->bem;
			  $bemStatus= $value->status;
			  foreach($bens->findAll() as $key => $value):if($value->id == $bemId) {
				$arBem = (array) $value; //Bem
				$arBem['loja']= $lojaId;
				$arBem['local']= $localId;
				$arBem['status']=$bemStatus;
				foreach($categorias->findAll() as $key => $value):if($value->id == $arBem['categoria_id']) {
				  $arBem['categoria'] = $value;
				}endforeach;
				array_push($arBens, $arBem );
				
			  }endforeach;
			}endforeach;
			#LOCAIS_BENS-----------------------------------------------------------------------------------
			$equipamentoLocal 	= new EquipamentoLocal();
			$equipamentoLocal->setEquipamento($equipamento);
			$equipamentoLocal->setDataInicial($data);
			$equipamentoLocal->setLoja($loja);
			$equipamentoLocal->setLocal($local);
			$equipamentoLocal->setStatus($status);
			$res = $equipamentoLocal->insert();

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
			$equipamento->setProduto($produto);
			$equipamento->setTag($tag);
			$equipamento->setName($name);
			$equipamento->setModelo($modelo);
			$equipamento->setNumeracao($numeracao);
			$equipamento->setFabricante($fabricante);
			$equipamento->setFabricanteNick($fabricanteNick);
			$equipamento->setProprietario($proprietario);
			$equipamento->setProprietarioNick($proprietarioNick);
			$equipamento->setProprietarioLocal($proprietarioLocal);
			$equipamento->setCategoria($categoria);
			$equipamento->setPlaqueta($plaqueta);
			$equipamento->setDataFabricacao($dataFab);
			$equipamento->setDataCompra($dataCompra);
			$equipamento->setLoja($loja);
			$equipamento->setLocal($local);
			$equipamento->setAtivo($ativo);

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

		public function insertSistemaLocal(
			$equipamento,
			$data,
			$loja,
			$local,
			$status ){

			$equipamentoLocal 	= new EquipamentoLocal();
			$equipamentoLocal->setEquipamento($equipamento);
			$equipamentoLocal->setDataInicial($data);
			$equipamentoLocal->setLoja($loja);
			$equipamentoLocal->setLocal($local);
			$equipamentoLocal->setStatus($status);
			$res = $equipamentoLocal->insert();

			return $res;
		}

	}
