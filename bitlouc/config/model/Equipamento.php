<?php
require_once '_crud.php';

try {
	class Equipamento extends Crud{
		
		protected $table = 'tb_equipamentos';
		private $produto;
		private $produtoTag;
		private $name;
		private $modelo;
		private $numeracao;
		private $fabricante;
		private $fabricanteNick;
		private $proprietario;
		private $proprietarioNick;
		private $proprietarioLoja;
		private $categoria;
		private $plaqueta;
		private $dataFab;
		private $dataCompra;
		private $loja;
		private $local;
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
		public function setFabricante($fabricante){
			$this->fabricante = $fabricante;
		}
		public function setFabricanteNick($fabricanteNick){
			$this->fabricanteNick = $fabricanteNick;
		}
		public function setProprietario($proprietario){
			$this->proprietario = $proprietario;
		}
		public function setProprietarioNick($proprietarioNick){
			$this->proprietarioNick = $proprietarioNick;
		}
		public function setProprietarioLocal($proprietarioLocal){
			$this->proprietarioLocal = $proprietarioLocal;
		}
		public function setCategoria($categoria){
			$this->categoria = $categoria;
		}
		public function setPlaqueta($plaqueta){
			$this->plaqueta = $plaqueta;
		}
		public function setDataFabricacao($dataFrabricacao){
			$this->dataFrabricacao = $dataFrabricacao;
		}
		public function setDataCompra($dataCompra){
			$this->dataCompra = $dataCompra;
		}
		public function setLoja($loja){
			$this->loja = $loja;
		}
		public function setLocal($local){
			$this->local = $local;
		}	
		public function setAtivo($ativo){
			$this->ativo = $ativo;
		}

		public function insert(){
			try{
				$sql  = "INSERT INTO $this->table (produto_id, tag, name, modelo, fabricante_id, fabricante, proprietario_id, proprietario, proprietarioLocal_id, categoria_id, numeracao, plaqueta, dataFrabricacao, dataCompra, loja_id, local_id) ";
				$sql .= "VALUES (:produto_id, :tag, :name, :modelo, :fabricante_id, :fabricante, :proprietario_id, :proprietario, :proprietarioLocal_id, :categoria_id, :numeracao, :plaqueta, :dataFrabricacao, :dataCompra, :loja_id, :local_id)";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':produto_id',$this->produto);
				$stmt->bindParam(':tag',$this->tag);
				$stmt->bindParam(':name',$this->name);
				$stmt->bindParam(':modelo',$this->modelo);
				$stmt->bindParam(':fabricante_id',$this->fabricante);
				$stmt->bindParam(':fabricante',$this->fabricanteNick);
				$stmt->bindParam(':proprietario_id',$this->proprietario);
				$stmt->bindParam(':proprietario',$this->proprietarioNick);
				$stmt->bindParam(':proprietarioLocal_id',$this->proprietarioLocal);
				$stmt->bindParam(':categoria_id',$this->categoria);
				$stmt->bindParam(':numeracao',$this->numeracao);
				$stmt->bindParam(':plaqueta',$this->plaqueta);
				$stmt->bindParam(':dataFrabricacao',$this->dataFrabricacao);
				$stmt->bindParam(':dataCompra',$this->dataCompra);
				$stmt->bindParam(':loja_id',$this->loja);
				$stmt->bindParam(':local_id',$this->local);
				$stmt->execute();
				
				$bemId = DB::getInstance()->lastInsertId();

				$res['id'] = $osId;
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
				return $stmt->execute();
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