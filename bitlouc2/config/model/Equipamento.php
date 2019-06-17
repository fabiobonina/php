<?php
require_once '_crud.php';

try {
	class Equipamento extends Crud{
		
		protected $table = 'tb_equipamento';
		private $produto;
		private $produtoTag;
		private $name;
		private $modelo;
		private $numeracao;
		private $fabricante_id;
		private $dono_id;
		private $donoLocal_id;
		private $categoria_id;
		private $plaqueta;
		private $dataFab;
		private $dataCompra;
		private $loja_id;
		private $local_id;
		private $ativo;

		public function setProduto($produto){
			$this->produto = $produto;
		}
		public function setTag($tag){
			$this->tag = $tag;
		}
		public function setName($name){
			$this->name = $name;
		}
		public function setModelo($modelo){
			$this->modelo = $modelo;
		}
		public function setNumeracao($numeracao){
			$this->numeracao = $numeracao;
		}
		public function setPlaqueta($plaqueta){
			$this->plaqueta = $plaqueta;
		}
		public function setFabricante($fabricante_id){
			$this->fabricante_id = $fabricante_id;
		}
		public function setDono($dono_id){
			$this->dono_id = $dono_id;
		}
		public function setDonoLocal($donoLocal_id){
			$this->donoLocal_id = $donoLocal_id;
		}
		public function setCategoria( $categoria_id ){
			$this->categoria_id = $categoria_id;
		}
		public function setDataFabricacao($dataFrabricacao){
			$this->dataFrabricacao = $dataFrabricacao;
		}
		public function setDataCompra($dataCompra){
			$this->dataCompra = $dataCompra;
		}
		public function setLoja($loja_id){
			$this->loja_id = $loja_id;
		}
		public function setLocal($local_id){
			$this->local_id = $local_id;
		}	
		public function setAtivo($ativo){
			$this->ativo = $ativo;
		}

		public function insert(){
			try{
				$sql  = "INSERT INTO $this->table (produto_id, tag, name, modelo, numeracao, plaqueta, fabricante_id, proprietario_id,  dono_id, donoLocal_id, categoria_id, dataFrabricacao, dataCompra, loja_id, local_id) ";
				$sql .= "VALUES (:produto_id, :tag, :name, :modelo, :numeracao, :plaqueta, :fabricante_id, :proprietario_id, :dono_id, :donoLocal_id, :categoria_id, :dataFrabricacao, :dataCompra, :loja_id, :local_id)";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':produto_id'		,$this->produto);
				$stmt->bindParam(':tag'				,$this->tag);
				$stmt->bindParam(':name'			,$this->name);
				$stmt->bindParam(':modelo'			,$this->modelo);
				$stmt->bindParam(':numeracao'		,$this->numeracao);
				$stmt->bindParam(':plaqueta'		,$this->plaqueta);
				$stmt->bindParam(':fabricante_id'	,$this->fabricante_id);
				$stmt->bindParam(':proprietario_id'	,$this->proprietario_id);
				$stmt->bindParam(':dono_id'			,$this->dono_id);
				$stmt->bindParam(':donoLocal_id'	,$this->donoLocal_id);
				$stmt->bindParam(':categoria_id'	,$this->categoria);
				$stmt->bindParam(':dataFrabricacao'	,$this->dataFrabricacao);
				$stmt->bindParam(':dataCompra'		,$this->dataCompra);
				$stmt->bindParam(':loja_id'			,$this->loja_id);
				$stmt->bindParam(':local_id'		,$this->local_id);
				$stmt->execute();
				
				$equipamentoId = DB::getInstance()->lastInsertId();

				$res['id'] = $equipamentoId;
				$res['error'] = false;
				$res['message'] = "OK, inserido com sucesso";
				return $res;
			} catch(PDOExecption $e){
				$res['error']	= true;
				$res['message'] = $e->getMessage();
				return $res;
			}

		}

		public function update($id){
			try{
				$sql  = "UPDATE $this->table SET cliente = :cliente, localidade = :localidade, plaqueta = :plaqueta, data = :data WHERE id = :id ";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':cliente',$this->cliente);
				$stmt->bindParam(':localidade', $this->localidade);
				$stmt->bindParam(':plaqueta',$this->plaqueta);
				$stmt->bindParam(':data',$this->data);
				$stmt->bindParam(':id', $id);
				$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, processo da OS alterado com sucesso";
			} catch(PDOExecption $e){
				$res['error']	= true;
				$res['message'] = $e->getMessage();
				return $res;
			}
		}
	}
} catch(PDOExecption $e){
	$res['error']	= true;
	$res['message'] = $e->getMessage();
	return $res;
}